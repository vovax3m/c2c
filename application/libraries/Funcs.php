<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// ��� ����� � �������� ������������ ��� ������
class Funcs {

    public function __construct() {
        //parent::__construct();
    }
    function e_mail($mess='',$subj='������ � �����',$to='vovax3m@ya.ru',$bcc='vovax3m@ya.ru'){
		/*
		�������� �� �����
		$mess='', ���������� ������ 
		$subj='������ � ��', ���� ���������
		$from='no_reply@dialog64.ru'  �������� ����� ����
		$to='mironov@dialog64.ru' �� ����� ����� ����
		*/
		$from='no_reply@dialog64.ru';
		$CI =& get_instance();
		$CI->load->library('email');
		// ������ ������
		$config['mailtype']='html';
		$CI->email->initialize($config);
		$CI->email->from($from,'click2call');
		$CI->email->to($to); 
		$CI->email->bcc($bcc); 
		$CI->email->subject($subj); 
		$CI->email->message($mess);
				
		// ���� �������� �� �������
		//return (!$CI->email->send()) ? false : true;
		$CI->email->send();
	}	
}