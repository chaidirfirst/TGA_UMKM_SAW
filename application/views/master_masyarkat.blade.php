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
  <meta name="twitter:image" content="http://themepixels.me/azia/img/azia-social.png">

  <!-- Facebook -->
  <meta property="og:url" content="http://themepixels.me/azia">
  <meta property="og:title" content="Azia">
  <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

  <meta property="og:image" content="http://themepixels.me/azia/img/azia-social.png">
  <meta property="og:image:secure_url" content="http://themepixels.me/azia/img/azia-social.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="600">

  <!-- Meta -->
  <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
  <meta name="author" content="ThemePixels">

  <title>SPK Penerima Bantuan UMKM - @yield('title') </title>

  <!-- vendor css -->
  <link href="{{ base_url('assets/') }}lib/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="{{ base_url('assets/') }}lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="{{ base_url('assets/') }}lib/typicons.font/typicons.css" rel="stylesheet">
  <link href="{{ base_url('assets/') }}lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="{{ base_url('assets/') }}lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.3/css/fixedColumns.dataTables.min.css">
  <!-- azia CSS -->
  <link rel="stylesheet" href="{{ base_url('assets/') }}css/azia.css">
  <link href="{{ base_url('assets/') }}/lib/select2/css/select2.min.css" rel="stylesheet">
  <style>
  .btn-delete{
    cursor:pointer;
  }
  </style>
  @yield('css')
</head>

<body class="az-body az-dashboard-eight">

  @include('partial.header_r')

  <div class="az-content az-content-dashboard-eight">
    <div class="container d-block">
      @yield('content')

      <!-- your content goes here -->


    </div><!-- container -->
  </div><!-- az-content -->

  @yield('footer')
  <div class="az-footer">
    <div class="container">
      <span>&copy; 2018 Azia Responsive Bootstrap 4 Dashboard Template</span>
      <span>Designed by: ThemePixels</span>
    </div><!-- container -->
  </div><!-- az-footer -->
  <!-- modal -->
  <!-- SMALL MODAL -->
  <div id="setting" class="modal">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">Setting Account</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="selectForm2" class="parsley-style-1" method="POST" action="{{ base_url('sistem/change_password') }}" data-parsley-validate>
          <div class="modal-body">
            <div class="form-group mg-b-0">
              <label class="form-label">Password Lama: <span class="tx-danger">**</span></label>
              <input type="password" name="passwordold" class="form-control" required>
            </div>
            <div class="form-group mg-b-0">
              <label class="form-label">Password Baru: <span class="tx-danger">*</span></label>
              <input type="password" name="passwordnew" class="form-control" required>
            </div><!-- form-group -->
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-indigo">Save changes</button>
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->
  @yield('modal')
  <!-- end modal -->
  <script src="{{ base_url('assets/') }}lib/jquery/jquery.min.js"></script>
  <script src="{{ base_url('assets/') }}lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="{{ base_url('assets/') }}lib/ionicons/ionicons.js"></script> -->

  <script src="{{ base_url('assets/') }}js/azia.js"></script>
  <script src="{{ base_url('assets/') }}lib/select2/js/select2.min.js"></script>
  <script src="{{ base_url('assets/') }}lib/parsleyjs/parsley.min.js"></script>
  <script src="{{base_url('assets')}}/lib/sweetalert2/sweetalert.min.js"></script>
  <script src="{{base_url('assets')}}/lib/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="{{base_url('assets')}}/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
  <script src="{{base_url('assets')}}/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{base_url('assets')}}/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
  <script src="{{base_url('assets')}}/lib/dataTable.fixedColumns/dataTables.fixedColumns.min.js"></script>
  <script src="{{base_url('assets')}}/lib/select2/js/select2.min.js"></script>
  @php

  if($CI->session->flashdata('pesan')){

  
  echo '<script>
    '.$CI->session->flashdata('pesan').'
  </script>';
  $CI->session->unset_userdata('pesan');
}
if($CI->session->flashdata('f_error')){

$CI->session->unset_userdata('f_error');
}
  @endphp
  <script>
    function delete_alert(param) {
      const link=$(param).data('href');
      swal({
        title: "Menghapus Data ini?",
        text: "Dengan menghapus data ini semua yang berelasi dengan data ini juga ikut terhapus",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete)=>{
          if(willDelete){
              document.location=link;
          }
      });
    }
    $(document).ready(function() {
      'use strict';

      $('#datatable1').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        },

      });
      $('#fixed').DataTable({
        scrollY: "800px",
        scrollX: true,
        responsive: false,
        scrollCollapse: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        },
        fixedColumns: {
          leftColumns: 3,
          rightColumns: 1
        },

      });

      $('#datatable2').DataTable({
        bLengthChange: false,
        searching: false,
        responsive: true
      });

      // Select2
      $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity
      });

    });
  </script>
  <script>
    $('#account').parsley();
    $('#settingbtn').click(function() {
      $('#account').parsley().destroy();
    });
  </script>
  @yield('js')

</body>

</html>