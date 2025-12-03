<?php

namespace Modules\CupGeo\Database\Seeders;

use App\Models\CupGeoArea;
use App\Models\CupGeoAreaMondiale;
use App\Models\CupGeoComune;
use App\Models\CupGeoContinente;
use App\Models\CupGeoNazione;
use App\Models\CupGeoProvincia;
use App\Models\CupGeoRegione;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Nwidart\Modules\Facades\Module;

class GeograficheTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $module = Module::find('CupGeo');

        $modulePath = $module->getPath();

        $dataPath = $modulePath . '/database/data/';

        $entities = [
            [
                'table' => 'cup_geo_aree_mondiali',
                'model' => CupGeoAreaMondiale::class,
            ],
            [
                'table' => 'cup_geo_aree',
                'model' => CupGeoArea::class,
            ],
            [
                'table' => 'cup_geo_continenti',
                'model' => CupGeoContinente::class,
            ],
            [
                'table' => 'cup_geo_nazioni',
                'model' => CupGeoNazione::class,
            ],
            [
                'table' => 'cup_geo_regioni',
                'model' => CupGeoRegione::class,
            ],
            [
                'table' => 'cup_geo_province',
                'model' => CupGeoProvincia::class,
            ],
            [
                'table' => 'cup_geo_comuni',
                'model' => CupGeoComune::class,
            ],
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        foreach (array_reverse($entities) as $entity) {

            $table = Arr::get($entity,'table');
            if (!$table) {
                throw new \Exception("Tabella o modello non trovato: " . print_r($entity,true));
            }
            echo "TRUNCATE TABLE ". $table . "\n";
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        foreach ($entities as $entity) {


            $table = Arr::get($entity,'table');
            $modelName = Arr::get($entity,'model');

            if (!$table || !$modelName) {
                throw new \Exception("Tabella o modello non trovato: " . print_r($entity,true));
            }
            echo "SEED TABLE ". $table . "\n";
            echo "SEED MODEL ". $modelName . "\n";

            $recordsPath = $table;


            $recordsData = File::get($dataPath . $recordsPath . '.json');

//        Log::info($recordsData);
            $recordsData = json_decode($recordsData, true);

            foreach ($recordsData as $recordData) {

                $model = new $modelName();
                $model->forceFill($recordData);
                $saved = $model->save();

            }
        }

    }
}
