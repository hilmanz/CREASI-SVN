<?php
class personalmanagement extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		
		$this->creativetelentHelper = $this->useHelper("creativetelentHelper");
		$this->emailnotifHelper = $this->useHelper("emailnotifHelper");
		
		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));	

		
	}

	 
	function main(){
		$dataCT = $this->creativetelentHelper->getCreativeTelents();
		// pr($dataCT);die;
		$time['time'] = '%H:%M:%S';
		$search=@$this->_p('search');
		$startdate=@$this->_p('startdate');
		$enddate=@$this->_p('enddate');
		$this->assign('list', $dataCT['data']);
		$this->assign('search', $search);
		$this->assign('startdate', $startdate);
		$this->assign('enddate', $enddate);
		$this->assign('total', $dataCT['total']);
		if($this->_p('ajax'))
		{
			print json_encode($dataCT);die;
		}
		else
		{
			return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/personalmanagement.html');
		}
	
	
		
	}
	function callsheader(){
		 
		$result=$this->creativetelentHelper->downloadpeserta();
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
			echo "<td>Not Show</td>";
			echo "<td>Hired</td>";
			
		echo "</tr>";
		$no=0;
		if($result['data'])
		{
		
		
			foreach ($result['data'] as $key => $val){
			$no++;
			
				echo "<tr>";
					echo "<td>$no</td>";
					echo "<td> $val[id]</td>";
					echo "<td>$val[name]</td>";
					echo "<td>$val[email]</td>";
					echo "<td>$val[tanggal]</td>";
					if($val['marking']==0)
					{
						echo "<td></td>";
					}
					else
					{
						echo "<td> Not Show</td>";
					}
					echo "<td></td>";
					
				
					
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
	function delete(){
		$result = $this->creativetelentHelper->delCreativeTelents();
		print  json_encode($result);die;
	
	
	}
	function block(){
		$result = $this->creativetelentHelper->blockCreativeTelents();
		print  json_encode($result);die;
		
	}
	function deleteprtofolio(){
		$result = $this->creativetelentHelper->deleteprtofolio();
		print  json_encode($result);die;
		
	}
	function unpublishprtofolio(){
		$result = $this->creativetelentHelper->unpublishprtofolio();
		print  json_encode($result);die;
		
	}
	function portofolio(){
	
		$result = $this->creativetelentHelper->getportofolio();
		// pr($result);die;
		$this->assign('list', $result['data']);
		$this->assign('total', $result['total']);
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/portofoliomgm.html');
	}
	function detail(){
	
		if($this->_p('submit'))
		{
			
			$this->creativetelentHelper->proseseditct();
		}
		$provincy =$this->creativetelentHelper->province();
		$this->assign('provincy', $provincy);
		$result = $this->creativetelentHelper->detailcreativetalent();
		// pr($result['portofolio']);die;
		$this->assign('profile', $result['profile']);
		$this->assign('portofolio', $result['portofolio']);
		$this->assign('skill', $result['skill']);
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/detailct.html');
	}
	function delavatar(){
	
		
		$result = $this->creativetelentHelper->delavatar();
		print  json_encode($result);die;
		
	}
	function delcover(){
	
		
		$result = $this->creativetelentHelper->delcover();
		print  json_encode($result);die;
		
	}
	function resendEmail(){
	
		global $LOCALE,$CONFIG;
		//$result = $this->creativetelentHelper->delcover();
		//print  json_encode($result);die;
		$this->emailnotifHelper->resendMail();
		sendRedirect("{$CONFIG['ADMIN_DOMAIN']}personalmanagement");
						return $this->out(TEMPLATE_DOMAIN_ADMIN . '/sendmailwait.html');
		die;
	}
	}
?>