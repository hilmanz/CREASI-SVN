<?php
global $ENGINE_PATH;
include_once $ENGINE_PATH.'pdf/html2pdf.class.php';
include_once $ENGINE_PATH.'utility/tcpdf/tcpdf.php';
class dashboardHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
		
	}
	function deactivets()
	{
		global $CONFIG;
		
		$id=$this->apps->user->id;
		if($id)
		{
			$explain=$this->apps->_p('explain');
		
			$reason=$this->apps->_p('reason');
	

			$sql = " REPLACE INTO `deactive_ts` (`user_id`, `explain`, `reason`, `date`,`n_status`) VALUES 
			('{$id}', '{$explain}','{$reason}',NOW(),1)";
		
			$res = $this->apps->query($sql);	
			$sql = " UPDATE social_member set n_status=2 where id='{$id}' ";
		
			$res = $this->apps->query($sql);
			return true;
		}
		
		return false;
	}
		
	function jobupdate()
	{
		global $CONFIG;
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard limit 5 ";
		$fecth = $this->apps->fetch($sql,1);		
		return $fecth;
	}
		function notibar($id)
	{
		global $CONFIG;
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_info where id='{$id}'";
		$fecth = $this->apps->fetch($sql,1);		
		return $fecth;
	}
	function statuspersonnoshow()
	{
		global $CONFIG;
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.my_application set `marking`=1 ,hire='' where user_id='{$_POST['idnya']}' ";
		$fecth = $this->apps->query($sql,1);	
		
		 $sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member where id='{$_POST['idnya']}'";
		$fecth = $this->apps->fetch($sql);
		// pr( $fecth);
	   if($fecth)
	   {
			
			 $sqlCheck = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.gm_notifikasi where user_id='{$_POST['idnya']}' and title='Not Show'";
			$fecthCheck = $this->apps->fetch($sqlCheck);
			if($fecthCheck)
			{
				return true;
			}
			$iduser=$fecth['id'];
			$message='<a href="'.$CONFIG['ADMIN_DOMAIN'].'personalmanagement/detail?id='.$fecth['id'].' "> '.$fecth['name'].' </a> not show interview'; 
			$query="insert into gm_notifikasi set
						`user_id`='{$iduser}',
						`title`='Not Show',
						`detail`='{$message}',
						`date`=NOW(),
						`n_status`=1
						";
			$qdata = $this->apps->query($query);
		}
		
		return true;
	}
	function statuspersonhire()
	{
		global $CONFIG;
		
		
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.my_application set `marking`='' ,hire=1 where user_id='{$_POST['idnya']}' ";
		$fecth = $this->apps->query($sql,1);		

		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member where id='{$_POST['idnya']}'";
                $fecth = $this->apps->fetch($sql);
                // pr( $fecth);
           	if($fecth)
           	{

                        $sqlCheck = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.gm_notifikasi where user_id='{$_POST['idnya']}' and title='Hired'";
                        $fecthCheck = $this->apps->fetch($sqlCheck);
                        if($fecthCheck)
                        {
                                return true;
                        }
                        $iduser=$fecth['id'];
                        $message='<a href="'.$CONFIG['ADMIN_DOMAIN'].'personalmanagement/detail?id='.$fecth['id'].' "> '.$fecth['name'].' </a> is Hired';
                        $query="insert into gm_notifikasi set
                                                `user_id`='{$iduser}',
                                                `title`='Hired',
                                                `detail`='{$message}',
                                                `date`=NOW(),
                                                `n_status`=1
                                                ";
                        $qdata = $this->apps->query($query);
                }

		return true;
	}
	function checkinterview()
	{
		global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		$jobsid=$this->apps->_p('jobsid');
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
	function interview_job($start=null,$limit=5,$uid)
	{
		global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
	 
	
		
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
		$sortir=@$_POST['sortir'];
		$orderby='';
		if($sortir == 'new')
		{
		$orderby='order by jb.date DESC';
		}
		if($sortir == 'clostes')
		{
		$orderby='order by jb.enddate DESC';
		}
		if($sortir == 'accepted')
		{
		$orderby='and  ma.interview=2 ';
		}
		//GET TOTAL
		$sql = "SELECT count(*) total
			from {$CONFIG['DATABASE'][0]['DATABASE']}.my_application as ma left join jobboard jb on ma.jobboard_id=jb.id_job
left join tbl_talent_seeker tts on tts.id=jb.talent_seeker_id 			where 1 and ma.interview IN (1,2,3) and ma.user_id='{$uid}' {$orderby} ";

		$total = $this->apps->fetch($sql);		
		
	// pr($sql);
		if(intval($total['total'])<=$limit) $start = 0;
		
	
		
		$sql = "select *,jb.love_count as love_count,DATE_FORMAT(ma.interview_date,'%d %M %Y %h:%i%p') as interview_date from {$CONFIG['DATABASE'][0]['DATABASE']}.my_application as ma left join jobboard jb on ma.jobboard_id=jb.id_job  left join tbl_talent_seeker tts
on tts.id=jb.talent_seeker_id left join social_member sm on sm.id=tts.user_id where 1 and ma.interview IN (1,2,3) and ma.user_id='{$uid}' {$orderby} LIMIT {$start},{$limit}";
		// pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);
		//pr($rqData);exit;
		
		
		//pr($rqData);exit;
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
				$sql = "SELECT *,DATE_FORMAT(interview_date,'%d %M %Y %h:%i%p') as interview_date
					FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_application where 1  AND `jobboard_id`='{$val['id_job']}'";
				//pr($sql);exit;
				$applicant = $this->apps->fetch($sql,1);
				//pr($applicant);exit;
				$val['applicantresult']=$applicant;
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
	function updatedecisionajaxinterview($idjobs)
	{
				global   $CONFIG, $LOCALE;
				$uid=intval($this->apps->_p('uid'));
				$sql = "update my_application set interview='2' where user_id='{$uid}' and jobboard_id='{$idjobs}' ";
				//pr($sql);exit;
				$fetch = $this->apps->query($sql);
				$sqluser = "SELECT * FROM social_member WHERE id='{$uid}'"; 
				$fetchuser = $this->apps->fetch($sqluser);	
				if($fetchuser)
				{
					$sqljobs = "SELECT jb.job_title,ts.nama_perusahaan,ts.user_id FROM jobboard jb 
					LEFT JOIN tbl_talent_seeker ts ON jb.talent_seeker_id=ts.id
					WHERE jb.id_job='{$idjobs}'"; 
					$fetchjobs = $this->apps->fetch($sqljobs);	
					if($fetchjobs)
					{
						$subjctnotifdectintrv=$LOCALE[1]['notif']['approveinterview'];
						$subjctnotifdectintrv=str_replace('{$nameCt}',$fetchuser['name'],$subjctnotifdectintrv);
						$subjctnotifdectintrv=str_replace('{$userid}',$fetchuser['id'],$subjctnotifdectintrv);
						$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_notification
						(`user_id`,`subject`,`detail`,`created_date`,`n_status`) 
						VALUES ('{$fetchjobs['user_id']}','your job interview invitation','{$subjctnotifdectintrv}',NOW(),1)";

							 // pr($sql); 	
						$res = $this->apps->query($sql);
					}
				}
				
				
				
				return true;
	
	
	}
	function updatedecisionajaxinterviewdec($idjobs)
	{
		global  $CONFIG, $LOCALE;
	//pr($_POST);exit;
				$uid=intval($this->apps->_p('uid'));
				$sql = "update my_application set interview='3' where user_id='{$uid}' and jobboard_id='{$idjobs}' ";
				//pr($sql);exit;
				$fetch = $this->apps->query($sql);
				
				$sqluser = "SELECT * FROM social_member WHERE id='{$uid}'"; 
				$fetchuser = $this->apps->fetch($sqluser);	
				if($fetchuser)
				{
					$sqljobs = "SELECT jb.job_title,ts.nama_perusahaan,ts.user_id FROM jobboard jb 
					LEFT JOIN tbl_talent_seeker ts ON jb.talent_seeker_id=ts.id
					WHERE jb.id_job='{$idjobs}'"; 
					$fetchjobs = $this->apps->fetch($sqljobs);	
					if($fetchjobs)
					{
						$subjctnotifdectintrv=$LOCALE[1]['notif']['declineinterview'];
						$subjctnotifdectintrv=str_replace('{$nameCt}',$fetchuser['name'],$subjctnotifdectintrv);
						$subjctnotifdectintrv=str_replace('{$userid}',$fetchuser['id'],$subjctnotifdectintrv);
						$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_notification
						(`user_id`,`subject`,`detail`,`created_date`,`n_status`) 
						VALUES ('{$fetchjobs['user_id']}','your job interview invitation','{$subjctnotifdectintrv}',NOW(),1)";

							 // pr($sql); 	
						$res = $this->apps->query($sql);
					}
				}
				
				return true;
	
	
	}
	
	function updatesettingts($data=array())
	{
				
				$qpassword='';
				if($data['password'])
				{
					$password = $this->apps->encrypt($data['password']);
					$qpassword="password='{$password }' ";
				}
				else
				{
				
				}
				if($data['email'])
				{
					$qemail="email='{$data['email']}', username='{$data['email']}',";
				}
				if($qpassword==''  && $qemail!='')
				{
					$qemail="email='{$data['email']}', username='{$data['email']}'";
				}
				$sql = "update social_member set 
					{$qemail}
					{$qpassword}
					where id='{$data['uid']}'  ";
				 // pr($sql);
				$fetch = $this->apps->query($sql);
				
				if($this->apps->user->role==1)
				{
					$sql = "update tbl_talent set 
						privacy='{$data['privacy']}'
						where user_id='{$data['uid']}'  ";
					// pr($sql);die;
					$fetch = $this->apps->query($sql); 
				}
				else
				{
					$sql = "update tbl_talent_seeker set 
						privacy='{$data['privacy']}'
						where user_id='{$data['uid']}'  ";
					// pr($sql);die;
					$fetch = $this->apps->query($sql); 
				}
				return true;
	
	
	}
	
	
	function updateinterview($idjobs)
	{
	//pr($_POST);exit;
	
		global $CONFIG;
		//$paramuser=$this->apps->_p('user');
		if ($_POST['user'])
		{
		foreach($_POST['user'] as $key=>$val)
			{
				$sql = "update my_application set interview='1' where user_id='{$val}' and jobboard_id='{$idjobs}' ";
				$fetch = $this->apps->query($sql);
			}
			return true;
		}
			
	
	}
	function download5($downloadid)
	{
	global $CONFIG;
	$this->user=$this->apps->session->getSession($this->config['SESSION_NAME'],"WEB");
	$sql = "select *,sm.city as kota from social_member sm inner join tbl_talent tt on sm.id=tt.user_id where sm.id='{$downloadid}'";
	
	$result = $this->apps->fetch($sql,1);
	$html='';	
	// pr($result);exit;
				if($result)
					{
					
					foreach($result as $key=>$val)
					{	
					//pr($val['img_avatar']);exit;
						ob_start();
						//$html .= '<page backtop="7mm" backbottom="10mm" backleft="10mm" backright="30mm">';
						$html .= '<link rel="stylesheet" type="text/css" media="all" href="'.$CONFIG['LOCAL_ASSET'].'css/pdf.css" >';
							
						$html .= '<div style="max-width:500px;margin:0 auto; word-break: break-all;">';
									$html .= '<div style="text-align:right;">';
											$html .= '<img src="'.$CONFIG['LOCAL_ASSET'].'images/logo_creasi_pdf.png" width="180" >';
									$html .= '</div>';
									$html .= ' <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin:0 0 20px 0;">';
											$html .= '<tr>';
												$html .= '<td width="150">';
														$html .= '<div style="width:150px;margin:0 30px 0 0;border:solid 2px #000;">';
																if($val['img_avatar'])
																{
																	$html .= '<img style="margin:0 30px 0 0;border:solid 2px #000;width:100%;"  src="'.$CONFIG['LOCAL_ASSET'].'personal/'.$val['img_avatar'].'" >';
																}else{
																	$html .= '<img  style="margin:0 30px 0 0;border:solid 2px #000;width:100%;" src="'.$CONFIG['LOCAL_ASSET'].'personal/images.jpg" >';
																}
														$html .= '</div>';
												$html .= '</td>';
												$html .= '<td>';
														$html .= '<div style="font-weight:normal;margin:0;padding:10px 0;">';
																$html .= '<h1 style="border-bottom:solid 1px #ddd;">'.$val['name'].' '.$val['lastname'].'</h1>';
						
																			$sql = "select tc.category_name from my_attribut_category mac left join tbl_category tc on mac.category_id=tc.id where user_id='{$downloadid}' group by tc.category_name";
																			$resultc = $this->apps->fetch($sql,1);
						
																$html .= '<h2 style="font-weight:normal;margin:0;padding:10px 0;"><i>';						
																		foreach($resultc as $keyc=>$valc)
																		{	
																			$html .= $valc['category_name'].'.';
																		}
																$html .= '</i></h2>';	
						
														$html .= '</div>';
												$html .= '</td>';
											$html .= '</tr>';
										$html .= '</table>';
						
										$html .= '<div  style="border:solid 1px #ddd;padding:20px;margin:20px 0;">';
												$html .= '<div style="color:#c00;border-bottom:solid 1px #c00;padding:0 0 10px 0;">';
														$html .= '<h3>BIO</h3>';
												$html .= '</div>';
					    						$html .= '<p>'.$val['testimoni'].'</p>';
												$html .= ' <table width="100%" border="0" cellspacing="0" cellpadding="0">';
														$html .= '<tr>';
																$html .= '<td width="120">Nickname</td>';
																$html .= '<td width="10">:</td>';
																$html .= '<td>'.$val['name'].'</td>';
														$html .= '</tr>';
														$html .= '<tr>';
																$html .= '<td>Gender</td>';
																$html .= '<td width="10">:</td>';
																$html .= '<td>'.$val['sex'].'</td>';
														$html .= '</tr>';
														$html .= '<tr>';
																$html .= '<td>Date of Birth</td>';
																$html .= '<td width="10">:</td>';
																$html .= '<td>'.date('d F Y', strtotime($val['birthday'])).'</td>';
														$html .= '</tr>';
						
													if(@$this->apps->user->role=='2' || @$this->apps->user->id==$val['id'])
													{
														$html .= '<tr>';
																$html .= '<td>Location</td>';
																$html .= '<td width="10">:</td>';
																$html .= '<td>'.$val['kota'].', '.$val['provincy'].'</td>';
														$html .= '</tr>';
														$html .= '<tr>';
																$html .= '<td>Phone Number</td>';
																$html .= '<td width="10">:</td>';
																$html .= '<td>'.$val['phone_number'].'</td>';
														$html .= '</tr>';
														$html .= '<tr>';
																$html .= '<td>Email Address</td>';
																$html .= '<td width="10">:</td>';
																$html .= '<td>'.$val['email'].'</td>';
														$html .= '</tr>';
													}
												$html .= '</table>';
										$html .= '</div>';
						
										$html .= '<div style="border:solid 1px #ddd;padding:20px;margin:20px 0;">';
													$html .= '<div style="color:#c00;border-bottom:solid 1px #c00;padding:0 0 10px 0;">';
															$html .= '<h3>Social Media</h3>';
													$html .= '</div>';
													$html .= '<div   style="padding:20px 0;">';
															$html .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
																	$html .= '<tr>';
																			if($val['fb_link'])
																			{
																				$html .= '<td><a style="color:#000;display:block;margin:20px 0;" href="#"><img style="float:left;margin:0 10px 0 0;" src="'.$CONFIG['LOCAL_ASSET'].'images/facebook.png"/><span style="display:block;line-height:40px;float:left;margin:10px 20px 0 0;"> https://www.facebook.com/'.$val['fb_link'].'</span></a></td>';
																			}
																			if($val['twitter_link'])
																			{
																				$html .= '<td><a style="color:#000;display:block;margin:20px 0;"  href="#"><img style="float:left;margin:0 10px 0 0;" src="'.$CONFIG['LOCAL_ASSET'].'images/twitter.png" /><span style="display:block;line-height:40px;float:left;margin:10px 20px 0 0;">https://twitter.com/'.$val['twitter_link'].'</span></a></td>';
																			}
																	$html .= '</tr>';
																	$html .= '<tr>';
																			if($val['instagram_link'])
																			{
																				$html .= '<td><a style="color:#000;display:block;margin:20px 0;"  href="#"><img style="float:left;margin:0 10px 0 0;" src="'.$CONFIG['LOCAL_ASSET'].'images/instagram.png" /><span style="display:block;line-height:40px;float:left;margin:10px 20px 0 0;">www.instagram.com/'.$val['instagram_link'].'</span></a></td>';
																			}
																			if($val['youtube_link'])
																			{
																				$html .= '<td><a style="color:#000;display:block;margin:20px 0;"  href="#"><img style="float:left;margin:0 10px 0 0;" src="'.$CONFIG['LOCAL_ASSET'].'images/youtube.png" /><span style="display:block;line-height:40px;float:left;margin:10px 20px 0 0;">www.youtube.com/'.$val['youtube_link'].'</span></a></td>';
																			}
																	$html .= '</tr>';
															$html .= '</table>';
												$html .= '</div>';
										$html .= '</div>';
						
											$html .= '<div style="border:solid 1px #ddd;padding:20px;margin:20px 0;">';
													$html .= '<div style="color:#c00;border-bottom:solid 1px #c00;padding:0 0 10px 0;">';
															$html .= '<h3>EDUCATION</h3>';
												$html .= '</div>';
												$html .= '<div class="content educontent">';
														$html .= ' <ul>';
																	$sql = "select * from my_education me  where user_id='{$downloadid}'";
																	$resulte = $this->apps->fetch($sql,1);
																	//pr($sql);exit;
																	if($resulte)
																	{
																		foreach($resulte as $keye=>$vale)
																		{	
																			$html .= '<li><strong class="labelname">'.$vale['degree'].'</strong> <span class="date">/  '.$vale['tahunmasuk'].' - '.$vale['tahunlulus'].'</span><br >';
																			$html .= ' <span class="universityname">'.$vale['institusi'].'</span><br ><br ></li>';
																		}
																	}
														$html .= ' </ul>';
												$html .= ' </div>';
										$html .= ' </div>';
							//untuk category detail
								$html .= '<div style="border:solid 1px #ddd;padding:20px;margin:20px 0;">';
													
											$categoryid='';
										$sqlcategory="select *,mc.id as idnya from {$CONFIG['DATABASE'][0]['DATABASE']}.my_attribut_category mc
												left join tbl_category tc on mc.category_id=tc.id
												left join tbl_subcategory ts on mc.subcategory_id=ts.id
												where mc.user_id='{$downloadid}' group by mc.category_id";
										$resultecategory = $this->apps->fetch($sqlcategory,1);
										
											foreach ($resultecategory as $rows)
											{
												$html .= '<div class="rowad">
															';
															$sqlcheck ="select *,mc.id as idnya from {$CONFIG['DATABASE'][0]['DATABASE']}.my_attribut_category mc
																left join tbl_category tc on mc.category_id=tc.id
																left join tbl_subcategory ts on mc.subcategory_id=ts.id
																where mc.user_id='{$downloadid}' and mc.category_id='{$rows['category_id']}'";
														
														$rqDatacategorydetail = $this->apps->fetch($sqlcheck,1);
														
															if($rows['category_id']!=$categoryid)
																{
																	$categoryid=$rows['category_id'];
																	$html .= '<div class="titlerow2">
																			<h3>';
																			if($rows['category_name'])
																			{
																				$html .= $rows['category_name'];
																			}
																			else
																			{
																				$html .= '-';
																			}
																			$html .='</h3><hr>';
																			
																			$html .= '<p style="color:#333;" class="subrow">'.$rqDatacategorydetail[0]['short_description'].'</p>';
																		$html .= '</div>
																	';
																}
														foreach ($rqDatacategorydetail as $rowdetails)
														{
																
															$html .= '
															<div class="row2">
																<h5 class="category-title">
																 ';
																				if($rowdetails['name_subcategory']) {
																					$html .= $rowdetails['name_subcategory']; } else
																						{
																							$html .= '-';
																						}
																
																
																$html .= '</h5>
																	<table width="100%" border="0" cellspacing="0" cellpadding="0">
																		<tr>
																			<td width="120">Agent </td>
																			<td width="10">:</td>
																			<td> ';if($rowdetails['name_agent']) { $html .= $rowdetails['name_agent']; } else { $html .= '-'; }  $html .='</td>
																		</tr>
																		<tr>
																			<td>Agent Number</td>
																			<td  width="10">:</td>
																			<td>  ';if($rowdetails['tlp_agent']) { $html .= $rowdetails['tlp_agent']; } else { $html .= '-'; }  $html .='</td>
																		</tr>
																		
																		<tr>
																			<td>Looking For</td>
																			<td width="10">:</td>
																			<td>';
																		
																				$nolooking='';
																				$sqllooking="select mlf.loking_for_id from my_loking_for mlf where arrtibut_category_id='{$rowdetails['idnya']}' and user_id={$downloadid}";
																				$rqDatalooking = $this->apps->fetch($sqllooking,1);
																					if($rqDatalooking)
																					{
																						foreach($rqDatalooking as $rolooking)
																						{
																							if($nolooking)
																							{
																								if ($rolooking['loking_for_id']==1) { $html .= ', Full time'; }
																								if ($rolooking['loking_for_id']==2) { $html .= ', Part time'; }
																								if ($rolooking['loking_for_id']==3) { $html .= ', Internship'; }
																								if ($rolooking['loking_for_id']==4) {  $html .= ', Freelance'; }
																							}
																							else
																							{
																								$nolooking=1;
																								if ($rolooking['loking_for_id']==1) { $html .= 'Full time'; }
																								if ($rolooking['loking_for_id']==2) { $html .= 'Part time'; }
																								if ($rolooking['loking_for_id']==3) { $html .= 'Internship'; }
																								if ($rolooking['loking_for_id']==4) {  $html .= 'Freelance'; }
																								
																								
																								
																							}
																						
																						}
																					}else
																					{
																						$html .= '-'; 
																					
																					}
																			$html .='</td>
																		</tr>
																	 
																		<tr>
																			<td >Open For</td>
																			<td width="10">:</td>
																			<td>';
																					$noopen='';
																							$sqlopen="select oppen_for from my_open_for mof where attribut_category_id='{$rowdetails['idnya']}' and user_id={$downloadid}";
																							$rqDataoppen = $this->apps->fetch($sqlopen,1);
																							if($rqDataoppen)
																							{
																								foreach($rqDataoppen as $rolopen)
																								{
																									if($noopen)
																									{
																										 $html .=  ', '.$rolopen['oppen_for'];
																										
																									}
																									else
																									{
																										$noopen=1;
																										 $html .=  $rolopen['oppen_for'];
																										
																										
																										
																									}
																								
																								}
																						}
																						else
																						{
																								$html .= '-'; 
																						}
																		$html .= '</td>
																		
																		</tr>';
																	  
																		$sqlexperience="select * from my_experience where category_id='{$rowdetails['category_id']}' and user_id={$downloadid}";
																				$rqDatamexperience = $this->apps->fetch($sqlexperience,1);
																	$html .='<tr>
																			<td>Experience</td>
																			<td width="10">:</td>';
																			if($rqDatamexperience )
																			{
																				$html .='<td>YES</td>';
																			}
																			else
																			{
																				$html .='<td>No</td>';
																			}
																		$html .='
																		</tr>';
															$html .='	<tr><td colspan="10">';
																   
																  foreach ($rqDatamexperience as  $rowexperience)
																  {
																  
																	$html .='<h5>'.date ('Y',strtotime($rqDatamexperience['periode_start'])).' - '.date ('Y',strtotime($rowexperience['periode_end'])).'</h5>';
																			$html .= '<span>'.wordwrap(strip_tags($rowexperience['detail_exp']),150,"<br>\n",TRUE).'</span>';
																  }
															$html .='</td></tr>';
																	$html .='	
																	</table>';
															$html .='</div> ';
															
															}
												 $html .='</div>'; 
												
												}	
												$html .='</div>'; 
								$html .=" <p style='text-align:right;'>**www.creasi.co.id/ct/kevincruziel</p>";
						$html .= "</div>";
						//$html .= '</page> '; 
					
					}
					
									
							$filename=$result[0]['name'].'.pdf' ; 
							$content = ob_get_clean();
								
								
								// try
								// {
									//$html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15',array(0, 0, 0, 0));
									$html2pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'ISO-8859-15', false);
									$html2pdf->SetCreator(PDF_CREATOR);
									$html2pdf->SetAuthor('Nicola Asuni');
									$html2pdf->SetTitle('TCPDF Example 006');
									$html2pdf->SetSubject('TCPDF Tutorial');
									$html2pdf->SetKeywords('TCPDF, PDF, example, test, guide');
									
									
									// set auto page breaks
									$html2pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOMPDF_MARGIN_BOTTOM);

									// set image scale factor
									$html2pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
									
									// set font
									//$html2pdf->SetFont('Arial', 'B', 20);

									// add a page
									$html2pdf->AddPage();

									$html2pdf->writeHTML($html, true, false, true, false, '');
									/*$html2pdf->setDefaultFont('Arial');
									$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
									$html2pdf->Output($filename);
									$html2pdf->set_pixels(800);*/
									$html2pdf->lastPage();
									$html2pdf->Output($filename, 'I');
								// }
								// catch(HTML2PDF_exception $e) { $html .= $e; }
								exit;
						
					}
	}	
	function download($downloadid)
	{
	global $CONFIG;
	$this->user=$this->apps->session->getSession($this->config['SESSION_NAME'],"WEB");
	$sql = "select *,sm.city as kota from social_member sm inner join tbl_talent tt on sm.id=tt.user_id where sm.id='{$downloadid}'";
	
	$result = $this->apps->fetch($sql,1);		
	// pr($result);exit;
				if($result)
					{
					
					foreach($result as $key=>$val)
					{	
					//pr($val['img_avatar']);exit;
						ob_start();
						echo '<page backtop="7mm" backbottom="10mm" backleft="10mm" backright="30mm">';
							echo '<link rel="stylesheet" type="text/css" media="all" href="'.$CONFIG['LOCAL_ASSET'].'css/pdf.css" >';
							echo '<div id="wrapper">';
									echo '<div id="header">';
											echo '<img src="'.$CONFIG['LOCAL_ASSET'].'images/logo_creasi_pdf.png" width="180" >';
									echo '</div>';
									echo ' <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin:0 0 20px 0;">';
											echo '<tr>';
												echo '<td width="150">';
														echo '<div id="photo">';
																if($val['img_avatar'])
																{
																	echo '<img  src="'.$CONFIG['LOCAL_PUBLIC_ASSET'].'personal/'.$val['img_avatar'].'" >';
																}else{
																	echo '<img  src="'.$CONFIG['LOCAL_PUBLIC_ASSET'].'personal/images.jpg" >';
																}
														echo '</div>';
												echo '</td>';
												echo '<td>';
														echo '<div id="name">';
																echo '<h1>'.$val['name'].' '.$val['lastname'].'</h1>';
						
																			//$sql = "select tc.category_name from my_attribut_category mac left join tbl_category tc on mac.category_id=tc.id where user_id='{$downloadid}' group by tc.category_name";
																			$sqlcheck ="select *,mc.id as idnya,mca.category_id as category_id,tc.category_name as category_name from my_category mca
																			left join tbl_category tc on mca.category_id=tc.id
																			LEFT JOIN my_attribut_category mc ON mca.user_id = mc.user_id
																			
																			 left join tbl_subcategory ts on mc.subcategory_id=ts.id
																			where mca.user_id='{$downloadid}' group by mca.category_id order by ts.id"; 
																			
																			$resultc = $this->apps->fetch($sqlcheck,1);
						// pr($resultc);die;
																echo '<h2><i>';						
																		foreach($resultc as $keyc=>$valc)
																		{	
																			echo $valc['category_name'].'.';
																		}
																echo '</i></h2>';	
						
														echo '</div>';
												echo '</td>';
											echo '</tr>';
										echo '</table>';
						
										echo '<div class="row" style="margin:20px 0;">';
												echo '<div class="titlerow">';
														echo '<h3>BIO</h3>';
												echo '</div>';
					    						echo '<p>'.$val['testimoni'].'</p>';
												echo ' <table width="100%" border="0" cellspacing="0" cellpadding="0">';
														echo '<tr>';
																echo '<td width="120">Nickname</td>';
																echo '<td width="10">:</td>';
																echo '<td>'.$val['name'].'</td>';
														echo '</tr>';
														echo '<tr>';
																echo '<td>Gender</td>';
																echo '<td width="10">:</td>';
																echo '<td>'.$val['sex'].'</td>';
														echo '</tr>';
														echo '<tr>';
																echo '<td>Date of Birth</td>';
																echo '<td width="10">:</td>';
																echo '<td>'.date('d F Y', strtotime($val['birthday'])).'</td>';
														echo '</tr>';
						
													if(@$this->apps->user->role=='2' || @$this->apps->user->id==$val['id'])
													{
														echo '<tr>';
																echo '<td>Location</td>';
																echo '<td width="10">:</td>';
																echo '<td>'.$val['kota'].', '.$val['provincy'].'</td>';
														echo '</tr>';
														echo '<tr>';
																echo '<td>Phone Number</td>';
																echo '<td width="10">:</td>';
																echo '<td>'.$val['phone_number'].'</td>';
														echo '</tr>';
														echo '<tr>';
																echo '<td>Email Address</td>';
																echo '<td width="10">:</td>';
																echo '<td>'.$val['email'].'</td>';
														echo '</tr>';
													}
												echo '</table>';
										echo '</div>';
						
										echo '<div class="row">';
													echo '<div class="titlerow">';
															echo '<h3>Social Media</h3>';
													echo '</div>';
													echo '<div class="content socialcontent">';
															echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
																	echo '<tr>';
																			if($val['fb_link'])
																			{
																				echo '<td><a href="#"><img src="'.$CONFIG['LOCAL_ASSET'].'images/facebook.png"/><span style="margin:10px 20px 0 0;"> https://www.facebook.com/'.$val['fb_link'].'</span></a></td>';
																			}
																			if($val['twitter_link'])
																			{
																				echo '<td><a href="#"><img src="'.$CONFIG['LOCAL_ASSET'].'images/twitter.png" /><span style="margin:10px 20px 0 0;">https://twitter.com/'.$val['twitter_link'].'</span></a></td>';
																			}
																	echo '</tr>';
																	echo '<tr>';
																			if($val['instagram_link'])
																			{
																				echo '<td><a href="#"><img src="'.$CONFIG['LOCAL_ASSET'].'images/instagram.png" /><span style="margin:10px 20px 0 0;">www.instagram.com/'.$val['instagram_link'].'</span></a></td>';
																			}
																			if($val['youtube_link'])
																			{
																				echo '<td><a href="#"><img src="'.$CONFIG['LOCAL_ASSET'].'images/youtube.png" /><span style="margin:10px 20px 0 0;">www.youtube.com/'.$val['youtube_link'].'</span></a></td>';
																			}
																	echo '</tr>';
															echo '</table>';
												echo '</div>';
										echo '</div>';
						
										echo '<div class="row">';
												echo '<div class="titlerow">';
															echo '<h3>EDUCATION</h3>';
												echo '</div>';
												echo '<div class="content educontent">';
														echo ' <ul>';
																	$sql = "select * from my_education me  where user_id='{$downloadid}'";
																	$resulte = $this->apps->fetch($sql,1);
																	//pr($sql);exit;
																	if($resulte)
																	{
																		foreach($resulte as $keye=>$vale)
																		{	
																			echo '<li><strong class="labelname">'.$vale['degree'].'</strong> <span class="date">/  '.$vale['tahunmasuk'].' - '.$vale['tahunlulus'].'</span><br >';
																			echo ' <span class="universityname">'.$vale['institusi'].'</span><br ><br ></li>';
																		}
																	}
														echo ' </ul>';
												echo ' </div>';
										echo ' </div>';
							//untuk category detail
							
												//echo '<div class="row">';
											$categoryid='';
										$sqlcategory="select *,mc.id as idnya,mca.category_id as category_id,tc.category_name as category_name from my_category mca
																			left join tbl_category tc on mca.category_id=tc.id
																			LEFT JOIN my_attribut_category mc ON mca.user_id = mc.user_id
																			
																			 left join tbl_subcategory ts on mc.subcategory_id=ts.id
																			where mca.user_id='{$downloadid}' group by mca.category_id order by ts.id";
										$resultecategory = $this->apps->fetch($sqlcategory,1);
										
											foreach ($resultecategory as $rows)
											{
												echo '<div class="row">
															';
															$sqlcheck ="select *,mc.id as idnya,mca.category_id as category_id,tc.category_name as category_name from my_category mca
																			left join tbl_category tc on mca.category_id=tc.id
																			LEFT JOIN my_attribut_category mc ON mca.user_id = mc.user_id
																			
																			 left join tbl_subcategory ts on mc.subcategory_id=ts.id
																			where mca.user_id='{$downloadid}' and mca.category_id='{$rows['category_id']}'";
														
														$rqDatacategorydetail = $this->apps->fetch($sqlcheck,1);
														
															if($rows['category_id']!=$categoryid)
																{
																	$categoryid=$rows['category_id'];
																	echo '<div class="titlerow">
																			<h3>';
																			if($rows['category_name'])
																			{
																				echo $rows['category_name'];
																			}
																			else
																			{
																				echo '-';
																			}
																			echo'</h3>';
																			
																			echo '<p style="color:#333;" class="subrow">'.$rqDatacategorydetail[0]['short_description'].'</p>';
																		echo '</div>
																	';
																}
														$noexp=0;
														$jumlahexp=count($rqDatacategorydetail);
														foreach ($rqDatacategorydetail as $rowdetails)
														{
															$noexp++;
															echo '
															<div class="rowf">
																
																<h5>
																 ';
																				if($rowdetails['name_subcategory']) {
																					echo $rowdetails['name_subcategory']; } else
																						{
																							echo '-';
																						}
																
																
																echo '</h5>
																
																	<table width="100%" border="0" cellspacing="0" cellpadding="0">
																		<tr>
																			<td width="120">Agent </td>
																			<td width="10">:</td>
																			<td> ';if($rowdetails['name_agent']) { echo $rowdetails['name_agent']; } else { echo '-'; }  echo'</td>
																		</tr>
																		<tr>
																			<td>Agent Number</td>
																			<td  width="10">:</td>
																			<td>  ';if($rowdetails['tlp_agent']) { echo $rowdetails['tlp_agent']; } else { echo '-'; }  echo'</td>
																		</tr>
																		
																		<tr>
																			<td>Looking For</td>
																			<td width="10">:</td>
																			<td>';
																		
																				$nolooking='';
																				$sqllooking="select mlf.loking_for_id from my_loking_for mlf where arrtibut_category_id='{$rowdetails['idnya']}' and user_id={$downloadid}";
																				$rqDatalooking = $this->apps->fetch($sqllooking,1);
																					if($rqDatalooking)
																					{
																						foreach($rqDatalooking as $rolooking)
																						{
																							if($nolooking)
																							{
																								if ($rolooking['loking_for_id']==1) { echo ', Full time'; }
																								if ($rolooking['loking_for_id']==2) { echo ', Part time'; }
																								if ($rolooking['loking_for_id']==3) { echo ', Internship'; }
																								if ($rolooking['loking_for_id']==4) {  echo ', Freelance'; }
																							}
																							else
																							{
																								$nolooking=1;
																								if ($rolooking['loking_for_id']==1) { echo 'Full time'; }
																								if ($rolooking['loking_for_id']==2) { echo 'Part time'; }
																								if ($rolooking['loking_for_id']==3) { echo 'Internship'; }
																								if ($rolooking['loking_for_id']==4) {  echo 'Freelance'; }
																								
																								
																								
																							}
																						
																						}
																					}else
																					{
																						echo '-'; 
																					
																					}
																			echo'</td>
																		</tr>
																	 
																		<tr>
																			<td >Open For</td>
																			<td width="10">:</td>
																			<td>';
																					$noopen='';
																							$sqlopen="select oppen_for from my_open_for mof where attribut_category_id='{$rowdetails['idnya']}' and user_id={$downloadid}";
																							$rqDataoppen = $this->apps->fetch($sqlopen,1);
																							if($rqDataoppen)
																							{
																								foreach($rqDataoppen as $rolopen)
																								{
																									if($noopen)
																									{
																										 echo  ', '.$rolopen['oppen_for'];
																										
																									}
																									else
																									{
																										$noopen=1;
																										 echo  $rolopen['oppen_for'];
																										
																										
																										
																									}
																								
																								}
																						}
																						else
																						{
																								echo '-'; 
																						}
																		echo '</td>
																		
																		</tr>';
																	  
																		$sqlexperience="select * from my_experience where category_id='{$rowdetails['category_id']}' and user_id={$downloadid}";
																				$rqDatamexperience = $this->apps->fetch($sqlexperience,1);
																
																if($rqDatamexperience)
																{
																	echo'<tr> 
																			<td>Experience</td>
																			<td width="10">:</td>';
																			
																				echo'<td>YES</td>';
																			
																		echo'
																		</tr></table>';
																		//echo'</div>';
																		
																		echo '</div>';
																		
																		
																		$finishex='';
																		 foreach ($rqDatamexperience as  $rowexperience)
																		  {
																			
																			echo'<h5>'.date ('Y',strtotime($rqDatamexperience['periode_start'])).' - '.date ('Y',strtotime($rowexperience['periode_end'])).'</h5>';
																					echo '<span>'.wordwrap(strip_tags($rowexperience['detail_exp']),150,"<br>\n",TRUE).'</span>';
																			
																		  }
																		
																		  echo "</div>";
																		 if($noexp!=$jumlahexp)
																		 {
																			echo'<div class="row">';
																		 }
																		 else
																		 {
																			echo'<div>';
																		 }
																		 
																				
																		
																		  
																}
																else
																{
																	echo'<tr> 
																			<td>Experience</td>
																			<td width="10">:</td>';
																			echo'<td>No</td>';
																			
																		echo'
																		</tr></table></div>';
																		
																}
															
															
															
															}
												if($rqDatamexperience)
													{
														echo'</div>';
														
														
													}
												else
													{
														echo'</div>'; 
													}
												}	
											//	echo'</div>'; 
								echo" <p style='text-align:right;'><a herf='".$CONFIG['BASE_DOMAIN_PATH']."personal/view/".$downloadid."'> **".$CONFIG['BASE_DOMAIN_PATH']."personal/view/".$downloadid."</a></p>";
						echo "</div>";
						echo '</page> '; 
					
					}
					
									
							$filename=$result[0]['name'].'.pdf' ; 
							$content = ob_get_clean();
								
								
								try
								{
									$html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15',array(0, 0, 0, 0));
									$html2pdf->setDefaultFont('Arial');
									$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
									$html2pdf->Output($filename);
									$html2pdf->set_pixels(800);
									
								}
								catch(HTML2PDF_exception $e) { echo $e; }
								exit;
						
					}
	}				
					
					
	function download2($downloadid)
	{
	global $CONFIG;
	$this->user=$this->apps->session->getSession($this->config['SESSION_NAME'],"WEB");
	$sql = "select *,sm.city as kota from social_member sm inner join tbl_talent tt on sm.id=tt.user_id where sm.id='{$downloadid}'";
	
	$result = $this->apps->fetch($sql,1);		
	// pr($result);exit;
				if($result)
					{
					
					foreach($result as $key=>$val)
					{	
					//pr($val['img_avatar']);exit;
						ob_start();
						echo '<page backtop="7mm" backbottom="10mm" backleft="10mm" backright="30mm">';
						echo '<link rel="stylesheet" type="text/css" media="all" href="'.$CONFIG['LOCAL_ASSET'].'css/pdf.css" >';
						echo '<div id="wrapper">';
						echo '<div id="header">';
						echo '<img src="'.$CONFIG['LOCAL_ASSET'].'images/logo_creasi_pdf.png" width="180" >';
						echo '</div>';
						echo '<table width="80%" border="0" cellspacing="0" cellpadding="0">';
						echo '<tr>';
						echo '<td width="150">';
						echo '<div id="photo">';
						if($val['img_avatar'])
						{
						echo '<img  src="'.$CONFIG['LOCAL_PUBLIC_ASSET'].'personal/'.$val['img_avatar'].'" >';
						}else{
							echo '<img  src="'.$CONFIG['LOCAL_PUBLIC_ASSET'].'personal/images.jpg" >';
						}
						echo '</div>';
						echo '</td>';
						echo '<td>';
						echo '<div id="name">';
						echo '<h1>'.$val['name'].'</h1>';
						
						$sql = "select tc.category_name from my_attribut_category mac left join tbl_category tc on mac.category_id=tc.id where user_id='{$downloadid}' group by tc.category_name";
						$resultc = $this->apps->fetch($sql,1);
						
						echo '<h2><i>';						
						foreach($resultc as $keyc=>$valc)
						{	
						echo $valc['category_name'].'.';
						}
						echo '</i></h2>';	
						
						echo '</div>';
						echo '</td>';
						echo '</tr>';
						echo '</table>';
					    echo '<div class="row">';
						echo '<div class="titlerow">';
						echo '<h3>BIO</h3>';
						echo '</div>';
						echo '<p>'.$val['testimoni'].'</p>';
						echo '<table width="80%" border="0" cellspacing="0" cellpadding="0">';
						echo '<tr>';
						echo '<td width="120">Nickname</td>';
						echo '<td width="10">:</td>';
						echo '<td>'.$val['name'].'</td>';
						echo '</tr>';
						echo '<tr>';
						echo '<td>Gender</td>';
						echo '<td width="10">:</td>';
						echo '<td>'.$val['sex'].'</td>';
						echo '</tr>';
						echo '<tr>';
						echo '<td>Date of Birth</td>';
						echo '<td width="10">:</td>';
						echo '<td>'.date('d F Y', strtotime($val['birthday'])).'</td>';
						echo '</tr>';
						
						if(@$this->apps->user->role=='2' || @$this->apps->user->id==$val['id'])
						{
							echo '<tr>';
							echo '<td>Location</td>';
							echo '<td width="10">:</td>';
							echo '<td>'.$val['kota'].', '.$val['provincy'].'</td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td>Phone Number</td>';
							echo '<td width="10">:</td>';
							echo '<td>'.$val['phone_number'].'</td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td>Email Address</td>';
							echo '<td width="10">:</td>';
							echo '<td>'.$val['email'].'</td>';
							echo '</tr>';
						}
					    echo '</table>';
					    echo '</div>';
						
						echo '<div class="row">';
						echo '<div class="titlerow">';
						echo '<h3>Social Media</h3>';
						echo '</div>';
						echo '<div class="content socialcontent">';
						echo '<table width="80%" border="0" cellspacing="0" cellpadding="0">';
						echo '<tr>';
						if($val['fb_link'])
						{
							echo '<td><a href="#"><img src="'.$CONFIG['LOCAL_ASSET'].'images/facebook.png"/><span> https://www.facebook.com/'.$val['fb_link'].'</span></a></td>';
						}
						if($val['twitter_link'])
						{
							echo '<td><a href="#"><img src="'.$CONFIG['LOCAL_ASSET'].'images/twitter.png" /><span>https://twitter.com/'.$val['twitter_link'].'</span></a></td>';
						}
						if($val['instagram_link'])
						{
							echo '<td><a href="#"><img src="'.$CONFIG['LOCAL_ASSET'].'images/instagram.png" /><span>www.instagram.com/'.$val['instagram_link'].'</span></a></td>';
						}
						echo '</tr>';
						echo '<tr>';
						if($val['youtube_link'])
						{
							echo '<td><a href="#"><img src="'.$CONFIG['LOCAL_ASSET'].'images/youtube.png" /><span>www.youtube.com/'.$val['youtube_link'].'</span></a></td>';
						}
						echo '</tr>';
						echo '</table>';
						echo '</div>';
						echo '</div>';
						echo '<div id="header">';
						echo '</div>';
						echo '<div class="row">';
						echo '<div class="titlerow">';
						echo '<h3>EDUCATION</h3>';
						echo '</div>';
						echo '<div class="content educontent">';
						echo ' <ul>';
						$sql = "select * from my_education me  where user_id='{$downloadid}'";
						$resulte = $this->apps->fetch($sql,1);
						//pr($sql);exit;
						if($resulte)
						{
							foreach($resulte as $keye=>$vale)
							{	
								echo '<li><strong class="labelname">'.$vale['degree'].'</strong> <span class="date">/  '.$vale['tahunmasuk'].' - '.$vale['tahunlulus'].'</span><br >';
								echo ' <span class="universityname">'.$vale['institusi'].'</span></li>';
							}
						}
						echo ' </ul>';
						echo ' </div>';
						echo ' </div>';
							//untuk category detail
							
							$categoryid='';
						$sqlcategory="select *,mc.id as idnya from {$CONFIG['DATABASE'][0]['DATABASE']}.my_attribut_category mc
								left join tbl_category tc on mc.category_id=tc.id
								left join tbl_subcategory ts on mc.subcategory_id=ts.id
								where mc.user_id='{$downloadid}' group by mc.category_id";
						$resultecategory = $this->apps->fetch($sqlcategory,1);
						
						foreach ($resultecategory as $rows)
						{
							echo '<div class="row">
										';
										if($rows['category_id']!=$categoryid)
											{
												$categoryid=$rows['category_id'];
												echo '<div class="titlerow">
														<h3>';
														if($rows['category_name'])
														{
															echo $rows['category_name'];
														}
														else
														{
															echo '-';
														}
														echo'</h3>
													</div>
												';
											}
										$sqlcheck ="select *,mc.id as idnya from {$CONFIG['DATABASE'][0]['DATABASE']}.my_attribut_category mc
											left join tbl_category tc on mc.category_id=tc.id
											left join tbl_subcategory ts on mc.subcategory_id=ts.id
											where mc.user_id='{$downloadid}' and mc.category_id='{$rows['category_id']}'";
									
									$rqDatacategorydetail = $this->apps->fetch($sqlcheck,1);
									foreach ($rqDatacategorydetail as $rowdetails)
									{
										echo '<p>'.$rowdetails['short_description'].'</p>
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td width="120"> ';
												if($rowdetails['name_subcategory']) {
												echo $rowdetails['name_subcategory']; } else
												{
													echo '-';
												}
												echo'</td>
												
											</tr>
											  <tr>
												<td width="40%">Agent </td>
												<td width="10%">:</td>
												<td width="60%"> ';if($rowdetails['name_agent']) { echo $rowdetails['name_agent']; } else { echo '-'; }  echo'</td>
											  </tr>
											  <tr>
												<td width="40%">Agent Number</td>
												<td  width="10%">:</td>
												<td width="60%">  ';if($rowdetails['tlp_agent']) { echo $rowdetails['tlp_agent']; } else { echo '-'; }  echo'</td>
											  </tr>
											   <tr>
											   </tr>
											  <tr>
												<td width="40%">Looking For</td>
												<td width="10%">:</td>
												<td width="90%">';
												
												$nolooking='';
												$sqllooking="select mlf.loking_for_id from my_loking_for mlf where arrtibut_category_id='{$rowdetails['idnya']}' and user_id={$downloadid}";
												$rqDatalooking = $this->apps->fetch($sqllooking,1);
												if($rqDatalooking)
												{
													foreach($rqDatalooking as $rolooking)
													{
														if($nolooking)
														{
															if ($rolooking['loking_for_id']==1) { echo ', Full time'; }
															if ($rolooking['loking_for_id']==2) { echo ', Part time'; }
															if ($rolooking['loking_for_id']==3) { echo ', Internship'; }
															if ($rolooking['loking_for_id']==4) {  echo ', Freelance'; }
														}
														else
														{
															$nolooking=1;
															if ($rolooking['loking_for_id']==1) { echo 'Full time'; }
															if ($rolooking['loking_for_id']==2) { echo 'Part time'; }
															if ($rolooking['loking_for_id']==3) { echo 'Internship'; }
															if ($rolooking['loking_for_id']==4) {  echo 'Freelance'; }
															
															
															
														}
													
													}
												}else
												{
													echo '-'; 
												
												}
												 echo'</td>
											  </tr>
											 
											  <tr>
												<td width="40%">Open For</td>
												<td width="10%">:</td>
												<td width="60%">';
												$noopen='';
														$sqlopen="select oppen_for from my_open_for mof where attribut_category_id='{$rowdetails['idnya']}' and user_id={$downloadid}";
														$rqDataoppen = $this->apps->fetch($sqlopen,1);
														if($rqDataoppen)
														{
															foreach($rqDataoppen as $rolopen)
															{
																if($noopen)
																{
																	 echo  ', '.$rolopen['oppen_for'];
																	
																}
																else
																{
																	$noopen=1;
																	 echo  $rolopen['oppen_for'];
																	
																	
																	
																}
															
															}
													}
													else
													{
															echo '-'; 
													}
												echo '</td>
												
											  </tr>';
											  
											  	$sqlexperience="select * from my_experience where category_id='{$rowdetails['category_id']}' and user_id={$downloadid}";
														$rqDatamexperience = $this->apps->fetch($sqlexperience,1);
											echo'<tr>
												<td width="40%">Experience</td>
												<td width="10%">:</td>';
												if($rqDatamexperience )
												{
													echo'<td width="60%">YES</td>';
												}
												else
												{
													echo'<td width="60%">No</td>';
												}
												echo'
												
											  </tr>';
											  foreach ($rqDatamexperience as $rowexperience)
											  {
											  
												echo'
													  <tr width="40%">
														<td  width="60%">'.date ('Y',strtotime($rowexperience['periode_start'])).' - '.date ('Y',strtotime($rowexperience['periode_end'])).'</td>
													<td>:</td>
														<td width="600">'.$rowexperience['detail_exp'].'</td>
														
													  </tr>';
											  
											  }
											  echo'
										</table>';
										}
									  echo'</div>';
							}	
								
						echo "</div>";
						echo '</page> ';
					
					}
					
									
							$filename=$result[0]['name'].'.pdf' ; 
							$content = ob_get_clean();
								
								
								try
								{
									$html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15',array(0, 0, 0, 0));
									$html2pdf->setDefaultFont('Arial');
									$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
									$html2pdf->Output($filename);
									$html2pdf->set_pixels(800);

								}
								catch(HTML2PDF_exception $e) { echo $e; }
								exit;
					}
	}				
					
	function detail_talent_jobs($jobsid)
	{
	global $CONFIG;
		
		$sql = "select * from social_member sm inner join tbl_talent tt on sm.id=tt.user_id 
				inner join my_application ma on sm.id=ma.user_id where ma.jobboard_id={$jobsid}";
		// pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);
		return $rqData;
		//pr($rqData);exit;
		
	}
	function detail_talent_seeker($userid)
	{
	global $CONFIG;
		 /* inner join tbl_talent_seeker tt on sm.id=tt.user_id  */
		// pr ($this->apps->user);die;
		if($this->apps->user->role==1)
		{
			$sql = "select sm.*,tt.privacy from social_member sm
			inner join tbl_talent tt on sm.id=tt.user_id
				 where sm.id={$userid}";
				// pr($sql);exit;
			$rqData = $this->apps->fetch($sql);
		}
		else{
			$sql = "select sm.*,tt.privacy from social_member sm
				inner join tbl_talent_seeker tt on sm.id=tt.user_id
				 where sm.id={$userid}";
				// pr($sql);exit; 
			$rqData = $this->apps->fetch($sql);
		}
		
		return $rqData;
		//pr($rqData);exit;
		
	}
	function popular()
	{
	global $CONFIG;
		
		$sql = "select *,DATE_FORMAT(jb.enddate,'%d-%m-%Y') as date,jb.provinsi,jb.city,count(ma.jobboard_id) as coba from jobboard as jb left join tbl_talent_seeker tts on jb.talent_seeker_id=tts.id left join job_category jc
 on jb.id_job=jc.jobboard_id left join my_application ma on ma.jobboard_id=jb.id_job  WHERE 1   AND jb.n_status=1   AND (tts.nama_perusahaan LIKE '%%' ) group by jb.job_title   order by coba DESC limit 10 ";
		//pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);
		
		
		
		return $rqData;
		//pr($rqData);exit;
	}
	
	
	function main_job_ts($start=null,$limit=5,$id=null)
	{
	global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
	 
		$sql="select *,tts.id as idnya from tbl_talent_seeker tts inner join social_member sm on tts.user_id=sm.id where sm.id='{$id}'";
		//pr($sql);exit;
		$select_tts = $this->apps->fetch($sql,1);
		$id_tts=$select_tts[0]['idnya'];
		
		$sortir=@$_POST['sortir'];
		$orderby='';
		if($sortir == '')
		{
		$orderby=' order by jb.date DESC';
		}
		if($sortir == 'new')
		{
		$orderby=' order by jb.date DESC';
		}
		if($sortir == 'clostes')
		{
		$orderby=' order by jb.enddate ASC';
		}
		if($sortir == 'open')
		{
		$orderby=' and jb.n_status=1 and jb.enddate > CURDATE() and jb.n_status_interview=0';
		}
		if($sortir == 'closed')
		{
		$orderby=' and jb.enddate<=CURDATE() and jb.n_status!=6';
		}
		if($sortir == 'interview')
		{
		$orderby=' and jb.n_status_interview=1 and jb.enddate > CURDATE() ';
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
			from {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard as jb left join tbl_talent_seeker tts on jb.talent_seeker_id=tts.id 
			left join job_category jc
		on jb.id_job=jc.jobboard_id  left join social_member sm on tts.user_id=sm.id WHERE 1 and jb.enddate > (DATE_SUB(CURDATE(), INTERVAL 6 MONTH))  and jb.talent_seeker_id={$id_tts} and sm.n_status != 2 and jb.n_status != 5 && jb.n_status != 0 {$orderby}";

		$total = $this->apps->fetch($sql);		
		
	//pr($total);exit;
		if(intval($total['total'])<=$limit) $start = 0;
		
	
		
		$sql = "select *,DATE_FORMAT(jb.enddate,'%d-%m-%Y') as date,jb.provinsi,jb.city,jb.n_status,jb.love_count as love_count from {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard as jb left join tbl_talent_seeker tts on jb.talent_seeker_id=tts.id left join job_category jc
		on jb.id_job=jc.jobboard_id  left join social_member sm on tts.user_id=sm.id WHERE 1 and jb.enddate > (DATE_SUB(CURDATE(), INTERVAL 6 MONTH)) and jb.talent_seeker_id={$id_tts} and sm.n_status != 2 and jb.n_status != 5 && jb.n_status != 0 {$orderby} LIMIT {$start},{$limit}";
		//pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);
		// pr($rqData);exit;
		
		
		//pr($rqData);exit;
		if($rqData) {
			$no = $start+1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				$val['job_description']=strip_tags($val['job_description']);
				$tgl1 = date('d-m-Y');
				//pr($tgl1);exit;		
				$tgl2 =  $val['date']; 
				$selisih = strtotime($tgl2) - strtotime($tgl1); 
				$val['hari'] = $selisih/(60*60*24);
				$sql = "SELECT count(*) totals
					FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_application where 1  AND `jobboard_id`='{$val['id_job']}'";
				//pr($sql);exit;
				$total_registrant = $this->apps->fetch($sql);
				$val['registrant']=$total_registrant['totals'];
				
				
				
				
				
				
				
				
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
	function interview_job_ts($start=null,$limit=5,$id=null)
	{
	global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
	 
		$sql="select *,tts.id as idnya from tbl_talent_seeker tts inner join social_member sm on tts.user_id=sm.id where sm.id='{$id}'";
		//pr($sql);exit;
		$select_tts = $this->apps->fetch($sql,1);
		$id_tts=$select_tts[0]['idnya'];
		
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
		
		$sortir=@$_POST['sortir'];
		$orderby='';
		if($sortir == '')
		{
		$orderby=' order by jb.date DESC';
		}
		if($sortir == 'new')
		{
		$orderby=' order by jb.date DESC';
		}
		if($sortir == 'clostes')
		{
		$orderby=' order by jb.enddate ASC';
		}
		if($sortir == 'open')
		{
		$orderby=' and jb.n_status=1 and jb.enddate > CURDATE() and jb.n_status_interview=0';
		}
		if($sortir == 'closed')
		{
		$orderby=' and jb.enddate<=CURDATE()';
		}
		if($sortir == 'interview')
		{
		$orderby=' and jb.n_status_interview=1 and jb.enddate > CURDATE() ';
		}
		
		//GET TOTAL
		$sql = "SELECT count(*) total
			from {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard as jb left join tbl_talent_seeker tts on jb.talent_seeker_id=tts.id 
		
			LEFT JOIN social_member sm ON sm.id = tts.user_id
			left join job_category jc
 on jb.id_job=jc.jobboard_id  WHERE 1   and jb.enddate > (DATE_SUB(CURDATE(), INTERVAL 6 MONTH)) AND sm.n_status !=2 and jb.n_status_interview ='1'  and jb.n_status=1 and jb.talent_seeker_id={$id_tts} {$orderby}  ";

		$total = $this->apps->fetch($sql);		
		
	//pr($sql);exit;
		if(intval($total['total'])<=$limit) $start = 0;
		
	
		
		$sql = "select *,DATE_FORMAT(jb.enddate,'%d-%m-%Y') as date,jb.provinsi,jb.city,jb.n_status,jb.love_count as love_count from {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard as jb left join tbl_talent_seeker tts on jb.talent_seeker_id=tts.id 
		
		LEFT JOIN social_member sm ON sm.id = tts.user_id
		left join job_category jc
 on jb.id_job=jc.jobboard_id  WHERE 1   and jb.enddate > (DATE_SUB(CURDATE(), INTERVAL 6 MONTH)) AND sm.n_status !=2 and jb.n_status_interview ='1'  and jb.n_status=1 and jb.talent_seeker_id={$id_tts} {$orderby} LIMIT {$start},{$limit} ";
		//pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);
		//pr($rqData);exit;
		
		
		//pr($rqData);exit;
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
				$val['registrant']=$total_registrant['totals'];
				$sql = "SELECT *,DATE_FORMAT(ma.interview_date,'%Y-%m-%d') as datestring,DATE_FORMAT(ma.interview_date,'%H:%i%p') as timestring
					FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_application ma left join social_member sm on ma.user_id=sm.id where 1  AND `jobboard_id`='{$val['id_job']}'";
				//pr($sql);exit;
				$myapp = $this->apps->fetch($sql,1);
				//pr($myapp);
				$val['myapp']=$myapp;
				//pr($total_registrant);exit;
				
				
				
				
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
	
	function main_job($start=null,$limit=5,$id=null)
	{
	global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
		$publishedtype = intval($this->apps->_request('uid'));
		
		$sortir=@$_POST['sortir'];
		$orderby='';
		if($sortir == '')
		{
		$orderby=' order by jb.date DESC';
		}
		if($sortir == 'new')
		{
		$orderby=' order by jb.date DESC';
		}
		if($sortir == 'clostes')
		{
		$orderby=' order by jb.enddate ASC';
		}
		if($sortir == 'open')
		{
		$orderby=' and jb.n_status=1 and jb.enddate > CURDATE() and jb.n_status_interview=0';
		}
		if($sortir == 'closed')
		{
		$orderby=' and jb.enddate<=CURDATE()';
		}
		if($sortir == 'interview')
		{
		$orderby=' and jb.n_status_interview=1 and jb.enddate > CURDATE() ';
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
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard as jb left join tbl_talent_seeker tts on jb.talent_seeker_id=tts.id 
			
left join job_category jc
 on jb.id_job=jc.jobboard_id left join my_application ma on jb.id_job=ma.jobboard_id left join social_member sm on tts.user_id=sm.id WHERE 1   and jb.enddate > (DATE_SUB(CURDATE(), INTERVAL 6 MONTH))  AND sm.n_status !=2 AND ma.user_id={$id} {$orderby}";

		$total = $this->apps->fetch($sql);		
		
	//pr($sql);exit;
		if(intval($total['total'])<=$limit) $start = 0;
		
	
		
		$sql = "select *,DATE_FORMAT(jb.enddate,'%d-%m-%Y') as date,jb.provinsi,jb.city,jb.n_status as n_status,jb.love_count as love_count from {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard as jb left join tbl_talent_seeker tts on jb.talent_seeker_id=tts.id left join job_category jc
 on jb.id_job=jc.jobboard_id left join my_application ma on jb.id_job=ma.jobboard_id left join social_member sm on tts.user_id=sm.id WHERE 1   and jb.enddate > (DATE_SUB(CURDATE(), INTERVAL 6 MONTH))  AND sm.n_status !=2   AND ma.user_id={$id} {$orderby}  LIMIT {$start},{$limit}";
		//pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);
		//pr($rqData);exit;
		
		
		//pr($rqData);exit;
		if($rqData) {
			$no = $start+1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				$val['job_description']=strip_tags($val['job_description']);
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
	function following($start=null,$limit=10,$id)
	{
		global $CONFIG;
		//pr($id);exit;
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
		
		//GET LIST
		$sql = "select sm.id,sm.name,sm.img from {$CONFIG['DATABASE'][0]['DATABASE']}.my_follow mf left join social_member sm on mf.friend_id=sm.id where mf.user_id={$id} "; 
		//pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);
//pr($rqData);exit;
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
	
}
	
