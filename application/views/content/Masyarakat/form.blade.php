@extends('master')

@section('content')
    <div class="az-content-breadcrumb">
        <span>Petugas</span>
        <span>{{ $title }}</span>
    </div>
    <h2 class="az-content-title text-capitalize">{{ $title }}</h2>

    <div class="row">

        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="{{ base_url('sistem/masyarakat') }}" method="post" data-parsley-validate>
                        <div class="row row-sm">

                            <div class="col-lg-12 ">
                                <label for="" class="font-weight-bold">{{ get_msg('nik') }}</label>
                                <input class="form-control {{ form_e('nik') ? 'is-invalid' : '' }}"
                                    value="{{ $masyarakat ? $masyarakat->nik : '' }}" <?= is_null($masyarakat) ? 'name="nik" ' : 'readonly="true"' ?> type="text">
                                <div class="invalid-feedback">
                                    {{ form_e('nik') }}
                                </div>
                            </div><!-- col -->
                            <div class="col-lg-12 mt-1">
                                <label for="" class="font-weight-bold">{{ get_msg('nama_lengkap') }}</label>
                                <input class="form-control {{ form_e('nama_lengkap') ? 'is-invalid' : '' }}" value="{{ $masyarakat ? $masyarakat->nama_lengkap : '' }}" name="nama_lengkap" type="text">
                                <div class="invalid-feedback">
                                    {{ form_e('nama_lengkap') }}
                                </div>
                            </div><!-- col -->
                            <div class="col-lg-12 mt-1">
                                <label for="" class="font-weight-bold">{{ get_msg('jenis_kelamin') }}</label>
                                <div class="row mg-t-10 ">
                                    <div class="col-lg-3">
                                        <label class="rdiobox">
                                            <input name="jenis_kelamin" type="radio" value="Laki-Laki" {{ $masyarakat ? ($masyarakat->jenis_kelamin == 'Laki-Laki' ? 'checked' : '') : '' }}>
                                            <span>Laki-Laki</span>
                                        </label>
                                    </div><!-- col-3 -->
                                    <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                        <label class="rdiobox">
                                            <input name="jenis_kelamin" type="radio" value="Perempuan" {{ $masyarakat ? ($masyarakat->jenis_kelamin == 'Perempuan' ? 'checked' : '') : '' }}>
                                            <span>Perempuan</span>
                                        </label>
                                    </div><!-- col-3 -->
                                    @if (form_e('jenis_kelamin'))
                                    <div class="col-12 small text-danger">
                                        {{ form_e('jenis_kelamin') }}
                                    </div>
                                    @endif
                                </div><!-- row -->
                            </div>
                            <div class="col-lg-12 mt-1">
                                <label for="" class="font-weight-bold">{{ get_msg('tanggal_lahir') }}</label>
                                <input class="form-control {{ form_e('tanggal_lahir') ? 'is-invalid' : '' }}" id="tanggal_lahir" value="{{ $masyarakat ? $masyarakat->tanggal_lahir : '' }}" name="tanggal_lahir" type="date">
                                <div class="invalid-feedback">
                                    {{ form_e('tanggal_lahir') }}
                                </div>
                            </div><!-- col -->
                            <div class="col-lg-12 mt-1">
                                <label for="" class="font-weight-bold">{{ get_msg('umur') }}</label>
                                <input class="form-control {{ form_e('umur') ? 'is-invalid' : '' }}" id="umur" value="{{ $masyarakat ? $masyarakat->umur : '' }}" name="umur" type="text" readonly>
                                <div class="invalid-feedback">
                                    {{ form_e('umur') }}
                                </div>
                            </div><!-- col -->
                            <div class="col-lg-12 mt-1">
                                <label for="" class="font-weight-bold">{{ get_msg('provinsi') }}</label>
                                <input class="form-control {{ form_e('provinsi') ? 'is-invalid' : '' }}" value="{{ $masyarakat ? $masyarakat->provinsi : 'Aceh' }}" name="provinsi" type="text">
                                <div class="invalid-feedback">
                                    {{ form_e('provinsi') }}
                                </div>
                            </div><!-- col -->
                            <div class="col-lg-12 mt-1">
                                <label for="" class="font-weight-bold">{{ get_msg('kecamatan') }}</label>
                                <select name="kecamatan"
                                    class="select2 form-control {{ form_e('kecamatan') ? 'is-invalid' : '' }}">
                                    <option value="" selected>--</option>
                                    @foreach ($kecamatan as $item)
                                        <option value="{{ $item }}"
                                            {{ $masyarakat ? ($masyarakat->kecamatan == $item ? 'selected' : '') : '' }}>{{ $item }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{ form_e('kecamatan') }}
                                </div>
                            </div><!-- col -->
                            <div class="col-lg-12 mt-1">
                                <label for="" class="font-weight-bold">{{ get_msg('kota') }}</label>
                                <input class="form-control {{ form_e('kota') ? 'is-invalid' : '' }}" value="{{ $masyarakat ? $masyarakat->kota : 'Lhokseumawe' }}" name="kota" type="text">
                                <div class="invalid-feedback">
                                    {{ form_e('kota') }}
                                </div>
                            </div><!-- col -->
                            <div class="col-lg-12 mt-1">
                                <label for="" class="font-weight-bold">{{ get_msg('desa') }}</label>
                                <input class="form-control {{ form_e('desa') ? 'is-invalid' : '' }}" value="{{ $masyarakat ? $masyarakat->desa : '' }}" name="desa" type="text">
                                <div class="invalid-feedback">
                                    {{ form_e('desa') }}
                                </div>
                            </div><!-- col -->
                            <div class="col-lg-12 mt-1">
                                <label for="" class="font-weight-bold">{{ get_msg('nb_skhu') }}</label>
                                <div class="row mg-t-10 ">
                                    <div class="col-lg-6">
                                        <label class="rdiobox">
                                            <input name="nb_skhu" type="radio" value="Memiliki" {{ $masyarakat ? ($masyarakat->nb_skhu == 'Memiliki' ? 'checked' : '') : '' }}>
                                            <span>Memiliki</span>
                                        </label>
                                    </div><!-- col-3 -->
                                    <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                        <label class="rdiobox">
                                            <input name="nb_skhu" type="radio" value="Tidak Memiliki" {{ $masyarakat ? ($masyarakat->nb_skhu == 'Tidak Memiliki' ? 'checked' : '') : '' }}>
                                            <span>Tidak Memiliki</span>
                                        </label>
                                    </div><!-- col-3 -->
                                    @if (form_e('nb_skhu'))
                                    <div class="col-12 small text-danger">
                                        {{ form_e('nb_skhu') }}
                                    </div>
                                    @endif
                                </div><!-- row -->
                            </div>
                            <div class="col-lg-12 mt-1">
                                <label for="" class="font-weight-bold">{{ get_msg('aset') }}</label>
                                <input class="form-control {{ form_e('aset') ? 'is-invalid' : '' }}" value="{{ $masyarakat ? $masyarakat->aset : '' }}" name="aset" type="text">
                                <div class="invalid-feedback">
                                    {{ form_e('aset') }}
                                </div>
                            </div><!-- col -->
                            <div class="col-lg-12 mt-1">
                                <label for="" class="font-weight-bold">{{ get_msg('omset') }}</label>
                                <input class="form-control {{ form_e('omset') ? 'is-invalid' : '' }}" value="{{ $masyarakat ? $masyarakat->omset : '' }}" name="omset" type="text">
                                <div class="invalid-feedback">
                                    {{ form_e('omset') }}
                                </div>
                            </div><!-- col -->
                            <div class="col-lg-12 mt-1">
                                <label for="" class="font-weight-bold">{{ get_msg('no_telepon') }}</label>
                                <input class="form-control {{ form_e('no_telepon') ? 'is-invalid' : '' }}" value="{{ $masyarakat ? $masyarakat->no_telepon : '' }}" name="no_telepon" type="text">
                                <div class="invalid-feedback">
                                    {{ form_e('no_telepon') }}
                                </div>
                            </div><!-- col -->
                            <div class="col-lg-12 mt-1">
                                <label for="" class="font-weight-bold">{{ get_msg('bidang_usaha') }}</label>
                                <select name="bidang_usaha" class="select2 form-control {{ form_e('bidang_usaha') ? 'is-invalid' : '' }}">
                                        <option value="" selected>--</option>
                                    @foreach ($usaha as $item)
                                        <option value="{{ $item->id_usaha }}" {{ $masyarakat ? ($masyarakat->bidang_usaha == $item->id_usaha ? 'selected' : '') : '' }} }} >{{ $item->bidang_usaha }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{ form_e('bidang_usaha') }}
                                </div>
                            </div><!-- col -->
                            <div class="col-lg-12 mt-1">
                                <label for="" class="font-weight-bold">{{ get_msg('status_penerima') }}</label>
                                <div class="row mg-t-10 ">
                                    <div class="col-lg-6">
                                        <label class="rdiobox">
                                            <input name="status_penerima" type="radio" value="TIDAK PERNAH" {{ $masyarakat ? ($masyarakat->status_penerima == 'TIDAK PERNAH' ? 'checked' : '') : '' }}>
                                            <span>TIDAK PERNAH</span>
                                        </label>
                                    </div><!-- col-3 -->
                                    <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                        <label class="rdiobox">
                                            <input name="status_penerima" type="radio" value="PERNAH" {{ $masyarakat ? ($masyarakat->status_penerima == 'PERNAH' ? 'checked' : '') : '' }}>
                                            <span>PERNAH</span>
                                        </label>
                                    </div><!-- col-3 -->
                                    @if (form_e('status_penerima'))
                                    <div class="col-12 small text-danger">
                                        {{ form_e('status_penerima') }}
                                    </div>
                                    @endif
                                </div><!-- row -->
                            </div>
                            <div class="col-lg-12 mg-t-20 mt-3 mg-lg-t-0">
                                <label class="ckbox">
                                    @if ($masyarakat)
                                    <input type="hidden" name="id" value="{{ $masyarakat->nik }}">
                                    @endif
                                    <input type="checkbox" name="redirect"><span>Tetap Di halaman ini</span>
                                </label>
                            </div><!-- col-3 -->
                            <div class="col-lg-3 col-12 mt-3">
                                <button type="submit" class="btn btn-primary btn-block text-capitalize"><i class="far fa-save"></i> {{ $CI->uri->segment(3) }}</button>
                            </div>
                            <div class="col-lg-3 col-12 mt-3">
                                <a href="{{ base_url('Petugas/' . $CI->uri->segment(2)) }}" class="btn btn-danger btn-block text-capitalize">Kembali</a>
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
