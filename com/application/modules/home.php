<?php
class home extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 

		$this->contentHelper = $this->useHelper("contentHelper");
		$this->user=$this->session->getSession($this->config['SESSION_NAME'],"WEB");
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		function encrypt($string)
		{	
		$ENC_KEY='youknowwho2014';
		return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($ENC_KEY), $string, MCRYPT_MODE_CBC, md5(md5($ENC_KEY))));
		}
		function decrypt($encrypted)
		{
		$ENC_KEY='youknowwho2014';
		return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($ENC_KEY), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($ENC_KEY))), "\0");
		}
		
	}

	 
	function main(){
		

		$time['time'] = '%H:%M:%S';
		$banner = $this->contentHelper->listbanner();
		$mycategory = $this->contentHelper->mycategory();
		$uidlike=encrypt(@$this->user->id);
		// pr($mycategory);die;
		$listfeaturejobs=  $this->contentHelper->listfeaturejobs();
		$listfeatureuser=  $this->contentHelper->listfeatureuser();
	// pr($listfeatureuser);die;
	$popular = $this->contentHelper->popular();
		//pr($popular);exit;
		$this->assign('popularlist',$popular);
		$this->assign('load', $banner);
		$this->assign('uid', @$this->user->id);
		$this->assign('uidlike', @$uidlike);
		$this->assign('mycategory', $mycategory);
		$this->assign('listfeaturejobs', $listfeaturejobs['result']);
		$this->assign('listfeatureuser', $listfeatureuser['result']);
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/home.html');
	
		
	}
	function migrationprovincy()
	{
		//echo"sss";die;
		$this->contentHelper->migrationprovincy();
	
	}
	function migrationcity()
	{
		//echo"sss";die;
		$this->contentHelper->migrationcity();
	
	}
	function migrationcategory()
	{
		//echo"sss";die;
		$this->contentHelper->migrationcategory();
	
	}
	function migrationsubcategory()
	{
		//echo"sss";die;
		$this->contentHelper->migrationsubcategory();
	
	}
	function testmail()
	{
		$this->Request->setParamPost('userid','119');
		$this->contentHelper->portofolioshare();
	
	}
	}
?>