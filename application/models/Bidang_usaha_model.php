<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Bidang_usaha_model extends MY_Model {
        public $table = 'bidang_usaha';
        public $primary_key = 'id_usaha';
        public $validate = array(
            array( 'field' => 'bidang_usaha', 
                   'label' => 'bidang Usaha',
                   'rules' => 'required'),
            array( 'field' => 'bobot_usaha', 
                   'label' => 'bobot usaha',
                   'rules' => 'required'),);
       
       
    }
    
    /* End of file Upload.php */
    
?>