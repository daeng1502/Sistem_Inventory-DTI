<!DOCTYPE html>
<html>
<table class=table table-striped>
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

</body>
</html>


