<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editorservices extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();

		$this->load->model("default_model");
	}


	public function index()
	{
		$viewData = new stdClass();
		$editorservices = $this->default_model->get_all("editorservices", array(), "editorservices_rank ASC");

		$viewData->editorservices = $editorservices;
		$this->load->view('editorservices.php', $viewData);
	}


	public function insert() {
		$editorservices_title = $this->input->post("editorservices_title");
		$editorservices_desc = $this->input->post("editorservices_desc");
		$editorservices_items = $this->input->post("editorservices_items");
		$editorservices_price = $this->input->post("editorservices_price");
		$editorservices_days = $this->input->post("editorservices_days");
		if(!$editorservices_title || !$editorservices_desc || !$editorservices_items || !$editorservices_price || !$editorservices_days){
			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Boş alanları doldurunuz!",
				"type" => "warning"
			);

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/editorservices"));
		}else{
				$insert = $this->default_model->insert("editorservices",
					array(
						"editorservices_title" => $editorservices_title,
						"editorservices_desc" => $editorservices_desc,
						"editorservices_items" => $editorservices_items,
						"editorservices_price" => $editorservices_price,
						"editorservices_days" => $editorservices_days,
						"editorservices_status" => 1,
						"editorservices_rank" => 0,
						"editorservices_created_at" => date("Y-m-d")
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
			redirect(base_url("admin/editorservices"));
		}

	}

	public function update($id) {
		$editorservices_title = $this->input->post("editorservices_title");
		$editorservices_desc = $this->input->post("editorservices_desc");
		$editorservices_items = $this->input->post("editorservices_items");
		$editorservices_price = $this->input->post("editorservices_price");
		$editorservices_days = $this->input->post("editorservices_days");

	function convertDot($str){
		$str = str_replace(',', '.', $str);
		return $str;
	}
	$editorservices_price = convertDot($editorservices_price);

		if(!$editorservices_title || !$editorservices_desc || !$editorservices_items || !$editorservices_price || !$editorservices_days){
			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Boş alanları doldurunuz!",
				"type" => "warning"
			);

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/editorservices"));
		}else{
			
			$update = $this->default_model->update("editorservices",
				array(
					"editorservices_id" => $id
				),
				array(
						"editorservices_title" => $editorservices_title,
						"editorservices_desc" => $editorservices_desc,
						"editorservices_items" => $editorservices_items,
						"editorservices_price" => $editorservices_price,
						"editorservices_days" => $editorservices_days,
						"editorservices_status" => 1,
						"editorservices_rank" => 0
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
			redirect(base_url("admin/editorservices"));
		}

	}


	public function delete($id) {
		$image_data = $this->default_model->get("editorservices",
		array(
			"editorservices_id" => $id
		));
		unlink("uploads/".$image_data->editorservices_image);

		$delete = $this->default_model->delete("editorservices", 
			array(
				"editorservices_id" => $id
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
		redirect(base_url("admin/editorservices"));


	}


	public function statusupdate($id){
		if($id){
            $isActive = ($this->input->post("data") == "true") ? 1 : 0;
			$this->default_model->update("editorservices",
				array(
					"editorservices_id" => $id
				),
				array(
					"editorservices_status" => $isActive
				)
			);
		}
	}


	public function ranksetter(){
		$data = $this->input->post("data");

		parse_str($data, $ranke);

		$value = $ranke["rank"];

		foreach($value as $rank => $id){
				$this->default_model->update("editorservices",
				array(
					"editorservices_id" => $id
				),
				array(
					"editorservices_rank" => $rank
				));
		}
	}


}
