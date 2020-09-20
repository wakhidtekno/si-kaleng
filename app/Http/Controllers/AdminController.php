<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::where('level', '0')->get();

        return view('page.users.admin.index', ['admin'=> $admin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.users.admin.create');
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
            'password' => bcrypt($validateData['nama']),
            'level' => '0',
        ]);


        return redirect()->back()->with('pesan',"Admin dengan username {$validateData['username']} sukses ditambahkan");
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
        $admin = User::findOrFail($id);

        return view('page.users.admin.edit', ['admin' => $admin]);
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
        return redirect()->back()->with('pesan',"Admin dengan username {$validateData['username']} sukses diupdate");

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
        return redirect()->back()->with('pesan',"Admin dengan username $admin->username sukses dihapus");

    }
}
