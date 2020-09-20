<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyaluran;
use App\Models\Kaleng;
use App\Models\Munfik;
use App\Models\Transaksi;
use App\Models\Saldo;
use Illuminate\Support\Facades\DB;

class PenyaluranController extends Controller
{
    public function index()
    {
        $penyaluran = Penyaluran::orderBy('id','desc')->get();
        return view('page.penyaluran.index', ['penyaluran' => $penyaluran]);
    }

    public function create()
    {
        $bulan = [
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        return view('page.penyaluran.create', ['bulan' => $bulan]);
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        $validateData = $request->validate([
            'jumlah' => 'required|numeric',
            'bulan' => 'required',
            'tahun' => 'required',
            'keperluan' => 'required',
        ]);

        $saldo_sekarang = Saldo::orderBy('id','desc')->first();
        $total_saldo = $saldo_sekarang->total - $request->jumlah;

        $saldo = Saldo::create([
            'total' => $total_saldo,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);

        $transaksi = Transaksi::create([
            'jumlah' => $request->jumlah,
            'tipe' => 'penyaluran',
            'saldo_id' => $saldo->id,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);

        $validateData['transaksi_id'] = $transaksi->id;

        $penyaluran = Penyaluran::create($validateData);

        if (!$saldo || !$transaksi || !$penyaluran ) {
            DB::rollback();
        }else {
            DB::commit();
            return redirect()->back()->with('pesan',"Penyaluran infaq dengan id {$penyaluran->id} telah berhasil");
        }
    }
}
