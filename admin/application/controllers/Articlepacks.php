<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articlepacks extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();

		$this->load->model("default_model");
	}


	public function index()
	{
		$viewData = new stdClass();
		$articlepacks = $this->default_model->get_all("articlepacks", array(), "articlepacks_rank ASC");

		$viewData->articlepacks = $articlepacks;
		$this->load->view('articlepacks.php', $viewData);
	}


	public function insert() {
		$articlepacks_title = $this->input->post("articlepacks_title");
		$articlepacks_minwords = $this->input->post("articlepacks_minwords");
		$articlepacks_maxwords = $this->input->post("articlepacks_maxwords");
		$articlepacks_price = $this->input->post("articlepacks_price");
		$articlepacks_desc = $this->input->post("articlepacks_desc");
		if(!$articlepacks_title || !$articlepacks_minwords || !$articlepacks_maxwords || !$articlepacks_price || !$articlepacks_desc){
			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Boş alanları doldurunuz!",
				"type" => "warning"
			);

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/articlepacks"));
		}else{
				$insert = $this->default_model->insert("articlepacks",
					array(
						"articlepacks_title" => $articlepacks_title,
						"articlepacks_minwords" => $articlepacks_minwords,
						"articlepacks_maxwords" => $articlepacks_maxwords,
						"articlepacks_price" => $articlepacks_price,
						"articlepacks_desc" => $articlepacks_desc,
						"articlepacks_status" => 1,
						"articlepacks_rank" => 0,
						"articlepacks_created_at" => date("Y-m-d")
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
			redirect(base_url("admin/articlepacks"));
		}

	}

	public function update($id) {
		$articlepacks_title = $this->input->post("articlepacks_title");
		$articlepacks_minwords = $this->input->post("articlepacks_minwords");
		$articlepacks_maxwords = $this->input->post("articlepacks_maxwords");
		$articlepacks_price = $this->input->post("articlepacks_price");
		$articlepacks_desc = $this->input->post("articlepacks_desc");

	function convertDot($str){
		$str = str_replace(',', '.', $str);
		return $str;
	}
	$articlepacks_price = convertDot($articlepacks_price);

		if(!$articlepacks_title || !$articlepacks_minwords || !$articlepacks_maxwords || !$articlepacks_price || !$articlepacks_desc){
			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Boş alanları doldurunuz!",
				"type" => "warning"
			);

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/articlepacks"));
		}else{
			
			$update = $this->default_model->update("articlepacks",
				array(
					"articlepacks_id" => $id
				),
				array(
						"articlepacks_title" => $articlepacks_title,
						"articlepacks_minwords" => $articlepacks_minwords,
						"articlepacks_maxwords" => $articlepacks_maxwords,
						"articlepacks_price" => $articlepacks_price,
						"articlepacks_desc" => $articlepacks_desc,
						"articlepacks_status" => 1,
						"articlepacks_rank" => 0
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
			redirect(base_url("admin/articlepacks"));
		}

	}


	public function delete($id) {
		$image_data = $this->default_model->get("articlepacks",
		array(
			"articlepacks_id" => $id
		));
		unlink("uploads/".$image_data->articlepacks_image);

		$delete = $this->default_model->delete("articlepacks", 
			array(
				"articlepacks_id" => $id
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
		redirect(base_url("admin/articlepacks"));


	}


	public function statusupdate($id){
		if($id){
            $isActive = ($this->input->post("data") == "true") ? 1 : 0;
			$this->default_model->update("articlepacks",
				array(
					"articlepacks_id" => $id
				),
				array(
					"articlepacks_status" => $isActive
				)
			);
		}
	}


	public function ranksetter(){
		$data = $this->input->post("data");

		parse_str($data, $ranke);

		$value = $ranke["rank"];

		foreach($value as $rank => $id){
				$this->default_model->update("articlepacks",
				array(
					"articlepacks_id" => $id
				),
				array(
					"articlepacks_rank" => $rank
				));
		}
	}


}
