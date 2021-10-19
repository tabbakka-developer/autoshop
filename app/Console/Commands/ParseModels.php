<?php

namespace App\Console\Commands;

use App\Models\CarGroups;
use App\Models\CarModel;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use League\Csv\Reader;

class ParseModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:models';

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
        $path = storage_path('app/atd_club_test_car_models.csv');
        $csv = Reader::createFromPath($path, 'r');

        $csv->setHeaderOffset(0);
        $headers = array_map('trim', $csv->getHeader());
        $pb = $this->output->createProgressBar($csv->count());

        foreach ($csv->getRecords($headers) as $tmpKey => $model) {
            $modelExists = CarModel::query()->find($model['id']);
            if ($modelExists) {
                continue;
            }

            $localModel = new CarModel();
            $localModel->id = $model['id'];
            $localModel->title = $model['title'];
            $localModel->title_formatted = $model['title_formatted'];
            $localModel->alias = $model['alias'];
            $localModel->car_group_id = $model['model_group_id'];
            $localModel->constructions_from = $model['construction_from'];
            $localModel->constructions_to = $model['construction_to'];
            $localModel->save();

            $pb->advance();
        }

        $pb->finish();
        return 0;
    }
}
