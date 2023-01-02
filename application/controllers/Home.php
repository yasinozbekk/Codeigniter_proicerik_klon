<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();

		$this->load->model("default_model");
	}
	public function index()
	{
		$viewData = new stdClass();


        $settings = $this->default_model->get("settings",array("id"=>1));
        $viewData->settings = $settings;

        $statistics = $this->default_model->get_all("statistics",array("statistics_status"=>1),"statistics_rank ASC");
        $viewData->statistics              = $statistics;

        $articlepacks = $this->default_model->get_all("articlepacks",array("articlepacks_status"=>1),"articlepacks_rank ASC");
        $viewData->articlepacks              = $articlepacks;
        
        $readyarticles = $this->default_model->get_all("readyarticles",array("readyarticles_status"=>1),"readyarticles_rank ASC");
        $viewData->readyarticles              = $readyarticles;

        $readyarticlesdetail = $this->default_model->get_all("readyarticlesdetail",array("readyarticlesdetail_status"=>1),"readyarticlesdetail_rank ASC");
        $viewData->readyarticlesdetail              = $readyarticlesdetail;

        $editorservices = $this->default_model->get_all("editorservices",array("editorservices_status"=>1),"editorservices_rank ASC");
        $viewData->editorservices              = $editorservices;
        
        $socialmedia = $this->default_model->get_all("socialmedia",array("socialmedia_status"=>1),"socialmedia_rank ASC");
        $viewData->socialmedia              = $socialmedia;

        $pages = $this->default_model->get_all("pages",array("pages_status"=>1),"pages_rank ASC");
        $viewData->pages              = $pages;


		$viewData->url="home";
		$this->load->view('index',$viewData);
	}


	public function category($id) {
		$settings = $this->default_model->get("readyarticlesdetail", array("readyarticlesdetail_id " => $id));

		$resultview =array($settings);

		echo json_encode($resultview);
	}

}
