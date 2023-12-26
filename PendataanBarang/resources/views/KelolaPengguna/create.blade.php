@extends('sidebar')
@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-2">
                <i class="bi bi-people-fill" style="font-size: 2em"></i>
            </div>
            <div class="col-6 text-start">
                <h3>Tambah Data Pengguna</h3>
            </div>
            <div class="col-4">
            </div>
            <hr class="mt-3 mb-3">

            {{-- Formulir tambah pengguna --}}
            <form action="{{ route('pengguna.store') }}" method="POST">
                @csrf
                <div class="row g-3 align-items-center mt-3">
                    <div class="col-auto">
                        <label for="berat" class="col-form-label">Nama : </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-3">
                    <div class="col-auto">
                        <label class="col-form-label">Email : </label>
                    </div>
                    <div class="col-auto">
                        <input type="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-3">
                    <div class="col-auto">
                        <label for="berat" class="col-form-label">Password : </label>
                    </div>
                    <div class="col-auto">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-3">
                    <div class="col-auto">
                        <label for="berat" class="col-form-label">Jabatan : </label>
                    </div>
                    <div class="col-auto">
                        <select class="form-select" name="jabatan">
                            <option selected value="">Pilih...</option>
                            <option value="gudang">Gudang</option>
                            <option value="admin">Admin</option>
                            <option value="direktur">Direktur</option>
                        </select>
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-3">
                    <div class="col-auto">
                        <label class="col-form-label">No. Telepon : </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="notelp" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="col-4">
                        <button class="btn btn-primary mt-4" type="submit">Tambah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
