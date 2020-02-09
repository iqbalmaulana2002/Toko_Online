<?php 

class M_base extends CI_Model {

	public function get_data($table='')
	{
		return $this->db->get($table);
	}

	public function get_where_data($table='', $where='')
	{
		return $this->db->get_where($table, $where);
	}

	public function insert_data($table='', $data='')
	{
		return $this->db->insert($table, $data);
	}

	public function update_data($table='', $where='', $data='')
	{
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function delete_data($table='', $where='')
	{
		return $this->db->delete($table, $where);
	}


	// Model Barang

	public function find($id='')
	{
		$result = $this->db->where('id_barang', $id)
						   ->get('tb_barang');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return [];
		}
	}

	public function set_pemesan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$nama = $this->input->post('nama_lengkap');
		$alamat = $this->input->post('alamat_lengkap');
		$telp = $this->input->post('no_telp');

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required',[
			'required' => 'Nama Lengkap tidak boleh kosong',
			'alpha' => 'Nama Lengkap harus menggunakan Huruf'
		]);
		$this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'required',[
			'required' => 'Alamat Lengkap tidak boleh kosong'
		]);
		$this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|numeric',[
			'required' => 'No. Telepon tidak boleh kosong',
			'numeric' => 'No. Telepon harus Angka'
		]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman Pembayaran';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('pembayaran');
			$this->load->view('templates/footer');
		} else {
			$invoice = array(
							'nama' => $nama,
							'alamat' => $alamat,
							'tgl_pesan' => date('Y-m-d H:i:s'),
							'batas_bayar' => date('Y-m-d H:i:s', mktime( date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y')))

						);
			$this->db->insert('tb_invoice', $invoice);
			$id_invoice = $this->db->insert_id();

			foreach ($this->cart->contents() as $item) {
				$data = array(
							'id_invoice' => $id_invoice, 
							'id_barang' => $item['id'],
							'nama_barang' => $item['name'],
							'jumlah' => $item['qty'],
							'Harga'=>$item['price']
						);
			$this->db->insert('tb_pesanan', $data);
			}
			return true;
		}
	}

	public function detail_brg($id_barang='')
	{
		$result = $this->db->where('id_barang', $id_barang)->get('tb_barang');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	// Model Invoice

	public function tampil_data_invoice()
	{
		$result = $this->db->get('tb_invoice');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function get_id_invoice($id_invoice='')
	{
		$result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return false;
		}
	}

	public function get_id_pesanan($id_invoice='')
	{
		$result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	// Model Auth

	public function cek_login()
	{
		$username = set_value('username');
		//$password = set_value('password');
		$result = $this->db->where('username', $username)
						   //->where('password', $password)
						   ->get('tb_user');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return [];
		}
	}
}