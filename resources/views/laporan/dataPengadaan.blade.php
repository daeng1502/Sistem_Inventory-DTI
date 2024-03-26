<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Procurement</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  @extends('template.main')
  @section('content')
  <div class="ms-2 mb-5 mt-2" style="display: inline-block; vertical-align: middle;">
    <img src="Unand.png" style="width: 60px; vertical-align: middle;" />
  </div>
  <div style="display: inline-block; vertical-align: middle;">
    <h2 class="text-left ms-3">Aplikasi Inventaris</h2>
    <h4 class="text-left ms-3 mb-5">DIREKTORAT TEKNOLOGI INFORMASI</h4>
  </div>

    <div class="row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <!-- <th scope="col">Gambar</th> -->
            <th scope="col">Product</th>
            <th scope="col">Merk</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Requester</th>
            <th scope="col">Tanggal Request</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>

          @php
          $no = 1
          @endphp
          @foreach ($data as $row)
          <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{$row->barang}}</td>
            <td>{{$row->merk}}</td>
            <td>{{ $row->jumlah }}</td>
            <td>{{ $row->user->name }}</td>
            <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d-m-Y') }}</td>
            <td>{{ $row->Deskripsi }}</td>
            <td>
              @if($row->status == "Menunggu")
              <span class="badge text-bg-secondary">Menunggu</span>
              @elseif($row->status == "Diterima")
              <span class="badge text-bg-info">Diterima</span>
              @elseif($row->status == "Ditolak")
              <span class="badge text-bg-danger">Ditolak</span>
              @elseif($row->status == "Diproses")
              <span class="badge text-bg-success">Diproses</span>
              @elseif($row->status == "Selesai")
              <span class="badge text-bg-primary">Selesai</span>
              @endif
            </td>
          </tr>
          @endforeach


        </tbody>
      </table>
    </div>
    <a href="/exportPengadaan" class="btn btn-primary">PDF</a>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
@endsection

</html>