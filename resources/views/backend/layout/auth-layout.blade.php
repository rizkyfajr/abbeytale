<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('pageTitle')</title>

    <!-- Custom fonts for this template-->

    <link rel="icon" type="image/x-icon" href="/frontend/images/logo.png">
    <link href="/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/backend/css/sb-admin-2.min.css" rel="stylesheet">
    @yield('stylesheets')
</head>

<body class="bg-gradient-white">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12 d-flex align-items-center">
                                <div class="card w-100">
                                    <div class="card-body">

                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/backend/vendor/jquery/jquery.min.js"></script>
    <script src="/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/backend/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/backend/js/sb-admin-2.min.js"></script>
    @stack('scripts')
</body>

</html>
