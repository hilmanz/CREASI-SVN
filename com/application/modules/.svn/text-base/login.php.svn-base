<?php
class login extends App{
		
	function beforeFilter(){
		$this->loginHelper = $this->useHelper('loginHelper');
		$this->jobHelper = $this->useHelper("jobHelper");
		$this->contentHelper = $this->useHelper('contentHelper');
		$news = $this->contentHelper->listnews();
		$press=  $this->contentHelper->listpress();
		$this->assign('lastnews', $news);
		$this->assign('lastpress', $press);
	}
	
	function main(){
		global $CONFIG,$logger;
		
		$basedomain = $CONFIG['BASE_DOMAIN'];
		// pr( $this->session->getSession($CONFIG['SESSION_NAME'],"jobposttmp"));die;
		$this->assign('basedomain',$basedomain);
		if($this->_p('login'))
		{
			
			if($this->_p('username')&&$this->_p('password')){
			
					$res = $this->loginHelper->loginSession();
					  
					if($res['status']==1){
						// pr($this->session->getSession($CONFIG['SESSION_NAME'],"WEB")->role );die;
						// pr($res);die;
							$this->log('login','welcome');
							$this->assign("msg","login-in.. please wait");
							$this->assign("link","{$CONFIG['BASE_DOMAIN']}{$CONFIG['DINAMIC_MODULE']}");
							$sessiontempfile = @$this->session->getSession($CONFIG['SESSION_NAME'],"jobposttmpfile");
							$sessionuser = @$this->session->getSession($CONFIG['SESSION_NAME'],"WEB");
							// pr($sessionuser);die;
							if($sessiontempfile && $this->session->getSession($CONFIG['SESSION_NAME'],"WEB")->role ==2 )
							{
								//sendRedirect("{$CONFIG['BASE_DOMAIN']}postjobs");
								$this->savepostjobs();
								// die;
								$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmp","");
								$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmpfile","");
									sendRedirect($CONFIG['BASE_DOMAIN']."postjobs/thanksjobs");
									return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
									die();
							}
							else
							{
								
								if($sessionuser->login_count ==0)
								{
									sendRedirect("{$CONFIG['BASE_DOMAIN']}dashboard/welcomeuser");
								}
								else
								{
									sendRedirect("{$CONFIG['BASE_DOMAIN']}dashboard");
								}
							}
							return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
					}
					else
					{
					
						$this->assign("msg",$res['msg']);
					}
				
			}
			else
			{
			
				$this->assign("msg","Your login was unsucccesful. The user name or password provided is incorrect.");
			}
		}
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'logincompany.html');
		
	}
	
	function local(){
		
		global $CONFIG,$logger;
		
		$basedomain = $CONFIG['BASE_DOMAIN'];
		
		$this->assign('basedomain',$basedomain);
		if($this->_p('login'))
		{
			if($this->_p('username')&&$this->_p('password')){
			//pr('ss');exit;
				//captcha 
				// $_captcha = $this->_p('captcha');
				// if(isset($_SESSION['codeBookCaptcha'])){
				// $_valid = (md5($_captcha) == $_SESSION['codeBookCaptcha']) ? true : false;
				// $_SESSION['codeBookCaptcha'] = "bed" . rand(00000000,99999999) . "bed";
				// }else $_valid = false;
				// if($_valid) {
					
					$res = $this->loginHelper->loginSession();
					  
					if($res['status']==1){
						// pr($this->session->getSession($CONFIG['SESSION_NAME'],"WEB")->role );die;
						// pr($res);die;
							$this->log('login','welcome');
							$this->assign("msg","login-in.. please wait");
							$this->assign("link","{$CONFIG['BASE_DOMAIN']}{$CONFIG['DINAMIC_MODULE']}");
							$sessiontempfile = @$this->session->getSession($CONFIG['SESSION_NAME'],"jobposttmpfile");
							$sessionuser = @$this->session->getSession($CONFIG['SESSION_NAME'],"WEB");
							// pr($sessionuser);die;
							if($sessiontempfile && $this->session->getSession($CONFIG['SESSION_NAME'],"WEB")->role ==2 )
							{
								//sendRedirect("{$CONFIG['BASE_DOMAIN']}postjobs");
								$this->savepostjobs();
								// die;
								$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmp","");
								$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmpfile","");
								sendRedirect($CONFIG['BASE_DOMAIN']."postjobs/thanksjobs");
								return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
								die();
							}
							else
							{
								// pr($sessionuser->login_count);die;
								// pr('sdsd');
								 // pr($this->session->getSession($CONFIG['SESSION_NAME'],"WEB")->role );die;
								if($sessionuser->login_count ==0)
								{
									
										sendRedirect("{$CONFIG['BASE_DOMAIN']}dashboard/welcomeuser");
									
									
								}
								else
								{
									sendRedirect("{$CONFIG['BASE_DOMAIN']}dashboard");
								}
							}
							return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
					}
					else
					{
					
						$this->assign("msg",$res['msg']);
					}
				// }
			}
			else
			{
			
				$this->assign("msg","Your login was unsucccesful. The user name or password provided is incorrect.");
			}
		}
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'logincompany.html');
		
	}
	function savepostjobs()
	{
		global $CONFIG,$logger;
		
		// pr('sss');
		$listjob = $this->jobHelper->addjobfromsession();
		// die;
		// die;
		return true;
	}
}
?>
