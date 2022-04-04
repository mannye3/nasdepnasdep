<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function enterprise()
    {
        return $this->hasMany('App\Models\Enterprise');
    }


    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }


    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }


    public function industry()
    {
        return $this->belongsTo('App\Models\Industry');
    }
}
