<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

@extends('template.usermain')
@section('content')
<div class="row flex-nowrap">
  <div class="col">
    <div class="info-box">
      <span class="info-box-icon bg-info"><i class="fa fa-user"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Barang</span>
        <span class="info-box-number">{{ $barang }}</span>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="info-box">
      <span class="info-box-icon bg-info"><i class="fa fa-tags"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Maintenance</span>
        <span class="info-box-number">{{ $maintenance }}</span>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="info-box">
      <span class="info-box-icon bg-info"><i class="fa fa-map-marker"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pengadaan</span>
        <span class="info-box-number">{{ $pengadaan }}</span>
      </div>
    </div>
  </div>
</div>


<div class="col-lg-12 mb-4">
    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
        </div>
        <div class="card-body">
            <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset ('template/img/undraw_posting_photo.svg') }}" alt="...">
            </div>
            <p>Selamat Datang, <b>{{ Auth::user()->name }}</b> di Sistem Inventory</p>
            
        </div>
    </div>


</div>
@endsection
</body>
</html>