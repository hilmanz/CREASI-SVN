<?php
class migrasi extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		error_reporting(1);
// echo"ssss";die;
		$this->migrasiHelper = $this->useHelper("migrasiHelper");
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);

		
	}

	 
	function main(){
		
		echo"sssss";die;
		$time['time'] = '%H:%M:%S';
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/tips.html');
	
		
	}
	function member(){
		
		$this->migrasiHelper->singmember();die;
		
	
		
	}
	function category(){
		
		$this->migrasiHelper->singcategory2();die;
		
	
		
	}
	function subcategorys(){
		
		echo"aa";die;
		$this->migrasiHelper->singsubcategory();die;
		
	
		
	}
	function guardian(){
		echo"aa";die;
		$this->migrasiHelper->singguardian();die;
		
	
		
	}
	function portfoliophoto(){
		
		$this->migrasiHelper->singprotfoliophoto();die;
		
	
		
	}
	function portfoliovideo(){
		
		$this->migrasiHelper->singprotfoliovideo();die;
		
	
		
	}
	function portfolioaudio(){
		
		$this->migrasiHelper->singprotfolioaudio();die;
		
	
		
	}
	
	function portfolioaudio(){
		
		$this->migrasiHelper->singprotfolioaudio();die;
		
	
		
	}
	}
?>