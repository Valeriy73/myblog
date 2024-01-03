<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clean Blog - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <!-- include summernote css/js -->
    <link href="{{ asset('plugins/summernote/summernote-bs5.min.css') }}" rel="stylesheet">



</head>
<body>

<!-- Page Header-->

@include('admin.partials.header')

<!-- Main Content-->

@yield('content')

<!-- Footer-->

@include('admin.partials.footer')
<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap core JS-->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>--}}

<!-- Core theme JS-->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('plugins/summernote/summernote-bs5.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#contentPost').summernote();
    });
</script>

</body>
</html>
