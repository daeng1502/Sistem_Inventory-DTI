divdiv<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maintenance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <h1 class="mb-2">Edit Request Maintenance</h1>
                <div class="card">
                    <div class="card-body">
                        <form action="/updateRequest/{{$data->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="id_barang" class="form-label">Barang</label>
                                <br>        
                                
                                <div class="mb-3">
                                    <label for="kondisi" class="form-label">Kondisi</label>
                                    <input type="text" name="kondisi" class="form-control" id="kondisi" aria-describedby="emailHelp" value="{{ $data->kondisi }}">
                                </div>
                                <br>        
                                
                                
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Status</label>
                                    <select name="usertype" class="form-select" aria-label="Default select example">
                                        <option selected>{{$data->status}}</option>
                                        <option value="Diterima">Diterima</option>
                                        
                                        <option value="Ditolak">Ditolak</option>
                                        <option value="DiProses">DiProses</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
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
</html>
