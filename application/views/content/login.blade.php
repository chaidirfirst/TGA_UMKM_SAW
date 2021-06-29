
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Azia">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="http:/themepixels.me/azia/img/azia-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http:/themepixels.me/azia">
    <meta property="og:title" content="Azia">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="http:/themepixels.me/azia/img/azia-social.png">
    <meta property="og:image:secure_url" content="http:/themepixels.me/azia/img/azia-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <title>SPK Penerima Bantuan UMKM</title>

    <!-- vendor css -->
    <link href="{{ base_url('assets') }}/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ base_url('assets') }}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="{{ base_url('assets') }}/lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="{{ base_url('assets') }}/css/azia.css">

  </head>
  <body class="az-body">

    <div class="az-signin-wrapper">
      <div class="az-card-signin">
        <h1 class="az-logo text-center">S<span>P</span>K Penerima Bantuan UMKM</h1>
        <div class="az-signin-header">
          <h4 class="text-center">Please sign in to continue</h4>

          <form action="{{ base_url('login/auth') }}" method="POST">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="Enter your Username" required>
            </div><!-- form-group -->
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password"  class="form-control" placeholder="Enter your password" required>
            </div><!-- form-group -->
            <button class="btn btn-az-primary btn-block">Sign In</button>
          </form>
        </div><!-- az-signin-header -->
        <div class="az-signin-footer">
         
        </div><!-- az-signin-footer -->
      </div><!-- az-card-signin -->
    </div><!-- az-signin-wrapper -->

    <script src="{{ base_url('assets') }}/lib/jquery/jquery.min.js"></script>
    <script src="{{ base_url('assets') }}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ base_url('assets') }}/lib/ionicons/ionicons.js"></script>

    <script src="{{ base_url('assets') }}/js/azia.js"></script>
    <script>
      $(function(){
        'use strict'

      });
    </script>
        <script src="{{base_url('assets')}}/lib/sweetalert2/sweetalert.min.js"></script>
	@php
	$message = ($CI->session->flashdata('pesan'))??'';
	echo '<script>'.$message.'</script>';
	@endphp
  </body>
</html>
