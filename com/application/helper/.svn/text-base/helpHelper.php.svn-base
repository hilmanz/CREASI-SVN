<?php
class helpHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	

	
	function addhelp(){
		global $CONFIG;
		//pr($_POST);exit;
		$name = strip_tags($this->apps->_p('name'));       
		$email =  strip_tags($this->apps->_p('email'));  
		$message = $_POST['message'];  
		$date =  date('Y-m-d H:i:s'); 
		//pr($startdate);exit;
		
		
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.help (`name`, `email`,`message`,`date`) 
							VALUES ('{$name}', '{$email}', '{$message}','{$date}')";
				  	
		$res = $this->apps->query($sql);
	
		return true;
		}
	function addhelpts(){
		global $CONFIG;
		//pr($_POST);exit;
		$name=strip_tags($this->apps->_p('name'));
		$email=strip_tags($this->apps->_p('email'));
		$subject=$this->apps->_p('subject');
		$message=$this->apps->_p('message');
		
		//pr($startdate);exit;
		
		
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.help 
		(`name`, `email`,`subject`,`message`,`date`)  
		VALUES ('{$name}', '{$email}','{$subject}', '{$message}',NOW())";
		 //pr($sql);exit;
		$res = $this->apps->query($sql);
	
		return true;
		}
	
		
}
	