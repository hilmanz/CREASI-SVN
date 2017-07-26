<?php
class talentSeekerHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	 
	function listtalent($start=null,$limit=20,$sorting=null){
		global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
	  
		// $projectid = intval($this->apps->_g('projects'));
		
	
		
		$sortval="";

		if($sorting!=NULL)
		{
		//pr('ss');exit;
			$sortval="AND nama_perusahaan LIKE '%{$sorting}%'";
		
		}
		
		//GET TOTAL
		$sql = "SELECT count(DISTINCT sm.id) total
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member sm 
			left join tbl_talent_seeker tt on sm.id=tt.user_id   WHERE 1 and sm.role='2' {$sortval} and sm.n_status=1 ";
		$total = $this->apps->fetch($sql);		
		
	
		if(intval($total['total'])<=$limit) $start = 0;
		
		//GET LIST
		$sql = "
			SELECT sm.*,tt.nama_perusahaan
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member sm 
			left join tbl_talent_seeker tt on sm.id=tt.user_id 
			 WHERE 1  and sm.role='2'  {$sortval}  and sm.n_status=1 and tt.privacy=1 group by sm.id 
			LIMIT {$start},{$limit}
				
	"; //pr($sql);exit;
	 //pr($sql);
		$rqData = $this->apps->fetch($sql,1);

		if($rqData) {
			$no = $start+1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				$rqData[$key] = $val;

				$sql = "SELECT COUNT(*) total_data
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member
						WHERE 1";
			
				$total_registrant = $this->apps->fetch($sql);
				
				$rqData[$key]['total'] = intval($total_registrant['total_data']);
				//pr($rqData[$key]['total']);exit;
			}
			//pr($rqData);exit;
			if($rqData) $qData=	$rqData;
			else $qData = false;
		} else $qData = false;
		
		$result['result'] = $qData;
		$result['total'] = intval($total['total']);
	//	pr($result);exit;
		return $result;
		}
					
	
		
}
	
