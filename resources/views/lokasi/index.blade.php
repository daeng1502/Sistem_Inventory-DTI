@extends('template.main')
@section('content')

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
                <h6 class="m-0 font-weight-bold text-primary">Lokasi</h6>
            </div>
            <div class="col-md-3" style="text-align: right">
                <a type="button" class="btn btn-primary btn-sm" href="{{ route('lokasi.add') }}"><i class="fas fa-plus-circle" ></i> Tambah Lokasi </a>
            </div>
        </div>

    </div>
    <div class="card-body">

        <table id="#" class="table table-bordered table-sm">
            <thead class="bg-light">
                <tr>
                    <td style="text-align: center"><b> NO </b></td>
                    <td style="text-align: center"><b> Nama </b></td>
                    <td style="text-align: center"><b> Gedung </b></td>
                    <td style="text-align: center"><b> Ruang </b></td>
                    <td style="text-align: center"><b> Lantai  </b></td>
                    <td style="text-align: center"><b> Aksi </b></td>
                </tr>
            </thead>
            <tbody id="show_data"></tbody>
        </table>
    
    </div>
</div>


@endsection

@section('js')
<script type="text/javascript">

    $(document).ready(function(){

        $('.select2').select2();
        view();

    });

    function view() {

        $.ajax({
            type: 'GET',
            url: "{{ route('lokasi.view') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                //  $('#datatable').DataTable().destroy(); 
                $('#show_data').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {


                        var tr = $('<tr>').append([
                                $('<td width="1%" align="center">'),
                                $('<td width="15%">'),
                                $('<td width="10%">'),
                                $('<td width="5%" align="center">'),
                                $('<td width="5%" align="center">'),
                                $('<td width="3%" align="center">')

                            ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].lokasi_nama)));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].lokasi_gedung)));   

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].lokasi_ruang)));   

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].lokasi_lantai)));   

                        tr.find('td:nth-child(6)').append('<a href="'+(data[i].edit)+'" class="btn btn-warning btn-circle btn-sm" ><i class="fas fa-pencil-alt"></i></a> <a href="javascript:;" class="btn btn-danger btn-circle btn-sm item_nonaktif" data="'+data[i].lokasi_id+'" ><i class="fas fa-trash"></i> </a>');                           

                        tr.appendTo($('#show_data'));
                    }

                }
            $('#datatable').DataTable('refresh'); 
            }
        });
    }

    $('#show_data').on('click','.item_nonaktif',function(){
        var id=$(this).attr('data');

        swal({
            title: "Yakin?",
            text: "Apa anda yakin menghapus data",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                var _token = $('meta[name=csrf-token]').attr('content');
                console.log(_token);
                $.ajax({
                    type : "POST",
                    url   : "{{ route('lokasi.nonaktif') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        swal("Non-Aktif !", "Data Sudah Di-Hapus !!.", "success")
                        view();
                    }
                });  

            } else {
                swal("Data tidak jadi di hapus!");
            }
        });
    });


    function combo_barang(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_barang') }}",
            async : false,
            dataType : 'JSON',
            success : function(r){
                data = r.data;
                var html = '';
                var i;
                $('select[name=barang]').empty()
                var x = document.getElementById("barang");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html =  
                            '<option value='+(data[i].sn)+'>'+(data[i].nama)+'</option>';
                    $('select[name=barang]').append(html)
                }
            }
        });

    }
         
</script>


@endsection