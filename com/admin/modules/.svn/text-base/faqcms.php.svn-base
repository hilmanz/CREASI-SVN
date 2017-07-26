<?php
class faqcms extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->contentHelper = $this->useHelper("contentHelper");
		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));	

		
	}

	 
	function main(){
		

		$listfaq = $this->contentHelper->listfaq();
		// pr($listfaq);exit;
		$this->assign('list',$listfaq['result']);
	
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/listfaq.html');
	
		
	}
	
	
	
	function addfaq(){
		global $LOCALE,$CONFIG; 
		//pr($_POST);exit;
		if(isset($_POST['submit'])==1)
		{			
		
		$listeducation = $this->contentHelper->addfaq();
			if($listeducation){
		
				sendRedirect($CONFIG['ADMIN_DOMAIN']."faqcms");
			}
		}
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/new_faq.html');
	
	
	}
	
	function editfaq()
	{
		global $CONFIG;
		
		
		$id = intval($this->_request('id'));
		if($this->_p('submit')==1){ 
			$editfaq = $this->contentHelper->editfaq();
			
			if($editfaq){
			//echo "ss";exit;
				sendRedirect($CONFIG['ADMIN_DOMAIN']."faqcms");
			}
		
		}
		$selectupdatedata = $this->contentHelper->selectupdatedatafaq($id);
		// pr($selectupdatedata);exit;
		$this->assign('load',$selectupdatedata); 
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/edit_faq.html');
	}
	function deletefaq()
		{
		global $CONFIG;
		
		
		$id = intval($this->_request('id'));
		
			$editeducation = $this->contentHelper->deletefaq($id);
			
			if($editeducation){
			//echo "ss";exit;
				sendRedirect($CONFIG['ADMIN_DOMAIN']."faqcms");
			}
		
		}
	
	}
?>