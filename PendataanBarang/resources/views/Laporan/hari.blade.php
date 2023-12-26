@extends('sidebar')
@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-2">
                <i class="bi bi-file-earmark-text" style="font-size: 3em"></i>
            </div>
            <div class="col-6 text-start">
                <h3>Laporan Stok Harian</h3>
            </div>
            <div class="col-4 text-end">
            </div>

        </div>
        <form action="{{ route('hari') }}" method="get" class="row g-3 align-items-center">
            <div class="col-auto">
                <select class="form-select" name="hari">
                    <option selected value="">Tanggal</option>
                    @foreach ($hari as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <select class="form-select" name="bulan">
                    <option selected value="">Bulan</option>
                    @foreach ($bulan as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <select class="form-select" name="tahun">
                    <option selected value="">Tahun</option>
                    @foreach ($tahun as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary" type="submit">LIHAT</button>
            </div>
        </form>

        <form action="{{ route('cetakhari') }}" method="get" class="text-end">
            @csrf
            <input type="hidden" name="data" value="{{ encrypt($data) }}">
            <button type="submit" class="btn btn-success text-white">Cetak</button>
        </form>

        {{-- alert --}}
        @if (session()->has('info'))
            <div class="alert alert-success alert-dismissible fade show mt-3 text-start" role="alert">
                {{ session()->get('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mt-4">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th><strong>No</strong></th>
                        <th><strong>Id barang</strong></th>
                        <th><strong>Nama barang</strong></th>
                        <th><strong>Jumlah</strong></th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($transaksis as $item)
                        <tr>
                            <td>{{ $no }}</td>
                            @php
                                $no += 1;
                            @endphp
                            <td>{{ $item->barangs->id }}</td>
                            <td>{{ $item->barangs->nama_barang }}</td>
                            <td>{{ $item->jumlah }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
