<?php
class chatingHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	
	
	
	

	function listchating()
	{
		global $CONFIG;
	//pr($_POST);exit;
		$message=$this->apps->_p('message');
		$sql = "
			INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.chating 
			set pesan='{$message}' "; 
	//	pr($sql);exit;
		$rqData = $this->apps->query($sql);

	//GET LIST
		$sql = "
			SELECT *
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.chating 
			WHERE 1 ORDER BY id DESC
			
				
	"; 
	//	pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);

		if($rqData) {
			$no = 1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				$rqData[$key] = $val;
				}
				$total_registrant = $this->apps->fetch($sql);
		
			}
			//pr($rqData);exit;
			if($rqData) $qData=	$rqData;
			else $qData = false;
	
		
		$result['result'] = $qData;
	
		//pr($result);exit;
		return $result;
	}
	

}
	