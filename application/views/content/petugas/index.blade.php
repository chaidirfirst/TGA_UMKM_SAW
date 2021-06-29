@extends('master')

@section('content')
<div class="az-content-breadcrumb">
    <span>Petugas</span>
    <span>{{ $title }}</span>
</div>
<h2 class="az-content-title text-capitalize">{{ $title }}</h2>
<div class="row row-sm mg-b-20">
    <div class="col-lg-8 col-xs-8 col-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <table id="datatable1" class="display responsive nowrap">
                    
          <div class="az-content-label mg-b-3 mb-3"><a href="{{ base_url('Petugas/'.$CI->uri->segment(2).'/add') }}" class="btn btn-primary"><i class="typcn typcn-plus"></i> Add</a></div>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Petugas</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach($petugas as $key=>$row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->nama_petugas }}</td>
                            <td>{{ $row->username }}</td>
                            <td>
                            <a class="h3 text-primary" href="{{ base_url('Petugas/'.$CI->uri->segment(2).'/edit/'.$row->id_petugas) }}"><i class="typcn typcn-edit"></i></a>
                            <span class="h3 text-danger btn-delete" onclick="delete_alert(this)" data-href="{{ base_url('Sistem/petugas/'.$row->id_petugas) }}"><i class="typcn typcn-trash"></i></span>
                                
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