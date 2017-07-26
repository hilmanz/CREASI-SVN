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
	
	
	
	

	function listcategory()
	{
		global $CONFIG;
		$sql = "SELECT *
			FROM  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_category where n_status=1 GROUP BY category_name order by category_name ASC ";
		$result = $this->apps->fetch($sql,1);	
		
		return $result;
	}
	function listcategoryproto()
	{
		global $CONFIG;
		$this->user = $this->apps->session->getSession($this->config['SESSION_NAME'],"WEB");
		$sql = "SELECT tbl_category.*
			FROM  {$CONFIG['DATABASE'][0]['DATABASE']}.my_category
			LEFT JOIN 
			tbl_category   ON my_category.category_id=tbl_category.id

			where my_category.user_id={$this->user->id} GROUP BY category_name order by tbl_category.id ASC";
			// pr($sql );die;
		$result = $this->apps->fetch($sql,1);	
		
		return $result;
	}
	function getSubcategory()
	{
		global $CONFIG;
		$result['status']=0;
		$result['msg']='tidak ada subcategory';
		$id=@$this->apps->_p('categoryid');
		if($id)
		{
			$sql = "SELECT *
			FROM  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_subcategory where category_id={$id} and n_status=1  order by name_subcategory ASC ";
			$result['status']=1;
			$result['msg']='berhasil';
			$result['data'] = $this->apps->fetch($sql,1);
		}
			
		
		return $result;
	}
	function listalbum($start=null,$limit=10)
	{
		global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
	  
		
		$search = strip_tags($this->apps->_p('search'));
		$notiftype = intval($this->apps->_p('notiftype'));
		$startdate = $this->apps->_p('startdate');
		$enddate = $this->apps->_p('enddate');
		
		//RUN FILTER
		$filter = "";
		$filter = $search=="Search..." ? "" : "AND (name LIKE '%{$search}%' )";
		$filter .= $enddate ? " AND postdate < '{$enddate}'" : "";
		
		//GET TOTAL
		$sql = "SELECT count(*) as total
			FROM  {$CONFIG['DATABASE'][0]['DATABASE']}.my_folder ";
		$total = $this->apps->fetch($sql);		
		
		if(intval($total['total'])<=$limit) $start = 0;
		
		//GET LIST
		$sql = "
			SELECT *
			FROM  {$CONFIG['DATABASE'][0]['DATABASE']}.my_folder 
			WHERE 1 ORDER BY id_folder DESC LIMIT {$start},{$limit}
				
	"; 
	//pr($sql);exit;
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
		$result['total'] = intval($total['total']);
		//pr($result);exit;
		return $result;
	}
	function addgallery($filephoto=null){
		global $CONFIG;
	
		$title = strip_tags($this->apps->_p('title'));       
		$caption = $_POST['caption'];  
		$folder = intval($this->apps->_p('folder')); 
		$type = '1'; 
		$photo = $filephoto; 		
		$startdate =  date('Y-m-d H:i:s', strtotime($this->apps->_p('startdate'))); 
		//pr($startdate);exit;
		
		
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.gallery (`title`, `caption`,`type`,`folder`,`photo`,`date`,`n_status`) 
							VALUES ('{$title}', '{$caption}', '{$type}','{$folder}','{$photo}',now(),1)";
		//pr($sql);exit;		  	
		$res = $this->apps->query($sql);
		return $res;
		}
	function addFolder(){
		global $CONFIG;
	
		$nameFolder = strip_tags($this->apps->_p('nameFolder'));       
		$caption = $_POST['caption'];    
		
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.my_folder (`name_folder`,`caption_folder`, `date`,`n_status`) 
							VALUES ('{$nameFolder}','{$caption}',now(),1)";
		//pr($sql);exit;		  	
		$res = $this->apps->query($sql);
		return $res;
		}	
	function getFolder(){
		global $CONFIG;
	
		
		$sql = "select * from {$CONFIG['DATABASE'][0]['DATABASE']}.my_folder ";
		
		$res = $this->apps->fetch($sql,1);
		//pr($res);exit;
		return $res;
		}
	function ambilfolder($idfolder){
		global $CONFIG;
	
		//pr('ss');exit;
		$sql = "select * from {$CONFIG['DATABASE'][0]['DATABASE']}.my_folder where id_folder='{$idfolder}' ";
	//	pr($sql);exit;
		$res = $this->apps->fetch($sql);
		
		return $res;
		}
	function editfolder(){
		global $CONFIG;
		$title = strip_tags($this->apps->_p('nameFolder'));       
		$caption = $_POST['caption'];  
		$idnya =strip_tags( $this->apps->_p('id')); 
		//pr('ss');exit;
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.my_folder set name_folder='{$title}',caption_folder='{$caption}' where id_folder='{$idnya}' ";
	// pr($sql);exit;
		$res = $this->apps->query($sql);
		
		return $res;
		}

		
	function editgallery($id,$filephoto){
		global $CONFIG;
	
		$title = strip_tags($this->apps->_p('title'));       
		$caption = strip_tags($this->apps->_p('caption'));  
		$folder = intval($this->apps->_p('folder')); 
		$type = '1'; 
		$photo ="";
		if($filephoto)
		{
			$photo =",photo='{$filephoto}'";
		}
		$startdate =  date('Y-m-d H:i:s', strtotime($this->apps->_p('startdate')));
		
		$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.gallery set `title`='{$title}',`caption`='{$caption}',`folder`='{$folder}'{$photo},`date`='{$startdate}' where id_gallery='{$id}'";
			 
		$res = $this->apps->query($sql);
		return $res;
		}	
	function deletegallery($id){
		global $CONFIG;
		$sql = "select * from {$CONFIG['DATABASE'][0]['DATABASE']}.gallery where id_gallery='{$id}' ";
		$res = $this->apps->fetch($sql);
		
		$sql = "UPDATE   {$CONFIG['DATABASE'][0]['DATABASE']}.gallery set n_status='3' where id_gallery={$id}";
		//pr($sql);exit;
				  	
		$res = $this->apps->query($sql);
		return $res;
		}	
	function deletefolder($id){
		global $CONFIG;
		$sql = "delete from {$CONFIG['DATABASE'][0]['DATABASE']}.my_folder where id_folder='{$id}' ";
		//pr($sql);exit;
		$res = $this->apps->fetch($sql);
		
		return $res;
		}		
	
	function selectupdatedata($uid){
		global $CONFIG;
	
		//pr($startdate);exit;
		
		
		$sql = "SELECT *
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio
			WHERE user_id='{$uid}'";
		$res = $this->apps->fetch($sql);
		if($res != "")
		{
		$halaman=unserialize($res['images']);
		//pr($halaman);exit;
		foreach($halaman['halaman_gallery'] as $k=>$v)
				{
						
						$data['halaman_foto'][$k]['urut']=$k+1;
						$data['halaman_foto'][$k]['nama']=$v;
				}		
		//pr($halaman);exit;
		return $data;
		}
		return false;
		}
	
	
	function addgalery($filephoto,$uid){
		global $CONFIG;
	
	//	PR('ss');exit	;	
		$photo = $filephoto; 		
		$startdate =  date('Y-m-d H:i:s', strtotime($this->apps->_p('startdate'))); 
		//pr($startdate);exit;
		$sql = "select * from {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio where user_id='{$uid}' ";
		$res = $this->apps->fetch($sql);
		
		if($res=='')
		{
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio (`images`,`user_id`,`date`,`n_status`) 
							VALUES ('{$filephoto}','{$uid}',now(),1)";
		
		}else {
		$sql = "UPDATE {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio set `images`='{$filephoto}',`user_id`='{$uid}',`date`=now(),`n_status`=1";
		
		}
		
		
		
		$res = $this->apps->query($sql);
		return $res;
		}
		}
