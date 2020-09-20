<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::orderBy('id','desc')->get();

        return view('page.transaksi.index',['transaksi' => $transaksi]);
    }
}
