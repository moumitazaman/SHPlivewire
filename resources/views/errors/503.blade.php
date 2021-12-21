
<!DOCTYPE html>
<html lang="en" class="h-100">


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
    <title>Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/backend/images/favicon.png">
    <link href="assets/backend/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-5">
                    <div class="form-input-content text-center error-page">
                        <h1 class="error-text font-weight-bold">503</h1>
                        <h4><i class="fa fa-times-circle text-danger"></i> Service Unavailable</h4>
                        <p>Sorry, we are under maintenance!</p>
						<div>
                            <a class="btn btn-primary" href="{{ url('/') }}">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
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
</body>

</html>
