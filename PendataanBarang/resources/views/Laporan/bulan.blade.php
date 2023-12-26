@extends('sidebar')
@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-2">
                {{-- <img src="logo_panah.png" alt="" style="" > --}}
                <i class="bi bi-file-earmark-text" style="font-size: 3em"></i>
            </div>
            <div class="col-6 text-start">
                <h3>Laporan Stok Bulanan</h3>
            </div>
            <div class="col-4 text-end">
                {{-- <a href="" class="btn btn-primary btn-block">Tambah data</a> --}}
            </div>

        </div>
        <div class="row">
            <form action="{{ route('bulan') }}" method="get" style="display: flex;">
                <div class="col-3">
                    <select class="form-select" name="bulan">
                        <option selected value="">Bulan</option>
                        @foreach ($bulan as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3" style="margin-left: 1em">
                    <select class="form-select" name="tahun">
                        <option selected value="">Tahun</option>
                        @foreach ($tahun as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto text-start" style="margin-left: 1em">
                    <button class="btn btn-primary" type="submit">LIHAT</button>
                </div>
            </form>
        </div>
        <form action="{{ route('cetakbulan') }}" method="get" class="text-end">
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
