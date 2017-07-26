<?php
class banner extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->bannerHelper = $this->useHelper("bannerHelper");
		$this->uploadHelper = $this->useHelper("uploadHelper");
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpublic', $CONFIG['BASE_DOMAIN']);
		$this->assign('assets', $CONFIG['PUBLIC_ASSET']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));	
		
	}

	 
	function main(){
		
	
		$listlocation = $this->bannerHelper->listbanner();
		
		$this->assign('list',$listlocation['result']);
		$this->assign('total',$listlocation['total']);
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/listbanner.html');
	
		
	}
	
	
	
	function ajaxPaging(){
		
		$start = $this->_p('start');
	//	pr($_POST);exit;
		if ($this->_p('ajax')){
			$ajax =	$listlocation = $this->bannerHelper->listcareer($start);
		}
		//pr($ajax);
		if ($ajax){ 
			print json_encode(array('status'=>true, 'data'=>$ajax));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
	}	

	
	function addbanner(){
			global $LOCALE,$CONFIG; 
		
		if(isset($_POST['submit'])==1)
		{			
			
			$title = strip_tags($this->_p('title')); 
			$pesan_erorr='';
			$title_no='';
			$caption_no='';
			$url_no='';
			if (ctype_alpha(str_replace(' ', '', $title))==false||$title=='TITLE'||$title=='')
			{
				$title_no='Title is not correct';
				$pesan_erorr='ada';
			}				
			$caption = strip_tags($this->_p('caption'));  
			if (ctype_alpha(str_replace(' ', '', $caption))==false||$caption=='CAPTION'||$caption=='')
			{
				
				$caption_no='Caption is not correct';
				$pesan_erorr='ada';
				/*$this->assign('caption_no',"Caption is not correct");
				return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/new_banner.html');*/
			}		
			
				
			$url = strip_tags($this->_p('urlbanner')); 
			if ($url=='URL'||$url=='')
			{
				$url_no='Url is not correct';
				$pesan_erorr='ada';
				
				/*$this->assign('url_no',"Url is not correct");
				return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/new_banner.html');*/
			}
			/*if(preg_match(\"(?i)\b((?:https?://|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))"\, $url)!=1)
			{
				$url_no='Url is not correct';
				$pesan_erorr='ada';
			}*/
			if($pesan_erorr)
			{
				
				
				$this->assign('title_no',$title_no);
				$this->assign('title',$title);
				$this->assign('caption',$caption);
				$this->assign('caption_no',$caption_no);
				$this->assign('url',$url);
				$this->assign('url_no',$url_no);
				return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/new_banner.html');
			}
			
			
			
			$path = $CONFIG['LOCAL_ASSET'].'gallery/banner/';
			$images['photo'] = $_FILES['photo']; 	 
			$uploadnews = $this->uploadHelper->uploadThisImage($images['photo'],$path,1000,false,false);
			
			$filephoto=$uploadnews['arrImage']['filename'];
			$listeducation = $this->bannerHelper->addbanner($filephoto);
			if($listeducation){
					
					sendRedirect($CONFIG['ADMIN_DOMAIN']."banner");
					die;
				}
		}
		$folder = $this->bannerHelper->getFolder();
		
		$this->assign('folder',$folder);
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/new_banner.html');
	
	
	}
	
	function editbanner()
	{
		global $CONFIG;
		
		
		$id = intval($this->_request('id'));
		if($this->_p('submit')==1){// echo "ss";exit;
			
			$filephoto='';
			
			if($_FILES['photonew']['name']!='')
			{
				$path = $CONFIG['LOCAL_ASSET'].'gallery/banner/';
				$images['photo'] = $_FILES['photonew']; 	 
				$uploadnews = $this->uploadHelper->uploadThisImage($images['photo'],$path,1000,false,false);
				
				$filephoto=$uploadnews['arrImage']['filename'];
			}
			$editlocation = $this->bannerHelper->editbanner($id,$filephoto);
			
			if($editlocation){
				//echo "ss";exit;
				//sendRedirect($CONFIG['ADMIN_DOMAIN']."bannercms/editphoto");
			}
		
		}
		$selectupdatedata = $this->bannerHelper->selectupdatedata($id);
		//pr($selectupdatedata);exit;
		$this->assign('load',$selectupdatedata); 
		
		//pr($folder);exit;
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/edit_banner.html');
	}
		function deletebenner()
		{
		global $CONFIG;
		
		
		$id = intval($this->_request('id'));
		
			$editeducation = $this->bannerHelper->deletebanner($id);
			
			
				sendRedirect($CONFIG['ADMIN_DOMAIN']."banner");
			
		}
	
	}
?>