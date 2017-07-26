<?php
class personal extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->personalHelper = $this->useHelper("personalHelper");
		$this->dashboardHelper = $this->useHelper("dashboardHelper");
		$this->uploadHelper = $this->useHelper("uploadHelper");
		$this->categoryHelper = $this->useHelper("categoryHelper");
		$this->galleryHelper = $this->useHelper("galleryHelper");
		$this->viewcountHelper = $this->useHelper("viewcountHelper");
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->user=$this->session->getSession($this->config['SESSION_NAME'],"WEB");

		function encrypt($string)
		{	
		$ENC_KEY='youknowwho2014';
		return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($ENC_KEY), $string, MCRYPT_MODE_CBC, md5(md5($ENC_KEY))));
		}
		function decrypt($encrypted)
		{
		$ENC_KEY='youknowwho2014';
		return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($ENC_KEY), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($ENC_KEY))), "\0");
		}
	}

	 
	function main(){
		//pr($this->session->getSession($this->config['SESSION_NAME'],"WEB"));die;
		
		// echo"aaa";die;
		//pr($this->user->id);exit;
		$notibar = $this->dashboardHelper->notibar($id=4);
		$this->assign('notifikasibar',$notibar[0]['info']);
		$time['time'] = '%H:%M:%S';
		$listpersonal = $this->personalHelper->listpersonal($this->user->id);
		//pr($listpersonal);exit;
		$selectupdatedata = $this->galleryHelper->selectupdatedata($this->user->id);
		$listvideo = $this->galleryHelper->getportofolio($this->user->id,$type=2);
		$listaudio = $this->galleryHelper->getportofolio($this->user->id,$type=3);
		$selectmyeducation = $this->personalHelper->selectmyeducation($this->user->id);
		//pr($selectupdatedata);exit;
		if($selectupdatedata)
		{
		$this->assign('images',$selectupdatedata); 
		}	
		$this->assign('listvideo',$listvideo); 
		$this->assign('listaudio',$listaudio); 
		
		
		$selectcategory = $this->personalHelper->selectcategory($this->user->id);
		$selectcategorydetail = $this->personalHelper->selectcategorydetail($this->user->id);
		$category = $this->categoryHelper->listcategory();
		$selectlike = $this->personalHelper->selectlike($this->user->id);
		//pr($selectlike);exit;
		
		//$selectexperience = $this->personalHelper->selectexperience($this->user->id);
		//pr($selectexperience);exit;
		// $this->assign('cat_name', $selectcategory[0]['category_name']);
		// $this->assign('name_subcategory', $selectcategory[0]['name_subcategory']);
		$this->assign('selectlike', $selectlike);
		$this->assign('listcategory', $category);
		$this->assign('listcategory', $category);
		$this->assign('selectcategory', $selectcategory['result']);
		$this->assign('selectcategorydetail', $selectcategorydetail['result']);
		//$this->assign('selectexperience', $selectexperience);
		//pr($listpersonal['ultah']);exit;
		$this->assign('listmyedu',$selectmyeducation); 
		$this->assign('id', $this->user->id);
		$this->assign('list', $listpersonal['datadiri']);
		$this->assign('load', $listpersonal['guardian']);
		$this->assign('ultah', $listpersonal['ultah']);
		//$this->assign('listadmin', $listpersonaladmin);
		
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/profile.html');
		
		
	}
	function view_profilets(){
		//pr($this->session->getSession($this->config['SESSION_NAME'],"WEB"));die;
		
		// echo"aaa";die;
		//pr($this->user->id);exit;
		$id = intval($this->_request('id'));
		$time['time'] = '%H:%M:%S';
		$listpersonal = $this->personalHelper->listpersonalts($id);
	//	pr($listpersonal);exit;
		$provincy =$this->personalHelper->province();
		$this->assign('uid',$listpersonal['datadiri'][0]['user_id']);
		$this->assign('provincy', $provincy);
		
		
		
		$this->assign('list', $listpersonal['datadiri']);
		$this->assign('load', $listpersonal['guardian']);
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/ts-profile-friend.html');
		
		
		}
	function personalts(){
		//pr($this->session->getSession($this->config['SESSION_NAME'],"WEB"));die;
		
		// echo"aaa";die;
		//pr($this->user->id);exit;
		$time['time'] = '%H:%M:%S';
		$listpersonal = $this->personalHelper->listpersonalts($this->user->id);
	//	pr($listpersonal);exit;
		$provincy =$this->personalHelper->province();
		$this->assign('uid',$listpersonal['datadiri'][0]['user_id']);
		$this->assign('provincy', $provincy);
		
		
		
		$this->assign('list', $listpersonal['datadiri']);
		$this->assign('load', $listpersonal['guardian']);
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/ts-profile.html');
		
		
		}
	function editpersonalts(){
		$time['time'] = '%H:%M:%S';
		$listpersonal = $this->personalHelper->listpersonalts($this->user->id);
		//pr($listpersonal);exit;
		$provincy =$this->personalHelper->province();
		$this->assign('uid',$listpersonal['datadiri'][0]['user_id']);
		$this->assign('provincy', $provincy);
		if(isset($_POST['bioinput']))
		{
			$editbioinput = $this->personalHelper->editbiopersonalts();
			//pr($_POST);exit;
		
	
			$name = $_POST['name'];
			$lastname = $_POST['lastname'];
			$provincy = $_POST['provincy'];
			$city = $_POST['city'];
			$fb = $_POST['fb'];
			$twitter = $_POST['twitter'];
			$youtube = $_POST['youtube'];
			$instagram = $_POST['instagram'];
		
			
			if($editbioinput == true){
			print json_encode(array('status'=>true,'name'=>$name,'lastname'=>$lastname,'provincy'=>$provincy,'city'=>$city,'fb'=>$fb
									,'twitter'=>$twitter,'youtube'=>$youtube,'instagram'=>$instagram)); exit;
			}
		}
		if(isset($_POST['companyinf']))
		{
			//pr($_POST);exit;
			$companyinf = $this->personalHelper->companyinfo();
			
			if($companyinf == true){
			print json_encode(array('status'=>true)); exit;
			}
		}
		if(isset($_POST['whyjoinuss']))
		{
			//pr($_POST);exit;
			$whyjoinuss = $this->personalHelper->whyjoinuss();
			
			if($whyjoinuss == true){
			print json_encode(array('status'=>true)); exit;
			}
		}
		$this->assign('list', $listpersonal['datadiri']);
		$this->assign('load', $listpersonal['guardian']);
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/ts_profile_edit.html');
	
	
	}
		
	function view()
	{
	//pr('ss');exit;
		global $LOCALE,$CONFIG;
		$id = intval($this->_request('id'));
		$this->viewcountHelper->personalviewcount();
		$uid= @$this->user->id;
		//pr($id);exit;
	    $listpersonal = $this->personalHelper->listpersonal($id);
		//pr($listpersonal);exit;
		
		
		$selectupdatedata = $this->galleryHelper->selectupdatedata($id);
		$selectmyeducation = $this->personalHelper->selectmyeducation($id);
		//pr($selectupdatedata);exit;
		$listvideo = $this->galleryHelper->getportofolio($id,$type=2);
		$listaudio = $this->galleryHelper->getportofolio($id,$type=3);
		$selectmyeducation = $this->personalHelper->selectmyeducation($id);
		//pr($selectupdatedata);exit;
		if($selectupdatedata)
		{
		$this->assign('images',$selectupdatedata); 
		}	
		$this->assign('listvideo',$listvideo); 
		$this->assign('listaudio',$listaudio); 

		$selectcategory = $this->personalHelper->selectcategory($id);
		$selectcategorydetail = $this->personalHelper->selectcategorydetail($id);
		//pr($selectcategory);exit;
		
		$selectexperience = $this->personalHelper->selectexperience($id);
		//pr($selectexperience);exit;
		$this->assign('cat_name', @$selectcategory[0]['category_name']);
		$this->assign('name_subcategory', @$selectcategory[0]['name_subcategory']);
	
		$this->assign('selectcategory', $selectcategory['result']);
		$this->assign('selectcategorydetail', $selectcategorydetail['result']);
		$this->assign('selectexperience', $selectexperience);
		//	$listpersonaladmin = $this->personalHelper->listpersonaladmin();
		//pr($this->user);exit;
		//pr($listpersonal[0]['id']);exit;
		
		//pr($data);exit;
		$uidlike=encrypt(@$this->user->id);
		$this->assign('listmyedu',$selectmyeducation); 
		$this->assign('id', @$this->user->id);
		$this->assign('uidlike', @$uidlike);
		$this->assign('list', $listpersonal['datadiri']);
		$this->assign('load', $listpersonal['guardian']);
		$this->assign('ultah', $listpersonal['ultah']);
		//$this->assign('listadmin', $listpersonaladmin);
		$listpersonal = $this->personalHelper->listfriend($id,$uid);

		// pr($listpersonal['datanya']);exit;
		//pr($listpersonal[0]['user_id']);exit;
		$this->assign('idnya', $id);
		$this->assign('id',@$this->user->id);
	
		
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/profile_friend.html');
	}
	
	function viewTS()
	{
		//pr('ss');exit;
		global $LOCALE,$CONFIG;
		$time['time'] = '%H:%M:%S';
		$listpersonal = $this->personalHelper->listpersonalts($this->user->id);
		//	pr($listpersonal);exit;
		$provincy =$this->personalHelper->province();
		$this->assign('uid',$listpersonal['datadiri'][0]['user_id']);
		$this->assign('provincy', $provincy);
		
		
		
		$this->assign('list', $listpersonal['datadiri']);
		$this->assign('load', $listpersonal['guardian']);
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/ts-profile.html');
		
		
		
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/profile_friend.html');
	}


	function portofolio()
	{
		global $LOCALE,$CONFIG;
		
		//pr($this->user->id);exit;
		$id = $this->_request('images');
		$uid = $this->user->id;
		
		if($this->_request('images'))
		{
		//pr($this->user);exit;
		$portoimages = $this->personalHelper->portoimages($id,$uid);
		//pr($portoimages);exit;
		$selectcomment = $this->personalHelper->selectcomment($portoimages[0]['id']);
		
		
		$this->assign('listcomment', $selectcomment);
		$this->assign('list', $portoimages);
		$this->assign('uid', $uid );
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/portofolio.html');
		}else if($this->_request('video'))
		{
			echo "video";
		}
		
		if(!isset($_POST['submit']))
		{
			$addportoimages = $this->personalHelper->addportoimages();	
				if($addportoimages)
						{
						print json_encode(array('status'=>true,'data'=>$addportoimages));
						}else{ 
						print json_encode(array('status'=>false));
						}
						exit;
		}
		
			
		
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/portofolio.html');
	}
	function addportofoliovideo()
	{
		global $LOCALE,$CONFIG;
		// pr($_POST);die;
		
		if(isset($_POST['uploadphoto']))
		{
			
			$jumlah=count($_POST['title']);
			for($i=0;$i<$jumlah;$i++)
			{
				if($_POST['title'][$i]!='')
					{
						$video_url = $_POST['url'][$i];
						$domain = parse_url($video_url);
							$match = strpos($video_url, 'youtube');
							if(strpos($video_url, 'youtube'))
							{
								
								preg_match(
										'/[\\?\\&]v=([^\\?\\&]+)/',
										$video_url,
										$matches
									);
									if($matches[1])
									{
										$id_video_youtube = $matches[1];
										$refrence='youtube';
									}
							}
							elseif(strpos($video_url, 'vimeo'))
							{
								preg_match(
										'/vimeo\.com\/([0-9]{1,10})/',
										$video_url,
										$matches
									);
									if($matches[1])
									{
										$id_video_youtube = $matches[1];
										$refrence='vimeo';
									}
							}
						
						$path = $CONFIG['LOCAL_PUBLIC_ASSET']."portofolio/";
						$img['name']=@$_FILES['foto']['name'][$i];
						$img['type']=@$_FILES['foto']['type'][$i];
						$img['tmp_name']=@$_FILES['foto']['tmp_name'][$i];
						$img['error']=@$_FILES['foto']['error'][$i];
						$img['size']=@$_FILES['foto']['size'][$i];
						$uploadnews = $this->uploadHelper->uploadThisImage($img,$path,1000,false,false);
						$this->Request->setParamPost('title_galery',$_POST['title'][$i]);
						$this->Request->setParamPost('desc_galery',$_POST['desc'][$i]);
						$this->Request->setParamPost('type',$_POST['type'][$i]);
						$this->Request->setParamPost('userid',$this->user->id);
						$this->Request->setParamPost('video',$id_video_youtube);
						$this->Request->setParamPost('refrance',$refrence);
						$this->Request->setParamPost('photo',$uploadnews['arrImage']['filename']);
						$this->Request->setParamPost('category',$_POST['category'][$i]);
						
						
						// pr($uploadnews);die;
						$addportoimages = $this->personalHelper->addportophoto();
						
					}
			}
			
			sendRedirect($CONFIG['BASE_DOMAIN']."personal");
			return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
		}
		
			
			
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/profile.html');die;
	}
	function addportofolioaudio()
	{
		global $LOCALE,$CONFIG;
		// pr($_POST);die;
		
		if(isset($_POST['uploadphoto']))
		{
			
			$jumlah=count($_POST['title']);
			for($i=0;$i<$jumlah;$i++)
			{
				if($_POST['title'][$i]!='')
					{
						$audio_url = $_POST['url'][$i];
					
						$path = $CONFIG['LOCAL_PUBLIC_ASSET']."portofolio/";
						$img['name']=@$_FILES['foto']['name'][$i];
						$img['type']=@$_FILES['foto']['type'][$i];
						$img['tmp_name']=@$_FILES['foto']['tmp_name'][$i];
						$img['error']=@$_FILES['foto']['error'][$i];
						$img['size']=@$_FILES['foto']['size'][$i];
						$uploadnews = $this->uploadHelper->uploadThisImage($img,$path,1000,false,false);
						$this->Request->setParamPost('title_galery',$_POST['title'][$i]);
						$this->Request->setParamPost('desc_galery',$_POST['desc'][$i]);
						$this->Request->setParamPost('type',$_POST['type'][$i]);
						$this->Request->setParamPost('userid',$this->user->id);
						$this->Request->setParamPost('audio',$audio_url);
						$this->Request->setParamPost('category',$_POST['category'][$i]);
						$this->Request->setParamPost('photo',$uploadnews['arrImage']['filename']);
						
						
						
						// pr($uploadnews);die;
						$addportoimages = $this->personalHelper->addportophoto();
						
					}
			}
			
			sendRedirect($CONFIG['BASE_DOMAIN']."personal");
			return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
		}
		
			
			
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/profile.html');die;
	}
	function addportofolioPhoto()
	{
		global $LOCALE,$CONFIG;
		// pr($_POST);die;
		
		if(isset($_POST['uploadphoto']))
		{
			
			$jumlah=count($_POST['title']);
			for($i=0;$i<$jumlah;$i++)
			{
				if($_POST['title'][$i]!='')
					{
						
						$path = $CONFIG['LOCAL_PUBLIC_ASSET']."portofolio/";
						$img['name']=@$_FILES['foto']['name'][$i];
						$img['type']=@$_FILES['foto']['type'][$i];
						$img['tmp_name']=@$_FILES['foto']['tmp_name'][$i];
						$img['error']=@$_FILES['foto']['error'][$i];
						$img['size']=@$_FILES['foto']['size'][$i];
						
						$uploadnews = $this->uploadHelper->uploadThisImage($img,$path,1000,false,false);
						$this->Request->setParamPost('title_galery',$_POST['title'][$i]);
						$this->Request->setParamPost('desc_galery',$_POST['desc'][$i]);
						$this->Request->setParamPost('type',$_POST['type'][$i]);
						$this->Request->setParamPost('category',$_POST['category'][$i]);
						$this->Request->setParamPost('userid',$this->user->id);
						$this->Request->setParamPost('photo',$uploadnews['arrImage']['filename']);
						
						
						
						// pr($uploadnews);die;
						$addportoimages = $this->personalHelper->addportophoto();
					
					}
			}
		
			sendRedirect($CONFIG['BASE_DOMAIN']."personal");
			return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
							die();
		}
		
			
			
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/profile.html');die;
	}
	function comment()
	{
		global $LOCALE,$CONFIG;
		if(!isset($_POST['submit']))
		{
			$addcomment = $this->personalHelper->addcomment();
				if($addcomment==true)
						{
						print json_encode(array('status'=>true));
						}else{ 
						print json_encode(array('status'=>false));
						}
						exit;
		}
		
		
	}
	
	function ajaxcity(){
		
		$provincy =$this->personalHelper->city();
		if($provincy)
		{
			print_r(json_encode(array('status'=>1,'msg'=>'succses get city','data'=>$provincy)));die;
		}
		
		print_r(json_encode(array('status'=>0,'msg'=>'problem get city','data'=>$provincy)));die;
	
		
	}

	
	function editpersonal()
	{
		global $LOCALE,$CONFIG;
	//pr($CONFIG['LOCAL_PUBLIC_ASSET']."personal/");exit;
		$id = @$this->user->id;
		if(isset($_POST['bioid']))
		{//pr($_POST);exit;
		
			
			
			$testimoni=$_POST['testimoni'];
			$nickname=$_POST['nickname'];
			$telp=$_POST['telp'];
			$email=$_POST['email'];
			
			$editbiopersonal = $this->personalHelper->editbiopersonal();
			
			if($editbiopersonal == true){
			print json_encode(array('status'=>true,'testimoni'=>$testimoni,'nickname'=>$nickname,'telp'=>$telp,'email'=>$email));exit;
			}
		}
		if(isset($_POST['guardian']))
		{
			$editguardian = $this->personalHelper->editguardian();
		

			//pr($_POST);exit;
			
			$nparent=$_POST['nparent'];
			$parent_address=$_POST['parent_address'];
			$parent_email=$_POST['parent_email'];
			$phone_parent=$_POST['phone_parent'];
			$r_talent=$_POST['r_talent'];
			$id_parent=$_POST['id_parent'];
			$parentdate=$_POST['parentdate'];
			$parentmonth=$_POST['parentmonth'];
		    $parentyear=$_POST['parentyear'];
			$tahunnya=''.$parentdate.'-'.$parentmonth.'-'.$parentyear;
			
		
			if($editguardian == true){
			print json_encode(array('status'=>true,'nparent'=>$nparent,'r_talent'=>$r_talent,'id_parent'=>$id_parent,
									'phone_parent'=>$phone_parent,'parent_email'=>$parent_email,'parent_address'=>$parent_address,
									'tahunnya'=>$tahunnya)); exit;
			}
		}
		if(isset($_POST['bioinput']))
		{
			$editbioinput = $this->personalHelper->editbioinput();
			
			if($editbioinput == true){
			print json_encode(array('status'=>true)); exit;
			}
		}
			if(isset($_POST['educations']))
		{
			
			$editeducations = $this->personalHelper->editeducations();
			
			if($editeducations == true){
			print json_encode(array('status'=>true)); exit;
			}
		}
		if(isset($_POST['categorynya']))
		{
			//pr($_POST);exit;
			$editcategory = $this->personalHelper->editcategory();
			
			if($editcategory == true){
			print json_encode(array('status'=>true)); exit;
			}
		}
			if(isset($_POST['editexperience']))
		{
			//pr($_POST);exit;
			$editexperience = $this->personalHelper->editexperience();
			
			if($editexperience == true){
			print json_encode(array('status'=>true)); exit;
			}
		}
		
		
	
		//pr($_POST);exit;
		if(isset($_POST['submit']))
		{
			$uploadnews = false;
		// pr($_POST);exit;
			if (isset($_FILES['images'])&&$_FILES['images']['name']!=NULL) {
				if (isset($_FILES['images'])&&$_FILES['images']['size'] <= 2000000) {
					$path = $CONFIG['LOCAL_PUBLIC_ASSET']."personal/";
					//$files=NULL,$path=NULL,$maxSize=1000,$resizeOriginal=false,$createThumb=true
					$data = $this->uploadHelper->uploadThisImage($_FILES['images'],$path,1000,false,false);
					
					if ($data['arrImage']!=NULL) { 
						$uploadnews = $data['arrImage']['filename'];
					}
				}else{
					echo '2';
				}
			}
			
			$editnews = $this->personalHelper->editpersonal($id,$uploadnews);
			
			if($editnews == true){
			
				sendRedirect($CONFIG['BASE_DOMAIN']."personal");
			}
			
			}
			$listpersonal = $this->personalHelper->listpersonal($id);
			//pr($listpersonal);exit;
			//pr($listpersonal['datadiri'][0]['user_id']);exit;
			// $month='';
			// $day='';
			// $year='';
			// $birth=$listpersonal['guardian'][0]['birth'];
			// list($year, $month, $day) = explode('-', $birth);
			// $this->assign('year',$year); 
			// $this->assign('month',$month); 
			// $this->assign('day',$day); 
			
			//Assign Value For First TAB 
			
			$selectupdatedata = $this->personalHelper->selectupdatedata($id);
			$selectmyeducation = $this->personalHelper->selectmyeducation($id);
			$listimages =$this->galleryHelper->selectupdatedata($this->user->id);
			$listvideo = $this->galleryHelper->getportofolio($id,$type=2);
		    $listaudio = $this->galleryHelper->getportofolio($id,$type=3);
		  // pr($selectupdatedata)
			if($selectupdatedata)
				{
				$this->assign('images',$listimages); 
				}	
				$this->assign('listvideo',$listvideo); 
				$this->assign('listaudio',$listaudio); 
			
			//Assign Value For Second TAB 
			
			$selectcategory = $this->personalHelper->selectcategory($id);
			$selectcategorydetail = $this->personalHelper->selectcategorydetail($id);
			//count($selectcategorydetail['result']);exit;
			$selectexperience = $this->personalHelper->selectexperience($id);
			//$paramcat=$selectcategory[0]['category_id'];
			//$subcategory = $this->personalHelper->subcategory($paramcat);
			$countnya_cat = count($selectcategorydetail['result'])-1;
			//pr($selectcategory);exit;
			//pr($selectcategorydetail);exit;
			//pr($selectcategory[0]['category_id']);exit;
			//pr(count($selectcategorydetail['result']));exit;
			//pr($selectcategory[0]['category_name']);exit;
			//$this->assign('cat_name', $selectcategory[0]['category_name']);
			$this->assign('countnya_cat', $countnya_cat);
			$this->assign('selectcategory', $selectcategory['result']);
			//$this->assign('subcategory', $subcategory);
			$this->assign('selectcategorydetail', $selectcategorydetail['result']);
			$this->assign('selectexperience', $selectexperience);
			
			
			
			$category = $this->categoryHelper->listcategory();
			
			$this->assign('listcategory', $category);
			$provincy =$this->personalHelper->province();
			$this->assign('uid',$listpersonal['datadiri'][0]['user_id']);
			$this->assign('provincy', $provincy);
			$this->assign('countcategory',count($selectcategorydetail['result']));
			$this->assign('load', $listpersonal['guardian']);
			$this->assign('ultah', $listpersonal['ultah']);
			$this->assign('list',$selectupdatedata);
			$this->assign('listmyedu',$selectmyeducation); 
			$this->assign('countnya',count($selectmyeducation));		
			//pr(TEMPLATE_DOMAIN_WEB .'apps/profile_edit.html');exit;
			return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/profile_edit.html');	
		
		
			
	
	
		
	}
	
	
	function ajaxfollow()
	{
		global $LOCALE,$CONFIG;
		
	//	pr($_POST);exit;
		$id=$this->_p('uid');
		$friendid = $this->_p('idnya');
		
		$ajaxfollow = $this->personalHelper->ajaxfollow($id,$friendid);
		//pr($ajaxfollow);exit;
		if($ajaxfollow)
		{
		print json_encode(array('status'=>true,'countnya'=>$ajaxfollow[0]['follow_count']));
		}else{ 
			print json_encode(array('status'=>false));
		}
		exit;
		
		
	}
	
		function ajaxunfollow()
	{
		global $LOCALE,$CONFIG;
		
	//	pr($_POST);exit;
		$id=$this->_p('idnya');
		$ajaxfollow = $this->personalHelper->ajaxunfollow($id);
		//pr($selectupdatedata);exit;
		if($ajaxfollow=='true')
		{
		print json_encode(array('status'=>true));
		}else{ 
			print json_encode(array('status'=>false));
		}
		exit;
		
		
	}
	
		function ajaxlike()
	{
		global $LOCALE,$CONFIG;
	
	//	pr($_POST);exit;
		$id=$this->_p('uid');
		$friendid = $this->_p('idnya');
		$ajaxlike = $this->personalHelper->ajaxlike($id,$friendid);
		//pr($selectupdatedata);exit;
		if($ajaxlike)
		{
		print json_encode(array('status'=>true,'countnya'=>$ajaxlike[0]['love_count']));
		}else{ 
			print json_encode(array('status'=>false));
		}
		exit;
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/personal_edit.html');
	}
	
	function ajaxunlike()
	{
		global $LOCALE,$CONFIG;
		
	//	pr($_POST);exit;
		$id=$this->_p('idnya');
		$ajaxlike = $this->personalHelper->ajaxunlike($id);
		//pr($selectupdatedata);exit;
		if($ajaxlike=='true')
		{
		print json_encode(array('status'=>true));
		}else{ 
			print json_encode(array('status'=>false));
		}
		exit;
		
		
	}
	function ajaxfotoprofile()
	{
		global $LOCALE,$CONFIG;
		
		//pr($_FILES);
		if($_FILES['file'] == '')
		{
		echo "<script> alert('Please Upload Foto Before'); </script>";
		print json_encode(array('status'=>false));exit;
		}
		$img=$_FILES['file'];
		if($_FILES['file']['name'] <> '')
		{
						$path = $CONFIG['LOCAL_PUBLIC_ASSET']."personal/";
						$uploadpicture = $this->uploadHelper->uploadThisFile($img,$path);
						$filenamenya=$uploadpicture['arrFile']['filename'];
		}
		
		$personalfoto = $this->personalHelper->updatepersonalfoto($this->user->id,$filenamenya);
		if($personalfoto=='true')
		{
		print json_encode(array('status'=>true));
		}else{ 
			print json_encode(array('status'=>false));
		}
		exit;
		
	}
	function ajaxfotocover()
	{
		global $LOCALE,$CONFIG;
		
		//pr($_FILES);
		$img=$_FILES['file'];
		if($_FILES['file']['name'] <> '')
		{
						$path = $CONFIG['LOCAL_PUBLIC_ASSET']."personal/";
						$uploadpicture = $this->uploadHelper->uploadThisFile($img,$path);
						$filenamenya=$uploadpicture['arrFile']['filename'];
		}
		
		$personalfoto = $this->personalHelper->updatecoverfoto($this->user->id,$filenamenya);
		if($personalfoto=='true')
		{
		print json_encode(array('status'=>true));
		}else{ 
			print json_encode(array('status'=>false));
		}
		exit;
		
	}
	
	
	
	}
?>