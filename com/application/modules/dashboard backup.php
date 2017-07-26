<?php
class dashboard extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 

		$this->dashboardHelper = $this->useHelper("dashboardHelper");
	
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->user=$this->session->getSession($this->config['SESSION_NAME'],"WEB");
		$this->assign('user', $this->user);
		$this->assign('roleidnya',@$this->user->role);
		
	}


	function main(){
		
	global $LOCALE,$CONFIG; 

		$time['time'] = '%H:%M:%S';
		//pr($this->user);exit;
		if(@$this->user->role == 2){
		$main_job = $this->dashboardHelper->main_job_ts($start=null,$limit=5,$this->user->id);
		$popular = $this->dashboardHelper->popular();
		$interview_job = $this->dashboardHelper->interview_job_ts($start=null,$limit=5,$this->user->id);
		
	//pr($interview_job);exit;
		$this->assign('popularlist',$popular);
		//pr($popular);exit;
		//pr($main_job['result']);exit;
		$this->assign('uid',$this->user->id);
		$this->assign('listts',$interview_job['result']);
		$this->assign('load',$main_job['result']);
		$this->assign('total',$main_job['total']);
		$this->assign('totalint',$interview_job['total']);
		$this->assign('popularlist',$popular);
		$this->assign('rolenya', 'Talent Seeker');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/dashboard.html');
		}else if (@$this->user->role == 1) {
		
		$popular = $this->dashboardHelper->popular();
		//pr($popular);exit;
		$main_job = $this->dashboardHelper->main_job($start=null,$limit=5,$this->user->id);

		$interview_job = $this->dashboardHelper->interview_job($start=null,$limit=5,$this->user->id);
		//pr($interview_job);exit;
		$this->assign('load',$main_job['result']);
		$this->assign('uid',$this->user->id);
		$this->assign('popularlist',$popular);
		$this->assign('list',$interview_job['result']);
		$this->assign('totalint',$interview_job['total']);
		$this->assign('total',$main_job['total']);
	
		
		
		$this->assign('rolenya', 'Creative Talent');
		
		
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/dashboard.html');
		
		}else{
		sendRedirect($CONFIG['BASE_DOMAIN'].'home');
		}
		
	
		
	}
	function settingTs(){
		global $LOCALE,$CONFIG; 
		// pr($this->user);die;
		if(@$this->user->role == 2){
			$list = $this->dashboardHelper->detail_talent_seeker($this->user->id);
			$this->assign('list',$list);
			if($this->_p('submit'))
			{
				$email=$this->_p('emailold');
				$emailnew=$this->_p('emailnew');
				$emailconfirm=$this->_p('emailconfirm');
				$emailval=$this->is_valid_email(strip_tags($this->_p('emailnew')));
				$email_no='';
				$password=$this->_p('passwordold');
				$passwordnew=$this->_p('newpassword');
				$passwordconfirm=$this->_p('confirmpassword');
				$password_no='';
				$language=$this->_p('language');
				$language_no='';
				$privacy=$this->_p('privacy');
				$pesan_erorr='';
				
				
				if($emailnew=='' || !$emailval)
				{
					$email_no='kolom ini harus diisi';
					$pesan_erorr='ada';
				}
				elseif($emailnew!=$emailconfirm)
				{
					$email_no='email confirm tidak sama dengan email new';
					$pesan_erorr='ada';
				}
				
				if($passwordnew=='')
				{
					$password_no='kolom ini harus diisi';
					$pesan_erorr='ada';
				}
				elseif($passwordnew!=$passwordconfirm)
				{
					$password_no='password confirm tidak sama dengan password new';
					$pesan_erorr='ada';
				}	
				if($language=='')
				{
					$language_no='kolom ini harus diisi';
					$pesan_erorr='ada';
				}
				if($pesan_erorr)
				{
					
					$this->assign('pesan_erorr',$pesan_erorr);
					$this->assign('email',$email);
					$this->assign('email_no',$email_no);
					$this->assign('password',$password);
					$this->assign('password_no',$password_no);
					$this->assign('language',$language);
					$this->assign('language_no',$language_no);
					
					return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/setting_ts.html');
				}
				
				if($emailnew==$emailconfirm)
				{
					$email=$emailnew;
				}
				
				if($passwordnew==$passwordconfirm)
				{
					$password=$passwordnew;
				}
				$data= array(
						'email'=>$email,
						'password'=>$password,
						'language'=>$language,
						'privacy'=>$privacy,
						'uid'=>$this->user->id
				
				);
				$this->dashboardHelper->updatesettingts($data);
			
			}
			
			return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/setting_ts.html');
			
		}
		else
		{
			sendRedirect($CONFIG['BASE_DOMAIN'].'home');die;
		}
	}
	function editsettingTS(){
		global $LOCALE,$CONFIG; 
		if(@$this->user->role == 2){
			$list = $this->dashboardHelper->detail_talent_seeker($this->user->id);
			// pr($list);
			$this->assign('list',$list);
			return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/edit_setting_ts.html');
		}
		else
		{
			sendRedirect($CONFIG['BASE_DOMAIN'].'home');die;
		}
	}
	function checkinterview(){
		global $LOCALE,$CONFIG; 
		//pr($_POST);exit;
		$listpersonal = $this->dashboardHelper->checkinterview();
			if($listpersonal)
			{
						print_r(json_encode(array('status'=>1,'data'=>$listpersonal)));exit;
			}
	}
	function detail_talent_jobs(){
		
	global $LOCALE,$CONFIG; 
	if(@$this->user->role == 2){
	$jobsid = intval($this->_request('id'));
	$listpersonal = $this->dashboardHelper->detail_talent_jobs($jobsid);
	//pr($listpersonal);exit;
		$this->assign('list', $listpersonal);
		$this->assign('jobsid', $jobsid);
//	pr($main_job);exit;
	return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/detail_talent_jobs.html');
	
	
	}else{
		sendRedirect($CONFIG['BASE_DOMAIN'].'home');
		}
	
	
	}
	
	
	function ajaxdtjobs(){
			//pr($_POST['namecheck']);
			$result=$_POST['namecheck'];
			print_r(json_encode(array('status'=>1,'data'=>$result)));die;
	
	}
	
	function ajaxstatusperson(){
		//pr($_POST);exit;
		if($_POST['statusperson']=='noshow')
		{
			$idnya=$_POST['idnya'];
			$statusperson = $this->dashboardHelper->statuspersonnoshow($idnya);
			if($statusperson == true)
			{
			print_r(json_encode(array('status'=>1)));die;
			}
			
			
		}else{
		$idnya=$_POST['idnya'];
			$statusperson = $this->dashboardHelper->statuspersonhire($idnya);
			if($statusperson == true)
			{
			print_r(json_encode(array('status'=>2)));die;
			}
		
		
		}
	
	}
	function decisionajaxinterview(){
		//	pr($_POST);
		//  pr('ss');exit;
			$jobid=$this->_p('jobid');
			//pr($jobid);exit;
			$listpersonal = $this->dashboardHelper->updatedecisionajaxinterview($jobid);
			if($listpersonal == true)
			{
			
			print_r(json_encode(array('status'=>1)));die;
			}
	
	}
		function decisionajaxinterviewdec(){
		//	pr($_POST);
		//  pr('ss');exit;
			$jobid=$this->_p('jobid');
			//pr($jobid);exit;
			$listpersonal = $this->dashboardHelper->updatedecisionajaxinterviewdec($jobid);
			if($listpersonal == true)
			{
			
			print_r(json_encode(array('status'=>1)));die;
			}
	
	}
	function ajaxinterviewjobs(){

			$idjobs=$_POST['idjobs'];
			$listpersonal = $this->dashboardHelper->updateinterview($idjobs);
			print_r(json_encode(array('status'=>1)));die;
	
	}
	function ajaxmostview(){

			$id=$this->_p('uid');
			$role=intval($this->user->role);
			$main_job = $this->dashboardHelper->main_job_ts($start=null,$limit=5,$id);
			$popular = $this->dashboardHelper->popular();
			$interview_job = $this->dashboardHelper->interview_job_ts($start,$limit=5,$id);
			//pr($listpersonal);
			print_r(json_encode(array('status'=>1,'data'=>$main_job,'total'=>$main_job['total'],'popular'=>$popular,'uid'=>$id,'listts'=>$interview_job['result'],'popularlist'=>$popular,'role'=>$role,
			'images'=>$this->user->img_avatar)));die;
	
	}
	function ajaxmostviewuser(){

			$id=$this->_p('uid');
			$role=intval($this->user->role);
			$main_job = $this->dashboardHelper->main_job($start=null,$limit=10,$id);
			$popular = $this->dashboardHelper->popular();
			$interview_job = $this->dashboardHelper->interview_job($start=null,$limit=10,$id);
			//pr($main_job);
			print_r(json_encode(array('status'=>1,'data'=>$main_job,'popular'=>$popular,'uid'=>$id,'listts'=>$interview_job['result'],'total'=>$main_job['total'],'role'=>$role,'popularlist'=>$popular)));die;
	
	}
	function download(){
			$paramdownload = intval($this->_request('param'));
			$listpersonal = $this->dashboardHelper->download($paramdownload);
	}
	
	}
?>