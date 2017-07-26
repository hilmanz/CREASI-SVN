<?php
class guardian extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		
		$this->guardianHelper = $this->useHelper("guardianHelper");
		
		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));	

		
	}

	 
	function main(){
		$dataCT = $this->guardianHelper->getuserguardian();
		// pr($dataCT);die;
		$time['time'] = '%H:%M:%S';
		$this->assign('list', $dataCT['data']);
		$this->assign('total', $dataCT['total']);
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/guardianinfo.html');
	
		
	}
	function upmarking(){
		$result = $this->markingHelper->upmarking();
		print  json_encode($result);die;
	
	
	}
	function block(){
		$result = $this->markingHelper->blockCreativeTelents();
		print  json_encode($result);die;
		
	}
	function deleteprtofolio(){
		$result = $this->markingHelper->deleteprtofolio();
		print  json_encode($result);die;
		
	}
	function unpublishprtofolio(){
		$result = $this->markingHelper->unpublishprtofolio();
		print  json_encode($result);die;
		
	}
	function portofolio(){
	
		$result = $this->markingHelper->getportofolio();
		// pr($result);die;
		$this->assign('list', $result['data']);
		$this->assign('total', $result['total']);
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/portofoliomgm.html');
	}
	function detail(){
	
		$result = $this->markingHelper->detailcreativetalent();
		// pr($result);die;
		$this->assign('profile', $result['profile']);
		$this->assign('portofolio', $result['portofolio']);
		$this->assign('skill', $result['skill']);
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/detailct.html');
	}
	}
?>