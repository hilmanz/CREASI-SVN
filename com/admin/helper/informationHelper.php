<?php
class informationHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	
	function selectdata($id){
	global $CONFIG;
	
		$sql = "SELECT *
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_info 
			WHERE id='{$id}' ";
		//pr($sql);exit;
		$resnya = $this->apps->fetch($sql);		
		return $resnya;
	
	}
	function updatedata(){
	global $CONFIG;
	
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.my_info 
			set `info`='{$_POST['address']}' WHERE id='{$this->apps->_p('id')}' ";
		//pr($sql);exit;
		$resnya = $this->apps->query($sql);		
		return true;
	
	}
	function listinfo($start=null,$limit=10)
	{
		global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
		$search = strip_tags($this->apps->_p('search'));
		$notiftype = intval($this->apps->_p('notiftype'));
		
		$startdate = $this->apps->_p('startdate');
		$enddate = $this->apps->_p('enddate');
		
		//RUN FILTER
		$filter = "";
		$filter = $search=="Search..." ? "" : "AND (name LIKE '%{$search}%' )";
		
		$filter .= $startdate ? " AND postdate >= '{$startdate}'" : "";
		$filter .= $enddate ? " AND postdate < '{$enddate}'" : "";
		
		//GET TOTAL
		$sql = "SELECT count(*) total
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_info 
			WHERE 1 ";
		$total = $this->apps->fetch($sql);		
		
	
		if(intval($total['total'])<=$limit) $start = 0;
		
		//GET LIST
		$sql = "
			SELECT *,DATE_FORMAT(date,'%d-%m-%Y %H:%i') as date
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_info
			ORDER BY id DESC LIMIT {$start},{$limit}"; 
		// pr($sql);die;
		$rqData = $this->apps->fetch($sql,1);

		if($rqData) {
			$no = $start+1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				$rqData[$key] = $val;
				$rqData[$key]['info']=strip_tags($val['info']);

			}
			//pr($rqData);exit;
			if($rqData) $qData=	$rqData;
			else $qData = false;
		} else $qData = false;
		
		$result['result'] = $qData;
		$result['total'] = intval($total['total']);

		//pr($result);exit;
		return $result;
	}	
	
}
	
