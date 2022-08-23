@extends('layouts.aplikasi_admin')
@section('title', 'Statik Pendapatan')
@section('content')

<div class="page-heading">
    {{-- <h3> @yield('tittle')</h3> --}}
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-7 col-lg-4 col-md-7">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Harian</h6>
                                    <h6 class="font-extrabold mb-0">
                                        @currency(DB::table('trans')->where('updated_at','LIKE','%'.date('y-m-d', strtotime(date(now()))).'%')->where('status','Selesai')->sum('jumlah_total'))
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7 col-lg-4 col-md-7">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Bulanan</h6>
                                    <h6 class="font-extrabold mb-0">
                                        @currency(DB::table('trans')->where('updated_at','LIKE','%'.date('y-m', strtotime(date(now()))).'%')->where('status','Selesai')->sum('jumlah_total'))
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7 col-lg-4 col-md-7">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Tahunan</h6>
                                    <h6 class="font-extrabold mb-0">                                        
                                        @currency(DB::table('trans')->where('updated_at','LIKE','%'.date('y', strtotime(date(now()))).'%')->where('status','Selesai')->sum('jumlah_total'))
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Presentase Bulanan</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-13 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{ asset('mazer') }}/assets/images/faces/2.jpg" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"> {{ substr(Auth::user()->name, 0, 6) }}</h5>
                           <h6>@admin</h6>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="card">
                <div class="card-body">
                    {{-- <div id="chart-visitors-profile"></div> --}}
                        <a href="/admin/pendapatan" class='sidebar-link sidebar-item'>
                            <span class="fa-fw select-all fas"></span>
                            <span>Catatan Pendapatan</span>
                        </a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    {{-- <div id="chart-visitors-profile"></div> --}}
                        <a href="/" class='sidebar-link sidebar-item'>
                            <span class="fa-fw select-all fas"></span>
                            <span>Quit Dashboard</span>
                        </a>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    var menu;
    var jumlahQty;
		$.get('{{ url("/menu") }}',function(res){
            menu = jsonfile.jsonarray.map(function(res) {
            return res.pesan.nama;
            });
            jumlahQty = jsonfile.jsonarray.map(function(res) {
            return res.jumlah;
            });
		});
</script>
<script>
    var optionsProfileVisit = {
	annotations: {
		position: 'back'
	},
	dataLabels: {
		enabled:false
	},
	chart: {
		type: 'bar',
		height: 300
	},
	fill: {
		opacity:1
	},
	plotOptions: {
	},
	series: [{
		name: 'sales',
		data: [
            {{ DB::table('trans')->where('updated_at', 'LIKE', '%'.date('y', strtotime(date(now()))).'-07'.'%')->where('status', 'Selesai')->sum('jumlah_total') }},
			{{ DB::table('trans')->where('updated_at', 'LIKE', '%'.date('y', strtotime(date(now()))).'-08'.'%')->where('status', 'Selesai')->sum('jumlah_total') }},
			{{ DB::table('trans')->where('updated_at', 'LIKE', '%'.date('y', strtotime(date(now()))).'-09'.'%')->where('status', 'Selesai')->sum('jumlah_total') }},
			{{ DB::table('trans')->where('updated_at', 'LIKE', '%'.date('y', strtotime(date(now()))).'-010'.'%')->where('status', 'Selesai')->sum('jumlah_total') }},
			{{ DB::table('trans')->where('updated_at', 'LIKE', '%'.date('y', strtotime(date(now()))).'-011'.'%')->where('status', 'Selesai')->sum('jumlah_total') }},
			{{ DB::table('trans')->where('updated_at', 'LIKE', '%'.date('y', strtotime(date(now()))).'-012'.'%')->where('status', 'Selesai')->sum('jumlah_total') }},
			{{ DB::table('trans')->where('updated_at', 'LIKE', '%'.date('y', strtotime(date(now()))).'-01'.'%')->where('status', 'Selesai')->sum('jumlah_total') }},
			{{ DB::table('trans')->where('updated_at', 'LIKE', '%'.date('y', strtotime(date(now()))).'-02'.'%')->where('status', 'Selesai')->sum('jumlah_total') }},
			{{ DB::table('trans')->where('updated_at', 'LIKE', '%'.date('y', strtotime(date(now()))).'-03'.'%')->where('status', 'Selesai')->sum('jumlah_total') }},
			{{ DB::table('trans')->where('updated_at', 'LIKE', '%'.date('y', strtotime(date(now()))).'-04'.'%')->where('status', 'Selesai')->sum('jumlah_total') }},
			{{ DB::table('trans')->where('updated_at', 'LIKE', '%'.date('y', strtotime(date(now()))).'-05'.'%')->where('status', 'Selesai')->sum('jumlah_total') }},
			{{ DB::table('trans')->where('updated_at', 'LIKE', '%'.date('y', strtotime(date(now()))).'-06'.'%')->where('status', 'Selesai')->sum('jumlah_total') }},
		]
	}],
	colors: '#435ebe',
	xaxis: {
		categories: [
            "Jul", 
			"Aug",
			"Sep",
			"Oct",
			"Nov",
			"Dec",
			"Jan",
			"Feb",
			"Mar",
			"Apr",
			"May",
			"Jun",
		],
	},
}

let optionsVisitorsProfile  = {
	series: jumlahQty,
    // [
    //     {{ DB::table('item_trans')->where('id_menu', 1)->sum('qty') }}, 
    //     {{ DB::table('item_trans')->where('id_menu', 2)->sum('qty') }}, 
    //     {{ DB::table('item_trans')->where('id_menu', 3)->sum('qty') }},
    //     {{ DB::table('item_trans')->where('id_menu', 4)->sum('qty') }},
    //     {{ DB::table('item_trans')->where('id_menu', 5)->sum('qty') }},
    //     {{ DB::table('item_trans')->where('id_menu', 6)->sum('qty') }},
    //     {{ DB::table('item_trans')->where('id_menu', 7)->sum('qty') }},
    // ],
	labels: menu,
    // [
    //    'Geprek',
    //    'Lele Goreng',
    //    'Ayam Penyet',
    //    'Lele Geprek',
    //    'Ati Ampela Goreng',
    //    'Tahu Tempe',
    //    'Telur',
   
    // ],
	colors: [
        '#435ebe',
        '#55c6e8', 
        '#08e6b3',
        '#19e79e',
        '#0dba98',
        '#b0e0e6',
        '#a8a8f8'
    ],
	chart: {
		type: 'donut',
		width: '100%',
		height:'350px'
	},
	legend: {
		position: 'bottom'
	},
	plotOptions: {
		pie: {
			donut: {
				size: '30%'
			}
		}
	}
}
</script>
@endsection

<input type="hidden" value="{{ $thisPage = "Home" }}">