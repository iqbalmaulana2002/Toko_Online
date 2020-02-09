<?php 

class Invoice extends CI_COntroller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') != '1') {
			header('location:'.base_url('Auth/login'));
		}
	}
	
	public function index()
	{
		$data['invoice'] = $this->M_base->tampil_data_invoice();
		$data['judul'] = 'Halaman Invoice';	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/invoice', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id_invoice='')
	{
		$data['judul'] = 'Detail Invoice';	
		$data['invoice'] = $this->M_base->get_id_invoice($id_invoice);
		$data['pesanan'] = $this->M_base->get_id_pesanan($id_invoice);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/detail_invoice', $data);
		$this->load->view('templates/footer');
	}
}