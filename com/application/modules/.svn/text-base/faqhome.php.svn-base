<?php
class faqhome extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->contentHelper = $this->useHelper("contentHelper");
		
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);

		
	}

	 
	function main(){
		
		$result=$this->contentHelper->listfaq();
		//pr($result);die;
		$time['time'] = '%H:%M:%S';
		$this->assign('list',$result['result']);
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/faq.html');
	
		
	}
	
	
	}
?>