<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Munfik;
use App\Models\Kaleng;

class MunfikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $munfik = Munfik::all();
        return view('page.munfik.index', ['munfik' => $munfik]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kaleng = Kaleng::where('status','0')->get();
        return view('page.munfik.create', ['kaleng' => $kaleng]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'rt' =>'required',
            'rw' => 'required',
            'kaleng_id' => 'required|unique:munfik',
        ]);

        Kaleng::where('id',$validateData['kaleng_id'])->update(['status'=> '1']);
        Munfik::create($validateData);

        return redirect()->back()->with('pesan',"Munfik dengan nama {$validateData['nama']} sukses ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kaleng = Kaleng::all();
        $munfik = Munfik::findOrFail($id);
        return view('page.munfik.edit', ['munfik' => $munfik, 'kaleng' => $kaleng]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'rt' =>'required',
            'rw' => 'required'
        ]);

        Munfik::where('id',$id)->update($validateData);
        return redirect()->back()->with('pesan',"Munfik dengan nama {$validateData['nama']} sukses diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $munfik = Munfik::findOrFail($id);
        Munfik::where('id',$id)->delete();

        return redirect()->route('munfik.index')->with('pesan',"Munfik dengan nama $munfik->nama sukses dihapus");
    }
}
