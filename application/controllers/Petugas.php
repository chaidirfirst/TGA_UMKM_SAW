<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {    
    public function __construct()
    {
        parent::__construct();
        $this->modul->emptySession();
    }
    public function index(){
        $color_func=function($x){ return $x=='cos' ? '#560bd0':'#007bff'; };
        $kriteria=$this->Kriteria_model->get_all();
        $data['data']=json_encode(array_column($kriteria,'bobot_kriteria'));
        $data['label']=json_encode(array_column($kriteria,'nama_kirteria'));
        $data['color']=json_encode(array_map($color_func,array_column($kriteria,'type_kriteria')));
        view('content.home',$data);
    }

    public function masyarakat($action=null,$id=null){
        $page='content.masyarakat.index';
        $title='Masyarakat ';
        $data['masyarakat']=null;
        if($action=='add'||$action=='edit'){
            $data['usaha']=$this->Bidang_usaha_model->get_all();
            $data['kecamatan']=['Banda Sakti','Muara Dua','Blang Mangat','Muara Satu'];
            $page='content.masyarakat.form';
        }else{
           
            $data['masyarakat']=$this->Masyarakat_model->join_data()->result();
        }

        if($id){
            $data['masyarakat']=$this->Masyarakat_model->get($id);
        }
        $data['title']=$title.$action;
        $mas=$data['masyarakat'];
        view($page,$data);
    }

    public function kriteria($action=null,$id=null){
        $page='content.kriteria.index';
        $title='kriteria ';
        $data['kriteria']=null;
        if($action=='add'||$action=='edit'){
            $page='content.kriteria.form';
            $title='Form '.$action.' '.$title;
        }else{
            $data['kriteria']=$this->Kriteria_model->get_all();
            
        }

        if($id){
            $data['kriteria']=$this->Kriteria_model->get($id);
        }
        $data['title']=$title;
        view($page,$data);
    }

    public function bidang_usaha($action=null,$id=null){
        $page='content.bidang_usaha.index';
        $title='bidang usaha ';
        $data['bidang_usaha']=null;
        if($action=='add'||$action=='edit'){
            $page='content.bidang_usaha.form';
            $title='Form '.$action.' '.$title;
        }else{
            $data['bidang_usaha']=$this->Bidang_usaha_model->get_all();
        }

        if($id){
            $data['bidang_usaha']=$this->Bidang_usaha_model->get($id);
        }
        $data['title']=$title;
        view($page,$data);
    }


    public function petugas_view($action=null,$id=null){
        //defaul page content or list 
        $page='content.petugas.index';
        $title='Petugas ';
        $data['petugas']=null;
        if($action=='add'||$action=='edit'){
            $page='content.petugas.form';
            $title='Form '.$action.' '.$title;
        }else{
            $data['petugas']=$this->Petugas_model->get_all();
        }

        if($id){
            $data['petugas']=$this->Petugas_model->get($id);
        }
        
        $data['title']=$title;
        view($page,$data);
    }
    
    public function spk_saw(){
        $data['title']='SPK';
        $data['data']=$this->db->join('masyarakat','alternatif_saw.nik=masyarakat.nik')->get('alternatif_saw')->result();
        view('content.saw.index',$data);
    }

    
    public function upload_file(){
        $data['upload']=$this->Upload_model->get_many_by('owner_file','petugas');
        view('content.upload',$data);
    }

    public function import($function_action=null){
        view('content.import.index',['action'=>$function_action]);
    }

}

/* End of file Petugas.php */
