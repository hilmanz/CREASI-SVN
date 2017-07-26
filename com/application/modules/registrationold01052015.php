<?php
class registration extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 

		$this->registerHelper = $this->useHelper("registerHelper");
		$this->categoryHelper = $this->useHelper("categoryHelper");
		$this->contentHelper = $this->useHelper("contentHelper");
		$this->mathcaptchaHelper = $this->useHelper("mathcaptchaHelper");
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);

		
	}

	 
	function main(){
		global $LOCALE,$CONFIG; 
		$category = $this->categoryHelper->listcategory();
		$provincy =$this->registerHelper->province();
		$captcha=$this->mathcaptchaHelper->showcaptcha();
		
		// pr(date('m'));die;
		$time['time'] = '%H:%M:%S';
		$this->assign('category', $category);
		$this->assign('month', date('m'));
		$this->assign('date', date('d'));
		$this->assign('year', date('Y') + 1);
		$this->assign('captcha', $captcha);
		$this->assign('xa', $this->session->getSession($CONFIG['SESSION_NAME'],"kodeCapcahMath"));
		
		$this->assign('provincy', $provincy);
	
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/registration.html');
	
		
	}
	function getSubcategory(){
		
		
		$category = $this->categoryHelper->getSubcategory();
		print_r(json_encode($category));die;
		return $category;
	
		
	}
	function save(){
		global $LOCALE,$CONFIG; 
		$category = $this->categoryHelper->listcategory();
		$provincy =$this->registerHelper->province();
		

		$time['time'] = '%H:%M:%S';
		$name=$this->_p('name');
		$nickname=$this->_p('nickname');
		$ages=$this->_p('ages');
		$gender=$this->_p('gender');
		$Date_Month=$this->_p('Date_Month');
		$Date_Day=$this->_p('Date_Day');
		$Date_Year=$this->_p('Date_Year');
		$email=$this->_p('email');
		$emailval=$this->is_valid_email(strip_tags($email));
		$phone=$this->_p('phone');
		$province=$this->_p('province');
		$city=$this->_p('city');
		$password=$this->_p('password');
		$passwordc=$this->_p('passwordc');
		//guardian
		$namaparent=$this->_p('namaparent');
		$parentmonth=$this->_p('parentmonth');
		$parentdate=$this->_p('parentdate');
		$parentyear=$this->_p('parentyear');
		$phoneparent=$this->_p('phoneparent');
		$identiasparent=$this->_p('identiasparent');
		$alamatparent=$this->_p('alamatparent');
		$emailparent=$this->_p('emailparent');
		$emailparentval=$this->is_valid_email(strip_tags($emailparent));
		$captchavalue=$this->_p('captchavalue');
		
		
		$name_no="";
		$nickname_no="";
		$ages_no="";
		$gender_no="";
		$Date_Month_no='';
		$Date_Day_no='';
		$Date_Year_no='';
		$email_no='';
		$phone_no='';
		$province_no='';
		$city_no='';
		$password_no='';
		$passwordc_no='';
		$captchavalue_no='';
		
		//guardian
		$namaparent_no="";
		$parentdate_no="";
		$parentmonth_no="";
		$parentyear_no="";
		$phoneparent_no="";
		$identiasparent_no="";
		$alamatparent_no="";
		$emailparent_no="";
		
		
		
		$pesanError="";
		
		if($name=='')
		{
			$name_no="You cannot leave this field empty";
			$pesanError="ada";
		}
		if($nickname=='')
		{
			$nickname_no="You cannot leave this field empty";
			$pesanError="ada";
		}
		if($Date_Month=='')
		{
			$Date_Month_no="You cannot leave this field empty";
			$pesanError="ada";
		}
		if($Date_Day=='')
		{
			$Date_Day_no="You cannot leave this field empty";
			$pesanError="ada";
		}
		if($Date_Year=='')
		{
			$Date_Year_no="You cannot leave this field empty";
			$pesanError="ada";
		}
		if($email=='' || !$emailval)
		{
			$email_no="You cannot leave this field empty";
			$pesanError="ada";
		}
		if($phone=='')
		{
			$phone_no="You cannot leave this field empty";
			$pesanError="ada";
		}
		if($password=='')
		{
			$password_no="You cannot leave this field empty";
			$pesanError="ada";
		}
		
		if($this->_p('captchavalue') != $this->session->getSession($this->config['SESSION_NAME'],"kodeCapcahMath"))
		{
			$captchavalue_no="You cannot leave this field empty";
			$pesanError="ada";
		
		}
		
		
		
		if($ages<18)
		{
			if($namaparent=='')
			{
				$namaparent_no="You cannot leave this field empty";
				$pesanError="ada";
			}
			if($parentdate=='')
			{
				$parentdate_no="You cannot leave this field empty";
				$pesanError="ada";
			}
			if($parentmonth=='')
			{
				$parentmonth_no="You cannot leave this field empty";
				$pesanError="ada";
			}
			if($parentyear=='')
			{
				
				$parentyear_no="You cannot leave this field empty";
				$pesanError="ada";
			}
			if($phoneparent=='')
			{
				$phoneparent_no="You cannot leave this field empty";
				$pesanError="ada";
			}
			if($email=='' || !$emailparentval)
			{
				$emailparent_no="You cannot leave this field empty";
				$pesanError="ada";
			}
			if($identiasparent=='')
			{
				$identiasparent_no="You cannot leave this field empty";
				$pesanError="ada";
			}
			if($alamatparent=='')
			{
				$alamatparent_no="You cannot leave this field empty";
				$pesanError="ada";
			}
			
		
		}
		
		if($pesanError)
		{
			
			
			$this->assign('name', $name);
			$this->assign('name_no', $name_no);
			$this->assign('nickname', $nickname);
			$this->assign('nickname_no', $nickname_no);
			$this->assign('ages', $ages);
			$this->assign('ages_no', $ages_no);
			$this->assign('gender', $gender);
			$this->assign('gender_no', $gender_no);
			$this->assign('Date_Month', $Date_Month);
			$this->assign('Date_Month_no', $Date_Month_no);
			$this->assign('Date_Day', $Date_Day);
			$this->assign('Date_Day_no', $Date_Day_no);
			$this->assign('Date_Year', $Date_Year);
			$this->assign('Date_Year_no', $Date_Year_no);
			$this->assign('email', $email);
			$this->assign('email_no', $email_no);
			$this->assign('phone', $phone);
			$this->assign('phone_no', $phone_no);
			$this->assign('province', $province);
			$this->assign('province_no', $province_no);
			$this->assign('city', $city);
			$this->assign('city_no', $city_no);
			$this->assign('password', $password);
			$this->assign('password_no', $password_no);
			$this->assign('passwordc', $passwordc);
			$this->assign('passwordc_no', $passwordc_no);
			$this->assign('captchavalue', $captchavalue);
			$this->assign('captchavalue_no', $captchavalue_no);
			
			
			
			$this->assign('namaparent', $namaparent);
			$this->assign('namaparent_no', $namaparent_no);
			$this->assign('parentdate', $parentdate);
			$this->assign('parentdate_no', $parentdate_no);
			$this->assign('parentmonth', $parentmonth);
			$this->assign('parentmonth_no', $parentmonth_no);
			$this->assign('parentyear', $parentyear);
			$this->assign('parentyear_no', $parentyear_no);
			$this->assign('phoneparent', $phoneparent);
			$this->assign('phoneparent_no', $phoneparent_no);
			$this->assign('identiasparent', $identiasparent);
			$this->assign('identiasparent_no', $identiasparent_no);
			$this->assign('alamatparent', $alamatparent);
			$this->assign('alamatparent_no', $alamatparent_no);
			$this->assign('emailparent', $emailparent);
			$this->assign('emailparent_no', $emailparent_no);
			// pr(date('m'));die;
			$captcha=$this->mathcaptchaHelper->showcaptcha();
			$time['time'] = '%H:%M:%S';
			$this->assign('category', $category);
			$this->assign('month', date('m'));
			$this->assign('date', date('d'));
			$this->assign('year', date('Y')+1);
			$this->assign('captcha', $captcha);
			$this->assign('provincy', $provincy);
			return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/registration.html');
		
		}
		
		$result = $this->registerHelper->save();
		
			// die;
			if($result['status']==1)
			{
			
				$resultcategory = $this->registerHelper->addcategory($result['id']);
				
				$this->registerHelper->savenotification(0,$result['id']);
					$this->contentHelper->sendaktivasiMail($result['id']);
				
				sendRedirect($CONFIG['BASE_DOMAIN']."registration/thanksreg");
				return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
			}
		exit;
		
		$captcha=$this->mathcaptchaHelper->showcaptcha();
		
		// pr(date('m'));die;
		$time['time'] = '%H:%M:%S';
		$this->assign('category', $category);
		$this->assign('month', date('m'));
		$this->assign('date', date('d'));
		$this->assign('year', date('Y')+1);
		$this->assign('captcha', $captcha);
		$this->assign('provincy', $provincy);
	
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/registration.html');
	
		
	}
	function test(){
		

		$result = $this->registerHelper->test();
	
		
	}
	function sendemail(){
		

		$result = 	$this->contentHelper->sendGlobalMail();
	
		
	}
	function infonya(){
		echo phpinfo();die;
	}
	function ajaxcity(){
		
		$provincy =$this->registerHelper->city();
		if($provincy)
		{
			print_r(json_encode(array('status'=>1,'msg'=>'succses get city','data'=>$provincy)));die;
		}
		
		print_r(json_encode(array('status'=>0,'msg'=>'problem get city','data'=>$provincy)));die;
	
		
	}
	function activation(){
			//global $LOCALE,$CONFIG; 
			echo"ssss";die;
		$result = $this->registerHelper->activation();
		if($result);
		{
			
			$result= $this->contentHelper->sendaktivasiendMail();
			sendRedirect($CONFIG['BASE_DOMAIN']."login");
			return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
		}
		
	}
	function thanksreg(){
		global $LOCALE,$CONFIG; 
		$this->assign('msg', $LOCALE[1]['alert']['register']);
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/thanksregs.html');
		
	}
	}
?>