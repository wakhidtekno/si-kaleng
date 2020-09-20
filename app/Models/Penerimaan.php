<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    protected $table = 'penerimaan';

    protected $guarded = [];

    public function transaksi()
    {
        return $this->belongsTo('App\Models\Transaksi');
    }
    public function kaleng()
    {
        return $this->belongsTo('App\Models\Kaleng');
    }
}
