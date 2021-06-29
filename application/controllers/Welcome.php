<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		// pendaftaran langsung oleh masyarakat
		$data['title']='Masyarakat';
		view('content.register_masyarakat.register',$data);
	}

	public function register_masyarakat(){
		$data['title']='Register Masyarakat';
		$data['usaha']=$this->Bidang_usaha_model->get_all();
		$data['masyarakat']=null;
		$data['kecamatan']=['Banda Sakti','Muara Dua','Blang Mangat','Muara Satu'];
		$data['action']='sistem/masyarakat_register';
		$data['btn']='Register';
		view('form_register_masyarakat',$data);
	}

	public function info_masyarakat(){
		$nik=$this->session->userdata('nik');
		if(empty($nik)){
			redirect('/');
		}
		$data['title']='Info Masyarakat';
		
		$data['masyarakat']=$this->db->join('bidang_usaha','masyarakat.bidang_usaha=bidang_usaha.id_usaha')->where(['nik'=>$nik])->get('masyarakat')->row();
		view('content.register_masyarakat.info',$data);
	}
	public function ubah_masyarakat(){
		$nik=$this->session->userdata('nik');
		if(empty($nik)){
			redirect('/');
		}
		$data['title']='Register Masyarakat';
		$data['usaha']=$this->Bidang_usaha_model->get_all();
		$data['action']='sistem/masyarakat_update';
		$data['btn']='Ubah';
		$data['kecamatan']=['Banda Sakti','Muara Dua','Blang Mangat','Muara Satu'];
		$data['masyarakat']=$this->Masyarakat_model->get_by('nik',$nik);
		view('form_register_masyarakat',$data);
	}

	
}
