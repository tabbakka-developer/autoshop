<?php

namespace App\Console\Commands;

use App\Models\CarGroups;
use App\Models\CarMakers;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class ParseGroups extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:groups';

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
        $makers = CarMakers::all();
        foreach ($makers as $maker) {
            $data = $client->get('https://tclub.autodoc.co.uk/api/v2/cars/model-groups?maker=' . $maker->id);
            if ($data->getStatusCode() == 200) {
                $groups = $data->getBody()->getContents();
                $groups = json_decode($groups, true, 512, JSON_THROW_ON_ERROR);
                foreach ($groups['data'] as $group) {
                    $localGroup = new CarGroups();
                    $localGroup->id = $group['id'];
                    $localGroup->title = $group['title'];
                    $localGroup->title_formatted = $group['title_translation'];
                    $localGroup->alias = $group['alias'];
                    $localGroup->car_maker_id = $group['maker_id'];
                    $localGroup->save();
                }
            }
        }
        return 0;
    }
}
