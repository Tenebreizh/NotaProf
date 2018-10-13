<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" {{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('bower_components/font-awesome/css/font-awesome.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('dist/css/AdminLTE.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('dist/css/skins/skin-blue.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }} ">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <title> {{ env('APP_NAME') }} </title>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" id="app">
    @include('partials.navbar')
    @include('partials.sidebar')

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Notaprof
                    <small>Home</small>
                </h1>
            </section>
            
            <section class="content">
                @yield('content')
            </section>
        </div>
    @include('partials.footer')
    </div>
    <script src=" {{ asset('bower_components/jquery/dist/jquery.min.js') }} "></script>
    <script src=" {{ asset('bower_components/jquery-ui/jquery-ui.min.js') }} "></script>
    <script src=" {{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }} "></script>
    <script src=" {{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }} "></script>
    <script src=" {{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }} "></script>
    <script src=" {{ asset('bower_components/fastclick/lib/fastclick.js') }} "></script>
    <script src=" {{ asset('dist/js/adminlte.min.js') }} "></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
    <script>
        new ClipboardJS('.tocopy');
        </script>
    <script src=" {{ asset('js/main.js') }} "></script>
</body>

</html>