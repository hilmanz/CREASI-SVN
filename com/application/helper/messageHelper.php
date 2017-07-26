<?php
class messageHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	

	function inbox(){
	//pr('ss');exit;
			$usertonya="imam";
			$query="select * from my_inbox where `to`='{$usertonya}' ORDER BY id DESC";
			$get_pesan= $this->apps->fetch($query,1);
			return $get_pesan; 
			//pr($get_pesan);exit;
		}	
	function selectdata(){
	//pr('ss');exit;
			$inactive=@$_POST['incative'];
			if($inactive)
			{
			$idnya=$_POST['idnya'];
			$update_status="update my_inbox set `n_status`='1' where `id`='{$idnya}' limit 1";
			$this->apps->query($update_status);
			$query="select * from my_inbox where `id`='{$idnya}' limit 1";
			$get_pesan= $this->apps->fetch($query,1);
			}else{
			$idnya=$_POST['idnya'];
			$query="select * from my_inbox where `id`='{$idnya}' limit 1";
			$get_pesan= $this->apps->fetch($query,1);
			
			}
			return $get_pesan; 
			//pr($get_pesan);exit;
		}	
		
}
	