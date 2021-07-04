<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
    public $json;

    public function check_nik(){
        $nik=$this->input->post('nik');
        $masyrakat=$this->Masyarakat_model->get($nik);
        $data['error']=true;
        if(empty($masyrakat)){
            $data['error']=false;
        } 
        $this->json=$data;
    }
    public function send_email(){
        $nik=$this->input->post('nik');
        // $id_file=$this->input->post('id_file');
        $masyrakat=$this->Masyarakat_model->get($nik);
        // $file_peryaratan=$this->Upload_model->get($id_file);
    }
   
    
    
    public function __destruct()
    {
        echo json_encode($this->json);
    }

}

/* End of file Ajax.php */

?>