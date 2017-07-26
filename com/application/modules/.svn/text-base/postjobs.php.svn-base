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
	//	pr($sessiontempfile->file);
		$sessiontempfiles=array();
		if($sessiontempfile)
		{
			//$sessiontempfiles['file']=$sessiontempfile->file;
			foreach($sessiontempfile->file  as $row)
			{
				$sessiontempfiles['file'][]=$row;
			}
		}
			// pr($sessiontempfiles);die;
		// pr($this->session->getSession($CONFIG['SESSION_NAME'],"jobposttmp"));die;
		$this->assign('provincy', $provincy);
		$this->assign('category', $category);
		$this->assign('uid', @$this->user->id);
		$this->assign('sessiontemp', $sessiontemp);
		$this->assign('sessiontempfile', @$sessiontempfiles['file']);
		// pr($category);die;
	
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
					
					sendRedirect($CONFIG['BASE_DOMAIN']."postjobs/thanksjobsafterlogin");
					return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
					//sendRedirect($CONFIG['BASE_DOMAIN']."jobboard");exit;
				}
			//$listjob = $this->jobHelper->addjob();
			}else 
			{
				$myfile = $_FILES['myfile'];
				$jumlahHalaman = count($myfile['name']);
				//$datafile=array();
				$datafile='';
				for($i=0;$i<=$jumlahHalaman-1;$i++)
				{
					$img['name']=@$myfile['name'][$i];
					$img['type']=@$myfile['type'][$i];
					$img['tmp_name']=@$myfile['tmp_name'][$i];
					$img['error']=@$myfile['error'][$i];
					$img['size']=@$myfile['size'][$i];
					
					if(@$img['type'] != '' || @$img['name'] != '' )
					{
						//pr($myfile);exit;
						$path = $CONFIG['LOCAL_PUBLIC_ASSET']."postjob/";
						$uploadnews = $this->uploadHelper->uploadThisFile($img,$path);
						
						$filenamenya=$uploadnews['arrFile']['filename'];
						$datafile['file'][$i]['name']=@$filenamenya;
						$datafile['file'][$i]['type']=$img['type'];
					}
					
				}
			
				if(isset($_POST['imagessementara'][0]))
				{
					$counttemp=count($_POST['imagessementara']);
					for($j=0;$j<=$counttemp-1;$j++)
					{
						$i++;
						$datafile['file'][$i]['name']=@$_POST['imagessementara'][$j];
						$datafile['file'][$i]['type']=$_POST['typeimagessementara'][$j];
					}
				}
				
				
				$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmp",$_POST);
				$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmpfile",$datafile);
				flush();
				sendRedirect($CONFIG['BASE_DOMAIN']."login");
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
				 sendRedirect($CONFIG['BASE_DOMAIN']."dashboard");exit;
				//sendRedirect($CONFIG['BASE_DOMAIN']."postjobs/thanksjobs");
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
	//pr($draftjobs);
	$userlize= unserialize($draftjobs['result'][0]['file']);
	$jumlahserliaze=count($userlize['file']);
	
	$this->assign('provincy', $provincy);
	$this->assign('category', $category);
	$this->assign('uid', $this->user->id);
	$this->assign('subcategory',$draftjobs['result'][0]['subcategory_id']);
	$this->assign('city',$draftjobs['result'][0]['city']);
	$this->assign('load', $draftjobs['result']);
	$this->assign('load', $draftjobs['result']);
	$this->assign('userlize', $userlize);
	$lookingarray=array();
	if($draftjobs['checklist'])
	{
	foreach($draftjobs['checklist'] as $key=>$val)
	{
		$lookingarray[]=$val['looking_for'];
	
	}
	}
	// pr($draftjobs);
	//pr($_POST);exit;
	$this->assign('checklist', $lookingarray);
	if(@$_POST['postnya']==1)
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
						
						if(@$img['name'] != ''||@$img['type'] != '')
						{
							//pr($myfile);exit;
							$path = $CONFIG['LOCAL_PUBLIC_ASSET']."postjob/";
							$uploadnews = $this->uploadHelper->uploadThisFile($img,$path);
							
							$filenamenya=$uploadnews['arrFile']['filename'];
							$datafile['file'][$i+$jumlahserliaze]['name']=$filenamenya;
							$datafile['file'][$i+$jumlahserliaze]['type']=$img['type'];
						}
						
					}
					
					if(isset($_POST['imagessementara'][0]))
					{
						$counttemp=count($_POST['imagessementara']);
						for($j=0;$j<=$counttemp-1;$j++)
						{
							$i++;
							$datafile['file'][$i+$jumlahserliaze]['name']=@$_POST['imagessementara'][$j];
							$datafile['file'][$i+$jumlahserliaze]['type']=$_POST['typeimagessementara'][$j];
						}
					}
					
					
					$filenamenya=serialize($datafile);
			
				$listjob = $this->jobHelper->upsaddjob($this->user->id,$filenamenya);
			}else{
				if(isset($_POST['imagessementara'][0]))
					{
						$counttemp=count($_POST['imagessementara']);
						for($j=0;$j<=$counttemp-1;$j++)
						{
							
							$datafile['file'][$j]['name']=@$_POST['imagessementara'][$j];
							$datafile['file'][$j]['type']=$_POST['typeimagessementara'][$j];
						}
					}
					
				$filenamenya=serialize($datafile);
				$listjob = $this->jobHelper->upsaddjob($this->user->id,$filenamenya);
			}
			
			
			if ($listjob)
			{
			$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmp","");
			$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmpfile","");
				sendRedirect($CONFIG['BASE_DOMAIN']."postjobs/thanksjobs");
					return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
			}
			//$listjob = $this->jobHelper->addjob();
			}else 
			{
					
				
				
				
				$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmp",$_POST);
				$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmpfile",$datafile);
				flush();
				sendRedirect($CONFIG['BASE_DOMAIN']."postjobs/thanksjobs");
				return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
				// echo "<script>alert('Anda Belum Login Silahkan Login Terlebih dahulu');</script>";
				// sendRedirect($CONFIG['BASE_DOMAIN']."logincompany");exit;
			
			
			}
			
		
		}else if(@$_POST['saveasdraft']==1)
		{
		//pr($_FILES);exit;
			if($this->user)
			{
			$myfile = $_FILES['myfile'];
				$datafile='';
			if($myfile['name'][0])
			{	
					$jumlahHalaman = count($myfile['name']);
					$datafile=array();
					$x=0;
					
					for($i=0;$i<=$jumlahHalaman-1;$i++)
					{
						$img['name']=@$myfile['name'][$i];
						$img['type']=@$myfile['type'][$i];
						$img['tmp_name']=@$myfile['tmp_name'][$i];
						$img['error']=@$myfile['error'][$i];
						$img['size']=@$myfile['size'][$i];
						
						if(@$img['name'] != ''||@$img['type'] != '')
						{
							//pr($myfile);exit;
							
							$path = $CONFIG['LOCAL_PUBLIC_ASSET']."postjob/";
							$uploadnews = $this->uploadHelper->uploadThisFile($img,$path);
							
							$filenamenya=$uploadnews['arrFile']['filename'];
							$datafile['file'][$x]['name']=$filenamenya;
							$datafile['file'][$x]['type']=$img['type'];
							$x++;
						}
						
					}
					if(isset($_POST['imagessementara'][0]))
					{
						$counttemp=count($_POST['imagessementara']);
						
						for($j=0;$j<=$counttemp-1;$j++)
						{
							
							$datafile['file'][$x]['name']=@$_POST['imagessementara'][$j];
							$datafile['file'][$x]['type']=$_POST['typeimagessementara'][$j];
						}
					}
					
					
					$filenamenya=serialize($datafile);
			// pr($filenamenya);die;
				$listjob = $this->jobHelper->upaddjob($this->user->id,$filenamenya);
			}else{
				if(isset($_POST['imagessementara'][0]))
					{
						$counttemp=count($_POST['imagessementara']);
						for($j=0;$j<=$counttemp-1;$j++)
						{
							
							$datafile['file'][$j]['name']=@$_POST['imagessementara'][$j];
							$datafile['file'][$j]['type']=$_POST['typeimagessementara'][$j];
						}
					}
				// pr($datafile);die;
				$filenamenya=serialize($datafile);
				$listjob = $this->jobHelper->upaddjob($this->user->id,$filenamenya);
			}
			
			if ($listjob)
			{
				$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmp","");
				$this->session->setSession($CONFIG['SESSION_NAME'],"jobposttmpfile","");
				// echo "<script>alert('Success Saving Draft');</script>";
				 sendRedirect($CONFIG['BASE_DOMAIN']."dashboard");exit;
				//sendRedirect($CONFIG['BASE_DOMAIN']."postjobs/thanksjobs");
				return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
				die();
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
		$this->assign('msg', $LOCALE[1]['alert']['postjobs']['afterlogins']);
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/thanksjobs.html');
		
	}
	function deletejob(){
		global $LOCALE,$CONFIG; 
		$ajax =$this->_REQUEST('id');
		//pr($ajax);exit;
		$deletedraft =$this->jobHelper->deletedraft($ajax);
		if($ajax)
		{
					sendRedirect($CONFIG['BASE_DOMAIN']."dashboard");exit;
					die();
		}
	
		
	}
	function thanksjobsafterlogin(){
		global $LOCALE,$CONFIG; 
		$this->assign('msg', $LOCALE[1]['alert']['postjobs']['afterlogins']);
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/thanksjobs.html');
		
	}
	}
?>