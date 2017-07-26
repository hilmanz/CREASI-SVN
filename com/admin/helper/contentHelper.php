<?php
class contentHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	
	
	
	function listnews($start=null,$limit=10)
	{
		global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		$result['status'] = 0;
		
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
	  
		// $projectid = intval($this->apps->_g('projects'));
		
		
		$notiftype = intval($this->apps->_p('notiftype'));
		// $publishedtype = intval($this->apps->_p('publishedtype'));
		$startdate = $this->apps->_p('startdate');
		$enddate = $this->apps->_p('enddate');
		$search =$this->apps->_request('search');
		$searchtitle =$this->apps->_request('searchtitle');
		$sorting=$this->apps->_request('sorting');
		$qsorting='';
		$wSearchtitle='';
			$wstartdate='';
			$wenddate='';
		
		
		
		if($sorting or $search)
		{
			$qsorting=" and category='{$sorting}{$search}' ";
		}
		if($searchtitle)
			{
				$wSearchtitle="and title like '%{$searchtitle}%' ";
			}
		if($startdate)
			{
				if($enddate)
				{
					$startdate =date("Y-m-d",strtotime($startdate));
					$wstartdate="and DATE(`date`) >=DATE('{$startdate}') ";
				}
				else
				{
					
					$wstartdate="and DATE_FORMAT(`date`,'%d-%m-%Y') ='{$startdate}'";
				}
				//$wstartdate="and DATE_FORMAT(`date`,'%d-%m-%Y') >='{$startdate}' ";
			}
			if($enddate)
			{
				$enddate =date("Y-m-d",strtotime($enddate));
				$wenddate="and DATE(`date`) <= DATE('{$enddate}') ";
			}
		
		//GET TOTAL
		$sql = "SELECT count(*) total
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.news 
			WHERE 1 {$wSearchtitle} {$wstartdate} {$wenddate} and n_status !=2 {$qsorting}";
		$total = $this->apps->fetch($sql);		
		
	//spr($sql);exit;
		if(intval($total['total'])<=$limit) $start = 0;
		
		//GET LIST
		$sql = "
			SELECT *,DATE_FORMAT(date,'%d-%m-%Y %H:%i ') as date
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.news 
			WHERE 1 {$wSearchtitle} {$wstartdate} {$wenddate} and n_status !=2 {$qsorting}
			ORDER BY id DESC LIMIT {$start},{$limit}
				
	"; 
		// pr($sql);exit;  
		$rqData = $this->apps->fetch($sql,1);

		if($rqData) {
			$no = $start+1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				$rqData[$key] = $val;

				$sql = "SELECT COUNT(*) total_data
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.news
						WHERE 1 {$wSearchtitle} {$wstartdate} {$wenddate} and n_status !=2 ";
				// if($val['ownerid']==47){
				// 	pr($sql);
				//  	pr(intval($this->apps->fetch($sql)));exit;
				//  }
				$total_registrant = $this->apps->fetch($sql);
				$rqData[$key]['total_registrant'] = intval($total_registrant['total_data']);
			}
			
			if($rqData) 
			{
				$qData=	$rqData;
				$result['status'] = 1;
			
			}
			else 
			{
				$qData = false;
			}
		} else $qData = false;
		
		$result['result'] = $qData;
		$result['total'] = intval($total['total']);
		//pr($result);exit;
		return $result;
	}	
	function getnews()
	{
		$id=$this->apps->_g('idcontent');
		$sql = "
			SELECT *,DATE_FORMAT(date,'%d-%m-%Y %H:%i') as date
			FROM news 
			WHERE id={$id}
			"; 
		// pr($sql);exit;
		$rqData = $this->apps->fetch($sql);
		return $rqData;
	}
	function getcountnotif()
	{
		
		$sql = "
			SELECT count(*) as total
			FROM gm_notifikasi where n_status=1
		
			"; 
		// pr($sql);exit;
		$rqData = $this->apps->fetch($sql);
		return $rqData;
	}
	function listfaq()
	{
		global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		
		//GET LIST
		$sql = "
			SELECT *,DATE_FORMAT(date,'%d-%m-%Y %H:%i') as date
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_faq 
			WHERE 1 and n_status='1'
			ORDER BY id "; 
		
		$rqData = $this->apps->fetch($sql,1);
		if($rqData)
			{
				
				$no = 1;
				foreach($rqData as $key => $val){
					$val['no'] = $no++;
					$rqData[$key] = $val;
				}
				$qData=	$rqData;
			}
		else
			{
				$qData = false;
			}
		
		$result['result'] = $qData;
		
		
		return $result;
	}	
	function selectupdatedatafaq()
	{
		global $CONFIG;
		
		
		$id = intval($this->apps->_request('id'));
		//GET LIST
		$sql = "
			SELECT *,DATE_FORMAT(date,'%d-%m-%Y %H:%i') as date
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_faq 
			WHERE 1 and id='{$id}'
			ORDER BY id "; 
		
		$rqData = $this->apps->fetch($sql);
		if($rqData)
			{
				$qData=	$rqData;
			}
		else
			{
				$qData = false;
			}
		
		$result = $qData;
		
		
		return $result;
	}	
	function addnews($images=''){
		global $CONFIG;
		//pr($_POST);exit;
		$title = strip_tags(@$this->apps->_p('title'));       
		$description = @$_POST['description'];  
		$category =strip_tags(@$_POST['category']); 
		$caption = @$_POST['caption'];  
		$link = @$_POST['url']; 
		$source = $this->apps->_p('source');
		if($category==1 || $category==2)
		{
			$link = @$_POST['urlperss']; 
			$source= $this->apps->_p('sourcepress');
		}
		if($link)
		{
			$link= str_replace('http://','',$link);
		}
		$startdate =  date('Y-m-d H:i:s'); 
		//pr($startdate);exit;
		
		// pr($_POST);
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.news (`title`,`caption`,`category`, `description`,`images`,`link`,`date`,`n_status`) 
							VALUES ('{$title}', '{$source}','{$category}', '{$description}','{$images}','{$link}','{$startdate}',0)";
		// pr($sql);die;
		$res = $this->apps->query($sql);
		
		return true;
		}	
	function addfaq(){
			global $CONFIG;
			//pr($_POST);exit;
			$title = strip_tags(@$this->apps->_p('title'));       
			$description = @$_POST['description'];  
			
			$startdate =  date('Y-m-d H:i:s'); 
			//pr($startdate);exit;
			
			
			$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_faq (`title`,`description`,`date`,`n_status`) 
								VALUES ('{$title}', '{$description}','{$startdate}',1)";
						
			$res = $this->apps->query($sql);
			
			return true;
		}	
	function deletefaq($id){
		global $CONFIG;

		$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_faq set `n_status`='2' where id={$id}";
		//pr($sql);exit;
				  	
		$res = $this->apps->query($sql);
		return $res;
		}
	function deletecontent(){
		global $CONFIG;
		$id=$this->apps->_g('idcontent');
		$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.news set `n_status`='2' where id={$id}";
		// pr($sql);exit;
				  	
		$res = $this->apps->query($sql);
		return $res;
		}

	function editfaq(){
		global $CONFIG;
		$id = strip_tags($this->apps->_p('id'));  
		$title = strip_tags($this->apps->_p('title'));       
		$description = $_POST['description'];  
		
		//pr($startdate);exit;
		
		
		$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_faq set 
					`title`='{$title}',
					`description`='{$description}'
					 where id={$id}";
		// pr($sql);exit;
				  	
		$res = $this->apps->query($sql);
		return $res;
		}	
	function editcontent($file=''){
		global $CONFIG;
		// pr($_POST);exit;
		$id = strip_tags($this->apps->_p('id'));  
		$title = strip_tags(@$this->apps->_p('title'));       
		$description = @$_POST['description'];  
		$category =strip_tags(@$_POST['category']); 
		$caption = @$_POST['caption'];  
		$source = $this->apps->_p('source');
		$link = @$_POST['urlnews']; 
		if($category==1)
		{
			$link = @$_POST['url']; 
		}
		if($link)
		{
			$link= str_replace('http://','',$link);
		}
		$startdate =  date('Y-m-d H:i:s'); 
		$qimages='';
		if($file)
		{
			$qimages="`images`='{$file}',";
		
		}
		//pr($startdate);exit;
		
		
		// $sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.news (`title`,`caption`,`category`, `description`,`images`,`link`,`date`,`n_status`) 
							// VALUES ('{$title}', '{$caption}','{$category}', '{$description}','{$images}','{$link}','{$startdate}',0)";
				  	// pr($sql);
		// $res = $this->apps->query($sql);
		// pr($_POST);
		
		$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.news set 
					`title`='{$title}',
					`caption`='{$source}',
					`category`='{$category}',
					`description`='{$description}',
					{$qimages}
					`link`='{$link}'
					 where id={$id}";
		// pr($sql);exit;
				  	
		$res = $this->apps->query($sql);
		return $res;
		}	
}
	
