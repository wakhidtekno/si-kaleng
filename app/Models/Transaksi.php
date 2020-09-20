<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $guarded = [];

    public function saldo()
    {
        return $this->belongsTo('App\Models\Saldo');
    }

    public function penerimaan()
    {
        return $this->belongsTo('App\Models\Penerimaan');
    }

    public function penyaluran()
    {
        return $this->belongsTo('App\Models\Penyaluran');
    }
}
