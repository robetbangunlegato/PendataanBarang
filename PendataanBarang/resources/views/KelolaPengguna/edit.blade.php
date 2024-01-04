@extends('sidebar')
@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-2">
                <i class="bi bi-people-fill" style="font-size: 2em"></i>
            </div>
            <div class="col-6 text-start">
                <h3>Ubah Data Pengguna</h3>
            </div>
            <div class="col-4">
            </div>
            <hr class="mt-3 mb-3">

            {{-- Formulir ubah pengguna --}}
            <form action="{{ route('pengguna.update', [$users->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="row g-3 align-items-center mt-3">
                    <div class="col-auto">
                        <label for="berat" class="col-form-label">Nama : </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="name" class="form-control" value="{{ $users->name }}">
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-3">
                    <div class="col-auto">
                        <label class="col-form-label">Email : </label>
                    </div>
                    <div class="col-auto">
                        <input type="email" name="email" class="form-control" value="{{ $users->email }}">
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-3">
                    <div class="col-auto">
                        <label for="berat" class="col-form-label">Jabatan : </label>
                    </div>
                    <div class="col-auto">
                        <select class="form-select" name="jabatan">
                            <option selected value="gudang" @if ($users->role === 'gudang') selected @endif>Gudang
                            </option>
                            <option value="admin" @if ($users->role === 'admin') selected @endif>Admin</option>
                            <option value="direktur" @if ($users->role === 'direktur') selected @endif>Direktur</option>
                        </select>
                    </div>
                </div>
                <div class="row g-3 align-items-center mt-3">
                    <div class="col-auto">
                        <label class="col-form-label">No. Telepon : </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="notelp" class="form-control" value="{{ $users->telp_number }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="col-4">
                        <button class="btn btn-primary mt-4" type="submit">Ubah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
