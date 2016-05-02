<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller { 
	public function __construct(){
			parent::__construct();
			
			$this->load->model('call_model');        // подключаем библиотеку доступности функций
			
			
		}
	public function index()
	{	
	#	if($_SERVER['REMOTE_ADDR']!='91.196.6.1') show_404();	
		$this->load->model('call_model');
		$r=$this->call_model->get_settings('821ea7fdf0016f650568a8179bbe34a6aac5c7b5');
		$format=false;
		foreach($r as $v){
			$data[$v['param_key']]=$v['param_value'];
			if($v['param_key']=='format')$format=$v['param_value'];
		}
		//print_r($data);
		$this->load->view('header');
		$this->load->view('panel/index',$data);
		$this->load->view('footer');
	}
	function set(){
		print_r($_POST);
	}
	
}