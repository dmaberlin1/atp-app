<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = ['number_plate', 'brand_id', 'driver_id'];

    public function setNumberPlateAttribute($value)
    {
        $this->attributes['number_plate'] = strtoupper($value);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class)->withTrashed();
    }
}
