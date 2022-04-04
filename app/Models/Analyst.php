<?php

namespace App\Models;

use App\Models\Analyst;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Analyst extends Model
{
    use HasFactory;
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
