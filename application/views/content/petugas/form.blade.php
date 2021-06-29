@extends('master')

@section('content')
<div class="az-content-breadcrumb">
    <span>Petugas</span>
    <span>{{ $title }}</span>
</div>
<h2 class="az-content-title text-capitalize">{{ $title }}</h2>
<div class="row row-sm mg-b-20">
    <div class="col-lg-7 col-xs-8 col-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ base_url('sistem/petugas') }}" method="post" data-parsley-validate>
                    <div class="row row-sm">
                        <div class="col-lg">
                            <label for="">Nama </label>
                            <input class="form-control {{ form_e('nama_petugas') ? 'is-invalid':''}}" value="{{ ($petugas) ? $petugas->nama_petugas :'' }}" name="nama_petugas" type="text">
                            <div class="invalid-feedback">
                                {{ form_e('nama_petugas') }}
                            </div>
                        </div><!-- col -->
                        <div class="col-lg">
                            <label for="">Username</label>
                            <input class="form-control {{ form_e('username') ? 'is-invalid':''}}" name="username" value="{{ ($petugas) ? $petugas->username :'' }}" type="text">
                            <div class="invalid-feedback">
                                {{ form_e('username') }}
                            </div>
                        </div><!-- col -->
                        @if($petugas)
                        <input type="hidden" name="id" value="{{ $petugas->id_petugas }}">
                        @else
                        <div class="col-12 mt-2">
                            <div class="text-small text-danger">
                                **PASSWORD SECARA DEFAULT: petugas123
                            </div>
                        </div>
                        @endif
                        <div class="col-lg-12 mg-t-20 mt-3 mg-lg-t-0">
                            <label class="ckbox">
                                <input type="checkbox" name="redirect"><span>Tetap Di halaman ini</span>
                            </label>
                        </div><!-- col-3 -->
                        <div class="col-lg-3 col-12 mt-3">
                            <button type="submit" class="btn btn-primary btn-block text-capitalize"> <i class="far fa-save"></i> {{ $CI->uri->segment(3) }}</button>
                        </div>
                        <div class="col-lg-3 col-12 mt-3">
                            <a href="{{ base_url('Petugas/'.$CI->uri->segment(2)) }}" class="btn btn-danger btn-block text-capitalize">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ base_url('assets/') }}/lib/jquery-steps/jquery.steps.min.js"></script>
<script src="{{ base_url('assets/') }}/lib/parsleyjs/parsley.min.js"></script>
@endsection