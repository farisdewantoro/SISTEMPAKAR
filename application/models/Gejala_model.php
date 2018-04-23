<?php

/**
 *
 */
 class Gejala_model extends CI_Model
 {


  public function __construct()
   {

     $this->load->database();
   }



public function tampilGejala(){
  $this->db->order_by("NoGejala", "desc");
  return $get=$this->db->get('tabelgejala')->result_array();
}









}
