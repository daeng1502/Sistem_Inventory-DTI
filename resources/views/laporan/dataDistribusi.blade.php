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
                <h6 class="m-0 font-weight-bold text-primary">Distribusi</h6>
            </div>
        </div>

    </div>
    <div class="card-body">

        <table id="#" class="table table-bordered table-sm">
            <thead class="bg-light">
                <tr>
                    <td style="text-align: center"><b> NO </b></td>
                    <td style="text-align: center"><b> Barang </b></td>
                    <td style="text-align: center"><b> Pegawai </b></td>
                    <td style="text-align: center"><b> Tanggal </b></td>
                    <td style="text-align: center"><b> Surat  </b></td>
                    <td style="text-align: center"><b> Keterangan </b></td>
                </tr>
            </thead>
            <tbody id="show_data"></tbody>
        </table>
        <a href="/exportDistribusi" class="btn btn-primary position-absolute bottom-0 end-0 mt-4">PDF</a>
    </div>
    
</div>
@endsection

@section('js')
<script type="text/javascript">

    $(document).ready(function(){

        $('.select2').select2();
        view();

    });

    $('#btn_add').on('click',function(){

        $("#nama").val("");
        $('#formModalAdd').modal('show');
        combo_barang();
        // reset();

    });

    function view() {

        $.ajax({
            type: 'GET',
            url: "{{ route('distribusi.view') }}",
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
                                $('<td width="5%">'),
                                $('<td width="5%" align="center">'),
                                $('<td width="1%" align="center">'),
                                $('<td width="10%" align="left">'),
                                $('<td width="3%" align="center">')

                            ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<b>'+(data[i].nama)+'</b>'));   

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<small>'+(data[i].lokasi_nama)+', ' +(data[i].lokasi_gedung)+', ' +(data[i].lokasi_ruang)+ ', Lt : '+(data[i].lokasi_lantai)+'</small>'));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].name)));   

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].dist_tgl)));   

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html('<a href="{{ asset('distribusi') }}/'+data[i].dist_surat+'" target="_blank"><i class="far fa-file-alt font-18"></i></a>'));

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html((data[i].dist_keterangan)));   

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
                    url   : "{{ route('distribusi.nonaktif') }}",
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