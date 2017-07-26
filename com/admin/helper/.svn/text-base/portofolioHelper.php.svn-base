<?php
class portofolioHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	
	
	
	function listportofolio($start=null,$limit=10)
	{
		global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
		$search =@$this->apps->_p('search');
			$startdate =@$this->apps->_p('startdate');
			$enddate =@$this->apps->_p('enddate');
			$result='';
			$wSearch='';
			$wstartdate='';
			$wenddate='';
			if($search)
			{
				$wSearch="and pot.title like '%{$search}%' ";
			}
			if($startdate)
			{
				if($enddate)
				{
					$startdate =date("Y-m-d",strtotime($startdate));
					$wstartdate="and DATE(pot.date) >=DATE('{$startdate}') ";
				}
				else
				{
					
					$wstartdate="and DATE_FORMAT(pot.date,'%d-%m-%Y') ='{$startdate}'";
				}
				//wstartdate="and DATE_FORMAT(pot.date,'%d-%m-%Y %H:%i') >='{$startdate}' ";
			}
			if($enddate)
			{
				$enddate =date("Y-m-d",strtotime($enddate));
				$wenddate="and DATE(pot.date) <= DATE('{$enddate}') ";
				//$wenddate="and DATE_FORMAT(pot.date,'%d-%m-%Y %H:%i') <='{$enddate}' ";
			}
			
		//GET TOTAL
		$sql = "SELECT count(*) total
			FROM my_portofolio pot LEFT JOIN  social_member sm  ON pot.user_id=sm.id WHERE 1 and pot.n_status !=2{$wSearch} {$wstartdate} {$wenddate} ";
		$total = $this->apps->fetch($sql);		
		
	
		if(intval($total['total'])<=$limit) $start = 0;
		
		//GET LIST
		$sql = "
			SELECT *,DATE_FORMAT(pot.date,'%d-%m-%Y %H:%i') AS `date`,pot.id as idportofolio,pot.n_status as statuspot
				FROM my_portofolio pot LEFT JOIN  social_member sm  ON pot.user_id=sm.id WHERE 1 and pot.n_status !=2 {$wSearch} {$wstartdate} {$wenddate}
					ORDER BY pot.id DESC LIMIT {$start},{$limit}"; 
		// pr($sql);die;
		$rqData = $this->apps->fetch($sql,1);

		if($rqData) {
			$no = $start+1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				$rqData[$key] = $val;

			}
			//pr($rqData);exit;
			if($rqData)
			{
				$qData=	$rqData;
				$result['status'] =1;
			}
			else
			{
				$qData = false;
					$result['status'] =0;
			}
		} else
		{		
			$qData = false;
				$result['status'] =0;
		}
		$result['result'] = $qData;
		$result['total'] = intval($total['total']);
	
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
	function downloadpeserta()
	{
		global $CONFIG;
		$result='';
		$idjobs=$this->apps->_g('id');
			$search =@$this->apps->_p('search');
			$startdate =@$this->apps->_p('startdate');
			$enddate =@$this->apps->_p('enddate');
			$result='';
			$wSearch='';
			$wstartdate='';
			$wenddate='';
			if($search)
			{
				$wSearch="and pot.title like '%{$search}%' ";
			}
			if($startdate)
			{
				$wstartdate="and DATE_FORMAT(pot.date,'%d-%m-%Y %H:%i') >='{$startdate}' ";
			}
			if($enddate)
			{
				$wenddate="and DATE_FORMAT(pot.date,'%d-%m-%Y %H:%i') <='{$enddate}' ";
			}
				$sql = "SELECT *,DATE_FORMAT(pot.date,'%d-%m-%Y %H:%i') AS `date`,pot.id as idportofolio,pot.n_status as statuspot
				FROM my_portofolio pot LEFT JOIN  social_member sm  ON pot.user_id=sm.id WHERE 1 {$wSearch} {$wstartdate} {$wenddate}
					ORDER BY pot.id DESC"; 
			// pr($sql);die;
			$this->logger->log($sql);
			$qData = $this->apps->fetch($sql,1);

		
		$result['data'] = $qData;
		$i=0;
		foreach($result['data'] as $key=>$row)
			{
				$i++;
				$result['data'][$key]['no'] =$i;
			}
		return $result;
	}
	function listcategory(){
	global $CONFIG;
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_category where 1"; 
		//pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);
		return $rqData;
	
	
	}
	
}
	
