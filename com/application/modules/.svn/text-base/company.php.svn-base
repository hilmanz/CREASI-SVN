<?php
class company extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
			$this->jobHelper = $this->useHelper("jobHelper");
		
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		
		if(!$this->isUserOnline()){
		
			sendRedirect("{$CONFIG['BASE_DOMAIN']}home");
			exit;
			die;
		}
		
	}

	 
	function main(){
		global $LOCALE,$CONFIG; 
	
		$time['time'] = '%H:%M:%S';
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/company.html');
	
		
	}
	function addJobs(){
	global $LOCALE,$CONFIG; 
		if($this->_p('submit'))
		{
			$savejobs= $this->jobHelper->savejobs();
			if($savejobs)
			{
				sendRedirect("{$CONFIG['BASE_DOMAIN']}company");
			}
		}

		$time['time'] = '%H:%M:%S';
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/addjob.html');
	
		
	}
	function saveJobs(){
		

		$time['time'] = '%H:%M:%S';
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/addjob.html');
	
		
	}
	
	}
?>