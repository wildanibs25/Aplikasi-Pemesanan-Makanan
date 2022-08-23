<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                {{-- <div class="logo">
                    <a href="/admin/home"><span style="font-family: 'ARCO', sans-serif;"> Geprek </span><p style="margin-top: -20px; font-size:20px; text-align:center;">pak tarno</p></a>
                    <a href="/admin/home"> <img src="{{ asset('mazer') }}/assets/images/logo/geprek2.png" style="width: 700px !importent; margin-top:10px;" alt=""> </a>

                </div> --}}
                <div class="logo">
                    <a href="/admin/home"><img src="{{ asset('mazer') }}/assets/images/logo/geprek2.png" style="height: 50px;" alt="Logo"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu" style="margin-top: -30px;">
            <ul class="menu">
                <li class="sidebar-title">Navigasi</li>

                <li class="sidebar-item  @if($thisPage == "Home"){{__('active') }} @endif">
                    <a href="/admin/home" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item @if($thisPage == "Menu"){{__('active') }} @endif">
                    <a href="/admin/menu" class='sidebar-link'>
                        <i class="icon dripicons-blog"></i>
                        <span>Menu</span>
                    </a>
                </li>
                <li class="sidebar-item  @if($thisPage == "Status"){{__('active') }} @endif">
                    <a href="/admin/status" class='sidebar-link'>
                        <i class="icon dripicons-star"></i>
                        <span>Status</span>
                    </a>
                </li>
                <li class="sidebar-item  @if($thisPage == "Diskon"){{__('active') }} @endif">
                    <a href="/admin/diskon" class='sidebar-link'>
                        <span class="fa-fw select-all fas"></span>
                        <span>Diskon {{ DB::table('diskon')->first()->diskon }}%</span>
                    </a>
                </li>
                <li class="sidebar-item  @if($thisPage == "Pemesanan"){{__('active') }} @endif">
                    <a href="/admin/pemesanan" class='sidebar-link'>
                        <i class="icon dripicons-clipboard"></i>
                        <span>Pemesanan <span class="badge bg-danger text-white d-none" id="text-pesanan"><i id="hitungPesanan" class="text-white"></i> new</span> </span>
                        {{-- @if(DB::table('trans')->where('status', 'Memesan')->count() !=0) {{ DB::table('trans')->where('status', 'Memesan')->count() }} @endif --}}
                    </a>
                </li>
                <li class="sidebar-item  @if($thisPage == "Pesan"){{__('active') }} @endif">
                    <a href="/admin/pesan" class='sidebar-link'>
                        <i class="icon dripicons-message"></i>
                        <span>Pesan <span class="badge bg-danger text-white d-none" id="text-pesan"><i id="hitungPesan" class="text-white"></i> new</span> </span>
                        {{-- <span>Pesan @if(DB::table('contact')->where('status', 'Belum Dibaca')->count() != 0){{ DB::table('contact')->where('status', 'Belum Dibaca')->count() }} @endif</span> --}}
                    </a>
                </li>
                <li class="sidebar-item  @if($thisPage == "Ulasan"){{__('active') }} @endif">
                    <a href="/admin/ulasan" class='sidebar-link'>
                        <span class="fa-fw select-all fas"></span>
                        <span>Ulasan <span class="badge bg-danger text-white d-none" id="text-rating"><i id="hitungRating" class="text-white"></i> new</span> </span>
                        {{-- <span>Ulasan @if(DB::table('rating')->where('status', 'Belum Dibaca')->count() != 0){{ DB::table('rating')->where('status', 'Belum Dibaca')->count() }} @endif</span> --}}
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <span class="fa-fw select-all fas"></span> 
                            <span>{{ __('Logout') }}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

<script>
    setInterval(function() {
        $.get('{{ url("hitungPesanan") }}',function(res){
            $('#hitungPesanan').html(res.pesan);
            if(res.pesan != 0){
                $("#text-pesanan").removeClass("d-none").addClass("d-inline");
            }else{
                $("#text-pesanan").removeClass("d-inline").addClass("d-none");
            }
        });
        $.get('{{ url("hitungPesan") }}',function(res){
            $('#hitungPesan').html(res.pesan);
            if(res.pesan != 0){
                $("#text-pesan").removeClass("d-none").addClass("d-inline");
            }else{
                $("#text-pesan").removeClass("d-inline").addClass("d-none");
            }
        });
        $.get('{{ url("hitungRating") }}',function(res){
            $('#hitungRating').html(res.pesan);
            if(res.pesan != 0){
                $("#text-rating").removeClass("d-none").addClass("d-inline");
            }else{
                $("#text-rating").removeClass("d-inline").addClass("d-none");
            }
        });
    }, 1000);
</script>