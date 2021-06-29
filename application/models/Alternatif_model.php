<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Alternatif_model extends MY_Model {
        public $table = 'alternatif_saw';
        public $primary_key = 'nik';
        public $validate = array(
            array( 'field' => 'nik', 
                   'label' => 'nik',
                   'rules' => 'required|is_unique[alternatif_saw.nik]'));
        
        function convert_nilai($val=null,$kondisi=null,$statement=null,$type=null){
            if($kondisi=='') return $val;
            if($statement=='') return $val;
    
            $select = explode(';',$kondisi);
            $nilai  = explode(';',$statement);
            $result = '';
            if($type=="select"){
                for($i=0;$i<count($select);$i++){
                    if($val==$select[$i]){
                        $result=array_key_exists($i,$nilai)? $nilai[$i]:'';
                    }
                }
            }
            if($type=="input"){
                for($i=0;$i<count($select);$i++){
                    $str='return ('.$val.''.$select[$i].') ? TRUE:FALSE;';
                    $state=eval($str);
                    if($state){
                        $result=array_key_exists($i,$nilai)? $nilai[$i]:'';
                    }
                }
    
            }
            return $result;
        }

        
    }
    
    /* End of file Alternatif_model.php */
    
?>