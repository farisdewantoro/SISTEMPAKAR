<?php

 /**
  *
  */
 class Login extends CI_Controller
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
  $this->load->model('LoginModel');
   }

public function signin(){
  $this->load->view('pages/forms/login');
}


public function login_validation(){

$this->form_validation->set_rules('username','username','trim|required');
$this->form_validation->set_rules('password','password','trim|required');

if($this->form_validation->run()){
$username= $this->input->post('username');
$password= $this->input->post('password');

  if($this->LoginModel->login_model($username,$password)){
    $session_data=array(
      'username' => $username,
      'password' =>$password
    );

    $this->session->set_userdata($session_data);
    redirect('Halaman/view');

  }else {
    $this->session->set_flashdata('error','invalid username and password');
    $backreload=$_SERVER['HTTP_REFERER'];
    echo "<script>  alert('LOGIN GAGAL'); document.location.href='$backreload'; </script>"
    ;
  }


}else {
  $this->login_validation();
}

}


function logout(){
  $username=$this->session->userdata('username');
  $this->db->delete('riwayatjawaban',array('username'=>$username));
   $this->session->unset_userdata('username')
   ;

   redirect('Login/signin');
}










 }
