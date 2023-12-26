@extends('sidebar')
@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-2">
                <img src="{{ asset('logo_panah.png') }}" alt="" style="" width="50" height="50">
            </div>
            <div class="col-6 text-start">
                <h3>Tambah Data Barang Masuk</h3>
            </div>
            <div class="col-4">
            </div>
            {{-- <hr class="mt-3 mb-3"> --}}


            <form action="{{ route('barangMasuk.store') }}" method="POST">
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
                                <option value="{{ $item->id }}">{{ $item->nama_barang }} - ID : {{ $item->id }}
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
                <div class="col-12">
                    <div class="col-4">
                        <button class="btn btn-primary mt-4" type="submit">Simpan</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
