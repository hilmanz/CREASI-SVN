<?php
class message extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 

		$this->messageHelper = $this->useHelper("messageHelper");
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);

		
	}

	 
	function main(){
		

		$time['time'] = '%H:%M:%S';
		
		$inbox = $this->messageHelper->inbox();
		
		$this->assign('list', $inbox);
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/message.html');
	
		
	}
	function ajaxlist ()
	{
		//pr($_POST);exit;
		
		$inbox = $this->messageHelper->inbox();
		//pr($readdata);exit;
		if($inbox)
		{
		print json_encode(array('status'=>true, 'data'=>$inbox));
		}else{ 
			print json_encode(array('status'=>false));
		}
		exit;
	}
	
	
	function ajaxreadmessage ()
	{
		//pr($_POST);exit;
		
		$readdata = $this->messageHelper->selectdata();
		//pr($readdata);exit;
		if($readdata)
		{
		print json_encode(array('status'=>true, 'data'=>$readdata));
		}else{ 
			print json_encode(array('status'=>false));
		}
		exit;
	}
	
	
	}
?>