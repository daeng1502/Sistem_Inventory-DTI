<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance</title>

    <style>
        .container {
            display: flex;
            /* justify-content: center; */
            align-items: center;
            top: 20px;
            left: 20px;

            /* height: 100vh;  */
            /* Set tinggi kontainer agar dropdown berada di tengah layar */
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Request Maintenance</h1>

    <div class="container">
        <h2>lokasi barang:</h2>
        <select name="fruits" id="fruits">
            <option value="apple">Ruang Rapat</option>
            <option value="banana">Ruang Programmer</option>
            <option value="orange">Lobby</option>
            <option value="strawberry">WC</option>
        </select>
    </div>
    <div class="container">
        <h2>nama barang:</h2>
        <select name="fruits" id="fruits">
            <option value="apple">komputer</option>
            <option value="banana">meja</option>
            <option value="orange">jam</option>
            <option value="strawberry">mouse</option>
        </select>
    </div>
    <div class="container">
        <h2>kode barang:</h2>
        <select name="fruits" id="fruits">
            <option value="apple">1</option>
            <option value="banana">2</option>
            <option value="orange">3</option>
            <option value="strawberry">4</option>
        </select>
    </div>
    <div class="container">
        <h2>informasi barang:</h2>
        <table>
        <tr>
            <th>gambar barang</th>   
            <th>kode barang</th>
            <th>nama barang</th>
            <th>merk</th>
            <th>lokasi</th>
            <th>Column 6</th>
            <th>Column 7</th>
            <th>Column 8</th>
        </tr>
        <tr>
            <td>Data 1</td>
            <td>1</td>
            <td>komputer</td>
            <td>hp</td>
            <td>ruang rapat</td>
            <td>Data 6</td>
            <td>Data 7</td>
            <td>Data 8</td>
        </tr>
    </table>
    </div>

    <div class="container">
        <h2>kondisi barang:</h2>
        <form action="#">
        <label for="textbox">ketikkan keluhan anda:</label><br>
        <input type="text" id="textbox" name="name"><br><br>
        <input type="submit" value="Submit">
    </form>
    </div>
</body>
</html>
