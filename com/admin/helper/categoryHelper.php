<?php
class categoryHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	
	
	
	function listcategory($start=null,$limit=10)
	{
		global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		$start=$this->apps->_p('start');
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
		$search = strip_tags($this->apps->_p('search'));
		
		
		$startdate = $this->apps->_p('startdate');
		$enddate = $this->apps->_p('enddate');
		
		
		
		//GET TOTAL
		$sql = "SELECT *
				FROM tbl_category  WHERE 1 and n_status=1
					Group by category_name  ";
		$total = $this->apps->fetch($sql,1);		
	
	
		if(intval(count($total))<=$limit) $start = 0;
		
		//GET LIST
		$sql = "
			SELECT *
				FROM tbl_category  WHERE 1 and n_status=1
				Group by category_name	 ORDER BY id ASC LIMIT {$start},{$limit} "; 
		// pr($sql);
		$rqData = $this->apps->fetch($sql,1);
	// $result['query']=$sql;
		if($rqData) {
			$no = $start+1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				$rqData[$key] = $val;
				$sqlsub = "
						SELECT *
						FROM tbl_subcategory  WHERE 1 and category_id='{$val['id']}' and n_status=1
							ORDER BY id ASC "; 
				$rqDatasub = $this->apps->fetch($sqlsub,1);
				$rqData[$key]['subcategory']=$rqDatasub;
			}
			
			//pr($rqData);exit;
			if($rqData) $qData=	$rqData;
			else $qData = false;
		} else $qData = false;
			// pr($rqData);die;
		$result['result'] = $qData;
		$result['total'] = intval(count($total));
		$result['status'] =1;
		//pr($result);exit;
		return $result;
	}	
	function publish(){
		global $CONFIG;
		$idjobs=$this->apps->_g('id');
		$result['status']=0;
		$result['msg']='proses gagal coba lagi';
		
		if($idjobs)
			{
				$sql = "UPDATE   {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard SET
						n_status=1
						WHERE id_job='{$idjobs}'"; 
				$res = $this->apps->query($sql);
				if($res)
				{
					$sql = "SELECT   jbc.category_id  AS category_id,jbc.subcategory_id  AS subcategory_id,jb.job_title AS job_title,ts.nama_perusahaan AS nama_perusahaan,
						ts.user_id AS user_id
						FROM  {$CONFIG['DATABASE'][0]['DATABASE']}.job_category jbc
						LEFT JOIN jobboard jb ON jbc.jobboard_id=jb.id_job
						LEFT JOIN tbl_talent_seeker ts ON jb.talent_seeker_id=ts.id
						WHERE jobboard_id='{$idjobs}'"; 
						// pr($sql);die;
					$response = $this->apps->fetch($sql,1);
					if($response)
					{
						foreach ($response as $key=>$row)
						{
							$sql = "SELECT   * 
							FROM  {$CONFIG['DATABASE'][0]['DATABASE']}.my_subcategory
							
							WHERE category_id='{$row['category_id']}' and subcategory_id='{$row['subcategory_id']}'"; 
							$responseuser = $this->apps->fetch($sql,1);
							// pr($sql);
							if($responseuser)
							{
								foreach ($responseuser as $keyuser=>$rowuser)
								{
									
									$sqlinsertapllication = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.my_application 
															(`user_id`,`jobboard_id`,`date`,`n_status`) 
															VALUES ('{$rowuser['user_id']}','{$idjobs}',NOW(),0)";
														// pr($sqlinsertapllication);	
									$resinsertapllication = $this->apps->query($sqlinsertapllication);
									if($resinsertapllication)
									{
										$subject  = $row['nama_perusahaan'].' menawarkan kerja sama ';
										$detail = 'Anda Mendapat Penawaran Kerja sama di '.$row['nama_perusahaan'].' sebagai '.$row['job_title'];
										$sqlinsertnotification = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_notification 
															(`from`,`to`,`subject`,`detail`,`created_date`,`n_status`) 
															VALUES ('{$row['user_id']}' ,'{$rowuser['user_id']}','{$subject}','{$detail}',NOW(),1)";
														 // pr($sqlinsertnotification);	
										$resinsertnotification = $this->apps->query($sqlinsertnotification);
										
										$result['status']=1;
										$result['msg']='proses berhasil';
									
									}
									else
									{
										$result['status']=0;
										$result['msg']='proses Query  my_application gagal coba lagi';
									}
								}
							}else
							{
								$result['status']=1;
								$result['msg']='proses Query  my_subcategory gagal coba lagi';
							}
						}
					}
					else
					{
						$result['status']=0;
						$result['msg']='proses Query  job_category gagal coba lagi';
					}
				}
				else{
					$result['status']=0;
					$result['msg']='proses UPDATE  jobboard gagal coba lagi';
				}
			}
			return $result;
		
	
	}
	function editcategory(){
		global $CONFIG;
		$id = strip_tags($this->apps->_p('id'));  
		$name = strip_tags($this->apps->_p('name'));       
		//$name = $_POST['name'];  
		
		//pr($startdate);exit;
		
		
		$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_category set 
					`category_name`='{$name}'
					
					 where id={$id}";
		// pr($sql);exit;
				  	
		$res = $this->apps->query($sql);
		return $res;
		}	
	function editsubcategory(){
		global $CONFIG;
		$idcat = strip_tags($this->apps->_p('category'));  
		$idsub = strip_tags($this->apps->_p('idsub'));  
		$name = strip_tags($this->apps->_p('name'));       
		//$name = $_POST['name'];  
		
		//pr($startdate);exit;
		
		
		$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_subcategory set 
					`category_id`='{$idcat}',
					`name_subcategory`='{$name}'
					
					 where id={$idsub}";
		// pr($sql);exit;
				  	
		$res = $this->apps->query($sql);
		return $res;
		}	
	function getcategory()
	{
		global $CONFIG;
		
		
		$id = intval($this->apps->_request('id'));
		//GET LIST
		$sql = "
			SELECT *,DATE_FORMAT(date,'%d/%m/%Y %h:%i %p') as date
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_category 
			WHERE 1 GROUP BY category_name ORDER BY id "; 
		
		$rqData = $this->apps->fetch($sql,1);
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
	function selectupdatedatacategory()
	{
		global $CONFIG;
		
		
		$id = intval($this->apps->_request('id'));
		//GET LIST
		$sql = "
			SELECT *,DATE_FORMAT(date,'%d/%m/%Y %h:%i %p') as date
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_category 
			WHERE 1 and id='{$id}'
			ORDER BY id ASC "; 
		
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
	function selectupdatedatasubcategory()
	{
		global $CONFIG;
		
		
		$id = intval($this->apps->_request('id'));
		//GET LIST
		$sql = "
			SELECT *,DATE_FORMAT(date,'%d/%m/%Y %h:%i %p') as date
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_subcategory 
			WHERE 1 and id='{$id}'
			ORDER BY id ASC "; 
		// pr($sql);die;
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
		function addcategory(){
			global $CONFIG;
			//pr($_POST);exit;
			$namecategory = strip_tags(@$this->apps->_p('namecategory'));       
			$subcatergory=$_POST['namesubcategory'];
			
			
			$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_category (`category_name`,`date`,`n_status`) 
								VALUES ('{$namecategory}','NOW',1)";
						
			$res = $this->apps->query($sql);
			$idcategory=$this->apps->getLastInsertId();
			if($subcatergory)
			{	
				foreach ($subcatergory as $row)
				{
					if($row)
					{
						$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_subcategory (`category_id`,`name_subcategory`,`date`,`n_status`) 
										VALUES ('{$idcategory}','{$row}','NOW',1)";
								
						$res = $this->apps->query($sql);
					}
				}
			}
			return true;
		}	
		function addsubcategory(){
			global $CONFIG;
			//pr($_POST);exit;
			$idcategory = strip_tags(@$this->apps->_p('category'));       
			$subcatergory=$_POST['namesubcategory'];
			
			if($subcatergory)
			{	
				foreach ($subcatergory as $row)
				{
					if($row)
					{
						$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_subcategory (`category_id`,`name_subcategory`,`date`,`n_status`) 
										VALUES ('{$idcategory}','{$row}','NOW',1)";
								// pr($sql);die;
						$res = $this->apps->query($sql);
					}
				}
			}
			return true;
		}	
	function delsubcategory(){
		global $CONFIG;
		 
		$idsub = strip_tags($this->apps->_request('idsub'));  
		
		
		
		$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_subcategory set 
					`n_status`='2'
					
					 where id={$idsub}";
		// pr($sql);exit;
				  	
		$res = $this->apps->query($sql);
		return $res;
		}	
	function delcategory(){
		global $CONFIG;
		 
		$idcat = strip_tags($this->apps->_request('idcat'));  
		
		
		
		$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_category set 
					`n_status`='2'
					
					 where id={$idcat}";
		// pr($sql);exit;
				  	
		$res = $this->apps->query($sql);
		return $res;
		}	
}
	