<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Munfik extends Model
{
    protected $table = 'munfik';

    protected $guarded = [];

    public function kaleng()
    {
        return $this->belongsTo('App\Models\Kaleng');
    }
}
