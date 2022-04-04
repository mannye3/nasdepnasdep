<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incubator extends Model
{
    use HasFactory;

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }


    public function pool()
    {
        return $this->hasMany('App\Models\Pool');
    }


    public function enterprise()
    {
        return $this->hasMany('App\Models\Enterprise');
    }
}
