<?php

namespace App\Console\Commands;

use App\Models\CarGroups;
use App\Models\CarMakers;
use App\Models\CarModel;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use League\Csv\Reader;

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
        $path = storage_path('app/atd_club_test_model_groups.csv');
        $csv = Reader::createFromPath($path, 'r');

        $csv->setHeaderOffset(0);
        $headers = array_map('trim', $csv->getHeader());
        $pb = $this->output->createProgressBar($csv->count());

        foreach ($csv->getRecords($headers) as $tmpKey => $group) {
            $groupExist = CarGroups::query()->find($group['id']);
            if ($groupExist) {
                continue;
            }

            $localGroup = new CarGroups();
            $localGroup->id = $group['id'];
            $localGroup->title = $group['title'];
            $localGroup->alias = $group['alias'];
            $localGroup->car_maker_id = $group['maker_id'];
            $localGroup->save();

            $pb->advance();
        }

        $pb->finish();
        return 0;
    }
}
