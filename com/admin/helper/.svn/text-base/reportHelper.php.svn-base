<?php 

class reportHelper {

	function __construct($apps){
		global $CONFIG,$logger;
		$this->logger = $logger;
		$this->apps = $apps;
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);

		$this->dbshemaWeb =$CONFIG['DATABASE'][0]['DATABASE'];	
		$this->dbshema =$CONFIG['DATABASE'][0]['DATABASE'];	
	}

	function listreport($start=null,$limit=1){
		global $CONFIG;
		
		$rs['result'] = false;
		$rs['total'] = 0;		

		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
		
		$sql = "SELECT COUNT(1) total 
				FROM gm_report "; 
		$total = $this->apps->fetch($sql);		
		if(intval($total['total'])<=$limit) $start = 0;
				
		$sql = "SELECT *,DATE_FORMAT(`date`,'%Y-%m-%d') as tanggal
				FROM gm_report
				WHERE 1 LIMIT {$start}, {$limit}";
		// pr($sql);die;
		$rsut = $this->apps->fetch($sql,1);		
		
		if(!$rsut){ return false;} 
		$no = 1;
		if( $start>0)
		{
			$no = $start+1;
		}
		foreach ($rsut as $key => $val){
			
			$rsut[$key]['no'] = $no++;
		}
		$rs['status'] = true;
		$rs['result'] = $rsut;
		$rs['total'] = intval($total['total']); 
		return $rs; 		
	}
	
	
	
}

?>

