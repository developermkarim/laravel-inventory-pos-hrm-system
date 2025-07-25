<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{-- {{ $general_setting->site_title }} --}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="icon" type="image/png" href="{{ url('/logo', /* $general_setting->site_logo */) }}" />

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap-datepicker.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap-select.min.css') }}" type="text/css">

    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('/vendor/font-awesome/css/font-awesome.min.css') }}" type="text/css">

    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">

    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{ asset('/css/grasp_mobile_progress_circle-1.0.0.min.css') }}" type="text/css">

    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{ asset('/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}" type="text/css">

    <!-- Theme stylesheet -->
    <link rel="stylesheet" href="{{ asset('/css/style.default.css') }}" id="theme-stylesheet" type="text/css">

    <!-- Custom stylesheet - for your changes -->
    <link rel="stylesheet" href="{{ asset('/css/custom-' /*  $general_setting->theme */) }}" type="text/css">

    <!-- Tweaks for older IEs -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>


    <div class="page login-page">
        <div class="container">

            @yield('auth-container')

        </div>
    </div>

      <!-- Scripts -->
      <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('/vendor/jquery/jquery-ui.min.js') }}"></script>
      <script src="{{ asset('/vendor/popper.js/umd/popper.min.js') }}"></script>
      <script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('/vendor/bootstrap/js/bootstrap-select.min.js') }}"></script>
      <script src="{{ asset('/js/grasp_mobile_progress_circle-1.0.0.min.js') }}"></script>
      <script src="{{ asset('/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
      <script src="{{ asset('/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
      <script src="{{ asset('/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('/js/front.js') }}"></script>

      <script>


      </script>
</body>
</html>
