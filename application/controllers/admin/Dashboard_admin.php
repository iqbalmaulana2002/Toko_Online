<?php 

class Dashboard_admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') != '1') {
			header('location:'.base_url('Auth/login'));
		}
	}

	public function index()
	{
		$data['judul'] = 'Halaman Admin';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/dashboard_admin');
		$this->load->view('templates/footer');
	}
}