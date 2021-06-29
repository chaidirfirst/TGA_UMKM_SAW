<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Petugas_model extends MY_Model {
        public $table = 'petugas';
        public $primary_key = 'id_petugas';
        public $validate = array(
            array( 'field' => 'username', 
                   'label' => 'username',
                   'rules' => 'required|is_unique[petugas.username]'),
            array( 'field' => 'nama_petugas',
                   'label' => 'Nama Petugas',
                   'rules' => 'required' ),
            
            
        );
    
    }
    
    /* End of file Petugas.php */
    
?>