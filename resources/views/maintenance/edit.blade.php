<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maintenance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
@extends('template.main')
  @section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card mb-5">
                    <h2 class="text-center mb-2 mt-2 ms-2">Form Edit Request Maintenance Barang</h2>
                    <div class="card-body">

                        <form action="{{ route('maintenance.updateRequest', $data->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-label">Barang:</label>
                                <input class="form-control" type="text" name="id_barang" value="{{ $data->id_barang }}" disabled>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="kondisi" class="form-label">Kondisi:</label>
                                <input class="form-control" type="text" name="kondisi" value="{{ $data->kondisi }}" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="status" class="form-label">Status:</label>
                                <select class="form-select" name="status" required>
                                    <option value="Menunggu" {{ $data->kondisi == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="Diterima" {{ $data->kondisi == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                    <option value="Ditolak" {{ $data->kondisi == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    <option value="Diproses" {{ $data->kondisi == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="Selesai" {{ $data->kondisi == 'Selesai' ? 'selected' : '' }}>Selesai</option>

                                </select>
                            </div>
                            <br>

                            <button class="btn btn-primary" type="submit">Perbarui Request Maintenance</button>
                        </form>
                    </div>
                </div>
                <a href="/Maintenance" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

@endsection
</html>