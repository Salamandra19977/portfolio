<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title","Document")</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,600">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.css">
    <link rel="stylesheet" href="{{ asset('/css/fontastic.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.default.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
</head>
<body>

@include("userprofile.layouts.blocks.nav.index")

@yield("content")

@include("userprofile.layouts.blocks.footer.index")

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
<script src="{{ mix('/js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.js"></script>
<script src ="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="{{ asset('/js/front.js') }}"></script>
<script src="{{asset('/js/assessment.js')}}"></script>
<script type="text/javascript">
    var token = '{{ Session::token() }}';
    var urlAssessment = '{{route('work.assessment')}}';
    $(".commentForm").hide();
    $(".commentEdit").hide();
    $(".cancel").hide();
    $("body").on('click', '#reply', function(event) {
        event.preventDefault();
        $(this).hide();
        $(this).parent().parent().children(".commentForm").show();
        $(this).parent().children(".cancel").show();
    });
    $("body").on('click', '#editBtnCom', function(event) {
        event.preventDefault();
        $(this).hide();
        $(this).parent().parent().children(".commentEdit").show();
        $(this).parent().children(".cancel").show();
    });
    $("body").on('click',".cancel", function (event) {
        event.preventDefault();
        $(this).hide();
        $(this).parent().children("#reply").show();
        $(this).parent().children("#editBtnCom").show();
        $(this).parent().parent().children(".commentForm").hide();
        $(this).parent().parent().children(".commentEdit").hide();
    })
</script>

</body>
</html>