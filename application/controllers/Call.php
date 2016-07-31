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
		$cb=($this->input->get('cb')) ? $this->input->get('cb') : 'c2c_status'; //callback element
		//проверка существовования параметра номер
		if($nomer){
			// провека  номера на отстутствие букв
			if(!is_numeric($nomer)){
				$status['error'][]='number is not digital';
				echo ($form)? 'c2c_set_status("NOT_DIGITAL");' : json_encode($status);
				
				$this->log('',$nomer,$status);
				exit;
			}
			// проверяем длину номера
			if(strlen($nomer)!=11) {
				$status['error'][]='Wrong number length';
				echo ($form)? 'c2c_set_status("WRONG_LENGHT")' : json_encode($status);
				$this->log('',$nomer,$status);
				exit;
			}
			//проверяем первый символ номера
			if($nomer[0]!='7' and $nomer[0]!='8') {
				$status['error'][]='Number should to begin from 7 or 8';
				echo ($form)? 'c2c_set_status("WRONG_CCODE");' : json_encode($status);
				$this->log('',$nomer,$status);
				exit;
			}
		// при отстутствии номера
		}else{
			$status['error'][]='Not defined number';
			echo ($form)? 'c2c_set_status("NOT_DEFINED");' : json_encode($status);
			
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
			$settings=$this->call_model->get_settings($key);
			foreach($settings as $v){
				$sett[$v['param_key']]=$v['param_value'];
			}
			// получили ответ от базы
			if(@$r[0]['id']){
				// проверяем привязку по ip 0.0.0.0 -разрешены все
				$pip=long2ip($r[0]['pip']);
				if($_SERVER['REMOTE_ADDR']==$pip or $pip=='0.0.0.0'){
					// формируем запрос на ватс
					$arrContextOptions=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false,),);  
					$f=file_get_contents('http://91.196.5.205/c2c/call.php?a='.$r[0]['rgroup'].'&b='.$nomer.'&c='.$r[0]['trunk'].'&order='.$sett['call_order'], false, stream_context_create($arrContextOptions));
					
					//email notify
					if($sett['email_notify']){
					    $this->load->library('funcs');
						$this->load->library('parser');
						$mail_data=array( 
													  'no'    => $nomer,
													  'ip'     => $_SERVER['REMOTE_ADDR'],
													  'date' => date('Y-m-d H:i:s')											  
											);
						if( isset( $sett['notify_tmpl'] ) and $sett['notify_tmpl'] ) {
							$mail_tmpl = $this->parser->parse_string( $sett['notify_tmpl'], $mail_data, TRUE );
						}
						else {
							$mail_tmpl = $this->parser->parse( 'templates/call_email_notify', $mail_data, TRUE );
						}
						$this->funcs->e_mail( $mail_tmpl, 'Заказ звонка с сайта', $sett['email'], $sett['email'] );	
					}
					
					
					//если есть ответ от сервера
					if($f=='ok'){
						$data['counter']=$r[0]['counter']+1;
						$i=$this->call_model->edit($r[0]['id'],$data);
						if($form){
							//echo ' $(function(){$("#callback").html("success");});';
							echo 'c2c_set_status("OK");';
							
						}else{
							$status['ok'][]='calling '.$nomer; 
						}
					}
				}else{
					$status['error'][]='your request not permitted';
				}
			// если в базе не нашлось ничего
			}
			else{
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
			if($status)echo json_encode($status); 
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
	function feedback(){
	    $this->load->model('call_model');
	    $this->load->library('funcs');
		$this->load->library('parser');
		
		$key=$this->input->get('key'); // api key
		$no=$this->input->get('no'); // api key
		$name=$this->input->get('name'); // api key
		$email=$this->input->get('email'); // api key
		$msg=$this->input->get('msg'); // api key
		
		if($key){
			$this->load->model('call_model');
			$r=$this->call_model->get_settings($key);
			foreach($r as $v) $data[$v['param_key']]=$v['param_value'];
		}
		$array=array('msg'    =>$msg,
							  'name' =>$name,
							  'email' =>$email,
							  'no'      =>$no);
		if( isset( $sett['fb_tmpl'] ) and $sett['fb_tmpl'] ) {
			$content = $this->parser->parse_string( $sett['fb_tmpl'], $array, TRUE );
		}
		else {
			$content = $this->parser->parse( 'templates/feedback_email', $array, TRUE );
		}
		$this->funcs->e_mail( $content, 'с2с call', $email, $data['email'] );
		$this->call_model->fb_log($name, $no, $msg, $email, $key );
	}
}