@extends('template.main')
@section('content')
<div class="container">
    <div class="position-relative mb-3" >    
        <div class="row g-3 align-items-center">

        <div class="col-auto">
        <div class="input-group md-form form-sm form-1 pl-0">
        <div class="input-group-prepend">
            <span class="input-group-text cyan lighten-2" id="basic-text1"><i class="fas fa-search text-white"
                aria-hidden="true"></i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg></span>
        </div>
        <form action="/dataBarang" method="GET" class="d-inline">
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
                    <th scope="col">Nama</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Jumlah (Unit)</th>
                    <th scope="col">Nama kontrak</th>   
                    <th scope="col">Tanggal kontrak</th>
                    <th scope="col">Tahun</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($data as $row)
                <tr>
                    <td>{{ $row->SN }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->merk }}</td>
                    <td>{{ $row->jumlah_barang }}</td>
                    <td>{{ $row->nama_kontrak }}</td>
                    <td>{{ $row->tgl_kontrak }}</td>
                    <td>{{ $row->tahun_perolehan }}</td>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
        {{ $data->links() }}
    </div>
    <a href="/exportBarang" class="btn btn-primary position-absolute bottom-0 end-0 mt-4">PDF</a>
</div>
@endsection