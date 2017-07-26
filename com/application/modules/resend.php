<?php
class resend extends App{
		
	function beforeFilter(){
		$this->loginHelper = $this->useHelper('loginHelper');
		$this->contentHelper = $this->useHelper('contentHelper');
		//$this->contentHelper = $this->useHelper('contentHelper');
		$news = $this->contentHelper->listnews();
		$press=  $this->contentHelper->listpress();
		$this->assign('lastnews', $news);
		$this->assign('lastpress', $press);
	}
	
	function main(){
			global $CONFIG,$logger;
		
		$basedomain = $CONFIG['BASE_DOMAIN'];
		
		$this->assign('basedomain',$basedomain);
		if($this->_p('submit'))
		{
			if($this->_p('email')){
			
					$res = $this->contentHelper->resendMail();
					
					if($res['status']==1){
					
							sendRedirect("{$CONFIG['BASE_DOMAIN']}resend/sucsess");
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
	
			// pr(TEMPLATE_DOMAIN_ADMIN .'login.html');
			return  $this->View->toString(TEMPLATE_DOMAIN_WEB .'resend.html');
	
		
	}
	function send(){
		Echo"email terkirim";die;
		$this->local();
	}
	function sucsess(){
		global $CONFIG,$logger;
		$basedomain = $CONFIG['BASE_DOMAIN'];
		
		$this->assign('basedomain',$basedomain);
		$this->assign("msg",'An e-mail has been sent to your email address with further instructions.');
		return  $this->View->toString(TEMPLATE_DOMAIN_WEB .'resendsucsess.html');
	}
	function local(){
		
		global $CONFIG,$logger;
		
		$basedomain = $CONFIG['BASE_DOMAIN'];
		
		$this->assign('basedomain',$basedomain);
		if($this->_p('submit'))
		{
			if($this->_p('email')){
			
					$res = $this->contentHelper->resendMail();
					
					if($res['status']==1){
					
							sendRedirect("{$CONFIG['BASE_DOMAIN']}dashboard");
							return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
					}
					else
					{
						
						$this->assign("msg",$res['msg']);
						
					}
				
			}
		}
	
			// pr(TEMPLATE_DOMAIN_ADMIN .'login.html');
			return $this->View->toString(TEMPLATE_DOMAIN_WEB .'resend.html');
		// exit;
		
	}
}
?>