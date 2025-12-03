<?php

namespace App\Models\Relations;

use App\Models\CupGeoArea;

trait CupGeoRegioneRelations
{

    public function area() {

        return $this->belongsTo(CupGeoArea::class, 'area_id', null, null);
    
    }



}
