<?php
class contactusHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	

	
	function addcontact_us(){
		global $CONFIG;
		//pr($_POST);exit;
		$name = strip_tags($this->apps->_p('name'));       
		$email =  strip_tags($this->apps->_p('email'));  
		$message = $_POST['message'];  
		$subject = $_POST['subject'];  
		$date =  date('Y-m-d H:i:s'); 
		//pr($startdate);exit;
		
		
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.contact_us (`name`, `email`,`subject`,`message`,`date`) 
							VALUES ('{$name}', '{$email}', '{$subject}', '{$message}','{$date}')";
			// pr($sql);die;	  	
		$res = $this->apps->query($sql);
	
		return true;
		}
	
		
}
	