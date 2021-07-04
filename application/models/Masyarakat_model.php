<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Masyarakat_model extends MY_Model {
        public $table = 'masyarakat';
        public $belongs_to = array( 'Bidang_usaha_model' => array( 'primary_key' => 'id_usaha' ) );
        
        public $primary_key = 'nik';
        public $validate = array(
            array( 'field' => 'nik', 
                   'label' => 'nik',
                   'rules' => 'required|is_unique[masyarakat.nik]'),
            array( 'field' => 'nama_lengkap',
                   'label' => 'Nama Lengkap',
                   'rules' => 'required' ),
            array( 'field' => 'jenis_kelamin',
                   'label' => 'Jenis Kelamin',
                   'rules' => 'required' ),
            array( 'field' => 'tanggal_lahir',
                   'label' => 'Tanggal Lahir',
                   'rules' => 'required' ),
            array( 'field' => 'provinsi',
                   'label' => 'provinsi',
                   'rules' => 'required' ),
            array( 'field' => 'kota',
                   'label' => 'kota',
                   'rules' => 'required' ),
            array( 'field' => 'kecamatan',
                   'label' => 'kecamatan',
                   'rules' => 'required' ),
            array( 'field' => 'desa',
                   'label' => 'desa',
                   'rules' => 'required' ),
                   array( 'field' => 'aset',
                   'label' => 'aset',
                   'rules' => 'required' ),
                   array( 'field' => 'omset',
                   'label' => 'omset',
                   'rules' => 'required' ),
            array( 'field' => 'no_telepon',
                   'label' => 'No Telepon',
                   'rules' => 'required' ),
            array( 'field' => 'bidang_usaha',
                   'label' => 'bidang usaha',
                   'rules' => 'required' ),
                   array( 'field' => 'status_penerima',
                   'label' => 'Status Penerima',
                   'rules' => 'required' ),


         );
         
         function join_data($where=null){
             if($where){
                 $this->db->where($where);
             }
             return $this->db->join('bidang_usaha','masyarakat.bidang_usaha=bidang_usaha.id_usaha')->get('masyarakat');
         }
    }
    
    /* End of file Petugas.php */
    
?>