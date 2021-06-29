<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Sistem extends CI_Controller
{
    private $path_excel;
    public function __construct()
    {
        parent::__construct();
        // load here
    }

    public function change_password()
    {
        $id_petugas = $this->session->userdata('id_petugas');
        $password_lama = $this->input->post('passwordold');
        $password_baru = password_hash($this->input->post('passwordnew'), PASSWORD_BCRYPT);
        $data_petugas = $this->db->get_where('petugas', ['id_petugas' => $id_petugas])->row();
        if (password_verify($password_lama, $data_petugas->password)) {
            $update = $this->Petugas_model->update($id_petugas, ['password' => $password_baru]);
            if ($update) {
                $this->modul->alert("Succes Update Account");
            }

            $this->modul->alert('Fail Update', 'gagal');
        } else {
            $this->modul->alert('Password Old wrong Please Input valid password', 'gagal');
        }
    }

    public function check_nim_tanggal(){
        $nik=$this->input->post('nik');
        $tanggal_lahir=$this->input->post('tanggal_lahir');
        $masyrakat=$this->db->get_where('masyarakat',['nik'=>$nik,'tanggal_lahir'=>$tanggal_lahir])->row();
        if($masyrakat){
            $data['nik']=$nik;
            $this->session->set_userdata($data);
            redirect('info');
        }else{
            $this->modul->alert('NIM dan Tanggal Lahir Tidak Sesuai','gagal');
        }
    }

    public function upload_file($id = null)
    {
        if ($id) {
            $this->Upload_model->delete($id);
            $this->modul->alert("Success Deleted");
        }

        $path_upload = ($this->path_excel) ?? "./uploads/PDF";
        $config['upload_path'] = $path_upload;
        $config['allowed_types'] = 'pdf|xlsx';
        $config['remove_spaces'] = true;
        $config['detect_mime'] = true;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            header("HTTP/1.0 400 Bad Request");
            echo strip_tags($error['error']);
        } else {
            $data = $this->upload->data();

            $upload['name_file'] = $data['raw_name'];
            $upload['path_file'] = $path_upload;
            $upload['location_status'] = "local";
            $upload['type_file'] = $data['file_ext'];
            $upload['size_file'] = $data['file_size'];
            $upload['owner_file'] = "petugas";
            $id_insert = $this->Upload_model->insert($upload);
            return $id_insert;
        }
    }

    public function petugas($id = null)
    {
        // Detelete File Ketika Ada ID dari URL
        if ($id) {
            $this->Petugas_model->delete($id);
            $this->modul->alert("Success Deleted");
        }

        $data['nama_petugas'] = $this->input->post('nama_petugas');
        $data['username'] = $this->input->post('username');

        // edit and insert jika ada Id maka edit jikat tidak maka insert
        $redirect = $this->input->post('redirect');
        $redirect = ($redirect) ? $_SERVER['HTTP_REFERER'] : 'petugas/petugas_view/';
        if (isset($_POST['id'])) {
            $id = $this->input->post('id');
            $this->Petugas_model->skip_validation();
            $update = $this->Petugas_model->update($id, $data);
            $message = 'Success Update';
        } else {
            $data['password'] = password_hash('petugas123', PASSWORD_BCRYPT);
            $insert = $this->Petugas_model->insert($data);
            $message = 'Success Inserting Data';
        }
        if ($update || $insert) {
            $this->modul->alert($message, 'berhasil', $redirect);
        } else {
            $this->modul->alert('f_error');
        }
    }

    public function kriteria($id = null)
    {
        // Detelete kriteria Ketika Ada ID dari URL
        if ($id) {
            $delete = $this->Kriteria_model->delete($id);
            if ($delete) {
                $this->modul->alert("Success Deleted");
            } else {
                $this->modul->alert("Failed Deleted");
            }
        }
        $nama_kriteria = $this->input->post('nama_kriteria');
        $data['nama_kirteria'] = $nama_kriteria;
        $data['bobot_kriteria'] = $this->input->post('bobot_kriteria');
        $data['type_kriteria'] = $this->input->post('type_kriteria');
        // edit and insert jika ada Id maka edit jikat tidak maka insert
        $redirect = $this->input->post('redirect');
        $redirect = ($redirect) ? $_SERVER['HTTP_REFERER'] : 'petugas/kriteria/';
        if (isset($_POST['id'])) {
            $id = $this->input->post('id');
            $this->Kriteria_model->skip_validation();
            $update = $this->Kriteria_model->update($id, $data);
            $message = "Success Update";
        } else {
            $insert = $this->Kriteria_model->insert($data);
            $message = "Success Inserting Data";
        }
        if ($update || $insert) {
            $this->modul->alert($message, 'berhasil', $redirect);
        } else {
            $this->modul->alert('f_error');
        }
    }

    public function bidang_usaha($id = null)
    {
        if ($id) {
            $delete = $this->Bidang_usaha_model->delete($id);
            if ($delete) {
                $this->modul->alert("Success Deleted");
            } else {
                $this->modul->alert("Failed Deleted");
            }
        }
        $bidang_usaha = $this->input->post('bidang_usaha');
        $data['bidang_usaha'] = $bidang_usaha;
        $data['bobot_usaha'] = $this->input->post('bobot_usaha');
        // edit and insert jika ada Id maka edit jikat tidak maka insert
        $redirect = $this->input->post('redirect');
        $redirect = ($redirect) ? $_SERVER['HTTP_REFERER'] : 'petugas/bidang_usaha/';
        if (isset($_POST['id'])) {
            $id = $this->input->post('id');
            $update = $this->Bidang_usaha_model->update($id, $data);
            $message = "Success Update";
        } else {
            $insert = $this->Bidang_usaha_model->insert($data);
            $message = "Success Inserting Data";
        }
        if ($update || $insert) {
            $this->modul->alert($message, 'berhasil', $redirect);
        } else {
            $this->modul->alert('f_error');
        }
    }

    public function masyarakat($nik = null)
    {
        // delete jika terdapat nik
        if ($nik) {
            $this->Alternatif_model->delete($nik);
            $this->Masyarakat_model->delete($nik);
            $this->modul->alert("Success Deleted");
        }
        $nik = $this->input->post('nik');
        $masyrakat['nama_lengkap'] = $this->input->post('nama_lengkap');
        $masyrakat['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $masyrakat['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $masyrakat['provinsi'] = $this->input->post('provinsi');
        $masyrakat['kota'] = $this->input->post('kota');
        $masyrakat['kecamatan'] = $this->input->post('kecamatan');
        $masyrakat['desa'] = $this->input->post('desa');
        $masyrakat['no_telepon'] = $this->input->post('no_telepon');
        $masyrakat['aset'] = $this->input->post('aset');
        $masyrakat['omset'] = $this->input->post('omset');
        $masyrakat['umur'] = $this->input->post('umur');
        $masyrakat['nb_skhu'] = $this->input->post('nb_skhu');
        $masyrakat['status_penerima'] = $this->input->post('status_penerima');
        $masyrakat['bidang_usaha'] = $this->input->post('bidang_usaha');
        $nik = ($nik) ?? $this->input->post('id');
        // data dari alternatif

        $alternatif = $this->alternatif($nik);
        $redirect = $this->input->post('redirect');
        $redirect = ($redirect) ? $_SERVER['HTTP_REFERER'] : 'petugas/masyarakat/';
        if (array_key_exists('id', $_POST)) {
            $id = $nik;
            $this->Masyarakat_model->skip_validation();
            $this->Alternatif_model->skip_validation();
            $masyrakat['date_update']=date('Y-m-d H:i:s');
            $masyrakat_update = $this->Masyarakat_model->update($id, $masyrakat);
            $alternatif_update = $this->Alternatif_model->update($id, $alternatif);
            $action = ($masyrakat_update == 0 and $alternatif_update == 0) ? true : false;
            $message = "Success Update";
        } else {
            $masyrakat['nik'] = $nik;
            $masyrakat['date_insert']=date('Y-m-d H:i:s');
            $masyrakat_insert = $this->Masyarakat_model->insert($masyrakat);
            $alternatif_insert = $this->Alternatif_model->insert($alternatif);
            $action = ($masyrakat_insert == 0 and $alternatif_insert == 0) ? true : false;
            $message = "Success Insert";
        }
        if ($action) {
            $this->modul->alert($message, 'berhasil', $redirect);
        } else {
            $this->modul->alert('f_error');
        }

    }

    private function alternatif($nik)
    {
        $alternatif['nik'] = $nik;
        $alternatif['C1'] = $this->Kriteria_model->transformation_data('aset', $this->input->post('aset'));
        $alternatif['C2'] = $this->Kriteria_model->transformation_data('ombset', $this->input->post('omset'));
        $alternatif['C3'] = $this->Kriteria_model->transformation_data('bidang_usaha', $this->input->post('bidang_usaha'));
        $alternatif['C4'] = $this->Kriteria_model->transformation_data('NIB', $this->input->post('nb_skhu'));
        $alternatif['C5'] = $this->Kriteria_model->transformation_data('status', $this->input->post('status_penerima'));
        $alternatif['C6'] = $this->Kriteria_model->transformation_data('umur', $this->input->post('umur'));
        $alternatif['C7'] = $this->Kriteria_model->transformation_data('kecamatan', $this->input->post('kecamatan'));
        return $alternatif;
    }

    public function masyarakat_register()
    {
        $nik = $this->input->post('nik');
        $masyrakat['nik'] = $nik;
        $masyrakat['nama_lengkap'] = $this->input->post('nama_lengkap');
        $masyrakat['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $masyrakat['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $masyrakat['provinsi'] = $this->input->post('provinsi');
        $masyrakat['kota'] = $this->input->post('kota');
        $masyrakat['kecamatan'] = $this->input->post('kecamatan');
        $masyrakat['desa'] = $this->input->post('desa');
        $masyrakat['no_telepon'] = $this->input->post('no_telepon');
        $masyrakat['aset'] = $this->input->post('aset');
        $masyrakat['omset'] = $this->input->post('omset');
        $masyrakat['nb_skhu'] = $this->input->post('nb_skhu');
        $masyrakat['status_penerima'] = $this->input->post('status_penerima');
        $masyrakat['bidang_usaha'] = $this->input->post('bidang_usaha');
        $masyrakat['umur'] = $this->input->post('umur');
        $masyrakat['date_insert']=date('Y-m-d H:i:s');
        // data dari alternatif
        $alternatif = $this->alternatif($nik);
        $masyrakat_insert = $this->Masyarakat_model->insert($masyrakat);
        $alternatif_insert = $this->Alternatif_model->insert($alternatif);
        if ($masyrakat_insert == 0) {
            $this->session->set_userdata(['nik'=>$nik]);
            $this->modul->alert("Registrasi Berhasil ", "berhasil",base_url('info'));
        } else {
            $this->modul->alert('f_error');
        }
    }
    public function masyarakat_update()
    {
        $masyrakat['nama_lengkap'] = $this->input->post('nama_lengkap');
        $masyrakat['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $masyrakat['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $masyrakat['provinsi'] = $this->input->post('provinsi');
        $masyrakat['kota'] = $this->input->post('kota');
        $masyrakat['kecamatan'] = $this->input->post('kecamatan');
        $masyrakat['desa'] = $this->input->post('desa');
        $masyrakat['no_telepon'] = $this->input->post('no_telepon');
        $masyrakat['aset'] = $this->input->post('aset');
        $masyrakat['omset'] = $this->input->post('omset');
        $masyrakat['nb_skhu'] = $this->input->post('nb_skhu');
        $masyrakat['status_penerima'] = $this->input->post('status_penerima');
        $masyrakat['bidang_usaha'] = $this->input->post('bidang_usaha');
        $masyrakat['umur'] = $this->input->post('umur');
        // data dari alternatif
        $nik=$this->input->post('id');
        $alternatif = $this->alternatif($nik);
        $this->Masyarakat_model->skip_validation();
        $this->Alternatif_model->skip_validation();
        $masyrakat['date_update']=date('Y-m-d H:i:s');
        $masyrakat_update = $this->Masyarakat_model->update($nik, $masyrakat);
        $alternatif_update = $this->Alternatif_model->update($nik, $alternatif);
        $this->modul->alert('Berhasil Diubah','berhasil',base_url('info'));
    }

    public function import($uri = null)
    {
        $this->path_excel = "./uploads/EXCEl/";
        $id_upload = $this->upload_file();
        if (empty($id_upload)) {
            exit();
        }
        $file_upload = $this->Upload_model->get($id_upload);
        $path_file = $file_upload->path_file . "/" . $file_upload->name_file . $file_upload->type_file;
        $excel = new Xlsx();
        $excel = $excel->load($path_file);
        $data_sheet = $excel->getActiveSheet()->toArray(null, true, true, true);
        if ($uri === 'masyarakat') {
            $redirect = base_url('petugas/masyarakat/');
            $this->import_data_database($data_sheet, 'masyarakat_import');
            $this->import_data_database($data_sheet, 'alternatif_import');
        } elseif ($uri == "bidang") {
            $redirect = base_url('petugas/bidang_usaha/');
            $this->import_data_database($data_sheet, 'bidang_usaha_import');
        }
        echo strip_tags($redirect);

    }
    private function import_data_database($data_sheet, $func)
    {
        $data = [];
        for ($i = 2; $i <= count($data_sheet); $i++) {
            $this->$func($data_sheet[$i]);
        }
    }
    private function masyarakat_import($data)
    {
        $masyrakat['nik'] = $data['B'];
        $masyrakat['nama_lengkap'] = $data['C'];
        $masyrakat['jenis_kelamin'] = $data['D'];
        $masyrakat['tanggal_lahir'] = $data['E'];
        $masyrakat['umur']=$data['F'];
        $masyrakat['provinsi'] = $data['G'];
        $masyrakat['kota'] = $data['H'];
        $masyrakat['kecamatan'] = $data['I'];
        $masyrakat['desa'] = $data['J'];
        $bidang_usaha= $this->check_bidang_usaha($data['K']);
        $masyrakat['bidang_usaha'] = $bidang_usaha->id_usaha;
        $masyrakat['no_telepon'] = $data['L'];
        $masyrakat['status_penerima'] =$data['N'];
        $masyrakat['nb_skhu']=$data['M'];
        $masyrakat['aset']=$data['O'];
        $masyrakat['omset']=$data['P'];
        $masyrakat['date_insert']=date('Y-m-d H:i:s');
        $this->Masyarakat_model->insert($masyrakat);
    }
    private function bidang_usaha_import($data)
    {
        $bidang_usaha['bidang_usaha'] = $data['B'];
        $bidang_usaha['bobot_usaha'] = $data['C'];
        $this->Bidang_usaha_model->insert($bidang_usaha);
    }
    private function alternatif_import($data)
    {
        $alternatif['nik'] = $data['B'];
        $bidang_usaha=$this->check_bidang_usaha($data['K']);
        $alternatif['C1'] = $this->Kriteria_model->transformation_data('aset', $data['O']);
        $alternatif['C2'] = $this->Kriteria_model->transformation_data('ombset', $data['P']);
        $alternatif['C3'] = $this->Kriteria_model->transformation_data('bidang_usaha', $bidang_usaha->id_usaha);
        $alternatif['C4'] = $this->Kriteria_model->transformation_data('NIB', $data['M']);
        $alternatif['C5'] = $this->Kriteria_model->transformation_data('status', $data['N']);
        $alternatif['C6'] = $this->Kriteria_model->transformation_data('umur', $data['F']);
        $alternatif['C7'] = $this->Kriteria_model->transformation_data('kecamatan', $data['I']);
        $this->Alternatif_model->insert($alternatif);
    }

    private function check_bidang_usaha($string)
    {
        return $this->Bidang_usaha_model->get_by('bidang_usaha', $string);
    }

}

/* End of file Sistem.php */
