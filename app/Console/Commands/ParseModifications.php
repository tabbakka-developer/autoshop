<?php

namespace App\Console\Commands;

use App\Models\CarGroups;
use App\Models\CarModel;
use App\Models\CarModification;
use Illuminate\Console\Command;
use League\Csv\Reader;

class ParseModifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:modifications';

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
        $path = storage_path('app/atd_club_test_car_engines.csv');
        $csv = Reader::createFromPath($path, 'r');

        $csv->setHeaderOffset(0);
        $headers = array_map('trim', $csv->getHeader());
        $pb = $this->output->createProgressBar($csv->count());

        foreach ($csv->getRecords($headers) as $tmpKey => $modification) {
            $localModification = CarModification::query()->find($modification['id']);
            if ($localModification) {
                continue;
            }

            $localModification = new CarModification();
            $localModification->id = $modification['id'];
            $localModification->tecrmi_id = $modification['tecrmi_id'] !== ''
                ? $modification['tecrmi_id']
                : null;
            $localModification->fuel_type = $modification['fuel_type'];
            $localModification->title = $modification['title'];
            $localModification->title_formatted = $modification['title_formatted'];
            $localModification->selector_title = $modification['selector_title'];
            $localModification->alias = $modification['alias'];
            $localModification->maker_id = $modification['maker_id'];
            $localModification->group_id = CarModel::query()->find($modification['model_id'])->car_group_id;
            $localModification->model_id = $modification['model_id'];
            $localModification->engine_capacity = $modification['engine_capacity'] !== ''
                ? $modification['engine_capacity']
                : null;
            $localModification->save();
            $pb->advance();
        }
        $pb->finish();
        return 0;
    }
}
