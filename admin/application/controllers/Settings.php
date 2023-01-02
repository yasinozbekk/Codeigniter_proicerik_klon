<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();

		$this->load->model("default_model");
	}


	public function index()
	{
		
		
		$viewData = new stdClass();

		$settings = $this->default_model->get("settings", array("id" => 1)); 

		$socialmedia = $this->default_model->get_all("socialmedia", array(), "socialmedia_rank ASC");

		$viewData->settings = $settings; 
		$viewData->socialmedia = $socialmedia;

		$viewData->url="settings";

		$this->load->view('settings.php', $viewData);
		
	}


	public function updateSettings($id) {
		
		$title = $this->input->post("title");
		$description = $this->input->post("description");
		$keywords = $this->input->post("keywords");
		$author = $this->input->post("author");
		$footer = $this->input->post("footer");

		if(!$title || !$description || !$keywords || !$author || !$footer){


			$alert = array(
				"title" => "Dikkat Et!",
				"subTitle" => "Lütfen boş alan bırakmayınız!",
				"type" => "warning"
			);
			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/settings"));


		}else{

			$update = $this->default_model->update("settings", 
				array(
					"id" => $id
					), 
				array(
					"title" => $title,
					"description" => $description,
					"keywords" => $keywords,
					"author" => $author,
					"footer" => $footer
				)
			); 
			if($update){

				$alert = array(
					"title" => "Başarılı!",
					"subTitle" => "Veriler başarıyla güncellendi!",
					"type" => "success"
				);


			}else{

				$alert = array(
					"title" => "Hata!",
					"subTitle" => "Güncellenirken bir hata oluştu!",
					"type" => "error"
				);
			}

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/settings"));



		}
	}

	public function updateContactSettings($id){
		$phone = $this->input->post("phone");
		$mail = $this->input->post("mail");
		$address = $this->input->post("address");
		$map = $this->input->post("map");
		if(!$phone || !$mail || !$address || !$map){

			$alert = array(
				"title" => "Dikkat Et!",
				"subTitle" => "Lütfen boş alan bırakmayınız!",
				"type" => "warning"
			);
			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/settings"));
		}else{

			$update = $this->default_model->update("settings", 
				array(
					"id" => $id
					), 
				array(
					"phone" => $phone,
					"mail" => $mail,
					"address" => $address,
					"map" => $map
				)
			); 
			if($update){

				$alert = array(
					"title" => "Başarılı!",
					"subTitle" => "Veriler başarıyla güncellendi!",
					"type" => "success"
				);


			}else{

				$alert = array(
					"title" => "Hata!",
					"subTitle" => "Güncellenirken bir hata oluştu!",
					"type" => "error"
				);
			}

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/settings"));



		}
	}

	public function updateSmtpSettings($id){
		$host = $this->input->post("host");
		$user_mail = $this->input->post("user_mail");
		$user_password = $this->input->post("user_password");
		$port = $this->input->post("port");
		$notification_mail = $this->input->post("notification_mail");

		echo $host." ------- ";
		echo $user_mail." ------- ";
		echo $user_password." ------- ";
		echo $port." ------- ";
		echo $notification_mail." ------- ";

		if(!$host || !$user_mail || !$user_password || !$port || !$notification_mail){

			$alert = array(
				"title" => "Dikkat Et!",
				"subTitle" => "Lütfen boş alan bırakmayınız!",
				"type" => "warning"
			);
			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/settings"));
		}else{

			$update = $this->default_model->update("settings", 
				array(
					"id" => $id
					), 
				array(
					"host" => $host,
					"user_mail" => $user_mail,
					"user_password" => $user_password,
					"port" => $port,
					"notification_mail" => $notification_mail

				)
			); 
			if($update){

				$alert = array(
					"title" => "Başarılı!",
					"subTitle" => "Veriler başarıyla güncellendi!",
					"type" => "success"
				);


			}else{

				$alert = array(
					"title" => "Hata!",
					"subTitle" => "Güncellenirken bir hata oluştu!",
					"type" => "error"
				);
			}

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/settings"));



		}
	}



	
	public function updateLogoSettings($id){

		if(!empty($_FILES['logo']["name"])){

			$logo_data = $this->default_model->get("settings",
			array(
				"id" => $id
			));
			unlink("uploads/".$logo_data->logo);
			

			

			
			$config["upload_path"] = "uploads/logofavicon/";
			
			$config["allowed_types"] = "gif|jpg|png|jpeg|svg|webp";
			$config["file_name"] = uniqid();
			
			$this->load->library("upload",$config);

			
			$upload = $this->upload->do_upload("logo");

			if($upload){
				
				$uploaded_filename = $this->upload->data("file_name");

				
				$config["image_library"] = "gd2";
				
				$config["source_image"] = "uploads/logofavicon/".$uploaded_filename;
				
				$config["create_thumb"] = FALSE;
				
				$config["maintain_ratio"] = FALSE;
				
				$config["quality"] = "100%";

				$this->load->library("image_lib",$config);
				$this->image_lib->resize();

				$update = $this->default_model->update("settings",
					array(
						"id" => $id
					),
					array(
						"logo" => "logofavicon/".$uploaded_filename
					));

				
				if($update){

					$alert = array(
						"title" => "Başarılı!",
						"subTitle" => "Veriler başarıyla güncellendi!",
						"type" => "success"
					);


				}else{

					$alert = array(
						"title" => "Hata!",
						"subTitle" => "Güncellenirken bir hata oluştu!",
						"type" => "error"
					);
				}
				
			}else{

				$alert = array(
					"title" => "Hata!",
					"subTitle" => "Fotoğraf yüklenirken bir hata oluştu!",
					"type" => "error"
				);
			}

		}else{

			$alert = array(
				"title" => "Dikkat!",
				"subTitle" => "Fotoğraf alanı boş bırakılamaz!",
				"type" => "warning"
			);
		}


		$this->session->set_flashdata('alert', $alert);
		redirect(base_url("admin/settings"));
	}

	public function updateFaviconSettings($id){

		if(!empty($_FILES['favicon']["name"])){

			$logo_data = $this->default_model->get("settings",
			array(
				"id" => $id
			));
			unlink("uploads/".$logo_data->favicon);
			

			

			
			$config["upload_path"] = "uploads/logofavicon/";
			
			$config["allowed_types"] = "gif|jpg|png|jpeg|svg|webp";
			$config["file_name"] = uniqid();
			
			$this->load->library("upload",$config);

			
			$upload = $this->upload->do_upload("favicon");

			if($upload){
				
				$uploaded_filename = $this->upload->data("file_name");

				
				$config["image_library"] = "gd2";
				
				$config["source_image"] = "uploads/logofavicon/".$uploaded_filename;
				
				$config["create_thumb"] = FALSE;
				
				$config["maintain_ratio"] = TRUE;
				$config["width"] = 100;
				$config["height"] = 100;
				
				$config["quality"] = "100%";

				$this->load->library("image_lib",$config);
				$this->image_lib->resize();

				$update = $this->default_model->update("settings",
					array(
						"id" => $id
					),
					array(
						"favicon" => "logofavicon/".$uploaded_filename
					));

				
				if($update){

					$alert = array(
						"title" => "Başarılı!",
						"subTitle" => "Veriler başarıyla güncellendi!",
						"type" => "success"
					);


				}else{

					$alert = array(
						"title" => "Hata!",
						"subTitle" => "Güncellenirken bir hata oluştu!",
						"type" => "error"
					);
				}
				
			}else{

				$alert = array(
					"title" => "Hata!",
					"subTitle" => "Fotoğraf yüklenirken bir hata oluştu!",
					"type" => "error"
				);
			}

		}else{

			$alert = array(
				"title" => "Dikkat!",
				"subTitle" => "Fotoğraf alanı boş bırakılamaz!",
				"type" => "warning"
			);
		}


		$this->session->set_flashdata('alert', $alert);
		redirect(base_url("admin/settings"));
	}





}
