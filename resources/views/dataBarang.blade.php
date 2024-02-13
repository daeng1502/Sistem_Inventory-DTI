<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Item </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h2 class="text-left ms-3">Aplikasi Inventaris</h2>
    <h4 class="text-left ms-3 mb-5">DIREKTORAT TEKNOLOGI INFORMASI</h4>

    
    <!-- Your HTML layout -->
<div class="container">
    <div class="position-relative">
        <a href="/tambahBarang" class="btn btn-primary position-absolute bottom-0 end-0 mt-4">Tambah Barang</a>
    </div>
        <div class="row">
        @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
            {{$message}}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Spesifikasi</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">No Kontak</th>
                    <th scope="col">Nama Kontrak</th>
                    <th scope="col">Tanggal Kontrak</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Tanggal Perolehan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($data as $row)
                <tr>
                    <td>{{ $row->SN }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->merk }}</td>
                    <td>{{ $row->spesifikasi }}</td>
                    <td>{{ $row->jumlah_barang }}</td>
                    <td>{{ $row->no_kontrak }}</td>
                    <td>{{ $row->nama_kontrak }}</td>
                    <td>{{ $row->tgl_kontrak }}</td>
                    <td>{{ $row->lokasi }}</td>
                    <td>{{ $row->tahun_perolehan }}</td>
                    <td>
                        <button type="button" class="btn btn-info">Edit</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                @endforeach

                <!-- @forelse($data as $row)
                    <tr>
                        <th scope="row">{{ $row->SN }}</th>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->merk }}</td>
                        <td>{{ $row->spesifikasi }}</td>
                        <td>{{ $row->jumlah_barang }}</td>
                        <td>{{ $row->no_kontrak }}</td>
                        <td>{{ $row->nama_kontrak }}</td>
                        <td>{{ $row->tgl_kontrak }}</td>
                        <td>{{ $row->lokasi }}</td>
                        <td>{{ $row->tahun_perolehan }}</td>
                        <td>
                            <button type="button" class="btn btn-info">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11">Data tidak tersedia</td>
                    </tr>
                @endforelse -->


            </tbody>
        </table>
    </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>