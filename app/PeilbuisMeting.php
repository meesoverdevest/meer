<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeilbuisMeting extends Model
{
    protected $table = 'peilbuis_meting';

    protected $fillable = [
    	'nap_hoogte_meetpunt', 'meetdatum', 'grondwaterstand', 'nap_hoogte_maaiveld', 'peilbuis_id'
    ];

    public function peilbuis()
    {
    	return $this->belongsTo(Peilbuis::class);
    }
}
