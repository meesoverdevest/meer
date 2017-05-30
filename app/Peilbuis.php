<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peilbuis extends Model
{
    protected $table = 'peilbuizen';

    protected $fillable = [
    	'peilbuiscode', 'straat', 'huisnummer', 'longitude', 'latitude'
    ];

    public function metingen()
    {
    	return $this->hasMany(PeilbuisMeting::class);
    }
}
