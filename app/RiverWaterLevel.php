<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiverWaterLevel extends Model
{
    protected $table = "river_water_levels";

    protected $fillable = ['measurement','date'];

}
