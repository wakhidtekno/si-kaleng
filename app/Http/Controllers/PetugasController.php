<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = User::where('level','1')->get();

        return view('page.users.petugas.index', ['petugas'=> $petugas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.users.petugas.create');
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
            'username' => 'required|alpha_dash|unique:users',
            'nama' => 'required',
            'password' => 'required|min:3',
        ]);

        User::create([
            'username' => $validateData['username'],
            'nama' => $validateData['nama'],
            'password' => bcrypt($validateData['password']),
            'level' => '1',
        ]);



        return redirect()->back()->with('pesan',"Petugas dengan username {$validateData['username']} sukses ditambahkan");

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
        $petugas = User::findOrFail($id);

        return view('page.users.petugas.edit', ['petugas' => $petugas]);

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
            'username' => 'required|alpha_dash|unique:users,username,'.$id,
            'nama' => 'required',
            'password' => 'required|min:3',
        ]);

        User::where('id',$id)->update($validateData);
        return redirect()->back()->with('pesan',"Petugas dengan username {$validateData['username']} sukses diupdate");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::findOrFail($id);

        User::where('id',$id)->delete();
        return redirect()->back()->with('pesan',"Petugas dengan username $admin->username sukses dihapus");

    }
}
