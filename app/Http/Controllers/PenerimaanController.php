<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerimaan;
use App\Models\Kaleng;
use App\Models\Munfik;
use App\Models\Transaksi;
use App\Models\Saldo;
use Illuminate\Support\Facades\DB;

class PenerimaanController extends Controller
{
    public function index()
    {
        $penerimaan = Penerimaan::orderBy('id','desc')->get();

        return view('page.penerimaan.index', ['penerimaan' => $penerimaan]);
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
        $munfik = Munfik::all();
        return view('page.penerimaan.create', ['munfik' => $munfik, 'bulan' => $bulan]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kaleng_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required|regex:/^([0-9]{4})?$/',
            'jumlah' => 'required|numeric',
        ]);
        $validateData['petugas'] = auth()->user()->nama;
        $validateData['status'] = 'menunggu konfirmasi';

        $kaleng = Kaleng::findOrFail($validateData['kaleng_id']);



        Penerimaan::create($validateData);

        return redirect()->back()->with('pesan',"Penerimaan infaq dari kaleng {$kaleng->no_register} sukses diinput");

    }

    public function konfirmasi($id)
    {
        DB::BeginTransaction();
        $penerimaan = Penerimaan::findOrFail($id);
        $kaleng = Kaleng::findOrFail($penerimaan->kaleng->id);
        if(Saldo::all()->count() == 0)
        {
            $saldo_sekarang = 0;
            $total_saldo = $saldo_sekarang + $penerimaan->jumlah;
        }else {
            $saldo_sekarang = Saldo::orderBy('id','desc')->first();
            $total_saldo = $saldo_sekarang->total + $penerimaan->jumlah;
        }


        $saldo = Saldo::create([
            'total' => $total_saldo,
            'bulan' => $penerimaan->bulan,
            'tahun' => $penerimaan->tahun,
            ]);

        $transaksi = Transaksi::create([
            'jumlah' => $penerimaan->jumlah,
            'tipe' => 'penerimaan',
            'saldo_id' => $saldo->id,
            'bulan' => $penerimaan->bulan,
            'tahun' => $penerimaan->tahun,
            ]);
        $penerimaan = Penerimaan::where('id',$id)->update([
            'status' => 'terkonfirmasi',
            'transaksi_id' => $transaksi->id,
        ]);

        if (!$saldo || !$transaksi || !$penerimaan ) {
            DB::rollback();
        }else {
            DB::commit();
            return redirect()->back()->with('pesan',"Penerimaan infaq dari kaleng {$kaleng->no_register} sukses dikonfirmasi");
        }


    }

    public function edit($id)
    {
        $penerimaan = Penerimaan::findOrFail($id);
        $munfik = Munfik::all();
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

        return view('page.penerimaan.edit',['penerimaan' => $penerimaan,'bulan' => $bulan, 'munfik' => $munfik]);
    }

    public function update(Request $request, $id)
    {
        $penerimaan = Penerimaan::findOrFail($id);
        $validateData = $request->validate([
            'kaleng_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required|regex:/^([0-9]{4})?$/',
            'jumlah' => 'required|numeric',
        ]);

        Penerimaan::where('id', $id)->update($validateData);
        return redirect()->back()->with('pesan',"Penerimaan infaq sukses diupdate");

    }

    public function laporan()
    {
        $penerimaan = Penerimaan::where('status','terkonfirmasi')->orderBy('id','desc')->get();

        return view('page.penerimaan.laporan', ['penerimaan' => $penerimaan]);
    }

    public function destroy($id)
    {
        $penerimaan = Penerimaan::findOrFail($id);

        Penerimaan::where('id',$id)->delete();

        return redirect()->back()->with('pesan',"Penerimaan infaq dengan id {$penerimaan->id} berhasil dihapus");

    }
}

