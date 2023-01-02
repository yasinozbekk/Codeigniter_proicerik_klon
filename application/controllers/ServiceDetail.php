<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicedetail extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();

		$this->load->model("default_model");
	}


	public function index()
	{
		@$id = $_GET["id"];
		$viewData = new stdClass();
		$servicedetail = $this->default_model->get("editorservices", array("editorservices_id" => $id));

        $settings = $this->default_model->get("settings",array("id"=>1));
        $viewData->settings = $settings;

        $socialmedia = $this->default_model->get_all("socialmedia",array("socialmedia_status"=>1),"socialmedia_rank ASC");
        $viewData->socialmedia              = $socialmedia;

        $pages = $this->default_model->get_all("pages",array("pages_status"=>1),"pages_rank ASC");
        $viewData->pages              = $pages;
        
		$viewData->servicedetail = $servicedetail;
		$this->load->view('servicedetail.php', $viewData);
	}



	public function deneme($id)
	{
		$viewData = new stdClass();
		$servicedetail = $this->default_model->get("editorservices", array("editorservices_id" => $id));

        $settings = $this->default_model->get("settings",array("id"=>1));
        $viewData->settings = $settings;

		$viewData->servicedetail = $servicedetail;
		$this->load->view('servicedetail.php', $viewData);
	}



}
