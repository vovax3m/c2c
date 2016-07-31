<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// ìîé êëàññ ñ ôóíöèÿìè íåîáõîäèìûìè äëÿ ğàáîòû
class Funcs {

    public function __construct() {
        //parent::__construct();
    }
    function e_mail($mess='',$subj='Çâîíîê ñ ñàéòà',$to='vovax3m@ya.ru',$bcc='vovax3m@ya.ru'){
		/*
		îòïğàâêà ıë ïèñåì
		$mess='', ñîäåğæèìîå ïèñüìà 
		$subj='Ïèñüìî ñ ËÊ', òåìà ñîîáùåíèÿ
		$from='no_reply@dialog64.ru'  îòêàêîãî èìåíè øëåì
		$to='mironov@dialog64.ru' íà êàêîé àäğåñ øëåì
		*/
		$from='no_reply@dialog64.ru';
		$CI =& get_instance();
		$CI->load->library('email');
		// ôîğìàò ïèñüìà
		$config['mailtype']='html';
		$CI->email->initialize($config);
		$CI->email->from($from,'click2call');
		$CI->email->to($to); 
		$CI->email->bcc($bcc); 
		$CI->email->subject($subj); 
		$CI->email->message($mess);
				
		// åñëè îòïğàâêà íå óäàëàñü
		//return (!$CI->email->send()) ? false : true;
		$CI->email->send();
	}	
}