@extends('master')

@section('content')
<div class="az-content-breadcrumb">
    <span>Petugas</span>
    <span>{{ $title }}</span>
</div>
<h2 class="az-content-title text-capitalize">{{ $title }}</h2>
<div class="row row-sm mg-b-20">
    <div class="col-lg-7 col-xs-7 col-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <table id="datatable1" class="display responsive nowrap">
          <div class="az-content-label mg-b-3 mb-3">
          <a href="{{ base_url('Petugas/'.$CI->uri->segment(2).'/add') }}" class="btn btn-primary"><i class="typcn typcn-plus"></i> Add</a>
          <a href="{{ base_url('Petugas/import/bidang') }}" class="btn btn-primary"><i class="typcn typcn-clouds"></i>Import</a>
          </div>              
                    <thead>
                        <tr>
                            <th class="wd-5p">No</th>
                            <th class="wd-30p">{{ get_msg('bidang_usaha') }}</th>
                            <th class="wd-10p">{{ get_msg('bobot_usaha') }}</th>
                            <th class="wd-10p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach($bidang_usaha as $key=>$row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->bidang_usaha }}</td>
                            <td>{{ $row->bobot_usaha }}</td>
                            <td>
                            <a class="h3 text-primary" href="{{ base_url('Petugas/'.$CI->uri->segment(2).'/edit/'.$row->id_usaha) }}"><i class="typcn typcn-edit"></i></a>
                            <span class="h3 text-danger btn-delete" onclick="delete_alert(this)" data-href="{{ base_url('Sistem/bidang_usaha/'.$row->id_usaha) }}"><i class="typcn typcn-trash"></i></span>
                                
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