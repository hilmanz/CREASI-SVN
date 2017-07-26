<?php
class jobmanagement extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->jobHelper = $this->useHelper("jobHelper");
		 $this->emailnotifHelper = $this->useHelper("emailnotifHelper");
		 $this->talentskeerHelper=$this->useHelper("talentskeerHelper");
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));	

			//$this->user=$this->session->getSession($this->config['SESSION_NAME'],"ADMIN");
	}

	 
	function main(){
		$listjob = $this->jobHelper->listjob();
		// pr($listjob);exit;
		$search=@$this->_p('search');
		$startdate=@$this->_p('startdate');
		$enddate=@$this->_p('enddate');
		$this->assign('list',$listjob['result']);
		$this->assign('total',$listjob['total']);
		$this->assign('search', $search);
		$this->assign('startdate', $startdate);
		$this->assign('enddate', $enddate);
		if($this->_p('ajax'))
		{
			print json_encode($listjob);die;
		}
		else
		{
			return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/jobmanagement.html');
		}
		

		
	}
	function publish(){
		global $LOCALE,$CONFIG; 
		$idjob = $this->_g('id');
		$publish= $this->jobHelper->publish();
		
		if($publish['status']==1)
		{
			$this->emailnotifHelper->sendEmail();
			sendRedirect($CONFIG['ADMIN_DOMAIN']."jobmanagement");
		}
		else
		{
			pr($publish);die;
		}

	}
	function addjob(){
	   
	  // pr($this->user->id);exit;
		if(isset($_POST['submit']))
		{
			$listjob = $this->jobHelper->addjob($this->user->id);
		}
		$listcategory = $this->jobHelper->listcategory();
		//pr($listcategory);exit;s
		$this->assign('load',$listcategory);
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/addjob.html');
	
	
	}
	function editjob(){
	   
	  // pr($this->user->id);exit;
		if(isset($_POST['submit']))
		{
			$listjob = $this->jobHelper->editjob();
		}
		
		$listcategory = $this->jobHelper->listcategory();
		
		$this->assign('listcategory',$listcategory);
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/edit_jobs.html');
	
	
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
			
				sendRedirect($CONFIG['ADMIN_DOMAIN']."jobmanagement");exit;
		
		}
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/edit_jobs.html');
	}
	function callsheader(){
		 
		$result=$this->jobHelper->downloadpeserta();
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
			echo "<td>Company Name</td>";
			echo "<td>Category</td>";
			echo "<td>Sub Category</td>";
			echo "<td>Job Title</td>";
			echo "<td>Description</td>";
			echo "<td>Date</td>";
			
		echo "</tr>";
		$no=0;
		if($result['data'])
		{
		
		
			foreach ($result['data'] as $key => $val){
			$no++;
			
				echo "<tr>";
					echo "<td>$no</td>";
					echo "<td> $val[id]</td>";
					echo "<td>$val[namaPerusahaan]</td>";
					echo "<td>$val[category_name]</td>";
					echo "<td>$val[name_subcategory]</td>";
					echo "<td>$val[job_title]</td>";
					echo "<td>$val[job_description]</td>";
					echo "<td>$val[date]</td>";
				
					
				echo "</tr>";
			}
		}
		else
		{
			echo "<tr>";
			echo "<td colspan='7'>Data Not Available</td>";
			echo "</tr>";
		}
		echo "</table>";
		exit;
	
	}
	}
?>