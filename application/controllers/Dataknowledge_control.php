<?php


class Dataknowledge_control extends CI_Controller {
			public function __construct(){
					parent::__construct();
					$this->load->library('session');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('upload');
					$this->load->helper('url_helper');
					$this->load->helper('text');
					$this->load->helper('date');
					$this->load->library('pagination');
					$this->load->model('Gejala_model');
          $this->load->model('dataknowledge_model');
					$this->load->model('TabelPertanyaan_model');
					$this->load->model('TabelRule_model');
					$this->load->model('TabelPenyakit_model');
					$this->load->model('TabelGejala_model');
			}

public function pagination(){

	$config['full_tag_open'] = "<ul class='pagination'>";
$config['full_tag_close'] = '</ul>';
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';
$config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
$config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
return $config;
}
public function dataRule(){
	if (!empty($this->session->userdata('username'))) {

		$row=$this->TabelRule_model->barisRule();
		$this->load->library('form_validation');
			$config = $this->pagination();
		$config['base_url'] = 'http://localhost/diagnosaKucing/tabelrule';
		$config['total_rows'] = $row;
		$config['per_page'] = 8;
		$start=$this->uri->segment(2);
		$this->pagination->initialize($config);
		$data['rows'] =$row;
		$data['tabelrule'] = $this->TabelRule_model->tampilTabelRule($config['per_page'],$start);
		$this->load->view('pages/static/header');
		$this->load->view('pages/forms/tabelrule',$data);
		$this->load->view('pages/static/footer');
	}else {
		redirect('Login/signin');
	}

}

public function tambahRule(){
$data['TabelPenyakit']=$this->TabelPenyakit_model->tampilPenyakit();
$data['TabelRule'] = $this->TabelRule_model->tampilRuleKode();
	$this->load->view('pages/static/header');
	$this->load->view('pages/action/tambahRule',$data);
	$this->load->view('pages/static/footer');
}

public function ajaxTambahRule(){
	if (isset($_POST['selectData'])) {
		$data=$_POST['selectData'];
		$query = $this->db->get_where('tabelpenyakit',array('NamaPenyakit'=> $data));
		$query= $query->row_array();
		echo $query['KodePenyakit'];
}
}

public function tambahDataRule(){
$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
	$this->form_validation->set_rules('NamaPenyakit','NamaPenyakit','required');
		$this->form_validation->set_rules('kodepenyakit','kodepenyakit','required');
			$this->form_validation->set_rules('KodeRule','KodeRule','required');
$this->form_validation->set_rules('KodePertanyaan','KodePertanyaan','required');
			if ($this->form_validation->run()===true) {
$dataPertanyaan = $this->input->post('NamaPenyakit');

 $this->TabelRule_model->tambahDataRule();
 	$this->session->set_flashdata('success', "Data $dataPertanyaan berhasil ditambah");
				redirect('Dataknowledge_control/dataRule');
			}else {

				$data['TabelPenyakit']=$this->TabelPenyakit_model->tampilPenyakit();
				$data['TabelRule'] = $this->TabelRule_model->tampilRuleKode();
					$this->load->view('pages/static/header');
					$this->load->view('pages/action/tambahRule',$data);
					$this->load->view('pages/static/footer');
			}

}
public function deleteRule($NoRule){
	$query = $this->db->get_where('tabelrule',array('NoRule'=> $NoRule));
	$query = $query->row_array();
$hasil = $query['KodeRule'];
	$this->TabelRule_model->deleteRule($NoRule);

		$this->session->set_flashdata('success', "Rule $hasil berhasil dihapus");
redirect('Dataknowledge_control/dataRule');
}

public function updateRule($NoRule){
	$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
		$this->form_validation->set_rules('NamaPenyakit','NamaPenyakit','required');
			$this->form_validation->set_rules('kodepenyakit','kodepenyakit','required');
				$this->form_validation->set_rules('KodeRule','KodeRule','required');
				$this->form_validation->set_rules('KodePertanyaan','KodePertanyaan','required');

				if ($this->form_validation->run()===true) {
		$dataRule = $this->input->post('KodePertanyaan');

		$this->TabelRule_model->updateRule($NoRule);
		$this->session->set_flashdata('success', "Data $dataRule berhasil diubah");
					redirect('Dataknowledge_control/dataRule');
				}else {

					$data['TabelPenyakit'] = $this->TabelPenyakit_model->tampilPenyakit();
					$data['getRule'] = $this->TabelRule_model->getRule($NoRule);
						$this->load->view('pages/static/header');
						$this->load->view('pages/action/updateRule',$data);
						$this->load->view('pages/static/footer');

				}

}


	public function dataPenyakit()
	{

		if (!empty($this->session->userdata('username'))) {

      $row=$this->dataknowledge_model->barisPertanyaan();
      $this->load->library('form_validation');
				$config = $this->pagination();
      $config['base_url'] = 'http://localhost/diagnosaKucing/tabelpertanyaan';
      $config['total_rows'] = $row;
      $config['per_page'] = 8;


      $start=$this->uri->segment(2);
      $this->pagination->initialize($config);
      $data['rows'] =$row;
      $data['dataknowledge'] = $this->dataknowledge_model->tabelKnowledge($config['per_page'],$start);
			$this->load->view('pages/static/header');
			$this->load->view('pages/forms/tabelpertanyaan',$data);
			$this->load->view('pages/static/footer');
		}else {
			redirect('Login/signin');
		}

	}


public function tambahPertanyaan(){

$data['Gejala']=$this->Gejala_model->tampilGejala();
$data['TabelPertanyaan'] = $this->TabelPertanyaan_model->tampilPertanyaan();
	$this->load->view('pages/static/header');
	$this->load->view('pages/action/tambahPertanyaan',$data);
	$this->load->view('pages/static/footer');
}

public function tambahDataPertanyaan(){
	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
	$this->form_validation->set_rules('NamaGejala','NamaGejala','required');
		$this->form_validation->set_rules('Pertanyaan','Pertanyaan','required');
			$this->form_validation->set_rules('KodePertanyaan','KodePertanyaan','required');

			if ($this->form_validation->run()===true) {
$dataPertanyaan = $this->input->post('KodePertanyaan');

 $this->TabelPertanyaan_model->tambahDataPertanyaan();
 	$this->session->set_flashdata('success', "Data $dataPertanyaan berhasil ditambah");
				redirect('Dataknowledge_control/dataPenyakit');
			}else {

				$data['Gejala']=$this->Gejala_model->tampilGejala();
				$data['TabelPertanyaan'] = $this->TabelPertanyaan_model->tampilPertanyaan();
				$this->load->view('pages/static/header');
				$this->load->view('pages/action/tambahPertanyaan',$data);
				$this->load->view('pages/static/footer');
			}

}


public function updatePertanyaan($noPertanyaan){
	$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
		$this->form_validation->set_rules('NamaGejala','NamaGejala','required');
			$this->form_validation->set_rules('Pertanyaan','Pertanyaan','required');
				$this->form_validation->set_rules('KodePertanyaan','KodePertanyaan','required');

				if ($this->form_validation->run()===true) {
		$dataPertanyaan = $this->input->post('KodePertanyaan');

		$this->TabelPertanyaan_model->updatePertanyaan($noPertanyaan);
		$this->session->set_flashdata('success', "Data $dataPertanyaan berhasil diubah");
					redirect('Dataknowledge_control/dataPenyakit');
				}else {

					$data['Gejala']=$this->Gejala_model->tampilGejala();
					$data['getPertanyaan']=$this->TabelPertanyaan_model->getPertanyaan($noPertanyaan);
					$this->load->view('pages/static/header');
					$this->load->view('pages/action/updatePertanyaan',$data);
					$this->load->view('pages/static/footer');

				}

}



public function deletePertanyaan($noPertanyaan){
	$query = $this->db->get_where('tabelpertanyaan',array('NoPertanyaan'=> $noPertanyaan));
	$query = $query->row_array();
$hasil = $query['KodePertanyaan'];
	$this->TabelPertanyaan_model->deletePertanyaan($noPertanyaan);

	$this->session->set_flashdata('success', "Kode Pertanyaan $hasil berhasil dihapus");
redirect('Dataknowledge_control/dataPenyakit');
}




	public function dataTabelPenyakit()
	{

		if (!empty($this->session->userdata('username'))) {

      $row=$this->TabelPenyakit_model->barisPenyakit();
      $this->load->library('form_validation');
				$config = $this->pagination();
      $config['base_url'] = 'http://localhost/diagnosaKucing/tabelpenyakit';
      $config['total_rows'] = $row;
      $config['per_page'] = 8;


      $start=$this->uri->segment(2);
      $this->pagination->initialize($config);
      $data['rows'] =$row;
      $data['datapenyakit'] = $this->TabelPenyakit_model->tabelPenyakit($config['per_page'],$start);
			$this->load->view('pages/static/header');
			$this->load->view('pages/forms/tabelpenyakit',$data);
			$this->load->view('pages/static/footer');
		}else {
			redirect('Login/signin');
		}

	}

	public function tambahPenyakit(){
		$this->load->helper('form');
		$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
		$this->form_validation->set_rules('NamaPenyakit','NamaPenyakit','required');
			$this->form_validation->set_rules('KodePenyakit','KodePenyakit','required');
				$this->form_validation->set_rules('Deskripsi','Deskripsi','required');

				if ($this->form_validation->run()===true) {
	$dataPenyakit = $this->input->post('KodePenyakit');

	 $this->TabelPenyakit_model->tambahDataPenyakit();
	 	$this->session->set_flashdata('success', "Data $dataPenyakit berhasil ditambah");
					redirect('Dataknowledge_control/dataTabelPenyakit');
				}else {
					$data['TabelPenyakit'] = $this->TabelPenyakit_model->tampilKodePenyakit();
					$this->load->view('pages/static/header');
					$this->load->view('pages/action/tambahPenyakit',$data);
					$this->load->view('pages/static/footer');
				}

	}

	public function deletePenyakit($noPenyakit){
		$query = $this->db->get_where('tabelpenyakit',array('NoPenyakit'=> $noPenyakit));
		$query = $query->row_array();
	$hasil = $query['KodePenyakit'];
		$this->TabelPenyakit_model->deletePenyakit($noPenyakit);

		$this->session->set_flashdata('success', "Kode Pertanyaan $hasil berhasil dihapus");
	redirect('Dataknowledge_control/dataTabelPenyakit');
	}


	public function updatePenyakit($noPenyakit){
		$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
			$this->form_validation->set_rules('NamaPenyakit','NamaPenyakit','required');
				$this->form_validation->set_rules('KodePenyakit','KodePenyakit','required');
					$this->form_validation->set_rules('Deskripsi','Deskripsi','required');
					if ($this->form_validation->run()===true) {
			$dataPenyakit = $this->input->post('KodePenyakit');

			$this->TabelPenyakit_model->updatePenyakit($noPenyakit);
			$this->session->set_flashdata('success', "Data $dataPenyakit` berhasil diubah");
						redirect('Dataknowledge_control/dataTabelPenyakit');
					}else {

						$data['getPenyakit']=$this->TabelPenyakit_model->getPenyakit($noPenyakit);
						$this->load->view('pages/static/header');
						$this->load->view('pages/action/updatePenyakit',$data);
						$this->load->view('pages/static/footer');

					}

	}


	public function dataGejala()
	{

		if (!empty($this->session->userdata('username'))) {

      $row=$this->TabelGejala_model->barisGejala();
      $this->load->library('form_validation');
				$config = $this->pagination();
      $config['base_url'] = 'http://localhost/diagnosaKucing/tabelgejala';
      $config['total_rows'] = $row;
      $config['per_page'] = 8;


      $start=$this->uri->segment(2);
      $this->pagination->initialize($config);
      $data['rows'] =$row;
      $data['tabelgejala'] = $this->TabelGejala_model->tabelGejala($config['per_page'],$start);
			$this->load->view('pages/static/header');
			$this->load->view('pages/forms/tabelgejala',$data);
			$this->load->view('pages/static/footer');
		}else {
			redirect('Login/signin');
		}

	}




	public function tambahGejala(){
	$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
		$this->form_validation->set_rules('NamaGejala','NamaGejala','required');
			$this->form_validation->set_rules('KodeGejala','KodeGejala','required');


				if ($this->form_validation->run()===true) {
	$dataGejala = $this->input->post('KodeGejala');

	 $this->TabelGejala_model->tambahDataGejala();
		$this->session->set_flashdata('success', "Data $dataGejala berhasil ditambah");
					redirect('Dataknowledge_control/dataGejala');
				}else {
					$data['TabelGejala'] = $this->TabelGejala_model->tampilKodeGejala();
					$this->load->view('pages/static/header');
					$this->load->view('pages/action/tambahGejala',$data);
					$this->load->view('pages/static/footer');
				}

	}
	public function deleteGejala($NoGejala){
		$query = $this->db->get_where('tabelgejala',array('NoGejala'=> $NoGejala));
		$query = $query->row_array();
	$hasil = $query['KodeGejala'];
		$this->TabelGejala_model->deleteGejala($NoGejala);

		$this->session->set_flashdata('success', "Kode Pertanyaan $hasil berhasil dihapus");
	redirect('Dataknowledge_control/dataGejala');
	}

	public function updateGejala($NoGejala){
		$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
			$this->form_validation->set_rules('NamaGejala','NamaGejala','required');
				$this->form_validation->set_rules('KodeGejala','KodeGejala','required');
					if ($this->form_validation->run()===true) {
			$dataGejala = $this->input->post('KodeGejala');

			$this->TabelGejala_model->updateGejala($NoGejala);
			$this->session->set_flashdata('success', "Data $dataGejala` berhasil diubah");
						redirect('Dataknowledge_control/dataGejala');
					}else {

						$data['getGejala']=$this->TabelGejala_model->getGejala($NoGejala);
						$this->load->view('pages/static/header');
						$this->load->view('pages/action/updateGejala',$data);
						$this->load->view('pages/static/footer');

					}

	}





}
