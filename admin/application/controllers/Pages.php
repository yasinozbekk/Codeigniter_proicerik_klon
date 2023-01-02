<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();

		$this->load->model("default_model");
	}


	public function index()
	{
		$viewData = new stdClass();
		$pages = $this->default_model->get_all("pages", array(), "pages_rank ASC");

		$viewData->pages = $pages;
		$this->load->view('pages.php', $viewData);
	}

	public function insert() {
		$pages_title = $this->input->post("pages_title");
		$pages_content = $this->input->post("pages_content");
		if(!$pages_title || !$pages_content){
			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Boş alanları doldurunuz!",
				"type" => "warning"
			);

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/pages"));
		}else{
				$insert = $this->default_model->insert("pages",
					array(
						"pages_title" => $pages_title,
						"pages_content" => $pages_content,
						"pages_status" => 1,
						"pages_rank" => 0,
						"pages_created_at" => date("Y-m-d")
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

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/pages"));
		}

	}

	public function update($id) {
		$pages_title = $this->input->post("pages_title");
		$pages_content = $this->input->post("pages_content");


		if(!$pages_title || !$pages_content){
			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Boş alanları doldurunuz!",
				"type" => "warning"
			);

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/pages"));
		}else{
			
			$update = $this->default_model->update("pages",
				array(
					"pages_id" => $id
				),
				array(
						"pages_title" => $pages_title,
						"pages_content" => $pages_content,
						"pages_status" => 1,
						"pages_rank" => 0
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

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/pages"));
		}

	}


	public function delete($id) {
		$image_data = $this->default_model->get("pages",
		array(
			"pages_id" => $id
		));
		unlink("uploads/".$image_data->pages_image);

		$delete = $this->default_model->delete("pages", 
			array(
				"pages_id" => $id
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
		redirect(base_url("admin/pages"));


	}


	public function statusupdate($id){
		if($id){
            $isActive = ($this->input->post("data") == "true") ? 1 : 0;
			$this->default_model->update("pages",
				array(
					"pages_id" => $id
				),
				array(
					"pages_status" => $isActive
				)
			);
		}
	}


	public function ranksetter(){
		$data = $this->input->post("data");

		parse_str($data, $ranke);

		$value = $ranke["rank"];

		foreach($value as $rank => $id){
				$this->default_model->update("pages",
				array(
					"pages_id" => $id
				),
				array(
					"pages_rank" => $rank
				));
		}
	}


}
