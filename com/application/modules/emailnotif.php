<?php
class emailnotif extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 

		
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);

		
	}

	 
	function resendverification(){
		

		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/alert.html');
	
		
	}
	function forgetpassword(){
		

		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/alert.html');
	
		
	}
	
	
	}
?>