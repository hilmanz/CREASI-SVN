<?php
class contentmanagement extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
	
		$this->contentHelper = $this->useHelper("contentHelper");
		$this->uploadHelper = $this->useHelper("uploadHelper");
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));	

		
	}

	 
	function main(){
		
//pr($_POST);exit;
		$listnews = $this->contentHelper->listnews();
		//pr($listnews);exit;
		$searchtitle=@$this->_p('searchtitle');
		$startdate=@$this->_p('startdate');
		$enddate=@$this->_p('enddate');
		$this->assign('list',$listnews['result']);
		$this->assign('total',$listnews['total']);
		$this->assign('searchtitle', $searchtitle);
		$this->assign('startdate', $startdate);
		$this->assign('enddate', $enddate);
		if($this->_p('ajax'))
		{
			print json_encode($listnews);die;
		}
		if($this->_p('sorting'))
		{
			
			print json_encode($listnews);die;
		}
		
		else
		{
			return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/listnews.html');
		}

	
		
	}
	function addnews(){
		global $LOCALE,$CONFIG; 
		//pr($_POST);exit;
		if(isset($_POST['submit'])==1)
		{			
			$imagesResult['arrImage']='';
			if(@$_POST['category']==3)
			{
			
			
				if(@$_FILES['image_file']['tmp_name'])
				{
					$imagessize = getimagesize($_FILES['image_file']["tmp_name"]);
					$url = strip_tags($this->_p('url'));
						//pr(getimagesize($_FILES['photonew']["tmp_name"]));die;
						if($imagessize[0] !='1800' &&  $imagessize[1] !='500')
						{
							$photo_no='Rsolution Images must 1800 x 500';
							$pesan_erorr='ada';
						
						}
						/* if(	$url)
						{		
							$matches=preg_match("/^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/", $url);
							
							if(	$matches!=1)
							{
								$url_no='Url is not correct';
								$pesan_erorr='ada';
							}
						} */
					if(@$pesan_erorr)
					{
						/* 
						$this->assign('url_no',@$url_no); */
						$this->assign('error_foto',@$photo_no);
						$this->assign('warning','Mohon di Kroscek kembali ada kesalahan dalam mengunggah data');
						return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/new_news.html');
					}
					// $images = getimagesize($_FILES['image_file']['tmp_name']);
				
					// $imagesResult = $this->uploadHelper->saveCropImage2();
					$sTempFileName = $CONFIG['LOCAL_PUBLIC_ASSET'].'banner/';
					$images = getimagesize($_FILES['image_file']['tmp_name']);
				
					$imagesResult = $this->uploadHelper->uploadThisImage($_FILES['image_file'],$sTempFileName);
					$imagesResult['arrImage']=$imagesResult['arrImage']['filename'];
				}
				else
				{
					$imagesResult['arrImage']='';
				}
			}
			else
			{
				if(@$_FILES['imgnews']['tmp_name'])
				{
					$sTempFileName = $CONFIG['LOCAL_PUBLIC_ASSET'].'banner/';
					$images = getimagesize($_FILES['imgnews']['tmp_name']);
				
					$imagesResult = $this->uploadHelper->uploadThisImage($_FILES['imgnews'],$sTempFileName);
					$imagesResult['arrImage']=$imagesResult['arrImage']['filename'];
				}
				else
				{
					$imagesResult['arrImage']='';
				}
			}
			// if($imagesResult['result'])
			// {
		
				$listnews = $this->contentHelper->addnews($imagesResult['arrImage']);
				if($listnews==true){
					sendRedirect($CONFIG['ADMIN_DOMAIN']."contentmanagement");
					return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
					}
			// }
		}
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/new_news.html');
	
	
	}
	function editnews(){
		global $LOCALE,$CONFIG; 
		$list=$this->contentHelper->getnews();
		if($list=='')
		{
			echo '<script>window.history.back()</script>';
			exit;
		
		}
		$this->assign('list',$list);
		if(isset($_POST['submit'])==1)
		{	
			$imagesResult['arrImage']='';
			if(@$_POST['category']==3)
			{
					if(@$_FILES['image_file']["tmp_name"] != '')
					{
					$imagessize = getimagesize($_FILES['image_file']["tmp_name"]);
					$url = strip_tags($this->_p('url'));
						//pr(getimagesize($_FILES['photonew']["tmp_name"]));die;
						if($imagessize[0] !='1800' &&  $imagessize[1] !='500')
						{
							$photo_no='Rsolution Images must 1800 x 500';
							$pesan_erorr='ada';
						
						}
					}
						/* if(	$url)
						{		
							$matches=preg_match("/^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/", $url);
							
							if(	$matches!=1)
							{
								$url_no='Url is not correct';
								$pesan_erorr='ada';
							}
						} */
					if(@$pesan_erorr)
					{
						
						/* $this->assign('url_no',@$url_no); */
						$this->assign('error_foto',@$photo_no);
						$this->assign('warning','Mohon di Kroscek kembali ada kesalahan dalam mengunggah data');
						return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/edit_news.html');
					}
				if($_FILES['image_file']['tmp_name'])
				{
					// $images = getimagesize($_FILES['image_file']['tmp_name']);
				
					// $imagesResult = $this->uploadHelper->saveCropImage2();
					$sTempFileName = $CONFIG['LOCAL_PUBLIC_ASSET'].'banner/';
					$images = getimagesize($_FILES['image_file']['tmp_name']);
				
					$imagesResult = $this->uploadHelper->uploadThisImage($_FILES['image_file'],$sTempFileName);
					$imagesResult['arrImage']=$imagesResult['arrImage']['filename'];
					
				}
				else
				{
					$imagesResult['arrImage']='';
				}
			}
			//elseif(@$_POST['category']==2)
			else
			{
				
				if($_FILES['imgnews']['tmp_name'])
				{
					$sTempFileName = $CONFIG['LOCAL_PUBLIC_ASSET'].'banner/';
					$images = getimagesize($_FILES['imgnews']['tmp_name']);
				
					$imagesResult = $this->uploadHelper->uploadThisImage($_FILES['imgnews'],$sTempFileName);
					$imagesResult['arrImage']=$imagesResult['arrImage']['filename'];
					
				}
				else
				{
					$imagesResult['arrImage']='';
				}
			}
			// pr($_POST['category']);
			// pr($_FILES);
			// pr($imagesResult['arrImage']);die;
			$this->contentHelper->editcontent($imagesResult['arrImage']);
			
					sendRedirect($CONFIG['ADMIN_DOMAIN']."contentmanagement");
					return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
			
		}
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/edit_news.html');
	
	
	}
	function delete(){
		global $LOCALE,$CONFIG; 
			$this->contentHelper->deletecontent();
			sendRedirect($CONFIG['ADMIN_DOMAIN']."contentmanagement");
			return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
	}
	function ajaxnews(){
		global $LOCALE,$CONFIG; 
		//pr($_POST);exit;
		pr($_POST);
		pr($_FILES);exit;
	
	
	}
	function ajaxnews_paging(){
		
		$listnews = $this->contentHelper->listnews();
	
		
		if($ajax)
		{
			print json_encode($listnews);die;
		}
		else
		{
			return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/listnews.html');
		}

	}
	
	
	}
?>