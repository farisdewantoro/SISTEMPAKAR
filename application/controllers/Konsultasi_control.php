<?php


/**
 *
 */
class Konsultasi_control extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->library('session');
$this->load->helper('form');
$this->load->library('form_validation');
$this->load->library('upload');
    $this->load->helper('url_helper');
    $this->load->helper('text');
    $this->load->helper('date');
    $this->load->library('pagination');
    $this->load->model('Konsultasi_model');
    $this->load->model('Jawaban_model');
  }

public function konsultasi(){

  if (!empty($this->session->userdata('username'))) {




$username = $this->session->userdata('username');
$this->db->select('*');
$this->db->from('riwayatjawaban');
$this->db->where('username',$username);
$qCek=$this->db->get();

if ($qCek->num_rows() > 0)
{


    $data['Backward']=$this->Jawaban_model->cariPertanyaan();
  $data['jawabanUser'] = $this->Jawaban_model->tampilJawaban();
    $this->load->view('pages/static/header');
    $this->load->view('pages/forms/konsultasi2',$data);
    $this->load->view('pages/static/footer');

}else {


$row=$this->Konsultasi_model->baris();

$config['base_url'] = 'http://localhost/diagnosaKucing/konsultasi';
$config['total_rows'] = $row;
$config['per_page'] = 1;
$start=$this->uri->segment(2);
$this->pagination->initialize($config);

$data['konsul']=$this->Konsultasi_model->konsul_pertanyaan($config['per_page'],$start);
$data['totalhalaman']=$row;
$data['halaman']=$start;



$this->load->view('pages/static/header');
$this->load->view('pages/forms/konsultasi',$data);
$this->load->view('pages/static/footer');
}

}else {

  $backreload = $_SERVER['HTTP_REFERER'];
  echo "<script>alert('KAMU HARUS LOGIN DULU !'); document.location.href='$backreload';</script>";
}


}

function halaman(){
  $row=$this->Konsultasi_model->baris();

$config['base_url'] = 'http://localhost/diagnosaKucing/konsultasi';
  $config['total_rows'] = $row;
  $config['per_page'] = 1;
  $start=$this->uri->segment(3);
  $this->pagination->initialize($config);

  $data['konsul']=$this->Konsultasi_model->konsul_pertanyaan($config['per_page'],$start);
  $data['totalhalaman']=$row;
  $data['halaman']=$start;

  $this->load->view('pages/static/header');
  $this->load->view('pages/forms/konsultasi',$data);
  $this->load->view('pages/static/footer');
}

public function konsultasi_backwardchaining(){

    $row=$this->Konsultasi_model->baris();
    $start=$this->uri->segment(3);
    $config['total_rows'] = $row;
  $config['per_page'] = 1;
$kodeP=$this->input->post('KodePertanyaan');
$data['konsul']=$this->Konsultasi_model->caripenyakit($kodeP,$config['per_page'],$start);
$data['totalhalaman']=$row;
$data['halaman']=$start;


$this->load->view('pages/static/header');
$this->load->view('pages/forms/konsultasi',$data);
$this->load->view('pages/static/footer');

}


public function jawaban(){

if (!empty($this->session->userdata('username'))) {

$username = $this->session->userdata('username');

$this->Jawaban_model->jawabanUser();
$data['jawabanUser'] = $this->Jawaban_model->tampilJawaban();
$this->db->select('*');
$this->db->from('riwayatjawaban');
$this->db->where('username',$username);
$this->db->where('jawaban','YA');
$qCek=$this->db->get();

if ($qCek->num_rows() > 0)
{



$query1=$this->db->query("SELECT kodePertanyaan from riwayatjawaban where jawaban ='YA' and username='$username'");
foreach ($query1->result() as $row)
{
         $a= $row->kodePertanyaan;
         $b[]= $a;

}
$bca = implode(",",$b);
$bca = "$bca";

$this->db->select('*');
$this->db->from('tabelrule');
$this->db->where('KodePertanyaan',$bca);
$queryHasil=$this->db->get();
$queryHasil2=$queryHasil->result_array();

if ($queryHasil->num_rows() > 0)
{

foreach ($queryHasil2 as $kodepenyakit) {
    $data = $kodepenyakit['kodepenyakit'];
}

$this->db->select('*');
$this->db->from('tabelpenyakit');
$this->db->where('KodePenyakit',$data);
$queryHasilPenyakit=$this->db->get();
$queryHasilPenyakit2['tabelpenyakit']=$queryHasilPenyakit->result_array();


$this->load->view('pages/static/header');
$this->load->view('pages/forms/hasildiagnosa',$queryHasilPenyakit2);
$this->load->view('pages/static/footer');
 $username=$this->session->userdata('username');
 $this->db->delete('riwayatjawaban',array('username'=>$username));

} else {
$data['Backward']=$this->Jawaban_model->cariPertanyaan();

$this->load->view('pages/static/header');
$this->load->view('pages/forms/konsultasi2',$data);
$this->load->view('pages/static/footer');

}
}else {
  $data['Backward']=$this->Jawaban_model->cariPertanyaan();
$data['jawabanUser'] = $this->Jawaban_model->tampilJawaban();
  $this->load->view('pages/static/header');
  $this->load->view('pages/forms/konsultasi2',$data);
  $this->load->view('pages/static/footer');
}

}else {
  redirect('Halaman/view');
}


}


}
