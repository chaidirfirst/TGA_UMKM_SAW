<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        if(isset($_SESSION['id_petugas'])){
            redirect('Petugas','refresh');
        }
        view('content.login');
    }
    function auth()
    {
        if(empty($_POST)){
            show_404();
            exit();
        }
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $login = $this->db->get_where('petugas', ['username' => $username])->row();
        if ($login) {
            if (password_verify($password, $login->password)) {
                $data['id_petugas']=$login->id_petugas;
                $data['nama_petugas']=$login->nama_petugas;
                $data['username']=$login->username;
                $this->session->set_userdata($data);
                redirect('Petugas');
            } else {
                $this->modul->alert("Password Salah , Harap Di periksa Kembali",'gagal');
            }
        } else {
            $this->modul->alert("Username tidak ditemukan",'gagal');
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('Login');
        
    }
    function exit(){
        $this->session->sess_destroy();
        redirect('/');
        
    }
}

/* End of file Login.php */
