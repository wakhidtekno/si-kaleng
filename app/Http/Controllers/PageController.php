<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerimaan;
use App\Models\Penyaluran;
use App\Models\Pesan;
use App\Models\Saldo;

class PageController extends Controller
{
    public function home()
    {
        if(Saldo::all()->count() == 0)
        {
            $saldo = 0;
        }
        else{
        $saldo = Saldo::orderBy('id','desc')->first()->total;
        }
        return view ('page.home',['saldo' => $saldo]);
    }

    public function guestHome()
    {
        if(Saldo::all()->count() == 0)
        {
            $saldo = 0;
        }
        else{
        $saldo = Saldo::orderBy('id','desc')->first()->total;
        }
        $penerimaan = Penerimaan::where('status','terkonfirmasi')->orderBy('id','desc')->get();
        $penyaluran = Penyaluran::orderBy('id','desc')->get();


        return view ('welcome', ['saldo' => $saldo, 'penerimaan' => $penerimaan, 'penyaluran' => $penyaluran]);

    }

    public function pesan(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'hp' => 'required|numeric',
            'pesan' => 'required'
        ]);

        Pesan::create($validateData);

        return redirect()->back()->with('pesan',"Pesan sukses dikirim");

    }

    public function getPesan()
    {
        $pesan = Pesan::orderBy('id','desc')->get();

        return view('page.pesan.index', ['pesan' => $pesan]);
    }
}
