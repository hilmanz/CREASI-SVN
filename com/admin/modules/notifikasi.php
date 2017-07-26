<?php
class notifikasi extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->notfikasiHelper = $this->useHelper("notfikasiHelper");
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
		$listnotif = $this->notfikasiHelper->listnotif();
		// pr($listnotif);exit;
		$search=@$this->_p('search');
		$startdate=@$this->_p('startdate');
		$enddate=@$this->_p('enddate');
		$this->assign('list',$listnotif['result']);
		$this->assign('total',$listnotif['total']);
			$this->assign('search', $search);
		$this->assign('startdate', $startdate);
		$this->assign('enddate', $enddate);
		if($this->_p('ajax'))
		{
			print json_encode($listnotif);die;
		}
		else
		{
			return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/notifikasi.html');
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
	function callsheader(){
		 
		$result=$this->notfikasiHelper->downloadpeserta();
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
			echo "<td>Title</td>";
			echo "<td>Message Notifikasis</td>";
			echo "<td>Date</td>";
			
			
		echo "</tr>";
		$no=0;
		if($result['data'])
		{
			foreach ($result['data'] as $key => $val){
			$no++;
			
				echo "<tr>";
					echo "<td>$no</td>";
					echo "<td> $val[title]</td>";
					echo "<td>$val[detail]</td>";
					echo "<td>$val[date]</td>";
					
				
					
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
	function delnotif(){
		$result = $this->notfikasiHelper->delnotif();
		$this->emailnotifHelper->sendEmail();
		echo "<script>window.history.back();</script>";die;
	}
	function readnotif(){
		$result = $this->notfikasiHelper->rednotif();
		die;
		//echo "<script>window.history.back();</script>";die;
	}
	}
?>