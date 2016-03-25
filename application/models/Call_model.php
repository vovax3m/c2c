<?php
class Call_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get($key=false) 
	{
		if($key){	
			$data['apikey']=$key;
			$data['active']=1;
			$this->db->where($data);
		}
		$query = $this->db->get('users');
		return $query->result_array();
	}
	public function getlog() 
	{
		$query = $this->db->get('calllog');
		return $query->result_array();
	}
	public function log($ip,$name,$no,$status){
		$data['ip']=$ip;
		$data['name']=$name;
		$data['no']=$no;
		$data['status']=$status;
		$this->db->insert('calllog',$data);	
	}
	
	public function add($name,$rgroup,$trunk,$key,$pip,$act){
		$data['name']=$name;
		$data['rgroup']=$rgroup;
		$data['trunk']=$trunk;
		$data['apikey']=$key;
		$data['pip']=$pip;
		$data['active']=$act;
		$this->db->insert('users',$data);
		return $this->db->insert_id();	
	}
	public function del($id){
		$data['id']=$id;
		$this->db->where($data);
		$this->db->delete('users');	
	}
	public function edit($id,$data){
		//print_r($data);;
		
		$wh['id']=$id;
		$this->db->where($wh);
		$this->db->update('users',$data);	
		return $this->db->affected_rows();
	}
		public function get_settings($key=false) 
	{
		if($key){	
			$data['apikey']=$key;
			$data['active']=1;
			$this->db->select('param_key, param_value');
			$this->db->join('users', 'users.id = settings.user_id');
			$this->db->where($data);
			$query = $this->db->get('settings');
		return $query->result_array();
		}
		
	}
	
}