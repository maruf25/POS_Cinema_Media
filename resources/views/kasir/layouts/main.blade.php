<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('soc movie 2.png') }}" type="image/png">
    <title>POS - Movie</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">


    {{-- <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet"> --}}

    <!-- Custom styles for this template -->
    {{-- <link href="/css/dashboard.css" rel="stylesheet"> --}}

    {{-- Trix Editor --}}
    {{-- <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script> --}}

    {{-- <style>
        span.trix-button-group.trix-button-group--file-tools {
            display: none;
        }
    </style> --}}

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/sidebars.css') }}">
    <link rel="stylesheet" href="../../../css/seat.css"> --}}


    @livewireStyles

    {{-- DatePicker --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</head>

<body style="background-color: #D9D9D9">
    {{-- <div class="d-flex flex-row m-0">
        @include('kasir.layouts.sidebar')
        <div class="container-fluid m-0">
            <div class="flex-column m-0">
                @include('kasir.layouts.header')
                <div class="row">
                    <div class="col-lg">
                        @yield('content')
                    </div>
                    <div class="col-lg-4">
                        @include('kasir.kasir')
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- Tanpa Sidebar --}}

    {{-- <main> --}}
    <div class="container-fluid">
        @include('kasir.layouts.header')
        <div class="row">
            <div class="col-lg mt-1">
                @yield('content')
            </div>
            <div class="col-lg-4 mt-1" style="border-radius: 20px">
                @livewire('kasir.kasir', ['filmName' => $filmName])
            </div>
        </div>
    </div>
    {{-- </main> --}}




    {{-- Script --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    {{-- <script src="/js/dashboard.js"></script> --}}
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/2ef12236fc.js" crossorigin="anonymous"></script>

    {{-- Jam Sekarang --}}
    <script>
        var clock = document.getElementById('clock');
        var updateClock = function() {
            var date = new Date();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();
            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;
            var time = hours + ':' + minutes + ':' + seconds;
            clock.innerHTML = time;
        };
        setInterval(updateClock, 1000);
    </script>
    @stack('js')
    {{-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> --}}


    {{-- <script type="module">
        import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
    </script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false"></script> --}}

    @livewireScripts
</body>

</html>
