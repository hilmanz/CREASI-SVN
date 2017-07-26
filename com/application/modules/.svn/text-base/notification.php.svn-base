<?php
class notification extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->dashboardHelper = $this->useHelper("dashboardHelper");
		$this->registerHelper = $this->useHelper("registerHelper");
		$this->notificationHelper = $this->useHelper("notificationHelper");
		$this->contentHelper = $this->useHelper("contentHelper");
		$this->user=$this->session->getSession($this->config['SESSION_NAME'],"WEB");
		
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);

		
	}

	 
	function main(){
		
		global $LOCALE,$CONFIG; 
		if($this->user=='')
		{
			sendRedirect($CONFIG['BASE_DOMAIN']."home");
			return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
			die();
		}
		$notif = $this->notificationHelper->inbox();
		// pr($notif );
		$this->assign('listnotif', $notif );
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/notif.html');
		
		
	
	
	
	
		
	}
	function opens(){
	
		// pr($_POST);die;
		$notif = $this->notificationHelper->read();
		print json_encode(array('status'=>1));die;
	}
	
	
	
	
	}
?>