<?php

/**
 *
 */
 class TabelPenyakit_model extends CI_Model
 {


  public function __construct()
   {

     $this->load->database();
   }



public function tampilPenyakit(){
  $this->db->order_by("NoPenyakit", "desc");
  return $get=$this->db->get('tabelpenyakit')->result_array();
}

public function barisPenyakit(){
return  $this->db->get('tabelpenyakit')->num_rows();
}
public function tabelPenyakit($perPage,$start){
  $this->db->order_by("NoPenyakit", "desc");
  return $get=$this->db->get('tabelpenyakit',$perPage,$start)->result_array();
}
public function tampilKodePenyakit(){
  $this->db->limit('1');
  $this->db->order_by("NoPenyakit", "desc");
  return $get=$this->db->get('tabelpenyakit')->result_array();
}

public function tambahDataPenyakit(){
    $data = array(
      'NamaPenyakit' =>$this->input->post('NamaPenyakit') ,
      'KodePenyakit' =>$this->input->post('KodePenyakit') ,
      'Deskripsi' =>$this->input->post('Deskripsi')
   );

  return $this->db->insert('tabelpenyakit',$data);
}
public function deletePenyakit($noPenyakit){
  return $this->db->delete('tabelpenyakit',array('NoPenyakit'=>$noPenyakit));
}

public function getPenyakit($noPenyakit=FALSE){
  $query = $this->db->get_where('tabelpenyakit',array('NoPenyakit'=> $noPenyakit));
  return $query->row_array();
}

public function updatePenyakit($noPenyakit){

    $data =array(
      'NamaPenyakit'=>$this->input->post('NamaPenyakit'),
      'Deskripsi'=>$this->input->post('Deskripsi')
    );
  $this->db->where('NoPenyakit',$noPenyakit);
  return $this->db->update('tabelpenyakit',$data);
}




}
