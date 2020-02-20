<?php 

Class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') != '2') {
			header('location:'.base_url('Auth/login'));
		}
	}

	public function index()
	{
		$data['judul'] = 'Halaman Dashboard';
		$data['barang'] = $this->M_base->get_data('tb_barang')->result();
		$this->load->view('templates/ bvcnmhjt vttvheader', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function search()
	{
		$data['judul'] = 'Halaman Dashboard';
		$keyword = $this->input->post('keyword');
		$where = ['id_kategori' => $keyword];
		$data['barang'] = $this->M_base->get_where_data('tb_barang', $where)->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_ke_keranjang($id='')
	{
		$barang = $this->M_base->find($id);
		$data = [
			'id' => $barang->id_barang,
			'qty' => 1,
			'price' => $barang->harga,
			'name' => $barang->nama_barang
		];

		$this->cart->insert($data);
		redirect('Dashboard');
	}

	public function detail($id_barang)
	{
		$data['barang'] = $this->M_base->detail_brg($id_barang);
		$data['kategori'] = $this->M_base->get_data('tb_kategori')->result();
		$data['judul'] = 'Detail Barang';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('detail_barang', $data);
		$this->load->view('templates/footer');
	}

	public function detail_keranjang()
	{
		$data['judul'] = 'Detail Keranjang';	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('keranjang');
		$this->load->view('templates/footer');
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('Dashboard/index');
	}

	public function pembayaran()
	{
		$data['judul'] = 'Halaman Pembayaran';	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('pembayaran');
		$this->load->view('templates/footer');
	}

	public function proses_pesanan()
	{
		$is_processed = $this->M_base->set_pemesan();
		if ($is_processed) {
			$data['judul'] = 'Halaman Pembayaran';
			$this->cart->destroy();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('proses_pesanan');
			$this->load->view('templates/footer');
		}
	}


	
}

