<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if(! $this->session->userdata('username')) redirect('auth013/login');
		$this->load->view('home_menu_013');
	}
}
