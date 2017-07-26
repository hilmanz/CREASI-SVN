<?php 

class appsHelper {

	function __construct($apps){
	
	
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->config = $CONFIG;
		$this->apps = $apps;
		$this->uid  = 0;
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);
		
		$this->dbshema = "touchbase";	
		
		$this->week = 7;
		$week = intval($this->apps->_request('weeks'));
		if($week!=0) $this->week = $week;
		
		$this->startweekcampaign = "2013-05-20";
		$this->datetimes = date("Y-m-d H:i:s");
 
		
	   
	}
	
	
	function twitterUpdates($realimagespath=false){
		global $ENGINE_PATH,$CONFIG;
		require_once $ENGINE_PATH.'Utility/twitteroauth/OAuth.php';
		require_once $ENGINE_PATH.'Utility/twitteroauth/twitter.class.php';
		$link =$CONFIG['BASE_DOMAIN'];
		$desc ="";
		$hastag ="";
		if($this->apps->_p('link'))
			{
				$link= $this->apps->_p('link');
			}
		if($this->apps->_p('desc'))
			{
				$desc= $this->apps->_p('desc');
			}
		if($this->apps->_p('hastag'))
			{
				$hastag= $this->apps->_p('hastag');
			}
		$getSession = $this->apps->session->getSession('twitter_session','twitter');
	
		$consumerKey = "LoqtVMInWWfel8NVg8EPAPZle";
		$consumerSecret = "CLI3gnLVhn6x62sUnEweYAd2Y6Daw0YTc8FlqBNFCX4aVbeORy";
		$accessToken = $getSession->token;
		$accessTokenSecret = $getSession->secret;
		// ENTER HERE YOUR CREDENTIALS (see readme.txt)
		$twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
	
			$data['sendtwitterpost'] = false; 
			$data['message'] = "failed"; 
		try {
			if($CONFIG['TWITURL'])$tweet = $twitter->send("{$desc} {$hastag} {$realimagespath} "); 
			else $tweet = $twitter->send(" {$desc} {$hastag}",$realimagespath); // you can add $imagePath as second argument
			$data['sendtwitterpost'] = true; 
			$data['message'] = "success"; 
		} catch (TwitterException $e) {
			$data['message'] =  $e->getMessage();
			 
		}
		session_destroy();
		return $data;
	
	}
	function syncFacebook(){
		global $FB,$CONFIG,$thisMobile,$ENGINE_PATH;
		include_once $ENGINE_PATH."Utility/facebook/facebook.php";
		
		$this->fb = new Facebook(array(
			    'appId'  => $FB['appID'],
			  'secret' => $FB['appSecret'],
			));
		$result['status']=0;
		$result['messages']='file not found';
		
		if($this->apps->session->getSession('facebook_session','facebook')) {
			$sessionFacebook = $this->apps->session->getSession('facebook_session','facebook');
			
			$this->logger->log('HAVE FB USER ID');
			
			$fb_id = @$sessionFacebook->userProfile->id;
			$name = @$sessionFacebook->userProfile->name;
			$sex = @$sessionFacebook->userProfile->gender;
			$email =  @$sessionFacebook->userProfile->email;
			$username =  @$sessionFacebook->userProfile->username;
			$location =  @$sessionFacebook->userProfile->location->name;
			$gender =  @$sessionFacebook->userProfile->gender;
			$lastName =  @$sessionFacebook->userProfile->last_name;
			
			if($fb_id!=null){
				$this->logger->log('MATCH PHONE N FB USER ID');
				$sql ="SELECT count(*) as total,id FROM tbl_sosmed where  email='{$email}' and fbid ='{$fb_id}' LIMIT 1 ";
				
				$qData = $this->apps->fetch($sql);
				$this->logger->log('check fb and email '.$sql);
			
				if($qData['total'] > 0 ) 
				{
					$userid['id']=$qData['id'];
					//$this->apps->session->setSession($CONFIG['SESSION_NAME'],'WEB',$userid);
					$sql = " UPDATE tbl_sosmed SET login_count=login_count+1 WHERE email='{$email}' and fbid ='{$fb_id}'  LIMIT 1";
				
					$this->logger->log('update fb where email  '.$sql);
					$uData = $this->apps->query($sql);
					
					if($uData)
					{
						$result['status']=1;
						$result['messages']='update berhasil';
						$result['email']=$email;						$result['iduser']=$userid['id'];
						return $result;
						
					}
					else 
					{
						$result['status']=40;
						$result['messages']='can not update user';
						$result['email']=$email;
						return $result;
					}
				
				
				}
				else
				{
				
					$sql = " INSERT INTO tbl_sosmed 
							(fbid,username,nickname,name,last_name,email,city,sex,last_login,login_count,first_login,n_status) 
							VALUES ('{$fb_id}','{$username}','{$username}','{$name}','{$lastName}','{$email}','{$location}','{$gender}',NOW(),'1',NOW(),'1')";
					
					$query = $this->apps->query($sql);
					$userid['id']=$this->apps->getLastInsertId();
					
					//$this->apps->session->setSession($CONFIG['SESSION_NAME'],'WEB',$userid);
					
					if($query)
					{
						$result['status']=1;
						$result['messages']='add user berhasil';
						$result['email']=$email;						$result['iduser']=$userid['id'];
						return $result;
					}
					else 
					{	
						$result['status']=41;
						$result['messages']='insert user problem please try againt';
						return $result;
					}
				}
				
				  
				
			}else {
				$result['status']=3;
				$result['messages']='NOT MATCH  FB USER ID';
				$this->logger->log('NOT MATCH PHONE N FB USER ID');
				return $result;
			}
			
			
		}else{
			$result['status']=2;
			$result['messages']='Not Session Facebook';
			$this->logger->log('LOST FB USER ID');
		return $result;
		}
	
	
	}		function syncTwitter(){		global $FB,$CONFIG,$thisMobile,$ENGINE_PATH;				if($this->apps->session->getSession('twitter_session','twitter')) {			$getSession = $this->apps->session->getSession('twitter_session','twitter');						$this->logger->log('HAVE FB USER ID');						$twitter_id = @$getSession->twitter_id;;			$name = @$getSession->userProfile->name;			$sex = '';			$email =  '';			$username =  @$getSession->userProfile->name;			$location =  '';			$gender = '';			$lastName = @$getSession->userProfile->name;						if($twitter_id!=null){				$this->logger->log('MATCH PHONE N FB USER ID');				$sql ="SELECT count(*) as total,id FROM tbl_sosmed where  email='{$email}' and twitterid ='{$twitter_id}' LIMIT 1 ";								$qData = $this->apps->fetch($sql);				$this->logger->log('check fb and email '.$sql);							if($qData['total'] > 0 ) 				{					$userid['id']=$qData['id'];					//$this->apps->session->setSession($CONFIG['SESSION_NAME'],'WEB',$userid);					$sql = " UPDATE tbl_sosmed SET login_count=login_count+1 WHERE  twitterid ='{$twitter_id}'  LIMIT 1";									$this->logger->log('update fb where email  '.$sql);					$uData = $this->apps->query($sql);										if($uData)					{						$result['status']=1;						$result['messages']='update berhasil';						$result['email']=$email;						$result['iduser']=$userid['id'];						return $result;											}					else 					{						$result['status']=40;						$result['messages']='can not update user';						$result['email']=$email;						return $result;					}												}				else				{									$sql = " INSERT INTO tbl_sosmed 							(twitterid,username,nickname,name,last_name,email,city,sex,last_login,login_count,first_login,n_status) 							VALUES ('{$twitter_id}','{$username}','{$username}','{$name}','{$lastName}','{$email}','{$location}','{$gender}',NOW(),'1',NOW(),'1')";										$query = $this->apps->query($sql);					$userid['id']=$this->apps->getLastInsertId();										//$this->apps->session->setSession($CONFIG['SESSION_NAME'],'WEB',$userid);										if($query)					{						$result['status']=1;						$result['messages']='add user berhasil';						$result['email']=$email;						$result['iduser']=$userid['id'];						return $result;					}					else 					{							$result['status']=41;						$result['messages']='insert user problem please try againt';						return $result;					}				}								  							}else {				$result['status']=3;				$result['messages']='NOT MATCH  FB USER ID';				$this->logger->log('NOT MATCH PHONE N FB USER ID');				return $result;			}								}else{			$result['status']=2;			$result['messages']='Not Session Facebook';			$this->logger->log('LOST FB USER ID');		return $result;		}			}		
	function getimagesShare($fbId){
		$sql = "select * from user_flavors where userid='{$fbId}' LIMIT 1";
	
		$qData = $this->apps->fetch($sql);
		
		$this->logger->log('check data image '.$sql);
		if($qData)
		{
			return $qData;
		}
		return false;
	
	
	}
	function likeUpdates(){
		global $CONFIG;
		$url_flavor = str_replace($CONFIG['BASE_DOMAIN'].'gallery/detail/','',$this->apps->_p('href'));
		$user_flavour = explode('/',$url_flavor);
		$user_flavour_id=$user_flavour['1'];
		$status = $this->apps->_p('status');
		
		$userId = $this->uid;
		$sql ="SELECT id FROM user_likes where   userid ='{$userId}' and usr_flavor_id ='{$user_flavour_id}'LIMIT 1 ";
		$qData = $this->apps->fetch($sql);
		$date = 'NOW()';
		if($status =='add')
		{
			$sql ="SELECT * FROM user_likes where   userid ='{$userId}' and usr_flavor_id ='{$user_flavour_id}'LIMIT 1 ";
			$qData = $this->apps->fetch($sql);
			if($qData)
			{
				$sql = " UPDATE user_likes  SET n_status=1,voted_date=NOW()  where   userid ='{$userId}' and usr_flavor_id ='{$user_flavour_id}'";
			
					$query = $this->apps->query($sql);
			}
			else
			{
				$sql = " INSERT INTO user_likes 
								(usr_flavor_id,userid,voted_date,n_status) 
								VALUES ('{$user_flavour_id}','{$userId}',NOW(),'1')";
			
				$query = $this->apps->query($sql);
			}
		
			
			
			
		}
		elseif($status =='delete')
		{
			$sql = " UPDATE user_likes  SET n_status=0 where   userid ='{$userId}' and usr_flavor_id ='{$user_flavour_id}'";
			
			$query = $this->apps->query($sql);
		}
		$this->logger->log('update like count'.$sql);
		$result['status'] = 1;
		$result['msg'] = 'sucsess';
		return $result;
	
	
	}
}

?>

