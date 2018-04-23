<?php

/**
 *
 */
 class Dataknowledge_model extends CI_Model
 {


  public function __construct()
   {

     $this->load->database();
   }




public function tabelKnowledge($perPage,$start){
  $this->db->order_by("KodePertanyaan", "desc");
  return $get=$this->db->get('tabelpertanyaan',$perPage,$start)->result_array();
}

public function barisPertanyaan(){
return  $this->db->get('tabelpertanyaan')->num_rows();
}








}
