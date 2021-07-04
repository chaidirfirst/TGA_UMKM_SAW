<?php defined('BASEPATH') or exit('No direct script access allowed');
class Saw
{
    private $kriteria;
    private $bobot_kriteria;
    public function __construct($kriteria = null)
    {
        $this->kriteria = $kriteria;
    }
    /**
     * function kriteria merupakan list dari kriteria  
     * terdapat 2 array array pertama yaitu  type kriteria dan bobot kriteria
     * **/
    private  function kriteria()
    {
        $kriteria = $this->kriteria;
        $intital_kriteria = 1;
        $bobot_kriteria = [];
        $tmp_baru=[];
        foreach ($kriteria as $key => $value) {
            $tmp_baru['C' . $intital_kriteria] = $value->type_kriteria;
            $bobot_kriteria['C' . $intital_kriteria] = $value->bobot_kriteria;
            $intital_kriteria++;
        }
        $this->bobot_kriteria=$bobot_kriteria;
        return $tmp_baru;
    }
    /**
     * @param data merupakan list dari data alternatif
     * @param attribut merupakan dari type dari setiap kriteria
     * @param nilai merupakan nilai dari setiap alternatif dan kriteria
     * fungsi ini menormalisasi dengan sesuai dengan rumus dari SAW 
     */

    private function normalisasi(array $data, string $attribut, $nilai)
    {
        if ($attribut == 'ben') {
            $result = $nilai / max($data);
        }
        if ($attribut == 'cos') {
            $result = min($data) / $nilai;
        }
        return number_format($result,2);
    }

    /**
     * @param data merupakan list dari alternatif 
     * fungsi ini berfungsi untuk mengambil normalisasi
     *  dari setiap list alternatif dan serta mengkalikannya dengan bobot
     *  dari setiap kriteria dan disimpan pada variabel data
     **/

    public function get_normalisasi(array $data)
    {
        $attribut_kriteria = $this->kriteria();
        $attribut_bobot = $this->bobot_kriteria;
        $baru_data=[];
        foreach ($data as $key_data => $alternatif) {
            $result = [];
            foreach ($alternatif as $key_attribut => $nilai) {
                if (array_key_exists($key_attribut, $attribut_kriteria)) {
                    $kriteria_alternatif = array_column($data, $key_attribut);
                    $attribut_label     = $attribut_kriteria[$key_attribut];
                    $normalisasi        = $this->normalisasi($kriteria_alternatif, $attribut_label, $nilai);
                    $result[]           = $normalisasi * $attribut_bobot[$key_attribut];
                    $baru_data[$key_data][$key_attribut] = $normalisasi;
                    $baru_data[$key_data]['nik']=$data[$key_data]['nik'];
                }
            }
            $baru_data[$key_data]['total'] = array_sum($result);
        }
        return $baru_data;
    }
    /**
     * @param data merupakan list dari alternatif yang
     * sudah di akumulasi dengan normalisan dan di kalikan dengan bobot
     * fungsi ini mengrankingnya dari data alternatif
     */
    public function rank_alternatif($data)
    {
        $total = array_column($data, 'total');
        array_multisort($total, SORT_DESC, $data);
        return $data;
    }

    /**
     * @param data list dari data alternatif yang sudah di rankan 
     * @param jumlah_tampil jumlah dari data yang ingin di tampilkan 
     */
    public function rank_only(array $data, int $jumlah_tampil)
    {
        if ($jumlah_tampil >= count($data)) {
            return $data;
        }
        $result = [];
        for ($i = 0; $i < $jumlah_tampil; $i++) {
            $result[$i] = $data[$i];
        }
        return $result;
    }
}
