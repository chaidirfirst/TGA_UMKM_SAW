@extends('master')

@section('content')
<div class="az-content-breadcrumb">
    <span>kriteria</span>
    <span>{{ $title }}</span>
</div>
<h2 class="az-content-title text-capitalize">{{ $title }}</h2>
<div class="row row-sm mg-b-20">
    <div class="col-lg-7 col-xs-8 col-12 mx-auto">
        <div class="card ">
            <div class="card-body">
                <form action="{{ base_url('sistem/kriteria') }}" method="post" data-parsley-validate>
                    <div class="row row-sm">
                        <div class="col-lg-12 ">
                            <label for="" class="font-weight-bold">Nama kriteria</label>
                            <input class="form-control {{ form_e('nama_kriteria') ? 'is-invalid':''}}" value="{{ ($kriteria) ? $kriteria->nama_kirteria :'' }}" name="nama_kriteria" type="text">
                            <div class="invalid-feedback">
                                {{ form_e('nama_kriteria') }}
                            </div>
                        </div><!-- col -->
                        <div class="col-lg-12 mt-2">
                            <label for="" class="font-weight-bold">Bobot </label>
                            <input class="form-control {{ form_e('bobot_kriteria') ? 'is-invalid':''}}" name="bobot_kriteria" value="{{ ($kriteria) ? $kriteria->bobot_kriteria :'' }}" type="text">
                            <div class="invalid-feedback">
                                {{ form_e('bobot_kriteria') }}
                            </div>
                        </div><!-- col -->
                        <div class="col-lg-12 mt-1">
                            <label for="" class="font-weight-bold">Type Kriteria</label>
                            <div class="row mg-t-10 ">
                                <div class="col-lg-3">
                                    <label class="rdiobox">
                                        <input name="type_kriteria" type="radio" value="cos" {{ ($kriteria) ? ($kriteria->type_kriteria=='cos' ? 'checked':''):''  }}>
                                        <span>Cost</span>
                                    </label>
                                </div><!-- col-3 -->
                                <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                    <label class="rdiobox">
                                        <input name="type_kriteria" type="radio" value="ben" {{ ($kriteria) ? ($kriteria->type_kriteria=='ben' ? 'checked':''):''  }}>
                                        <span>Benefit</span>
                                    </label>
                                </div><!-- col-3 -->
                                @if(form_e('type_kriteria'))
                                <div class="col-12 small text-danger">
                                    {{ form_e('type_kriteria') }}
                                </div>
                                @endif
                            </div><!-- row -->
                        </div>
                        <div class="col-lg-12 mg-t-20 mt-3 mg-lg-t-0">
                            <label class="ckbox">
                                @if($kriteria)
                                <input type="hidden" name="id" value="{{ $kriteria->id_kriteria }}">
                                @endif
                                <input type="checkbox" name="redirect"><span>Tetap Di halaman ini</span>
                            </label>
                        </div><!-- col-3 -->
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