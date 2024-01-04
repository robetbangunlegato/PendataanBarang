<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ambil data yang hanya transaksi keluar
        $transaksis = Transaksi::where('jenis_transaksi', 'keluar')->get();
        return view('BarangKeluar.index')->with('transaksis',$transaksis);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $barangs = Barang::all();
        return view('BarangKeluar.create')->with('barangs', $barangs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $jenis_transaksi='keluar';
        $user_id = Auth::id();

        $Validasi= $request->validate([
            'Jumlah' => 'required',
            'Idbarang' => 'required',
            'Suplier' => 'required'

        ]);

        $jumlah_barang_sekarang = Barang::where('id',$Validasi['Idbarang'])->value('jumlah');

        if ($jumlah_barang_sekarang < $Validasi['Jumlah'] ) {
            $request->session()->flash('info','Jumlah permintaan lebih besar dari jumlah yang tersedia!');
            return redirect()->route('barangKeluar.create');
        }else{
            DB::table('barangs')->where('id', $Validasi['Idbarang'])->decrement('jumlah', $Validasi['Jumlah']);

        $transaksis = new Transaksi();
        $transaksis->jumlah = $Validasi['Jumlah'];
        $transaksis->jenis_transaksi = $jenis_transaksi;
        $transaksis->users_id = $user_id;
        $transaksis->barangs_id = $Validasi['Idbarang'];
        $transaksis->suplier = $Validasi['Suplier'];
        
        $transaksis->save();

        $request->session()->flash('info','Jumlah barang berhasil dikurangi!');
        return redirect()->route('barangKeluar.index');

        }
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
    public function update(Request $request, string $id)
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
