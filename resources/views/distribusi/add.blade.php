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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Distribusi</h6>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <a type="button" class="btn btn-danger btn-sm" href="{{ route('distribusi.data') }}"><i class="fas fa-arrow-circle-left"></i> Kembali </a>
                </div>
            </div>

        </div>
        <div class="card-body">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mt-2">
                        <label class="mb-2"> <b> Pegawai </b> <small class="text-danger">*</small></label>
                        <select class="form-control" style="width: 100%;" name="pegawai" id="pegawai"></select>
                    </div>
                </div>  
                <div class="col-md-12">
                    <div class="form-group mt-2">
                        <label class="mb-2"> <b> Lokasi </b> <small class="text-danger">*</small></label>
                        <select class="form-control" style="width: 100%;" name="lokasi" id="lokasi"></select>
                    </div>
                </div>  
                <div class="col-md-12">
                    <div class="form-group mt-2">
                        <label class="mb-2">  <b> Barang </b> <small class="text-danger">*</small></label>
                        <select class="form-control" style="width: 100%;" name="barang" id="barang"></select>
                    </div>
                </div>  
                <div class="col-md-12">
                    <div class="form-group mt-2">
                        <label class="mb-2"> <b> Tanggal Distribusi </b> <small class="text-danger">*</small></label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal">
                    </div>
                </div>  
                <div class="col-md-12">
                    <div class="form-group mt-2">
                        <label class="mb-2"> <b> Surat Masuk </b> <small class="text-danger">*</small></label>
                        <input type='file' id="file" name='file' class="form-control">
                    </div>
                </div>  
                <div class="col-md-12">
                    <div class="form-group mt-2">
                        <label class="mb-2"> <b> Keterangan </b> <small class="text-danger">*</small></label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                    </div>
                </div>  
            </div>
        
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-success btn-sm" id="btn_save"><i class="far fa-save"></i> Simpan </button>
        </div>
    </div>
</div>


@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">

    $(document).ready(function(){

        $('.select2').select2();
        combo_barang();
        combo_pegawai();
        combo_lokasi();

    });

    $('#btn_add').on('click',function(){

        $("#nama").val("");
        $('#formModalAdd').modal('show');
        combo_barang();

    });

    $('#btn_save').on('click', function(){

        if (!$("#pegawai").val()) {

            swal("Warning!", "Pegawai Harus Di Isi", "warning");
            $("#pegawai").focus();
            return false;

        } 

        else if (!$("#lokasi").val()) {

            swal("Warning!", "Lokasi Harus Di Isi", "warning");
            $("#lokasi").focus();
            return false;

        } 

        else if (!$("#barang").val()) {

            swal("Warning!", "Barang Harus Di Isi", "warning");
            $("#barang").focus();
            return false;

        } 

        else if (!$("#tanggal").val()) {

            swal("Warning!", "Tanggal Harus Di Isi", "warning");
            $("#tanggal").focus();
            return false;

        } 

        else if (!$("#keterangan").val()) {

            swal("Warning!", "Keterangan Harus Di Isi", "warning");
            $("#keterangan").focus();
            return false;

        } 

        else if (!$("#file").val()) {

            swal("Warning!", "Surat Masuk Harus Di Isi", "warning");
            $("#file").focus();
            return false;

        } 

        var pegawai      = $('#pegawai').val();
        var lokasi       = $('#lokasi').val();
        var barang       = $('#barang').val();
        var tanggal      = $('#tanggal').val();
        var keterangan   = $('#keterangan').val();
        var file         = $('#file')[0].files;
        var token        = $('[name=_token]').val();

        var formData = new FormData();
        formData.append('pegawai', pegawai);
        formData.append('lokasi', lokasi);
        formData.append('barang', barang);
        formData.append('tanggal', tanggal);
        formData.append('keterangan', keterangan);
        formData.append('file', file[0]);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('distribusi.save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
             
                swal({
                    icon:"success",
                    title: "Berhasil!",
                    text: "Data Berhasil Di Simpan!",
                    type: "success"

                }).then(function() {
                    window.location = "{{ route('distribusi.data') }}";
                });
            }
        });

        return false;

    });

    function combo_barang(){
        $('select[name=barang]').empty()
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_barang') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                $('select[name=barang]').empty()
                var html = '';
                var i;
                var x = document.getElementById("barang");
                    var option = document.createElement("option");
                    option.text = "Pilih";
                    option.value = '';
                    x.add(option);
              
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].SN)+'>'+(data[i].nama)+'</option>';
                    $('select[name=barang]').append(html)
                }
            }
        });
    }

    function combo_pegawai(){
        $('select[name=pegawai]').empty()
        $.ajax({
            type  : 'GET',
            url   : "{{ route('distribusi.combo_pegawai') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                $('select[name=pegawai]').empty()
                var html = '';
                var i;
                var x = document.getElementById("pegawai");
                    var option = document.createElement("option");
                    option.text = "Pilih";
                    option.value = '';
                    x.add(option);
              
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].id)+'>'+(data[i].name)+'</option>';
                    $('select[name=pegawai]').append(html)
                }
            }
        });
    }

    function combo_lokasi(){
        $('select[name=lokasi]').empty()
        $.ajax({
            type  : 'GET',
            url   : "{{ route('distribusi.combo_lokasi') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                $('select[name=lokasi]').empty()
                var html = '';
                var i;
                var x = document.getElementById("lokasi");
                    var option = document.createElement("option");
                    option.text = "Pilih";
                    option.value = '';
                    x.add(option);
              
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].lokasi_id)+'>'+(data[i].lokasi_nama)+' - '+(data[i].lokasi_gedung)+' - '+(data[i].lokasi_ruang)+'</option>';
                    $('select[name=lokasi]').append(html)
                }
            }
        });
    }
         
</script>


@endsection