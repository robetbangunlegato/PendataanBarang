<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transaksis = Transaksi::all();
        return view('BarangMasuk.index')->with('transaksis', $transaksis);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $barangs = Barang::all();
        return view('BarangMasuk.create')->with('barangs',$barangs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $jenis_transaksi='masuk';

        

        $Validasi= $request->validate([
            'Jumlah' => 'required',
            'Nama' => 'required'

        ]);


        DB::table('barangs')->where('id', $Validasi['Nama'])->increment('jumlah', $Validasi['Jumlah']);        

        $transaksis = new Transaksi();
        $transaksis->jumlah=$Validasi['Jumlah'];
        $transaksis->jenis_transaksi=$jenis_transaksi;

        $transaksis->save();


        
        $request->session()->flash('info','Jumlah barang berhasil ditambah!');
        return redirect()->route('barangMasuk.index');

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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



}
