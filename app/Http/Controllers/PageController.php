<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerimaan;
use App\Models\Penyaluran;
use App\Models\Pesan;

class PageController extends Controller
{
    public function home()
    {
        return view ('page.home');
    }

    public function guestHome()
    {
        $penerimaan = Penerimaan::where('status','terkonfirmasi')->orderBy('id','desc')->get();
        $penyaluran = Penyaluran::orderBy('id','desc')->get();


        return view ('welcome', ['penerimaan' => $penerimaan, 'penyaluran' => $penyaluran]);

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
