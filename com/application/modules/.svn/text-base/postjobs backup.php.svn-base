<?php
class postjobs extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->jobHelper = $this->useHelper("jobHelper");
		$this->uploadHelper = $this->useHelper("uploadHelper");
		$this->categoryHelper = $this->useHelper("categoryHelper");
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->user=$this->session->getSession($this->config['SESSION_NAME'],"WEB");
		
	}

	 
	function main(){
		//pr($this->user);exit;
		global $LOCALE,$CONFIG; 
		// session_destroy();
		//pr($this->user);exit;
		$provincy =$this->jobHelper->province();
		$category = $this->categoryHelper->listcategory();
		$sessiontemp = @$this->session->getSession($CONFIG['SESSION_NAME'],"jobposttmp");
		$sessiontempfile = @$this->session->getSession($CONFIG['SESSION_NAME'],"jobposttmpfile");
		
		$this->assign('provincy', $provincy);
		$this->assign('category', $category);
		$this->assign('uid', @$this->user->id);
		$this->assign('sessiontemp', $sessiontemp);
		$this->assign('sessiontempfile', @$sessiontempfile->file);
		// pr($_POST);
		if(@$_POST['postnya']==1)
		{
			
			// pr($_POST['postnya']);die;
			
			if($this->user)
			{
				$myfile = $_FILES['myfile'];
				$datafile='';
				if($myfile['name'][0])
				{	
					$jumlahHalaman = count($myfile['name']);
					$datafile=array();
					for($i=0;$i<=$jumlahHalaman-1;$i++)
					{
						$img['name']=@$myfile['name'][$i];
						$img['type']=@$myfile['type'][$i];
						$img['tmp_name']=@$myfile['tmp_name'][$i];
						$img['error']=@$myfile['error'][$i];
						$img['size']=@$myfile['size'][$i];
						
						if(@$img['name'] != '')
						{
							//pr($myfile);exit;
							$path = $CONFIG['LOCAL_PUBLIC_ASSET']."postjob/";
							$uploadnews = $this->uploadHelper->uploadThisFile($img,$path);
							
							$filenamenya=$uploadnews['arrFile']['filename'];
						}
						$datafile['file'][$i]['name']=$filenamenya;
						$datafile['file'][$i]['type']=$img['type'];
					}
					
					$filenamenya=serialize($datafile);
				}
				elseif($sessiontempfile)
				{
					$datafile=(array) $sessiontempfile;
					
					$filenamenya=serialize($datafile);
				}
				else
				{
					$datafile='';
					$filenamenya='';
				}
		
			$listjob = $this->jobHelper->addjob($this->user->id,$filenamenya);
			
			
				if ($listjob)
				{
					//echo "<script>alert('Success');</script>";
					$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmp","");
					$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmpfile","");
					sendRedirect($CONFIG['BASE_DOMAIN']."postjobs/thanksjobs");
					return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
					//sendRedirect($CONFIG['BASE_DOMAIN']."jobboard");exit;
				}
			//$listjob = $this->jobHelper->addjob();
			}else 
			{
				$myfile = $_FILES['myfile'];
				$jumlahHalaman = count($myfile['name']);
				$datafile=array();
				for($i=0;$i<=$jumlahHalaman-1;$i++)
				{
					$img['name']=@$myfile['name'][$i];
					$img['type']=@$myfile['type'][$i];
					$img['tmp_name']=@$myfile['tmp_name'][$i];
					$img['error']=@$myfile['error'][$i];
					$img['size']=@$myfile['size'][$i];
					
					if(@$img['name'] != '')
					{
						//pr($myfile);exit;
						$path = $CONFIG['LOCAL_PUBLIC_ASSET']."postjob/";
						$uploadnews = $this->uploadHelper->uploadThisFile($img,$path);
						
						$filenamenya=$uploadnews['arrFile']['filename'];
					}
					$datafile['file'][$i]['name']=@$filenamenya;
					$datafile['file'][$i]['type']=$img['type'];
				}
			
				
				
				
				$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmp",$_POST);
				$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmpfile",$datafile);
				flush();
				sendRedirect($CONFIG['BASE_DOMAIN']."postjobs/thanksjobs");
				return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
				// echo "<script>alert('Anda Belum Login Silahkan Login Terlebih dahulu');</script>";
				// sendRedirect($CONFIG['BASE_DOMAIN']."logincompany");exit;
			
			}
			
		
		}
		else if(@$_POST['saveasdraft']==1)
		{
			// echo"sss";
			// pr($_POST['postnya']);die;
			// pr($_POST['saveasdraft']);die;
			if($this->user)
			{
				$myfile = $_FILES['myfile'];
				$datafile='';
				if($myfile['name'][0])
				{	
					$jumlahHalaman = count($myfile['name']);
					$datafile=array();
					for($i=0;$i<=$jumlahHalaman-1;$i++)
					{
						$img['name']=@$myfile['name'][$i];
						$img['type']=@$myfile['type'][$i];
						$img['tmp_name']=@$myfile['tmp_name'][$i];
						$img['error']=@$myfile['error'][$i];
						$img['size']=@$myfile['size'][$i];
						
						if(@$img['name'] != '')
						{
							//pr($myfile);exit;
							$path = $CONFIG['LOCAL_PUBLIC_ASSET']."postjob/";
							$uploadnews = $this->uploadHelper->uploadThisFile($img,$path);
							
							$filenamenya=$uploadnews['arrFile']['filename'];
						}
						$datafile['file'][$i]['name']=$filenamenya;
						$datafile['file'][$i]['type']=$img['type'];
					}
					$filenamenya=serialize($datafile);
				}
				
				else
				{
					$datafile='';
					$filenamenya='';
				}
			
			$listjob = $this->jobHelper->draftjob($this->user->id,$filenamenya);
			if ($listjob)
			{
				$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmp","");
				$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmpfile","");
				// echo "<script>alert('Success Saving Draft');</script>";
				// sendRedirect($CONFIG['BASE_DOMAIN']."dashboard");exit;
				sendRedirect($CONFIG['BASE_DOMAIN']."postjobs/thanksjobs");
				return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
			}
			//$listjob = $this->jobHelper->addjob();
			}
		
		}
		
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/post.html');
	
		
	}
	
	function draftjobs(){
	
	$draftjobs =$this->jobHelper->listdraft($start=null,$limit=16,$this->user->id);
//	pr($draftjobs);exit;

	$this->assign('load', $draftjobs['result']);
	$this->assign('total', $draftjobs['total']);
	
	return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/draftjob.html');
	
	}
	function editdraft(){
	
	global $LOCALE,$CONFIG; 
	//pr($this->user);exit;
	$provincy =$this->jobHelper->province();
	$category = $this->categoryHelper->listcategory();
	$draftjobs =$this->jobHelper->listdraft($start=null,$limit=16,$this->user->id);
	// pr($draftjobs);
	$userlize= unserialize($draftjobs['result'][0]['file']);
	$jumlahserliaze=count($userlize['file']);
	// pr($userlize);
	$this->assign('provincy', $provincy);
	$this->assign('category', $category);
	$this->assign('uid', $this->user->id);
	$this->assign('subcategory',$draftjobs['result'][0]['subcategory_id']);
	$this->assign('city',$draftjobs['result'][0]['city']);
	$this->assign('load', $draftjobs['result']);
	$this->assign('load', $draftjobs['result']);
	$this->assign('userlize', $userlize);
	$lookingarray=array();
	foreach($draftjobs['checklist'] as $key=>$val)
	{
		$lookingarray[]=$val['looking_for'];
	
	}
	// pr($lookingarray);exit;
	$this->assign('checklist', $lookingarray);
		if(isset($_POST['postnya']))
		{
		
			if($this->user)
			{
			
			$myfile = $_FILES['myfile'];
				$datafile='';
			if($myfile['name'][0])
			{	
					$jumlahHalaman = count($myfile['name']);
					$datafile=array();
					if($userlize)
					{
						$datafile=$userlize;
					
					}
					
					for($i=0;$i<=$jumlahHalaman-1;$i++)
					{
						$img['name']=@$myfile['name'][$i];
						$img['type']=@$myfile['type'][$i];
						$img['tmp_name']=@$myfile['tmp_name'][$i];
						$img['error']=@$myfile['error'][$i];
						$img['size']=@$myfile['size'][$i];
						
						if(@$img['name'] != '')
						{
							//pr($myfile);exit;
							$path = $CONFIG['LOCAL_PUBLIC_ASSET']."postjob/";
							$uploadnews = $this->uploadHelper->uploadThisFile($img,$path);
							
							$filenamenya=$uploadnews['arrFile']['filename'];
						}
						$datafile['file'][$i+$jumlahserliaze]['name']=$filenamenya;
						$datafile['file'][$i+$jumlahserliaze]['type']=$img['type'];
					}
					// pr($datafile);die;
					$filenamenya=serialize($datafile);
			
				$listjob = $this->jobHelper->upsaddjob($this->user->id,$filenamenya);
			}else{
				$filenamenya=serialize($userlize);
				$listjob = $this->jobHelper->upsaddjob($this->user->id,$filenamenya);
			}
			
			
			if ($listjob)
			{
			echo "<script>alert('Thank you Your Post Success, wait For the confirmation');</script>";
			}
			//$listjob = $this->jobHelper->addjob();
			}else 
			{
				echo "<script>alert('Thank you. You must login to your account in order to continue. After logging in, your job post will be moderated and than published. It will usually take a few minutes. Once published, we will notify you through email');</script>";
			
			
			}
			
		
		}else if(isset($_POST['saveasdraft']))
		{
		
			if($this->user)
			{
			$myfile = $_FILES['myfile'];
		
			if($_FILES['myfile']['name'] != '')
			{
			$path = $CONFIG['LOCAL_PUBLIC_ASSET']."postjob/";
			$uploadnews = $this->uploadHelper->uploadThisImage($myfile,$path,1000,false,false);
			//pr($uploadnews['arrFile']['filename']);exit;
			$filenamenya=$uploadnews['arrImage']['filename'];
			$listjob = $this->jobHelper->upaddjob($this->user->id,$filenamenya);
			}else{
			$filenamenya=$this->_p('filelama');
			$listjob = $this->jobHelper->upaddjob($this->user->id,$filenamenya);
			}
			if ($listjob)
			{
			echo "<script>alert('Success Saving Draft');</script>";
			sendRedirect($CONFIG['BASE_DOMAIN']."dashboard");exit;
			}
			//$listjob = $this->jobHelper->addjob();
			}
		
		}
		
		
	return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/editpost.html');
	
	}
	function ajaxcity(){
		
		$provincy =$this->jobHelper->city();
		if($provincy)
		{
			print_r(json_encode(array('status'=>1,'msg'=>'succses get city','data'=>$provincy)));die;
		}
		
		print_r(json_encode(array('status'=>0,'msg'=>'problem get city','data'=>$provincy)));die;
	
		
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
	function thanksjobs(){
		global $LOCALE,$CONFIG; 
		$this->assign('msg', $LOCALE[1]['alert']['postjobs']['beforelogin']);
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/thanksjobs.html');
		
	}
	}
?>