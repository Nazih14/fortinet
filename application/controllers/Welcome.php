<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('Radcheck_model');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function update(){
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password1', TRUE);
		$passwordbaru = $this->input->post('password2', TRUE);
		$cek = $this->Radcheck_model->cek_user($username,$password);
		if(!$cek){
			echo "<script>alert('E-mail Belum Terdaftar');history.go(-1);</script>";
		}else{
			$data = array(
				'value' => $passwordbaru,
				);
			$this->Radcheck_model->update($username, $data);
			echo "<script>alert('Password Berhasil Diubah');</script>";
			header('location: http://172.27.25.1:1000');
		}
	}

	public function create()
	{
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password0', TRUE);
		$cek = $this->Radcheck_model->cek_user($username,$password);
		if(!$cek){
			$data = array(
				'username' => $username,
				'attribute' => 'Cleartext-Password',
				'op' => ':=',
				'value' => $password,
				);
			$this->Radcheck_model->insert($data);
			header('location: http://172.27.25.1:1000');
		}else{
			$data = array(
				'pesan' => 'E-mail Sudah Terdaftar',
				);
			$this->load->view('welcome_message',$data);
		}
	}
}
