<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Toko</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset ('vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset ('vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset ('vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset ('vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset ('vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset ('vendors/jqvmap/dist/jqvmap.min.css')}}">


    <link rel="stylesheet" href="{{asset ('assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    @include('layouts.sidebar')
    @include('layouts.navbar')
    @yield('container')
    <script src="{{asset ('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset ('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset ('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset ('assets/js/main.js')}}"></script>


    <script src="{{asset ('vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{asset ('assets/js/dashboard.js')}}"></script>
    <script src="{{asset ('assets/js/widgets.js')}}"></script>
    <script src="{{asset ('vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{asset ('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset ('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script>
    (function($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
    </script>
</body>