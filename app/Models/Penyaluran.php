<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyaluran extends Model
{
    protected $table = 'penyaluran';

    protected $guarded = [];

    public function transaksi()
    {
        return $this->belongsTo('App\Models\Transaksi');
    }
}
