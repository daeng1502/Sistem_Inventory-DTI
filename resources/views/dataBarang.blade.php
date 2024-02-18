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
    <h2 class="text-left ms-3">Aplikasi Inventaris</h2>
    <h4 class="text-left ms-3 mb-5">DIREKTORAT TEKNOLOGI INFORMASI</h4>

    
    <!-- Your HTML layout -->
<div class="container">
    <div class="position-relative mb-3" >
        <a href="/tambahBarang" class="btn btn-primary position-absolute bottom-0 end-0 mt-4"> + Tambah Barang</a>
        
        <div class="row g-3 align-items-center">

        <div class="col-auto">
        <div class="input-group md-form form-sm form-1 pl-0">
        <div class="input-group-prepend">
            <span class="input-group-text cyan lighten-2" id="basic-text1"><i class="fas fa-search text-white"
                aria-hidden="true"></i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg></span>
        </div>
        <form action="/ManajemenItem" method="GET" class="d-inline">
        <input class="form-control my-0 py-1" type="search" name="search" placeholder="Search" aria-label="Search">
        </div>
        </div>

            <!-- <div class="col-auto">
                <form action="/ManajemenItem" method="GET" class="d-inline">
                    <input type="search" name="search" id="inputPassword6" class="form-control d-inline" aria-describedby="passwordHelpInline" placeholder="SEARCH ITEM">
                </form>
</div> -->
        <div class="col-auto">
        </div>
    </div>
</div>
        <div class="row">
        <!-- @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
            {{$message}}
            </div>
        @endif -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Spesifikasi</th>
                    <th scope="col">Jumlah</th>
                    <!-- <th scope="col">No Kontak</th>
                    <th scope="col">Nama Kontrak</th>
                    <th scope="col">Tanggal Kontrak</th> -->
                    <th scope="col">Lokasi</th>
                    <th scope="col">Tahun Perolehan</th>
                    <!-- <th scope="col">QR Code</th> -->
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
                    <td>{{ $row->spesifikasi }}</td>
                    <td>{{ $row->jumlah_barang }}</td>
                    <!-- <td>{{ $row->no_kontrak }}</td>
                    <td>{{ $row->nama_kontrak }}</td>
                    <td>{{ $row->tgl_kontrak }}</td> -->
                    <td>{{ $row->lokasi }}</td>
                    <td>{{ $row->tahun_perolehan }}</td>
                    <td>
                        <a href="/tampilBarang/{{ $row->SN }}"  class="btn btn-info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </a>

                        <a href="#" class="btn btn-danger delete" data-id="{{ $row->SN }}" data-id="{{ $row->nama }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                            </svg>
                        </a>



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
        {{ $data->links() }}
    </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  </body>
    <script>
        $('.delete').click( function(){

            var sn_barang = $(this).attr('data-id')
            var nama_barang = $(this).attr('data-nama')

            swal({
            title: "Yakin?",
            text: "Apa anda yakin menghapus data barang dengan SN "+nama_barang+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
            window.location = "/hapusBarang/"+sn_barang+""
            swal("Data berhasil di hapus!", {
                icon: "success",
                });
            } else {
            swal("Data tidak jadi di hapus!");
            }
            });
        });
             
    </script>
    
    <script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif
    </script>

</html>