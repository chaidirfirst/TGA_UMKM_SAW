@extends('master')

@section('content')
<div class="az-content-breadcrumb">
    <span>bidang_usaha</span>
    <span>{{ $title }}</span>
</div>
<h2 class="az-content-title text-capitalize">{{ $title }}</h2>
<div class="row row-sm mg-b-20">
    <div class="col-lg-7 col-xs-8 col-12 mx-auto">
        <div class="card ">
            <div class="card-body">
                <form action="{{ base_url('sistem/bidang_usaha') }}" method="post" data-parsley-validate>
                    <div class="row row-sm">
                        <div class="col-lg-12 ">
                            <label for="" class="font-weight-bold">{{ get_msg('bidang_usaha') }}</label>
                            <input class="form-control {{ form_e('bidang_usaha') ? 'is-invalid':''}}" value="{{ ($bidang_usaha) ? $bidang_usaha->bidang_usaha :'' }}" name="bidang_usaha" type="text">
                            <div class="invalid-feedback">
                                {{ form_e('bidang_usaha') }}
                            </div>
                        </div><!-- col -->
                        <div class="col-lg-12 mt-2">
                            <label for="" class="font-weight-bold">{{ get_msg('bobot_usaha') }} </label>
                            <input class="form-control {{ form_e('bobot_usaha') ? 'is-invalid':''}}" name="bobot_usaha" value="{{ ($bidang_usaha) ? $bidang_usaha->bobot_usaha :'' }}" type="text">
                            <div class="invalid-feedback">
                                {{ form_e('bobot_usaha') }}
                            </div>
                        </div><!-- col -->
                        <div class="col-lg-12 mg-t-20 mt-3 mg-lg-t-0">
                            <label class="ckbox">
                                @if($bidang_usaha)
                                    <input type="hidden" name="id" value="{{ $bidang_usaha->id_usaha  }}">
                                @endif
                                <input type="checkbox" name="redirect"><span>Tetap Di halaman ini</span>
                            </label>
                        </div>
                        <div class="col-lg-3 col-12 mt-3">
                            <button type="submit" class="btn btn-primary btn-block text-capitalize"><i class="far fa-save"></i> {{ $CI->uri->segment(3) }}</button>
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