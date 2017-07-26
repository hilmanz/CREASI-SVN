<?php
class report extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->reportHelper = $this->useHelper("reportHelper");
		$this->emailnotifHelper = $this->useHelper("emailnotifHelper");
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));	

			//$this->user=$this->session->getSession($this->config['SESSION_NAME'],"ADMIN");
	}

	 
	function main(){
	
			global $CONFIG;
			$infonya=$this->reportHelper->listreport();
			// pr($infonya);exit;
			if($this->_p('ajax'))
			{
				print json_encode($infonya);die;
			
			}
			$this->assign('list', $infonya['result']);
			$this->assign('total', $infonya['total']);
			return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/report.html');
		
		}
	function editinformation(){
			global $CONFIG;
			$id=intval($this->_request('id'));
			//pr($id);exit;
			if(isset($_POST['id']))
			{
			$updatedata=$this->reportHelper->updatedata();
			if($updatedata)
			{
			
				sendRedirect($CONFIG['ADMIN_DOMAIN']."information");
			}
			}
			$selectdata=$this->reportHelper->selectdata($id);
			//pr($selectdata);exit;
			$this->assign('list', $selectdata);
			return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/edit_information.html');
		
		}	
		
			
			

	
	}
?>