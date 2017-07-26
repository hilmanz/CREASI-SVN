<?php
class career extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->careerHelper = $this->useHelper("careerHelper");
		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));	

		
	}

	 
	function main(){
		

		$listlocation = $this->careerHelper->listcareer();
		//pr($listlocation);exit;
		$this->assign('list',$listlocation['result']);
		$this->assign('total',$listlocation['total']);
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/listcareer.html');
	
		
	}
	
	
	
	function ajaxPaging(){
		
		$start = $this->_p('start');
	//	pr($_POST);exit;
		if ($this->_p('ajax')){
			$ajax =	$listlocation = $this->careerHelper->listcareer($start);
		}
		//pr($ajax);
		if ($ajax){ 
			print json_encode(array('status'=>true, 'data'=>$ajax));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
	}	

	
	function addcareer(){
		
		//pr($_POST);exit;
		if(isset($_POST['submit'])==1)
		{			
		
		$listeducation = $this->careerHelper->addcareer();
		if($listeducation){
	//echo "Ss";exit;
			sendRedirect($CONFIG['ADMIN_DOMAIN']."career");
			}
		}
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/new_career.html');
	
	
	}
	
	function editlocation()
	{
		global $CONFIG;
		
		
		$id = intval($this->_request('id'));
		if($this->_p('submit')==1){// echo "ss";exit;
			$editlocation = $this->locationHelper->editlocation($id);
			
			if($editlocation){
				//echo "ss";exit;
				sendRedirect($CONFIG['ADMIN_DOMAIN']."location/listlocation");
			}
		
		}
		$selectupdatedata = $this->locationHelper->selectupdatedata($id);
		//pr($selectupdatedata);exit;
		$this->assign('load',$selectupdatedata); 
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/edit_location.html');
	}
		function deletelocation()
		{
		global $CONFIG;
		
		
		$id = intval($this->_request('id'));
		
			$editeducation = $this->locationHelper->deletelocation($id);
			
			if($editeducation){
			//echo "ss";exit;
				sendRedirect($CONFIG['ADMIN_DOMAIN']."location/listlocation");
			}
		
		}
	
	}
?>