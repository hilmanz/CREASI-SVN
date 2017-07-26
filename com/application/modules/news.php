<?php
class news extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 

		$this->newsHelper = $this->useHelper("newsHelper");
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);

		
	}

	 
	function main(){
		

		$listnews = $this->newsHelper->listnews('2');
		// pr($listnews);exit;
		$this->assign('list',$listnews['result']);
		$this->assign('total',$listnews['total']);
		
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/news.html');
	
		
	}
	function press(){
		

		$listnews = $this->newsHelper->listnews('1');
		// pr($listnews);exit;
		$this->assign('list',$listnews['result']);
		$this->assign('total',$listnews['total']);
		
		if($this->_p('ajax'))
		{
			print json_encode($listnews);die;
		}
		else
		{
			return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/press.html');
		}
		
	
		
	}
	function details(){
		
		global $LOCALE,$CONFIG; 

		$listnews = $this->newsHelper->details();
		// pr($listnews);exit;
		$this->assign('list',$listnews['result']);
		
		$this->assign('fbnews',$LOCALE[1]['share']['FB']['news']);
		$this->assign('twitternews',$LOCALE[1]['share']['Twitter']['news']);
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/detailsnews.html');
	
		
	}
	function detailspress(){
		

		$listnews = $this->newsHelper->details();
		// pr($listnews);exit;
		$this->assign('list',$listnews['result']);
		
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/detailspress.html');
	
		
	}
	function sharecontent(){
		
		$result=$this->newsHelper->sendmail();
		if($result)
		{
			print json_encode(array('status'=>1));

		}
		else
		{
			print json_encode(array('status'=>0));
		}

		die;
		
		
	}
	function ajaxpaging(){
		$listnews = $this->newsHelper->listnews('2');
		//pr($ajax);
		if ($listnews){ 
			print json_encode(array('status'=>true, 'data'=>$listnews));
		}else{ 
			print json_encode(array('status'=>false));
		}
		exit;
	}
	
	function ajaxPagingpers(){
		$listpers = $this->newsHelper->listnews('1');
	
		if ($listpers){ 
			print json_encode(array('status'=>true, 'data'=>$listpers));
		}else{ 
			print json_encode(array('status'=>false));
		}
		exit;
	}
	
	
		
	
}
?>