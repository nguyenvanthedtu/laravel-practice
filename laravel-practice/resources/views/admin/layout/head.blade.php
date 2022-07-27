<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="" />
<title>Admin Panel</title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin_user.css') }}">

<!-- Custom styles for this template-->
<link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet" />
<script src="{{asset('assets/admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/admin/js/sb-admin-2.min.js')}}"></script>
<script src="https://kit.fontawesome.com/a7387a4dd6.js" crossorigin="anonymous"></script>


@yield('css')
