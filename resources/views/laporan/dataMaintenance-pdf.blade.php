<!DOCTYPE html>
<html>
    <thead>
        <tr>
            <th scope="col">No</th>
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
        @php
         $no = 1;   
        @endphp
        @foreach($data as $row)
        <tr>
            <td>{{ $no++ }}</td>
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

      <table class="table table-hover">
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

</body>
</html>


