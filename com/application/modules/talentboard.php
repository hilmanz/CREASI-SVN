<?php
class talentboard extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
	
		$this->talentHelper = $this->useHelper("talentHelper");
		$this->user = $this->getUserOnline();
		// pr($this->user);die;
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);

		function encrypt($string)
		{	
		$ENC_KEY='youknowwho2014';
		return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($ENC_KEY), $string, MCRYPT_MODE_CBC, md5(md5($ENC_KEY))));
		}
		function decrypt($encrypted)
		{
		$ENC_KEY='youknowwho2014';
		return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($ENC_KEY), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($ENC_KEY))), "\0");
		}
	
	}

	
	
	function main(){
		
		
		$time['time'] = '%H:%M:%S';
		$loopcategory = $this->talentHelper->categoryasli();
		$category = $this->talentHelper->category();
		//pr($loopcategory);exit;
		$citynya =  $this->talentHelper->citynya();
		//pr($this->user);exit;
		$this->assign('citynya', $citynya['result']);
		$this->assign('load',$category);
		$this->assign('loopcat',$loopcategory);
		if(@$this->user->id)
		{
		$uidlike=encrypt(@$this->user->id);
		$this->assign('uidlike',$uidlike);
		}else
		{
		$this->assign('uidlike','');
		}
		$s_category = $this->talentHelper->select_category();
			
		
		
		if($this->_p('advsearch'))
		{
			$id=$this->_p('advsearch');
			$sub_category = $this->talentHelper->sub_category($id);
			//pr($sub_category);
				if ($sub_category){ 
						print_r( json_encode(array('status'=>true, 'data'=>$sub_category)));
					}else{ 
						print_r( json_encode(array('status'=>false)));die;
					}
					exit;
					
		}
		
		$city = $this->talentHelper->city();
		//value get sorting talentboard
		$valsort=array();
		$valsort[3]=encrypt('sm.id');
		$valsort[1]=encrypt('love_count');
		$valsort[2]=encrypt('view_count');
		$this->assign('valsort', $valsort);
		//Listing Personal Talent Board
		$listpersonal = $this->talentHelper->listtalent ($start=null,$limit=20);
		//spr($listpersonal);exit;
		$popular = $this->talentHelper->popular();
		//pr($popular);exit;
		$this->assign('popularlist',$popular);
		$this->assign('list', $listpersonal['result']);
		$this->assign('total', $listpersonal['total']);
		$this->assign('s_cat', $s_category);
		
		
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/talentboard.html');
	
		
	}
	
	function ajaxmostview(){
	//pr($_POST);
		//pr(decrypt($_GET['okeh']));
		$sorting=decrypt(@$_POST['okeh']);
		//pr($sorting);exit;
		if (@$_POST['okeh']=='')
		{
		$sorting=NULL;
		}
		if ($sorting=='satu') 
		{
		$sorting='view_count';
		}
		//pr($_POST);exit;
		$uidlike=encrypt(@$this->user->id);
		$ajax = $this->talentHelper->listtalent($start=null,$limit=20,$sorting);
		$popular = $this->talentHelper->popular();
	
	
		if ($ajax){ 
			print_r( json_encode(array('status'=>true, 'data'=>$ajax['result'],'total'=>$ajax['total'],'uidlike'=>$uidlike,'popularlist'=>$popular)));
		}else{ 
			print_r( json_encode(array('status'=>false)));
		}
		exit;
		
	
		
	}
	
	function ajaxlike()
	{
		global $LOCALE,$CONFIG;
	
		//pr($_POST);exit;
		
		
		
		
		if($this->_p('uid') <> '')
		{
		$id=decrypt($this->_p('uid'));
		$friendid = $this->_p('idnya');
		if(@$this->user->id)
		{
		//pr('xx');exit;
		$ajaxlike = $this->talentHelper->ajaxlike($id,$friendid);
		}
		}
		else{
		//pr('xxa');exit;
			print json_encode(array('status'=>'cannot do this')); exit;
		}
		
		//pr($ajaxlike);
		if($ajaxlike)
		{
		print json_encode(array('status'=>true,'countnya'=>$ajaxlike[0]['love_count'],'uid'=>$this->_p('uid'),'friendid'=>$friendid));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
		
	}
	function ajaxlikeprofile()
	{
		global $LOCALE,$CONFIG;
	
		//pr($_POST);exit;
		$id=$this->_p('uid');
		$friendid = $this->_p('idnya');
		
		
		$ajaxlike = $this->talentHelper->ajaxlike($id,$friendid);
		//pr($ajaxlike);
		if($ajaxlike)
		{
		print json_encode(array('status'=>true,'countnya'=>$ajaxlike[0]['love_count']));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
		
	}
	
	function talentboardadv(){
	
		$ajax = $this->talentHelper->listtalentadvsearch();
		$uidlike=encrypt(@$this->user->id);
		$popular = $this->talentHelper->popular();
		if ($ajax){ 
			print_r( json_encode(array('status'=>true, 'data'=>$ajax['result'],'total'=>$ajax['total'],'uidlike'=>$uidlike,'popularlist'=>$popular)));die;
		}else{ 
			print_r( json_encode(array('status'=>false)));die;
		}	
	
		
	}
	function ajaxPaging(){
		if($this->_p('ajax'))
		{
		$start = $this->_p('start');
		$sorting=@decrypt($_POST['okeh']);
		if ($sorting=='satu') 
		{
		$sorting='view_count';
		}
		if ($this->_p('ajax') && $_POST['okeh'] !='' ){
		//pr('sas');
			$ajax =	$this->talentHelper->listtalent($start,$limit=20,$sorting);
		}else if($this->_p('ajax') ){
		//pr('ss');
			$ajax =	$this->talentHelper->listtalent($start,$limit=20);
		}
		if(@$this->user->id)
		{
		$uidlike=encrypt(@$this->user->id);
		}else{
		$uidlike='';
		}
			$popular = $this->talentHelper->popular();
		//pr($ajax);
		if ($ajax){ 
			print json_encode(array('status'=>true, 'data'=>$ajax,'uidlike'=>$uidlike,'popularlist'=>$popular));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
		}else
		{
			echo "<h1>404</h1>";exit;
		}
	}	
	
	
	
	}
?>