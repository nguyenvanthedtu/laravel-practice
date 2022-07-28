<!DOCTYPE html>
<html lang="en">
<head>
   @include('users.layout.head')
</head>
<body>
    @include('users.layout.header')
    @yield('header')
    <!-- Page header with logo and tagline-->
    <div class="container">
        @yield('content')
    </div>
    @include('login')
    @include('register')
    @include('users.layout.footer')

</body>
<script src="{{asset('assets/admin/vendor/jquery/jquery.min.js')}}"></script> 
<script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/admin/vendor/jquery/jquery.min.js')}}"></script>
@yield('js')
@stack('scripts')
</html>