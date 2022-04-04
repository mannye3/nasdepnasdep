<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    use HasFactory;

    public function industry()
    {
        return $this->belongsTo('App\Models\Industry');
    }



    public function incubator()
    {
        return $this->belongsTo('App\Models\Incubator');
    }
}
