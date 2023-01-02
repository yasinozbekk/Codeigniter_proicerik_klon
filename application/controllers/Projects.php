<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();

		$this->load->model("default_model");
	}


	public function index()
	{
		$viewData = new stdClass();
		$projects = $this->default_model->get_all("projects", array(), "projects_rank ASC");

		$viewData->projects = $projects;
		$this->load->view('projects.php', $viewData);
	}


	public function insert() {
		$title = $this->input->post("title");
		$content = $this->input->post("content");
		$link = $this->input->post("link");

		if(!$title || !$content || !$link){
			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Boş alanları doldurunuz!",
				"type" => "warning"
			);

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("projects"));
		}else{
			if(!empty($_FILES['image']["name"])){
				

				
				$config["upload_path"] = "uploads/projects/";
				
				$config["allowed_types"] = "gif|jpg|png|jpeg|svg";
				$config["file_name"] = uniqid();
				
				$this->load->library("upload",$config);

				
				$upload = $this->upload->do_upload("image");

				if($upload){
					
					$uploaded_filename = $this->upload->data("file_name");

					
					$config["image_library"] = "gd2";
					
					$config["source_image"] = "uploads/projects/".$uploaded_filename;
					
					$config["create_thumb"] = FALSE;
					
					$config["maintain_ratio"] = FALSE;
					
					$config["quality"] = "100%";

					$config["width"] = 360;
					$config["height"] = 360;

					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$insert = $this->default_model->insert("projects",
						array(
							"projects_title" => $title,
							"projects_content" => $content,
							"projects_image" => "projects/".$uploaded_filename,
							"projects_link" => $link,
							"projects_status" => 1,
							"projects_rank" => 0,
							"projects_created_at" => date("Y-m-d")
						));

					
					if($insert){

						$alert = array(
							"title" => "Başarılı!",
							"subTitle" => "Veriler başarıyla eklendi!",
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
			redirect(base_url("projects"));
		}

	}

	public function update($id) {
		$title = $this->input->post("title");
		$content = $this->input->post("content");
		$link = $this->input->post("link");

		if(!$title || !$content || !$link){
			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Boş alanları doldurunuz!",
				"type" => "warning"
			);

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("projects"));
		}else{
			if(!empty($_FILES['image']["name"])){

				$image_data = $this->default_model->get("projects",
				array(
					"projects_id" => $id
				));
				unlink("uploads/".$image_data->projects_image);

				

				
				$config["upload_path"] = "uploads/projects/";
				
				$config["allowed_types"] = "gif|jpg|png|jpeg|svg";
				$config["file_name"] = uniqid();
				
				$this->load->library("upload",$config);

				
				$upload = $this->upload->do_upload("image");

				if($upload){
					
					$uploaded_filename = $this->upload->data("file_name");

					
					$config["image_library"] = "gd2";
					
					$config["source_image"] = "uploads/projects/".$uploaded_filename;
					
					$config["create_thumb"] = FALSE;
					
					$config["maintain_ratio"] = FALSE;
					
					$config["quality"] = "100%";

					$config["width"] = 360;
					$config["height"] = 360;

					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$update = $this->default_model->update("projects",
						array(
							"projects_id" => $id
						),
						array(
							"projects_title" => $title,
							"projects_content" => $content,
							"projects_image" => "projects/".$uploaded_filename,
							"projects_link" => $link,
							"projects_status" => 1,
							"projects_rank" => 0

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


				$update = $this->default_model->update("projects",
					array(
						"projects_id" => $id
					),
					array(
							"projects_title" => $title,
							"projects_content" => $content,
							"projects_link" => $link,
							"projects_status" => 1,
							"projects_rank" => 0
						
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
					
			}


			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("projects"));
		}

	}


	public function delete($id) {
		$image_data = $this->default_model->get("projects",
		array(
			"projects_id" => $id
		));
		unlink("uploads/".$image_data->projects_image);

		$delete = $this->default_model->delete("projects", 
			array(
				"projects_id" => $id
			)
		);
		if($delete){

			$alert = array(
				"title" => "Başarılı!",
				"subTitle" => "Silme işlmi başarıyla gerçekleşti!",
				"type" => "success"
			);


		}else{

			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Veri silinirken bir hata oluştu!",
				"type" => "error"
			);
		}

		$this->session->set_flashdata('alert', $alert);
		redirect(base_url("projects"));


	}


	public function statusupdate($id){
		if($id){
            $isActive = ($this->input->post("data") == "true") ? 1 : 0;
			$this->default_model->update("projects",
				array(
					"projects_id" => $id
				),
				array(
					"projects_status" => $isActive
				)
			);
		}
	}


	public function ranksetter(){
		$data = $this->input->post("data");

		parse_str($data, $ranke);

		$value = $ranke["rank"];

		foreach($value as $rank => $id){
				$this->default_model->update("projects",
				array(
					"projects_id" => $id
				),
				array(
					"projects_rank" => $rank
				));
		}
	}


}
