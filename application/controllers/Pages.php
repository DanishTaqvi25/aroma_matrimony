<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function index(){
		
	}

    public function terms(){
		$this->load->view('templates/header');
		$this->load->view('pages/terms');
		$this->load->view('templates/footer');
	}

	public function about(){
		$this->load->view('templates/header');
		$this->load->view('pages/about');
		$this->load->view('templates/footer');
	}
	public function contact(){
		$this->load->view('templates/header');
		$this->load->view('pages/contact');
		$this->load->view('templates/footer');
	}
	public function refunds(){
		$this->load->view('templates/header');
		$this->load->view('pages/refunds');
		$this->load->view('templates/footer');
	}

}