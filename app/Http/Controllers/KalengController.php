<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kaleng;

class KalengController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kaleng = Kaleng::all();

        return view('page.kaleng.index', ['kaleng' => $kaleng]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.kaleng.create');
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
            'no_register' => 'required|numeric|unique:kaleng',
        ]);

        Kaleng::create($validateData);

        return redirect()->back()->with('pesan',"kaleng dengan no register {$validateData['no_register']} sukses ditambahkan");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kaleng = Kaleng::findOrFail($id);

        return view('page.kaleng.edit', ['kaleng' => $kaleng]);

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
            'no_register' => 'required|numeric|unique:kaleng,no_register,'.$id,
        ]);

        Kaleng::where('id',$id)->update($validateData);

        return redirect()->back()->with('pesan',"Kaleng dengan no register {$validateData['no_register']} sukses diupdate");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kaleng = Kaleng::findOrFail($id);
        Kaleng::where('id',$id)->delete();
        return redirect()->back()->with('pesan',"Kaleng dengan no register {$kaleng->no_register} sukses dihapus");

    }
}
