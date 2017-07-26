<?php
class companymanegement extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->talentskeerHelper = $this->useHelper("talentskeerHelper");
		$this->emailnotifHelper = $this->useHelper("emailnotifHelper");
		$this->jobHelper = $this->useHelper("jobHelper");
		$this->categoryHelper = $this->useHelper("categoryHelper");
		$this->emailnotifHelper=$this->useHelper("emailnotifHelper");
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));	

		
	}

	 
	function main(){
		
		$dataTS = $this->talentskeerHelper->getTelentskeer();
		// pr($dataTS);die;
		$search=@$this->_p('search');
		$startdate=@$this->_p('startdate');
		$enddate=@$this->_p('enddate');
		$this->assign('list', $dataTS['data']);
		$this->assign('total', $dataTS['total']);
		$this->assign('search', $search);
		$this->assign('startdate', $startdate);
		$this->assign('enddate', $enddate);
		
		$time['time'] = '%H:%M:%S';
		if($this->_p('ajax'))
		{
			print json_encode($dataTS);die;
		}
		else
		{
			return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/companymanegement.html');
		}
		
	
		
	}
	function downloadXls()
	{
		global $CONFIG;
		$result = $this->talentskeerHelper->getTelentskeer();
		
		$this->assign('list', $result['data']);
		$this->assign('total', $result['total']);
		$time['time'] = '%H:%M:%S';
		
			$this->callsheader();
		die;
		
	}
	function callsheader(){
		 
		$result=$this->talentskeerHelper->downloadpeserta();
		// pr($result);die;
		$file='download-data';
		$filename = $file.date('Ymd_gia').".xls";
		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Content-Disposition: attachment; filename=$filename");  
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false); 
		echo "<table border='1'>";
		echo "<tr>";
			echo "<td>No</td>";
			echo "<td>UserID</td>";
			echo "<td>Name</td>";
			echo "<td>Email</td>";
			echo "<td>Register Date</td>";
			
			echo "<td>Verified</td>";
			
		echo "</tr>";
		$no=0;
		if($result['data'])
		{
			foreach ($result['data'] as $key => $val){
			$no++;
			
				echo "<tr>";
					echo "<td>$no</td>";
					echo "<td> $val[id]</td>";
					echo "<td>$val[nama_perusahaan]</td>";
					echo "<td>$val[email]</td>";
					echo "<td>$val[tanggal]</td>";
					echo "<td>$val[verified]</td>";
				
					
				echo "</tr>";
			}
		}
		else
		{
			echo "<tr>";
			echo "<td colspan='6'>Data Not Available</td>";
			echo "</tr>";
		}
		echo "</table>";
		exit;
	
	}
	function verified(){
		$result = $this->talentskeerHelper->verifiedTelentsskeer();
		print  json_encode($result);die;
		
	}
	function jobs(){
	
		$result = $this->talentskeerHelper->getjobs();
		$this->assign('iduser', $this->_request('iduser'));
		// pr($result);die;
		$this->assign('list', $result['data']);
		$this->assign('total', $result['total']);
		if($this->_p('ajax'))
		{
			print json_encode($result);die;
		}
		else
		{
			return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/jobmgmt.html');
		}
	}
	function unpublishjobs(){
		$result = $this->talentskeerHelper->unpublishjobs();
		print  json_encode($result);die;
		
	}
	function deljobs(){
		$result = $this->talentskeerHelper->deljobs();
		$this->emailnotifHelper->sendEmail();
		echo "<script>window.history.back();</script>";die;
	}
	function editsjobs(){
	global $LOCALE,$CONFIG; 
		$result = $this->talentskeerHelper->geteditjobs();
		// pr($result);die;
		$provincy =$this->jobHelper->province();
		$category = $this->talentskeerHelper->listCategory();
		$lokingfor = $this->talentskeerHelper->lokingForjobs();
		// pr($category);die;
		$this->assign('list', $result);
		$this->assign('lokingfor', $lokingfor['loking_for']);
	
		$this->assign('provincy', $provincy);
		$this->assign('category', $category['result']);
		if($this->_p('submit'))
		{
				$resultupdate = $this->talentskeerHelper->prosesditjobs();
			
				sendRedirect($CONFIG['ADMIN_DOMAIN']."companymanegement/jobs?iduser=".$result['user_id']);exit;
		
		}
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/edit_jobsts.html');
	}
	function ajaxsub(){
		
		
		$ajax =$this->jobHelper->subcat();
		//pr($ajax);
		if($ajax)
		{
			print_r(json_encode(array('status'=>1,'data'=>$ajax)));die;
		}
		
		print_r(json_encode(array('status'=>0,'data'=>$provincy)));die;
	
		
	}
	function ajaxcity(){
		
		$provincy =$this->jobHelper->city();
		if($provincy)
		{
			print_r(json_encode(array('status'=>1,'msg'=>'succses get city','data'=>$provincy)));die;
		}
		
		print_r(json_encode(array('status'=>0,'msg'=>'problem get city','data'=>$provincy)));die;
	
		
	}
	function detail(){
	
	
		if($this->_p('submit'))
		{
			
			$this->talentskeerHelper->proseseditts();
		}
			$result = $this->talentskeerHelper->detailts();
		// pr($result);die;
		$this->assign('profile', $result);
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/detailts.html');
	}
	function resendEmail(){
	
		global $LOCALE,$CONFIG;
		//$result = $this->creativetelentHelper->delcover();
		//print  json_encode($result);die;
		$this->emailnotifHelper->resendMail();
		sendRedirect("{$CONFIG['ADMIN_DOMAIN']}companymanegement");
						return $this->out(TEMPLATE_DOMAIN_ADMIN . '/sendmailwait.html');
		die;
	}
	}
?>