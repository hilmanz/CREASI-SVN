<?php
class categorymanagemant extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->categoryHelper = $this->useHelper("categoryHelper");
		
		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);

		
	}

	
	function main(){
		
		$dataTS = $this->categoryHelper->listcategory();
		// pr($dataTS);die;
		$this->assign('list', $dataTS['result']);
		$this->assign('total', $dataTS['total']);
		// pr($dataTS);
		$time['time'] = '%H:%M:%S';
		if($this->_p('ajax'))
		{
			print json_encode($dataTS);die;
		}
		else
		{
			return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/categorymanegement.html');
		}
		//return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/categorymanegement.html');
	
		
	}
	function verified(){
		$result = $this->talentskeerHelper->verifiedTelentsskeer();
		print  json_encode($result);die;
		
	}
	function jobs(){
	
		$result = $this->talentskeerHelper->getjobs();
		// pr($result);die;
		$this->assign('list', $result['data']);
		$this->assign('total', $result['total']);
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/jobmgmt.html');
	}
	function unpublishjobs(){
		$result = $this->talentskeerHelper->unpublishjobs();
		$this->emailnotifHelper->sendEmail();
		print  json_encode($result);die;
		
	}
	function editscategory(){
	global $LOCALE,$CONFIG; 
	
		// pr($result);die;
		if(isset($_POST['submit']))
		{
			$listjob = $this->categoryHelper->editcategory();
			if($listjob)
			{
				sendRedirect($CONFIG['ADMIN_DOMAIN']."categorymanagemant");
			}
		}
		$result = $this->categoryHelper->selectupdatedatacategory();
		$this->assign('list', $result);
		
	
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/edit_category.html');
	}
	function editsubcategory(){
	global $LOCALE,$CONFIG; 
	
		// pr($result);die;
		if(isset($_POST['submit']))
		{
			$listjob = $this->categoryHelper->editsubcategory();
			if($listjob)
			{
				sendRedirect($CONFIG['ADMIN_DOMAIN']."categorymanagemant");
			}
		}
		
		$category = $this->categoryHelper->getcategory();
		$result = $this->categoryHelper->selectupdatedatasubcategory();
		// pr($category );die;
		$this->assign('list', $result);
		$this->assign('listcategory', $category);
	
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/edit_subcategory.html');
	}
	function addcategory(){
	   global $LOCALE,$CONFIG; 
	
		if(isset($_POST['submit']))
		{
			$listjob = $this->categoryHelper->addcategory();
			if($listjob)
			{
				sendRedirect($CONFIG['ADMIN_DOMAIN']."categorymanagemant");
			}
		}
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/addcategory.html');
	
	
	}
	function addsubcategory(){
	  global $LOCALE,$CONFIG; 
	
		// pr($result);die;
		if(isset($_POST['submit']))
		{
			$listjob = $this->categoryHelper->addsubcategory();
			if($listjob)
			{
				sendRedirect($CONFIG['ADMIN_DOMAIN']."categorymanagemant");
			}
		}
		
		$category = $this->categoryHelper->getcategory();
		$result = $this->categoryHelper->selectupdatedatacategory();
		// pr($result );die;
		$this->assign('list', $result);
		$this->assign('listcategory', $category);
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/addsubcategory.html');
	
	
	}
	function delsubcategory(){
	  global $LOCALE,$CONFIG; 
	
		$result = $this->categoryHelper->delsubcategory();
		if($result )
		{
			// pr($result);die;
			if(isset($_POST['ajax']))
			{
				print json_encode($result);die;
			
			}
			else
			{
				sendRedirect($CONFIG['ADMIN_DOMAIN']."categorymanagemant");
			}
		}
	}
	function delcategory(){
	 global $LOCALE,$CONFIG; 
	
		$result = $this->categoryHelper->delcategory();
		if($result )
		{
			
			if(isset($_POST['ajax']))
			{
				print json_encode($result);die;
			
			}
			else
			{
				sendRedirect($CONFIG['ADMIN_DOMAIN']."categorymanagemant");
			}
		
		}
	}
	}
?>