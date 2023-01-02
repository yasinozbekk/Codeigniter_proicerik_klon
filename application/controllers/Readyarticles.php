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
		@$id = $_GET["id"];
		$viewData = new stdClass();
		$pageinfo = $this->default_model->get("readyarticles", array("readyarticles_id" => $id));
        $viewData->pageinfo              = $pageinfo;

        $settings = $this->default_model->get("settings",array("id"=>1));
        $viewData->settings = $settings;

        $readyarticles = $this->default_model->get_all("readyarticles",array("readyarticles_status"=>1),"readyarticles_rank ASC");
        $viewData->readyarticles              = $readyarticles;

        $readyarticlesdetail = $this->default_model->get_all("readyarticlesdetail",array("readyarticlesdetail_status"=>1),"readyarticlesdetail_rank ASC");
        $viewData->readyarticlesdetail              = $readyarticlesdetail;

        $socialmedia = $this->default_model->get_all("socialmedia",array("socialmedia_status"=>1),"socialmedia_rank ASC");
        $viewData->socialmedia              = $socialmedia;

        $pages = $this->default_model->get_all("pages",array("pages_status"=>1),"pages_rank ASC");
        $viewData->pages              = $pages;
        
		$viewData->readyarticles = $readyarticles;
		$this->load->view('readyarticles.php', $viewData);
	}


}
