@extends('layouts.aplikasi_admin')
@section('title','Pendapatan')
@section('content')
<!--bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">  
<!--DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />
<!--Daterangepicker -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!--Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--Boostrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!--DataTables -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<!--DateRangePicker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<style type="text/css">
    .dataTables_wrapper .dataTables_length select{
        font-size: 15px;
        padding-top: -100px;
        height: 40px;
        width: 40px;
    }
    .dataTables_wrapper .dataTables_filter input {
        height: 40px;
    }

    footer{
        padding: 10px 10px;
    }
</style>

<div class="ban-top">
    <div style="margin: 10px;"></div>
    <div class="container">
        <div style="width: 100px !importent; float:left; margin-left:-90px;">
            <a href="/admin/home"> <img src="{{ asset('mazer') }}/assets/images/logo/geprek2.png" style="width: 100px; margin-top:10px;" alt=""> </a>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                    <tr>
                        <th>No Nota</th>
                        <th>Pemesan</th>
                        <th>Tanggal</th>
                        <th>Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendapatan as $p)
                    <tr>
                        <td><a href="{{url('/admin/detail-pemensanan/'.$p->no_nota)}}">{{$p->no_nota}}</a></td>
                        <td>{{$p->name}}</td>
                        <td>{{ date('d/m/Y', strtotime($p->created_at))}}</td>
                        <td>
                            @currency($p->jumlah_total)
							<span class='total' style="visibility:hidden;">{{$p->jumlah_total}}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <thead style="text-align: center;">
                    <tr>
                        <th colspan="3">Total</th>
                        <th><span id="cetak"></span></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</section>

<script>
    cal();
    function formatNumber(num) {
			return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
		}

    function cal(){
        var sum = 0;
		$(".total").each(function(){
			sum += parseFloat($(this).text());
		});
		// var t = 10000;
		$('#cetak').html("Rp. "+formatNumber(sum));
		// $('#input').html("<input type='hidden' name='jumlah_total' value='"+sum+"'>");
    }
</script>

<script>
 var start_date;
 var end_date;
 var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
    var dateStart = parseDateValue(start_date);
    var dateEnd = parseDateValue(end_date);
    var evalDate= parseDateValue(aData[2]);
      if ( ( isNaN( dateStart ) && isNaN( dateEnd ) ) ||
           ( isNaN( dateStart ) && evalDate <= dateEnd ) ||
           ( dateStart <= evalDate && isNaN( dateEnd ) ) ||
           ( dateStart <= evalDate && evalDate <= dateEnd ) )
      {
          return true;
      }
      return false;
});

function parseDateValue(rawDate) {
    var dateArray= rawDate.split("/");
    var parsedDate= new Date(dateArray[2], parseInt(dateArray[1])-1, dateArray[0]);  // -1 because months are from 0 to 11   
    return parsedDate;
}    

$( document ).ready(function() {
//konfigurasi DataTable pada tabel dengan id example dan menambahkan  div class dateseacrhbox dengan dom untuk meletakkan inputan daterangepicker
 var $dTable = $('#example').DataTable({
  "dom": "<'row'<'col-sm-4'l><'col-sm-5' <'datesearchbox'>><'col-sm-3'f>>" +
    "<'row'<'col-sm-12'tr>>" +
    "<'row'<'col-sm-5'i><'col-sm-12'p>>"
 });

 //menambahkan daterangepicker di dalam datatables
 $("div.datesearchbox").html('<div class="input-group"> <div class="input-group-addon"> <i class="glyphicon glyphicon-calendar"></i> </div><input type="text" style="height: 40px;" class="form-control pull-right" id="datesearch" placeholder="Search by date range.."> </div>');

 document.getElementsByClassName("datesearchbox")[0].style.textAlign = "right";

 //konfigurasi daterangepicker pada input dengan id datesearch
 $('#datesearch').daterangepicker({
    autoUpdateInput: false
  });

 //menangani proses saat apply date range
  $('#datesearch').on('apply.daterangepicker', function(ev, picker) {
     $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
     start_date=picker.startDate.format('DD/MM/YYYY');
     end_date=picker.endDate.format('DD/MM/YYYY');
     $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
     $dTable.draw();
     cal();
  });

  $('#datesearch').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
    start_date='';
    end_date='';
    $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
    $dTable.draw();
  });
});
</script>

@endsection
  
<input type="hidden" value="{{ $thisPage = "Pendapatan" }}">

