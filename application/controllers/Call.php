<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call extends CI_Controller { 

	public function index()
	{	 
		header('Location:/call/help');
		
	}
	public function make($nomer=false)
	{	
		
		$key=$this->input->get('key'); // api key
		$form=$this->input->get('form'); // diffent answers when form
		$cb=($this->input->get('cb'))? $this->input->get('cb'):'c2c_status'; //callback element
		//проверка существовования параметра номер
		if($nomer){
			// провека  номера на отстутствие букв
			if(!is_numeric($nomer)){
				$status['error'][]='number is not digital';
				echo ($form)? ' $("#'.$cb.'").html("'.@$status['error'][0].'");' : json_encode($status);
				$this->log('',$nomer,$status);
				exit;
			}
			// проверяем длину номера
			if(strlen($nomer)!=11) {
				$status['error'][]='Wrong number length';
				echo ($form)? ' $("#'.$cb.'").html("'.@$status['error'][0].'");' : json_encode($status);
				$this->log('',$nomer,$status);
				exit;
			}
			if($nomer[0]!='7' and $nomer[0]!='8') {
				$status['error'][]='Number should to begin from 7 or 8';
				echo ($form)? ' $("#'.$cb.'").html("'.@$status['error'][0].'");' : json_encode($status);
				$this->log('',$nomer,$status);
				exit;
			}
		// при отстутствии номера
		}else{
			$status['error'][]='Not defined number';
			echo ($form)? ' $("#'.$cb.'").html("'.@$status['error'][0].'");' : json_encode($status);
			
			$this->log('','',$status);
			exit;			
		}
		// меняем 8 на 7
		if($nomer[0]==8) {
			$nomer= '7'.substr($nomer,1);	
		}
		
		$status='';
		//есть все интересующие параметры
		if($key and $nomer){
			// получаем данные по данному ключу
			$this->load->model('call_model');
			$r=$this->call_model->get($key);
			// получили ответ от базы
			if(@$r[0]['id']){
				// проверяем привязку по ip 0.0.0.0 -разрешены все
				$pip=long2ip($r[0]['pip']);
				if($_SERVER['REMOTE_ADDR']==$pip or $pip=='0.0.0.0'){
					// формируем запрос на ватс
					$arrContextOptions=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false,),);  
					$f=file_get_contents('http://91.196.5.205/c2c/call.php?a='.$r[0]['rgroup'].'&b='.$nomer.'&c='.$r[0]['trunk'].'&order=1', false, stream_context_create($arrContextOptions));
					//если есть ответ от сервера
					if($f=='ok'){
						
						$data['counter']=$r[0]['counter']+1;
						$i=$this->call_model->edit($r[0]['id'],$data);
						if($form){
							//echo ' $(function(){$("#callback").html("success");});';
							echo ' $("#'.$cb.'").html("success");';
							
						}else{
							$status['ok'][]='calling '.$nomer; 
						}
					}
				}else{
					$status['error'][]='your request not permitted';
				}
			// если в базе не нашлось ничего
			}else{
				$status['error'][]='your key are wrong or inactive';
			}
		
		//если нет указан ключ
		}elseif(!$key){
			$status['error'][]='Not defined key ';
		}
		// формирует ответ клиенту
		//$this->call_model->log(ip2long($_SERVER['REMOTE_ADDR']),$r[0]['name'],$nomer,json_encode($status));
		$this->log(@$r[0]['name'],$nomer,$status);
		if($form){
			//echo '//'.@$status['error'][0];
			if(@$status['error'][0]){
				echo ' $("#'.$cb.'").html("'.$status['error'][0].'");';
			}
		}else{
			if($status)echo json_encode($status)	; 
		}
	}
	function log($name,$nomer,$status){
		$this->load->model('call_model');
		$r=$this->call_model->log(ip2long($_SERVER['REMOTE_ADDR']),$name,$nomer,json_encode($status));
	}
	function help($form=false){
		$this->load->view('header');
		if($form=='form'){
			$this->load->view('help_form');
		}elseif($form=='contact'){
			$this->load->view('help_contact');
		}else{
			$this->load->view('help_get');
		}
		$this->load->view('footer');
		
		
	}
	function regen(){
		$key=$this->input->get('key');
		if($key){
			$this->load->model('call_model');
			$r=$this->call_model->get($key);
			// получили ответ от базы
			if(@$r[0]['id']){
				$data['apikey']=sha1($r[0]['rgroup'].time());
				$i=$this->call_model->edit($r[0]['id'],$data);
				if($i){
					$status['ok'][]=$data['apikey'];
				}
			}else{
				$status['error'][]='your key are wrong or inactive';
			}
		}else{
			$status['error'][]='Not defined key';
			
		}
		if($status)echo json_encode($status);
	}
	function getcalls(){
		$key=$this->input->get('key');
		if($key){
			$this->load->model('call_model');
			$r=$this->call_model->get($key);
			// получили ответ от базы
			if(@$r[0]['id']){
				$status['ok'][]=$r[0]['counter'];
				
			}else{
				$status['error'][]='your key are wrong or inactive';
			}
		}else{
			$status['error'][]='your key are wrong or inactive';
			
		}
		if($status)echo json_encode($status);
	}
	function form($key=false){
		$this->load->model('call_model');
		$r=$this->call_model->get_settings($key);
		$format=false;
		foreach($r as $v){
			$data[$v['param_key']]=$v['param_value'];
			if($v['param_key']=='format')$format=$v['param_value'];
		}
	
		//// const
		$data['key']=$key;
		$data['block']='callblock';
		$data['callback']='c2c_status';
		$data['hour']=date('H');
		$data['day']=date('D');
		
		if($format=='div'){
			$this->load->view('format/div',$data);
		}elseif($format=='dock'){
			$this->load->view('format/dock',$data);
		}elseif($format=='widget'){
			$this->load->view('format/widget',$data);
		}else{
			echo 'format='.$format;
		}
	}
}