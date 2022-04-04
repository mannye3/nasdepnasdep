<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DdaKyc extends Model
{
    use HasFactory;

     protected $table = 'dda_kycs';

     public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    public function industry()
    {
        return $this->belongsTo('App\Models\Industry');
    }


     public function user()
    {
        return $this->belongsTo('App\Models\User');

    }

    public function contractor() {
        return $this->belongsTo(User::class, "authorized_by", "id");
    }
}
