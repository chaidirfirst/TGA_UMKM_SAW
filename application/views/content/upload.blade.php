@extends('master')
@section('css')
<link href="{{ base_url('assets/') }}lib/dropzone/dropzone.min.css" rel="stylesheet">
<style>
.dropzone {
    background: white;
    border-radius: 5px;
    border: 2px dashed rgb(0, 135, 247);
    border-image: none;
    width: 100%;
    margin-left: auto;
    margin-right: auto;
}
</style>
@endsection
@section('content')
<div class="az-content-breadcrumb">
    <span>Home</span>
    <span>Upload</span>
</div>
<h2 class="az-content-title">Uploads File</h2>
<div class="row row-sm">
    <div class="col-md">
        <div class="card card-body  bd-0">
            <form class="dropzone needsclick" id="demo-upload" action="/upload">
                <DIV class="dz-message">    
                    Drop files here or click to upload. Only Type PDF<BR>
                </DIV>
            </form>
        </div><!-- card -->
    </div><!-- col -->
</div><!-- row -->

<div class="row row-sm mt-2">
<div class="col-md">
        <div class="card card-body  bd-0">
            <table id="datatable1" class="display responsive nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama File</th>
                        <th>Type File</th>
                        <th>Size File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach($upload as $key=>$row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->name_file }}</td>
                            <td>{{ $row->type_file }}</td>
                            <td>{{ calculateFileSize($row->size_file) }}</td>
                            <td>
                            <a class="h3 text-primary" href="{{ ($row->location_status=='local')? base_url($row->path_file.'/'.$row->name_file.$row->type_file):$row->path_file }}"><i class="typcn typcn-eye-outline"></i></a>
                            <span class="h3 text-danger btn-delete" onclick="delete_alert(this)"  data-href="{{ base_url('Sistem/Upload_file/'.$row->id_file) }}"><i class="typcn typcn-trash"></i></span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- card -->
    </div>
</div>
@endsection
@section('js')
<script src="{{ base_url('assets/lib/dropzone/dropzone.min.js') }}"></script>
<script>
var myDropzone = new Dropzone("#demo-upload", { url: "{{ base_url('Sistem/upload_file') }}"});
myDropzone.on("success",function(){
    location.reload();
})
</script>
@endsection