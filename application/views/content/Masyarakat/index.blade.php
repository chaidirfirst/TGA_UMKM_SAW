@extends('master')
@section('css')
<style>
 th, td { 
     white-space: nowrap; 
 }
 tr{
   margin-top: 10px;  
 }
    div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
    .dataTables_scrollHead{
        margin-bottom:-15px !important;
    }
</style>
@endsection
@section('content')
<div class="az-content-breadcrumb">
    <span>Petugas</span>
    <span>{{ $title }}</span>
</div>
<h2 class="az-content-title text-capitalize">{{ $title }}</h2>
<div class="row row-sm mg-b-20">
    <div class="col-lg-12 col-xs-12 col-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <table id="fixed" class="display stripe  nowrap ">
                    <div class="az-content-label mg-b-3 mb-3">
                        <a href="{{ base_url('Petugas/'.$CI->uri->segment(2).'/add') }}" class="btn btn-primary"><i class="typcn typcn-plus"></i> Add</a>
                        <a href="{{ base_url('Petugas/import/masyarakat') }}" class="btn btn-primary"><i class="typcn typcn-clouds"></i>Import</a>
                    </div>
                    <thead>
                            <th class="wd-5p">No</th>
                            <th class="wd-30p">{{ get_msg('nik') }}</th>
                            <th class="wd-30p">{{ get_msg('nama_lengkap') }}</th>
                            <th class="wd-10p">{{ get_msg('jenis_kelamin') }}</th>
                            <th class="wd-20p">{{ get_msg('tanggal_lahir') }}</th>
                            <th class="wd-20p">{{ get_msg('umur') }}</th>
                            <th class="wd-20p">{{ get_msg('provinsi') }}</th>
                            <th class="wd-15p">{{ get_msg('kota') }}</th>
                            <th class="wd-15p">{{ get_msg('kecamatan') }}</th>
                            <th class="wd-20p">{{ get_msg('desa') }}</th>
                            <th class="wd-10p">{{ get_msg('no_telepon') }}</th>
                            <th class="wd-25p">{{ get_msg('nb_skhu') }}</th>
                            <th class="wd-25p">{{ get_msg('bidang_usaha') }}</th>
                            <th class="wd-25p">{{ get_msg('status_penerima') }}</th>
                            <th class="wd-25p">{{ get_msg('aset') }}</th>
                            <th class="wd-25p">{{ get_msg('omset') }}</th>
                            <th class="wd-10p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                    
                        @endphp
                        @foreach($masyarakat as $key=>$row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->nik }}</td>
                            <td>{{ $row->nama_lengkap }}</td>
                            <td>{{ $row->jenis_kelamin }}</td>
                            <td>{{ $row->tanggal_lahir }}</td>
                            <td>{{ $row->umur }}</td>
                            <td>{{ $row->provinsi }}</td>
                            <td>{{ $row->kota }}</td>
                            <td>{{ $row->kecamatan }}</td>
                            <td>{{ $row->desa }}</td>
                            
                            <td>{{ $row->no_telepon }}</td>
                            <td>{{ $row->nb_skhu }}</td>
                            <td>{{ $row->bidang_usaha }}</td>
                            <td>{{ $row->status_penerima }}</td>
                            <td>{{ $row->aset }}</td>
                            <td>{{ $row->omset }}</td>
                            <td>
                                <a class="h3 text-primary" href="{{ base_url('Petugas/'.$CI->uri->segment(2).'/edit/'.$row->nik ) }}"><i class="typcn typcn-edit"></i></a>
                                <span class="h3 text-danger btn-delete" onclick="delete_alert(this)" data-href="{{ base_url('Sistem/masyarakat/'.$row->nik ) }}"><i class="typcn typcn-trash"></i></span>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection