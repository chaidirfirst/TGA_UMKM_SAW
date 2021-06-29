@extends('master_masyarkat')

@section('content')
    <div class="az-content-breadcrumb">
        <span>Masyarakat</span>
        <span>{{ $title }}</span>
    </div>
    <h2 class="az-content-title text-capitalize">{{ $title }}</h2>

    <div class="row">

        <div class="col-lg-6 mx-auto">
            <div class="card  ">
                <div class="card-header d-flex">
                        <p >Tanggal dan Waktu Register <br>
                            <span class="text-success"><b>{{ $masyarakat->date_insert ?? '' }}</b></span>
                        </p>
                        @if ($masyarakat->date_update)
                        <p class="ml-auto text-right">Tanggal Dan Waktu Update<br>
                            <span class="text-success"><b>{{ $masyarakat->date_update  }}</b></span>
                        </p>
                        @endif

                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td> {{ get_msg('nik') }}</td>
                            <td>: {{ $masyarakat->nik }} </td>
                        </tr>
                        <tr>
                            <td> {{ get_msg('nama_lengkap') }}</td>
                            <td>: {{ $masyarakat->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td> {{ get_msg('jenis_kelamin') }}</td>
                            <td>: {{ $masyarakat->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td> {{ get_msg('tanggal_lahir') }}</td>
                            <td>: {{ $masyarakat->tanggal_lahir }}</td>
                        </tr>
                        <tr>
                            <td> {{ get_msg('provinsi') }}</td>
                            <td>: {{ $masyarakat->provinsi }}</td>
                        </tr>
                        <tr>
                            <td> {{ get_msg('kota') }}</td>
                            <td>: {{ $masyarakat->kota }}</td>
                        </tr>
                        <tr>
                            <td> {{ get_msg('kecamatan') }}</td>
                            <td>: {{ $masyarakat->kecamatan }}</td>
                        </tr>
                        <tr>
                            <td> {{ get_msg('desa') }}</td>
                            <td>: {{ $masyarakat->desa }}</td>
                        </tr>
                        <tr>
                            <td> {{ get_msg('no_telepon') }}</td>
                            <td>: {{ $masyarakat->no_telepon }}</td>
                        </tr>
                        <tr>
                            <td> {{ get_msg('status_penerima') }}</td>
                            <td>: {{ $masyarakat->status_penerima }}</td>
                        </tr>
                        <tr>
                            <td> {{ get_msg('bidang_usaha') }}</td>
                            <td>: {{ $masyarakat->bidang_usaha }}</td>
                        </tr>
                        <tr>
                            <td> {{ get_msg('umur') }}</td>
                            <td>: {{ $masyarakat->umur }}</td>
                        </tr>
                        <tr>
                            <td> {{ get_msg('nb_skhu') }}</td>
                            <td>:{{ $masyarakat->nb_skhu }} </td>
                        </tr>
                        <tr>
                            <td> {{ get_msg('aset') }}</td>
                            <td>:{{ $masyarakat->aset }} </td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ base_url('change') }}" class="btn btn-success btn-sm">Ubah</a>
                    <a href="{{ base_url('Login/exit') }}" class="btn btn-danger btn-sm" >exit</a>
                </div>
            </div>
        </div>
@endsection

@section('js')
        <script src="{{ base_url('assets/') }}/lib/jquery-steps/jquery.steps.min.js"></script>
        <script src="{{ base_url('assets/') }}/lib/parsleyjs/parsley.min.js"></script>

@endsection
