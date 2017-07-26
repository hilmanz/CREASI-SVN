<?php
/**
 * @author duf
 *
 */
global $ENGINE_PATH;
include_once $ENGINE_PATH."Utility/Twitter/tmhOAuth.php";
include_once $ENGINE_PATH."Utility/Twitter/tmhUtilities.php";

class twitterHelper {

	var $tmhOAuth;
	var $oauth;
		
	function __construct($apps=null){
		$this->apps = $apps;
		
	}
	
	function init(){
		global $TWITTER;
		
			// $this->tmhOAuth = new tmhOAuth(array(
							  // 'consumer_key'    => 'QmCQEDflYuTaBWM0I5DJC3OXv',
							  // 'consumer_secret' => 'us934P3D8Kyi24UKp4GnK1I1DEfRxj55eKNTyaOexQfJ5bhFFU'
							// ));
							
				$this->tmhOAuth = new tmhOAuth(array(
							  'consumer_key'    => 'FeEWLJrqNQer9XfnXzZcWrvEi',
							  'consumer_secret' => 'ILNIcNtVdEEK2Smq8Q0j0ujVmFyxBL7FUOoQffdhG653Ys0bg3'
							));
	
	}
	
	function authorize(){
		global $CONFIG,$thisMobile;
		//from get
		$type =$this->apps->_g('type');// type yang di share contoh  jobs,news,press,portofolio
		$idtype =$this->apps->_g('idType'); //for id contoh id portfolio,id news ,id press
		$module=$this->apps->_g('mdl'); //posisi saat share
		$action=$this->apps->_g('func'); 
		
		$this->init();
				
				$request_code = unserialize(urldecode64(@$this->apps->session->getSession('twitter_session','twitter')->c));
				
				$this->tmhOAuth->config['user_token']  = strip_tags($_REQUEST['oauth_token']);
				$this->tmhOAuth->config['user_secret'] = $request_code['oauth_token_secret'];
			
				$code = $this->tmhOAuth->request('POST', $this->tmhOAuth->url('oauth/access_token', ''), 
												array(
												'oauth_verifier' => strip_tags($_REQUEST['oauth_verifier'])
												)
				);
		
				if ($code == 200) {
					$access_token = $this->tmhOAuth->extract_params($this->tmhOAuth->response['response']);
					
					$this->tmhOAuth->config['user_token']  = $access_token['oauth_token'];
					$this->tmhOAuth->config['user_secret'] = $access_token['oauth_token_secret'];
					$paramsGetUser = array('screen_name' => $access_token['screen_name'],'include_entities'=>true);
		
					$requestGetUser = $this->tmhOAuth->request('GET', $this->tmhOAuth->url("1.1/users/show"), $paramsGetUser);
					
					$GetUsers = json_decode($this->tmhOAuth->response['response'],true);
					
					$data['twitter_id'] = $access_token['user_id'];
					$data['oauth_verifier'] = $_REQUEST['oauth_verifier'];
					$data['token']= $access_token['oauth_token'];
					$data['secret'] = $access_token['oauth_token_secret'];
					$data['user'] = $access_token['screen_name'];
						$userprofile['name'] =  $GetUsers['name'];
						$userprofile['gender'] =  ""; //ga ketemu
						$userprofile['email'] =  ""; //ga ketemu
					$userprofile['socimg']= $GetUsers['profile_background_image_url'];
				
					$data['userProfile'] = $userprofile;
					$data['login'] = true;
					
					$this->apps->session->setSession('twitter_session','twitter',$data);
					$permission['loginPermission'] = false;
					$this->apps->session->setSession('twitter_session','twitter_permission',$permission);
					
					if(!$this->apps->session->get('user')){
							sendRedirect($CONFIG['BASE_DOMAIN_PATH']."share/twitterShare&loginType=twitter&mdl={$module}&func={$action}&type={$type}&idType={$idtype}");
							//exit;
						
					}else{
							sendRedirect($CONFIG['BASE_DOMAIN_PATH']."share/twitterShare&loginType=twitter&mdl={$module}&func={$action}&type={$type}&idType={$idtype}");
							//exit;
						
					}
				}			
			
			
							exit;
		
		return false;
	}
	function authorize2(){
		global $CONFIG,$thisMobile;
		
		
		
			
				$this->init();
				
				$request_code = unserialize(urldecode64(@$this->apps->session->getSession('twitter_session','twitter')->c));
				
				$this->tmhOAuth->config['user_token']  = strip_tags($_REQUEST['oauth_token']);
				$this->tmhOAuth->config['user_secret'] = $request_code['oauth_token_secret'];
			
				$code = $this->tmhOAuth->request('POST', $this->tmhOAuth->url('oauth/access_token', ''), 
												array(
												'oauth_verifier' => strip_tags($_REQUEST['oauth_verifier'])
												)
				);
			//pr($code);
				if ($code == 200) {
					$access_token = $this->tmhOAuth->extract_params($this->tmhOAuth->response['response']);
					$data['twitter_id'] = $access_token['screen_name'];
					$data['token']= $access_token['oauth_token'];
					$data['secret'] = $access_token['oauth_token_secret'];
					$data['user'] = $access_token['screen_name'];
						$userprofile['name'] =  $access_token['screen_name'];
						$userprofile['gender'] =  $access_token['screen_name']; //ga ketemu
						$userprofile['email'] =  $access_token['screen_name']; //ga ketemu
					$userprofile['socimg']= "https://api.twitter.com/1/users/profile_image/{$access_token['screen_name']}";
					$data['userProfile'] = $userprofile;
					$data['login'] = true;
					$this->apps->session->setSession('twitter_session','twitter',$data);
					$permission['loginPermission'] = false;
					$this->apps->session->setSession('twitter_session','twitter_permission',$permission);
					if(!$this->apps->session->get('user')){
						if(isset($thisMobile))	header("location:{$CONFIG['MOBILE_SITE']}testApi/twitters??page=login");
						else header("location:{$CONFIG['BASE_DOMAIN']}?page=login");
						//exit;
					}else{
						if(isset($thisMobile))	header("location:{$CONFIG['MOBILE_SITE']}testApi/twitters??page=login");
						else header("location:{$CONFIG['BASE_DOMAIN']}testApi/twitters?page=login");
						//exit;
					}
				}			
			
			
			
		
		
		
		
		return false;
	}
	function request_login_link(){
		global $TWITTER,$thisMobile,$logger,$CONFIG;
		$this->init();
		
		//from get
		$type =$this->apps->_g('type');// type yang di share contoh  jobs,news,press,portofolio
		$idtype =$this->apps->_g('id'); //for id contoh id portfolio,id news ,id press
		$module=$this->apps->_g('module'); //posisi saat share
		$action=$this->apps->_g('action'); 
	
		
	
		
		
		
		
		$modl=explode('/',$module);
		
		 $callbackurl = "{$CONFIG['BASE_DOMAIN_PATH']}share/twitterShare&loginType=twitter&mdl={$module}&func={$action}&type={$type}&idType={$idtype}";
   		$callback = isset($_REQUEST['oob']) ? 'oob' : $callbackurl;
		
   		$params = array(
    		'oauth_callback'=> $callback,
   			// 'x_auth_access_type'=>'write'
  		);
		
		$code = $this->tmhOAuth->request('POST', $this->tmhOAuth->url('oauth/request_token',''), $params);
		
		$logger->info("code : {$code}");
		
	  	if ($code == 200) {
		  //berhasil dapet access token
	    	$oauth = $this->tmhOAuth->extract_params($this->tmhOAuth->response['response']);
			$data['c'] = urlencode64(serialize($oauth));
	    	
		   	$method = 'authorize';
	    	$force  = '';
	    	$authurl = $this->tmhOAuth->url("oauth/{$method}", '') .  "?oauth_token={$oauth['oauth_token']}{$force}";
	    	$data['urlConnect'] = $authurl;
			$data['login'] = false;
			$this->apps->session->setSession('twitter_session','twitter',$data);
			$logger->info(json_encode($data));
			return $data;
		
	  	} else {
	    	return false;
	  	}
	}

	function remove_tweet(){
	
		if($twitter['token']!=null && $twitter['secret']!=null){
			$this->tmhOAuth->config['user_token']  = $twitter['token'];
			$this->tmhOAuth->config['user_secret'] = $twitter['secret'];
			$id = $this->apps->Request->getParam("id");
			if(strlen($id)>8){
				$code = @$this->tmhOAuth->request('POST', $this->tmhOAuth->url("1/statuses/destroy/{$id}"));
				if($code==200){
					//flag deleted
					//$this->flag_deleted_tweet($this->user_id,$twitter['twitter_id'],$id);
					return false; //the tweet has been deleted successfully'
				}else{
					return false ;//tweet not found
				}
			}else{
				return  false; //Cannot remove tweet. u need to specify the tweet id
			}
		}
		return  false; //unauthorized access
	}
	
	function update_tweet($idsosmed=''){ 

		global $CONFIG,$LOCALE;

		$this->init();

		$getSession = $this->apps->session->getSession('twitter_session','twitter');

		
		
		$this->tmhOAuth->config['user_token']  = $getSession->token;;

		$this->tmhOAuth->config['user_secret'] = $getSession->secret;

		$this->tmhOAuth->config['oauth_verifier'] = $getSession->oauth_verifier;
		
			$desc= "test";
			$type =$this->apps->_g('type');// type yang di share contoh  jobs,news,press,portofolio
			$idtype =$this->apps->_g('idType'); //for id contoh id portfolio,id news ,id press
			$module=$this->apps->_g('mdl'); //posisi saat share
			$action=$this->apps->_g('func'); 
			$realimagespath ='';
			$desc="";
			$idUser='';
			if($idsosmed=='')
				{
					$idsosmed = $getSession->twitter_id;
				}
			if($type=='jobs')
			{
				$sql="SELECT * FROM jobboard jb  LEFT JOIN  tbl_talent_seeker ts ON jb.talent_seeker_id=ts.id where jb.id_job='{$idtype}' ";
				// pr($sql);die;
				$qData = $this->apps->fetch($sql);
				
				if($qData)
				{
					if($qData['share_count']==0 || $qData['share_count']=='')
							{
									$sqlupdate ="UPDATE  jobboard set share_count='1' where id_job='{$idtype}'";
									// pr($sqlupdate);
									$rqupdate = $this->apps->query($sqlupdate);
							}
							else
							{
									$sqlupdate ="UPDATE  jobboard set share_count=share_count+1 where id_job='{$idtype}'";
									// pr($sqlupdate);
									$rqupdate = $this->apps->query($sqlupdate);
							}
					// pr('ssss');
					// die;
					
					
					
					// if(@$qData['file'])
					// {
						// $realimagespath = "{$CONFIG['BASE_DOMAIN_PATH']}public_assets/postjob/".$qData['file'];
					// }
					$realimagespath = "";
						//$desc="Job vacancy as a {$qData['job_title']}. Apply with your complete profile at www.creasi.co.id";
					//$desc="HAI {$qData['nama_perusahaan']} Sedang Membutuhkan  lowongan di bagian ".;
					$desc=str_replace('{$jobtitle}',$qData['job_title'],$LOCALE[1]['share']['twitter']['jobs']);
				}
			}
			else if($type=='profile')
			{
				$sql="SELECT * FROM social_member where id='{$idtype}' ";
				$qData = $this->apps->fetch($sql);
				
				if($qData)
				{
					if(@$qData['img'])
					{
						$realimagespath = "{$CONFIG['BASE_DOMAIN_PATH']}public_assets/personal/".$qData['img'];
					}
					//$desc="Haii ini member creasi loh nama nya ".$qData['name']." untuk melihat protofolio nya silahkan kunjungi creasi";
					$desc=$LOCALE[1]['share']['Twitter']['profile'];
				}
			
			}
			else if($type=='portofolio')
			{
				$sql="SELECT * FROM my_portofolio where id='{$idtype}' ";
				$qData = $this->apps->fetch($sql);
				
				if($qData)
				{
					if(@$qData['img'])
					{
						$realimagespath = "{$CONFIG['BASE_DOMAIN_PATH']}public_assets/portofolio/".$qData['img'];
					}
					$desc=$LOCALE[1]['share']['twitter']['portfolio'];
				}
			
			}
			else if($type=='join')
			{
				$sql="SELECT * FROM social_member where id='{$idtype}' ";
				$qData = $this->apps->fetch($sql);
				
				if($qData)
				{
					if(@$qData['img'])
					{
						$realimagespath = "{$CONFIG['BASE_DOMAIN_PATH']}public_assets/personal/".$qData['img'];
					}
					$desc=$LOCALE[1]['share']['Twitter']['join'];
				}
			
			}
			else if($type=='news')
			{
				$sql="SELECT * FROM news where id='{$idtype}' ";
				$qData = $this->apps->fetch($sql);
				
				if($qData)
				{
					if(@$qData['images'])
					{
						$realimagespath = "{$CONFIG['BASE_DOMAIN_PATH']}public_assets/banner/".$qData['images'];
					}
					$desc=$LOCALE[1]['share']['Twitter']['news'];
				}
			
			}
			
			
			// pr($realimagespath);die;
			if($realimagespath)
			{
				$image=file_get_contents(''.$realimagespath.'');
				$params = array( 'status'=>$desc,'media[]'  => $image);
				$updateStatus = $this->tmhOAuth->request('POST',$this->tmhOAuth->url("1.1/statuses/update_with_media"), $params,true,true);
			
			}
			else
			{
				$params = array( 'status'=>$desc);
				$updateStatus = $this->tmhOAuth->request('POST', $this->tmhOAuth->url("1.1/statuses/update"), $params);
			
			}
			//$params = array( 'status'=>'','media[]'  => $image,'lat'=>'-6.258570','long'=>'106.855840','display_coordinates'=>true);
			
			// pr($params);
			$response =  $this->tmhOAuth->extract_params($this->tmhOAuth->response["response"]);
			// pr($response);
			// pr($this->tmhOAuth);die;
			if($updateStatus == 200){

				$result['status']=1;

				$result['messages']='sucsess';  
				 $sql = " INSERT INTO tbl_share 
										(idsosmed,userid,module,id_module,date,media,n_status) 
										VALUES ('{$idsosmed}','{$idUser}','{$type}','{$idtype}',NOW(),'2','1')";
						$query = $this->apps->query($sql);
					
						
				return $result;

				

			}else{

				$result['status']=3;

				$result['messages']='Updating twitter status is failed, please try again';

				return $result;

				

			}
		

	}
	function getUserLogin(){
		return @$this->apps->session->getSession('twitter_session','twitter')->login;
	}
	function getUserTimeline($since_id=0,$count=5){
		
		$this->init();
		$request_code = $this->apps->session->getSession('twitter_session','twitter');
		
		$this->tmhOAuth->config['user_token']  = $request_code->token;
		$this->tmhOAuth->config['user_secret'] = $request_code->secret;
		
		
		$params = array('screen_name' => $request_code->userProfile->name,'include_entities'=>true);
		
		$status = $this->tmhOAuth->request('GET', $this->tmhOAuth->url("1.1/users/show"), $params);
		
		if($status == 200){
			$rs = json_decode($this->tmhOAuth->response['response'],true);
			return $rs;
		}else{
			return array();
		}
	}
	function getHomeTimeline(){
		
		$this->init();
		$request_code = $this->apps->session->getSession('twitter_session','twitter');
		
		$this->tmhOAuth->config['user_token']  = $request_code->token;
		$this->tmhOAuth->config['user_secret'] = $request_code->secret;
		
		// $params = array('screen_name' => $request_code->twitter_id,"since_id"=>$since_id,"count"=>$count);
		
		$status = $this->tmhOAuth->request('GET', $this->tmhOAuth->url("1.1/statuses/home_timeline"));
		
		if($status == 200){
			$rs = json_decode($this->tmhOAuth->response['response'],true);
			// pr($rs);exit;
			return $rs;
		}else{
			return array();
		}
	}
}
?>