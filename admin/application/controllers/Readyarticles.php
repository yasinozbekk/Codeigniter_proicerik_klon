<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Readyarticles extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();

		$this->load->model("default_model");
	}


	public function index()
	{
		$viewData = new stdClass();
		$readyarticles = $this->default_model->get_all("readyarticles", array(), "readyarticles_rank ASC");

		$viewData->readyarticles = $readyarticles;
		$this->load->view('readyarticles.php', $viewData);
	}

	public function insert() {
		$readyarticles_title = $this->input->post("readyarticles_title");
		if(!$readyarticles_title){
			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Boş alanları doldurunuz!",
				"type" => "warning"
			);

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/readyarticles"));
		}else{
				$insert = $this->default_model->insert("readyarticles",
					array(
						"readyarticles_title" => $readyarticles_title,
						"readyarticles_status" => 1,
						"readyarticles_rank" => 0,
						"readyarticles_created_at" => date("Y-m-d")
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
			redirect(base_url("admin/readyarticles"));
		}

	}

	public function update($id) {
		$readyarticles_title = $this->input->post("readyarticles_title");

	function convertDot($str){
		$str = str_replace(',', '.', $str);
		return $str;
	}
	$readyarticles_price = convertDot($readyarticles_price);

		if(!$readyarticles_title){
			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Boş alanları doldurunuz!",
				"type" => "warning"
			);

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/readyarticles"));
		}else{
			
			$update = $this->default_model->update("readyarticles",
				array(
					"readyarticles_id" => $id
				),
				array(
						"readyarticles_title" => $readyarticles_title,
						"readyarticles_status" => 1,
						"readyarticles_rank" => 0
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
			redirect(base_url("admin/readyarticles"));
		}

	}


	public function delete($id) {
		$image_data = $this->default_model->get("readyarticles",
		array(
			"readyarticles_id" => $id
		));
		unlink("uploads/".$image_data->readyarticles_image);

		$delete = $this->default_model->delete("readyarticles", 
			array(
				"readyarticles_id" => $id
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
		redirect(base_url("admin/readyarticles"));


	}


	public function statusupdate($id){
		if($id){
            $isActive = ($this->input->post("data") == "true") ? 1 : 0;
			$this->default_model->update("readyarticles",
				array(
					"readyarticles_id" => $id
				),
				array(
					"readyarticles_status" => $isActive
				)
			);
		}
	}


	public function ranksetter(){
		$data = $this->input->post("data");

		parse_str($data, $ranke);

		$value = $ranke["rank"];

		foreach($value as $rank => $id){
				$this->default_model->update("readyarticles",
				array(
					"readyarticles_id" => $id
				),
				array(
					"readyarticles_rank" => $rank
				));
		}
	}


}
