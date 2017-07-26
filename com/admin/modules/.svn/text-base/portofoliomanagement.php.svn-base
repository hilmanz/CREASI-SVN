<?php
class portofoliomanagement extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->portofolioHelper = $this->useHelper("portofolioHelper");
		 
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));	

			//$this->user=$this->session->getSession($this->config['SESSION_NAME'],"ADMIN");
	}

	 
	function main(){
		$listjob = $this->portofolioHelper->listportofolio();
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
			return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/portofoliomanagement.html');
		}
	}
	function publish(){
		global $LOCALE,$CONFIG; 
		$idjob = $this->_g('id');
		$publish= $this->portofolioHelper->publish();
		
		if($publish['status']==1)
		{
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
	function callsheader(){
		 global $LOCALE,$CONFIG; 
		$result=$this->portofolioHelper->downloadpeserta();
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
			echo "<td>CT Name</td>";
			echo "<td>Title</td>";
			echo "<td>Type</td>";
			echo "<td>Portofolio</td>";
			
			echo "<td>Date</td>";
			
		echo "</tr>";
		$no=0;
		if($result['data'])
		{
		
		
			foreach ($result['data'] as $key => $val){
			$no++;
			
				echo "<tr>";
					echo "<td>$no</td>";
				
					echo "<td>$val[nickname]</td>";
					echo "<td>$val[title]</td>";
					if($val['type']==1)
					{
						echo "<td>Picture</td>";
						echo "<td>{$CONFIG['BASE_DOMAIN_PATH']}public_assets/portofolio/{$val['images']}</td>";
					}
					else if($val['type']==2)
					{
						echo "<td>video</td>";
						if($val['refrance']=='youtube')
						{
							echo "<td>https://www.youtube.com/watch?v={$val['video_url']}</td>";
						}
						else
						{
							echo "<td>http://player.vimeo.com/video/{$val['video_url']}</td>";
						}
						
					}	
					else if($val['type']==3)
					{
						echo "<td>audio</td>";
						echo "<td>$val[audio]</td>";
					}
					
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