<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maintenance</title>
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
                    <h2 class="text-center mb-2 mt-2 ms-2">Form Request Maintenance Barang</h2>
                    <div class="card-body">

                        <form action="{{ route('maintenance.insert') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">

                                <label for="id_barang">Data Barang:</label>
                                <select class="form-control" id="id_barang" name="id_barang">
                                    <option value="">Pilih SN Barang</option>
                                    @foreach($barangs as $barang)
                                    <option value="{{ $barang->SN }}">{{ $barang->SN }} - {{ $barang->nama }} - {{ $barang->merk }} - {{ $barang->tahun_perolehan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <!-- Input Kondisi -->
                            <div class="form-group">
                                <label for="kondisi">Kondisi:</label>
                                <input type="text" class="form-control" id="kondisi" name="kondisi">
                            </div>
                            <br>

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