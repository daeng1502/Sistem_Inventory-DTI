<!DOCTYPE html>
<html>
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
</body>
</html>


