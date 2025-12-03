<?php

namespace App\Models\Relations;

use App\Models\CupGeoAreaMondiale;
use App\Models\CupGeoContinente;
use App\Models\CupGeoNazione;

trait CupGeoNazioneRelations
{

    public function continente() {

        return $this->belongsTo(CupGeoContinente::class, 'continente_id', null, null);
    
    }

    public function area() {

        return $this->belongsTo(CupGeoAreaMondiale::class, 'area_id', null, null);
    
    }

    public function parent() {

        return $this->belongsTo(CupGeoNazione::class, 'parent_id', null, null);

    }

}
