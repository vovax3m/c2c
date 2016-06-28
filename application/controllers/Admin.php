<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller { 
	public function __construct(){
			parent::__construct();
			
			$this->load->model('call_model');        // подключаем библиотеку доступности функций
			
			
		}
	public function index()
	{	
		if($_SERVER['REMOTE_ADDR']!='91.196.6.1') show_404();
		$this->load->model('call_model');
		$data['users']=$this->call_model->get();
		$this->load->view('header');
		$this->load->view('userlist',$data);
		$this->load->view('footer');
	}
	
	function useradd(){
	//INSERT INTO settings (`user_id`, `param_key`, `param_value`) SELECT 7 as user_id, param_key,param_value FROM `default_settings`
		$name=$this->input->post('name');
		$group=$this->input->post('group');
		$trunk=$this->input->post('trunk');
		$pip=ip2long($this->input->post('ip'));
		$act=1;
		$key=sha1($group.time());
		$i=$this->call_model->add($name,$group,$trunk,$key,$pip,$act);
		if($i){
			header('Location: /admin');
		}
	}
	function useredit(){
		$data['name']=$this->input->post('ename');
		$data['rgroup']=$this->input->post('egroup');
		$data['trunk']=$this->input->post('etrunk');
		$data['apikey']=$this->input->post('eapikey');
		$data['counter']=$this->input->post('ecounter');
		$data['pip']=ip2long($this->input->post('eip'));
		$data['active']= ($this->input->post('eactive')=='on') ? 1 : 0 ;
		$id=$this->input->post('eid');
		$i=$this->call_model->edit($id,$data);
		if($i){
			header('Location: /admin');
		}
		//print_r($this->input->post());
	}
	function del($id){
		$this->call_model->del($id);
		echo 1;
	}
	function newkey($gr){
		echo $key=sha1($gr.time());
	}
	function getlog(){
		$data['log']=$this->call_model->getlog();
		$this->load->view('calllog',$data);
	}
}