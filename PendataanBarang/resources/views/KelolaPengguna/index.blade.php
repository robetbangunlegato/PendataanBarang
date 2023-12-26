@extends('sidebar')
@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-2">
                <i class="bi bi-people-fill" style="font-size: 2em"></i>
            </div>
            <div class="col-6 text-start">
                <h3>Data Pengguna</h3>
            </div>
            <div class="col-4 text-end">
                <a href="{{ route('pengguna.create') }}" class="btn btn-primary btn-block">Tambah data</a>
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
                        <th><strong>Email</strong></th>
                        <th><strong>Nama Pengguna</strong></th>
                        <th><strong>No Pegawai</strong></th>
                        <th><strong>Opsi</strong></th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $no }}</td>
                            @php
                                $no += 1;
                            @endphp
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->id }}</td>
                            <td>
                                <a href="{{ route('pengguna.edit', [$item->id]) }}" class="btn btn-warning">Ubah</a>
                                <button class="btn btn-danger" data-coreui-target="#exampleModal{{ $item->id }}"
                                    data-coreui-toggle="modal">Hapus</button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi hapus</h5>
                                                <button type="button" class="btn-close" data-coreui-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                apakah kamu yakin ingin menghapus akun "{{ $item->email }}" ?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('pengguna.destroy', $item->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="button" class="btn btn-secondary"
                                                        data-coreui-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
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
