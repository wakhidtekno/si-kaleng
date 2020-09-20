<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kaleng extends Model
{
    protected $table = 'kaleng';

    protected $guarded = [];

    public function munfik()
    {
        return $this->hasOne('App\Models\Munfik');
    }
    public function penerimaan()
    {
        return $this->hasMany('App\Models\Penerimaan');
    }
}
