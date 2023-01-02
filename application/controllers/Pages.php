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
		@$id = $_GET["id"];
		$viewData = new stdClass();
		$pageinfo = $this->default_model->get("pages", array("pages_id" => $id));
        $viewData->pageinfo              = $pageinfo;

        $settings = $this->default_model->get("settings",array("id"=>1));
        $viewData->settings = $settings;

        $pages = $this->default_model->get_all("pages",array("pages_status"=>1),"pages_rank ASC");
        $viewData->pages              = $pages;

		$viewData->pages = $pages;
		$this->load->view('pages.php', $viewData);
	}


}
