<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $barangs = Barang::all();

        return view('Barang.index')->with('barangs', $barangs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('Barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // variabel nilai default jumlah
        $jumlah=0;

        //validasi input
        $Validasi= $request->validate([
            'Nama' => 'required',
            'Jenis' => 'required',
            'Berat' => 'required'
        ]);

        $barangs = new Barang();
        $barangs->nama_barang=$Validasi['Nama'];
        $barangs->jenis=$Validasi['Jenis'];
        $barangs->jumlah=$jumlah;
        $barangs->berat=$Validasi['Berat'];

        $barangs->save();

        $request->session()->flash('info', 'Data Berhasil Ditambahan');
        return redirect()->route('barang.index');
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
        $barangs = barang::find($id);
        return view('barang.edit')->with('barangs', $barangs);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        
        $Validasi= $request->validate([
            'Nama' => 'required',
            'Jenis' => 'required',
            'Berat' => 'required'
        ]);
        
        $barangs = Barang::find($id);
        $barangs->nama_barang=$Validasi['Nama'];
        $barangs->jenis=$Validasi['Jenis'];
        $barangs->berat=$Validasi['Berat'];
        
        $barangs->update();

        $request->session()->flash('info', 'Data Berhasil Diubah!');
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        $barangs = Barang::find($id);
        $barangs->delete();

        $request->session()->flash('info', 'Data berhasil di hapus!');
        return redirect()->route('barang.index');

    }
}
