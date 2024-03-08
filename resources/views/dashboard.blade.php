@extends('template.main')
@section('content')
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