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
		

		$listnews = $this->contentHelper->listnews();
		//pr($listnews);exit;
		$this->assign('list',$listnews['result']);
		$this->assign('total',$listnews['total']);
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/listnews.html');
	
		
	}
	function addnews(){
		global $LOCALE,$CONFIG; 
		//pr($_POST);exit;
		if(isset($_POST['submit'])==1)
		{			
			$imagesResult['arrImage']='';
			if(@$_POST['category']==3)
			{
				if($_FILES['image_file']['tmp_name'])
				{
					$images = getimagesize($_FILES['image_file']['tmp_name']);
				
					$imagesResult = $this->uploadHelper->saveCropImage2();
				}
				else
				{
					$imagesResult['arrImage']='';
				}
			}
			elseif(@$_POST['category']==2)
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

				if($_FILES['image_file']['tmp_name'])
				{
					$images = getimagesize($_FILES['image_file']['tmp_name']);
				
					$imagesResult = $this->uploadHelper->saveCropImage2();
					
				}
				else
				{
					$imagesResult['arrImage']='';
				}
			}
			elseif(@$_POST['category']==2)
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
	
	}
?>