@extends('template.main')
@section('content')
<body>
<div class="container">
    <h1 class="mb-5">Data User</h1>
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Tipe User</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $row)
            <tr>
                <th scope="row">{{$no++}}</th>
                <th scope="row">{{$row->name}}</th>
                <th scope="row">{{$row->email}}</th>
                <th scope="row">{{$row->usertype}}</th>
                <td>
                    <a href="/showUser/{{$row->id}}" class="btn btn-info">Edit</a>
                    <a href=# class="btn btn-info delete" data-id="{{$row->id}}">Delete</a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
    </div>
    <a href="/createUser" type="button" class="btn btn-success">Tambahkan User</a>
    @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{$message}}
    </div>  
    @endif
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
<script>
    $('.delete').click( function()
    {
        var userid = $(this).attr('data-id')
        swal({
            title: "Konfirmasi Hapus",
            text: "Data akan dihapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => 
        {
            if (willDelete) 
            {
                window.location = "/deleteUser/"+userid+""
                swal("Data Berhasil Dihapus", 
                {
                    icon: "success",
                });
            } else 
            {

            }
        });
    }
    )
</script>
</body>
@endsection