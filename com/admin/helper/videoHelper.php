<?php
class videoHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	
	
	
	

	function listvideo($start=null,$limit=10)
	{
		global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
	  
		
		$search = strip_tags($this->apps->_p('search'));
		
		$startdate = $this->apps->_p('startdate');
		$enddate = $this->apps->_p('enddate');
		
		//RUN FILTER
		$filter = "";
		$filter = $search=="Search..." ? "" : "AND title_video LIKE '%{$search}%' ";
		//$filter .= $enddate ? " AND postdate < '{$enddate}'" : "";
		
		//GET TOTAL
		$sql = "SELECT count(*) total
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_video			
			WHERE 1 and n_status!='3' {$filter}";
		$total = $this->apps->fetch($sql);		
		
		if(intval($total['total'])<=$limit) $start = 0;
		
		//GET LIST
		$sql = "
			SELECT *
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_video 
			WHERE 1 and n_status!='3' {$filter}
			ORDER BY id_video  DESC LIMIT {$start},{$limit}"; 
	
		$rqData = $this->apps->fetch($sql,1);
		
		if($rqData) {
			$no = $start+1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				$rqData[$key] = $val;

				$sql = "SELECT COUNT(*) total_data
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.gallery
						WHERE 1 and n_status!=3";
				// if($val['ownerid']==47){
				// 	pr($sql);
				//  	pr(intval($this->apps->fetch($sql)));exit;
				//  }
				$total_data = $this->apps->fetch($sql);
				$rqData[$key]['total_data'] = intval($total_data['total_data']);
			}
			//pr($rqData);exit;
			if($rqData) $qData=	$rqData;
			else $qData = false;
		} else $qData = false;
		
		$result['result'] = $qData;
		
		$result['result'] = $qData;
		
		
		$result['total'] = intval($total['total']);
		//pr($result);exit;
		return $result;
	}
	
	function addvideo($filephoto=null){
		global $CONFIG;
	
		$title = strip_tags($this->apps->_p('title'));       
		$caption = strip_tags($this->apps->_p('caption'));  
		$video_url = strip_tags($this->apps->_p('video_url'));
		$id_video_youtube = '';		
		if($video_url)
		{
			preg_match(
					'/[\\?\\&]v=([^\\?\\&]+)/',
					$video_url,
					$matches
				);
				if($matches[1])
				{
					$id_video_youtube = $matches[1];
				}
		}
		
		
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.my_video (`title_video`, `caption`,`url_video`,`id_video_youtube`,`date`,`n_status`) 
							VALUES ('{$title}', '{$caption}', '{$video_url}','{$id_video_youtube}',now(),1)";
		//pr($sql);exit;		  	
		$res = $this->apps->query($sql);
		return $res;
		}
	
	function selectupdatedata($id){
		global $CONFIG;
	
		//pr($startdate);exit;
		
		
		$sql = "SELECT *
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_video
			WHERE id_video='{$id}'";
		$res = $this->apps->fetch($sql);
		
		
		return $res;
		}
		
	function editvideo($id){
		global $CONFIG;
	
		$title = strip_tags($this->apps->_p('title'));       
		$caption = strip_tags($this->apps->_p('caption'));  
		$video_url = strip_tags($this->apps->_p('video_url'));
		$id_video_youtube = '';		
		if($video_url)
		{
			preg_match(
					'/[\\?\\&]v=([^\\?\\&]+)/',
					$video_url,
					$matches
				);
				if($matches[1])
				{
					$id_video_youtube ="`id_video_youtube`='{$matches[1]}',";
				}
		}
		
		$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.my_video set 
			`title_video`='{$title}',
			`caption`='{$caption}',
			`url_video`='{$video_url}',
			{$id_video_youtube}
			`date`=NOW()
			where id_video='{$id}'";
			  	
		$res = $this->apps->query($sql);
		return $res;
		}	
	function deletevideo($id){
		global $CONFIG;
		
		$sql = "UPDATE   {$CONFIG['DATABASE'][0]['DATABASE']}.my_video set n_status='3' where id_video={$id}";
		//pr($sql);exit;
				  	
		$res = $this->apps->query($sql);
		return $res;
		}		
		
}
	