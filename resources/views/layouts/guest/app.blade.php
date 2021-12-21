<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">


<head>
    <meta charset="utf-8">
    <meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Admin Dashboard" />
	<meta property="og:title" content="Admin Dashboard" />
	<meta property="og:description" content="Admin Dashboard" />
	<meta property="og:image" content="social-image.png" />
	<meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Login </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/backend/images/favicon.png">
	<link href="assets/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="assets/backend/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            @yield('content')
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="assets/backend/vendor/global/global.min.js"></script>
	<script src="assets/backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="assets/backend/js/custom.min.js"></script>
	<script src="assets/backend/js/deznav-init.js"></script>
    <script src="assets/backend/js/demo.js"></script>
    <script src="assets/backend/js/styleSwitcher.js"></script>
</body>

</html>
