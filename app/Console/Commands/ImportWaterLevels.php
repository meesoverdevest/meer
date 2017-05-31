<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\RiverWaterLevel;
use Carbon\Carbon;
use Excel;

class ImportWaterLevels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:waterlevels';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to import waterlevels from a csv';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        config(['excel.csv.delimiter' => ';']);
        config(['excel.csv.enclosure' => '']);

        Excel::filter('chunk')->load('public/dumps/waterhoogtes.csv')->chunk(150, function($reader) {

            foreach($reader as $row) {

                $date_object = explode('-',$row->datum);
                $day = $date_object[0];
                $month = $date_object[1];
                $year = $date_object[2];

                $hour_object = explode(':', $row->tijd);
                $hour = $hour_object[0];
                $minute = $hour_object[1];
                $second = $hour_object[2];

                $date = Carbon::create($year, $month, $day, $hour, $minute, $second);

                // Check whether level measurement exists
                $level = RiverWaterLevel::where('date', $date)
                    ->where('measurement', $row->meting)->first();

                if(!$level) {
                    $level = new RiverWaterLevel();
                    $level->measurement = $row->meting;
                    $level->date = $date;

                    $level->save();
                }

            }

        });

        $this->line('Done!');
        
    }
}
