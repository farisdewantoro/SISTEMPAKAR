<?php

/**
 *
 */
 class Profile_model extends CI_Model
 {


  public function __construct()
   {

     $this->load->database();
   }




public function myProfile(){
$username = $this->session->userdata('username');

$this->db->select('*');
$this->db->from('user');
$this->db->where('username',$username);
$query = $this->db->get();
return $query->result_array();
}

public function updateProfile(){
  $username = $this->session->userdata('username');
  $data =array(

    'nama'=>$this->input->post('nama'),
    'email'=>$this->input->post('email'),
    'alamat'=>$this->input->post('alamat'),
    'deskripsi'=>$this->input->post('deskripsi')
  );
    $this->db->where('username',$username);
    return $this->db->update('user',$data);
}









}
