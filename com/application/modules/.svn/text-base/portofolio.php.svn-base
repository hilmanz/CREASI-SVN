<?php
class portofolio extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->personalHelper = $this->useHelper("personalHelper");
		$this->viewcountHelper = $this->useHelper("viewcountHelper");
		$this->categoryHelper = $this->useHelper("categoryHelper");
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->user=$this->session->getSession($this->config['SESSION_NAME'],"WEB");
		// pr($this->user);
		$this->assign('users', $this->user);
	
		
	}

	
	function main(){
		

		global $LOCALE,$CONFIG;
		
		//pr($this->user->id);exit;
		
		if(isset($_SESSION['tokenize'])){
			
		}else{
			$tokenize = sha1(serialize(array('token',date("YmdHis"))));
			$_SESSION['tokenize'] = $tokenize;
		}
		
		if(!isset($tokenize)) $tokenize =$_SESSION['tokenize'];
	
		$this->assign('tokenize', $tokenize);
			// pr($_SESSION['tokenize']);
			$this->assign('fbproto',$LOCALE[1]['share']['FB']['portfolio']);
			$this->assign('twitproto',$LOCALE[1]['share']['twitter']['portfolio']);
		if($this->_request('images'))
		{
			$id = $this->_request('images');
			$uid = $this->_request('id');
			$id_user = @$this->user->id;
			
			$this->viewcountHelper->portofolioviewcount($id);
			$portoimages = $this->personalHelper->getportoimages($id,$uid);
			$portoimagesAll = $this->personalHelper->getAllportoimages($uid);
			$selectlikes_img = $this->personalHelper->selectlikes_img($id,$uid,$id_user);
			// pr($portoimagesAll );die;
			
			$selectcomment = $this->personalHelper->selectcomment($portoimages['id']);
			// pr($selectcomment);die;
			 // pr($portoimages);die;
			$this->assign('listcomment', $selectcomment);
			$this->assign('selectlikes_img', $selectlikes_img);
			$this->assign('list', $portoimages);
			$this->assign('first', $portoimagesAll['first']);
			$this->assign('jumlahproto', count($portoimagesAll));
			$this->assign('next', $portoimagesAll['next']);
			$this->assign('prev', $portoimagesAll['prev']);
			$this->assign('idpro', $id);
			$this->assign('id_user', $id_user);
			$this->assign('user', $uid);
					$this->assign('userscomment', @$this->user->id);
			$this->assign('jumlahcomment', count($selectcomment));
			$this->assign('last', $portoimagesAll['Last']);
			$this->assign('slide', $portoimagesAll);
			$this->assign('start', $portoimagesAll['slide']);
			return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/protofolio_detail.html');
		}
		else if($this->_request('video'))
		{
			$id = $this->_request('video');
			$uid = $this->_request('id');
			$id_user = @$this->user->id;
			$this->viewcountHelper->portofolioviewcount($id);
			$portoimages = $this->personalHelper->getportovideo($id,$uid);
			$portoimagesAll = $this->personalHelper->getAllportovideo($uid);
			$selectlikes_img = $this->personalHelper->selectlikes_img($id,$uid,$id_user);
			// pr($portoimagesAll );
			
			$selectcomment = $this->personalHelper->selectcomment($portoimages['id']);
		
			// pr($portoimages);die;
			$this->assign('listcomment', $selectcomment);
			$this->assign('list', $portoimages);
				$this->assign('selectlikes_img', $selectlikes_img);
				$this->assign('jumlahproto', count($portoimagesAll));
			$this->assign('first', $portoimagesAll['first']);
			$this->assign('next', $portoimagesAll['next']);
			$this->assign('prev', $portoimagesAll['prev']);
			$this->assign('idpro', $id);
			$this->assign('id_user', $id_user);
			$this->assign('user', $uid);
				$this->assign('userscomment', @$this->user->id);
			$this->assign('jumlahcomment', count($selectcomment));
			$this->assign('last', $portoimagesAll['Last']);
			$this->assign('slide', $portoimagesAll);
			$this->assign('start', $portoimagesAll['slide']);
			// echo"ssss";
			return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/protofolio_detailvideo.html');
		}
		else if($this->_request('audio'))
		{
			$id = $this->_request('audio');
			$uid = $this->_request('id');
				$id_user = @$this->user->id;
			$this->viewcountHelper->portofolioviewcount($id);
			
			$portoimages = $this->personalHelper->getportoaudio($id,$uid);
			$portoimagesAll = $this->personalHelper->getAllportoaudio($uid);
			$selectlikes_img = $this->personalHelper->selectlikes_img($id,$uid,$id_user);
			// pr($portoimages );
			
			$selectcomment = $this->personalHelper->selectcomment($portoimages['id']);
		
			// pr($portoimages);die;
			$this->assign('listcomment', $selectcomment);
			$this->assign('jumlahcomment', count($selectcomment));
			$this->assign('list', $portoimages);
				$this->assign('selectlikes_img', $selectlikes_img);
				$this->assign('jumlahproto', count($portoimagesAll));
			$this->assign('first', $portoimagesAll['first']);
			$this->assign('next', $portoimagesAll['next']);
			$this->assign('prev', $portoimagesAll['prev']);
			$this->assign('idpro', $id);
			$this->assign('id_user', $id_user);
			$this->assign('user', $uid);
					$this->assign('userscomment', @$this->user->id);
			$this->assign('last', $portoimagesAll['Last']);
			$this->assign('slide', $portoimagesAll);
			$this->assign('start', $portoimagesAll['slide']);
			return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/protofolio_detailaudio.html');
		}
		
		
			
		
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/portofolio.html');
	
		
	}
	 function ajaxlike()
	{
		global $LOCALE,$CONFIG;
	
	//	pr($_POST);exit;
	
		$id_friend=$this->_p('id_friend');
		$id_images = $this->_p('id_images');
		$user_id = $this->_p('user_id');
		$ajaxlike = $this->personalHelper->ajaxlikeportofolio($id_images,$id_friend,$user_id);
		//pr($selectupdatedata);exit;
		if($ajaxlike)
		{
		print json_encode(array('status'=>true,'countnya'=>$ajaxlike[0]['love_count']));
		}else{ 
			print json_encode(array('status'=>false));
		}
		exit;
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/personal_edit.html');
	}
	
	function comment()
	{
		global $LOCALE,$CONFIG;
		// pr($_POST);die;
		
		if(isset($_SESSION['tokenize'])){
		
			if($_SESSION['tokenize']!=$this->_p('tokenize')){
			
				print json_encode(array('status'=>0,'msg'=>"token tidak cocok {$_SESSION['tokenize']} {$this->Request->getParam('tokenize')}"));exit;
			}else{
				$tokenize = sha1(serialize(array('token',date("YmdHis"))));
				$_SESSION['tokenize'] = $tokenize; 
			}
		} 
		else 
		{	
			print json_encode(array('status'=>0,'msg'=>'token tidak ditemukan'));
			exit;
		}
		
		
		
		if(isset($_POST['submit']))
		{
			
			
			
			
			$addcomment = $this->personalHelper->addcomment();
				if($addcomment==true)
						{
						$id_portofolio=$this->_p('id_portofolio');
						$selectcomment = $this->personalHelper->selectcomment($id_portofolio);
						
						print json_encode(array('status'=>true,'data'=>$selectcomment));
						}else{ 
						print json_encode(array('status'=>false));
						}
						exit;
		}
		
		
	}
	function deleteComment()
	{
		$addcomment = $this->personalHelper->delcomment();
		print json_encode($addcomment);die;
	}
	function deleteportfolio()
	{
		global $LOCALE,$CONFIG;
		$addcomment = $this->personalHelper->delportfolio();
		//print json_encode($addcomment);die;
		sendRedirect($CONFIG['BASE_DOMAIN']."personal#my-portfolio");
								return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
								die();
	}
	function editPortofolio()
	{
			global $LOCALE,$CONFIG;
			
				if($this->_p('submit'))
				{
					$resultedit=$this->personalHelper->editsportofolio($this->user->id);
					
					if($resultedit)
					{
						if($this->_request('images'))
						{
							$id = $this->_request('images');
							sendRedirect("{$CONFIG['BASE_DOMAIN']}portofolio?images=".$id.'&id='.$this->user->id);
						}
						elseif($this->_request('video'))
						{
							$id = $this->_request('video');
							sendRedirect("{$CONFIG['BASE_DOMAIN']}portofolio?video=".$id.'&id='.$this->user->id);
						}
						elseif($this->_request('audio'))
						{
							$id = $this->_request('audio');
							sendRedirect("{$CONFIG['BASE_DOMAIN']}portofolio?audio=".$id.'&id='.$this->user->id);
						}
					}
					else
					{
						echo"ssss";die;
						sendRedirect("{$CONFIG['BASE_DOMAIN']}talentboard");
					}
				}
			$category = $this->categoryHelper->listcategoryproto();
			
			$this->assign('listcategory', $category);
			
			
			
			if($this->_request('images'))
			{
				$id = $this->_request('images');
				$uid = $this->user->id;
				$this->viewcountHelper->portofolioviewcount($id);
				$portoimages = $this->personalHelper->getportoimages($id,$uid);
				if($portoimages=='' )
				{
					sendRedirect("{$CONFIG['BASE_DOMAIN']}talentboard");
					return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
						die();
				}
				$portoimagesAll = $this->personalHelper->getAllportoimages($uid);

			
				
				$this->assign('next', $portoimagesAll['next']);
				$this->assign('prev', $portoimagesAll['prev']);
				$this->assign('last', $portoimagesAll['Last']);
				$this->assign('list', $portoimages);
				
				return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/protofolio_edit.html');
			}
			else if($this->_request('video'))
			{
				$id = $this->_request('video');
				$uid = $this->user->id;
				$this->viewcountHelper->portofolioviewcount($id);
				$portoimages = $this->personalHelper->getportovideo($id,$uid);
				if($portoimages=='' )
				{
					sendRedirect("{$CONFIG['BASE_DOMAIN']}talentboard");
					return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
						die();
				}
				$portoimagesAll = $this->personalHelper->getAllportovideo($uid);

			
				
				$this->assign('next', $portoimagesAll['next']);
				$this->assign('prev', $portoimagesAll['prev']);
				$this->assign('last', $portoimagesAll['Last']);
			
				$this->assign('list', $portoimages);
				return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/protofolio_editvideo.html');
			}
			else if($this->_request('audio'))
			{
					$id = $this->_request('audio');
				$uid = $this->user->id;
				$this->viewcountHelper->portofolioviewcount($id);
				$portoimages = $this->personalHelper->getportoaudio($id,$uid);
				if($portoimages=='' )
				{
					sendRedirect("{$CONFIG['BASE_DOMAIN']}talentboard");
					return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
						die();
				}
				$portoimagesAll = $this->personalHelper->getAllportoaudio($uid);

			
				
				$this->assign('next', $portoimagesAll['next']);
				$this->assign('prev', $portoimagesAll['prev']);
				$this->assign('last', $portoimagesAll['Last']);
				$this->assign('list', $portoimages);
				return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/protofolio_editaudio.html');
			}
			else
			{
				sendRedirect("{$CONFIG['BASE_DOMAIN']}talentboard");
					return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
						die();
			
			}
			
			
			
			
			return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/protofolio_edit.html');
	}
	}
?>