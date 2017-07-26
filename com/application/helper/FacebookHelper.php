<?php
global $ENGINE_PATH;
include_once $ENGINE_PATH."Utility/facebook/facebook.php";
class FacebookHelper {
	var $fb;
	var $user_id;
	var $me;
	var $_access_token;
	var $logger;
	function __construct($apps=null){
		global $logger;
		$this->apps = $apps;
		$this->logger = $logger;
		$this->init();
		
	}
	
	function init(){
		global $FB,$CONFIG,$thisMobile;
	
			$this->fb = new Facebook(array(
			  'appId'  => $FB['appID'],
			  'secret' => $FB['appSecret'],
			));
			//session_destroy();
			
			$type =$this->apps->_g('type');// type yang di share contoh  jobs,news,press,portofolio
			$idtype =$this->apps->_g('id'); //for id contoh id portfolio,id news ,id press
			$module=$this->apps->_g('module'); //posisi saat share
			$action=$this->apps->_g('action'); 
			
			
			
			$param=$this->apps->_g('parameter');
			$loginReqUri = "http://{$_SERVER['HTTP_HOST']}/share/fbShare?module={$module}&action={$action}&type={$type}&id={$idtype}"; 
				
			// pr($loginReqUri);die;
			
			//pr($this->fb->getUser());
			try{
			
				if($this->fb->getUser()){
					try{
						   
						$this->logger->log('[FACEBOOK] [LOGIN ] : Success login, got logout url ');
						$this->fb->setExtendedAccessToken();
						$data['ac'] = $this->fb->getAccessToken();
						$data['user'] =$this->fb->getUser();
						$data['userProfile']['socimg']= "https://graph.facebook.com/{$this->fb->getUser()}/picture?type=square&return_ssl_resources=1";
						$data['userProfile']= $this->fb->api('/me');
						if(isset($thisMobile))$params['next'] = "{$CONFIG['MOBILE_SITE']}logout.php";
						else $params['next'] = $loginReqUri;
						
						if($this->fb->getUser()){
							$data['urlConnect'] =$this->fb->getLogoutUrl($params);
							
						}else{
							$paramse = array('scope' => 'user_mobile_phone,email,user_status,user_activities,publish_actions,user_likes,read_friendlists,user_about_me,user_location,publish_stream,user_relationships,read_stream','auth_type'=>'rerequest','redirect_uri'=>"{$loginReqUri}");
							$data['urlConnect'] =$this->fb->getLoginUrl($paramse);
						}
						$userid['id']=$data['user'];
						
						$this->apps->session->setSession('facebook_session','facebook',$data);
						
						
					}catch (Exception $e){
					
						$this->logger->log('[FACEBOOK] [LOGIN ] : failed to login , get url login ');
							
						$paramse = array('scope' => 'user_mobile_phone,email,user_status,user_activities,publish_actions,user_likes,read_friendlists,user_about_me,user_location,publish_stream,user_relationships,read_stream','auth_type'=>'rerequest','redirect_uri'=>"{$loginReqUri}");
					
						$data['urlConnect'] =$this->fb->getLoginUrl($paramse);
						$this->apps->session->setSession('facebook_session','facebook',$data);
						
					}		
					
								
				}else {
					
					$this->logger->log('[FACEBOOK] : get login url ');
					// pr('sss');die;
					$paramse = array('scope' => 'user_mobile_phone,email,user_status,user_activities,publish_actions,user_likes,read_friendlists,user_about_me,user_location,publish_stream,user_relationships,read_stream','auth_type'=>'rerequest','redirect_uri'=>"{$loginReqUri}");
				
					$data['urlConnect'] =$this->fb->getLoginUrl($paramse);
			
					$this->apps->session->setSession('facebook_session','facebook',$data);
					
				}
				return $data;
			}catch (Exception $e){
			
					$this->logger->log('[FACEBOOK] : get login url , failed authorize ');
					
						$paramse = array('scope' => 'user_mobile_phone,email,user_status,user_activities,publish_actions,user_likes,read_friendlists,user_about_me,user_location,publish_stream,user_relationships,read_stream','auth_type'=>'rerequest','redirect_uri'=>"{$loginReqUri}");
						$data['urlConnect'] =$this->fb->getLoginUrl($paramse);
						$this->apps->session->setSession('facebook_session','facebook',$data);
						return $data;
			}	
	}
	function checkUserLogin(){
		//pr($this->fb->getUser());
		
		if($this->fb->getUser()){
			return true;
		}
		return false;
	}
	function getUser()
	{
		if($this->fb->getUser()){
			$user = $this->fb->getUser();
			return $user;
		}
		return false;
	}
	function share($idsosmed=''){
		global $FB,$CONFIG,$thisMobile,$LOCALE;
				$type =$this->apps->_g('type');// type yang di share contoh  jobs,news,press,portofolio
				$idtype =$this->apps->_g('id'); //for id contoh id portfolio,id news ,id press
				$module=$this->apps->_g('module'); //posisi saat share
				$action=$this->apps->_g('action'); 
				$realimagespath ='';
				$desc="";
				$idUser='';
					// pr('sss');die; 
				$sessionFacebook = $this->apps->session->getSession('facebook_session','facebook');
				$realimagespath = "";
				$desc="";
				$linkshare = '';
				
				
				
		
				if($type=='jobs')
				{	
					$sql="SELECT * FROM jobboard jb  LEFT JOIN  tbl_talent_seeker ts ON jb.talent_seeker_id=ts.id where jb.id_job='{$idtype}' ";
					// pr($sql);
					$qData = $this->apps->fetch($sql);
					if($qData)
					{
						if(@$qData['file'])
						{
							$realimagespath = "{$CONFIG['BASE_DOMAIN_PATH']}public_assets/postjob/".$qData['file'];
						}
						if($action)
						{
							$action ='/'.$action.'?id='.$idtype;
						}
						$linkshare = "{$CONFIG['BASE_DOMAIN_PATH']}{$module}{$action}";
						//$desc="HAI {$qData['nama_perusahaan']} Sedang Membutuhkan  lowongan di bagian ".$qData['job_title'];
						$desc=str_replace('{$jobtitle}',$qData['job_title'],$LOCALE[1]['share']['FB']['jobs']);
					}
				}
				if($type=='jobs')
				{	
					$sql="SELECT *,sm.img_avatar FROM jobboard jb  
								LEFT JOIN  tbl_talent_seeker ts ON jb.talent_seeker_id=ts.id
								LEFT JOIN  social_member sm ON ts.user_id=sm.id
								where jb.id_job='{$idtype}' ";
					// pr($sql);
					$qData = $this->apps->fetch($sql);
					if($qData)
					{ 
						if($qData['share_count']==0 || $qData['share_count']=='')
							{
									$sqlupdate ="UPDATE  jobboard set share_count='1' where id_job='{$idtype}";
						
									$rqupdate = $this->apps->query($sqlupdate);
							}
							else
							{
									$sqlupdate ="UPDATE  jobboard set share_count=share_count+1 where id_job='{$idtype}'";
						
									$rqupdate = $this->apps->query($sqlupdate);
							}

					
					
						if(@$qData['img_avatar'])
						{
							$realimagespath = "{$CONFIG['BASE_DOMAIN_PATH']}public_assets/personal/".$qData['img_avatar'];
						}
						if($action)
						{
							$action ='/'.$action.'?id='.$idtype;
						}
						$linkshare = "{$CONFIG['BASE_DOMAIN_PATH']}{$module}{$action}";
						//$desc="HAI {$qData['nama_perusahaan']} Sedang Membutuhkan  lowongan di bagian ".$qData['job_title'];
						$desc=str_replace('{$jobtitle}',$qData['job_title'],$LOCALE[1]['share']['FB']['jobs']);
					}
				}
				elseif($type=='profile')
				{	
					$sql="SELECT * FROM social_member where id='{$idtype}' ";
					$qData = $this->apps->fetch($sql);
					if($qData)
					{
						if(@$qData['img'])
						{
							$realimagespath = "{$CONFIG['BASE_DOMAIN_PATH']}public_assets/postjob/".$qData['img'];
						}
						if($action)
						{
							$action ='/'.$action.'?id='.$idtype;
						}
						$linkshare = "{$CONFIG['BASE_DOMAIN_PATH']}{$module}{$action}";
						//$desc="HAI {$qData['nama_perusahaan']} Sedang Membutuhkan  lowongan di bagian ".$qData['job_title'];
						$desc=$LOCALE[1]['share']['FB']['profile'];
					}
				}
				elseif($type=='join')
				{	
					$sql="SELECT * FROM social_member where id='{$idtype}' ";
					$qData = $this->apps->fetch($sql);
					if($qData)
					{
						if(@$qData['img'])
						{
							$realimagespath = "{$CONFIG['BASE_DOMAIN_PATH']}public_assets/postjob/".$qData['img'];
						}
						if($action)
						{
							$action ='/personal/view?/'.$idtype;
						}
						$linkshare = "{$CONFIG['BASE_DOMAIN_PATH']}{$module}{$action}";
						//$desc="HAI {$qData['nama_perusahaan']} Sedang Membutuhkan  lowongan di bagian ".$qData['job_title'];
						$desc=$LOCALE[1]['share']['FB']['join'];
					}
				}
				elseif($type=='news')
				{	
					$sql="SELECT * FROM news where id='{$idtype}' ";
					$qData = $this->apps->fetch($sql);
					if($qData)
					{
						if(@$qData['img'])
						{
							$realimagespath = "";
						}
						if($action)
						{
							$action ='/'.$action.'?id='.$idtype;
						}
						$linkshare = "{$CONFIG['BASE_DOMAIN_PATH']}{$module}{$action}";
						//$desc="HAI {$qData['nama_perusahaan']} Sedang Membutuhkan  lowongan di bagian ".$qData['job_title'];
						$desc=$LOCALE[1]['share']['FB']['news'];
						//$desc=$qData['title'];
					}
				}
				elseif($type=='portofolio')
				{	
					$sql="SELECT * FROM my_portofolio where id='{$idtype}' ";
					$qData = $this->apps->fetch($sql);
					if($qData)
					{
						if(@$qData['images'])
						{
							$realimagespath = "{$CONFIG['BASE_DOMAIN_PATH']}public_assets/postjob/".$qData['images'];
						}
							if($action)
									{
										if($qData['type']=='1')
										{
											$action ='/'.$action.'?images='.$idtype.'&id='.$qData['user_id'];
										}
										elseif($qData['type']=='2')
										{
											$action ='/'.$action.'?video='.$idtype.'&id='.$qData['user_id'];
										}
										elseif($qData['type']=='3')
										{
											$action ='/'.$action.'?audio='.$idtype.'&id='.$qData['user_id'];
										}
									}
						
						$linkshare = "{$CONFIG['BASE_DOMAIN_PATH']}{$module}{$action}";
						//$desc="HAI ";
						$desc=$LOCALE[1]['share']['FB']['portfolio'];
					}
				}
				
				
					
					
				$params = array(
					
					  "access_token" =>  $sessionFacebook->ac,// see:   "message" => $message,
					 "link" =>  $linkshare,
					  "picture" => $realimagespath,  
					   "description" =>  $desc
					);
		// pr($params);die;
				try {
					  $ret = $this->fb->api('/'.$sessionFacebook->user.'/feed', 'POST', $params);
					  $sql = " INSERT INTO tbl_share 
										(idsosmed,userid,module,id_module,date,media,n_status) 
										VALUES ('{$idsosmed}','{$idUser}','{$type}','{$idtype}',NOW(),'1','1')";
						$query = $this->apps->query($sql);
						
					  if($type!='join')
						{	
							
							session_destroy();
							$this->destroy();
						}
						else
						{
							// pr($_SESSION);die;
							// pr('asa');
							// pr($this->apps->session->getSession($CONFIG['SESSION_NAME'],"WEB"));die;
						}
						
						
						$result['status']=1;
						$result['messages']='sucsess';
						return $result;
					} catch(Exception $e) {
						
						if($type!='join')
						{	
							session_destroy();
							$this->destroy();
						}
						
						$result['status']=3;
						$result['messages']=$e->getMessage();
						return $result;
					
					}
			
	}
	function destroy()
	{
				global $FB;
		$this->fb = new Facebook(array(
			  'appId'  => $FB['appID'],
			  'secret' => $FB['appSecret'],
			));
		$this->fb->destroySession();
		
		setcookie("fbm_1501595333431183",'');
		
	}
	function getUserLike()
	{
			$sql = "SELECT id,userid FROM user_flavors ";
			$qData = $this->apps->fetch($sql,1);
			
			foreach (	$qData as $datasql)
			{
				$url = 'http://www.whoisyoggy.com/gallery/detail/'.$datasql['userid'].'/'.$datasql['id'];
			
				 

				 $params = 'select comment_count, share_count, like_count,comments_fbid from link_stat where url = "'.$url.'"';
				 $component = urlencode( $params );
					
				 $url = 'http://graph.facebook.com/fql?q='.$component;
				
				 $fbLIkeAndSahre = json_decode(file_get_contents($url)); 
				
				if($fbLIkeAndSahre->data['0']->comments_fbid)
				{
					 $datacount = $this->fb->api('/'.$fbLIkeAndSahre->data['0']->comments_fbid.'/likes');
					
					 foreach ($datacount['data'] as $userdata)
					 {
						$user = $this->fb->api('/'.$userdata['id']);
						$sql ="SELECT count(*) as total,id FROM social_member where   fbid ='{$user['id']}' LIMIT 1 ";
						 
						$qData = $this->apps->fetch($sql);
						$userid['id']=$qData['id'];
						if($qData['total'] == 0 ) 
							{
								//pr($user );
								$sql = " INSERT INTO social_member 
									(fbid,username,nickname,name,last_name,email,city,sex,last_login,login_count,n_status) 
									VALUES ('{$user['id']}','{$user['first_name']}','{$user['first_name']}','{$user['first_name']}','{$user['last_name']}','','','{$user['gender']}',NOW(),'1','1')";
								
								$query = $this->apps->query($sql);
								$userid['id']=$this->apps->getLastInsertId();
							}
							
						if(	$userid['id'])
						{
								$sql ="SELECT userid FROM user_likes where   userid ='{$userid['id']}' and usr_flavor_id ='{$datasql['id']}'LIMIT 1 ";
								$qData = $this->apps->fetch($sql);
								   
								if(!$qData)
								{
									$sql = " INSERT INTO user_likes 
										(usr_flavor_id,userid,voted_date,n_status) 
										VALUES ('{$datasql['id']}','{$userid['id']}',NOW(),'1')";
									
									$query = $this->apps->query($sql);
								}
						}
					 }
				 }
			}
			
			 //return $getFbStatus->like_count;
	}  
	function getLikecount()
	{
		
		$sql = "SELECT id,userid FROM user_flavors "; 
			$qData = $this->apps->fetch($sql,1);
			 pr($qData);
			foreach ($qData as $datasql)
			{
				
				$url = 'http://www.whoisyoggy.com/gallery/detail/'.$datasql['userid'].'/'.$datasql['id'];
			
				pr($datasql['id']);

				 $params = 'select comment_count, share_count, like_count,comments_fbid from link_stat where url = "'.$url.'"';
				 $component = urlencode( $params );
					
				 $url = 'http://graph.facebook.com/fql?q='.$component;
		
				 $fbLIkeAndSahre = json_decode(file_get_contents($url)); 
				if( $fbLIkeAndSahre)
				{
					$likefb = $fbLIkeAndSahre->data['0']->like_count + $fbLIkeAndSahre->data['0']->share_count + $fbLIkeAndSahre->data['0']->comment_count;
					$sql = " UPDATE user_flavors  SET like_fb='{$likefb}' where   id ='{$datasql['id']}'";
			
					$query = $this->apps->query($sql);
					//$datacount = $this->fb->api('/'.$fbLIkeAndSahre->data['0']->comments_fbid.'/likes?limit=500');
				}
			}
		return true;
	}
}
?>