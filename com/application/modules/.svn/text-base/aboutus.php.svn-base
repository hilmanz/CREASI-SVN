<?php
class aboutus extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->contactusHelper = $this->useHelper("contactusHelper");
		
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);

		
	}

	 
	function main(){
		

		$time['time'] = '%H:%M:%S';
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/aboutus.html');
	
		
	}
	function addcontact_us(){
	//	pr($_SESSION);
		//pr(md5($_POST['captcha']));
		if(isset($_SESSION['simplecaptcha']))
			{
				
				if (md5($_POST['captcha']) == $_SESSION['simplecaptcha'])
				{
					//pr('masuk');exit;
					$addcontact_us = $this->contactusHelper->addcontact_us();
					
					if($addcontact_us==true)
					{
						$this->assign('success','message already sent,Thanks');
						return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/contactus.html');
					
					}
					
				
				}
				
			}
	
	
	}
	
	function statusajax(){
			
	
		global $LOCALE,$CONFIG; 
		
		//pr($_POST);exit;
		$status=$this->_p('status');
		$uid = $this->_p('idnya');
		$result = $this->contentHelper->changestatus($uid,$status);
		
	//	pr($result);exit;
			if ($result['status']==2){ 
			print json_encode(array('status'=>'2', 'data'=>$result));
			
		}else{ 
			print json_encode(array('status'=>'1', 'data'=>$result));
		}
		//pr($result);exit;
		exit;
				
	}
	
	
	
	}
?>