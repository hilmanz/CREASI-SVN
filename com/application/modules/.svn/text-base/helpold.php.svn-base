<?php
class help extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->helpHelper = $this->useHelper("helpHelper");
		
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);

		
	}

	 
	function main(){
		

		$time['time'] = '%H:%M:%S';
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/help.html');
	
		
	}
	function addhelp(){
		//pr($_SESSION);
		if(isset($_SESSION['simplecaptcha']))
			{
				
				if (md5($_POST['captcha']) == $_SESSION['simplecaptcha'])
				{
					
					$addhelp= $this->helpHelper->addhelp();
					
					if($addhelp==true)
					{
						$this->assign('success','message already sent,Thanks');
						return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/help.html');
					
					}
					
				
				}
				
			}
	
	
	}
	
	
	
	
	
	}
?>