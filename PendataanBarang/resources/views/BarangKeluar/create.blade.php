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
                <img src="{{ asset('logo_panah.png') }}" alt="" style="" width="50" height="50"
                    class="flip-horizontal">
            </div>
            <div class="col-6 text-start">
                <h3>Tambah Data Barang Keluar</h3>
            </div>
            <div class="col-4">
            </div>
            {{-- <hr class="mt-3 mb-3"> --}}

            {{-- alert --}}
            @if (session()->has('info'))
                <div class="alert alert-danger alert-dismissible fade show mt-3 text-start" role="alert" id="myAlert">
                    {{ session()->get('info') }}
                </div>
            @endif


            <form action="{{ route('barangKeluar.store') }}" method="POST">
                @csrf
                <div class="row g-3 align-items-center mt-4">
                    <div class="col-auto">
                        <label class="col-form-label">Tanggal </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" disabled
                            value="{{ \Carbon\Carbon::now()->toDateString() }}">
                    </div>
                </div>
                <div class="row align-items-center g-3 mt-2">
                    <div class="col-auto">
                        <label for="inputPassword6" class="col-form-label">Nama Barang </label>
                    </div>
                    <div class="col-auto">
                        <select class="form-select" name="Idbarang">
                            <option selected value="">Pilih...</option>
                            @foreach ($barangs as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_barang }} - ID : {{ $item->id }} -
                                    Jumlah : {{ $item->jumlah }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-3">
                    <div class="col-auto">
                        <label for="berat" class="col-form-label">Jumlah </label>
                    </div>
                    <div class="col-auto">
                        <input type="number" name="Jumlah" class="form-control" min="0">
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-3">
                    <div class="col-auto">
                        <label for="berat" class="col-form-label">Suplier </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="Suplier" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="col-4">
                        <button class="btn btn-primary mt-4" type="submit">Simpan</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Tunggu 3 detik, lalu sembunyikan alert dengan efek fade
            $("#myAlert").delay(3000).fadeOut("slow");
        });
    </script>
@endsection
