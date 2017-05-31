<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Excel;
use App\Peilbuis;
use App\PeilbuisMeting;

class ImportGrondwater extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:grondwater';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to import grondwaterstanden for Dordrecht city';

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
        Excel::filter('chunk')->load('public/grondwater_pt2.csv')->chunk(200, function($reader) {

            foreach($reader as $row) {

                // Check whether peilbuis exists
                $peilbuis = Peilbuis::where('peilbuiscode', $row->peilbuiscode)->first();
                
                if(!$peilbuis) {
                    // create unique peilbuis        
                    $peilbuis = new Peilbuis();
                    $peilbuis->peilbuiscode = $row->peilbuiscode;
                    $peilbuis->straat = $row->straat;
                    $peilbuis->huisnummer = $row->huisnummer;
                    $peilbuis->longitude = $row->longitude;
                    $peilbuis->latitude = $row->latitude;
                    $peilbuis->save();
                }

                // create peilbuismeting for each peilbuis
                $peilbuismeting = PeilbuisMeting::where('meetdatum', $row->meetdatum)
                    ->where('nap_hoogte_meetpunt', $row->nap_hoogte_meetpunt)
                    ->where('grondwaterstand', $row->grondwaterstand)
                    ->where('nap_hoogte_maaiveld', $row->nap_hoogte_maaiveld)
                    ->where('peilbuis_id', $peilbuis->id)
                    ->first();
                
                if(!$peilbuismeting) {
                    $peilbuismeting = new PeilbuisMeting();
                    $peilbuismeting->meetdatum = $row->meetdatum;
                    $peilbuismeting->nap_hoogte_meetpunt = $row->nap_hoogte_meetpunt;
                    $peilbuismeting->grondwaterstand = $row->grondwaterstand;
                    $peilbuismeting->nap_hoogte_maaiveld = $row->nap_hoogte_maaiveld;
                    $peilbuismeting->peilbuis_id = $peilbuis->id;
                    $peilbuismeting->save();
                }

            }

        });

        // Done !
        $this->line('Done');
    }
}
