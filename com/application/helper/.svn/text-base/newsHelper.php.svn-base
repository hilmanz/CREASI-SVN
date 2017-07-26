<?php
// require_once('pdf/html2pdf.class.php');
class newsHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	
	
	
	function listnews($category=1,$start=null,$limit=5)
	{
		global $CONFIG;
		
		$result['result'] = false;
		$result['total'] = 0;
		
		if($start==null)$start = intval($this->apps->_request('start'));
		$limit = intval($limit);
	  
		
		//GET TOTAL
		$sql = "SELECT count(*) total 
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.news 
			WHERE 1 and category='{$category}' and n_status!=2 ";
		$total = $this->apps->fetch($sql);		
		
	
		if(intval($total['total'])<=$limit) $start = 0;
		
		//GET LIST
		$sql = "
			SELECT *,DATE_FORMAT(date,'%d %M %Y') as fulldate,DATE_FORMAT(date,'%d') as date,DATE_FORMAT(date,'%M') as `month`,DATE_FORMAT(date,'%Y') as `year`
			FROM {$CONFIG['DATABASE'][0]['DATABASE']}.news 
			WHERE 1 and category='{$category}' and n_status!=2
			ORDER BY id DESC LIMIT {$start},{$limit}"; 
		//pr($sql);exit;
		$rqData = $this->apps->fetch($sql,1);

		if($rqData) {
			$no = $start+1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				$val['month'] = substr($val['month'],0,3) ;
				$val['description'] = strip_tags($val['description']) ;
				
				$rqData[$key] = $val;

				$sql = "SELECT COUNT(*) total_data
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.news and n_status!=2
						WHERE 1";
				
				$total_registrant = $this->apps->fetch($sql);
				$rqData[$key]['total'] = intval($total_registrant['total_data']);
			}
			
			if($rqData) $qData=	$rqData;
			else $qData = false;
		} else $qData = false;
		
		$result['result'] = $qData;
		$result['total'] = intval($total['total']);
		
		
		return $result;
	}	
	function addnews(){
		global $CONFIG;
		//pr($_POST);exit;
		$title = strip_tags(@$this->apps->_p('title'));       
		$description = @$_POST['description'];  
		$caption = @$_POST['caption'];  
		$startdate =  date('Y-m-d H:i:s'); 
		//pr($startdate);exit;
		
		
		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.news (`title`,`caption`, `description`,`date`) 
							VALUES ('{$title}', '{$caption}', '{$description}','{$startdate}')";
				  	
		$res = $this->apps->query($sql);
		
		return true;
		}	
	function details(){
			global $CONFIG;
			$result['result'] = false;
			
			$id = strip_tags(@$this->apps->_request('id'));       
			
			$sql = "
				SELECT *,DATE_FORMAT(date,'%d %M %Y') as fulldate,DATE_FORMAT(date,'%d') as date,DATE_FORMAT(date,'%M') as `month`,DATE_FORMAT(date,'%Y') as `year`
				FROM {$CONFIG['DATABASE'][0]['DATABASE']}.news 
				WHERE 1 and id='{$id}'"; 
			// pr($sql);exit;
				$rqData = $this->apps->fetch($sql);
			$result['result'] = $rqData;
				return $result;
		}	
	function sendmail(){
			global $CONFIG;
			//pr($_POST);exit;
	
			GLOBAL $ENGINE_PATH, $CONFIG, $LOCALE;
			require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
			
			
			$idcontent=strip_tags($this->apps->_p('idcontent'));
			$email=$this->apps->_p('email');
			
			$to = $email;
			
			$explodemail=explode(',',$email);
			$sql ="SELECT * FROM news where id='{$idcontent}'";
			$rqData = $this->apps->fetch($sql);
			
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
			
			$mail->Subject    = "Share News";
			
			$mail->WordWrap = 50;
		
			$mail->isHTML(true);
			$template =	$LOCALE[1]['share']['email']['news'];
			$template = str_replace('{$urllink}',$CONFIG['BASE_DOMAIN'].'news/details/'.$rqData['id'],$template);
			
			$mail->MsgHTML($template);

			$result = $mail->Send();
			// pr($result);
			return $result;
			
		}	
	function templateEmail($rqData){
		
			$template = '<html>
						<head>
						<title>Creasi</title>
						<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
						</head>
						<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
						<table id="Table_01" width="650" border="0" cellpadding="0" cellspacing="0" style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#898989;">
						
						
						<tr><td></td></tr>
						<tr><h2 style="font-size:24px; color:#FFF; margin:0; padding:10px 30px;">Pesan Baru</h2></td></tr>
						<table id="" width="100%" border="0" cellpadding="10" cellspacing="0" style=" margin-left:-10px; color:#898989;">
						
						<tr>
							
							<td>'.$rqData['title'].'</td>
						</tr>
						<tr>
							
							<td>'.$rqData['description'].'</td>
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
	
