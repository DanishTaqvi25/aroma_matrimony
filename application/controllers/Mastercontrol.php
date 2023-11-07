<?php
/*defined('BASEPATH') OR exit('No direct script access allowed');

class Mastercontrol extends CI_Controller {

	public function index()
	{
		//$data['sidenavs'] = $this->Common_model->getparentnavs('navbar', 'navActive', 'navOrder', 'asc');
		$this->load->view('templates/header');
		//$this->load->view('templates/navbar', $data);
		$this->load->view('home/home');
		$this->load->view('templates/footer');
	}


	 public function getallmother(){
		$result = $this->Common_model->getallactive('sm_mother', 'mother_isactive', 'mother_id', 'desc');
		echo json_encode($result);
	}
