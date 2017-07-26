<?php
class testmig extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		error_reporting(1);
		$this->migrasiHelper = $this->useHelper("migrasiHelper");
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		
		
	}

	 
	function main(){
		echo"ssss";die;
		$this->migrasiHelper->singsubcategory();die;
	}
	function member(){
		// echo"sss";die;
		$this->migrasiHelper->singmember();die;
		
	
		
	}
	function category(){
		
		$this->migrasiHelper->singcategory2();die;
		
	
		
	}
	function subcategorys(){
		
		// echo"aa";die;
		$this->migrasiHelper->singsubcategory();die;
		
	
		
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
	function attributcategory(){
		
		// echo"ssss";die;
		$this->migrasiHelper->singattributcategory();die;
		
	
		
	}
	function attributeducation(){
		
		// echo"ssss";die;
		$this->migrasiHelper->singeducation();die;
		
	
		
	}
	}?>