<?php
class talentskeerHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	function getTelentskeer(){
			$start=$this->apps->_p('start');
			
			if($start=='')
				{
					$start=0;
				}
			$limit=$this->apps->_p('limit');
			if($limit=='')
				{
					$limit=10;
				}
			$result='';
			$search =@$this->apps->_p('search');
			$startdate =@$this->apps->_p('startdate');
			$enddate =@$this->apps->_p('enddate');
			$result='';
			$wSearch='';
			$wstartdate='';
			$wenddate='';
			if($search)
			{
				$wSearch="and tblts.nama_perusahaan like '%{$search}%' ";
			}
			if($startdate)
			{
				if($enddate)
				{
					$startdate =date("Y-m-d",strtotime($startdate));
					$wstartdate="and DATE(sm.register_date) >=DATE('{$startdate}') ";
				}
				else
				{
					
					$wstartdate="and DATE_FORMAT(sm.register_date,'%d-%m-%Y') ='{$startdate}'";
				}
			}
			if($enddate)
			{
				$enddate =date("Y-m-d",strtotime($enddate));
				$wenddate="and DATE(sm.register_date) <= DATE('{$enddate}') ";
			}
			$sql = "SELECT sm.*,DATE_FORMAT(sm.register_date,'%d-%m-%Y %H:%i') AS tanggal,
						tblcat.category_name AS category_name, tblts.verified as verified,tblts.nama_perusahaan
					FROM social_member sm
					LEFT JOIN 
					(
						SELECT  * FROM  my_subcategory GROUP BY user_id
						
					) AS sub ON sm.id = sub.user_id
					
					LEFT JOIN 
					 tbl_category tblcat ON sub.category_id=tblcat.id
					LEFT JOIN 
					 tbl_talent_seeker tblts ON sm.id=tblts.user_id
					 
					WHERE 1 {$wSearch} {$wstartdate} {$wenddate} and sm.role !=1  ORDER BY sm.love_count DESC LIMIT  {$start},{$limit}";
			// pr($sql);
			$this->logger->log($sql);
			$qData = $this->apps->fetch($sql,1);
			
			if(!$qData)return false;
			$result['data']=$qData;
			$i=0;
			foreach($result['data'] as $key=>$row)
			{
				$i++;
				$result['data'][$key]['no'] =$i;
			}
			$sql ="
			SELECT count(*) as total
			FROM social_member sm
					LEFT JOIN 
					(
						SELECT  * FROM  my_subcategory GROUP BY user_id
						
					) AS sub ON sm.id = sub.user_id
					
					LEFT JOIN 
					 tbl_category tblcat ON sub.category_id=tblcat.id
					 LEFT JOIN 
					 tbl_talent_seeker tblts ON sm.id=tblts.user_id
			WHERE 1 {$wSearch} {$wstartdate} {$wenddate} and sm.role !=1 ";
			// pr($sql);
			$qRankData = $this->apps->fetch($sql);	
		
			if($qRankData){
			
						$result['total'] = $qRankData['total'];
				
			}
			$result['status'] =1;
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
				$wSearch="and tblts.nama_perusahaan like '%{$search}%' ";
			}
			if($startdate)
			{
				$wstartdate="and DATE_FORMAT(sm.register_date,'%d-%m-%Y %H:%i') >='{$startdate}' ";
			}
			if($enddate)
			{
				$wenddate="and DATE_FORMAT(sm.register_date,'%d-%m-%Y %H:%i') <='{$enddate}' ";
			}
			$sql = "SELECT sm.*,DATE_FORMAT(sm.register_date,'%d-%m-%Y %H:%i') AS tanggal,
						tblcat.category_name AS category_name, tblts.verified as verified,tblts.nama_perusahaan
					FROM social_member sm
					LEFT JOIN 
					(
						SELECT  * FROM  my_subcategory GROUP BY user_id
						
					) AS sub ON sm.id = sub.user_id
					
					LEFT JOIN 
					 tbl_category tblcat ON sub.category_id=tblcat.id
					LEFT JOIN 
					 tbl_talent_seeker tblts ON sm.id=tblts.user_id
					 
					WHERE 1 {$wSearch} {$wstartdate} {$wenddate} and sm.role !=1  ORDER BY sm.love_count DESC ";
			// pr($sql);
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
	function verifiedTelentsskeer(){
			$idCt= $this->apps->_p('id');
			$verified=$this->apps->_p('verified');
			$result['status']=0;
			$result['msg']='proses gagal silahkan coba lagi';
			if($idCt=='')
			{
				$result['status']=0;
				$result['msg']='proses gagal silahkan coba lagi';
			}
			$sql = "UPDATE tbl_talent_seeker 
					SET verified='{$verified}' 
					WHERE user_id='{$idCt}' LIMIT 1";
		// pr($sql);die;
			$this->logger->log($sql);

			$qData = $this->apps->query($sql);
			if($qData)
			{
				$result['status']=1;
				$result['msg']='proses  berhasil';
			}
			return $result;
	}
	function unpublishjobs(){
			$idjobs= $this->apps->_p('id');
			$status=$this->apps->_p('status');
			if($status=='')
			{
				$status=0;
			}
			$result['status']='0';
			$result['msg']='proses gagal silahkan coba lagi';
			if($idjobs=='')
			{
				$result['status']=0;
				$result['msg']='proses gagal silahkan coba lagi';
			}
			$sql = "UPDATE jobboard 
					SET n_status='{$status}' 
					WHERE id_job='{$idjobs}'";
		
			$this->logger->log($sql);
			// pr($sql);die;
			$qData = $this->apps->query($sql);
			if($qData)
			{
				$result['status']=1;
				$result['msg']='proses  berhasil';
			}
			return $result;
	}
	function deljobs(){
			$idjobs= $this->apps->_g('id');
			
			
			$result['status']='0';
			$result['msg']='proses gagal silahkan coba lagi';
			if($idjobs=='')
			{
				$result['status']=0;
				$result['msg']='proses gagal silahkan coba lagi';
			}
			$sql = "UPDATE jobboard 
					SET n_status='2' 
					WHERE id_job='{$idjobs}'";
		
			$this->logger->log($sql);
			// pr($sql);die;
			$qData = $this->apps->query($sql);
			if($qData)
			{
				$result['status']=1;
				$result['msg']='proses  berhasil';
			}
			return $result;
	}
	function getjobs(){	
		$iduser=$this->apps->_request('iduser');
		$start=$this->apps->_p('start');
			
			if($start=='')
				{
					$start=0;
				}
			$limit=$this->apps->_p('limit');
			if($limit=='')
				{
					$limit=10;
				}
		$result['status']='0';
		$result['msg']='Proses gagal sialahkan coba';
		$sql = "
			SELECT jb.*,DATE_FORMAT(jb.date,'%d-%m-%Y %H:%i') AS `date`,DATE_FORMAT(jb.enddate,'%d-%m-%Y %H:%i') AS enddate,ts.nama_perusahaan AS namaPerusahaan,tc.category_name,tsub.name_subcategory
			FROM jobboard as jb
			LEFT JOIN tbl_talent_seeker  AS ts ON jb.talent_seeker_id=ts.id
			LEFT JOIN job_category   AS jbc ON jbc.jobboard_id=jb.id_job
				LEFT JOIN tbl_category    AS tc ON jbc.category_id=tc.id
			LEFT JOIN tbl_subcategory   AS tsub ON jbc.subcategory_id=tsub.id
			
			WHERE 1 AND ts.user_id='{$iduser}'and jb.n_status!=2
			ORDER BY jb.id_job DESC LIMIT {$start},{$limit}";
	 // pr($sql);
		$qData = $this->apps->fetch($sql,1);
		// pr($qData);die;
		$sqltotal = "SELECT count(*) total
			FROM jobboard as jb
			LEFT JOIN tbl_talent_seeker  AS ts ON jb.talent_seeker_id=ts.id
				LEFT JOIN job_category   AS jbc ON jbc.jobboard_id=jb.id_job
				LEFT JOIN tbl_category    AS tc ON jbc.category_id=tc.id
			LEFT JOIN tbl_subcategory   AS tsub ON jbc.subcategory_id=tsub.id
			WHERE 1 AND ts.user_id='{$iduser}' and jb.n_status!=2";
		$qDatatotal = $this->apps->fetch($sqltotal);
		// pr($sqltotal);die;
		$i=0;
		if($qData)
		{
			foreach($qData as $key=>$row)
			{
				$i++;
				$qData[$key]['no'] =$i;
			}
		}
		if($qData)
		{	
			$result['data']=$qData;
			$result['total']=$qDatatotal['total'];
			$result['status']='1';
			$result['msg']='Proses berhasil';
		}
		else
		{
			$result['data']='';
			$result['status']='0';
			$result['total']=0;
			$result['msg']='tidak ada jobs';
		}
		return $result;
		
	}
	function geteditjobs(){	
	$idjobs=$this->apps->_request('idjobs');
		$sql = "
			SELECT *,DATE_FORMAT(jobboard.enddate,'%d-%m-%Y %H:%i') as enddate,jobboard.city as city,jobboard.provinsi as provinsi
			FROM jobboard 
			LEFT JOIN job_category ON jobboard.id_job=job_category.jobboard_id
			LEFT JOIN tbl_talent_seeker  ON jobboard.talent_seeker_id=tbl_talent_seeker.id
			WHERE 1 AND id_job='{$idjobs}'
			";
	 // pr($sql);
		$qData = $this->apps->fetch($sql);
		return $qData;
	}
	function lokingForjobs(){	
	$idjobs=$this->apps->_request('idjobs');
		$sql = "
			SELECT looking_for
			FROM tbl_mylookingfor 
			WHERE 1 AND id_job='{$idjobs}'
			";
	 // pr($sql);
		$qData = $this->apps->fetch($sql,1);
		$data=array();
		if($qData)
		{
			foreach ($qData as $row)
			{
				
					$data['loking_for'][]=@$row['looking_for'];
				
			}
		}
		else
		{
			$data['loking_for']='';
		}
		// pr($data);die;
		return $data;
	}
	function prosesditjobs(){	
		$idjobs=$this->apps->_request('idjobs');
		
			$title = strip_tags(@$this->apps->_p('title'));       
		$description = @$_POST['description'];  
		$requitment =@$_POST['requitment']; 
		$salary = @$_POST['salary'];  
		$category = strip_tags(@$_POST['category']); 
		$provinsi = strip_tags(@$_POST['provincy']); 
		$city = strip_tags(@$_POST['city']); 
		
		$endpublish =date('Y-m-d H:i:s', strtotime($this->apps->_p('endpublish'))); 
		$experience=strip_tags(@$_POST['experience']); 
		$agent=strip_tags(@$_POST['agent']); 
		$idjob=strip_tags(@$_POST['idjobs']); 
		$subcategory=strip_tags(@$_POST['subcategory']); 
		$talent_seeker_id=strip_tags(@$_POST['talent_seeker_id']); 
		
		$sql="UPDATE jobboard set `job_title`='{$title}',
		
		`job_description`='{$description}',
		`requitment`='{$requitment}',
		`salary`='{$salary}',
		`status_jobs`=0,
		`provinsi`='{$provinsi }',
		`city`='{$city}',
		`enddate`='{$endpublish}',
		`experience`='{$experience}',
		`agent`='{$agent}'
		where id_job={$idjob}";
		
		// pr($sql);exit;
				  	
		$res = $this->apps->query($sql);
		
		$sql = "UPDATE job_category set `category_id`='{$category}',
		`subcategory_id`='{$subcategory}',
		`date`='NOW()',
		`n_status`=1
		where 1 AND jobboard_id='{$idjob}'";
				  	
		$res = $this->apps->query($sql);
	}
	function detailts(){
		$id=$this->apps->_g('id');
		$sql = "SELECT sm.*,DATE_FORMAT(sm.register_date,'%d-%m-%Y %H:%i') AS tanggal,
						tblcat.category_name AS category_name, tblts.verified as verified,tblts.nama_perusahaan,tblts.no_tlp
					FROM social_member sm
					LEFT JOIN 
					(
						SELECT  * FROM  my_subcategory GROUP BY user_id
						
					) AS sub ON sm.id = sub.user_id
					
					LEFT JOIN 
					 tbl_category tblcat ON sub.category_id=tblcat.id
					LEFT JOIN 
					 tbl_talent_seeker tblts ON sm.id=tblts.user_id
					 
					WHERE 1  and sm.id={$id} ";
			// pr($sql);
		
			$qData = $this->apps->fetch($sql);
		return $qData;
	}
	function proseseditts(){
		$id=$this->apps->_p('iduser');
		$nama_perusahaan=$this->apps->_p('nama_perusahaan');
		$city=$this->apps->_p('city');
		$email=$this->apps->_p('email');
		$name=$this->apps->_p('name');
		$phone=$this->apps->_p('phone');
		$phonnumber=$this->apps->_p('phonnumber');
		
		
		$sql = "UPDATE tbl_talent_seeker set
		`nama_perusahaan`='{$nama_perusahaan}',
		`city`='{$city}',
		`no_tlp`='{$phone}'
		where 1 AND user_id='{$id}'";
				  	
		$res = $this->apps->query($sql);
		// pr($sql);
		
		$sql = "UPDATE social_member set
		`name`='{$name}',
		`email`='{$email}',
		`phone_number`='{$phonnumber}',
		`n_status`=1
		where 1 AND id='{$id}'";
		
		$res = $this->apps->query($sql);
		
		
		return $res;
	}
	function listCategory()
	{
		$sql = "
			SELECT *
			FROM tbl_category 
			
			";
	 // pr($sql);
	
		$qData['result'] = $this->apps->fetch($sql,1);
		return $qData;
	
	}
}
?>
