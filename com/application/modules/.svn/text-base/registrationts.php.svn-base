<?php
class registrationts extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->jobHelper = $this->useHelper("jobHelper");
		$this->contentHelper = $this->useHelper("contentHelper");
		$this->registerHelper = $this->useHelper("registerHelper");
		$this->mathcaptchaHelper = $this->useHelper("mathcaptchaHelper");
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		
		$this->user=$this->session->getSession($this->config['SESSION_NAME'],"WEB");
		$this->assign('user', $this->user);
	}

	 
	function main(){
	global $LOCALE,$CONFIG;
		if($this->user)
		{
			sendRedirect($CONFIG['BASE_DOMAIN']."home");
			return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
			die();
		}
		 
		$captcha=$this->mathcaptchaHelper->showcaptcha();
		// pr($this->session->getSession($CONFIG['SESSION_NAME'],"kodeCapcahMath"));
		$time['time'] = '%H:%M:%S';
		$provincy =$this->jobHelper->province();
		$this->assign('provincy', $provincy);
		$this->assign('captcha', $captcha);
		$this->assign('xa', $this->session->getSession($CONFIG['SESSION_NAME'],"kodeCapcahMath"));
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/join-ts.html');
	
		
	}
	function save(){
		global $LOCALE,$CONFIG; 
	
		//pr($this->session->getSession($CONFIG['SESSION_NAME'],"kodeCapcahMath"));exit;
		 // pr($_POST);
		// pr($this->session->getSession($CONFIG['SESSION_NAME'],"kodeCapcahMath"));exit; 
		if($_POST['captcha'])
			{
				// pr($_POST);
					// pr($this->session->getSession($CONFIG['SESSION_NAME'],"kodeCapcahMath"));
				if ($_POST['captcha'] == $this->session->getSession($CONFIG['SESSION_NAME'],"kodeCapcahMath"))
				{
				
			
					$time['time'] = '%H:%M:%S';
						//VALIDASI PILIHAN JENISPERUSAHAAN KALO KOSONG
					if($this->_p('jenisperusahaan')=='' || $this->_p('jenisperusahaan')=='Select Choice')
					{//echo "ss";exit;
							$captcha=$this->mathcaptchaHelper->showcaptcha();
							$this->assign('captcha', $captcha);
							$provincy =$this->jobHelper->province();
							$this->assign('provincy', $provincy);
							$password=array('names'=>$this->_p('name'),'lastname'=>$this->_p('lastname'),'email'=>$this->_p('email'),'phone'=>$this->_p('phone'),'jenisperusahaan'=>'Pilih Jenis Perusahaan Anda');
							$this->assign('valmandatory',$password);
							return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/join-ts.html');
					
					}
					$email= strip_tags($this->_p('email'));
					$valid_email = $this->is_valid_email($email);
					$cechkemail=$this->contentHelper->myemailcheck($email);
					if(!$valid_email)
						{
							$captcha=$this->mathcaptchaHelper->showcaptcha();
							$this->assign('captcha', $captcha);
							//pr($password);exit;
							//pr($photo_no);die;
							$provincy =$this->jobHelper->province();
							$this->assign('provincy', $provincy);
							$password=array('names'=>$this->_p('name'),'lastname'=>$this->_p('lastname'),'phone'=>$this->_p('phone'),'no_email'=>'Incorect Email','telp'=>$this->_p('telp'),'name_ts'=>$this->_p('name_ts'),'address'=>$this->_p('address'));
							$this->assign('valmandatory',$password);
							return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/join-ts.html');
						}
					if($cechkemail)
						{
							$captcha=$this->mathcaptchaHelper->showcaptcha();
							$this->assign('captcha', $captcha);
							//pr($password);exit;
							//pr($photo_no);die;
							$provincy =$this->jobHelper->province();
							$this->assign('provincy', $provincy);
							$password=array('names'=>$this->_p('name'),'lastname'=>$this->_p('lastname'),'phone'=>$this->_p('phone'),'no_email'=>'The Email has already been registered!','telp'=>$this->_p('telp'),'name_ts'=>$this->_p('name_ts'),'address'=>$this->_p('address'));
							$this->assign('valmandatory',$password);
							return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/join-ts.html');
						}	
						
					//VALIDASI PASSWORD DAN RE PASSWORD
					$pesan_erorr="";
					if($this->_p('password') != $this->_p('repassword'))
					{
						$pesan_erorr='ada';
					}
					/* $valid_pass=preg_match('/\A(?=[\x20-\x7E]*?[A-Z])(?=[\x20-\x7E]*?[a-z])(?=[\x20-\x7E]*?[0-9])[\x20-\x7E]{6,}\z/', $this->_p('password'));	
					if(!$valid_pass){
					$pesan_erorr='ada';
					} */
					
					if($pesan_erorr)
						{
							$captcha=$this->mathcaptchaHelper->showcaptcha();
							$this->assign('captcha', $captcha);
							$provincy =$this->jobHelper->province();
							$this->assign('provincy', $provincy);
							$password=array('names'=>$this->_p('name'),'lastname'=>$this->_p('lastname'),'email'=>$this->_p('email'),'phone'=>$this->_p('phone'),'no_pass'=>'Incorect Password');
							$this->assign('valmandatory',$password);
							return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/join-ts.html');
						}
					//VALIDASI PILIHAN COORPORATE 
					if($this->_p('jenisperusahaan')=='Coorporate')
					{
					if($this->_p('name_ts') == '')
							{
							$captcha=$this->mathcaptchaHelper->showcaptcha();
							$this->assign('captcha', $captcha);
							
							$provincy =$this->jobHelper->province();
							$this->assign('provincy', $provincy);
							$password=array('names'=>$this->_p('name'),'lastname'=>$this->_p('lastname'),'email'=>$this->_p('email'),'phone'=>$this->_p('phone'),'no_ts'=>' You cannot leave this field empty','telp'=>$this->_p('telp'),'address'=>$this->_p('address'),'city'=>$this->_p('city'));
							$this->assign('valmandatory',$password);
							return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/join-ts.html');
							}
					if($this->_p('telp') == '')
							{
							$captcha=$this->mathcaptchaHelper->showcaptcha();
							$this->assign('captcha', $captcha);
							$provincy =$this->jobHelper->province();
							$this->assign('provincy', $provincy);
							$password=array('names'=>$this->_p('name'),'lastname'=>$this->_p('lastname'),'email'=>$this->_p('email'),'phone'=>$this->_p('phone'),'no_telp'=>' You cannot leave this field empty','name_ts'=>$this->_p('name_ts'),'address'=>$this->_p('address'),'city'=>$this->_p('city'));
							$this->assign('valmandatory',$password);
							return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/join-ts.html');
							}
					if($this->_p('address') == '')
							{
							$captcha=$this->mathcaptchaHelper->showcaptcha();
							$this->assign('captcha', $captcha);
							$provincy =$this->jobHelper->province();
							$this->assign('provincy', $provincy);
							$password=array('names'=>$this->_p('name'),'lastname'=>$this->_p('lastname'),'email'=>$this->_p('email'),'phone'=>$this->_p('phone'),'no_address'=>' You cannot leave this field empty','telp'=>$this->_p('telp'),'name_ts'=>$this->_p('name_ts'),'city'=>$this->_p('city'));
							$this->assign('valmandatory',$password);
							return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/join-ts.html');
							}		
				
					}
					//VALIDASI EMAIL 
				//	pr('sukses');
					$result = $this->registerHelper->saveTS();
					$this->contentHelper->sendaktivasiMail(@$result['id']); 
					if($result){
								sendRedirect($CONFIG['BASE_DOMAIN']."registration/thanksreg");die;
								}
					
					exit;
						
				}else 
				{
					session_destroy();
					echo "<script>alert('Wrong Chaptcha !!!')</script>";
					sendRedirect($CONFIG['BASE_DOMAIN']."registrationts");die;
				
				}
				
				
				
				
				
		}else
				{
					session_destroy();
					echo "<script>alert('Wrong Chaptcha !!!')</script>";
					sendRedirect($CONFIG['BASE_DOMAIN']."registrationts");die;
				}
			

	
		
	}
	function thanksreg(){
		global $LOCALE,$CONFIG; 
		$this->assign('msg', $LOCALE[1]['alert']['register']);
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/thanksregs.html');
		
	}
	
	
	}
?>