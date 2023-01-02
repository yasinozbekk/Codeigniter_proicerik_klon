<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();

		$this->load->model("default_model");
	}


	public function index()
	{
		$this->load->view('login.php');
	}

	public function loginControl()
	{
		$mail = $this->input->post("email");
		$password = $this->input->post("password");

		if(!$mail || !$password){
			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Boş alanları doldurunuz!",
				"type" => "warning"
			);

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/login"));
		}else{

			$admins = $this->default_model->get("admin",
				array(
					"mail" => $mail,
					"password" => md5($password)
				)
			);

			if($admins){
				

				$alert = array(
					"title" => "Başarılı!",
					"subTitle" => "<b>".ucfirst($admins->name)."</b> Admin paneline hoşgeldiniz",
					"type" => "success"
				);
				$this->session->userdata("admins", $admins);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url("admin/home"));

			}else{
				
				$alert = array(
					"title" => "Hata!",
					"subTitle" => "Kullanıcı adı veya şifre yanlış!",
					"type" => "error"
				);

				$this->session->set_flashdata('alert', $alert);
				redirect(base_url("admin/login"));
			}
		}
	}


	public function logout()
	{
		$admins = $this->session->userdata("admins");
		$this->session->unset_userdata($admins);

		redirect(base_url("admin/login"));
	}

}
