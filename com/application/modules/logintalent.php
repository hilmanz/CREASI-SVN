<?php
class logintalent extends App{
		
	function beforeFilter(){
		$this->loginHelper = $this->useHelper('loginHelper');
		
	}
	
	function main(){
		$this->local();
	}
	
	function local(){
		
		global $CONFIG,$logger;
		
		$basedomain = $CONFIG['BASE_DOMAIN'];
		
		$this->assign('basedomain',$basedomain);
		
		if($this->_p('username')&&$this->_p('password')){
		//pr('ss');exit;
			//captcha 
			// $_captcha = $this->_p('captcha');
			// if(isset($_SESSION['codeBookCaptcha'])){
			// $_valid = (md5($_captcha) == $_SESSION['codeBookCaptcha']) ? true : false;
			// $_SESSION['codeBookCaptcha'] = "bed" . rand(00000000,99999999) . "bed";
			// }else $_valid = false;
			// if($_valid) {
				$type=1;
				$res = $this->loginHelper->loginSession($type);
				
				if($res){
					
						$this->log('login','welcome');
						$this->assign("msg","login-in.. please wait");
						$this->assign("link","{$CONFIG['BASE_DOMAIN']}{$CONFIG['DINAMIC_MODULE']}");
						sendRedirect("{$CONFIG['BASE_DOMAIN']}personal");
						return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
						die();
				}
			// }
		}
		$this->assign("msg","failed to login..");
			// pr(TEMPLATE_DOMAIN_ADMIN .'login.html');
		print $this->View->toString(TEMPLATE_DOMAIN_WEB .'login.html');
		exit;
	}
}
?>