<?php

use Mpdf\Tag\Tr;

defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Kriteria_model extends MY_Model {
        public $table = 'kriteria';
        public $primary_key = 'id_kriteria';
        public $validate = array(
            array( 'field' => 'nama_kriteria', 
                   'label' => 'Nama Kriteria',
                   'rules' => 'required|is_unique[kriteria.nama_kirteria]'),
            array( 'field' => 'bobot_kriteria',
                   'label' => 'Bobot Kriteria',
                   'rules' => 'required' ),
            array( 'field' => 'type_kriteria',
                   'label' => 'Type Kriteria',
                   'rules' => 'required' )
            
        );        
   
        function transformation_data($param,$value){
               $result='';
               switch ($param) {
                      case 'bidang_usaha':
                            $data=$this->db->get_where('bidang_usaha',['id_usaha'=>$value])->row();
                            $result=$data->bobot_usaha;
                             # code...
                             break;
                      case 'kecamatan':
                            $data['Banda Sakti']='1';
                            $data['Muara Dua']='2';
                            $data['Blang Mangat']='3';
                            $data['Muara Satu']='4';
                            $result=(array_key_exists($value,$data))? $data[$value]:"5";
                            break;
                     case 'NIB':
                            $data['Memiliki']='2';
                            $data['Tidak Memiliki']='1';
                            $result=(array_key_exists($value,$data))? $data[$value]:"3";
                            break;
                     case 'umur':
                            if($value >=18 && $value<=33){
                                   $result=6;
                            }else if($value >=34 && $value<=49){
                                   $result=5;
                            }else if($value >=50 && $value<=65){
                                   $result=4;
                            }else if($value >=66 && $value<=81){
                                   $result=3;
                            }else if($value >=82 && $value<=97){
                                   $result=2;
                            }else{
                                   $result=1;
                            }
                            break;
                     case 'ombset':
                            if($value >=10000  && $value<4010000){
                                   $result=6;
                            }else if($value >=4010001 && $value<8010000){
                                   $result=5;
                            }else if($value >=8010001 && $value<12010000){
                                   $result=4;
                            }else if($value >=12010001 && $value<16010000){
                                   $result=3;
                            }else if($value >=16010001 && $value<=20010000){
                                   $result=2;
                            }else{
                                   $result=1;
                            }
                            break;
                     case 'aset':
                            if($value >=1000 && $value<401000){
                                   $result=6;
                            }else if($value >=401000 && $value<40000){
                                   $result=5;
                            }else if($value >=40000 && $value<601000){
                                   $result=4;
                            }else if($value >=1001001 && $value<1401000){
                                   $result=3;
                            }else if($value >=1401001 && $value<=1801000){
                                   $result=2;
                            }else{
                                   $result=1;
                            }
                            break;
                     case 'status':
                            $data['PERNAH']='2';
                            $data['TIDAK PERNAH']='1';
                            $result=(array_key_exists($value,$data))? $data[$value]:"3";
                            break;
               }

               return  $result;
        }

    }

    
    
    /* End of file Kriteria.php */
