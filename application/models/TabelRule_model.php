<?php

/**
 *
 */
 class TabelRule_model extends CI_Model
 {


  public function __construct()
   {

     $this->load->database();
   }

   public function tampilTabelRule($perPage,$start){
     $this->db->order_by("NoRule", "desc");
     return $get=$this->db->get('tabelrule',$perPage,$start)->result_array();
   }

   public function barisRule(){
   return  $this->db->get('tabelrule')->num_rows();
   }

public function tampilRuleKode(){
  $this->db->limit('1');
  $this->db->order_by("NoRule", "desc");
  return $get=$this->db->get('tabelrule')->result_array();
}

public function tambahDataRule(){
    $data = array(
      'NamaPenyakit' =>$this->input->post('NamaPenyakit') ,
      'kodepenyakit' =>$this->input->post('kodepenyakit') ,
        'KodePertanyaan' =>$this->input->post('KodePertanyaan') ,
      'KodeRule' =>$this->input->post('KodeRule')
   );

  return $this->db->insert('tabelrule',$data);
}

public function deleteRule($NoRule){
  return $this->db->delete('tabelrule',array('NoRUle'=>$NoRule));
}


public function updateRule($NoRule){

    $data =array(
      'KodeRule'=>$this->input->post('KodeRule'),
      'KodePertanyaan'=>$this->input->post('KodePertanyaan'),
        'kodepenyakit'=>$this->input->post('kodepenyakit'),
          'NamaPenyakit'=>$this->input->post('NamaPenyakit')
    );
  $this->db->where('NoRule',$NoRule);
  return $this->db->update('tabelrule',$data);
}
public function getRule($NoRule=FALSE){
  $query = $this->db->get_where('tabelrule',array('NoRule'=> $NoRule));
  return $query->row_array();
}






}
