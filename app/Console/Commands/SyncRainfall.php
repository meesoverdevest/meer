<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class SyncRainfall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:rainfall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to sync KNMI rainfall data of the city dordrecht';

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
        $client = new Client();
        $res = $client->request('POST', 'http://projects.knmi.nl/klimatologie/daggegevens/getdata_dag.cgi', 
            [
                'post-data' => [
                'vars' => 'PRCP', 'stns' => '833'
                ]
            ]
        );

        $this->line($res->getStatusCode());
        $this->line($res->getHeader('content-type'));
        var_dump($res->getBody());
        var_dump($res);
        $this->line('imported!');
        // 'start' => '', 'end' => '',
    }
}
