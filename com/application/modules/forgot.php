<?php
class forgot extends App{
		
	function beforeFilter(){
		global $CONFIG,$LOCALE;
		$this->local=$LOCALE;
		$this->loginHelper = $this->useHelper('loginHelper');
		$this->userHelper = $this->useHelper('userHelper');
		$this->contentHelper = $this->useHelper("contentHelper");
		$basedomain = $CONFIG['BASE_DOMAIN'];
		$this->assign('basedomain',$basedomain);
		$news = $this->contentHelper->listnews();
		$press=  $this->contentHelper->listpress();
		$this->assign('lastnews', $news);
		$this->assign('lastpress', $press);
	}
	
	function main(){
		global $CONFIG,$logger;
		
		$basedomain = $CONFIG['BASE_DOMAIN'];
		// pr($basedomain);die;
		$this->assign('basedomain',$basedomain);
		if($this->_p('submit'))
		{
			if($this->_p('email')){
			 
					$res = $this->contentHelper->forgotMail();
					// pr($res);die;
					if($res['status']==1){
					
							
							sendRedirect("{$CONFIG['BASE_DOMAIN']}forgot/sucsess");
							return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
							$this->assign("msg",'An e-mail has been sent to your email address with further instructions.');
					}
					else
					{
						
						$this->assign("msg",$res['msg']);
						
					}
				
			}
			else
			{
				$this->assign("msg","Sorry, we couldn't find anyone with that email address");
			}
		}
	
			
			return $this->View->toString(TEMPLATE_DOMAIN_WEB .'forgot.html');
		
	}
	function sucsess(){
		global $CONFIG,$logger;
		$basedomain = $CONFIG['BASE_DOMAIN'];
		
		$this->assign('basedomain',$basedomain);
		$this->assign("msg",'An e-mail has been sent to your email address with further instructions.');
		return  $this->View->toString(TEMPLATE_DOMAIN_WEB .'forgotsucsess.html');
	}
	function changepassword(){
		global $CONFIG,$logger;
		$data = $this->_request('data');
		$base64 = urldecode64($data);
		$datacode = unserialize($base64);
		if($datacode['date']!=date('ymd'))
		{
			echo"<script>alert('session change password anda habis')</script>";
			sendRedirect("{$CONFIG['BASE_DOMAIN']}home");
			return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
			die();
		
		}
		$this->assign("data",$data);
		if($this->_p('submit'))
		{
			
			if($this->_p('password')!=$this->_p('confirmpassword'))
			{	
				$this->assign("password",$this->_p('password'));
				$this->assign("msg",$this->local[1]['validation']['confirmpassword']);
				
			}
			// echo"ssss";die;
			$result=$this->userHelper->changepassword2();
			// pr('aaa');
			// pr($result);die;
			if($result['result'])
			{
				
				
				
				$this->Request->setParamPost('username',$datacode['username']);
				
				$res = $this->loginHelper->loginSession(); 
				// pr('sss');
				// pr($res);die;
				if($res){
					// pr($this->session->getSession($CONFIG['SESSION_NAME'],"WEB")->role );die;
					// pr($res);die;
						$this->log('login','welcome');
						$this->assign("msg","login-in.. please wait");
						$this->assign("link","{$CONFIG['BASE_DOMAIN']}{$CONFIG['DINAMIC_MODULE']}");
						$sessiontempfile = @$this->session->getSession($CONFIG['SESSION_NAME'],"jobposttmpfile");
						if($sessiontempfile && $this->session->getSession($CONFIG['SESSION_NAME'],"WEB")->role ==2 )
						{
							sendRedirect("{$CONFIG['BASE_DOMAIN']}postjobs");
						}
						else
						{
							sendRedirect("{$CONFIG['BASE_DOMAIN']}dashboard");
						}
						return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
						die();
				}
				
			}
			
		}
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'changepassword.html');
		
	}
	
	
}
?>
