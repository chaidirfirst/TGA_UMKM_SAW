@extends('master')

@section('content')
<div id="email"></div>

@endsection

@section('js')
<script>
send_email();

function send_email(){
    var email=JSON.parse('<?=$email?>');
    email.forEach(val => {
        $.post('{{ base_url("api/tes") }}',{id:val},function(data){
            console.log(data)
        });
    });
}

</script>
@endsection