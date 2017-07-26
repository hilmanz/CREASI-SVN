<?php
class resendEmail extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		
		$this->resendemailHelper = $this->useHelper("resendemailHelper");
		$this->emailnotifHelper = $this->useHelper("emailnotifHelper");
		
		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));	

		
	}

	 
	function main(){
		$dataCT = $this->resendemailHelper->getUsers();
		// pr($dataCT);die;
		$time['time'] = '%H:%M:%S';
		$this->assign('list', $dataCT['data']);
		$this->assign('total', $dataCT['total']);
		if($this->_p('ajax'))
		{
			print json_encode($dataCT);die;
		}
		else
		{
			return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/resendemail.html');
		}
	
	
		
	}
	function send(){
		$result = $this->emailnotifHelper->resendMail();
		print  json_encode($result);die;
	
	
	}
	
	}
?>