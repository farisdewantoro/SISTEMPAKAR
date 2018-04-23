<?php

/**
 *
 */
 class TabelGejala_model extends CI_Model
 {


  public function __construct()
   {

     $this->load->database();
   }



public function tampilGejala(){
  $this->db->order_by("NoGejala", "desc");
  return $get=$this->db->get('tabelgejala')->result_array();
}

public function barisGejala(){
return  $this->db->get('tabelgejala')->num_rows();
}

public function tabelGejala($perPage,$start){
  $this->db->order_by("NoGejala", "desc");
  return $get=$this->db->get('tabelgejala',$perPage,$start)->result_array();
}
public function tampilKodeGejala(){
  $this->db->limit('1');
  $this->db->order_by("NoGejala", "desc");
  return $get=$this->db->get('tabelgejala')->result_array();
}

public function tambahDataGejala(){
    $data = array(
      'NamaGejala' =>$this->input->post('NamaGejala') ,
      'KodeGejala' =>$this->input->post('KodeGejala')
   );

  return $this->db->insert('tabelgejala',$data);
}
public function deleteGejala($NoGejala){
  return $this->db->delete('tabelgejala',array('NoGejala'=>$NoGejala));
}

public function getGejala($NoGejala=FALSE){
  $query = $this->db->get_where('tabelgejala',array('NoGejala'=> $NoGejala));
  return $query->row_array();
}

public function updateGejala($NoGejala){

    $data =array(
      'NamaGejala'=>$this->input->post('NamaGejala'),
      'KodeGejala'=>$this->input->post('KodeGejala')
    );
  $this->db->where('NoGejala',$NoGejala);
  return $this->db->update('tabelgejala',$data);
}




}
