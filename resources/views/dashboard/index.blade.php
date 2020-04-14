<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin panel</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <!-- Font Awesome CSS-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ asset('/css/admin/fontastic.css') }}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('/css/admin/style.default.css') }}" id="theme-stylesheet"><link id="new-stylesheet" rel="stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('/css/admin/custom.css') }}">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<body>

<div id="app">
    <app></app>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/esm/popper.js"> </script>--}}
<script src="{{ mix('/js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>--}}
<script src="{{ asset('/js/admin/front.js') }}"></script>
{{--<script src="{{ asset('/js/admin/charts-home.js') }}"></script>--}}
{{--<script src="{{ asset('/js/admin/charts-custom.js') }}"></script>--}}
</body>
</html>