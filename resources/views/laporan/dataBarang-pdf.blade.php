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
    </div>
    </body>
</body>
</html>


