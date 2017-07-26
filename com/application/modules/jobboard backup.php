<?php
class jobboard extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 

		$this->jobHelper = $this->useHelper("jobHelper");
		$this->talentHelper = $this->useHelper("talentHelper");
		
		$this->user = $this->getUserOnline();
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);

		
	}

	 
	function main(){
		//pr($_REQUEST['category']);die;

		$main_job = $this->jobHelper->main_job();
		$s_category = $this->jobHelper->select_category();
		$cat_category =  $this->jobHelper->cat_category();
		$citynya =  $this->jobHelper->citynya();
		//pr($main_job);exit;
	
		$this->assign('s_cat', $s_category);
		$this->assign('cat', $cat_category);
	//	pr($countmyapp);
		$this->assign('citynya', $citynya['result']);
		//pr($main_job['result'][0]['date']);exit;
		$this->assign('load',$main_job['result']);
		$this->assign('total',$main_job['total']);
		if($this->_p('advsearch'))
		{
			$id=$this->_p('advsearch');
			$sub_category = $this->jobHelper->sub_category($id);
			//pr($sub_category);

				if ($sub_category){ 
						print_r( json_encode(array('status'=>true, 'data'=>$sub_category)));
					}else{ 
						print_r( json_encode(array('status'=>false)));die;
					}exit;
					
		}
		if($this->_p('advasearch'))
		{
			$advsearch = $this->jobHelper->main_job();
			
			if ($advsearch){ 
						print_r( json_encode(array('status'=>true, 'data'=>$advsearch)));
					}else{ 
						print_r( json_encode(array('status'=>false)));die;
					}exit;
		}
		
		
	
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/main_jobboard.html');
	
		
	}
		function jobboardadv(){
	
		$ajax = $this->jobHelper->listjobadvsearch();
		if ($ajax){ 
			print_r( json_encode(array('status'=>true, 'data'=>$ajax['result'],'total'=>$ajax['total'])));die;
		}else{ 
			print_r( json_encode(array('status'=>false)));die;
		}	
	
		
	}
	
	function ajaxmostview(){
	//pr($_POST);
		//pr(decrypt($_GET['okeh']));
		$sorting=@$_POST['okeh'];
		$sortingcat=@$_POST['category'];
		$ajax =  $this->jobHelper->main_job($start=null,$limit=10,$sorting,$sortingcat);
		//pr($ajax);exit;
		
		
		if ($ajax){ 
			print_r( json_encode(array('status'=>true, 'data'=>$ajax['result'],'total'=>$ajax['total'])));die;
		}else{ 
			print_r( json_encode(array('status'=>false)));die;
		}
		exit;
	
		
	}
	function detail_jobboard(){
		global $LOCALE,$CONFIG; 
		$id = intval($this->_request('id'));
		$listjob = $this->jobHelper->main_job($start=null,$limit=null,$id);
		//pr($listjob);exit;
		if($listjob == false)
		{
			echo "<script>alert('you dont have permission'); window.history.back() ;</script>";
			sendRedirect($CONFIG['BASE_DOMAIN'].'jobboard');
		}
		$countmyapp = $this->jobHelper->countmyapplicant($listjob['result'][0]['id_job']);
		//pr($countmyapp);exit;
		if($this->user)
		{
			$this->assign('iduser',$this->user->id);
			$this->assign('roleid',$this->user->role);
		}
		else
		{
			$this->assign('iduser','');
		}
	
		$this->assign('load',$listjob['result']);
		$this->assign('total',$listjob['total']);
		$this->assign('idjob',$listjob['result'][0]['id_job']);
		$this->assign('countmyapp',$countmyapp['total']);
		 // pr($this->user->id);die;
	
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/job-detail.html');
	
		
	}
	
	
	function ajaxlike()
	{
		global $LOCALE,$CONFIG;
	
		
		$job_id=$this->_p('uid');
		$friendid = $this->_p('idnya');
		
		
		$ajaxlike = $this->jobHelper->ajaxlike($job_id,$friendid);
		//pr($ajaxlike);exit;
		if($ajaxlike)
		{
		print json_encode(array('status'=>true,'countnya'=>$ajaxlike[0]['love_count']));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
		
	}
	function tscms(){
		
		$id = intval($this->_request('id'));
		$listjob = $this->jobHelper->main_job($start=null,$limit=null,$id);
		//pr($listjob);exit;
		$param='1';
		$listpersonal = $this->jobHelper->detail_talent_jobs($id,$param);
		//pr($listpersonal);exit;
		$countmyapp = $this->jobHelper->countmyapplicant($listjob['result'][0]['id_job']);
		//pr($countmyapp);exit;
		if($this->user)
		{
			$this->assign('iduser',$this->user->id);
			$this->assign('roleid',$this->user->role);
		}
		else
		{
			$this->assign('iduser','');
		}
		
	
		$this->assign('list', $listpersonal['result']);
		$this->assign('load',$listjob['result']);
		$this->assign('total',$listjob['total']);
		$this->assign('idjob',$listjob['result'][0]['id_job']);
		$this->assign('countmyapp',$countmyapp['total']);
		 // pr($this->user->id);die;
	
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/ts-cms.html');
	
		
	}
	function tsreviewed(){
		
		$id = intval($this->_request('id'));
		$listjob = $this->jobHelper->main_job($start=null,$limit=null,$id);
		//pr($listjob);exit;
		$param='2';
		$listpersonal = $this->jobHelper->detail_talent_jobs($id,$param);
		//pr($listpersonal);exit;
		$countmyapp = $this->jobHelper->countmyapplicant($listjob['result'][0]['id_job']);
		//pr($countmyapp);exit;
		if($this->user)
		{
			$this->assign('iduser',$this->user->id);
			$this->assign('roleid',$this->user->role);
		}
		else
		{
			$this->assign('iduser','');
		}
		
	
		$this->assign('list', $listpersonal['result']);
		$this->assign('load',$listjob['result']);
		$this->assign('total',$listjob['total']);
		$this->assign('idjob',$listjob['result'][0]['id_job']);
		$this->assign('countmyapp',$countmyapp['total']);
		 // pr($this->user->id);die;
	
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/ts-cms.html');
	
		
	}
	function tsreject(){
		
		$id = intval($this->_request('id'));
		$listjob = $this->jobHelper->main_job($start=null,$limit=null,$id);
		//pr($listjob);exit;
		$param='3';
		$listpersonal = $this->jobHelper->detail_talent_jobs($id,$param);
		//pr($listpersonal);exit;
		$countmyapp = $this->jobHelper->countmyapplicant($listjob['result'][0]['id_job']);
		//pr($countmyapp);exit;
		if($this->user)
		{
			$this->assign('iduser',$this->user->id);
			$this->assign('roleid',$this->user->role);
		}
		else
		{
			$this->assign('iduser','');
		}
		
	
		$this->assign('list', $listpersonal['result']);
		$this->assign('load',$listjob['result']);
		$this->assign('total',$listjob['total']);
		$this->assign('idjob',$listjob['result'][0]['id_job']);
		$this->assign('countmyapp',$countmyapp['total']);
		 // pr($this->user->id);die;
	
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/ts-cms.html');
	
		
	}
	function checkinterview(){
		global $LOCALE,$CONFIG; 
		//pr($_POST);exit;
		$listpersonal = $this->jobHelper->checkinterview();
		//pr($listpersonal);
			if($listpersonal)
			{
						print_r(json_encode(array('status'=>1,'data'=>$listpersonal)));exit;
			}
	}
	function ajaxinterviewjobs(){
//pr($_POST);exit;
	
			$listpersonal = $this->jobHelper->updateinterview();
			if($listpersonal)
			{
			print_r(json_encode(array('status'=>1)));exit;
			}
	
	}
	function ajaxmreviewedjobs(){

			$idjobs=$_POST['idjobs'];
			$listpersonal = $this->jobHelper->updatereviewedjobs($idjobs);
			print_r(json_encode(array('status'=>1,'idnya'=>$_POST['user'])));exit;
	
	}
	function ajaxmrejectjobs(){

			$idjobs=$_POST['idjobs'];
			$listpersonal = $this->jobHelper->updaterejectjobs($idjobs);
			print_r(json_encode(array('status'=>1,'idnya'=>$_POST['user'])));exit;
	
	}
	function  postapllication(){

		if($_POST['iduse']=='')
		{
			print_r(json_encode(array('status'=>0)));die;
		}else {
		
		$seemyapp = $this->jobHelper->seemyapplicant();
		//pr($seemyapp);
		if($seemyapp != "")
		{
			print_r(json_encode(array('status'=>2)));die;
		}
		
		$myapp = $this->jobHelper->myapplicant();
		if($myapp)
		{
			print_r(json_encode(array('status'=>1)));die;
		}
			
		}
		
	}
	
	
	
	function ajaxPaging(){
	
	//pr($_POST);
		if($this->_p('ajax'))
		{
		
			$start = $this->_p('start');
			
			$sorting=@$_POST['okeh'];
			if ($sorting=='satu') 
			{
				$sorting='view_count';
			}
			
			if ($this->_p('ajax') && $_POST['okeh'] !='' ){
		
				$ajax =	$this->jobHelper->main_job($start,$limit=10,$sorting);
				
			}else if($this->_p('ajax') ){
				
				$ajax =	$this->jobHelper->main_job($start,$limit=10);
			}
				//pr($ajax);
			if ($ajax){ 
				print json_encode(array('status'=>true, 'data'=>$ajax));
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