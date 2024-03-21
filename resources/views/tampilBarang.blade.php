<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    @extends('template.main')
    @section('content')

    <div class="ms-2 mb-5 mt-2"style="display: inline-block; vertical-align: middle;">
    </div>
    <div style="display: inline-block; vertical-align: middle;">
        <h2 class="text-left ms-3 mb-2 mt-2">Halaman Edit Barang</h2>
        <h4 class="text-left ms-3 ">DIREKTORAT TEKNOLOGI INFORMASI</h4>
    </div>

    
    <!-- Your HTML layout -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mb-5 mt-2">
                <h2 class="mb-2 mt-2 ms-2">Form Edit Data Barang</h2>
                    <div class="card-body">
                        <form action="/updateBarang/{{ $data->SN }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="SN" class="form-label">Serial Number</label>
                                <input type="text" name="SN" class="form-control" id="SN" aria-describedby="emailHelp" value="{{ $data->SN }}">
                            </div>

                            @error('SN')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Barang</label>
                                <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp" value="{{ $data->nama }}">
                            </div>

                            @error('nama')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="merk" class="form-label">Merk Barang</label>
                                <input type="text" name="merk" class="form-control" id="merk" aria-describedby="emailHelp" value="{{ $data->merk }}">
                            </div>

                            @error('merk')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="spesifikasi" class="form-label">Spesifikasi</label>
                                <input type="text" name="spesifikasi" class="form-control" id="spesifikasi" aria-describedby="emailHelp" value="{{ $data->spesifikasi }}">
                            </div>

                            @error('spesifikasi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                                <input type="number" name="jumlah_barang" class="form-control" id="jumlah_barang" aria-describedby="emailHelp" value="{{ $data->jumlah_barang }}">
                            </div>

                            @error('jumlah_barang')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="no_kontrak" class="form-label">No Kontrak</label>
                                <input type="text" name="no_kontrak" class="form-control" id="no_kontrak" aria-describedby="emailHelp" value="{{ $data->no_kontrak }}">
                            </div>

                            @error('no_kontrak')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="nama_kontrak" class="form-label">Nama Kontrak</label>
                                <input type="text" name="nama_kontrak" class="form-control" id="nama_kontrak" aria-describedby="emailHelp" value="{{ $data->nama_kontrak }}">
                            </div>
                            
                            @error('nama_kontrak')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="tgl_kontrak" class="form-label">Tanggal Kontrak</label>
                                <input type="date" name="tgl_kontrak" class="form-control" id="tgl_kontrak" aria-describedby="emailHelp" value="{{ $data->tgl_kontrak }}">
                            </div>  

                            @error('tgl_kontrak')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" name="harga" class="form-control" id="harga" value="{{ $data->harga }}">
                            </div>

                            @error('harga')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="tahun_perolehan" class="form-label">Tahun Perolehan</label>
                                <input type="number" name="tahun_perolehan" class="form-control" id="tahun_perolehan" value="{{ $data->tahun_perolehan }}">
                            </div>

                            @error('tahun_perolehan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <!-- <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Gambar</label>
                                <input type="file" name="foto" class="form-control" id="exampleInputPassword1" value="{{ $data->foto }}">
                            </div> -->

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    @endsection
  </body>
</html>