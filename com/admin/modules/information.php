<?php
class information extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->informationHelper = $this->useHelper("informationHelper");
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
			$infonya=$this->informationHelper->listinfo();
			//pr($infonya);exit;
			$this->assign('list', $infonya['result']);
			return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/information.html');
		
		}
	function editinformation(){
			global $CONFIG;
			$id=intval($this->_request('id'));
			//pr($id);exit;
			if(isset($_POST['id']))
			{
			$updatedata=$this->informationHelper->updatedata();
			if($updatedata)
			{
			
				sendRedirect($CONFIG['ADMIN_DOMAIN']."information");
			}
			}
			$selectdata=$this->informationHelper->selectdata($id);
			//pr($selectdata);exit;
			$this->assign('list', $selectdata);
			return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/edit_information.html');
		
		}	
		
			
			
	}
?>