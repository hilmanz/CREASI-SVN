<?php
class talentsekeerboard extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 

		$this->jobHelper = $this->useHelper("jobHelper");
		$this->talentSeekerHelper = $this->useHelper("talentSeekerHelper");
		
		$this->user = $this->getUserOnline();
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);

		
	}

	 
	function main(){
		//pr($_REQUEST['category']);die;

		$main_ts = $this->talentSeekerHelper->listtalent();
		//pr($main_ts);exit;
		$this->assign('load',$main_ts['result']);
		$this->assign('total',$main_ts['total']);
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/talentsekeerboard.html');
	
		
	}
	
	
	
	function ajaxmostview(){
	//pr($_POST);
		//pr(decrypt($_GET['okeh']));
		$sorting=@$_POST['okeh'];
		$sortingcat=@$_POST['category'];
		$ajax =  $this->jobHelper->main_job($start=null,$limit=20,$sorting,$sortingcat);
		//pr($ajax);exit;
		
		
		if ($ajax){ 
			print_r( json_encode(array('status'=>true, 'data'=>$ajax['result'],'total'=>$ajax['total'])));die;
		}else{ 
			print_r( json_encode(array('status'=>false)));die;
		}
		exit;
	
		
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
	
	
	
	function ajaxPaging(){
	
	//pr($_POST);
	
			
			$sorting=$_REQUEST['sorting'];
			$ajax =	 $this->talentSeekerHelper->listtalent($start=null,$limit=8,$sorting);
			
			if ($ajax){ 
				print json_encode(array('status'=>true, 'data'=>$ajax));
			}else{ 
				print json_encode(array('status'=>false));
			}
			
			exit;
		
		}
	
	}
?>