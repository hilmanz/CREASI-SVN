<?php

class share extends App{
	
		
	function beforeFilter(){
	  
	global $LOCALE,$CONFIG;
	// error_reporting(E_ALL);
		$this->contentHelper = $this->useHelper("contentHelper");
		//$this->twitterHelper  = $this->useHelper('twitterHelper');
		$this->FacebookHelper  = $this->useHelper('FacebookHelper');
		$this->appsHelper  = $this->useHelper('appsHelper');
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		

		
	}
	
	/*function main(){
	
	error_reporting(E_ALL);
		global $LOCALE,$CONFIG; 
		$flavorid=123;
			$module = 'share/main';
			$param=$this->_g('parameter');
			
			if($this->_g('loginType')=='twitter')
				{
						$statusLoginTwitter=0; 
						if(@isset($this->session->getSession('twitter_session','twitter')->token))
							{
								
								
								$twit= $this->twitterHelper->update_tweet();
								//sendRedirect($CONFIG['BASE_DOMAIN'].'/mixing');die;
								
								session_destroy();
								
							}
						else
							{
								if(isset($_REQUEST['oauth_token']))
								{
									
									pr($this->twitterHelper->authorize());exit;
									
								}
								else
								{
									
								
									$urlConnect=$this->twitterHelper->request_login_link($flavorid,$module);
									
									sendRedirect("{$urlConnect['urlConnect']}");die;
								}
							}
				}
			
			$urlConnectTwt=$this->twitterHelper->request_login_link($flavorid,$module);
		
			$this->assign('loginTwitter',$urlConnectTwt['urlConnect']);
			$this->assign('success',"Data Has Been Successfully Insert");
				return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/contact_us.html');
						
		
		
	}*/
	function getUser()
	{
		$this->twitterHelper->getvideo($flavorid,$module);
	}
	/*function twitterShare()
	{
		global $LOCALE,$CONFIG; 
		//untuk share twitter
		
		
			$param=$this->_g('parameter');
			
			$module = 'share/twitterShare?parameter='.$param;
			if($this->_g('loginType')=='twitter')
				{
						
						$statusLoginTwitter=0; 
						if(@isset($this->session->getSession('twitter_session','twitter')->token))
							{
								
								$result = $this->appsHelper->syncTwitter();
								$idsosmed =$result['iduser'];
								if($result['status']==1 )
								{
									// $data['iduser']=$result['iduser'];
									// $data['score']=base64_decode($param);
									$twit= $this->twitterHelper->update_tweet($idsosmed);
									// pr('1');die;
								}
								$idtype =$this->_g('idType'); 
								$module=$this->_g('mdl'); 
								$action=$this->_g('func'); 
								if($this->_g('type')=='portofolio')
								{
									$rproto=$this->contentHelper->getesprotofolio();
									
									if($action)
									{
										if($rproto['type']=='1')
										{
											$action ='/'.$action.'?images='.$idtype.'&id='.$rproto['user_id'];
										}
										elseif($rproto['type']=='2')
										{
											$action ='/'.$action.'?video='.$idtype.'&id='.$rproto['user_id'];
										}
										elseif($rproto['type']=='3')
										{
											$action ='/'.$action.'?audio='.$idtype.'&id='.$rproto['user_id'];
										}
									}
									
									
									sendRedirect("{$CONFIG['BASE_DOMAIN_PATH']}{$module}{$action}");
								}
								else
								{
									if($action)
									{
										$action ='/'.$action.'?id='.$idtype;
									}
									
									
									sendRedirect("{$CONFIG['BASE_DOMAIN_PATH']}{$module}{$action}");
								}
								return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
									die();
								// echo"<script> window.close(); </script>";
							}
						else
							{
								
								if(isset($_REQUEST['oauth_token']))
								{
									
									pr($this->twitterHelper->authorize());
									
								}
								else
								{
									
								
									$urlConnect=$this->twitterHelper->request_login_link($flavorid,$module);
									
									sendRedirect("{$urlConnect['urlConnect']}");
								}
							}
				}
			else
			{
				
				$urlConnect=$this->twitterHelper->request_login_link();
						// pr($urlConnect);die;	
									sendRedirect("{$urlConnect['urlConnect']}"); 
				return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
						die();
			}
	}*/
	function fbShare()
	{
		global $LOCALE,$CONFIG; 
		// echo"sss";die;
		//untuk simpan user
		// $this->FacebookHelper->init();
		// pr($this->session->getSession('facebook_session','facebook'));die;
		
		if($this->FacebookHelper->checkUserLogin())
		{
			// pr('sss');die;
			$checkUser ='';
				$sessionFacebook = $this->session->getSession('facebook_session','facebook');
			//	pr($sessionFacebook);die;
			 $result = $this->appsHelper->syncFacebook();
			$param=$this->_g('parameter');
		
			if($result['status']==1 )
			{
				//$idsosmed =$result['iduser'];
				$idtype =$this->_g('id'); 
				$type =$this->_g('type'); 
				$module=$this->_g('module'); 
				$action=$this->_g('action'); 
				
				if($this->_g('type')=='portofolio')
								{
									$rproto=$this->contentHelper->getesprotofolio();
									
									if($action)
									{
										if($rproto['type']=='1')
										{
											$action ='/'.$action.'?images='.$idtype.'&id='.$rproto['user_id'];
										}
										elseif($rproto['type']=='2')
										{
											$action ='/'.$action.'?video='.$idtype.'&id='.$rproto['user_id'];
										}
										elseif($rproto['type']=='3')
										{
											$action ='/'.$action.'?audio='.$idtype.'&id='.$rproto['user_id'];
										}
									}
									
									$this->FacebookHelper->share();
									sendRedirect("{$CONFIG['BASE_DOMAIN_PATH']}{$module}{$action}");
								}
				else
				{
				
				
				
						if($action)
								{
									$action ='/'.$action.'?id='.$idtype;
								}
							$this->FacebookHelper->share();
							//echo $CONFIG['BASE_DOMAIN_PATH'].$module.$action;die;
									sendRedirect("{$CONFIG['BASE_DOMAIN_PATH']}{$module}{$action}");
				}
								return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
									die();
			}
				//return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/sharefb.html');
			// session_destroy();
			return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
									die();
		}
		else
		{
			
			$urlConect=$this->FacebookHelper->init();
			sendRedirect("{$urlConect['urlConnect']}");
				return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
									die();
		}
		
	}	
	function emailShare()
	{
	
		
			if($this->_p('type')=='profile')
			{
				$result=$this->contentHelper->profileshare();

			}
			elseif($this->_p('type')=='jobs')
			{
				$result=$this->contentHelper->jobsshare();

			}
			elseif($this->_p('type')=='join')
			{
				$result=$this->contentHelper->joinshare();

			}
			elseif($this->_p('type')=='portofolio')
			{
				$result=$this->contentHelper->portofolioshare();

			}	
		print json_encode($result);die;
	
	}
}
?>