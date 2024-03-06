<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Maintenance</title>
</head>
<body>
    <h1>Request Maintenance</h1>

    <table>
        <thead>
            <tr>
                <th>Lokasi</th>
                <th>Nama</th>
                <th>Merk</th>
                <!-- Tambahkan kolom-kolom lain sesuai dengan atribut-atribut yang ingin ditampilkan -->
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->lokasi }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->merk }}</td>
                <!-- Tambahkan kolom-kolom lain sesuai dengan atribut-atribut yang ingin ditampilkan -->
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
