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
	

	
	function listbanner(){
		global $CONFIG;
		$sql = "select * from {$CONFIG['DATABASE'][0]['DATABASE']}.news where category='3' order by id";
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
		$sql = "SELECT *,DATE_FORMAT(`date`,'%Y-%m-%d') AS `date` FROM {$CONFIG['DATABASE'][0]['DATABASE']}.news WHERE category='2'  ORDER BY id DESC LIMIT 3";
		
		$fetch = $this->apps->fetch($sql,1);	
		//pr($fetch);exit;
		return $fetch;
		
		}	
	function listpress(){
		global $CONFIG;
		$sql = "SELECT *,DATE_FORMAT(`date`,'%Y-%m-%d') AS `date` FROM {$CONFIG['DATABASE'][0]['DATABASE']}.news WHERE category='1'  ORDER BY id DESC LIMIT 3";
		
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
		$sql = "SELECT *,DATE_FORMAT(`date`,'%d/%m/%Y') AS tanggal FROM {$CONFIG['DATABASE'][0]['DATABASE']}.jobboard jb left join tbl_talent_seeker tts on jb.talent_seeker_id = tts.user_id where  1 and jb.n_status='1' and now() < jb.enddate ORDER BY jb.id_job LIMIT 8";
		//pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);	
		if($rqData) {
			$no = 1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				$tgl1 = date('d-m-Y');
			
				$sql = "SELECT img_avatar
					FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member where 1  AND `id`='{$val['user_id']}'";
				// pr($sql);
				$applicant = $this->apps->fetch($sql,1);
				//pr($applicant);exit;
				$val['applicantresult']=$applicant[0]['img_avatar'];
				$rqData[$key] = $val;

				
			}
			//pr($rqData);exit;
			// die;
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
		$sql = "SELECT sm.*,DATE_FORMAT(sm.register_date,'%d/%m/%Y') AS tanggal,
						tblcat.category_name AS category_name 
					FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member sm
					LEFT JOIN 
					(
						SELECT  * FROM  {$CONFIG['DATABASE'][0]['DATABASE']}.my_subcategory GROUP BY user_id
						
					) AS sub ON sm.id = sub.user_id
					
					LEFT JOIN 
					 {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_category tblcat ON sub.category_id=tblcat.id

					WHERE sm.n_status='1' and sm.role=1 ORDER BY sm.love_count DESC LIMIT 8";
		
		$fetch = $this->apps->fetch($sql,1);
	
		$data=array();
		$i=0;
		$j=0;
		$k=0;
		for ($x=0;$x<=9;$x++)
			{
				// pr($fetch[$k]);
				if(@$fetch[$k])
				{
					if($k < 3)
					{
						
						$fetch[$k]['popular']='1';
						
					}
					else
					{
						$fetch[$k]['popular']='0';
					}
					$data['data'][$i][]=$fetch[$k];
					$k++;
					if($k==5 )
					{
						
						$i++;
						
					}
					else if($x == 7)
					{
							$k=0;
							
					}
					
				
				}
				
				// if
			}
			
			return $data;
		
		}
function sendactiveagainMail(){
	
	
	
	global $CONFIG;
	//pr($_POST);exit;
	
	GLOBAL $ENGINE_PATH, $CONFIG, $LOCALE;
	require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
		
		
		$base64 = urldecode64($this->apps->_request('code'));
		 $content = unserialize($base64);
		 // pr($content);die;
		$sql="SELECT * FROM  social_member where id={$content['userid']} LIMIT 1 ";
		$fetch = $this->apps->fetch($sql);
		$email=$fetch ['email'];
		$to = $email;
		
	
	
		
		$mail = new PHPMailer();
				

		$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];  // sets the SMTP server
		$mail->SMTPAuth   = false;                  // enable SMTP authentication
		// $mail->Port       = 26;                    // set the SMTP port for the GMAIL server
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
				

		$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];  // sets the SMTP server
		$mail->SMTPAuth   = false;                  // enable SMTP authentication
		// $mail->Port       = 26;                    // set the SMTP port for the GMAIL server
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
				

		$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];  // sets the SMTP server
		$mail->SMTPAuth   = false;                  // enable SMTP authentication
		// $mail->Port       = 26;                    // set the SMTP port for the GMAIL server
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
				'role'=>$role
				
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
					

			$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];  // sets the SMTP server
			$mail->SMTPAuth   = false;                  // enable SMTP authentication
			// $mail->Port       = 26;                    // set the SMTP port for the GMAIL server
			$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
			$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
			
			$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
			$mail->FromName = 'Creasi';
			$mail->addAddress($to, $email);  // Add a recipient
			
			$mail->Subject    = "Contact";
			
			$mail->WordWrap = 50;
		
			$mail->isHTML(true);
			
			$tmplate=$LOCALE[1]['EMAIL_SUBSCRIBES']['verification']['hasjoin'];
			$tmplate=str_replace('{$name}',$name,$tmplate);
			$encrypteddata = urlencode64(serialize(array(
				'status'=>'1',
				'key'=>'crasikana',
				'userid'=>$fetch['id'],	 
				'email'=>$fetch['email'],
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
		global $CONFIG,$ENGINE_PATH;
		
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
			$mail = new PHPMailer();
					

			$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];  // sets the SMTP server
			$mail->SMTPAuth   = false;                  // enable SMTP authentication
			// $mail->Port       = 26;                    // set the SMTP port for the GMAIL server
			$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
			$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
			
			$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
			$mail->FromName = 'Creasi';
			if($explodemail)
			{
				foreach($explodemail as $value)
				{
					$mail->addAddress($value, $value);
				}
			}
			else
			{
					$mail->addAddress($to, $email);

			}
			  // Add a recipient
			
			$mail->Subject    = $LOCALE[1]['EMAIL_SUBSCRIBES']['share']['profile_subject'];
			
			$mail->WordWrap = 50;
		
			$mail->isHTML(true);
			$template=$LOCALE[1]['EMAIL_SUBSCRIBES']['share']['profile'];
			$template=str_replace('{$linkprofile}',$CONFIG['BASE_DOMAIN'].'personal/view?id='.$idprofile,$template);
			$template=str_replace('{$name}',$name,$template);
			$template=str_replace('{$urlprofile}',$CONFIG['BASE_DOMAIN'].'personal/view?id='.$idprofile,$template);
			$mail->MsgHTML($template);

			$hasil = $mail->Send();
			
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
			$mail = new PHPMailer();
					

			$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];  // sets the SMTP server
			$mail->SMTPAuth   = false;                  // enable SMTP authentication
			// $mail->Port       = 26;                    // set the SMTP port for the GMAIL server
			$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
			$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
			
			$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
			$mail->FromName = 'Creasi';
			if($explodemail)
			{
				foreach($explodemail as $value)
				{
					$mail->addAddress($value, $value);
				}
			}
			else
			{
					$mail->addAddress($to, $email);

			}
			  // Add a recipient
			
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
			require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
			$email=strip_tags($this->apps->_p('email'));
			
			$to = $email;
			$explodemail=explode(',',$email);
			
			
			
			$mail = new PHPMailer();
					

			$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];  // sets the SMTP server
			$mail->SMTPAuth   = false;                  // enable SMTP authentication
			// $mail->Port       = 26;                    // set the SMTP port for the GMAIL server
			$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
			$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
			
			$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
			$mail->FromName = 'Creasi';
			if($explodemail)
			{
				foreach($explodemail as $value)
				{
					$mail->addAddress($value, $value);
				}
			}
			else
			{
					$mail->addAddress($to, $email);

			}
			  // Add a recipient
			
			$mail->Subject    = str_replace('{$jobtitle}',$fetch['job_title'],$LOCALE[1]['share']['email']['jobs_subject']);
			
			$mail->WordWrap = 50;
		
			$mail->isHTML(true);
			$template=$LOCALE[1]['EMAIL_SUBSCRIBES']['share']['portofolio'];
			$template=str_replace('{$jobtitle}',$fetch['job_title'],$template);	
			$mail->MsgHTML($template);

			$hasil = $mail->Send();
			
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
			$templateEmail =str_replace('{$name}',$fetch['username'],$templateEmail);
			$templateEmail =str_replace('{$linkreset}',$CONFIG['BASE_DOMAIN'].'forgot/changepassword/'.$encrypteddata,$templateEmail);
			$mail = new PHPMailer();
					

			$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];  // sets the SMTP server
			$mail->SMTPAuth   = false;                  // enable SMTP authentication
			// $mail->Port       = 26;                    // set the SMTP port for the GMAIL server
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
			$result['msg']='email tidak terdaftar';
		}
		else
		{
			$result['status']=0;
			$result['msg']='email tidak terdaftar';
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
	
	
	
	global $CONFIG;
	//pr($_POST);exit;
	
	GLOBAL $ENGINE_PATH, $CONFIG, $LOCALE;
	require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
		
		$base64 = urldecode64($this->apps->_request('code'));
		 $content = unserialize($base64);
		$email=$content['email'];
		$name=@$content['name'];
		$role=@$content['role'];	
		$to = $email;
		
		$sqlChcek ="SELECT  * FROM  social_member  where id='{$content['userid']}' and n_status=1";
		
		$rqChcek = $this->apps->query($sqlChcek);
		
		
		$sqlupdate ="UPDATE  social_member set n_status='1' where id='{$content['userid']}'";
		
		$rqupdate = $this->apps->query($sqlupdate);
	
		
		
		if($rqChcek )
		{
			return true;
		}
		
		$mail = new PHPMailer();
				

		$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];  // sets the SMTP server
		$mail->SMTPAuth   = false;                  // enable SMTP authentication
		// $mail->Port       = 26;                    // set the SMTP port for the GMAIL server
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
				
			$mail->WordWrap = 50;
		
			$mail->isHTML(true);
			$result = $mail->Send();
			
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
}
	