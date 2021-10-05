<?php

namespace App\Console\Commands;

use App\Models\CarMakers;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class ParseCarsData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:makers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $client = new Client();
        $data = $client->get('https://tclub.autodoc.co.uk/api/v2/cars/makers');
        if ($data->getStatusCode() == 200) {
            $makers = $data->getBody()->getContents();
            $makers = json_decode($makers, true, 512, JSON_THROW_ON_ERROR);
            foreach ($makers['data'] as $maker) {
                $localMaker = new CarMakers();
                $localMaker->id = $maker['id'];
                $localMaker->title = $maker['title'];
                $localMaker->title_formatted = $maker['title_formatted'];
                $localMaker->alias = $maker['alias'];
                $localMaker->save();
            }
        }
        return 0;
    }
}
