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
<h2 class="az-content-title">Import File</h2>
<div class="row row-sm">
    <div class="col-md">
        <div class="card card-body  bd-0">
        <input type="hidden" id="uri" name="action" value="{{ $action }}">
            <form class="dropzone needsclick" id="demo-upload" action="/upload">
                <div class="dz-message">    
                    Drop files here or click to upload. Only Type EXCEL .XLSX<BR>
                </div>
            </form>
            <a class="mt-3 text-success" href="" id="respone_impor"></a>
        </div><!-- card -->
    </div><!-- col -->
</div><!-- row -->

<div class="row row-sm mt-2">

@endsection
@section('js')
<script src="{{ base_url('assets/lib/dropzone/dropzone.min.js') }}"></script>
<script>
var uri=$("#uri").val();
var myDropzone = new Dropzone("#demo-upload", { url: "{{ base_url('Sistem/import/') }}"+uri});
var respon_btn=$("#respone_impor");
myDropzone.on("success",function(data,respon){
   respon_btn.attr('href',respon);
   respon_btn.html(respon);
})
</script>
@endsection