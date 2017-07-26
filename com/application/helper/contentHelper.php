<?php
class contentHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
		$this->user = $this->apps->session->getSession($this->config['SESSION_NAME'],"WEB");
	}
	

		
	function imgavatar($id){
		global $CONFIG;
		$sql = "select img_avatar from {$CONFIG['DATABASE'][0]['DATABASE']}.social_member where id='{$id}'";
	$fetch = $this->apps->fetch($sql);	
		return $fetch;
		
		}	
	function getcountnotif($id)
	{
		
		$query="select count(*) total,DATE_FORMAT(created_date,'%H:%i %p') as timess ,DATE_FORMAT(created_date,'%d %M') as date,DATEDIFF(CURRENT_DATE(),created_date) as selisihhari from tbl_notification
			where `user_id`='{$id}'  AND DATEDIFF(CURRENT_DATE(),created_date)<=7 and n_status=1
			
			ORDER BY created_date DESC";
		// pr($query);die;
		$rqData = $this->apps->fetch($query);
		// pr($rqData);die;
		return $rqData;
	}
	function listbanner(){
		global $CONFIG;
		$sql = "select * from {$CONFIG['DATABASE'][0]['DATABASE']}.news where category='3' order by id";
		$fetch = $this->apps->fetch($sql,1);	
	
		return $fetch;
		
		}	
	function myemailcheck($email){
		global $CONFIG;
		$sql = "select * from {$CONFIG['DATABASE'][0]['DATABASE']}.social_member where email='{$email}' and n_status !=2";
		$fetch = $this->apps->fetch($sql,1);	
	
		return $fetch;
		
		}
	function mycategory(){
		global $CONFIG;
		$sql = "select * from {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_category tc LEFT JOIN my_subcategory msub ON tc.id=msub.category_id group by tc.id ";
		$fetch = $this->apps->fetch($sql,1);	
			// pr($sql);exit;
		return $fetch;
		
		}		
	function listnews(){
		global $CONFIG;
		$sql = "SELECT *,DATE_FORMAT(`date`,'%d %M %Y') AS `date` FROM {$CONFIG['DATABASE'][0]['DATABASE']}.news WHERE category='2'  and n_status!=2  ORDER BY id DESC LIMIT 3";
		
		$fetch = $this->apps->fetch($sql,1);	
		//pr($fetch);exit;
		return $fetch;
		
		}	
	function checksuspenuser(){
		global $CONFIG;
		$sql = "SELECT * FROM social_member WHERE (n_status = '4' or n_status = '2')  and id ={$this->user->id} ";
		
		$fetch = $this->apps->fetch($sql);	
		//pr($fetch);exit;
		return $fetch;
		
		}	
	function listpress(){
		global $CONFIG;
		$sql = "SELECT *,DATE_FORMAT(`date`,'%d %M %Y') AS `date` FROM {$CONFIG['DATABASE'][0]['DATABASE']}.news WHERE category='1'   and n_status!=2 ORDER BY id DESC LIMIT 3";
		
		$fetch = $this->apps->fetch($sql,1);	
		//pr($fetch);exit;
		return $fetch;
		
		}
	function getemailuser(){
		global $CONFIG;
		$email=$this->apps->_p('email');
		$sql = "SELECT count(1) as total FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member WHERE email='{$email}'";
		
		$fetch = $this->apps->fetch($sql);	
		//pr($fetch);exit;
		return $fetch;
		
		}	
	function getesprotofolio(){
		global $CONFIG;
		$id=$this->apps->_g('idType');
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio WHERE id='{$id}'";
		
		$fetch = $this->apps->fetch($sql);	
		// pr($sql);exit;
		return $fetch;
		
		}	
		
	function listfeaturejobs(){
		global $CONFIG;
		/* $sql = "SELECT *,DATE_FORMAT(`date`,'%d/%m/%Y') AS tanggal FROM {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard WHERE n_status='1'  ORDER BY id_job LIMIT 8"; */
		
		/* $sql = "SELECT *,DATE_FORMAT(`date`,'%d/%m/%Y') AS tanggal FROM {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard jb left join tbl_talent_seeker tts on jb.talent_seeker_id = tts.id where  1 and jb.n_status='1' and n jb.enddate ORDER BY jb.id_job LIMIT 8"; */
		/* $sql="select *,jb.n_status as n_status,tts.user_id as user_id,DATE_FORMAT(jb.enddate,'%d-%m-%Y') as date,jb.provinsi,SUBSTRING(jb.job_description,1,150) AS deskripsi,jb.city,count(ma.jobboard_id) as coba from {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard as jb left join tbl_talent_seeker tts on jb.talent_seeker_id=tts.id left join job_category jc
 on jb.id_job=jc.jobboard_id left join my_application ma on ma.jobboard_id=jb.id_job   WHERE 1 AND jb.enddate >= NOW()   AND jb.n_status=1   AND (tts.nama_perusahaan LIKE '%%' OR jb.job_title LIKE '%%') group by jb.job_title   order by coba DESC LIMIT 0,8"; */

		$sql="select *,jb.n_status as n_status,tts.user_id as usertts,DATE_FORMAT(jb.enddate,'%d-%m-%Y') as date,jb.provinsi,jb.job_description AS deskripsi,jb.city from {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard as jb left join tbl_talent_seeker tts on jb.talent_seeker_id=tts.id left join job_category jc
 on jb.id_job=jc.jobboard_id   WHERE 1 AND jb.enddate >= NOW()   AND jb.n_status=1   AND (tts.nama_perusahaan LIKE '%%' OR jb.job_title LIKE '%%') group by jb.job_title  order by jb.id_job DESC LIMIT 0,8";
		//pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);	
		// pr($rqData);die;
		if($rqData) {
			$no = 1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				$tgl1 = date('d-m-Y');
			
				$sql = "SELECT user_id
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent_seeker where 1  AND `user_id`='{$val['user_id']}'";
				$fetchuser=$this->apps->fetch($sql,1);
				//pr($fetchuser);exit;
				foreach($fetchuser as $keys => $vals){
				$sql = "SELECT img_avatar
					FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member where 1  AND `id`='{$vals['user_id']}'";
				//pr($sql);exit;
				$applicant = $this->apps->fetch($sql,1);
				}
				$applicant = $this->apps->fetch($sql,1);
				//pr($applicant);exit;
				$val['applicantresult']=$applicant[0]['img_avatar'];
				$val['job_description']=strip_tags($val['job_description']);
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
	function listfaq(){
		global $CONFIG;
		$sql = "SELECT *,DATE_FORMAT(`date`,'%d/%m/%Y') AS tanggal FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_faq WHERE n_status='1'  ORDER BY id";
		
		$rqData = $this->apps->fetch($sql,1);	
				//pr($rqData);exit;
		if($rqData) {
			$no = 1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				
				$tgl1 = date('d-m-Y');
				//pr($tgl1);exit;		
				$tgl2 =  $val['date']; 
				$selisih = strtotime($tgl2) - strtotime($tgl1); 
				$val['hari'] = $selisih/(60*60*24);
				
				$rqData[$key] = $val;

				
			}
			//pr($rqData);exit;
			if($rqData) $qData=	$rqData;
			else $qData = false;
		} else $qData = false;
		
		
		$result['result'] = $qData;
	
		return $result;
	
		
		}		
	function listfeatureuser(){
		global $CONFIG;
		$result['result'] = false;
		$result['total'] = 0;
		
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval(8);
	  
		// $projectid = intval($this->apps->_g('projects'));
		
	
		
		$sortval="";

		if($sorting!=NULL)
		{
		//pr('ss');exit;
			$sortval="ORDER BY {$sorting} DESC";
		
		}else
		{//pr('ss');exit;
			$sortval="ORDER BY sm.love_count DESC,sm.view_count DESC";
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
		$wherejoincat=" and sm.role=1 and sm.n_status=1 and tt.privacy=1";
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
			SELECT sm.id,sm.img_avatar,sm.name,sm.lastname,sm.view_count,sm.love_count,sm.follow_count{$selectcat}
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member sm {$joincat} {$jcheckadvsearch} {$querysub}
			left join tbl_talent tt on sm.id=tt.user_id  WHERE 1 {$wherejoincat} {$filter} {$checkadvsearch} {$andsub} group by sm.id {$sortval} 
			LIMIT {$start},{$limit}
				
	";
	// pr($sql);exit;
	// pr($sql);
		$rqData = $this->apps->fetch($sql,1);
		// pr($rqData);exit;
		if($rqData) {
			$no = $start+1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				
				$idnyauser=@$this->user->id;
					/*$sqlcheck ="select *,mc.id as idnya from {$CONFIG['DATABASE'][0]['DATABASE']}.my_attribut_category mc
			left join tbl_category tc on mc.category_id=tc.id
			 left join tbl_subcategory ts on mc.subcategory_id=ts.id
			where mc.user_id='{$val['id']}' group by mc.category_id";*/
			$sqlcheck ="select *,mc.id as idnya,mca.category_id as category_id,tc.category_name as category_name from my_category mca
			left join tbl_category tc on mca.category_id=tc.id
			LEFT JOIN my_attribut_category mc ON mca.user_id = mc.user_id
			
			 left join tbl_subcategory ts on mc.subcategory_id=ts.id
			where mca.user_id='{$val['id']}' group by mca.category_id order by ts.id"; 
		//pr($sqlcheck);
		$catuser = $this->apps->fetch($sqlcheck,1);
		//pr($catuser);exit;
				$val['catuser'] = $catuser;
				$sql = "select * from {$CONFIG['DATABASE'][0]['DATABASE']}.my_love me where me.user_id='{$idnyauser}' and me.friend_id='{$val['id']}'";
				//pr($val['id']);
				$likenyauser = $this->apps->fetch($sql);
				//pr($likenyauser);
				if($likenyauser)
				{
				$val['likenyauser']=$likenyauser['friend_id'];
				}
		
				
				$sql = "SELECT COUNT(*) total_data
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member
						WHERE 1";
			
				$total_registrant = $this->apps->fetch($sql);
				$rqData[$key] = $val;
				$rqData[$key]['total'] = intval($total_registrant['total_data']);
				//pr($rqData[$key]['total']);exit;
			}
			//pr($rqData);exit;
			if($rqData) $qData=	$rqData;
			else $qData = false;
		} else $qData = false;
		
		$result['result'] = $qData;
		$result['total'] = intval($total['total']);
		// pr($result);exit;
		return $result;
		
		}
	function popular()
	{
	global $CONFIG;
		
		$sql = "SELECT sm.id,sm.img_avatar,sm.name,sm.view_count,sm.love_count,sm.follow_count,tc.category_name
			FROM social_member sm left join my_category mc on sm.id=mc.user_id left join tbl_category tc on mc.category_id=tc.id  
			left join tbl_talent tt on sm.id=tt.user_id  WHERE 1  and sm.role=1 and sm.n_status=1 and tt.privacy=1  group by sm.id ORDER BY love_count DESC,sm.view_count DESC 
			LIMIT 0,8";
		//pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);
		
		
		
		return $rqData;
		//pr($rqData);exit;
	}
function sendactiveagainMail(){
	
	
	
	global $CONFIG;
	//pr($_POST);exit;
	
	GLOBAL $ENGINE_PATH, $CONFIG, $LOCALE;
	require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
	//require_once $ENGINE_PATH."Utility/PHPMailer/class.smtp.php";	
		
		$base64 = urldecode64($this->apps->_request('code'));
		 $content = unserialize($base64);
		 // pr($content);die;
		$sql="SELECT * FROM  social_member where id={$content['userid']} LIMIT 1 ";
		$fetch = $this->apps->fetch($sql);
		$email=$fetch ['email'];
		$to = $email;
		
	
	
		
		$mail = new PHPMailer();
					
			$mail->isSMTP();        
			
			$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];
			$mail->Hostname   = $CONFIG['EMAIL_SMTP_HOST'];			// sets the SMTP server
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->SMTPSecure = "tsl";
		        $mail->Port       = $CONFIG['EMAIL_SMTP_PORT'];                    // set the SMTP port for the GMAIL server
			$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
			$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
			
			$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
			$mail->FromName = 'Creasi';
		$mail->addAddress($to, $email);  // Add a recipient
		
		$mail->Subject    = "Contact";
		
		$mail->WordWrap = 50;
	
		$mail->isHTML(true);
		$mail->MsgHTML($this->email_template_activeagain($fetch));

		$result = $mail->Send();
		
		return $result;
			
		
	}
function sendhelpsMail(){
	
	GLOBAL $ENGINE_PATH, $CONFIG, $LOCALE;
	require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
	$name=strip_tags($this->apps->_p('name'));
	$email=strip_tags($this->apps->_p('email'));
	$subject=$this->apps->_p('subject');
	$message=$this->apps->_p('message');
	$to ="wahyu.priyanto@kana.co.id";
	// echo"ssss";die;
			$mail = new PHPMailer();
					
			$mail->isSMTP();        
			
			$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];
			$mail->Hostname   = $CONFIG['EMAIL_SMTP_HOST'];			// sets the SMTP server
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->SMTPSecure = "tsl";
		        $mail->Port       = $CONFIG['EMAIL_SMTP_PORT'];                    // set the SMTP port for the GMAIL server
			$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
			$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
			
			$mail->From = $email;
			$mail->FromName = $name;
		$mail->addAddress($to, $to);  // Add a recipient
		
		$mail->Subject    = $subject;
		
		$mail->WordWrap = 50;
	
		$mail->isHTML(true);
		$tmplate=$LOCALE[1]['email']['helpuser'];
		$tmplate=str_replace('{$body}',$message,$tmplate);
		$tmplate=str_replace('{$name}',$name,$tmplate);
		$tmplate=str_replace('{$urlprofile}',$CONFIG['BASE_DOMAIN'].'personal/view/'.$this->user->id,$tmplate);
		$mail->MsgHTML($tmplate);
	
		$result = $mail->Send();
		// pr('ssss');
		// pr($mail);die;
		return $result;
			
		
	}
function email_template_activeagain($fetch){
		global $CONFIG;
		
		$template = '<html>
						<head>
						<title>creasi</title>
						<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
						</head>
						<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
						<table id="Table_01" width="650" border="0" cellpadding="0" cellspacing="0" style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#898989;">
						
						
						<tr><td></td></tr>
						<tr><h2 style="font-size:24px; color:#FFF; margin:0; padding:10px 30px;">Pesan Baru</h2></td></tr>
						<table id="" width="100%" border="0" cellpadding="10" cellspacing="0" style=" margin-left:-10px; color:#898989;">
						
						<tr>
							
							<td>:Hi</td>
						</tr>
						<tr>
							
							<td>Akun Anda sudah di active silahkan login  <a href="'.$CONFIG['BASE_DOMAIN'].'login/">login</a></td>
						</tr>
						<tr>
							<td colspan=2></td>
						</tr>
						</table>
						
						
						</body>
						</html>';
		return $template;
	}
function senddeactiveMail($id){
	
	
	
	global $CONFIG;
	//pr($_POST);exit;
	
	GLOBAL $ENGINE_PATH, $CONFIG, $LOCALE;
	require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
		
		
		// $email=strip_tags($this->apps->_p('email'));
		// $name=strip_tags($this->apps->_p('name'));
		$sql="SELECT * FROM  social_member where id={$id} LIMIT 1 ";
		$fetch = $this->apps->fetch($sql);
		$email=$fetch ['email'];
		$to = $email;
		
	
	
		
		$mail = new PHPMailer();
					
			$mail->isSMTP();        
			
			$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];
			$mail->Hostname   = $CONFIG['EMAIL_SMTP_HOST'];			// sets the SMTP server
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->SMTPSecure = "tsl";
		        $mail->Port       = $CONFIG['EMAIL_SMTP_PORT'];                    // set the SMTP port for the GMAIL server
			$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
			$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
			
			$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
			$mail->FromName = 'Creasi';
		$mail->addAddress($to, $email);  // Add a recipient
		
		$mail->Subject    = $LOCALE[1]['EMAIL_SUBSCRIBES']['deactive_subject'];
		
		$mail->WordWrap = 50;
	
		$mail->isHTML(true);
		$tmplate=$LOCALE[1]['EMAIL_SUBSCRIBES']['deactive'];
		$tmplate=str_replace('{$name}',$fetch ['name'],$tmplate);
		$encrypteddata = urlencode64(serialize(array(
				'status'=>'1',
				'key'=>'crasikana',
				'userid'=>$fetch['id'],	 
				'email'=>$fetch['email'],
				'name'=>$fetch['name'],
				'role'=>$fetch['role']
			)));
			
		$tmplate=str_replace('{$url}',$CONFIG['BASE_DOMAIN'].'deactive/activation/'.$encrypteddata,$tmplate);
		$mail->MsgHTML($tmplate);

		$result = $mail->Send();
		
		return $result;
			
		
	}
function email_template_deactive($fetch){
		global $CONFIG;
		$encrypteddata = urlencode64(serialize(array(
				'status'=>'1',
				'key'=>'crasikana',
				'userid'=>$fetch['id'],	 
				'email'=>$fetch['email']
				
			)));
			// pr($fetch);die;
		$template = '<html>
						<head>
						<title>creasi</title>
						<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
						</head>
						<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
						<table id="Table_01" width="650" border="0" cellpadding="0" cellspacing="0" style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#898989;">
						
						
						<tr><td></td></tr>
						<tr><h2 style="font-size:24px; color:#FFF; margin:0; padding:10px 30px;">Pesan Baru</h2></td></tr>
						<table id="" width="100%" border="0" cellpadding="10" cellspacing="0" style=" margin-left:-10px; color:#898989;">
						
						<tr>
							
							<td>:Hi '.@$fetch['name'].'</td>
						</tr>
						<tr>
							
							<td>Akun Anda sudah di non active kan untuk active kembali  klik link <a href="'.$CONFIG['BASE_DOMAIN'].'deactivets/activation/'.$encrypteddata.'">aktive</a></td>
						</tr>
						<tr>
							<td colspan=2></td>
						</tr>
						</table>
						
						
						</body>
						</html>';
		return $template;
	}
function sendaktivasiMail($id){
	
	
	
	global $CONFIG;
	//pr($_POST);exit;
	
	GLOBAL $ENGINE_PATH, $CONFIG, $LOCALE;
	require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
		$sql="SELECT * FROM  social_member where id={$id} LIMIT 1 ";
		$fetch = $this->apps->fetch($sql);
		
		$email=$fetch['email'];
		$name=$fetch['name'];
		$role=$fetch['role'];
		$to = $email;
		
	
	
		
		$mail = new PHPMailer();
					
			$mail->isSMTP();        
			
			$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];
			$mail->Hostname   = $CONFIG['EMAIL_SMTP_HOST'];			// sets the SMTP server
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->SMTPSecure = "tsl";
		        $mail->Port       = $CONFIG['EMAIL_SMTP_PORT'];                    // set the SMTP port for the GMAIL server
			$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
			$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
			
			$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
			$mail->FromName = 'Creasi';
		$mail->addAddress($to, $email);  // Add a recipient
		
		$mail->Subject    = $LOCALE[1]['EMAIL_SUBSCRIBES']['verification']['hasjoin_subject'];
		
		$mail->WordWrap = 50; 
	
		$mail->isHTML(true);
		$tmplate=$LOCALE[1]['EMAIL_SUBSCRIBES']['verification']['hasjoin'];
		$tmplate=str_replace('{$name}',$name,$tmplate);
		$encrypteddata = urlencode64(serialize(array(
				'status'=>'1',
				'key'=>'crasikana',
				'userid'=>$id,	 
				'email'=>$email,
				'role'=>$role,
				'name'=>$name
				
			)));
		
		
		$tmplate=str_replace('{$linkveremail}',$CONFIG['BASE_DOMAIN'].'registration/activation/'.$encrypteddata,$tmplate);
		
			$mail->MsgHTML($tmplate);

		$result = $mail->Send();
		
		return $result;
			
		
	}
	
	function email_template_activation($name='',$email='',$id=''){
		global $CONFIG;
		$encrypteddata = urlencode64(serialize(array(
				'status'=>'1',
				'key'=>'crasikana',
				'userid'=>$id,	 
				'email'=>$email
				
			)));
		$template = '<html>
						<head>
						<title>creasi</title>
						<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
						</head>
						<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
						<table id="Table_01" width="650" border="0" cellpadding="0" cellspacing="0" style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#898989;">
						
						
						<tr><td></td></tr>
						<tr><h2 style="font-size:24px; color:#FFF; margin:0; padding:10px 30px;">Pesan Baru</h2></td></tr>
						<table id="" width="100%" border="0" cellpadding="10" cellspacing="0" style=" margin-left:-10px; color:#898989;">
						
						<tr>
							
							<td>:Hi '.$name.'</td>
						</tr>
						<tr>
							
							<td>:selamat anda sudah registrasi klik link <a href="'.$CONFIG['BASE_DOMAIN'].'registration/activation/'.$encrypteddata.'">aktive</a></td>
						</tr>
						<tr>
							<td colspan=2></td>
						</tr>
						</table>
						
						
						</body>
						</html>';
		return $template;
	}
function resendMail(){
	
	
	
	global  $ENGINE_PATH, $CONFIG, $LOCALE;
	//pr($_POST);exit;
	
	
	
		
		$email=$this->apps->_p('email');
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member WHERE email='{$email}'";
		$result['status']=1;
		$result['msg']='proses gagal ulangi lagi';
		$fetch = $this->apps->fetch($sql);	
		if($fetch)
		{
			require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
			$email=strip_tags($this->apps->_p('email'));
			$name=$fetch['name'];
				$id=$fetch['id'];
			$to = $email;
			
		
		
			
			$mail = new PHPMailer();
					
			$mail->isSMTP();        
			
			$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];
			$mail->Hostname   = $CONFIG['EMAIL_SMTP_HOST'];			// sets the SMTP server
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->SMTPSecure = "tsl";
		        $mail->Port       = $CONFIG['EMAIL_SMTP_PORT'];                    // set the SMTP port for the GMAIL server
			$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
			$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
			
			$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
			$mail->FromName = 'Creasi';
			$mail->addAddress($to, $email);  // Add a recipient
			
			$mail->Subject    = $LOCALE[1]['EMAIL_SUBSCRIBES']['verification']['hasjoin_subject'];
			
			$mail->WordWrap = 50;
		
			$mail->isHTML(true);
			
			$tmplate=$LOCALE[1]['EMAIL_SUBSCRIBES']['verification']['hasjoin'];
			$tmplate=str_replace('{$name}',$name,$tmplate);
			$encrypteddata = urlencode64(serialize(array(
				'status'=>'1',
				'key'=>'crasikana',
				'userid'=>$fetch['id'],	 
				'email'=>$fetch['email'],
				'name'=>$fetch['name'],
				'role'=>$fetch['role']
				
			)));
		
		
			$tmplate=str_replace('{$linkveremail}',$CONFIG['BASE_DOMAIN'].'registration/activation/'.$encrypteddata,$tmplate);
		
			
			
			$mail->MsgHTML($tmplate);

			$hasil = $mail->Send();
			
			$result['status']=1;
			$result['msg']='sucsess';
		}
		else
		{
			$result['status']=0;
			$result['msg']='To login, you must verify your email first. Please check your email and click on the link we sent you. If you have not received the email, click the resend button below.';
		}
		return $result;
			
		
	}
	function email_template_resend($name='',$email='',$id=''){
		global $CONFIG;
		$encrypteddata = urlencode64(serialize(array(
				'status'=>'1',
				'key'=>'crasikana',
				'userid'=>$id,	 
				'email'=>$email
				
			)));
		$template = '<html>
						<head>
						<title>creasi</title>
						<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
						</head>
						<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
						<table id="Table_01" width="650" border="0" cellpadding="0" cellspacing="0" style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#898989;">
						
						
						<tr><td></td></tr>
						<tr><h2 style="font-size:24px; color:#FFF; margin:0; padding:10px 30px;">Pesan Baru</h2></td></tr>
						<table id="" width="100%" border="0" cellpadding="10" cellspacing="0" style=" margin-left:-10px; color:#898989;">
						
						<tr>
							
							<td>:Hi '.$name.'</td>
						</tr>
						<tr>
							
							<td>selamat anda sudah registrasi klik link <a href="'.$CONFIG['BASE_DOMAIN'].'registration/activation/'.$encrypteddata.'">aktive</a></td>
						</tr>
						<tr>
							<td colspan=2></td>
						</tr>
						</table>
						
						
						</body>
						</html>';
		return $template;
	}	
function profileshare()
{
		global $CONFIG,$ENGINE_PATH,$LOCALE;
		
		$result['status']=1;
		$result['msg']='proses gagal ulangi lagi';
		$userid=$this->apps->_p('userid');
		$sql = "SELECT sm.*,
				tt.user_id,
				mp.id as idportofolio,
				tt.id as id_talent,
				 sm.view_count,
				 sm.love_count 
				FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent tt 
				left join social_member as sm on tt.user_id=sm.id 
				left join my_portofolio as mp on sm.id=mp.user_id 
				where sm.id='{$userid}' limit 1 ";

		$fetch = $this->apps->fetch($sql);
		if($fetch)
		{
			require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
			$email=strip_tags($this->apps->_p('email'));
			
			$to = $email;
			$explodemail=explode(',',$email);
			
			
			$idprofile=$fetch['user_id'];
			$name=$fetch['name'];
			
			if($explodemail)
			{
				foreach($explodemail as $value)
				{
					$mail = new PHPMailer();
					
					$mail->isSMTP();        
					
					$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];
					$mail->Hostname   = $CONFIG['EMAIL_SMTP_HOST'];			// sets the SMTP server
					$mail->SMTPAuth   = true;                  // enable SMTP authentication
					$mail->SMTPSecure = "tsl";
						$mail->Port       = $CONFIG['EMAIL_SMTP_PORT'];                    // set the SMTP port for the GMAIL server
					$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
					$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
					
					$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
					$mail->FromName = 'Creasi';
					
					
					$mail->addAddress($value, $value);
					$mail->Subject    = $LOCALE[1]['EMAIL_SUBSCRIBES']['share']['profile_subject'];
			
					$mail->WordWrap = 50;
				
					$mail->isHTML(true);
					$template=$LOCALE[1]['EMAIL_SUBSCRIBES']['share']['profile'];
					$template=str_replace('{$linkprofile}',$CONFIG['BASE_DOMAIN'].'personal/view?id='.$idprofile,$template);
					$template=str_replace('{$name}',$name,$template);
					if($this->user)
					{
						$template=str_replace('{$urlprofile}',$CONFIG['BASE_DOMAIN'].'personal/view?id='.$this->user->id,$template);
					}
					else
					{
						$template=str_replace('{$urlprofile}','',$template);
					}
					$mail->MsgHTML($template);

					$hasil = $mail->Send();
				}
			}
			else
			{
					$mail = new PHPMailer();
					
					$mail->isSMTP();        
					
					$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];
					$mail->Hostname   = $CONFIG['EMAIL_SMTP_HOST'];			// sets the SMTP server
					$mail->SMTPAuth   = true;                  // enable SMTP authentication
					$mail->SMTPSecure = "tsl";
						$mail->Port       = $CONFIG['EMAIL_SMTP_PORT'];                    // set the SMTP port for the GMAIL server
					$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
					$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
					
					$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
					$mail->FromName = 'Creasi';
					
					
					
					$mail->addAddress($to, $email);
					$mail->Subject    = $LOCALE[1]['EMAIL_SUBSCRIBES']['share']['profile_subject'];
			
					$mail->WordWrap = 50;
				
					$mail->isHTML(true);
					$template=$LOCALE[1]['EMAIL_SUBSCRIBES']['share']['profile'];
					$template=str_replace('{$linkprofile}',$CONFIG['BASE_DOMAIN'].'personal/view?id='.$idprofile,$template);
					$template=str_replace('{$name}',$name,$template);
					if($this->user)
					{
						$template=str_replace('{$urlprofile}',$CONFIG['BASE_DOMAIN'].'personal/view?id='.$this->user->id,$template);
					}
					else
					{
						$template=str_replace('{$urlprofile}','',$template);
					}
					$mail->MsgHTML($template);

					$hasil = $mail->Send();
			}
			  // Add a recipient
			
			
			
			$result['status']=1;
			$result['msg']='proses berhasil';
		}
		else
		{
			$result['status']=0;
			$result['msg']='user tidak terdaftar';
		}
		return $result;

}
function joinshare()
{
		global $CONFIG,$ENGINE_PATH,$LOCALE;
		
		$result['status']=1;
		$result['msg']='proses gagal ulangi lagi';
		$userid=$this->apps->_p('userid');
		$sql = "SELECT *
				FROM social_member 
				where id='{$userid}' limit 1 ";

		$fetch = $this->apps->fetch($sql);
		if($fetch)
		{
			require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
			$email=strip_tags($this->apps->_p('email'));
			
			$to = $email;
			$explodemail=explode(',',$email);
			
			
			$idprofile=$fetch['id'];
			$name=$fetch['name'];
			
			if($explodemail)
			{
				foreach($explodemail as $value)
				{
					$mail = new PHPMailer();
					
					$mail->isSMTP();        
					
					$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];
					$mail->Hostname   = $CONFIG['EMAIL_SMTP_HOST'];			// sets the SMTP server
					$mail->SMTPAuth   = true;                  // enable SMTP authentication
					$mail->SMTPSecure = "tsl";
						$mail->Port       = $CONFIG['EMAIL_SMTP_PORT'];                    // set the SMTP port for the GMAIL server
					$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
					$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
					
					$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
					$mail->FromName = 'Creasi';
					
					$mail->addAddress($value, $value);
					$mail->Subject    = $LOCALE[1]['share']['email']['join_subject'];
						
						$mail->WordWrap = 50;
						
						$mail->isHTML(true);
						$template=$LOCALE[1]['share']['email']['join'];
						$template=str_replace('{$name}',$name,$template);
						$template=str_replace('{$urlprofile}',$CONFIG['BASE_DOMAIN'].'personal/view?id='.$idprofile,$template);
						$mail->MsgHTML($template);

						$hasil = $mail->Send();

				}
			}
			else
			{
					$mail = new PHPMailer();
					
					$mail->isSMTP();        
					
					$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];
					$mail->Hostname   = $CONFIG['EMAIL_SMTP_HOST'];			// sets the SMTP server
					$mail->SMTPAuth   = true;                  // enable SMTP authentication
					$mail->SMTPSecure = "tsl";
						$mail->Port       = $CONFIG['EMAIL_SMTP_PORT'];                    // set the SMTP port for the GMAIL server
					$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
					$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
					
					$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
					$mail->FromName = 'Creasi';
					
					
					$mail->addAddress($to, $email);
					
					// Add a recipient
			
						$mail->Subject    = $LOCALE[1]['share']['email']['join_subject'];
						
						$mail->WordWrap = 50;
					
						$mail->isHTML(true);
						$template=$LOCALE[1]['share']['email']['join'];
						$template=str_replace('{$name}',$name,$template);
						$template=str_replace('{$urlprofile}',$CONFIG['BASE_DOMAIN'].'personal/view?id='.$idprofile,$template);
						$mail->MsgHTML($template);

						$hasil = $mail->Send();

			}
			  
			// pr($LOCALE[1]['share']['email']['join_subject']);die; 
			$result['status']=1;
			$result['msg']='proses berhasil';
		}
		else
		{
			$result['status']=0;
			$result['msg']='user tidak terdaftar';
		}
		return $result;

}
function email_template_profileshare($idprofile,$name){
		global $CONFIG;
		
		$template = '<html>
						<head>
						<title>creasi</title>
						<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
						</head>
						<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
						<table id="Table_01" width="650" border="0" cellpadding="0" cellspacing="0" style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#898989;">
						
						
						<tr><td></td></tr>
						<tr><h2 style="font-size:24px; color:#FFF; margin:0; padding:10px 30px;">Pesan Baru</h2></td></tr>
						<table id="" width="100%" border="0" cellpadding="10" cellspacing="0" style=" margin-left:-10px; color:#898989;">
						
						<tr>
							
							<td>Halo Teman Kreatif, </td>
						</tr>
						<tr>
							<td> nama saya : </a>
							<td> '.$name.'</td>
						</tr>
						<tr>
							<td> Lihat profil saya di : </a>
							<td> <a href="'.$CONFIG['BASE_DOMAIN'].'personal/view?id='.$idprofile.'" >www.creasi.co.id.</a></td>
						</tr>
						
						
						
						</table>
						
						
						</body>
						</html>';
		return $template;
	}	
function portofolioshare()
{
		global $CONFIG,$ENGINE_PATH;
		
		$result['status']=1;
		$result['msg']='proses gagal ulangi lagi';
		$userid=$this->apps->_p('userid');
		$sql = "SELECT sm.*,
				tt.user_id,
				mp.id as idportofolio,
				mp.type as typeportofolio,
				tt.id as id_talent,
				 sm.view_count,
				 sm.love_count 
				FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent tt 
				left join social_member as sm on tt.user_id=sm.id 
				left join my_portofolio as mp on sm.id=mp.user_id 
				where mp.id='{$userid}' limit 1 ";
		// pr($sql);exit;
		$fetch = $this->apps->fetch($sql);
		if($fetch)
		{
			require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
			$email=strip_tags($this->apps->_p('email'));
			
			$to = $email;
			$explodemail=explode(',',$email);
			
			
			$idprofile=$fetch['user_id'];
			$name=$fetch['name'];
			
			if($explodemail)
			{
				foreach($explodemail as $value)
				{
					$mail = new PHPMailer();
					
					$mail->isSMTP();        
					
					$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];
					$mail->Hostname   = $CONFIG['EMAIL_SMTP_HOST'];			// sets the SMTP server
					$mail->SMTPAuth   = true;                  // enable SMTP authentication
					$mail->SMTPSecure = "tsl";
						$mail->Port       = $CONFIG['EMAIL_SMTP_PORT'];                    // set the SMTP port for the GMAIL server
					$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
					$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
					
					$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
					$mail->FromName = 'Creasi';
					
					
					$mail->addAddress($value, $value);
					
					$mail->Subject    = $LOCALE[1]['EMAIL_SUBSCRIBES']['share']['portofolio_subject'];
			
					$mail->WordWrap = 50;
				
					$mail->isHTML(true);
						$template=$LOCALE[1]['EMAIL_SUBSCRIBES']['share']['portofolio'];
						
					if($fetch['typeportofolio']=='1')
					{
						$linkportofolio= $CONFIG['BASE_DOMAIN'].'portofolio/?images='.$fetch['id'].'&id='.$fetch['user_id'];
					}
					elseif($fetch['typeportofolio']=='2')
					{
						$linkportofolio= $CONFIG['BASE_DOMAIN'].'portofolio/?video='.$fetch['id'].'&id='.$fetch['user_id'];
					}
					elseif($fetch['typeportofolio']=='3')
					{
						$linkportofolio= $CONFIG['BASE_DOMAIN'].'portofolio/?audio='.$fetch['id'].'&id='.$fetch['user_id'];
					
					}
					$template=str_replace('{$linkportofilio}',$linkportofolio,$template);
					$template=str_replace('{$name}',$name,$template);
					$template=str_replace('{$urlprofile}',$CONFIG['BASE_DOMAIN'].'personal/view?id='.$idprofile,$template);
					$mail->MsgHTML($template);

					$hasil = $mail->Send();
				}
			}
			else
			{
					$mail = new PHPMailer();
					
					$mail->isSMTP();        
					
					$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];
					$mail->Hostname   = $CONFIG['EMAIL_SMTP_HOST'];			// sets the SMTP server
					$mail->SMTPAuth   = true;                  // enable SMTP authentication
					$mail->SMTPSecure = "tsl";
						$mail->Port       = $CONFIG['EMAIL_SMTP_PORT'];                    // set the SMTP port for the GMAIL server
					$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
					$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
					
					$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
					$mail->FromName = 'Creasi';
					
					$mail->addAddress($to, $email);
					$mail->Subject    = $LOCALE[1]['EMAIL_SUBSCRIBES']['share']['portofolio_subject'];
			
					$mail->WordWrap = 50;
				
					$mail->isHTML(true);
						$template=$LOCALE[1]['EMAIL_SUBSCRIBES']['share']['portofolio'];
						
					if($fetch['typeportofolio']=='1')
					{
						$linkportofolio= $CONFIG['BASE_DOMAIN'].'portofolio/?images='.$fetch['id'].'&id='.$fetch['user_id'];
					}
					elseif($fetch['typeportofolio']=='2')
					{
						$linkportofolio= $CONFIG['BASE_DOMAIN'].'portofolio/?video='.$fetch['id'].'&id='.$fetch['user_id'];
					}
					elseif($fetch['typeportofolio']=='3')
					{
						$linkportofolio= $CONFIG['BASE_DOMAIN'].'portofolio/?audio='.$fetch['id'].'&id='.$fetch['user_id'];
					
					}
					$template=str_replace('{$linkportofilio}',$linkportofolio,$template);
					$template=str_replace('{$name}',$name,$template);
					$template=str_replace('{$urlprofile}',$CONFIG['BASE_DOMAIN'].'personal/view?id='.$idprofile,$template);
					$mail->MsgHTML($template);

					$hasil = $mail->Send();
			}
			  // Add a recipient
			
			
			
			$result['status']=1;
			$result['msg']='proses berhasil';
		}
		else
		{
			$result['status']=0;
			$result['msg']='user tidak terdaftar';
		}
		return $result;

}
function email_template_protofolioshare($fetch){
		global $CONFIG;
		
		$template = '<html>
						<head>
						<title>creasi</title>
						<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
						</head>
						<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
						<table id="Table_01" width="650" border="0" cellpadding="0" cellspacing="0" style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#898989;">
						
						
						<tr><td></td></tr>
						<tr><h2 style="font-size:24px; color:#FFF; margin:0; padding:10px 30px;">Pesan Baru</h2></td></tr>
						<table id="" width="100%" border="0" cellpadding="10" cellspacing="0" style=" margin-left:-10px; color:#898989;">
						
						<tr>
							
							<td>Halo Teman Kreatif, </td>
						</tr>
						<tr>
							<td> nama saya : </a>
							<td> '.$fetch['name'].'</td>
						</tr>
						<tr>
							<td> Lihat portofolio saya di : </a>';
							if($fetch['typeportofolio']=='1')
							{
								$template .= '<td> <a href="'.$CONFIG['BASE_DOMAIN'].'portofolio/?images='.$fetch['id'].'&id='.$fetch['user_id'].'" >www.creasi.co.id.</a></td>
								</tr>';
							}
							elseif($fetch['typeportofolio']=='2')
							{
								$template .= '<td> <a href="'.$CONFIG['BASE_DOMAIN'].'portofolio/?video='.$fetch['id'].'&id='.$fetch['user_id'].'" >www.creasi.co.id.</a></td>
								</tr>';
							}
							elseif($fetch['typeportofolio']=='3')
							{
								$template .= '<td> <a href="'.$CONFIG['BASE_DOMAIN'].'portofolio/?audio='.$fetch['id'].'&id='.$fetch['user_id'].'" >www.creasi.co.id.</a></td>
								</tr>';
							}
							
							$template .= '
						</table>
						
						
						</body>
						</html>';
		return $template;
	}		
function jobsshare()
{
		global $CONFIG,$ENGINE_PATH,$LOCALE;
		// ini_set('error_reporting', E_ALL);
		$result['status']=1;
		$result['msg']='proses gagal ulangi lagi';
		$jobsid=$this->apps->_p('jobsid');
		$sql = "SELECT  jb.*,ts.nama_perusahaan FROM jobboard jb 
				LEFT JOIN tbl_talent_seeker ts ON jb.talent_seeker_id=ts.id
				LEFT JOIN social_member sm ON ts.user_id=sm.id
				where jb.id_job='{$jobsid}' limit 1 ";

		$fetch = $this->apps->fetch($sql);
		// pr($fetch);die;
		if($fetch)
		{
			if($fetch['share_count']==0 || $fetch['share_count']=='')
			{
					$sqlupdate ="UPDATE  jobboard set share_count='1' where id_job='{$jobsid}'";
		
					$rqupdate = $this->apps->query($sqlupdate);
			}
			else
			{
					$sqlupdate ="UPDATE  jobboard set share_count=share_count+1 where id_job='{$jobsid}'";
		
					$rqupdate = $this->apps->query($sqlupdate);
			}
			
			
			require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
			require_once $ENGINE_PATH."Utility/PHPMailer/class.smtp.php";
			$email=strip_tags($this->apps->_p('email'));
			
			$to = $email;
			$explodemail=explode(',',$email);
			
			
			
			
			
			if($explodemail)
			{
				foreach($explodemail as $value)
				{
					$mail = new PHPMailer();
					
					$mail->isSMTP();        
					
					$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];
					$mail->Hostname   = $CONFIG['EMAIL_SMTP_HOST'];			// sets the SMTP server
					$mail->SMTPAuth   = true;                  // enable SMTP authentication
					$mail->SMTPSecure = "tsl";
						$mail->Port       = $CONFIG['EMAIL_SMTP_PORT'];                    // set the SMTP port for the GMAIL server
					$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
					$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
					
					$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
					$mail->FromName = 'Creasi';
					
					
					
					$mail->addAddress($value, $value);
					
										$mail->Subject    = str_replace('{$jobtitle}',$fetch['job_title'],$LOCALE[1]['share']['email']['jobs_subject']);
					
					$mail->WordWrap = 50;
				
					$mail->isHTML(true);
					$template=$LOCALE[1]['share']['email']['jobs'];
					$template=str_replace('{$jobtitle}',$fetch['job_title'],$template);	
					$template=str_replace('{$idjob}',$fetch['id_job'],$template);	
					$mail->MsgHTML($template);

					$hasil = $mail->Send();

				}
			}
			else
			{
					$mail = new PHPMailer();
					
					$mail->isSMTP();        
					
					$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];
					$mail->Hostname   = $CONFIG['EMAIL_SMTP_HOST'];			// sets the SMTP server
					$mail->SMTPAuth   = true;                  // enable SMTP authentication
					$mail->SMTPSecure = "tsl";
						$mail->Port       = $CONFIG['EMAIL_SMTP_PORT'];                    // set the SMTP port for the GMAIL server
					$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
					$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
					
					$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
					$mail->FromName = 'Creasi';
					$mail->addAddress($to, $email);
					// Add a recipient
			
					$mail->Subject    = str_replace('{$jobtitle}',$fetch['job_title'],$LOCALE[1]['share']['email']['jobs_subject']);
					
					$mail->WordWrap = 50;
				
					$mail->isHTML(true);
					$template=$LOCALE[1]['share']['email']['jobs'];
					$template=str_replace('{$jobtitle}',$fetch['job_title'],$template);	
					$template=str_replace('{$idjob}',$fetch['id_job'],$template);	
					$mail->MsgHTML($template);

					$hasil = $mail->Send();
			}
			  
			// echo"s232sss";die;
			$result['status']=1;
			$result['msg']='proses berhasil';
		}
		else
		{
			$result['status']=0;
			$result['msg']='user tidak terdaftar';
		}
		return $result;

}
function email_template_jobsshare($fetch){
		global $CONFIG;
		
		$template = '<html>
						<head>
						<title>creasi</title>
						<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
						</head>
						<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
						<table id="Table_01" width="650" border="0" cellpadding="0" cellspacing="0" style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#898989;">
						
						
						<tr><td></td></tr>
						<tr><h2 style="font-size:24px; color:#FFF; margin:0; padding:10px 30px;">Pesan Baru</h2></td></tr>
						<table id="" width="100%" border="0" cellpadding="10" cellspacing="0" style=" margin-left:-10px; color:#898989;">
						
						<tr>
							
							<td>Hello Creative People, </td>
						</tr>
						<tr>
							<td> There is a job vacancy as a '.$fetch['job_title'].' and I thought you would be interested. Make sure you have a complete profile at <a href="'.$CONFIG['BASE_DOMAIN'].'jobboard/detail_jobboard?id='.$fetch['id_job'].'" >www.creasi.co.id.</a> to apply for this job.
 </td>
							
						</tr>
						
						<tr>
							<td> Warm regards,</td>
							
						</tr>
						
						
						</table>
						
						Customer Relations Team <br>
						www.creasi.co.id <br>
						telp. (021) 7050 8952/53 <br>
						</body>
						</html>';
		return $template;
	}	
function forgotMail(){
	
	
	
	global  $ENGINE_PATH, $CONFIG, $LOCALE;
	//pr($_POST);exit;
	
	
	
		
		$email=$this->apps->_p('email');
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member WHERE email='{$email}'"; 
		$result['status']=1;
		$result['msg']='proses gagal ulangi lagi';
		$fetch = $this->apps->fetch($sql);	
		if($fetch)
		{
			if($fetch['n_status']==1)
			{
				require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
				$email=strip_tags($this->apps->_p('email'));
				$name=$fetch['name'];
				$username=$fetch['username'];
					
				$to = $email;
				
				
				$encrypteddata = urlencode64(serialize(array(
					'status'=>'1',
					'key'=>'crasikana',
					'userid'=>$fetch['id'],	 
					'email'=>$email,
					'username'=>$username,
					'date'=>date('ymd')
					
				)));
				
				
				$subject = $LOCALE[1]['EMAIL_SUBSCRIBES']['forgot']['changepassword_subject'];
				
				
				
				
				
				$templateEmail = $LOCALE[1]['EMAIL_SUBSCRIBES']['forgot']['changepassword'];
				$templateEmail =str_replace('{$name}',$fetch['name'],$templateEmail);
				$templateEmail =str_replace('{$linkreset}',$CONFIG['BASE_DOMAIN'].'forgot/changepassword/'.$encrypteddata,$templateEmail);
				$mail = new PHPMailer();
						
				$mail->isSMTP();        
				
				$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];
				$mail->Hostname   = $CONFIG['EMAIL_SMTP_HOST'];			// sets the SMTP server
				$mail->SMTPAuth   = true;                  // enable SMTP authentication
				$mail->SMTPSecure = "tsl";
					$mail->Port       = $CONFIG['EMAIL_SMTP_PORT'];                    // set the SMTP port for the GMAIL server
				$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
				$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
				
				$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
				$mail->FromName = 'Creasi';
				$mail->addAddress($to, $email);  // Add a recipient
				
				$mail->Subject    = $subject ;
				
				$mail->WordWrap = 50;
			
				$mail->isHTML(true);
				$mail->MsgHTML($templateEmail);

				$hasil = $mail->Send();
				
				$result['status']=1;
				$result['msg']="Sorry, we couldn't find anyone with that email address";
			}
			else
			{
				$result['status']=1;
				$result['msg']="Sorry, we couldn't find anyone with that email address";
			
			}
	}
		else
		{
			$result['status']=0;
			$result['msg']="Sorry, we couldn't find anyone with that email address";
		}
		return $result;
			
		
	}
	function email_template_forgot($fetch){
		global $CONFIG;
		
		$template = '<html>
						<head>
						<title>creasi</title>
						<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
						</head>
						<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
						<table id="Table_01" width="650" border="0" cellpadding="0" cellspacing="0" style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#898989;">
						
						
						<tr><td></td></tr>
						<tr><h2 style="font-size:24px; color:#FFF; margin:0; padding:10px 30px;">Pesan Baru</h2></td></tr>
						<table id="" width="100%" border="0" cellpadding="10" cellspacing="0" style=" margin-left:-10px; color:#898989;">
						
						<tr>
							
							<td>:Hi '.$name.'</td>
						</tr>
						<tr>
							<td> Username : </a>
							<td>'.$username.'</td>
						</tr>
						
						<tr>
							<td>Untuk mereset password anda silahkan klik/td>
							<td><a href="'.$CONFIG['BASE_DOMAIN'].'login">login</a></td>
						</tr>
						
						</table>
						
						
						</body>
						</html>';
		return $template;
	}		
	
	
function sendaktivasiendMail(){
	
	
	
	
	GLOBAL $ENGINE_PATH, $CONFIG, $LOCALE;
	require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
		
		$base64 = urldecode64($this->apps->_request('code'));
		 $content = unserialize($base64);
		$email=$content['email'];
		// $email='wahyu.priyanto@kana.co.id';
		$name=@$content['name'];
		$role=@$content['role'];	
		$to = $email;
		
		
		
		$sqlupdate ="UPDATE  social_member set n_status='1' where id='{$content['userid']}'";
		
		$rqupdate = $this->apps->query($sqlupdate);
	
		
		$sqlChcek ="SELECT  * FROM  social_member  where id='{$content['userid']}' and login_count > 0";
		
		$rqChcek = $this->apps->fetch($sqlChcek);	
		
		
		// if($rqChcek)
		// {
			// return true;
		// }
		if($rqChcek)
		{
			return true;
		}
		// pr('sss');die;
		$mail = new PHPMailer();
					
			$mail->isSMTP();        
			
			$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];
			$mail->Hostname   = $CONFIG['EMAIL_SMTP_HOST'];			// sets the SMTP server
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->SMTPSecure = "tsl";
		        $mail->Port       = $CONFIG['EMAIL_SMTP_PORT'];                    // set the SMTP port for the GMAIL server
			$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
			$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
			
			$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
			
		if($role==1)
		{
			$mail->Subject    = $LOCALE[1]['EMAIL_SUBSCRIBES']['ct']['welcome_subject'];
			$template = $LOCALE[1]['EMAIL_SUBSCRIBES']['ct']['welcome'];
			$template = str_replace('{$name}',$name,$template);
			$mail->MsgHTML($template);
		}
		else
		{
			$mail->Subject    = $LOCALE[1]['EMAIL_SUBSCRIBES']['ts']['welcome_subject'];
			$template = $LOCALE[1]['EMAIL_SUBSCRIBES']['ts']['welcome'];
			$template = str_replace('{$name}',$name,$template);
			$mail->MsgHTML($template);
		
		}
			$mail->FromName = 'Creasi';
			$mail->addAddress($to, $email);
				
			$mail->WordWrap = 500000000;
		
			$mail->isHTML(true);
			$result = $mail->Send();
			// pr($mail);die;
		return $result;
			
	}
	function email_template_activationend($name=''){
		global $CONFIG;
		
		$template = '<html>
						<head>
						<title>creasi</title>
						<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
						</head>
						<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
						<table id="Table_01" width="650" border="0" cellpadding="0" cellspacing="0" style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#898989;">
						
						
						<tr><td></td></tr>
						<tr><h2 style="font-size:24px; color:#FFF; margin:0; padding:10px 30px;">Pesan Baru</h2></td></tr>
						<table id="" width="100%" border="0" cellpadding="10" cellspacing="0" style=" margin-left:-10px; color:#898989;">
						
						<tr>
							
							<td>:Hi '.$name.'</td>
						</tr>
						<tr>
							
							<td>selamat account anda sudah aktive silahkan login dengan klik  <a href="'.$CONFIG['BASE_DOMAIN'].'login">login</a></td>
						</tr>
						<tr>
							<td colspan=2></td>
						</tr>
						</table>
						
						
						</body>
						</html>';
		return $template;
	}			
	protected function encrypt($string)
	{	
		$ENC_KEY='youknowwho2014';
		return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($ENC_KEY), $string, MCRYPT_MODE_CBC, md5(md5($ENC_KEY))));
	}
	protected function decrypt($encrypted)
	{
		$ENC_KEY='youknowwho2014';
		return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($ENC_KEY), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($ENC_KEY))), "\0");
	}
	function migrationprovincy()
	{
		// echo"ssas";die;
		$sql = "SELECT * FROM province "; 
		
		$fetch = $this->apps->fetch($sql,1);
		// pr($fetch);die;
		foreach ($fetch as $row)
		{
			$query="insert into province_reference set
				`id`='{$row['id']}',
				`province`='{$row['name']}'";
		 
			$qdata = $this->apps->query($query);
		
		}
	}
	function migrationcity()
	{
		// echo"ssas";die;
		$sql = "SELECT *,city.id as  city_id FROM city LEFT JOIN province_reference ON city.province_id=province_reference.id  "; 
		
		$fetch = $this->apps->fetch($sql,1);
		// pr($fetch);die;
		foreach ($fetch as $row)
		{
			$query="insert into city_reference set
				`id`='{$row['city_id']}',
				`provinceName`='{$row['province']}',
				`city`='{$row['name']}',
				`provinceid`='{$row['province_id']}',
				 `n_status`='0'
				";
		 
			$qdata = $this->apps->query($query);
		
		}
	}
	function migrationcategory()
	{
		// echo"ssas";die;
		$sql = "SELECT * from category_creasi "; 
		
		$fetch = $this->apps->fetch($sql,1);
		// pr($fetch);die;
		foreach ($fetch as $row)
		{
			$query="insert into tbl_category set
				`id`='{$row['id']}',
				`category_name`='{$row['category']}',
				`date`=NOW(),
				 `n_status`='1'
				";
		 
			$qdata = $this->apps->query($query);
		
		}
	}
	function migrationsubcategory()
	{
		// echo"ssas";die;
		$sql = "SELECT * from category_sub_creasi "; 
		
		$fetch = $this->apps->fetch($sql,1);
		// pr($fetch);die;
		foreach ($fetch as $row)
		{
			$query="insert into tbl_subcategory set
				`id`='{$row['id']}',
				`category_id`='{$row['cat_id']}',
				`name_subcategory`='{$row['sub_category']}',
				`date`=NOW(),
				 `n_status`='1'
				";
		 // pr($query);die;
			$qdata = $this->apps->query($query);
		
		}
	}
}
	
