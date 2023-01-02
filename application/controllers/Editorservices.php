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
		@$id = $_GET["id"];
		$viewData = new stdClass();
		$pageinfo = $this->default_model->get("editorservices", array("editorservices_id" => $id));
        $viewData->pageinfo              = $pageinfo;

        $settings = $this->default_model->get("settings",array("id"=>1));
        $viewData->settings = $settings;

        $editorservices = $this->default_model->get_all("editorservices",array("editorservices_status"=>1),"editorservices_rank ASC");
        $viewData->editorservices              = $editorservices;


        $socialmedia = $this->default_model->get_all("socialmedia",array("socialmedia_status"=>1),"socialmedia_rank ASC");
        $viewData->socialmedia              = $socialmedia;

        $pages = $this->default_model->get_all("pages",array("pages_status"=>1),"pages_rank ASC");
        $viewData->pages              = $pages;
        
		$viewData->editorservices = $editorservices;
		$this->load->view('editorservices.php', $viewData);
	}


}
