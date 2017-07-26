<?php
class helpts extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->dashboardHelper = $this->useHelper("dashboardHelper");
		$this->helpHelper = $this->useHelper("helpHelper");
		$this->mathcaptchaHelper = $this->useHelper("mathcaptchaHelper");
		$this->user=$this->session->getSession($this->config['SESSION_NAME'],"WEB");
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);

		
	}

	 
	function main(){
		global $LOCALE,$CONFIG; 
		
	
		
		$time['time'] = '%H:%M:%S';
		
		if($this->_p('submit'))
		{

			$name=$this->_p('name');
			$name_no='';
			$email=$this->_p('email');
			$email_no='';
			$subject=$this->_p('subject');
			$subject_no='';
			$message=$this->_p('message');
			$message_no='';
			$captcha=$this->_p('captchavalue');
			$captcha_no='';
			$pessan_erorr='';
			if($name=='')
			{
				$name_no='data name kosong';
				$pessan_erorr='ada';
			}
			if($email=='')
			{
				$email_no='email kosong';
				$pessan_erorr='ada';
			}
			if($message=='')
			{
				$message_no='message kosong';
				$pessan_erorr='ada';
			}
			if($subject=='')
			{
				$subject_no='subject kosong';
				$pessan_erorr='ada';
			}
			if($captcha!= $this->session->getSession($this->config['SESSION_NAME'],"kodeCapcahMath"))
			{
				$captcha_no='captcha salah';
				$pessan_erorr='ada';
			}
			elseif($captcha=='')
			{
				$captcha_no='captcha kosong';
				$pessan_erorr='ada';
			}
			//echo $captcha.'!='. $this->session->getSession($CONFIG['SESSION_NAME'],"kodeCapcahMath");
			if($pessan_erorr)
			{
				if($this->_p('ajax'))
				{
					$result['name']= $name;
					$result['name_no']= $name_no;
					$result['email']= $email;
					$result['email_no']= $email_no;
					$result['subject']=$subject;
					$result['subject_no']=$subject_no;
					$result['message']=$message;
					$result['message_no']=$message_no;
					$result['captchafield']=$captcha;
					$result['captcha_no']=$captcha_no;
					$result['status']=2;
					print json_encode($result);die;

				}

				$this->assign('name', $name);
				$this->assign('name_no', $name_no);
				$this->assign('email', $email);
				$this->assign('email_no', $email_no);
				$this->assign('subject',$subject);
				$this->assign('subject_no',$subject_no);
				$this->assign('message',$message);
				$this->assign('message_no',$message_no);
			 	$this->assign('captchafield',$captcha);
				$this->assign('captcha_no',$captcha_no);
			 

				
			}
			
			$this->helpHelper->addhelpts();
			if($this->_p('ajax'))
				{
					$result['status']=1;
					$result['msg']='proses berhasil';
					print json_encode($result);die;
				}
			$this->assign('msg', 'Proses berhasil');
			
		}
		$captcha=$this->mathcaptchaHelper->showcaptcha();

		$this->assign('captcha', $captcha);
		//pr($this->user->role);exit;
		if($this->user->role==2)
		{
		$notibar = $this->dashboardHelper->notibar($id=2);
		}else{
		$notibar = $this->dashboardHelper->notibar($id=1);
		}
		
		$this->assign('notifikasibar',$notibar[0]['info']);
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/help_ts.html');
	
		
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
						return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/help_ts.html');
					
					}
					
				
				}
				
			}
	
	
	}
	
	
	
	
	
	}
?>