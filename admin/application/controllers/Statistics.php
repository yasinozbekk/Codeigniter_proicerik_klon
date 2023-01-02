<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();

		$this->load->model("default_model");
	}


	public function index()
	{
		$viewData = new stdClass();
		$statistics = $this->default_model->get_all("statistics", array(), "statistics_rank ASC");

		$viewData->statistics = $statistics;
		$this->load->view('statistics.php', $viewData);
	}


	public function insert() {
		$icon = $this->input->post("icon");
		$title = $this->input->post("title");
		$piece = $this->input->post("piece");

		if(!$icon || !$title || !$piece){
			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Boş alanları doldurunuz!",
				"type" => "warning"
			);

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/statistics"));
		}else{
				$insert = $this->default_model->insert("statistics",
					array(
						"statistics_icon" => $icon,
						"statistics_title" => $title,
						"statistics_piece" => $piece,
						"statistics_status" => 1,
						"statistics_rank" => 0,
						"statistics_created_at" => date("Y-m-d")
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
			redirect(base_url("admin/statistics"));
		}

	}

	public function update($id) {
		$icon = $this->input->post("icon");
		$title = $this->input->post("title");
		$piece = $this->input->post("piece");

		if(!$icon || !$title || !$piece){
			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Boş alanları doldurunuz!",
				"type" => "warning"
			);

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/statistics"));
		}else{
			
			$update = $this->default_model->update("statistics",
				array(
					"statistics_id" => $id
				),
				array(
						"statistics_icon" => $icon,
						"statistics_title" => $title,
						"statistics_piece" => $piece,
						"statistics_status" => 1,
						"statistics_rank" => 0,
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
			redirect(base_url("admin/statistics"));
		}

	}


	public function delete($id) {
		$image_data = $this->default_model->get("statistics",
		array(
			"statistics_id" => $id
		));
		unlink("uploads/".$image_data->statistics_image);

		$delete = $this->default_model->delete("statistics", 
			array(
				"statistics_id" => $id
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
		redirect(base_url("admin/statistics"));


	}


	public function statusupdate($id){
		if($id){
            $isActive = ($this->input->post("data") == "true") ? 1 : 0;
			$this->default_model->update("statistics",
				array(
					"statistics_id" => $id
				),
				array(
					"statistics_status" => $isActive
				)
			);
		}
	}


	public function ranksetter(){
		$data = $this->input->post("data");

		parse_str($data, $ranke);

		$value = $ranke["rank"];

		foreach($value as $rank => $id){
				$this->default_model->update("statistics",
				array(
					"statistics_id" => $id
				),
				array(
					"statistics_rank" => $rank
				));
		}
	}


}
