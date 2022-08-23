<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/app.css">
    <link rel="shortcut icon" href="{{ asset('mazer') }}/assets/images/favicon.svg" type="image/x-icon">

    <link href="http://fonts.cdnfonts.com/css/arco" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/vendors/toastify/toastify.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/vendors/dripicons/webfont.css">
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/pages/dripicons.css">
   
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/pages/email.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>


</head>

<body>
    <div id="app">
        @if(Auth::check() && $thisPage != "Pendapatan")
            @include('layouts.sidebar-admin')
       
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
            
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                           <h3> @yield('title') </h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ Auth::user()->name }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                @endif
                @yield('content')
            </div>
            

            @include('layouts.footer-admin')
        </div>
    </div>
    <script src="{{ asset('mazer') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('mazer') }}/{{ asset('mazer') }}/assets/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('mazer') }}/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="{{ asset('mazer') }}/assets/js/pages/dashboard.js"></script>

    <script src="{{ asset('mazer') }}/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="{{ asset('mazer') }}/assets/vendors/fontawesome/all.min.js"></script>

    <script src="{{ asset('mazer') }}/assets/js/main.js"></script>
</body>

</html>