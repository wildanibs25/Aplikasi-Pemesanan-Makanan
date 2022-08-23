@extends('layouts.aplikasi_admin')
@section('title','Detail Pemesanan')
@section('content')

<section class="section">
    <div class="card">
        <div class="card-body">
            <div style="float: left">
                <a href="{{url('/admin/pemesanan/')}}" class="btn btn-primary oke">
                    <span class="icon dripicons-arrow-left"></span></a>
            </div>
            <div style="float: right">
                <p>Invoice : <a href="/invoice={{ $trans->no_nota }}"><span id="stt">{{ $trans->no_nota }}</span></a></p> 
                <p>Status : <span id="status" class="ubahstatus">{{ $trans->status }}</span></p>
                <p>
                    @if(($trans->status !='Memesan')&&($trans->status !='Selesai'))
                        @if(!preg_match('/[^+0-9]/',trim($trans->wa)))
                            @if(substr(trim($trans->wa), 0, 3)=='62')
                            <a href="http://api.whatsapp.com/send?phone={{ $hp = trim($trans->wa) }}&@if($trans->status=='Proses')text=Terima kasih atas pesanan Anda.%0AMohon ditunggu pesanan anda sedang di proses🙏🏻&#128525;%0ACek Disini untuk untuk menlihat status pesanan (...) @elseif($trans->status=='Diantar')text=Terimakasih telah menunggu.%0APesanan Anda telah diantar &#128522;%0ACek Disini untuk untuk menlihat status pesanan (...) @endif" target="__blank" class>
                                <button class="btn btn-success ml-4" style="background-color:#25D366; " style="color: white">
                                    <ion-icon name="logo-whatsapp"></ion-icon>
                                    Kirim Whatsapp                            
                                </button></a>  
                            @elseif(substr(trim($trans->wa), 0, 1)=='0')
                            <a href="http://api.whatsapp.com/send?phone={{ $hp = '62'.substr(trim($trans->wa), 1) }}&@if($trans->status=='Proses')text=Terima kasih atas pesanan Anda.%0AMohon ditunggu pesanan anda sedang di proses🙏🏻&#128525;%0ACek Disini untuk untuk menlihat status pesanan (...) @elseif($trans->status=='Diantar')text=Terimakasih telah menunggu.%0APesanan Anda telah diantar &#128522;%0ACek Disini untuk untuk menlihat status pesanan (...) @endif" target="__blank" class>
                                <button class="btn btn-success ml-4" style="background-color:#25D366; " style="color: white">
                                    <ion-icon name="logo-whatsapp"></ion-icon>
                                    Kirim Whatsapp                            
                                </button></a>  
                            @endif
                        @endif
                    @endif
                </p> 
            </div>
            
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-striped">
                <thead style="text-align: center;">
                    <tr>
                        <th>No </th>
                        <th>Gambar</th>
                        <th>Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody style="text-align: center">
                    @foreach($transItem as $t )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><img src="/gambarMenu/{{$t->gambar_menu}}" class="img"></td>
                        <td>{{ $t->nama_menu }}</td>
                        <td>@currency($t->harga_menu -(($t->harga_menu * $diskon->diskon) / 100))</td>
                        <td>X{{ $t->qty }}</td>
                        <td>@currency(($t->harga_menu -(($t->harga_menu * $diskon->diskon) / 100)) * $t->qty )</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" align="left">Total</td>
                        <td>@currency($trans->jumlah_total)</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <center>
            <p style="margin-top: 10px;">
                {{-- @if ($trans->status=='Memesan') --}}
                    <a href="javascript:void(0)" onclick="editStatus('{{ $trans->no_nota }}', 'Proses')" class="btn btn-primary primary1" id="btn1"><span class="fa-fw select-all fas"></span> Proses</a>
                {{-- @elseif($trans->status=='Proses') --}}
                    <a href="javascript:void(0)" onclick="editStatus('{{ $trans->no_nota }}', 'Diantar')" class="btn btn-warning" id="btn2"><span class="fa-fw select-all fas"></span> Diantar</a>
                {{-- @elseif($trans->status=='Diantar') --}}
                    <a href="javascript:void(0)" onclick="editStatus('{{ $trans->no_nota }}', 'Selesai')" class="btn btn-success" id="btn2"><span class="fa-fw select-all fas"></span> Confirmasi</a>
                    <span class="waiting d-none"><i class="fa fa-spinner fa-spin"></i>Loading</span>
                {{-- @else --}}
                    <span class="fa-fw select-all fas" style="color: chartreuse; width: 50px; height: 50px;"></span>
                {{-- @endif --}}
            </p>
        </center>
        <div class="card-body">
            <hr>
            <p>Alamat :</p>
            <p>
                {{ $trans->alamat_lengkap }}
            </p>
        </div>
    </div>
    
</section>
<script>
    btnStatus();

    function editStatus(no_nota, status){
		var data={
			'no_nota': no_nota,
			'status': status,
		}
		$.post(
			'{{ url("admin/editPemesanan") }}',
			JSON.stringify(data),
			function(res){
                // location.reload();
                $('.ubahstatus').html(status);
                btnStatus();
			},
			"JSON",
		)
    }
    // var stt = $('#stt').html();
    // setInterval(function() {
	// 	$.get('{{ url("status") }}/'+stt,function(res){
	// 		$('.ubahstatus').html(res.pesan);
	// 	});
    //     btnStatus();
	// }, 3000);

    function btnStatus(){
        if($('.ubahstatus').text()=='Memesan'){
            $('.primary1').show();
            $('.btn-warning').hide();
            $('.btn-success').hide();
            $('.select-all').hide();
        }else if($('.ubahstatus').text()=='Proses'){
            $('.primary1').hide();
            $('.btn-warning').show();
            $('.btn-success').hide();
            $('.select-all').hide();
        }else if($('.ubahstatus').text()=='Diantar'){
            $('.primary1').hide();
            $('.btn-warning').hide();
            $('.waiting').removeClass("d-none").addClass("d-inline");
            $('.btn-success').hide();
            $('.select-all').hide();
            setTimeout(function() {
                $('.waiting').removeClass("d-inline").addClass("d-none");
                $('.btn-success').slideDown();
            }, 10000);
        }else if($('.ubahstatus').text()=='Selesai'){
            $('.primary1').hide();
            $('.btn-warning').hide();
            $('.btn-success').slideUp();
            $('.select-all').show();
        }
    }
</script>
@endsection
  
<input type="hidden" value="{{ $thisPage = "Pemesanan" }}">
