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
	function ajaxlike($id,$friend){
		global $CONFIG;
		
		$sql = "select * from my_love_job where job_id='{$id}' and friend_id='{$friend}' ";
		//pr($sql);exit;
		$res = $this->apps->fetch($sql,1);
	//	pr($res);exit;
		if($res=='')
		{//echo "ss";exit;
		$sql = "insert my_love_job set job_id='{$id}', date=NOW(),friend_id='{$friend}',n_status=1 ";
		$res = $this->apps->query($sql,1);
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard set love_count=love_count+1 where id_job='{$id}'";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
			$sql = "select love_count from {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard  where id_job='{$id}'";
		//pr($sql);exit;
		$res= $this->apps->fetch($sql,1);
		}else{
		
		$sql = "delete from my_love_job where job_id='{$id}' and friend_id='{$friend}' ";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard set love_count=love_count-1 where id_job='{$id}'";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
	
		$sql = "select love_count from {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard  where id_job='{$id}'";
		//pr($sql);exit;
		$res= $this->apps->fetch($sql,1);
		}
		//pr($res);exit;
		
		return $res;
		
		}
	function myapplicant(){
		
		global $CONFIG,$LOCALE;
		$iduser=strip_tags(@$this->apps->_p('iduse'));  
		$idjob=strip_tags(@$this->apps->_p('idjob'));  
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.my_application (`user_id`,`jobboard_id`,`date`,`n_status`) 
							VALUES ('{$iduser}','{$idjob}',NOW(),1)";

		//pr($sql);exit;		  	
		$res = $this->apps->query($sql);
		
		
		$sqljobs = "select * from {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard  where id_job='{$idjob}'";
		//pr($sql);exit;
		$resjobs= $this->apps->fetch($sqljobs);
		$links='<a herf="'.$CONFIG['BASE_DOMAIN'].'jobboard/detail_jobboard?id='.$resjobs['id_job'].'" >view details</a>';
		
		$subject=$LOCALE[1]['notif']['applayjobs'];
		$subject=str_replace('{$titlejob}',$resjobs['job_title'],$subject);
		$subject=str_replace('{$link}',$links,$subject);
		
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_notification
		(`user_id`,`subject`,`detail`,`created_date`,`n_status`) 
		VALUES ('{$iduser}','You have 1 new applicant','{$subject}',NOW(),1)";

			 // pr($sql); 	
		$res = $this->apps->query($sql);
		// pr($res);
		return true;
		}
	function citynya(){
		global $CONFIG;
		$sql = "select * from {$CONFIG['DATABASE'][0]['DATABASE']}.city_reference";
		$rqData = $this->apps->fetch($sql,1);	
		if($rqData) {
			
			foreach($rqData as $key => $val){
				
				
				
				$rqData[$key] = $val;

				
			}
			//pr($rqData);exit;
			if($rqData) $qData=	$rqData;
			else $qData = false;
		} else $qData = false;
		
		
		$result['result'] = $qData;
		//pr($result);exit;
		return $result;
		
		}		
	function listjobadvsearch(){
	
		global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
	  
		// $projectid = intval($this->apps->_g('projects'));
		
		
		$cetegory = strip_tags($this->apps->_p('cetegory'));
		$scategory="";
		if($cetegory != '')
		{
			$scategory="AND mc.category_id = '{$category}'";
		}
		$subcat = strip_tags($this->apps->_p('subcat'));
		$sucategory="";
		if($subcat != '')
		{
			$sucategory="AND tsub.id='{$subcat}'";
		}
		$city = strip_tags($this->apps->_p('city'));
		$scity="";
		if($city != '')
		{
			$scity="AND sm.city='{$city}'";
		}
		$from = strip_tags($this->apps->_p('from'));
		$to = strip_tags($this->apps->_p('to'));
	
		$sdate="";
		
		if($from != '' && $to =='')
		{
			$ok=date('Y')-$from;
			$sdate="AND DATE_FORMAT(sm.birthday,'%Y')='{$ok}'";
		}
		
		if($from == '' && $to !='')
		{
			$ok=date('Y')-$to;
			$sdate="AND DATE_FORMAT(sm.birthday,'%Y')='{$ok}'";
		}
		if($from != '' && $to !='')
		{
			$fromnya=date('Y')-$from;
			$tonya=date('Y')-$to;
			$sdate="AND DATE_FORMAT(sm.birthday,'%Y') between {$tonya}  AND {$fromnya}";
		}
		
	
		$sex = strip_tags($this->apps->_p('sex'));
		$scategory="";
		if($sex != '')
		{
			$scategory="AND sm.sex='male'";
		}
	
		//pr($sfrom);
		
		//GET TOTAL
		$sql = "SELECT count(*) total
		
			FROM creasi.social_member sm 
			left join my_subcategory mc on sm.id=mc.user_id 
			left join tbl_category tc on mc.category_id=tc.id 
			left join tbl_subcategory tsub on mc.subcategory_id=tsub.id 
			WHERE 1  {$scategory} {$sucategory} {$scity} {$sdate} {$scategory} ";
		$total = $this->apps->fetch($sql);		
		
	//pr($sql);exit;
		if(intval($total['total'])<=$limit) $start = 0;
		
		//GET LIST
		$sql = "
			SELECT sm.id,sm.img_avatar,sm.name,sm.view_count,sm.love_count,sm.follow_count
			FROM creasi.social_member sm 
			left join my_subcategory mc on sm.id=mc.user_id 
			left join tbl_category tc on mc.category_id=tc.id 
			left join tbl_subcategory tsub on mc.subcategory_id=tsub.id 
			WHERE 1  {$scategory} {$sucategory} {$scity} {$sdate} {$scategory}
				
	";
	//pr($sql);exit;
	// pr($sql);
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
		//pr($result);exit;
		return $result;
	
	}	
	
	function sub_category($id){
		global $CONFIG;
		$sql = "select id,category_id,name_subcategory from {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_subcategory where category_id={$id}";
		$fetch = $this->apps->fetch($sql,1);
	
	
		return $fetch;
		
		}	
		
		
	function cat_category(){
		global $CONFIG;
		$sql = "select id,category_name as cat from {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_category";
		$fetch = $this->apps->fetch($sql,1);	
		return $fetch;
		
		}
	 
	 function datebirthday($date)
   {
		   $birthDate = $date;
		  //explode the date to get month, day and year
		  $birthDate = explode("-", $birthDate);
		  //get age from date or birthdate
		  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
			? ((date("Y") - $birthDate[0]) - 1)
			: (date("Y") - $birthDate[0]));
		return $age;
   }
	function updateinterview()
	{
	//pr($_POST);exit;
	
		global $CONFIG;
		//$paramuser=$this->apps->_p('user');
	/* 	if ($_POST['user'])
		{
		foreach($_POST['user'] as $key=>$val)
			{
				$sql = "update my_application set interview='1' where user_id='{$val}' and jobboard_id='{$idjobs}' ";
				$fetch = $this->apps->query($sql);
			}
			return true;
		} */
		
		
		$iduser=count($_POST['iduser']);
		
		for ($i =0; $i < $iduser; $i++) 	
		{
		
			$timenya=date("H:i:s", strtotime("".$_POST['timepicker'][$i].""));
			$datenya=date("Y-m-d", strtotime("".$_POST['date'][$i].""));
			$clocknya=$datenya." ".$timenya;
			//pr($clocknya);exit;
			
			//pr($timenya);exit;
			$sql = "update my_application set interview='1',`interview_date`='{$clocknya}',`interview_address`='{$_POST['address'][$i]}',`interview_telp`='{$_POST['telp'][$i]}',`interview_contact`='{$_POST['contact'][$i]}' where user_id='{$_POST['iduser'][$i]}' and jobboard_id='{$_POST['job_id'][$i]}' ";
			//pr($sql);exit;
			$fetch = $this->apps->query($sql);
			
			$sql = "update jobboard set n_status_interview='1' where id_job='{$_POST['job_id'][$i]}' ";
			//pr($sql);exit;
			$fetchupdateinterview = $this->apps->query($sql);
			
		}
		return true;
	
	}
	function updatereviewedjobs($idjobs)
	{
	//pr($_POST);exit;
	
		global $CONFIG;
		//$paramuser=$this->apps->_p('user');
		if ($_POST['user'])
		{
		foreach($_POST['user'] as $key=>$val)
			{
				$sql = "update my_application set n_status='2' where user_id='{$val}' and jobboard_id='{$idjobs}' ";
				$fetch = $this->apps->query($sql);
			}
			return true;
		}
			
	
	}
	function updaterejectjobs($idjobs)
	{
	//pr($_POST);exit;
	
		global $CONFIG;
		//$paramuser=$this->apps->_p('user');
		if ($_POST['user'])
		{
		foreach($_POST['user'] as $key=>$val)
			{
				$sql = "update my_application set n_status='3' where user_id='{$val}' and jobboard_id='{$idjobs}' ";
				$fetch = $this->apps->query($sql);
			}
			return true;
		}
			
	
	}
   function checkinterview()
	{
		global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		$jobsid=$this->apps->_p('idjobs');
		$checkadv=$_POST['user'];
		//pr($checkadv);exit;
		
		$yois=count($checkadv);
		//pr($yoi);	
		$valuenyas='';
		$is=0;
			foreach($checkadv as $keys => $vals)
			{
				$is++;
				if($yois==1)
				{
				$valuenyas.="'".$vals."'";
				}
				else if($is <= $yois)
				{
						if($yois==$is)
						{
						$valuenyas.="'".$vals."'";
						}else {
						$valuenyas.="'".$vals."',";
						}
				}
			}	
			
		$sql = "select * from social_member sm inner join tbl_talent tt on sm.id=tt.user_id 
				inner join my_application ma on sm.id=ma.user_id where ma.jobboard_id={$jobsid} and ma.user_id in ({$valuenyas})";
		//pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);
		return $rqData;	
			
				
				
	}
	function detail_talent_jobs($start=null,$limit=5,$id,$param=null)
	{
	global $CONFIG;
	
		$result['result'] = false;
		$result['total'] = 0;
		
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
		$querydetail='';
		if ($id !='')
		{
		$querydetail=' and ma.jobboard_id={$id}';
		}
	
		
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
		$filter .= $enddate ? " AND postdate < '{$enddate}'" :
		//GET TOTAL
		$sql = "select count(*) as total from social_member sm inner join tbl_talent tt on sm.id=tt.user_id 
				inner join my_application ma on sm.id=ma.user_id
				inner join jobboard jb on ma.jobboard_id=jb.id_job
				left join job_category jc on jb.id_job=jc.jobboard_id
				where ma.jobboard_id={$id} and ma.n_status={$param}";

		$total = $this->apps->fetch($sql);		
		
	//pr($total);exit;
		if(intval($total['total'])<=$limit) $start = 0;
		
	
		
		$sql = "select * from social_member sm inner join tbl_talent tt on sm.id=tt.user_id 
				inner join my_application ma on sm.id=ma.user_id
				inner join jobboard jb on ma.jobboard_id=jb.id_job
				left join job_category jc on jb.id_job=jc.jobboard_id
				where ma.jobboard_id={$id} and ma.n_status={$param} LIMIT {$start},{$limit}";
		//pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);
		//pr($rqData);exit;
		
		if($rqData) {
			$no = $start+1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
		
				$birthDate = $val['birthday'];
						//explode the date to get month, day and year
				  $birthDate = explode("-", $birthDate);
				  //get age from date or birthdate
				  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
					? ((date("Y") - $birthDate[0]) - 1)
					: (date("Y") - $birthDate[0]));
					
				$val['birthday']=$age;
				
				
				$sql="select * from {$CONFIG['DATABASE'][0]['DATABASE']}.my_attribut_category where user_id={$val['id']} and category_id={$val['category_id']} and subcategory_id={$val['subcategory_id']}";
				
				$resnya = $this->apps->fetch($sql,1);
				
				//pr($resnya[0]['agent']);exit;
				$val['experience']=$resnya[0]['experience'];
				$val['agent']=$resnya[0]['agent'];
				
				
				$rqData[$key] = $val;

				
			}
			//pr($rqData);exit;
			if($rqData) $qData=	$rqData;
			else $qData = false;
		} else $qData = false;
		
		
		$result['result'] = $qData;
			$result['total'] = intval($total['total']);
		return $result;
		//pr($rqData);exit;
		
	}
	
	
   
   
function select_category(){
		global $CONFIG;
		$sql = "select *,count(*) as nilaijumlah,DATE_FORMAT(jb.enddate,'%d-%m-%Y') as date,jb.provinsi,jb.city from creasi.jobboard as jb left join tbl_talent_seeker tts on jb.talent_seeker_id=tts.id left join job_category jc
		on jb.id_job=jc.jobboard_id  left join tbl_category tc on jc.category_id=tc.id WHERE 1  and jb.enddate > now() AND jb.n_status=1  group by jc.category_id ";
		//pr($sql);exit;
		$fetch = $this->apps->fetch($sql,1);	
		return $fetch;
		
		}	
		
	function countmyapplicant($jobid){
		
		global $CONFIG;
	
		$sql = "SELECT count(*) total
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_application where 1  AND `jobboard_id`='{$jobid}'";
		//pr($sql);exit;		  	
		$res = $this->apps->fetch($sql);
		return $res;
		}
	function seemyapplicant(){
		
		global $CONFIG;
		$iduser=strip_tags(@$this->apps->_p('iduse'));  
		$idjob=strip_tags(@$this->apps->_p('idjob')); 
	
		$sql = "SELECT *
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_application where 1 AND `user_id`='{$iduser}' AND `jobboard_id`='{$idjob}'";
		//pr($sql);exit;		  	
		$res = $this->apps->fetch($sql);
		//pr($res);
		return $res;
		}	
	function seemycomplitedata(){
		
		global $CONFIG;
		$iduser=strip_tags(@$this->apps->_p('iduse'));  
		$idjob=strip_tags(@$this->apps->_p('idjob')); 
	
		$sql = "SELECT *
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member where 1 AND `id`='{$iduser}'";
		// pr($sql);exit;		  	
		$res = $this->apps->fetch($sql);
		//pr($res);
		return $res;
		}	
	function listdraft($start=null,$limit=16,$uid){
		
		
		global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
	  
		// $projectid = intval($this->apps->_g('projects'));
		$foredit='';
		$id = intval($this->apps->_request('param'));
		if($id){
		$foredit="AND id_job='{$id}'";
		}
		
		
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
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.job_category as jb left join tbl_talent_seeker tts on jb.talent_seeker_id=tts.id left join job_category jc
 on jb.id_job=jc.jobboard_id WHERE 1 AND jb.n_status=2 {$foredit}";

		$total = $this->apps->fetch($sql);		
		
	//pr($sql);exit;
		if(intval($total['total'])<=$limit) $start = 0;
		
		//GET LIST
		$sql = "select * from tbl_mylookingfor where 1 {$foredit}";
		// pr($sql);exit;
		$checklist = $this->apps->fetch($sql,1);
		
		$sql = "select *,DATE_FORMAT(jb.enddate,'%d/%m/%Y %h:%i %p') as date,jb.provinsi,jb.city from {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard as jb left join tbl_talent_seeker tts on jb.talent_seeker_id=tts.id left join job_category jc
 on jb.id_job=jc.jobboard_id WHERE 1 AND tts.user_id='{$uid}'  AND jb.n_status=2 {$foredit}";
		//pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);
		
		//pr($rqData);exit;
		if($rqData) {
			$no = $start+1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				$rqData[$key] = $val;

				$sql = "SELECT COUNT(*) total_data
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard as jb left join tbl_talent_seeker tts on jb.talent_seeker_id=tts.id left join job_category jc
 on jb.id_job=jc.jobboard_id
						WHERE 1";
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
		
		$result['checklist'] = $checklist;
		$result['result'] = $qData;
		$result['total'] = intval($total['total']);
		//pr($result);exit;
		return $result;
		}
	function draftjob($uid,$filenamenya){
		global $CONFIG;
		//pr($_POST);exit;
		$talent_seeker_id=strip_tags(@$_POST['talent_seeker_id']); 
		$sql = "select id from {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent_seeker where user_id='{$talent_seeker_id}'";
				  	
		$res = $this->apps->fetch($sql,1);
		//pr($sql);exit;
		
	
		
		
		$title = strip_tags(@$this->apps->_p('title'));       
		$description = @$_POST['description'];  
		$requitment =@$_POST['requitment']; 
		$salary = @$_POST['salary'];  
		$category = strip_tags(@$_POST['category']); 
		$provinsi = strip_tags(@$_POST['provincy']); 
		$city = strip_tags(@$_POST['city']); 
		//$endpublish = strip_tags(@$_POST['endpublish']); 
		$endpublish =date('Y-m-d H:i:s', strtotime($this->apps->_p('endpublish'))); 
		$experience=strip_tags(@$_POST['experience']); 
		$agent=strip_tags(@$_POST['agent']); 
		$subcategory=strip_tags(@$_POST['subcategory']); 
	//	pr($subcategory);exit;
		$ts_id=$res[0]['id'];
		
		$datenya =  date('Y-m-d H:i:s'); 
		//pr($startdate);exit;
		
		
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard (`job_title`,`talent_seeker_id`,`job_description`,`requitment`,`salary`, `status_jobs`,`date`,`n_status`,`provinsi`,`city`,`enddate`,`experience`,`agent`,`file`) 
							VALUES ('{$title}','{$ts_id}', '{$description}','{$requitment}','{$salary}', 6,'{$datenya}',6,'{$provinsi }','{$city}','{$endpublish}','{$experience}','{$agent}','{$filenamenya}')";
		//pr($sql);exit;		  	
		$res = $this->apps->query($sql);
		$id_job_cat=$this->apps->getLastInsertId();
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.job_category (`jobboard_id`,`category_id`,`subcategory_id`,`date`,`n_status`) 
							VALUES ('{$id_job_cat}','{$category}','{$subcategory}','{$datenya}',1)";
				  	
		$res = $this->apps->query($sql);
		
	
		if($_POST['check'] != '')
		{
		foreach($_POST['check'] as $item){ 
			$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_mylookingfor (`id_job`,`looking_for`,`date`,`n_status`) 
							VALUES ('{$id_job_cat}','{$item}','{$datenya}',1)";
				  	
				$res = $this->apps->query($sql);
			}
		}
		
		return true;
		}	
		
		
		
	function addjob($uid,$filenamenya){
		global $CONFIG;
		//pr($_POST);exit;
		$talent_seeker_id=strip_tags(@$_POST['talent_seeker_id']); 
		$sql = "select id from {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent_seeker where user_id='{$talent_seeker_id}'";
				  	
		$res = $this->apps->fetch($sql,1);
		//pr($sql);exit;
		
	
		
		
		$title = strip_tags(@$this->apps->_p('title'));       
		$description = @$_POST['description'];  
		$requitment =@$_POST['requitment']; 
		$salary = @$_POST['salary'];  
		$category = strip_tags(@$_POST['category']); 
		$provinsi = strip_tags(@$_POST['provincy']); 
		$city = strip_tags(@$_POST['city']); 
		//$endpublish = strip_tags(@$_POST['endpublish']); 
		$endpublish =date('Y-m-d H:i:s', strtotime($this->apps->_p('endpublish'))); 
		//pr($endpublish);exit;
		$experience=strip_tags(@$_POST['experience']); 
		$agent=strip_tags(@$_POST['agent']); 
		$subcategory=strip_tags(@$_POST['subcategory']); 
	//	pr($subcategory);exit;
		$ts_id=$res[0]['id'];
		
		$datenya =  date('Y-m-d H:i:s'); 
		//pr($startdate);exit;
		
		
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard (`job_title`,`talent_seeker_id`,`job_description`,`requitment`,`salary`, `status_jobs`,`date`,`n_status`,`provinsi`,`city`,`enddate`,`experience`,`agent`,`file`) 
							VALUES ('{$title}','{$ts_id}', '{$description}','{$requitment}','{$salary}', 0,'{$datenya}',0,'{$provinsi }','{$city}','{$endpublish}','{$experience}','{$agent}','{$filenamenya}')";
				  	
		$res = $this->apps->query($sql);
		$id_job_cat=$this->apps->getLastInsertId();
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.job_category (`jobboard_id`,`category_id`,`subcategory_id`,`date`,`n_status`) 
							VALUES ('{$id_job_cat}','{$category}','{$subcategory}','{$datenya}',1)";
				  	
		$res = $this->apps->query($sql);
		
		
		if(@$_POST['check'] != '')
		{
		foreach($_POST['check'] as $item){ 
			$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_mylookingfor (`id_job`,`looking_for`,`date`,`n_status`) 
							VALUES ('{$id_job_cat}','{$item}','{$datenya}',1)";
				  	
				$res = $this->apps->query($sql);
			}
		}
		
		return true;
		}	
	function upsaddjob($uid,$filenamenya){
		global $CONFIG;
		//pr($_POST);exit;
		
		$sql = "select id from {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent where user_id='{$uid}'";
				  	
		$res = $this->apps->fetch($sql,1);
		//pr($sql);exit;
		
	
		
		
		$title = strip_tags(@$this->apps->_p('title'));       
		$description = @$_POST['description'];  
		$requitment =@$_POST['requitment']; 
		$salary = @$_POST['salary'];  
		$category = strip_tags(@$_POST['category']); 
		$provinsi = strip_tags(@$_POST['provincy']); 
		$city = strip_tags(@$_POST['city']); 
		//$endpublish = strip_tags(@$_POST['endpublish']); 
		$endpublish =date('Y-m-d H:i:s', strtotime($this->apps->_p('endpublish'))); 
		$experience=strip_tags(@$_POST['experience']); 
		$agent=strip_tags(@$_POST['agent']); 
		$idjob=strip_tags(@$_POST['idjob']); 
		$subcategory=strip_tags(@$_POST['subcategory']); 
	//	pr($subcategory);exit;
		$ts_id=$res[0]['id'];
		$talent_seeker_id=strip_tags(@$_POST['talent_seeker_id']); 
		$datenya =  date('Y-m-d H:i:s'); 
		//pr($startdate);exit;
		$sql="UPDATE {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard set `job_title`='{$title}',`talent_seeker_id`='{$talent_seeker_id}',`job_description`='{$description}',`requitment`='{$requitment}',`salary`='{$salary}', `status_jobs`=0,`date`='{$datenya}',`n_status`=1,`provinsi`='{$provinsi }',`city`='{$city}',`enddate`='{$endpublish}',`experience`='{$experience}',`agent`='{$agent}',`file`='{$filenamenya}' where id_job={$idjob}";
		
		//pr($sql);exit;
				  	
		$res = $this->apps->query($sql);
		
		$sql = "UPDATE {$CONFIG['DATABASE'][0]['DATABASE']}.job_category set `category_id`='{$category}',`subcategory_id`='{$subcategory}',`date`='{$datenya}',`n_status`=1 where 1 AND jobboard_id='{$idjob}'";
				  	
		$res = $this->apps->query($sql);
		
		
		$sql = "DELETE * from {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_mylookingfor where 1 AND id_job='{$idjob}'";
		//pr($sql);exit;
		$res = $this->apps->query($sql);
		
		
		if($_POST['check'] != '')
		{
		foreach($_POST['check'] as $item){ 
			$sql = " INTO {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_mylookingfor (`id_job`,`looking_for`,`date`,`n_status`) 
							VALUES ('{$idjob}','{$item}','{$datenya}',1)";
				  	
				$res = $this->apps->query($sql);
			}
		}
		
		return true;
		}		
	function upaddjob($uid,$filenamenya){
		global $CONFIG;
		//pr($_POST);exit;
		
		$sql = "select id from {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent where user_id='{$uid}'";
				  	
		$res = $this->apps->fetch($sql,1);
		//pr($sql);exit;
		
	
		
		
		$title = strip_tags(@$this->apps->_p('title'));       
		$description = @$_POST['description'];  
		$requitment =@$_POST['requitment']; 
		$salary = @$_POST['salary'];  
		$category = strip_tags(@$_POST['category']); 
		$provinsi = strip_tags(@$_POST['provincy']); 
		$city = strip_tags(@$_POST['city']); 
		//$endpublish = strip_tags(@$_POST['endpublish']); 
		$endpublish =date('Y-m-d H:i:s', strtotime($this->apps->_p('endpublish'))); 
		$experience=strip_tags(@$_POST['experience']); 
		$agent=strip_tags(@$_POST['agent']); 
		$idjob=strip_tags(@$_POST['idjob']); 
		$subcategory=strip_tags(@$_POST['subcategory']); 
		$talent_seeker_id=strip_tags(@$_POST['talent_seeker_id']); 
	//	pr($subcategory);exit;
		$ts_id=$res[0]['id'];
		$datenya =  date('Y-m-d H:i:s'); 
		//pr($startdate);exit;
		$sql="UPDATE {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard set `job_title`='{$title}',`talent_seeker_id`='{$talent_seeker_id}',`job_description`='{$description}',`requitment`='{$requitment}',`salary`='{$salary}', `status_jobs`=0,`date`='{$datenya}',`n_status`=2,`provinsi`='{$provinsi }',`city`='{$city}',`enddate`='{$endpublish}',`experience`='{$experience}',`agent`='{$agent}',`file`='{$filenamenya}' where id_job={$idjob}";
		
		//pr($sql);exit;
				  	
		$res = $this->apps->query($sql);
		
		$sql = "UPDATE {$CONFIG['DATABASE'][0]['DATABASE']}.job_category set `category_id`='{$category}',`subcategory_id`='{$subcategory}',`date`='{$datenya}',`n_status`=1 where 1 AND jobboard_id='{$idjob}'";
				  	
		$res = $this->apps->query($sql);
		
		
		$sql = "DELETE * from {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_mylookingfor where 1 AND id_job='{$idjob}'";
		//pr($sql);exit;
		$res = $this->apps->query($sql);
		
		
		if($_POST['check'] != '')
		{
		foreach($_POST['check'] as $item){ 
			$sql = " INTO {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_mylookingfor (`id_job`,`looking_for`,`date`,`n_status`) 
							VALUES ('{$idjob}','{$item}','{$datenya}',1)";
				  	
				$res = $this->apps->query($sql);
			}
		}
		
		return true;
		}	
		
	function detail_job($start=null,$limit=10,$id)
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
			WHERE 1 ";
		$total = $this->apps->fetch($sql);		
		
	//pr($sql);exit;
		if(intval($total['total'])<=$limit) $start = 0;
			$sql = "
			select * from job_category jc left join jobboard jb on jb.id_job=jc.jobboard_id where 1 AND jc.category_id={$id} 
			"; 
			//pr($sql);exit;
			$rqData = $this->apps->fetch($sql,1);
	
		if($rqData) {
			$no = $start+1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				$rqData[$key] = $val;

				$sql = "SELECT COUNT(*) total_data
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard
						WHERE 1";
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
	
	function postapplication($jobid,$iduser)
	{
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.my_application (`user_id`,`jobboard_id`,`date`,`n_status`) 
								VALUES ('{$iduser}', '{$jobid}',NOW(),'1')";
		
			$res = $this->apps->query($sql);
	}
	function main_job($start=null,$limit=10,$id=null,$category=null)
	{
	global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
		
		$qlimit='';
		if($limit)
		{
			$qlimit='LIMIT '.$start.','.$limit;
		}
	  
	  
		$detailid='';
		$ssortirapp='';
		$joinsortirapp='';
	
		if ($id == null)
		{
			$detailid = " order by jb.id_job DESC";
		}
		if ($id == 'last')
		{
		$detailid = " order by jb.id_job ASC";
		}else if ($id == 'end')
		{
		$detailid = " order by jb.enddate ASC";
		}else if ($id == 'soon')
		{
		$detailid = "  order by jb.date ASC";
		}else if ($id == 'popular')
		{
		$ssortirapp=',count(ma.jobboard_id) as coba';
		$joinsortirapp=' left join my_application ma on ma.jobboard_id=jb.id_job';
		$detailid = "  order by coba DESC";
		}
		
		
		
		$reqid = intval(@$this->apps->_request('id'));
		$requesti='';
		$joinrequesti='';
		if ($reqid)
		{
			$requesti=" AND id_job='{$reqid}' ";
$joinrequesti= " left join tbl_category tc on jc.category_id=tc.id left join tbl_subcategory ts on jc.subcategory_id=ts.id ";		
		
		}
		
		$cetegorynya='';
		if ($category)
		{
			$yoi=count($category);
			//pr($yoi);	
			$valuenya='';
			$i=0;
				foreach($category as $key => $val)
				{
					$i++;
					if($yoi==1)
					{
					$valuenya.="'".$val."'";
					}
					else if($i <= $yoi)
					{
							if($yoi==$i)
							{
							$valuenya.="'".$val."'";
							}else {
							$valuenya.="'".$val."',";
							}
					
					}
					
				 
				}
			
			//pr($valuenya);
			$cetegorynya=" AND jc.category_id IN ({$valuenya})";	
			
		}
		
		$checkadv=@$_POST['checkadv'];
		//spr($checkadv);exit;
		$checkadvsearch='';
		$jcheckadvsearch='';
		if ($checkadv)
		{
			$yois=count($checkadv);
			//pr($yoi);	
			$valuenyas='';
			$is=0;
				foreach($checkadv as $keys => $vals)
				{
					$is++;
					if($yois==1)
					{
					$valuenyas.="'".$vals."'";
					}
					else if($is <= $yois)
					{
							if($yois==$is)
							{
							$valuenyas.="'".$vals."'";
							}else {
							$valuenyas.="'".$vals."',";
							}
					
					}
					
				 
				}
			
			//pr($valuenya);
			$jcheckadvsearch=" left join tbl_mylookingfor tmf on jb.id_job=tmf.id_job";	
			$checkadvsearch=" and tmf.looking_for in ({$valuenyas})";	
			
		}
		
		
		
		$search = strip_tags($this->apps->_p('nama'));
		$cetegory = $this->apps->_p('cetegory');
		$subcat = $this->apps->_p('subcat');
		$city = $this->apps->_p('city');
		
		$notiftype = intval($this->apps->_p('notiftype'));
		// $publishedtype = intval($this->apps->_p('publishedtype'));
		
		
		//RUN FILTER
		$filter = "";
		$filter = $search=="Search..." ? "" : "AND (tts.nama_perusahaan LIKE '%{$search}%' OR jb.job_title LIKE '%{$search}%')";
		// $filter .= $notiftype!=0 ? " AND notiftype = {$notiftype}" : " AND notiftype = 3";
		// $filter .= $publishedtype ? "AND n_status = {$publishedtype}" : " AND n_status != 3";
		$filter .= $cetegory ? " AND jc.category_id = '{$cetegory}'" : "";
		$filter .= $city ? " AND jb.city = '{$city}'" : "";
		$filter .= $subcat ? " AND jc.subcategory_id = '{$subcat}'" : "";
		//GET TOTAL
		$sql = "SELECT count(*) total
			from {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard as jb left join tbl_talent_seeker tts on jb.talent_seeker_id=tts.id left join job_category jc
 on jb.id_job=jc.jobboard_id{$joinsortirapp} {$jcheckadvsearch} WHERE 1 AND jb.enddate >= NOW()  {$requesti} AND jb.n_status=1 {$checkadvsearch} {$cetegorynya} {$filter}  {$detailid}";

		$total = $this->apps->fetch($sql);		
		
	//pr($sql);exit;
		if(intval($total['total'])<=$limit) $start = 0;
		
		
		
		$sql = "select *,tts.user_id as usertts,DATE_FORMAT(jb.enddate,'%d-%m-%Y') as date,jb.provinsi,SUBSTRING(jb.job_description,1,150) AS deskripsi,jb.city{$ssortirapp} from {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard as jb left join tbl_talent_seeker tts on jb.talent_seeker_id=tts.id left join job_category jc
 on jb.id_job=jc.jobboard_id{$joinsortirapp} {$joinrequesti} {$jcheckadvsearch} WHERE 1 AND jb.enddate >= NOW()  {$requesti} AND jb.n_status=1 {$checkadvsearch} {$cetegorynya} {$filter} group by jb.job_title {$detailid} {$qlimit}";
		//pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);
		//pr($rqData);exit;
		if($rqData=='')
		{
		return false;
		}
		
		//pr($rqData);
		if($rqData) {
			$no = $start+1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				
				$tgl1 = date('d-m-Y');
				//pr($tgl1);exit;		
				$tgl2 =  $val['date']; 
				$selisih = strtotime($tgl2) - strtotime($tgl1); 
				$val['hari'] = $selisih/(60*60*24);
				$sql = "SELECT count(*) totals
					FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_application where 1  AND `jobboard_id`='{$val['id_job']}'";
				//pr($sql);exit;
				$total_registrant = $this->apps->fetch($sql);
				//pr($total_registrant);exit;
				$val['registrant']=$total_registrant['totals'];
				$sql = "SELECT img_avatar FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member where 1  AND `id`='{$val['usertts']}'";
				//pr($sql);exit;
				$img_avatar = $this->apps->fetch($sql);
				$val['img_avatar']=$img_avatar['img_avatar'];
				//pr($img_avatar);exit;
				$sql="select * from tbl_mylookingfor  where id_job='{$val['id_job']}'";
				//pr($sql);exit;
				$rqDataa = $this->apps->fetch($sql,1);
				//pr($rqDataa);exit;
					$arrayfor= array();
				if($rqDataa)
				{
					foreach ($rqDataa as $vals)
					{
						if($vals)
						{
							$arrayfor[]=$vals;
						}
					}
				
				}
				$val['mlfor']=$arrayfor;
				
				$val['fileunserial'] =  unserialize($val['file']); 
				
				//pr($val['fileunserial']);exit;
				
				$rqData[$key] = $val;

				
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
	
	
	
	function listjob($start=null,$limit=10,$id)
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
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard 
			WHERE 1 ";
		$total = $this->apps->fetch($sql);		
		
	//pr($sql);exit;
		if(intval($total['total'])<=$limit) $start = 0;
		$adaid="";
		if($id)
		{
		$adaid="AND id_job={$id}";
		}
		//GET LIST
		$sql = "
			SELECT *,DATE_FORMAT(jb.enddate,'%d/%m/%Y %h:%i %p') as date
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard 
			WHERE 1 {$adaid}
			ORDER BY id_job
				
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
						WHERE 1";
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
	function savejobs(){
		global $CONFIG;
		//pr($_POST);exit;
		
		$title = strip_tags(@$this->apps->_p('title'));       
		$description = @$_POST['description'];  
		$category =strip_tags(@$_POST['category']); 
		$content = @$_POST['content'];  
		$Salary=@$_POST['Salary'];  
		$startdate =  date('Y-m-d H:i:s'); 
		$id=$this->apps->getUserOnline()->id;
		$sqlcheck ="SELECT *
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent_seeker
						WHERE user_id={$id}";
		$rqData = $this->apps->fetch($sqlcheck,1);
		
		if(@$rqData[0]['id'])
		{
			$idtalent_seeker = $rqData[0]['id'];
			
			$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard (`talent_seeker_id`,`job_title`,`job_description`, `requitment`,`salary`,`status_jobs`,`date`,`n_status`) 
								VALUES ('{$idtalent_seeker}', '{$title}','{$description}', '{$content}','{$Salary}','0',NOW(),'1')";
		
			$res = $this->apps->query($sql);
			$result['id']=$this->apps->getLastInsertId();
				if($result['id'])
				{
					$idJobs= $result['id'];
					$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.job_category (`jobboard_id`,`category_id`,`date`,`n_status`) 
								VALUES ('{$idJobs}', '{$category}',NOW(),'1')";
					
					$res = $this->apps->query($sql);
					return true;
				}
		}
		return true;
		}	
		function province(){
		global $CONFIG;
		$sqlcheck ="SELECT *
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.province_reference";
		$rqData = $this->apps->fetch($sqlcheck,1);
		return $rqData;
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
}
	