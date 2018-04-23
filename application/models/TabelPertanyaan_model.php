<?php

/**
 *
 */
 class TabelPertanyaan_model extends CI_Model
 {


  public function __construct()
   {

     $this->load->database();
   }



public function tampilPertanyaan(){
  $this->db->limit('1');
  $this->db->order_by("NoPertanyaan", "desc");
  return $get=$this->db->get('tabelpertanyaan')->result_array();
}

public function tambahDataPertanyaan(){
    $data = array(
      'NamaGejala' =>$this->input->post('NamaGejala') ,
      'KodePertanyaan' =>$this->input->post('KodePertanyaan') ,
      'Pertanyaan' =>$this->input->post('Pertanyaan')
   );

  return $this->db->insert('tabelpertanyaan',$data);
}

public function deletePertanyaan($noPertanyaan){
  return $this->db->delete('tabelpertanyaan',array('NoPertanyaan'=>$noPertanyaan));
}


public function updatePertanyaan($noPertanyaan){

    $data =array(
      'NamaGejala'=>$this->input->post('NamaGejala'),
      'Pertanyaan'=>$this->input->post('Pertanyaan')
    );
  $this->db->where('NoPertanyaan',$noPertanyaan);
  return $this->db->update('tabelpertanyaan',$data);
}
public function getPertanyaan($noPertanyaan=FALSE){
  $query = $this->db->get_where('tabelpertanyaan',array('NoPertanyaan'=> $noPertanyaan));
  return $query->row_array();
}






}
