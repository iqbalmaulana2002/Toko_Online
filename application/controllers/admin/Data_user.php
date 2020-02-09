<?php 

class Data_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') != '1') {
			header('location:'.base_url('Auth/login'));
		}
	}
	
	public function index()
	{
		$table = 'tb_user';
		$data['judul'] = 'Halaman Admin';
		$where = ['role_id' => '2'];
		$data['user'] = $this->M_base->get_where_data($table, $where)->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/data_user', $data);
		$this->load->view('templates/footer');
	}
}