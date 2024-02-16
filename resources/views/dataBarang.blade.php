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
    <div class="position-relative">
        <a href="/tambahBarang" class="btn btn-primary position-absolute bottom-0 end-0 mt-4">Tambah Barang</a>

    <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">SEARCH ITEM : </label>
        </div>
        <div class="col-auto">
            <form action="/ManajemenItem" method="GET">
                <input type="search" name="search" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
            </form>
        </div>
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
                    <td>
                        <img src="{{ asset('fotoBarang/'.$row->foto) }}" style="width: 60px">
                    </td>
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
                        <a href="/tampilBarang/{{ $row->SN }}"  class="btn btn-info">Edit</a>
                        <a href="#" class="btn btn-danger delete" data-id="{{ $row->SN }}" data-id="{{ $row->nama }}">Delete</a>
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