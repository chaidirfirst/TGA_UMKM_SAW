@extends('master')

@section('content')
<div class="az-content-breadcrumb">
    <span>Petugas</span>
    <span>{{ $title }}</span>
</div>
<h2 class="az-content-title text-capitalize">{{ $title }}</h2>
<div class="row row-sm mg-b-20">
    <div class="col-lg-6 col-xs-6 col-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <table id="datatable1" class="display responsive nowrap">
          <div class="az-content-label mg-b-3 mb-3"><a href="{{ base_url('Petugas/'.$CI->uri->segment(2).'/add') }}" class="btn btn-primary"><i class="typcn typcn-plus"></i> Add</a></div>              
                    <thead>
                        <tr>
                            <th class="wd-5p">No</th>
                            <th class="wd-30p">Nama Kriteria</th>
                            <th class="wd-10p">Bobot Kriteria</th>
                            <th class="wd-5p">Type Kriteria</th>
                            <th class="wd-10p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach($kriteria as $key=>$row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->nama_kirteria }}</td>
                            <td>{{ $row->bobot_kriteria }}</td>
                            <td>{{ $row->type_kriteria }}</td>
                            <td>
                            <a class="h3 text-primary" href="{{ base_url('Petugas/'.$CI->uri->segment(2).'/edit/'.$row->id_kriteria) }}"><i class="typcn typcn-edit"></i></a>
                            <span class="h3 text-danger btn-delete" onclick="delete_alert(this)" data-href="{{ base_url('Sistem/kriteria/'.$row->id_kriteria) }}"><i class="typcn typcn-trash"></i></span>
                                
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