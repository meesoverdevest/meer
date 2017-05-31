<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class DBImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:datadumps';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to import all sql dumps in the public/dumps directory';

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
        $user = env('DB_USERNAME');
        $pass = env('DB_PASSWORD');
        $db = env('DB_DATABASE');
        $host = env('DB_HOST');

        $dir = 'public/dumps/';
        $files = scandir($dir); 

        foreach($files as $file) {
            if(is_file($dir.$file)){
                if(pathinfo($dir.$file, PATHINFO_EXTENSION) == "sql") {
                    // $stmt = 'mysql -h'. $host .' -u'.$user.' -p'. $pass .' ' . $dir.$file .' > '. $db;
                    // $output = array();
                    // $this->line($stmt);

                    // exec($stmt, $output, $success);

                    // switch ($success) {
                    //     case 0:
                    //         $this->line('sql file: '. $dir.$file .' found and imported successfully');
                    //         # code...
                    //         break;
                    //     case 1:
                    //         $this->error('sql file: '. $dir.$file .' found and failed to import');
                    //         break;
                    //     default:
                    //         # code...
                    //         break;
                    // }
                    DB::unprepared(file_get_contents($dir.$file));
                }
            }
        }
    }
}
