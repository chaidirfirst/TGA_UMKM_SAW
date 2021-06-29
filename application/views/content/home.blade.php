@extends('master')

@section('content')
<h2 class="az-content-title tx-24 mg-b-5">Hi, welcome back!</h2>
<p class="mg-b-20 mg-lg-b-25">Sistem Pendukung Keputusan Penerimaan Bantuan UMKM</p>
<div class="row">
    <div class="col-lg-8 col-12">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">
                Kriteria
            </h5>
            <div class="d-flex">
            <p class="p-1 text-white"><span style="background:#560bd0;height:10px;width:20px;"  class="p-2">Cost</span></p>
            <p class="p-1 text-white"><span style="background:#007bff;height:10px;width:20px;" class="p-2" >Benefit</span></p>
            </div>
            <div class="chartjs-wrapper-demo"><canvas id="chartBar4"></canvas></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <div class="card">
            <div class="card-body row row-xs ">
                <div class="col-6">
                    <h6 class="tx-success h4"> {{ $CI->db->count_all('kriteria') }} </h6>
                    <label>Total Kriteria</label>
                </div><!-- col -->
                <div class="col-6">
                    <h6 class="tx-success h4"> {{ $CI->db->count_all('masyarakat') }} </h6>
                    <label>Total Masyarakat/UMKM</label>
                </div><!-- col -->
                <div class="col-6 mg-t-30">
                    <h6 class="tx-success h4"> {{ $CI->db->count_all('petugas') }} </h6>
                    <label>Total Petugas</label>
                </div><!-- col -->
                <div class="col-6 mg-t-30">
                    <h6 class="tx-success h4"> {{ $CI->db->where('owner_file','petugas')->count_all('file_upload') }} </h6>
                    <label>Total File Upload</label>
                </div><!-- col -->
            </div><!-- card-body -->
        </div>
        <div class="card mt-2">
            <div class="card-body  bg-danger tx-white row row-xs ">
               <p>Sebelum Menambahkan data sebaiknya perhatikan pada ditahap kriteria  </p>
            </div><!-- card-body -->
    </div>
</div>


@endsection

@section('js')
<script src="{{ base_url('assets') }}/lib/chart.js/Chart.bundle.min.js"></script>
<script>

var ctx4 = document.getElementById('chartBar4').getContext('2d');
  new Chart(ctx4, {
    type: 'horizontalBar',
    data: {
      labels: <?=$label?>,
      datasets: [{
        label: '# of Votes',
        data: <?=$data ?>,
        backgroundColor: <?=$color?>
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false,
          labels: {
            display: false
          }
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true,
            fontSize: 10,
          }
        }],
        xAxes: [{
          ticks: {
            beginAtZero:true,
            fontSize: 11,
            max: 80
          }
        }]
      }
    }
  });
</script>
@endsection