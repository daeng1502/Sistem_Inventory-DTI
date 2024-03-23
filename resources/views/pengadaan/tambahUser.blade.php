<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Procurement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
@extends('template.usermain')
  @section('content')
    <div class="ms-2 mb-5 mt-2" style="display: inline-block; vertical-align: middle;">
        <img src="Unand.png" style="width: 60px; vertical-align: middle;" />
    </div>
    <div style="display: inline-block; vertical-align: middle;">
        <h2 class="text-left ms-3">Aplikasi Inventaris</h2>
        <h4 class="text-left ms-3 mb-5">DIREKTORAT TEKNOLOGI INFORMASI</h4>
    </div>

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card mb-5">
                    <h2 class="text-center mb-2 mt-2 ms-2">Form Request Pengadaan Barang</h2>
                    <div class="card-body">

                        <form action="/insert-requestPengadaan" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="kondisi">Product:</label>
                                <input type="text" class="form-control" id="barang" name="barang">
                            </div>
                            
                            <div class="form-group">
                                <label for="kondisi">Merk:</label>
                                <input type="text" class="form-control" id="merk" name="merk">
                            </div>
                            
                            <div class="form-group">
                                <label for="kondisi">Jumlah:</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah">
                            </div>
                            
                            <div class="form-group">
                                <label for="kondisi">Deskripsi:</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                            </div>
<!-- 
                            <div class="form-group">
                                <label for="kondisi">Tanggal Input:</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                            </div> -->

                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

@endsection
</html>