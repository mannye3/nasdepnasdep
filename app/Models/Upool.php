<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upool extends Model
{
    use HasFactory;

    public function industry()
    {
        return $this->belongsTo('App\Models\Industry');
    }


    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }




    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }
}
