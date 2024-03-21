<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manajemen Item </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

  <!-- Your HTML layout -->
  <div class="container">
    <div class="position-relative mb-3">
      <!-- <a href="/tambahBarang" class="btn btn-primary position-absolute bottom-0 end-0 mt-4"> + Tambah Barang</a> -->

      <div class="row g-3 align-items-center">

        <div class="col-auto">
          <div class="input-group md-form form-sm form-1 pl-0 mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text cyan lighten-2" id="basic-text1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                </svg></span>
            </div>

            <div class="input-group-prepend ">
              <form action="/ManajemenItemUser" method="GET" class="d-inline">
                <input class="form-control my-0 py-1" type="search" name="search" placeholder="Search" aria-label="Search">
            </div>

            <div class="input-group-prepend ms-2">
              <a class="collapse-item" href="/barangQRScanner"><span class="input-group-text cyan lighten-2" id="basic-text1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="currentColor" class="bi bi-qr-code-scan" viewBox="0 0 16 16">
                    <path d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5M.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5M4 4h1v1H4z" />
                    <path d="M7 2H2v5h5zM3 3h3v3H3zm2 8H4v1h1z" />
                    <path d="M7 9H2v5h5zm-4 1h3v3H3zm8-6h1v1h-1z" />
                    <path d="M9 2h5v5H9zm1 1v3h3V3zM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8zm2 2H9V9h1zm4 2h-1v1h-2v1h3zm-4 2v-1H8v1z" />
                    <path d="M12 9h2V8h-2z" />
                  </svg>
                </span></a>
            </div>
          </div>

          <div class="col-auto">
          </div>
        </div>
      </div>
      <div class="row">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">SN</th>
              <th scope="col">Gambar</th>
              <th scope="col">Nama</th>
              <th scope="col">Merk</th>
              <!-- <th scope="col">Spesifikasi</th> -->
              <th scope="col">Jumlah (Unit)</th>
              <!-- <th scope="col">No Kontak</th>
                    <th scope="col">Nama Kontrak</th>
                    <th scope="col">Tanggal Kontrak</th> 
                    <th scope="col">Harga (Rp)</th> -->
              <th scope="col">Tahun</th>
              <th scope="col">Barcode</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>

            @foreach($data as $row)
            <tr>
              <td>{{ $row->SN }}</td>
              <td>
                <img src="{{ asset('fotoBarang/'.$row->foto) }}" style="width: 60px">
              </td>
              <td>{{ $row->nama }}</td>
              <td>{{ $row->merk }}</td>
              <!-- <td>{{ $row->spesifikasi }}</td> -->
              <td>{{ $row->jumlah_barang }}</td>
              <!-- <td>{{ $row->no_kontrak }}</td>
                    <td>{{ $row->nama_kontrak }}</td>
                    <td>{{ $row->tgl_kontrak }}</td> 
                    <td>{{ $row->harga }}</td> -->
              <td>{{ $row->tahun_perolehan }}</td>
              <!-- <td>{!! DNS2D::getBarcodeHTML("$row->barangcode",'QRCODE') !!}</td> -->
              <!-- <td>{!! DNS2D::getBarcodeHTML("$row->barangcode",'DATAMATRIX') !!}</td> -->
              <td>{!! DNS1D::getBarcodeHTML("$row->barangcode",'PHARMA',1,50) !!}
                <!-- P - {{ $row->SN }} -->
              </td>
              <td>

                <a href="/detailBarangUser/{{ $row->SN }}" class="btn btn-secondary">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                  </svg>
                </a>

              </td>
            </tr>
            @endforeach


          </tbody>
        </table>
        {{ $data->links() }}
      </div>
    </div>


    <!-- side bar -->
    <!-- <div class="fixed-bottom ms-5 mb-5" >
    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
    </svg> 
    </a>
</div>


<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Navigation Bar</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
    
     Pilih Modul di Bawah
      <div class="dropdown mt-3" style="width: 100%";>
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" style="width: 100%; height: 5em; text-align: left; background-color: #0F3E62;">
          Manajemen Item
        </button>
        <ul class="dropdown-menu" style="width: 100%";>
          <li><a class="dropdown-item" href="/ManajemenItem">Pencatatan Asset</a></li>
          <li><a class="dropdown-item" href="#">Scan BarCode</a></li>
        </ul>
    </div>

    <div class="dropdown mt-3" style="width: 100%"; >
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" style="width: 100%; height: 5em; text-align: left; background-color: #0F3E62;">
          Distribusi
        </button>
        <ul class="dropdown-menu" style="width: 100%";>
          <li><a class="dropdown-item" href="/">Asset Pegawai</a></li>
          <li><a class="dropdown-item" href="#">Lokasi Barang</a></li>
        </ul>
    </div>

    <div class="dropdown mt-3" style="width: 100%";>
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" style="width: 100%; height: 5em; text-align: left; background-color: #0F3E62;">
          Maintenance
        </button>
        <ul class="dropdown-menu" style="width: 100%";>
          <li><a class="dropdown-item" href="/">List request</a></li>
          <li><a class="dropdown-item" href="#">Riwayat</a></li>
        </ul>
    </div>

    <div class="dropdown mt-3" style="width: 100%";>
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"style="width: 100%; height: 5em; text-align: left; background-color: #0F3E62;">
          Pengadaan
        </button>
        <ul class="dropdown-menu" style="width: 100%";>
          <li><a class="dropdown-item" href="/">Request Pengadaan</a></li>
          <li><a class="dropdown-item" href="#">List Pengadaan</a></li>
          <li><a class="dropdown-item" href="#">Riwayat Pengadaan</a></li>
        </ul>
    </div>

    <div class="dropdown mt-3" style="width: 100%";>
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" style="width: 100%; height: 5em; text-align: left; background-color: #0F3E62;">
          Laporan
        </button>
        <ul class="dropdown-menu" style="width: 100%";>
          <li><a class="dropdown-item" href="/">Cetak Laporan</a></li>
        </ul>
    </div>

    </div>
  </div>
</div> -->
    <!-- side bar -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endsection
</body>
<script>
  $('.delete').click(function() {

    var sn_barang = $(this).attr('data-id')
    var nama_barang = $(this).attr('data-nama')

    swal({
        title: "Yakin?",
        text: "Apa anda yakin menghapus data barang dengan SN " + nama_barang + " ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/hapusBarang/" + sn_barang + ""
          swal("Data berhasil di hapus!", {
            icon: "success",
          });
        } else {
          swal("Data tidak jadi di hapus!");
        }
      });
  });
</script>

<!-- <script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif
    </script> -->

</html>