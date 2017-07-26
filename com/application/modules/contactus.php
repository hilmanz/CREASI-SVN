<?php
class contactus extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->contactusHelper = $this->useHelper("contactusHelper");
		$this->mathcaptchaHelper = $this->useHelper("mathcaptchaHelper");
	
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);

		
	}

	 
	function main(){
		global $LOCALE,$CONFIG; 

		$time['time'] = '%H:%M:%S';
		$captcha=$this->mathcaptchaHelper->showcaptcha();
		
		$this->assign('captcha', $captcha);
		$this->assign('xa', $this->session->getSession($CONFIG['SESSION_NAME'],"kodeCapcahMath"));
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/contact.html');
	
		
	}
	function addcontact_us(){
	global $LOCALE,$CONFIG; 
	//pr($this->session->getSession($CONFIG['SESSION_NAME'],"kodeCapcahMath"));exit;
	//pr($_POST);exit;

			$name = strip_tags($this->_p('name')); 
			$email = strip_tags($this->_p('email')); 
			$subject = strip_tags($this->_p('subject')); 
			$message = strip_tags($this->_p('message')); 
			$captchavalue = strip_tags($this->_p('captchavalue')); 
			$emailval=$this->is_valid_email(strip_tags($email));
			
			$pesan_erorr='';
			$name_no='';
			$email_no='';
			$subject_no='';
			$message_no='';
			$captchavalue_no='';
			if ($name=='')
			{
				$name_no='You cannot leave this field empty';
				$pesan_erorr='ada';
			}		
			if ($email=='')
			{
				$email_no='You cannot leave this field empty';
				$pesan_erorr='ada';
			}	

			if ($email!='')
			{
			if(!$emailval)
				{
					$email_no="This email is incorrect format (e.g. example@creasi.co.id)";
					$pesan_erorr="ada";
				}
			}	
			
			if ($subject=='')
			{
				$subject_no='You cannot leave this field empty';
				$pesan_erorr='ada';
			}		
			if ($message=='')
			{
				$message_no='You cannot leave this field empty';
				$pesan_erorr='ada';
			}		
			if ($captchavalue=='')
			{
				$captchavalue_no='You cannot leave this field empty';
				$pesan_erorr='ada';
			}	
			if ($captchavalue !=$this->session->getSession($CONFIG['SESSION_NAME'],"kodeCapcahMath") )
			{
				$captchavalue_no='The captcha is incorrect';
				$pesan_erorr='ada';
			}	
			if($pesan_erorr)
			{
				//pr($photo_no);die;
				
				
				$this->assign('name',$name);
				$this->assign('email',$email);
				$this->assign('subject',$subject);
				$this->assign('message',$message);
				
				$this->assign('captchavalue_no',$captchavalue_no);
				$this->assign('name_no',$name_no);
				$this->assign('email_no',$email_no);
				$this->assign('subject_no',$subject_no);
				$this->assign('message_no',$message_no);
				$time['time'] = '%H:%M:%S';
				$captcha=$this->mathcaptchaHelper->showcaptcha();
				$this->assign('captcha', $captcha);
				$this->assign('xa', $this->session->getSession($CONFIG['SESSION_NAME'],"kodeCapcahMath"));
				
				return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/contact.html');
			}
			
			//pr($_POST);exit;
			if($_POST['captcha'])
			{
				if ($_POST['captcha'] == $this->session->getSession($CONFIG['SESSION_NAME'],"kodeCapcahMath"))
				{
			
					
					$addcontact_us = $this->contactusHelper->addcontact_us();
					
					if($addcontact_us==true)
					{
						sendRedirect("{$CONFIG['BASE_DOMAIN']}home");
						return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
					}
				}
				
			}
			
				sendRedirect("{$CONFIG['BASE_DOMAIN']}home");
						return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
			
	
	
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
