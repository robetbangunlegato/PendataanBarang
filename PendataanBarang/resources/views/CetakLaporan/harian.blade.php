<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="form-group">
        <h2 style="text-align: center; margin-top: 1em; margin-bottom: 1em;">Laporan Stok Barang Harian</h2>
        <table class="table table-striped table-bordered" align="center" style="width: 95%">
            <thead>
                <tr class="text-center">
                    <th><strong>No</strong></th>
                    <th><strong>Id barang</strong></th>
                    <th><strong>Nama barang</strong></th>
                    <th><strong>Jumlah</strong></th>
                    <th><strong>Petugas</strong></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $item)
                    <tr class="align-middle text-center">
                        <td>{{ $no }}</td>
                        @php
                            $no += 1;
                        @endphp
                        <td>{{ $item->barangs_id }}</td>
                        <td>{{ $item->barangs->nama_barang }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->users->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

<script type="text/javascript">
    window.print();
</script>
