<?php
class talentHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	function popular()
	{
	global $CONFIG;
		
		$sql = "SELECT sm.id,sm.img_avatar,sm.name,sm.view_count,sm.love_count,sm.follow_count,tc.category_name
			FROM social_member sm left join my_category mc on sm.id=mc.user_id left join tbl_category tc on mc.category_id=tc.id  
			left join tbl_talent tt on sm.id=tt.user_id  WHERE 1  and sm.role=1 and sm.n_status=1    group by sm.id ORDER BY love_count DESC 
			LIMIT 0,10";
		//pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);
		
		
		
		return $rqData;
		//pr($rqData);exit;
	}
	function categoryasli(){
		global $CONFIG;
		$sql = "select *,(select count(*) as nilaijumlah from social_member sm
left join my_category mc on sm.id=mc.user_id 
left join tbl_category tc on mc.category_id=tc.id where tc.category_name =tbl_category.category_name and sm.n_status=1  group by tc.category_name) as total from tbl_category";
		
		$fetch = $this->apps->fetch($sql,1);	
		return $fetch;
		
		}
	function category(){
		global $CONFIG;
		$sql = "select tc.category_name as cat,count(*) as nilaijumlah from {$CONFIG['DATABASE'][0]['DATABASE']}.social_member sm left join my_category mc on sm.id=mc.user_id left join tbl_category tc on mc.category_id=tc.id where category_name != '' and sm.n_status=1  group by tc.category_name";
		
		$fetch = $this->apps->fetch($sql,1);	
		return $fetch;
		
		}
	function ajaxlike($id,$friend){
		global $CONFIG;
		
		$sql = "select * from my_love where user_id='{$id}' and friend_id='{$friend}' ";
		//pr($sql);exit;
		$res = $this->apps->fetch($sql,1);
	//	pr($res);exit;
		if($res=='')
		{//echo "ss";exit;
		$sql = "insert my_love set user_id='{$id}', date=NOW(),friend_id='{$friend}',n_status=1 ";
		$res = $this->apps->query($sql,1);
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.social_member set love_count=love_count+1 where id='{$friend}'";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
			$sql = "select love_count from {$CONFIG['DATABASE'][0]['DATABASE']}.social_member  where id='{$friend}'";
		//pr($sql);exit;
		$res= $this->apps->fetch($sql,1);
		
		
		$sqlfriend = "select * from {$CONFIG['DATABASE'][0]['DATABASE']}.social_member  where id='{$id}'";
		//pr($sql);exit;
		$resfriend= $this->apps->fetch($sqlfriend);
		$links='<a herf="'.$CONFIG['BASE_DOMAIN'].'personal/view?id='.$resfriend['id'].'" >'.$resfriend['name'].'</a>';
		if($resfriend['name'])
		{
			$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_notification
			
			(`user_id`,`subject`,`detail`,`created_date`,`n_status`) 
			VALUES ('{$friend}','{$resfriend['name']} has liked ','".$links." has liked your profile.',NOW(),1)";

				// pr($sql); 	
			$res = $this->apps->query($sql);
		}
		
		}else{
		
		$sql = "delete from my_love where user_id='{$id}' and friend_id='{$friend}' ";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.social_member set love_count=love_count-1 where id='{$friend}'";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
	
		$sql = "select love_count from {$CONFIG['DATABASE'][0]['DATABASE']}.social_member  where id='{$friend}'";
		//pr($sql);exit;
		$res= $this->apps->fetch($sql,1);
		}
		//pr($res);exit;
		
		return $res;
		
		}
	function select_category(){
		global $CONFIG;
		$sql = "select id,category_name as cat from {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_category";
		$fetch = $this->apps->fetch($sql,1);	
		return $fetch;
		
		}
	function sub_category($id){
		global $CONFIG;
		$sql = "select id,category_id,name_subcategory from {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_subcategory where category_id={$id}";
		$fetch = $this->apps->fetch($sql,1);
	
	
		return $fetch;
		
		}	
	function city(){
		global $CONFIG;
		$sql = "select tc.category_name as cat,count(*) as nilaijumlah from {$CONFIG['DATABASE'][0]['DATABASE']}.social_member sm left join my_category mc on sm.id=mc.user_id left join tbl_category tc on mc.category_id=tc.id where category_name != '' group by tc.category_name";
		$fetch = $this->apps->fetch($sql,1);	
		return $fetch;
		
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
	function listtalentadvsearch($start=null,$limit=12){
	
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
			$scategory="AND mc.category_id = '3'";
		}
		$subcat = strip_tags($this->apps->_p('subcat'));
		$sucategory="";
		if($subcat != '')
		{
			$sucategory="AND tsub.id='9'";
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
		
			FROM social_member sm 
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
			FROM social_member sm 
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
	function listtalent($start=null,$limit=12,$sorting=null){
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
			$sortval="ORDER BY {$sorting} DESC";
		
		}else
		{//pr('ss');exit;
			$sortval="ORDER BY sm.love_count DESC";
		}
		
		$joincategory = @$_POST['joincategory'];
		$joincat='';
		$wherejoincat='';
		$selectcat="";
		
		if(@$_POST['joincategory'][0]!='')
		{
		//echo "ss";exit;
			$yoi=count($joincategory);
			//pr($yoi);	
			$valuenya='';
			$i=0;
			foreach($joincategory as $key => $val)
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
			
		$selectcat=",tc.category_name";
		$joincat="left join my_category mc on sm.id=mc.user_id left join tbl_category tc on mc.category_id=tc.id";
		$wherejoincat="and sm.role=1 and sm.n_status=1 and tc.category_name IN ({$valuenya})";
		}else{
		$selectcat=",tc.category_name";
		$joincat="left join my_category mc on sm.id=mc.user_id left join tbl_category tc on mc.category_id=tc.id";
		//$wherejoincat="and category_name != ''";
		$wherejoincat=" and sm.role=1 and sm.n_status=1";
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
			$jcheckadvsearch="left join my_loking_for mlf on mlf.user_id=sm.id";	
			$checkadvsearch="and mlf.loking_for_id IN ({$valuenyas})";
			
		}
		
		
		//pr($_POST);
		$search = strip_tags($this->apps->_p('nama'));
		$cetegory = $this->apps->_p('cetegory');
		$subcat = $this->apps->_p('subcat');
		$querysub='';
		$andsub='';
		if($subcat)
		{
		//echo "ss";exit;
		$querysub=" left join my_subcategory ms on ms.user_id=sm.id ";
		$andsub=" and ms.subcategory_id='{$subcat}' ";
			
		}
		
		
		
			"left join my_loking_for mlf on mlf.user_id=sm.id";
			"and mlf.loking_for_id IN (1,2)";
		
		$city = $this->apps->_p('city');
		$sex = $this->apps->_p('sex');
		
		$notiftype = intval($this->apps->_p('notiftype'));
		// $publishedtype = intval($this->apps->_p('publishedtype'));
		
		
		//RUN FILTER
		$filter = "";
		if($search)
		{
		$filter = $search=="Search..." ? "" : "AND (sm.name LIKE '%{$search}%' )";
		}
		// $filter .= $notiftype!=0 ? " AND notiftype = {$notiftype}" : " AND notiftype = 3";
		// $filter .= $publishedtype ? "AND n_status = {$publishedtype}" : " AND n_status != 3";
		$filter .= $cetegory ? " AND tc.id = '{$cetegory}'" : "";
		$filter .= $city ? " AND sm.city = '{$city}'" : "";
		$filter .= $sex ? " AND sm.sex = '{$sex}'" : "";
	
		
		
		
		
		//GET TOTAL
		$sql = "SELECT count(DISTINCT sm.id) total
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member sm {$joincat} {$jcheckadvsearch} {$querysub}
			WHERE 1 {$wherejoincat} {$filter} {$checkadvsearch} {$andsub}";
		$total = $this->apps->fetch($sql);		
		
	//pr($sql);exit;
		if(intval($total['total'])<=$limit) $start = 0;
		
		//GET LIST
		$sql = "
			SELECT sm.id,sm.img_avatar,sm.name,sm.view_count,sm.love_count,sm.follow_count{$selectcat}
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member sm {$joincat} {$jcheckadvsearch} {$querysub}
			left join tbl_talent tt on sm.id=tt.user_id  WHERE 1 {$wherejoincat} {$filter} {$checkadvsearch} {$andsub} group by sm.id {$sortval} 
			LIMIT {$start},{$limit}
				
	";// pr($sql);exit;
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
					
	
		
}
	