@extends('master_masyarkat')

@section('content')
<div class="az-content-breadcrumb">
    <span>Masyarakat</span>
    <span>{{ $title }}</span>
</div>
<h2 class="az-content-title text-capitalize">{{ $title }}</h2>

<div class="row">

    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ base_url('sistem/check_nim_tanggal') }}" method="post" data-parsley-validate>
                    <div class="row row-sm">

                        <div class="col-lg-12 ">
                            <label for="" class="font-weight-bold">{{ get_msg('nik') }}</label>
                            <input class="form-control {{ form_e('nik') ? 'is-invalid' : '' }}"  name="nik" type="text" required>
                            <div class="invalid-feedback">
                                {{ form_e('nik') }}
                            </div>
                        </div><!-- col -->
                        
                        <div class="col-lg-12 mt-1">
                            <label for="" class="font-weight-bold">{{ get_msg('tanggal_lahir') }}</label>
                            <input class="form-control {{ form_e('tanggal_lahir') ? 'is-invalid' : '' }}" id="tanggal_lahir" name="tanggal_lahir" type="date" required>
                            <div class="invalid-feedback">
                                {{ form_e('tanggal_lahir') }}
                            </div>
                        </div><!-- col -->
                        <div class="col-lg-6 col-12 mt-3">
                            <button type="submit" class="btn btn-primary btn-block text-capitalize">Check Data</button>
                        </div>
                        <div class="col-lg-6 col-12 mt-3">
                        <a href="{{ base_url('register') }}" class="btn btn-secondary btn-block text-capitalize" >Register Masyarakat</a>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ base_url('assets/') }}/lib/jquery-steps/jquery.steps.min.js"></script>
<script src="{{ base_url('assets/') }}/lib/parsleyjs/parsley.min.js"></script>

@endsection