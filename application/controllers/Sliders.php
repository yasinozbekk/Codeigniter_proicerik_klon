<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();

		$this->load->model("default_model");
	}


	public function index()
	{
		$viewData = new stdClass();
		$sliders = $this->default_model->get_all("sliders", array(), "sliders_rank ASC");

		$viewData->sliders = $sliders;
		$this->load->view('sliders.php', $viewData);
	}


	public function insert() {
		$content = $this->input->post("content");
		$btn_right = $this->input->post("btn_right");
		$btn_right_link = $this->input->post("btn_right_link");
		$btn_left = $this->input->post("btn_left");
		$btn_left_link = $this->input->post("btn_left_link");

		if(!$content || !$btn_right || !$btn_right_link || !$btn_left || !$btn_left_link){
			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Boş alanları doldurunuz!",
				"type" => "warning"
			);

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("sliders"));
		}else{
			if(!empty($_FILES['image']["name"])){
				

				
				$config["upload_path"] = "uploads/sliders/";
				
				$config["allowed_types"] = "gif|jpg|png|jpeg|svg";
				$config["file_name"] = uniqid();
				
				$this->load->library("upload",$config);

				
				$upload = $this->upload->do_upload("image");

				if($upload){
					
					$uploaded_filename = $this->upload->data("file_name");

					
					$config["image_library"] = "gd2";
					
					$config["source_image"] = "uploads/sliders/".$uploaded_filename;
					
					$config["create_thumb"] = FALSE;
					
					$config["maintain_ratio"] = FALSE;
					
					$config["quality"] = "100%";

					$config["width"] = 1280;
					$config["height"] = 560;

					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$insert = $this->default_model->insert("sliders",
						array(
							"sliders_content" => $content,
							"sliders_btn_left" => $btn_left,
							"sliders_btn_left_link" => $btn_left_link,
							"sliders_btn_right" => $btn_right,
							"sliders_btn_right_link" => $btn_right_link,
							"sliders_image" => "sliders/".$uploaded_filename,
							"sliders_status" => 1,
							"sliders_rank" => 0,
							"sliders_created_at" => date("Y-m-d")
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
			redirect(base_url("sliders"));
		}

	}

	public function update($id) {
		$content = $this->input->post("content");
		$btn_right = $this->input->post("btn_right");
		$btn_right_link = $this->input->post("btn_right_link");
		$btn_left = $this->input->post("btn_left");
		$btn_left_link = $this->input->post("btn_left_link");


		echo "<br>".$content;
		echo "<br>".$btn_right;
		echo "<br>".$btn_right_link;
		echo "<br>".$btn_left;
		echo "<br>".$btn_left_link;
		if(!$content || !$btn_right || !$btn_right_link || !$btn_left || !$btn_left_link){
			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Boş alanları doldurunuz!",
				"type" => "warning"
			);

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("sliders"));
		}else{
			if(!empty($_FILES['image']["name"])){

				$image_data = $this->default_model->get("sliders",
				array(
					"sliders_id" => $id
				));
				unlink("uploads/".$image_data->sliders_image);

				

				
				$config["upload_path"] = "uploads/sliders/";
				
				$config["allowed_types"] = "gif|jpg|png|jpeg|svg";
				$config["file_name"] = uniqid();
				
				$this->load->library("upload",$config);

				
				$upload = $this->upload->do_upload("image");

				if($upload){
					
					$uploaded_filename = $this->upload->data("file_name");

					
					$config["image_library"] = "gd2";
					
					$config["source_image"] = "uploads/sliders/".$uploaded_filename;
					
					$config["create_thumb"] = FALSE;
					
					$config["maintain_ratio"] = FALSE;
					
					$config["quality"] = "100%";

					$config["width"] = 1280;
					$config["height"] = 560;

					$this->load->library("image_lib",$config);
					$this->image_lib->resize();

					$update = $this->default_model->update("sliders",
						array(
							"sliders_id" => $id
						),
						array(
							"sliders_content" => $content,
							"sliders_btn_left" => $btn_left,
							"sliders_btn_left_link" => $btn_left_link,
							"sliders_btn_right" => $btn_right,
							"sliders_btn_right_link" => $btn_right_link,
							"sliders_image" => "sliders/".$uploaded_filename
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


				$update = $this->default_model->update("sliders",
					array(
						"sliders_id" => $id
					),
					array(
						"sliders_content" => $content,
						"sliders_btn_left" => $btn_left,
						"sliders_btn_left_link" => $btn_left_link,
						"sliders_btn_right" => $btn_right,
						"sliders_btn_right_link" => $btn_right_link
						
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
			redirect(base_url("sliders"));
		}

	}


	public function delete($id) {
		$image_data = $this->default_model->get("sliders",
		array(
			"sliders_id" => $id
		));
		unlink("uploads/".$image_data->sliders_image);

		$delete = $this->default_model->delete("sliders", 
			array(
				"sliders_id" => $id
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
		redirect(base_url("sliders"));


	}


	public function statusupdate($id){
		if($id){
            $isActive = ($this->input->post("data") == "true") ? 1 : 0;
			$this->default_model->update("sliders",
				array(
					"sliders_id" => $id
				),
				array(
					"sliders_status" => $isActive
				)
			);
		}
	}


	public function ranksetter(){
		$data = $this->input->post("data");

		parse_str($data, $ranke);

		$value = $ranke["rank"];

		foreach($value as $rank => $id){
				$this->default_model->update("sliders",
				array(
					"sliders_id" => $id
				),
				array(
					"sliders_rank" => $rank
				));
		}
	}


}
