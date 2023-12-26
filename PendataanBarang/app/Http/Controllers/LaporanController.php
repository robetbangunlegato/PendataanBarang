<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data_filter='';

        $data_tahun = Transaksi::selectRaw('YEAR(created_at) as year')->distinct()->pluck('year');
        $transaksis = Transaksi::all();
        return view('Laporan.index')
        ->with('transaksis', $transaksis)
        ->with('tahun',$data_tahun)
        ->with('data', $data_filter);
    }

    public function getDataByYear(Request $request){

        $Validasi=$request->validate([
            'tahun' => 'required'
        ]);

        $data_filter = [
            $Validasi['tahun']
        ];

        $data = Transaksi::whereYear('created_at', $Validasi['tahun'])->get();

        $data_tahun = Transaksi::selectRaw('YEAR(created_at) as year')->distinct()->pluck('year');

        return view('Laporan.index')
        ->with('transaksis', $data)
        ->with('tahun', $data_tahun)
        ->with('data', $data_filter)
        ;
    }


    public function printByYear(Request $request){
        $data_filter = $request->input('data');
        $decrypt_data_filter = decrypt($data_filter);

        $tahun = $decrypt_data_filter[0];

        $data_kirim = Transaksi::whereYear('created_at', $tahun)->get();

        return view('CetakLaporan.tahunan')
        ->with('data', $data_kirim);
        
    }


    public function indexMonth(Request $request){

        $data_filter = '';

        $data_bulan = Transaksi::selectRaw('MONTH(created_at) as month')->distinct()->pluck('month');
        $data_tahun = Transaksi::selectRaw('YEAR(created_at) as year')->distinct()->pluck('year');
        $transaksis = Transaksi::all();

        return view('Laporan.bulan')
        ->with('transaksis', $transaksis)
        ->with('tahun',$data_tahun)
        ->with('bulan', $data_bulan)
        ->with('data', $data_filter);
    }

    public function getDataByMonth(Request $request){ 

        $Validasi=$request->validate([
            'tahun' => 'required',
            'bulan' => 'required'
        ]);

        $data_filter = [
            $Validasi['tahun'],
            $Validasi['bulan'],
        ];

        $data = Transaksi::whereYear('created_at', $Validasi['tahun'])
        ->whereMonth('created_at', $Validasi['bulan'])
        ->get();

        $data_bulan = Transaksi::selectRaw('MONTH(created_at) as month')
        ->distinct()
        ->pluck('month');

        $data_tahun = Transaksi::selectRaw('YEAR(created_at) as year')
        ->distinct()
        ->pluck('year');

        $transaksis = Transaksi::all();

        return view('Laporan.bulan')
        ->with('transaksis', $transaksis)
        ->with('tahun',$data_tahun)
        ->with('bulan', $data_bulan)
        ->with('transaksis', $data)
        ->with('data', $data_filter);
    }

        public function printByMonth(Request $request){
        $data_filter = $request->input('data');
        $decrypt_data_filter = decrypt($data_filter);

        

        $tahun = $decrypt_data_filter[0];
        $bulan = $decrypt_data_filter[1];

        $data_kirim = Transaksi::whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->get();

        return view('CetakLaporan.bulanan')
        ->with('data', $data_kirim);
    }


    public function indexDay(){

        $data_filter = '';

        $data_hari = Transaksi::selectRaw('DAY(created_at) as day')
        ->distinct()
        ->pluck('day');

        $data_bulan = Transaksi::selectRaw('MONTH(created_at) as month')
        ->distinct()
        ->pluck('month');
        
        $data_tahun = Transaksi::selectRaw('YEAR(created_at) as year')
        ->distinct()
        ->pluck('year');

        $transaksis = Transaksi::all();

        return view('Laporan.hari')
        ->with('transaksis', $transaksis)
        ->with('tahun',$data_tahun)
        ->with('bulan', $data_bulan)
        ->with('hari', $data_hari)
        ->with('data', $data_filter);

    }


    public function getDataByDay(Request $request){

        $Validasi=$request->validate([
            'tahun' => 'required',
            'bulan' => 'required',
            'hari' => 'required'
        ]);

        $data_filter = [
            $Validasi['tahun'],
            $Validasi['bulan'],
            $Validasi['hari']
        ];

        $data = Transaksi::whereYear('created_at', $Validasi['tahun'])
        ->whereMonth('created_at', $Validasi['bulan'])
        ->whereDay('created_at', $Validasi['hari'])
        ->get();

        $data_hari = Transaksi::selectRaw('DAY(created_at) as day')
        ->distinct()
        ->pluck('day');

        $data_bulan = Transaksi::selectRaw('MONTH(created_at) as month')
        ->distinct()
        ->pluck('month');

        $data_tahun = Transaksi::selectRaw('YEAR(created_at) as year')
        ->distinct()
        ->pluck('year');

        $transaksis = Transaksi::all();

        return view('Laporan.hari')
        ->with('transaksis', $transaksis)
        ->with('tahun',$data_tahun)
        ->with('bulan', $data_bulan)
        ->with('hari', $data_hari)
        ->with('transaksis', $data)
        ->with('data', $data_filter);
    }


    public function printByDay(Request $request){

        $data_filter = $request->input('data');
        $decrypt_data_filter = decrypt($data_filter);

        $tahun = $decrypt_data_filter[0];
        $bulan = $decrypt_data_filter[1];
        $hari = $decrypt_data_filter[2];

        $data_kirim = Transaksi::whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->whereDay('created_at', $hari)
            ->get();

        return view('CetakLaporan.harian')->with('data', $data_kirim);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
