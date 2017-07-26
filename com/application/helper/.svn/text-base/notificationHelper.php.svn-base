<?php
class notificationHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	

	function inbox(){
	//pr('ss');exit;
			$usertonya="imam";
		
			$query="select *,DATE_FORMAT(created_date,'%H:%i %p') as timess ,DATE_FORMAT(created_date,'%d %M') as date,DATEDIFF(CURRENT_DATE(),created_date) as selisihhari from tbl_notification
			where `user_id`='{$this->apps->user->id}'  AND DATEDIFF(CURRENT_DATE(),created_date)<=7
			
			ORDER BY created_date DESC";
			$get_pesan= $this->apps->fetch($query,1);
			// pr($get_pesan);die;
			$tmpselisih='';
			$kes='';
			$data=array();
			$i=0;
			if($get_pesan)
			{
				foreach($get_pesan as $key=>$row)
				{
					if($tmpselisih!=$row['selisihhari'])
					{
						$tmpselisih=$row['selisihhari'];
						if($tmpselisih==0)
						{
							$kes='TODAY';
							$i++;
							if($i==1)
							{
								$i=0;
							}
									
						}
						elseif($tmpselisih==1)
						{
						
							$kes='Yesterday';
								$i++;	
						}
						else
						{
						
							$kes=$row['date'];
							
							$i++;	
						}
						$data[$i]['tanggal']=$kes;
						$data[$i][]=$row;
						
					
					}
					else
					{
						
						$data[$i]['tanggal']=$kes;
						$data[$i][]=$row;
					
					}
					
				}
			}
				// pr($data);die;
			return $data; 
			//pr($get_pesan);exit;
		}	
	function selectdata(){
	//pr('ss');exit;
			$inactive=@$_POST['incative'];
			if($inactive)
			{
			$idnya=$_POST['idnya'];
			$update_status="update my_notification set `n_status`='1' where `id`='{$idnya}' limit 1";
			$this->apps->query($update_status);
			$query="select * from my_notification where `id`='{$idnya}' limit 1";
			$get_pesan= $this->apps->fetch($query,1);
			}else{
			$idnya=$_POST['idnya'];
			$query="select *,DATE_FORMAT(created_date,'%d/%m/%Y %h:%i %p') as date from my_notification where `id`='{$idnya}' limit 1";
			$get_pesan= $this->apps->fetch($query,1);
			
			}
			return $get_pesan; 
			//pr($get_pesan);exit;
		}	
	function read(){
			$id=@$_POST['id'];
			$update_status="update tbl_notification set `n_status`='0' where `id`='{$id}'";
			// pr($update_status);
			$this->apps->query($update_status);
	}
}
	