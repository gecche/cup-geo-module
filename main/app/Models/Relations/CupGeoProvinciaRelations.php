<?php

namespace App\Models\Relations;

use App\Models\CupGeoArea;
use App\Models\CupGeoComune;
use App\Models\CupGeoRegione;

trait CupGeoProvinciaRelations
{

    public function regione() {

        return $this->belongsTo(CupGeoRegione::class, 'regione_id', null, null);

    }

    public function area() {

        return $this->belongsTo(CupGeoArea::class, 'area_id', null, null);

    }

    public function comuni() {

        return $this->hasMany(CupGeoComune::class, 'provincia_id', null);

    }


}
