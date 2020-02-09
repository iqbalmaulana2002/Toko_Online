<?php 

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') == '1') {
			header('location:'.base_url('admin/Dashboard_admin'));
		} elseif ($this->session->userdata('role_id') == '2') {
			header('location:'.base_url());
		} elseif ($this->session->userdata('role_id') == '0') {
			header('location:'.base_url('Auth/login'));
		}
	}
	
	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim',[
			'required' => 'Username tidak boleh kosong'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim',[
			'required' => 'Password tidak boleh kosong'
		]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman Login';
			$this->load->view('templates/header', $data);
			$this->load->view('form_login');
			$this->load->view('templates/footer');
		} else {
			$auth = $this->M_base->cek_login();
			$password = $this->input->post('password');
			
			if (!$auth) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username atau Password Anda Salah!<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Auth/login');
			} else {
				if (password_verify($password, $auth->password)) {
					$this->session->set_userdata('nama', $auth->nama);
					$this->session->set_userdata('username', $auth->username);
					$this->session->set_userdata('foto', $auth->foto);
					$this->session->set_userdata('role_id', $auth->role_id);

					switch ($auth->role_id) {
					case 1 :
						redirect('admin/Dashboard_admin');
						break;
					case 2 :
						redirect('Dashboard');
						break;
					default: break;
					}
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Anda Salah!<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Auth/login');
				}
			}
		}
	}

	public function registrasi()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[5]|max_length[50]',[
			'required' => 'Nama tidak boleh kosong',
			'min_length' => 'kamu bukan artis bokep',
			'max_length' => 'Nama terlalu panjang'
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[50]|is_unique[tb_user.username]',[
			'required' => 'Username tidak boleh kosong',
			'min_length' => 'Username terlalu pendek',
			'max_length' => 'Username terlalu panjang',
			'is_unique' => 'Username telah Dibuat'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]|min_length[7]|max_length[100]',[
			'required' => 'Password tidak boleh kosong',
			'matches' => 'Password tidak cocok',
			'min_length' => 'Password terlalu pendek',
			'max_length' => 'Password terlalu panjang'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]|min_length[7]|max_length[100]',[
			'required' => 'Password tidak boleh kosong',
			'matches' => 'Password tidak cocok',
			'min_length' => 'Password Harus lebih dari 7 karakter',
			'max_length' => 'Password Harus kurang dari 100 karakter'
		]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman Registrasi';
			$this->load->view('templates/header', $data);
			$this->load->view('registrasi');
			$this->load->view('templates/footer');
		} else {
			$data = array(
				'id' => '',
				'nama' => $this->input->post('nama', true),
				'username' => $this->input->post('username', true),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'foto' => 'default.png',
				'role_id' => '2',
				'date_created' => time()
			);

			$this->M_base->insert_data('tb_user', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat Akun Anda Berhasil Dibuat. Silahkan Login<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Auth/login');
		}
	}

	public function registrasi_admin()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[5]|max_length[50]',[
			'required' => 'Nama tidak boleh kosong',
			'min_length' => 'Nama terlalu pendek',
			'max_length' => 'Nama terlalu panjang'
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[50]|is_unique[tb_user.username]',[
			'required' => 'Username tidak boleh kosong',
			'min_length' => 'Username terlalu pendek',
			'max_length' => 'Username terlalu panjang',
			'is_unique' => 'Username telah Dibuat'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]|min_length[7]|max_length[100]',[
			'required' => 'Password tidak boleh kosong',
			'matches' => 'Password tidak cocok',
			'min_length' => 'Password terlalu pendek',
			'max_length' => 'Password terlalu panjang'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]|min_length[7]|max_length[100]',[
			'required' => 'Password tidak boleh kosong',
			'matches' => 'Password tidak cocok',
			'min_length' => 'Password Harus lebih dari 7 karakter',
			'max_length' => 'Password Harus kurang dari 100 karakter'
		]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman Registrasi';
			$this->load->view('templates/header', $data);
			$this->load->view('registrasi');
			$this->load->view('templates/footer');
		} else {
			$data = array(
				'id' => '',
				'nama' => $this->input->post('nama', true),
				'username' => $this->input->post('username', true),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'foto' => 'default.png',
				'role_id' => '2',
				'date_created' => time()
			);

			$this->M_base->insert_data('tb_user', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat Akun Anda Berhasil Dibuat. Silahkan Login<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Auth/login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('foto');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat anda berhasil Logout<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Auth/login');		
	}
}
?>