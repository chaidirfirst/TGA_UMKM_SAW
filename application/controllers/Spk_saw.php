<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Spk_saw extends CI_Controller {
     
    public function index()
    {
        $this->load->library('saw');
        $kriteria=$this->db->order_by('bobot_kriteria','desc')->get('kriteria')->result();
        $top_alternatif=$this->top_alternatif();
        $saw=new Saw($kriteria);
        $saw_data=$this->get_data();
        $normalisasi=$saw->get_normalisasi($saw_data);
        $rank_alternatif=$saw->rank_alternatif($normalisasi);
        $result_alternatif=$this->get_data_by($rank_alternatif);
        $rank_top=$saw->rank_only($rank_alternatif,$top_alternatif);
        $result_alternatif_top=$this->get_data_by($rank_top);
        $data['title']="SPK";
        $data['alternatif_saw']=$result_alternatif;
        $data['rank_top']=$result_alternatif_top;
        view('content.saw.send_email',$data);
        
    }

    private function get_data(){
       $limit=$this->input->post('limit');
       if($limit!==''){
           return $this->db->limit($limit)->get('alternatif_saw')->result_array();
       }
       return  $this->Alternatif_model->as_array()->get_all();
    }
    private function top_alternatif(){
        $top=$this->input->post('top');
        if($top==''){
            return count($this->get_data());
        }else{
            return $top;
        }
    }
    private function get_data_by($rank_top){
        $nik=array_column($rank_top,'nik');
        $total=array_column($rank_top,'total');
        $top=1;
        foreach($nik as $key=>$nik){
            $data[$key]=$this->db->join('bidang_usaha','masyarakat.bidang_usaha=bidang_usaha.id_usaha')->get_where("masyarakat",["nik"=>$nik])->row_array();
            $data[$key]['top']=$top;
            $data[$key]['total']=$total[$key];
            $top++;
        }
        return $data;
    }
    

}

/* End of file Spk_saw.php */
?>