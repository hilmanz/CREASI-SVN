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
	
	
	
	function listnews($start=null,$limit=20)
	{
		global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
	  
		// $projectid = intval($this->apps->_g('projects'));
		
		$search = strip_tags($this->apps->_p('search'));
		$notiftype = intval($this->apps->_p('notiftype'));
		// $publishedtype = intval($this->apps->_p('publishedtype'));
		$startdate = $this->apps->_p('startdate');
		$enddate = $this->apps->_p('enddate');
		
		//RUN FILTER
		$filter = "";
		$filter = $search=="Search..." ? "" : "AND (name LIKE '%{$search}%' )";
		// $filter .= $notiftype!=0 ? " AND notiftype = {$notiftype}" : " AND notiftype = 3";
		// $filter .= $publishedtype ? "AND n_status = {$publishedtype}" : " AND n_status != 3";
		$filter .= $startdate ? " AND postdate >= '{$startdate}'" : "";
		$filter .= $enddate ? " AND postdate < '{$enddate}'" : "";
		
		//GET TOTAL
		$sql = "SELECT count(*) total
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.news 
			WHERE 1 and n_status !=2 ";
		$total = $this->apps->fetch($sql);		
		
	//pr($sql);exit;
		if(intval($total['total'])<=$limit) $start = 0;
		
		//GET LIST
		$sql = "
			SELECT *,DATE_FORMAT(date,'%d/%m/%Y %h:%i %p') as date
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.news 
			WHERE 1 and n_status !=2 
			ORDER BY id DESC LIMIT {$start},{$limit}
				
	"; 
		//pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);

		if($rqData) {
			$no = $start+1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				$rqData[$key] = $val;

				$sql = "SELECT COUNT(*) total_data
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.news
						WHERE 1 and n_status !=2 ";
				// if($val['ownerid']==47){
				// 	pr($sql);
				//  	pr(intval($this->apps->fetch($sql)));exit;
				//  }
				$total_registrant = $this->apps->fetch($sql);
				$rqData[$key]['total_registrant'] = intval($total_registrant['total_data']);
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
	function getnews()
	{
		$id=$this->apps->_g('idcontent');
		$sql = "
			SELECT *,DATE_FORMAT(date,'%d/%m/%Y %h:%i %p') as date
			FROM news 
			WHERE id={$id}
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
			SELECT *,DATE_FORMAT(date,'%d/%m/%Y %h:%i %p') as date
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
			SELECT *,DATE_FORMAT(date,'%d/%m/%Y %h:%i %p') as date
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
		$startdate =  date('Y-m-d H:i:s'); 
		//pr($startdate);exit;
		
		
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.news (`title`,`caption`,`category`, `description`,`images`,`link`,`date`,`n_status`) 
							VALUES ('{$title}', '{$caption}','{$category}', '{$description}','{$images}','{$link}','{$startdate}',0)";
		//pr($sql);
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
		//pr($_POST);exit;
		$id = strip_tags($this->apps->_p('id'));  
		$title = strip_tags(@$this->apps->_p('title'));       
		$description = @$_POST['description'];  
		$category =strip_tags(@$_POST['category']); 
		$caption = @$_POST['caption'];  
		$link = @$_POST['url']; 
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
		
		
		$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.news set 
					`title`='{$title}',
					`caption`='{$caption}',
					`category`='{$category}',
					`description`='{$description}',
					{$qimages}
					`link`='{$link}',
					 where id={$id}";
		// pr($sql);exit;
				  	
		$res = $this->apps->query($sql);
		return $res;
		}	
}
	