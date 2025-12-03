<?php

namespace App\Models\Relations;

use App\Models\CupGeoArea;
use App\Models\CupGeoNazione;
use App\Models\CupGeoProvincia;
use App\Models\CupGeoRegione;

trait CupGeoComuneRelations
{

    public function provincia() {

        return $this->belongsTo(CupGeoProvincia::class, 'provincia_id', null, null);

    }

    public function regione() {

        return $this->belongsTo(CupGeoRegione::class, 'regione_id', null, null);

    }

    public function area() {

        return $this->belongsTo(CupGeoArea::class, 'area_id', null, null);

    }

    public function nazione() {

        return $this->belongsTo(CupGeoNazione::class, 'nazione_id', null, null);

    }


}
