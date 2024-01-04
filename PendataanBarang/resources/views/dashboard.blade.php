@extends('sidebar')
@section('content')
    <div class="alert alert-success text-end" role="alert">
        <svg class="icon icon-lg" style="margin-right: 1%">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-calendar') }}"></use>
        </svg>{{ $waktu }}
    </div>
    <div class="card mb-3" style="max-width: 100%;">
        <div class="row g-0">
            <div class="col-6">
                <img src="{{ asset('logo_perusahaan.jpg') }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-6">
                <div class="card-body">
                    <h5 class="card-title">Selamat Datang di Aplikasi Stok Barang.</h5>
                    <p class="card-title mb-3">saat ini anda login sebagai {{ auth()->user()->role }}</p>
                    <p class="card-text">Nama : {{ auth()->user()->name }}</p>
                    <p class="card-text">Id : {{ auth()->user()->id }}</p>
                    <p class="card-text">Jabatan : {{ auth()->user()->role }}</p>
                    <p class="card-text">Nomor telpon : {{ auth()->user()->telp_number }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
