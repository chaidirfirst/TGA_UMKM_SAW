<?php if (!defined("BASEPATH")) exit("No direct script access allowed");


function form_e($str=null)
{ 
    $CI    = & get_instance();
    $array = $CI->session->flashdata('f_error');//array  
    if($array){    
        if(array_key_exists($str,$array)){
            return $array[$str];
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function form_debug(){
    $CI    = & get_instance();
    $array = $CI->session->flashdata('f_error');//
    var_dump($array);
}
function getsession($str=null){
        $CI    = & get_instance();
        return $CI->session->userdata($str);
}
function calculateFileSize($size)
{
   $sizes = ['B', 'KB', 'MB', 'GB'];
   $count=0;
   if ($size < 1024) {
    return $size . " " . $sizes[$count];
    } else{
     while ($size>1024){
        $size=round($size/1024,2);
        $count++;
    }
     return $size . " " . $sizes[$count];
   }
}

function convert_column($str){
    return str_replace(' ','_',strtolower($str));
}


?>