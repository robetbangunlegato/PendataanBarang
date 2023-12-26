<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('KelolaPengguna.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('KelolaPengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $Validasi=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jabatan' => 'required',
            'notelp'=> 'required'
        ]);


        $users = new User();
        $users->name = $Validasi['name'];
        $users->email = $Validasi['email'];
        $users->password = bcrypt($Validasi['password']);
        $users->role = $Validasi['jabatan'];
        $users->telp_number = $Validasi['notelp'];
        $users->save();

        $request->session()->flash('info', 'Data pengguna berhasil ditambahkan');
        return redirect()->route('pengguna.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $users = User::find($id);
        return view('KelolaPengguna.edit')->with('users',$users);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        //
        $users = User::find($id);
        $users->delete();

        $request->session()->flash('info', 'Data pengguna berhasil dihapus!');
        return redirect()->route('pengguna.index');
    }
}
