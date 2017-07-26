<?php
class emailHelper  {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	
	
	
	function publishjobs()
	{
		GLOBAL $ENGINE_PATH, $CONFIG, $LOCALE;
	require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
		
		
		$email=strip_tags($this->apps->_p('email'));
		$name=strip_tags($this->apps->_p('name'));
			
		$to = $email;
		
	
	
		
		$mail = new PHPMailer();
				

		$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];  // sets the SMTP server
		$mail->SMTPAuth   = false;                  // enable SMTP authentication
		// $mail->Port       = 26;                    // set the SMTP port for the GMAIL server
		$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
		$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
		
		$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
		$mail->FromName = 'Shinkenjuku';
		$mail->addAddress($to, $email);  // Add a recipient
		
		$mail->Subject    = "Contact";
		
		$mail->WordWrap = 50;
	
		$mail->isHTML(true);
		$mail->MsgHTML($this->email_template_activation($name,$email,$id));

		$result = $mail->Send();
		
		return $result;
	}	
	function template_publishjobs()
	{
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
	
}
	