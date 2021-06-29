<?php if (!defined("BASEPATH")) exit("No direct script access allowed");
    use Jenssegers\Blade\Blade;

    if(!function_exists('view')){
        function view($view,$data=[]){
            $path   = APPPATH.'views';
            $CI =& get_instance();
            $blade  = new Blade($path,APPPATH.'/cache/view');
            $data   =array_merge(['CI'=>$CI],$data);
            echo $blade->make($view,$data);
        }
    }
    function is_path($string,int $uri){
        $CI =& get_instance();
        $current_path=$CI->uri->segment($uri);
        if($current_path==$string){
            return TRUE;
        }
        return FALSE;
    }
    function get_msg($key){
        $CI =& get_instance();
        $msg=$CI->lang->load('fieldtable','sistem',TRUE);
        if(array_key_exists($key,$msg)){
            return $msg[$key];
        }
        return $key;
    }

?>
