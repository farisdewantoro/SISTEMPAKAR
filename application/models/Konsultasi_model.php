<?php



/**
 *
 */
class Konsultasi_model extends CI_Model
{

  function __construct()
  {
$this->load->database();
  }


public function konsul_pertanyaan($perPage,$start){

$this->db->select('*');
return $query = $this->db->get('tabelpertanyaan',$perPage,$start)->result_array();


}

public function baris(){
  return $this->db->get('tabelpertanyaan')->num_rows();
}


public function rekappertanyaan() {

$data=array(
  'KodePertanyaan' =>$this->input->post('KodePertanyaan'),
  'Pertanyaan' =>  $this->input->post('Pertanyaan'),
  'Tanggal'=>$this->input->post('Tanggal'),
  'Waktu'=>$this->input->post('Waktu'),
  'username'=>$this->session->userdata('username')
 );

return $this->db->insert('rekappenyakit',$data);
}

public function caripenyakit($kodeP,$perPage,$start){
$kodeP=$this->input->post('KodePertanyaan');




$query = $this->db->query("SELECT * from tabelpertanyaan where KodePertanyaan like '$kodeP' ");

;


  return $query->result_array();
konsul_pertanyaan($perPage,$start);
}






}
