<?php
class jobHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	
	
	
	function listjob($start=null,$limit=10)
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
				$wSearch="and ts.nama_perusahaan like '%{$search}%' ";
			}
			if($startdate)
			{
				if($enddate)
				{
					$startdate =date("Y-m-d",strtotime($startdate));
					$wstartdate="and DATE(jb.date) >=DATE('{$startdate}') ";
				}
				else
				{
					
					$wstartdate="and DATE_FORMAT(jb.date,'%d-%m-%Y') ='{$startdate}'";
				}
			}
			if($enddate)
			{
				$enddate =date("Y-m-d",strtotime($enddate));
				$wenddate="and DATE(jb.date) <= DATE('{$enddate}') ";
				//$wenddate="and DATE_FORMAT(jb.date,'%d-%m-%Y %H:%i') <='{$enddate}' ";
			}
		
		//GET TOTAL
		$sql = "SELECT COUNT(*) total
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard as jb
						LEFT JOIN {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent_seeker  AS ts ON jb.talent_seeker_id=ts.id
							LEFT JOIN {$CONFIG['DATABASE'][0]['DATABASE']}.job_category   AS jbc ON jbc.jobboard_id=jb.id_job
				LEFT JOIN {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_category    AS tc ON jbc.category_id=tc.id
			LEFT JOIN {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_subcategory   AS tsub ON jbc.subcategory_id=tsub.id
						WHERE 1 {$wSearch} {$wstartdate} {$wenddate}  AND jb.n_status='0' ";
		$total = $this->apps->fetch($sql);		
		
	
		if(intval($total['total'])<=$limit) $start = 0;
		
		//GET LIST
		$sql = "
			SELECT jb.*,DATE_FORMAT(jb.date,'%d-%m-%Y %H:%i') AS `date`,DATE_FORMAT(jb.enddate,'%d-%m-%Y 00:00') AS enddate,ts.nama_perusahaan AS namaPerusahaan,tc.category_name,tsub.name_subcategory
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard as jb
			LEFT JOIN {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent_seeker  AS ts ON jb.talent_seeker_id=ts.id
			LEFT JOIN {$CONFIG['DATABASE'][0]['DATABASE']}.job_category   AS jbc ON jbc.jobboard_id=jb.id_job
			LEFT JOIN {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_category    AS tc ON jbc.category_id=tc.id
			LEFT JOIN {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_subcategory   AS tsub ON jbc.subcategory_id=tsub.id
			WHERE 1 {$wSearch} {$wstartdate} {$wenddate} AND jb.n_status='0' and jb.n_status!='6'
			ORDER BY jb.id_job DESC LIMIT {$start},{$limit}"; 
		// pr($sql);die;
		$rqData = $this->apps->fetch($sql,1);

		if($rqData) {
			$no = $start+1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				$rqData[$key] = $val;

				$sql = "SELECT COUNT(*) total_data
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard as jb
						LEFT JOIN {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent_seeker  AS ts ON jb.talent_seeker_id=ts.id
							LEFT JOIN {$CONFIG['DATABASE'][0]['DATABASE']}.job_category   AS jbc ON jbc.jobboard_id=jb.id_job
				LEFT JOIN {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_category    AS tc ON jbc.category_id=tc.id
			LEFT JOIN {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_subcategory   AS tsub ON jbc.subcategory_id=tsub.id
						WHERE 1 {$wSearch} {$wstartdate} {$wenddate} AND jb.n_status='0'";
				
				$total_registrant = $this->apps->fetch($sql);
				$rqData[$key]['total_registrant'] = intval($total_registrant['total_data']);
			}
			//pr($rqData);exit;
			if($rqData) $qData=	$rqData;
			else $qData = false;
		} else $qData = false;
		
		$result['result'] = $qData;
		$result['total'] = intval($total['total']);
		$result['status'] = 1;
		//pr($result);exit;
		return $result;
	}	
	function downloadpeserta()
	{
		global $CONFIG;
		$result='';
			$search =@$this->apps->_request('search');
			$startdate =@$this->apps->_request('startdate');
			$enddate =@$this->apps->_request('enddate');
			$result='';
			$wSearch='';
			$wstartdate='';
			$wenddate='';
			if($search)
			{
				$wSearch="and jb.job_title like '%{$search}%' ";
			}
			if($startdate)
			{
				$wstartdate="and DATE_FORMAT(jb.date,'%d-%m-%Y %H:%i') >='{$startdate}' ";
			}
			if($enddate)
			{
				$wenddate="and DATE_FORMAT(jb.date,'%d-%m-%Y %H:%i') <='{$enddate}' ";
			}
			$sql = "
			SELECT jb.*,DATE_FORMAT(jb.date,'%d-%m-%Y %H:%i') AS DATE,ts.nama_perusahaan AS namaPerusahaan,tc.category_name,tsub.name_subcategory
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard as jb
			LEFT JOIN {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent_seeker  AS ts ON jb.talent_seeker_id=ts.id
			LEFT JOIN {$CONFIG['DATABASE'][0]['DATABASE']}.job_category   AS jbc ON jbc.jobboard_id=jb.id_job
				LEFT JOIN {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_category    AS tc ON jbc.category_id=tc.id
			LEFT JOIN {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_subcategory   AS tsub ON jbc.subcategory_id=tsub.id
			WHERE 1 {$wSearch} {$wstartdate} {$wenddate} AND jb.n_status='0' and jb.n_status!='6'
			ORDER BY jb.id_job DESC"; 
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
					/* $sql = "SELECT   jbc.category_id  AS category_id,jbc.subcategory_id  AS subcategory_id,jb.job_title AS job_title,ts.nama_perusahaan AS nama_perusahaan,
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
					}*/
					$result['status']=1;
					$result['msg']='proses berhasil';
				}
				else{
					$result['status']=0;
					$result['msg']='proses UPDATE  jobboard gagal coba lagi';
				}
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
	function addjob($uid){
		global $CONFIG;
		//pr($_POST);exit;
		//pr($startdate);exit;
		//$sql = "select id from {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent where user_id='{$uid}'";
		//$ts_id=$res[0]['id'];		  	
		//$res = $this->apps->fetch($sql,1);
		//pr($res[0]['id']);exit;
		
		$title = strip_tags(@$this->apps->_p('title'));       
		$description = @$_POST['description'];  
		$requitment = @$_POST['requitment']; 
		$salary = @$_POST['salary'];  
		$category = strip_tags(@$_POST['category']); 
		$datenya =  date('Y-m-d H:i:s'); 
		$provincy = strip_tags(@$this->apps->_p('provincy')); 
		$city = strip_tags(@$this->apps->_p('city')); 
		
		
		
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard (`job_title`,`talent_seeker_id`,`job_description`,`requitment`,`salary`, `status_jobs`,`date`,`n_status`) 
							VALUES ('{$title}','{$ts_id}', '{$description}','{$requitment}','{$salary}', 0,'{$datenya}',1)";
				  	
		$res = $this->apps->query($sql);
		$id_job_cat=$this->apps->getLastInsertId();
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.job_category (`jobboard_id`,`category_id`,`date`,`n_status`) 
							VALUES ('{$id_job_cat}','{$category}','{$datenya}',1)";
				  	
		$res = $this->apps->query($sql);
		
		
		return true;
		}	
	function cat_category(){
		global $CONFIG;
		$sql = "select id,category_name as cat from {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_category";
		$fetch = $this->apps->fetch($sql,1);	
		return $fetch;
		
		}
	function subcat(){
		global $CONFIG;
		$id=$this->apps->_p('id');
		$sqlcheck ="SELECT *
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_subcategory where category_id={$id}";
						
		//pr($sqlcheck);
		$rqData = $this->apps->fetch($sqlcheck,1);
		return $rqData;
	}
	function city(){
		global $CONFIG;
		$id=$this->apps->_p('id');
		$sqlcheck ="SELECT *
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.city_reference where provinceName='{$id}'";
						//pr($sqlcheck);
		$rqData = $this->apps->fetch($sqlcheck,1);
		return $rqData;
	}
	function province(){
		global $CONFIG;
		$sqlcheck ="SELECT *
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.province_reference";
		$rqData = $this->apps->fetch($sqlcheck,1);
		return $rqData;
	}
}
	
