<?php
class emailnotifHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	

		
	function sendEmail(){
		global $CONFIG;
	//pr($_POST);exit;
	
	GLOBAL $ENGINE_PATH, $CONFIG, $LOCALE;
	require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
	$idjobs=$this->apps->_request('id');
	$sql = "SELECT   jbc.category_id  AS category_id,jbc.subcategory_id  AS subcategory_id,jb.job_title AS job_title,ts.nama_perusahaan AS nama_perusahaan,
						ts.user_id AS user_id,sm.email as email,jb.n_status
						FROM  {$CONFIG['DATABASE'][0]['DATABASE']}.job_category jbc
						LEFT JOIN jobboard jb ON jbc.jobboard_id=jb.id_job
						LEFT JOIN tbl_talent_seeker ts ON jb.talent_seeker_id=ts.id
						LEFT JOIN social_member sm ON ts.user_id=sm.id
						WHERE jobboard_id='{$idjobs}'"; 
						//pr($sql);die;
		$response = $this->apps->fetch($sql);
		// pr($response);
		$email=$response['email'];
		$name=$response['nama_perusahaan'];
		$status=$response['n_status'];	
		$to = $email;
		
		$subject ='';
		$template ='';
		if($status==2)
		{
			$status='unpublish';
			$subject = $LOCALE[1]['EMAIL_SUBSCRIBES']['jobs_unpublish_subject'];
			$subject =str_replace('{$titlejob}',$response['job_title'],$subject);
			
			$template=$LOCALE[1]['EMAIL_SUBSCRIBES']['jobs_unpublish'];
			$template =str_replace('{$nameTs}',$name,$template);
			$template =str_replace('{$titlejobs}',$response['job_title'],$template);
		}
		elseif($status==0 )
		{
			$status='unpublish';
			$subject = $LOCALE[1]['EMAIL_SUBSCRIBES']['jobs_unpublish_subject'];
			$subject =str_replace('{$titlejob}',$response['job_title'],$subject);
			
			$template=$LOCALE[1]['EMAIL_SUBSCRIBES']['jobs_unpublish'];
			$template =str_replace('{$nameTs}',$name,$template);
			$template =str_replace('{$titlejobs}',$response['job_title'],$template);
		}
		elseif($status==1)
		{
			$status='publish';
			$subject = $LOCALE[1]['EMAIL_SUBSCRIBES']['jobs_publish_subject'];
			$subject =str_replace('{$titlejobs}',$response['job_title'],$subject);
			
			$template=$LOCALE[1]['EMAIL_SUBSCRIBES']['jobs_publish'];
			$template =str_replace('{$nameTs}',$name,$template);
			$template =str_replace('{$titlejobs}',$response['job_title'],$template);

		}
		// pr($template);
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
		
		
		$mail->Subject    = $subject;
		
		$mail->WordWrap = 50;
	
		$mail->isHTML(true);
		
		
		//$mail->MsgHTML($this->template_email($name,$email,$status));
		$mail->MsgHTML($template);
		$result = $mail->Send();
		// pr($template);die;
		return $result;
		
		}			
	
	function sendemailRejectJobs(){
		global $CONFIG;
	//pr($_POST);exit;
	
	GLOBAL $ENGINE_PATH, $CONFIG, $LOCALE;
	require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
	$idjobs=$this->apps->_request('id');
	$sql = "SELECT   jbc.category_id  AS category_id,jbc.subcategory_id  AS subcategory_id,jb.job_title AS job_title,ts.nama_perusahaan AS nama_perusahaan,
						ts.user_id AS user_id,sm.email as email,jb.n_status
						FROM  {$CONFIG['DATABASE'][0]['DATABASE']}.job_category jbc
						LEFT JOIN jobboard jb ON jbc.jobboard_id=jb.id_job
						LEFT JOIN tbl_talent_seeker ts ON jb.talent_seeker_id=ts.id
						LEFT JOIN social_member sm ON ts.user_id=sm.id
						WHERE jobboard_id='{$idjobs}'"; 
						//pr($sql);die;
		$response = $this->apps->fetch($sql);
		//pr($response);
		$email=$response['email'];
		$name=$response['nama_perusahaan'];
		$status=$response['n_status'];	
		$to = $email;
		
		$subject ='';
		$template ='';
		if($status==2)
		{
			$status='reject';
		}
		elseif($status==0)
		{
			$status='unpublish';
			$subject = $LOCALE[1]['EMAIL_SUBSCRIBES']['jobs_unpublish_subject'];
			$subject =str_replace('{$titlejobs}',$response['job_title'],$subject);
			
			$template=$LOCALE[1]['EMAIL_SUBSCRIBES']['jobs_unpublish'];
			$template =str_replace('{$nameTs}',$name,$template);
			$template =str_replace('{$titlejobs}',$response['job_title'],$template);
		}
		elseif($status==1)
		{
			$status='publish';
			$subject = $LOCALE[1]['EMAIL_SUBSCRIBES']['jobs_publish_subject'];
			$subject =str_replace('{$titlejobs}',$response['job_title'],$subject);
			
			$template=$LOCALE[1]['EMAIL_SUBSCRIBES']['jobs_publish'];
			$template =str_replace('{$nameTs}',$name,$template);
			$template =str_replace('{$titlejobs}',$response['job_title'],$template);

		}
		//pr($status);
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
		
		
		$mail->Subject    = $subject;
		
		$mail->WordWrap = 50;
	
		$mail->isHTML(true);
		
		
		//$mail->MsgHTML($this->template_email($name,$email,$status));
		$mail->MsgHTML($template);
		$result = $mail->Send();
		//pr($result);die;
		return $result;
	
	}
	function resendMail(){
	 
	
	
	global  $ENGINE_PATH, $CONFIG, $LOCALE;
		$iduser=$this->apps->_request('iduser');
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member WHERE id='{$iduser}'"; 
		$result['status']=1;
		$result['msg']='proses gagal ulangi lagi';
		$fetch = $this->apps->fetch($sql);	
		// pr($fetch);die;
		if($fetch)
		{
			require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
			$email=$fetch['email'];
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
			$result['msg']='email tidak terdaftar';
		}
		else
		{
			$result['status']=0;
			$result['msg']='email tidak terdaftar';
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
							
							<td>Account anda sudah aktive kembali silahkan <a href="'.$CONFIG['BASE_DOMAIN'].'login">aktive</a></td>
						</tr>
						<tr>
							<td colspan=2></td>
						</tr>
						</table>
						
						
						</body>
						</html>';
		return $template;
	}	
}
	