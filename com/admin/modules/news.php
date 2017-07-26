<?php
class news extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->registerHelper = $this->useHelper("newsHelper");
		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));	

		
	}

	 
	function main(){
		

		$listeducation = $this->registerHelper->listnews();
	//	pr($listeducation);exit;
		$this->assign('list',$listeducation['result']);
		$this->assign('total',$listeducation['total']);
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/listnews.html');
	
		
	}
	
	
	
	function ajaxPaging(){
		
		$start = $this->_p('start');
	//	pr($_POST);exit;
		if ($this->_p('ajax')){
			$ajax =	$listeducation = $this->registerHelper->listnews($start);
		}
		//pr($ajax);
		if ($ajax){ 
			print json_encode(array('status'=>true, 'data'=>$ajax));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
	}	

	
	function addnews(){
		
		//pr($_POST);exit;
		if(isset($_POST['submit'])==1)
		{			
		
		$listeducation = $this->registerHelper->addnews();
		if($listeducation){
	
			sendRedirect($CONFIG['ADMIN_DOMAIN']."listnews");
			}
		}
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/new_news.html');
	
	
	}
	
	function editnews()
	{
		global $CONFIG;
		
		
		$id = intval($this->_request('id'));
		if($this->_p('submit')==1){ 
			$editnews = $this->registerHelper->editnews($id);
			
			if($editnews){
			//echo "ss";exit;
				sendRedirect($CONFIG['ADMIN_DOMAIN']."news/listnews");
			}
		
		}
		$selectupdatedata = $this->registerHelper->selectupdatedata($id);
		//pr($selectupdatedata);exit;
		$this->assign('load',$selectupdatedata); 
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/edit_news.html');
	}
	function deletenews()
		{
		global $CONFIG;
		
		
		$id = intval($this->_request('id'));
		
			$editeducation = $this->registerHelper->deletenews($id);
			
			if($editeducation){
			//echo "ss";exit;
				sendRedirect($CONFIG['ADMIN_DOMAIN']."news/listeducation");
			}
		
		}
	
	}
?>