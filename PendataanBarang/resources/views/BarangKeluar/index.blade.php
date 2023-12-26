@extends('sidebar')
@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-2">
                <style>
                    .flip-horizontal {
                        transform: scaleX(-1)
                    }
                </style>
                <img src="logo_panah.png" alt="" style="" width="50" height="50" class="flip-horizontal">
            </div>
            <div class="col-6 text-start">
                <h3>Data Barang Keluar</h3>
            </div>
            <div class="col-4 text-end">
                <a href="{{ route('barangKeluar.create') }}" class="btn btn-primary btn-block">Tambah data</a>
            </div>
        </div>
        {{-- alert --}}
        @if (session()->has('info'))
            <div class="alert alert-success alert-dismissible fade show mt-3 text-start" role="alert" id="myAlert">
                {{ session()->get('info') }}
            </div>
        @endif
        <div class="mt-4">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th><strong>No</strong></th>
                        <th><strong>Id barang</strong></th>
                        <th><strong>Nama barang</strong></th>
                        <th><strong>Tanggal</strong></th>
                        <th><strong>Jumlah</strong></th>
                        <th><strong>Petugas</strong></th>
                        <th><strong>Transaksi</strong></th>
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
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->users->name }}</td>
                            <td>{{ $item->jenis_transaksi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            // Tunggu 3 detik, lalu sembunyikan alert dengan efek fade
            $("#myAlert").delay(3000).fadeOut("slow");
        });
    </script>
@endsection
