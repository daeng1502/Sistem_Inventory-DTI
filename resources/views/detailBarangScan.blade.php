<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="ms-2 mb-5 mt-2"style="display: inline-block; vertical-align: middle;">
    </div>
    <div style="display: inline-block; vertical-align: middle;">
        <h2 class="text-left ms-3 mb-2 mt-2">Tabel Detail Barang</h2>
        <h4 class="text-left ms-3 ">DIREKTORAT TEKNOLOGI INFORMASI</h4>
    </div>

<div class="container">
    <div class="position-relative mb-3 ">
        <a href="/barangQRScanner" class="btn btn-primary position-absolute bottom-0 end-0 mt-4">Kembali</a>
        
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <div class="input-group md-form form-sm form-1 pl-0">
                    <div class="input-group-prepend">
                    </div>
                    <form action="/ManajemenItem" method="GET" class="d-inline">
                </div>
            </div>
            <div class="col-auto">
            </div>
        </div>
    </div>

    @if($data)
    <div class="row">
        <table class="table table-striped mx-3">
            <tbody>
                <tr>
                    <td><strong>SN:</strong> {{ $data->SN }}</td>
                </tr>
                <tr>
                    <td><strong>Gambar:</strong> <img src="{{ asset('fotoBarang/'.$data->foto) }}" style="width: 200px"></td>
                </tr>
                <tr>
                    <td><strong>Nama:</strong> {{ $data->nama }}</td>
                </tr>
                <tr>
                    <td><strong>Merk:</strong> {{ $data->merk }}</td>
                </tr>
                <tr>
                    <td><strong>Spesifikasi:</strong> {{ $data->spesifikasi }}</td>
                </tr>
                <tr>
                    <td><strong>Jumlah:</strong> {{ $data->jumlah_barang }}</td>
                </tr>
                <tr>
                    <td><strong>No Kontrak:</strong> {{ $data->no_kontrak }}</td>
                </tr>
                <tr>
                    <td><strong>Nama Kontrak:</strong> {{ $data->nama_kontrak }}</td>
                </tr>
                <tr>
                    <td><strong>Tanggal Kontrak:</strong> {{ $data->tgl_kontrak }}</td>
                </tr>
                <tr>
                    <td><strong>Lokasi:</strong> {{ $data->lokasi }}</td>
                </tr>
                <tr>
                    <td><strong>Tahun Perolehan:</strong> {{ $data->tahun_perolehan }}</td>
                </tr>
                <tr>
                    <td><strong>Barcode:</strong><br>{!! DNS1D::getBarcodeHTML($data->barangcode,'PHARMA',1,50) !!} P - {{ $data->SN }}</td>
                </tr>
                <tr>
                    <td><strong>QRcode:</strong><br>{!! DNS2D::getBarcodeHTML($data->barangcode,'QRCODE') !!}</td>
                </tr>  
            </tbody>
        </table>
    </div>
    @else
    <div class="alert alert-warning" role="alert">
        Data barang tidak ditemukan.
    </div>
    @endif
</div>

</body>
</html>
