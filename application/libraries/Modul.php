<?php

Class Modul {
    protected $CI;
    public function __construct() { 
        $this->CI =& get_instance();
    }
    function uploadexcel($path){
        // $config['encrypt_name']=TRUE;
        $config['overwrite'] = TRUE;
        $config['upload_path'] = $path;
        $config['file_name']    ='dataset';
        $config['allowed_types'] = 'xlsx';
        
        $this->CI->load->library('upload', $config);
        if ( ! $this->CI->upload->do_upload('file')){
            $data = array('error' => $this->CI->upload->display_errors());
        }
        else{
            $data = $this->CI->upload->data('file_name');
        }
        return $data;
        
    }
   
    function sendEmail($to,$subject,$html)
       {
           // echo phpinfo();
           $this->CI->load->library('email');
   
           $config['protocol']    = 'smtp';
           $config['smtp_host']    = 'smtp.googlemail.com';
           $config['smtp_port']    = '465';
           $config['smtp_timeout'] = '7';
           $config['smtp_user']    = 'rozaliana05@gmail.com';
           $config['smtp_pass']    = 'liilehdjahsaqucb';
           $config['charset']    = 'utf-8';
           $config['newline']    = "\r\n";
           $config['mailtype'] = 'html';  
           $config['smtp_crypto']   = 'ssl';
           $config['wordwrap']  =true;
           // $config['mailtype'] = 'text'; // or html
           $config['validation'] = TRUE; // bool whether to validate email or not      
           $pesan=$html;
           
           $this->CI->email->initialize($config);
   
   
           $this->CI->email->from('rozaliana05@gmail.com', 'SPK');
           $this->CI->email->to($to); 
           $this->CI->email->subject($subject);
           $this->CI->email->message($pesan);  
   
           $this->CI->email->send();
   
      
   
              
       }
    function removeJSON($file){
        
    }
    function alert($pesan=null,$parameter='berhasil',$redirect=null){
       
        $redirect =($redirect) ?? $_SERVER['HTTP_REFERER'];
        switch ($parameter) {
                case 'berhasil':
                    $icon	='success';
                    $title  ='Sukses';
                break;
                case 'gagal':
                    $icon	='error';
                    $title  ='Gagal';
                break;
                case 'peringatan':
                    $icon	='warning';
                    $title  ='peringatan';
                break;
                case 'info':
                    $icon	='info';
                    $title  ='info';
                break;
                default:
                    return false;
                    break;
            
            }
            if($pesan=='f_error'):
                $this->CI->session->set_flashdata('f_error',$this->CI->form_validation->error_array());
            endif;
            if($pesan!='f_error'):

                $alert="swal({
                    'title':'".$title."',
                    'text':'".$pesan."',
                    'icon':'".$icon."'
                })";
                $this->CI->session->set_flashdata('pesan',$alert);
            endif;
            redirect($redirect);
        }
       public function emptySession(){
        $session= $this->CI->session->userdata('id_petugas');
        if(empty($session)) $this->alert('Anda Belum melakukan login','gagal',base_url('login')); 
       }
       function getId(){
           $stamp = date("Ymdhis");
           return "TX-".$stamp.rand(100,999);
       }
}

?>