<?php
class deactive extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->dashboardHelper = $this->useHelper("dashboardHelper");
		$this->registerHelper = $this->useHelper("registerHelper");
		$this->mathcaptchaHelper = $this->useHelper("mathcaptchaHelper");
		$this->contentHelper = $this->useHelper("contentHelper");
		$this->user=$this->session->getSession($this->config['SESSION_NAME'],"WEB");
		$this->assign('roleidnya',@$this->user->role);
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('pages',  strip_tags($this->_g('page')));
		$this->assign('act',  strip_tags($this->_g('act')));
		if (@$this->user->role == 1) {
				$this->assign('rolenya','Creative Talent');
			}
		else
			{
				$this->assign('rolenya','Talent Seeker');
			}
		
	}

	 
	function main(){
		global $LOCALE,$CONFIG; 
		if($this->user=='')
		{
			sendRedirect($CONFIG['BASE_DOMAIN']."home");
			return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
			die();
		}
		$time['time'] = '%H:%M:%S';
		
		if($this->_p('submit'))
		{

			$explain=$this->_p('explain');
			$explain_no='';
			$reason=$this->_p('reason');
			$reason_no='';
			
			$pessan_erorr='';
			if($explain=='')
			{
				$explain_no='explain kosong';
				$pessan_erorr='ada';
			}
			if($reason=='')
			{
				$reason_no='reason kosong';
				$pessan_erorr='ada';
			}
						//echo $captcha.'!='. $this->session->getSession($CONFIG['SESSION_NAME'],"kodeCapcahMath");
			if($pessan_erorr)
			{
				if($this->_p('ajax'))
				{
					$result['explain']= $explain;
					$result['explain_no']= $explain_no;
					$result['reason']= $reason;
					$result['reason_no']= $reason_no;
					
					$result['status']=2;
					print json_encode($result);die;

				}

				$this->assign('explain', $explain);
				$this->assign('explain_no', $explain_no);
				$this->assign('reason', $reason);
				$this->assign('reason_no', $reason_no);
				
			 

				
			}
			
			$res=$this->dashboardHelper->deactivets();
		
			$this->contentHelper->senddeactiveMail($this->user->id);
			if($res)
			{
				if($this->_p('ajax'))
				{
					$result['status']=1;
					$result['msg']='proses berhasil';
					print json_encode($result);die;
				}
				$this->assign('msg', 'Proses berhasil');
				sendRedirect("{$CONFIG['BASE_DOMAIN']}logout.php");
				return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
				die();
			}
			else
			{
				$this->assign('msg', 'Proses gagal');
			}
			
			//$this->assign('msg', 'Proses berhasil');
				
			
		}
		if($this->user->role==2)
		{
		$notibar = $this->dashboardHelper->notibar($id=2);
		}else{
		$notibar = $this->dashboardHelper->notibar($id=1);
		}
		
		$this->assign('notifikasibar',$notibar[0]['info']);
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/deactive_ts.html');
	
		
	
	
	
	
	
	
	}
	// function activation(){
			// global $LOCALE,$CONFIG; 
		// $result = $this->registerHelper->activation();
		// pr($result);
		// if($result);
		// {
			
			// $result= $this->contentHelper->sendactiveagainMail();
			// sendRedirect($CONFIG['BASE_DOMAIN']."login");
			// return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
		// }
		
	// }
	function activation(){
			global $LOCALE,$CONFIG; 
		// $result = $this->registerHelper->activation();
		// if($result);
		// {
			
			$result= $this->contentHelper->sendaktivasiendMail();
			sendRedirect($CONFIG['BASE_DOMAIN']."login");
			return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
		// } 
		
	}
	}
?>