<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saldo;

class SaldoController extends Controller
{
    public function index()
    {
        $saldo = Saldo::orderBy('id','desc')->get();
        return view('page.saldo.index', ['saldo' => $saldo]);
    }
}
