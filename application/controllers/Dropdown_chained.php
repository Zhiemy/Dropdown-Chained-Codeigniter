<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dropdown_chained extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Dropdown_chained_model','model');
      //Do your magic here
   }

   public function index()
   {
      $data['propinsi'] = $this->model->get_propinsi();
      $this->load->view('dropdown_chained', $data);
   }

   public function get_kota()
   {
      $propinsi = $_GET['propinsi'];

         $arr_data = array(
            'id_propinsi' => $propinsi
         );

         $get_kabkota = $this->model->get_kota($propinsi)->result();

         $arr_kabkota = array();
         foreach($get_kabkota as $row)
         {
            $arr_kabkota[$row->id_kota] = $row->nama;
         }

         $json = json_encode($arr_kabkota);
         echo $json;
   }

   public function get_kecamatan()
   {
      $kota = $_GET['kota'];

         $arr_data = array(
            'id_kota' => $kota
         );

         $get_kecamatan = $this->model->get_kecamatan($kota)->result();

         $arr_kecamatan = array();
         foreach($get_kecamatan as $row)
         {
            $arr_kecamatan[$row->id] = $row->nama;
         }

         $json = json_encode($arr_kecamatan);
         echo $json;
   }

   public function get_desa()
   {
      $kecamatan = $_GET['kecamatan'];

         $arr_data = array(
            'id_kecamatan' => $kecamatan
         );

         $get_desa = $this->model->get_desa($kecamatan)->result();

         $arr_desa = array();
         foreach($get_desa as $row)
         {
            $arr_desa[$row->id] = $row->nama;
         }

         $json = json_encode($arr_desa);
         echo $json;
   }
}

/* End of file Dropdown_chained.php */
/* Location: ./application/controllers/Dropdown_chained.php */