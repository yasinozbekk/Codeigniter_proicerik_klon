<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Readyarticlesdetail extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();

		$this->load->model("default_model");
	}


	public function index()
	{
		$viewData = new stdClass();
		$readyarticlesdetail = $this->default_model->get_all("readyarticlesdetail", array(), "readyarticlesdetail_rank ASC");



		foreach ($readyarticlesdetail as $result) {
			$id = $result->readyarticles_id;


			$settings = $this->default_model->get("readyarticles", array("readyarticles_id " => $id));

			$deneme = $settings;

		}


			echo "<br>Merhabaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa : " . $deneme->readyarticles_title;



		$viewData->deneme = $deneme;
		$viewData->readyarticlesdetail = $readyarticlesdetail;
		$this->load->view('readyarticlesdetail.php', $viewData);
	}

	public function insert() {
		$readyarticlesdetail_title = $this->input->post("readyarticlesdetail_title");
		if(!$readyarticlesdetail_title){
			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Boş alanları doldurunuz!",
				"type" => "warning"
			);

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/readyarticlesdetail"));
		}else{
				$insert = $this->default_model->insert("readyarticlesdetail",
					array(
						"readyarticlesdetail_title" => $readyarticlesdetail_title,
						"readyarticlesdetail_status" => 1,
						"readyarticlesdetail_rank" => 0,
						"readyarticlesdetail_created_at" => date("Y-m-d")
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
			redirect(base_url("admin/readyarticlesdetail"));
		}

	}

	public function update($id) {
		$readyarticlesdetail_title = $this->input->post("readyarticlesdetail_title");

	function convertDot($str){
		$str = str_replace(',', '.', $str);
		return $str;
	}
	$readyarticlesdetail_price = convertDot($readyarticlesdetail_price);

		if(!$readyarticlesdetail_title){
			$alert = array(
				"title" => "Hata!",
				"subTitle" => "Boş alanları doldurunuz!",
				"type" => "warning"
			);

			$this->session->set_flashdata('alert', $alert);
			redirect(base_url("admin/readyarticlesdetail"));
		}else{
			
			$update = $this->default_model->update("readyarticlesdetail",
				array(
					"readyarticlesdetail_id" => $id
				),
				array(
						"readyarticlesdetail_title" => $readyarticlesdetail_title,
						"readyarticlesdetail_status" => 1,
						"readyarticlesdetail_rank" => 0
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
			redirect(base_url("admin/readyarticlesdetail"));
		}

	}


	public function delete($id) {
		$image_data = $this->default_model->get("readyarticlesdetail",
		array(
			"readyarticlesdetail_id" => $id
		));
		unlink("uploads/".$image_data->readyarticlesdetail_image);

		$delete = $this->default_model->delete("readyarticlesdetail", 
			array(
				"readyarticlesdetail_id" => $id
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
		redirect(base_url("admin/readyarticlesdetail"));


	}


	public function statusupdate($id){
		if($id){
            $isActive = ($this->input->post("data") == "true") ? 1 : 0;
			$this->default_model->update("readyarticlesdetail",
				array(
					"readyarticlesdetail_id" => $id
				),
				array(
					"readyarticlesdetail_status" => $isActive
				)
			);
		}
	}


	public function ranksetter(){
		$data = $this->input->post("data");

		parse_str($data, $ranke);

		$value = $ranke["rank"];

		foreach($value as $rank => $id){
				$this->default_model->update("readyarticlesdetail",
				array(
					"readyarticlesdetail_id" => $id
				),
				array(
					"readyarticlesdetail_rank" => $rank
				));
		}
	}


}
