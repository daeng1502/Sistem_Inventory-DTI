<!DOCTYPE html>
<html>
  <style type= "text/css">
    body 
    {
        font-family: arial; 
        background-color : #ccc 
    }
    .rangkasurat {
        width : 100%;
        margin:0 auto;
        background-color : #fff;
        height: 500px;
        padding: 20px;
    }
    table {
        border-bottom : 5px solid # 000; 
        padding: 2px
    }
    .tengah {
        text-align : center;
        line-height: 5px;
    }
    h1, h2 {
        font-size: 24px;
    }
    .gambar-kolom{
        width: 30%;
    }
    .teks-kolom{
        width: 70%;
        text-align : center;
    }

    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {

        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #ffffff;
        color: rgb(0, 0, 0)
    }
</style >
<body>
  <div class = "rangkasurat">
    <table width = "100%">
      <tr>
            <td class="gambar-kolom"> <img src="Unand.png" width="100px"> </td>
            <td class = "teks-kolom">
                  <h1>UNIVERSITAS ANDALAS</h1>
                  <h1>DIREKTORAT TEKNOLOGI INFORMASI</h1>
                  <b>Limau Manis, Kec. Pauh, Kota Padang, Sumatera Barat 25175</b>
            </td>
       </tr>
</table >
<table id="customers">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <!-- <th scope="col">Gambar</th> -->
      <th scope="col">Kode Barang</th>
      <th scope="col">Barang</th>
      <th scope="col">Merk</th>
      <!-- <th scope="col">Tahun</th> -->
      <!-- <th scope="col">Lokasi</th> -->
      <th scope="col">Kondisi</th>
      <th scope="col">Requester</th>
      <th scope="col">Tanggal Request</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>

   @php
      $no = 1 
   @endphp
    @foreach ($data as $row)
    <tr>
      <th scope="row">{{$no++}}</th>
      <td>{{ $row->id_barang}}</td>
      <td>{{$row->barang->nama}}</td>
      <td>{{$row->barang->merk}}</td>
      <!-- <td>{{$row->barang->tahun_perolehan}}</td> -->
      <!-- <td>{{ $row->lokasi }}</td> -->
      <td>{{ $row->kondisi }}</td>
      <td>{{ $row->user->name }}</td>
      <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d-m-Y') }}</td>
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
</body>
</html>


