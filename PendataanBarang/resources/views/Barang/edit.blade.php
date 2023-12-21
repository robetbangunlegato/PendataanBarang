@extends('sidebar')
@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-2">
                <img src="{{ asset('logo_panah.png') }}" alt="" style="" width="50" height="50">
            </div>
            <div class="col-6 text-start">
                <h3>Ubah Data Barang</h3>
            </div>
            <div class="col-4">
            </div>
            <hr class="mt-3 mb-3">

            {{-- Formulir tambah barang --}}
            <form action="{{ route('barang.update', [$barangs->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="nama" class="col-form-label">Nama Pupuk : </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="nama" class="form-control" name="Nama"
                            value="{{ $barangs->nama_barang }}">
                    </div>
                </div>
                <div class="row align-items-center g-3 mt-2">
                    <div class="col-auto">
                        <label for="inputPassword6" class="col-form-label">Jenis Pupuk : </label>
                    </div>
                    <div class="col-auto">
                        <select name="Jenis" class="form-select">
                            <option value="organik" @if ($barangs->jenis === 'organik') selected @endif>organik</option>
                            <option value="non-organik" @if ($barangs->jenis === 'non-organik') selected @endif>non-organik
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-3">
                    <div class="col-auto">
                        <label for="berat" class="col-form-label">Berat Pupuk (Kg) : </label>
                    </div>
                    <div class="col-auto">
                        <input type="number" id="berat" name="Berat" class="form-control"
                            value="{{ $barangs->berat }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="col-4">
                        <button class="btn btn-primary mt-4" type="submit">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
