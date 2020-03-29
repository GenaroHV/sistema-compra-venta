<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Id for channel notification -->
    <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : ''}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} | @yield('titulo')</title>    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}">
    <!-- Styles -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        <div class="wrapper">
            @include('admin.partials.nav')
            @include('admin.partials.aside')
            @yield('content')
        </div>
        @include('admin.partials.footer')
    </div>
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>    
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- assetsLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
    <!-- assetsLTE for demo purposes -->
    <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{-- Mix JS  --}}
    <script src="{{ mix('/js/app.js') }}"></script>
    
    <!-- Activar Tooltip -->
    <script>
        $(document).ready(function(){
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        });
    </script>
    <!-- Toastr de Éxito y de Error -->
    <script>
        @if(session()->has('flash'))
            $(document).ready(function() {
                toastr.options = {
                    'closeButton': true,
                    'progressBar': true,
                    'positionClass': 'toast-bottom-right',
                    'timeOut': '15000',
                    'showEasing': 'swing',
                    'hideEasing': 'linear',
                    'showMethod': 'fadeIn',
                    'hideMethod': 'fadeOut',
                }
                toastr.success('<small>{{ session('flash') }}</small>', '¡Perfecto!');
            });
        @endif
        @if($errors->any())     
            $(document).ready(function() {
                toastr.options = {
                    'closeButton': true,
                    'progressBar': true,
                    'positionClass': 'toast-bottom-right',
                    'timeOut': '15000',
                    'showEasing': 'swing',
                    'hideEasing': 'linear',
                    'showMethod': 'fadeIn',
                    'hideMethod': 'fadeOut',
                }                
            @foreach($errors->all() as $error)
                toastr.error('<small>{{ $error }}</small>', '¡Error!');
            @endforeach    
            });                    
        @endif
    </script>
    @stack('js')
</body>
</html>
