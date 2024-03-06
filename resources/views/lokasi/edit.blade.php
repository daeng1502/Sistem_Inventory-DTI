@extends('template.main')
@section('content')

<div class="col-sm-6">
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
            <div class="row">
                <div class="col-sm-8">
                    <h6>Data barang</h6>
                </div>
            
            </div>
        </div> --}}
        <div class="card-header">
            <div class="row">
                <div class="col-md-9">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Lokasi</h6>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <a type="button" class="btn btn-danger btn-sm" href="{{ route('lokasi.data') }}"><i class="fas fa-arrow-circle-left"></i> Kembali </a>
                </div>
            </div>

        </div>
        <div class="card-body">
            {!! csrf_field() !!}
            <div class="row">
                <input type="hidden" id="id_edit" name="id_edit" value="{{ $data->lokasi_id }}">
                <div class="col-md-12">
                    <div class="form-group mt-2">
                        <label class="mb-2"> <b> Nama Lokasi </b> <small class="text-danger">*</small></label>
                        <input class="form-control" name="lokasi" id="lokasi">
                    </div>
                </div>  
                <div class="col-md-12">
                    <div class="form-group mt-2">
                        <label class="mb-2"> <b> Gedung </b> <small class="text-danger">*</small></label>
                        <input class="form-control" name="gedung" id="gedung">
                    </div>
                </div>  
                <div class="col-md-12">
                    <div class="form-group mt-2">
                        <label class="mb-2">  <b> Raungan </b> <small class="text-danger">*</small></label>
                        <input class="form-control" name="ruangan" id="ruangan">
                    </div>
                </div>  
                <div class="col-md-12">
                    <div class="form-group mt-2">
                        <label class="mb-2"> <b> Lantai </b> <small class="text-danger">*</small></label>
                        <input type="number" class="form-control" name="lantai" id="lantai">
                    </div>
                </div> 
            </div>
        
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-warning btn-sm" id="btn_save"><i class="far fa-save"></i> Update </button>
        </div>
    </div>
</div>


@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">

    $(document).ready(function(){

        edit_view();

    });

    $('#btn_save').on('click', function(){

        if (!$("#lokasi").val()) {

            swal("Warning!", "Lokasi Harus Di Isi", "warning");
            $("#lokasi").focus();
            return false;

        } 

        else if (!$("#gedung").val()) {

            swal("Warning!", "Gedung Harus Di Isi", "warning");
            $("#gedung").focus();
            return false;

        } 

        else if (!$("#ruangan").val()) {

            swal("Warning!", "Ruangan Harus Di Isi", "warning");
            $("#ruangan").focus();
            return false;

        } 

        else if (!$("#lantai").val()) {

            swal("Warning!", "lantai Harus Di Isi", "warning");
            $("#lantai").focus();
            return false;

        } 

        var id       = $('#id_edit').val();
        var lokasi   = $('#lokasi').val();
        var gedung   = $('#gedung').val();
        var ruangan  = $('#ruangan').val();
        var lantai   = $('#lantai').val();
        var token    = $('[name=_token]').val();

        var formData = new FormData();
        formData.append('id', id);
        formData.append('lokasi', lokasi);
        formData.append('gedung', gedung);
        formData.append('ruangan', ruangan);
        formData.append('lantai', lantai);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('lokasi.update') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
            
                swal({
                    icon:"success",
                    title: "Berhasil!",
                    text: "Data Berhasil Di Update!",
                    type: "success"

                }).then(function() {
                    window.location = "{{ route('lokasi.data') }}";
                });
            }
        });

        return false;

    });

    function edit_view() {

        $.ajax({
        type: 'GET',
        url: "{{ route('lokasi.edit_view', $id) }}",
        async: true,
        dataType: 'JSON',
        success: function(data) {
            console.log(data);

                    //$('[name="tgl_surat"]').datepicker('setDate',moment(data.surat_tgl).format('DD-MM-YYYY'));
                    $('[name="lokasi"]').val(data.lokasi_nama);
                    $('[name="gedung"]').val(data.lokasi_gedung);
                    $('[name="ruangan"]').val(data.lokasi_ruang);
                    $('[name="lantai"]').val(data.lokasi_lantai);

                    
                }
        });

    }

         
</script>


@endsection