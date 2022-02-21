<?php

namespace Modules\CupGeo\Models;

use App\Models\CupGeoArea;
use App\Models\CupGeoProvincia;
use App\Models\CupGeoRegione;
use App\Models\CupGeoNazione;
use Gecche\Cupparis\App\Breeze\Breeze;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * Breeze (Eloquent) model for T_COMUNE table.
 */
class CupGeoComune extends Breeze
{

//    use ModelWithUploadsTrait;

    protected $table = 'cup_geo_comuni';

    protected $guarded = ['id'];

    public $timestamps = false;
    public $ownerships = false;

    public $appends = [
        'nazione_iso3',
        'multicap',
        'precap',
    ];


    public static $relationsData = [

        'provincia' => [self::BELONGS_TO, 'related' => CupGeoProvincia::class, 'table' => 'cup_geo_province', 'foreignKey' => 'provincia_id'],
        'regione' => [self::BELONGS_TO, 'related' => CupGeoRegione::class, 'table' => 'cup_geo_regioni', 'foreignKey' => 'regione_id'],
        'area' => [self::BELONGS_TO, 'related' => CupGeoArea::class, 'table' => 'cup_geo_aree', 'foreignKey' => 'area_id'],
        'nazione' => [self::BELONGS_TO, 'related' => CupGeoNazione::class, 'table' => 'cup_geo_nazioni', 'foreignKey' => 'nazione_id'],


//        'belongsto' => array(self::BELONGS_TO, Comune::class, 'foreignKey' => '<FOREIGNKEYNAME>'),
//        'belongstomany' => array(self::BELONGS_TO_MANY, Comune::class, 'table' => '<TABLEPIVOTNAME>','pivotKeys' => [],'foreignKey' => '<FOREIGNKEYNAME>','otherKey' => '<OTHERKEYNAME>') ,
//        'hasmany' => array(self::HAS_MANY, Comune::class, 'table' => '<TABLENAME>','foreignKey' => '<FOREIGNKEYNAME>'),
    ];

    public static $rules = [
//        'username' => 'required|between:4,255|unique:users,username',
    ];

    public $columnsForSelectList = ['nome_it', 'codice_istat'];
    //['id','nome_it'];

    public $defaultOrderColumns = ['nome_it' => 'ASC',];
    //['cognome' => 'ASC','nome' => 'ASC'];

    public $columnsSearchAutoComplete = ['nome_it', 'codice_istat'];
    //['cognome','denominazione','codicefiscale','partitaiva'];

    public $nItemsAutoComplete = 20;
    public $nItemsForSelectList = 100;
    public $itemNoneForSelectList = false;
    public $fieldsSeparator = ' - ';

    public function save(array $options = [])
    {

        $oldProvinciaId = $this->getOriginal('provincia_id');
        $newProvinciaId = $this->provincia_id;

        if ($oldProvinciaId !== $newProvinciaId) {
            $provincia = CupGeoProvincia::find($this->provincia_id);
            if ($provincia && $provincia->getKey()) {
                $this->area_id = $provincia->area_id;
                $this->regione_id = $provincia->regione_id;
                $this->sigla_provincia = $provincia->sigla;
            }
        }

        $saved = parent::save($options); // TODO: Change the autogenerated stub

        return $saved;

    }

    public function getMulticapAttribute() {
        $value = strtolower($this->cap);
        if (Str::endsWith($value,'x')) {
            $preCap = substr($value,0,-2);
            $value = $preCap . '00 - ('.$value.')';
        }
        return $value;
    }

    public function getPrecapAttribute() {
        $value = strtolower($this->cap);
        if (Str::endsWith($value,'x')) {
            $preCap = substr($value,0,-2);
            $value = $preCap . '00';
        }
        return $value;
    }

    public function getNazioneIso3Attribute() {
        return $this->nazione_id ? $this->nazione->codice_iso_3 : null;
    }

//    public function setCompletionItem($result, $labelColumns)
//    {
//        $this->setCompletionItemFunction(
//            function ($item) use ($labelColumns) {
//                $filteredItem = [];
//                $item = $item->toArray();
//                $itemDotted = Arr::dot($item);
//                foreach ($labelColumns as $column) {
//                    $chunks = explode('|', $column);
//                    if (count($chunks) > 1) {
//                        $relationField = implode('.',$chunks);
//                        if ($column == 'nazione|codice_iso_3') {
//                            $columnValue = Arr::get($itemDotted,$relationField,'ITA');
//                        } else {
//                            $columnValue = Arr::get($itemDotted,$relationField);
//                        }
//                    } else {
//                        $columnValue = Arr::get($item,$column);
//                    }
//                    $filteredItem[$column] = $columnValue;
//                }
//
//                return $filteredItem;
//            }
//        );
//        return parent::setCompletionItem($result,$labelColumns);
//    }
}

