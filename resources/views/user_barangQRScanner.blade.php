<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QR SCANNER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  @extends('template.usermain')
  @section('content')


  <div class="ms-2 mb-5 mt-2"style="display: inline-block; vertical-align: middle;">
        <img src="Unand.png" style="width: 60px; vertical-align: middle;" />
    </div>
    <div style="display: inline-block; vertical-align: middle;">
        <h2 class="text-left ms-3">Aplikasi Inventaris</h2>
        <h4 class="text-left ms-3 mb-5">DIREKTORAT TEKNOLOGI INFORMASI</h4>
    </div>

    <div class="container col-lg-4 py-5">
        <h4 class="text-center mx-2">Posisikan QR Code di bawah</h4>
        {{-- Scanner --}}
        <div class="card bg-white shadow rounded-3 p-3 border-0">

        {{-- Pesan --}}
        @if (session()->has('gagal'))
            <p>Gagal</p>
        @endif

        @if (session()->has('success'))
            <p>Berhasil</p>
        @endif

            <video id="preview"></video>

            {{-- Form --}}
            <form action="{{ route('scan') }}" method="POST" id="form">
            @csrf
                <input type="hidden" name="barangcode" id="barangcode">
            </form>

        </div>
        {{-- Scanner --}}

    </div>

    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        console.log(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });

      scanner.addListener('scan', function(c){
        document.getElementById('barangcode').value = c;
        document.getElementById('form').submit(); 
      })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @endsection
  </body>
</html>