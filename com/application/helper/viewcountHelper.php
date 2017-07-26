<?php
class viewcountHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	

	
			
	function personalviewcount(){
		global $CONFIG;
		$id = intval($this->apps->_request('id'));
		$array=array();
			// setcookie("personal","");die;
		if(@$_COOKIE['personal'])
		{
			
			$tmp= unserialize($_COOKIE['personal']);
			if(in_array($id,unserialize($_COOKIE['personal'])))
			{
				return true;
			}
			else
			{
				
				array_push($tmp,$id);
				$arry=serialize($tmp);
				setcookie("personal", $arry);
				
				
				$sql = "UPDATE {$CONFIG['DATABASE'][0]['DATABASE']}.social_member
				SET view_count=view_count+1 WHERE id='{$id}'
				";
				
				$res = $this->apps->query($sql);
				
				return true;
			}
		}
		else
		{
			
			$array[]=$id;
			$arry=serialize($array);
			setcookie("personal", $arry);
			
			
			$sql = "UPDATE {$CONFIG['DATABASE'][0]['DATABASE']}.social_member
				SET view_count=view_count+1 WHERE id='{$id}'
			";
			
			$res = $this->apps->query($sql);
			
			return true;
		}
		
		return true;
		
		}		
	function jobviewcount(){
		global $CONFIG;
		$id = intval($this->apps->_request('id'));
		$array=array();
		
			// setcookie("personal","");die;
		if(@$_COOKIE['jobs'])
		{
			
			$tmp= unserialize($_COOKIE['jobs']);
			if(in_array($id,unserialize($_COOKIE['jobs'])))
			{
				array_push($tmp,$id);
				$arry=serialize($tmp);
				setcookie("jobs", $arry);
				$sql = "UPDATE {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard
				SET view_count=view_count+1 WHERE id_job='{$id}'
				";
				//pr($sql);exit;
				$res = $this->apps->query($sql);
				return true;
			}
			else
			{
				
			return true;
			}
		}
		else
		{
			
			$array[]=$id;
			$arry=serialize($array);
			setcookie("jobs", $arry);
			
			
			$sql = "UPDATE {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard
				SET view_count=view_count+1 WHERE id_job='{$id}'
			";
			
			$res = $this->apps->query($sql);
			
			return true;
		}
		
		return true;
		
		}		
	function portofolioviewcount($id){
		global $CONFIG;
		$array=array();
			// setcookie("personal","");die;
			// pr($_COOKIE['portofolio']);
		if(@$_COOKIE['portofolio']!='b:0;')
		{
			// pr($_COOKIE['portofolio']);die;
			$tmp= unserialize($_COOKIE['portofolio']);
			if(in_array($id,unserialize($_COOKIE['portofolio'])))
			{
				return true;
			}
			else
			{
				
				array_push($tmp,$id);
				$arry=serialize($tmp);
				setcookie("portofolio", $arry);
				
				
				$sql = "UPDATE {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio
				SET view_count=view_count+1 WHERE id='{$id}'
				";
				// pr($sql);
				$res = $this->apps->query($sql);
				
				return true;
			}
		}
		else
		{
			
			$array=$id;
			// pr($array);
			$arry=serialize($array);
			setcookie("portofolio", $arry);
			
			
			$sql = "UPDATE {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio
				SET view_count=view_count+1 WHERE id='{$id}'
			";
			// pr($sql);
			$res = $this->apps->query($sql);
			
			return true;
		}
		
		return true;
	
	
	
		
	}	
	
	protected function encrypt($string)
	{	
		$ENC_KEY='youknowwho2014';
		return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($ENC_KEY), $string, MCRYPT_MODE_CBC, md5(md5($ENC_KEY))));
	}
	protected function decrypt($encrypted)
	{
		$ENC_KEY='youknowwho2014';
		return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($ENC_KEY), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($ENC_KEY))), "\0");
	}
}
	