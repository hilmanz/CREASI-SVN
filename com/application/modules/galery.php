<?php
class galery extends App{
		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 

		$this->uploadHelper = $this->useHelper("uploadHelper");
		$this->galleryHelper = $this->useHelper("galleryHelper");
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->user=$this->session->getSession($this->config['SESSION_NAME'],"WEB");
		
	}

	 
	function main(){
	global $CONFIG;		

		$time['time'] = '%H:%M:%S';
		$uid=$this->user->id;
		$selectupdatedata = $this->galleryHelper->selectupdatedata($uid);
		//pr($selectupdatedata);exit;
		if($selectupdatedata)
		{
		$this->assign('load',$selectupdatedata); 
		}	
			
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/galery.html');
		
		
	}
	
	
	function video(){
		global $CONFIG;	
		
		$video_url = $this->_p('url');
		$id_video_youtube = '';	
pr($video_url);		
		pr(strpos($video_url, 'youtu'));die;
		if($video_url)
		{
			preg_match(
					'/[\\?\\&]v=([^\\?\\&]+)/',
					$video_url,
					@$matches
				);
				if(@$matches[1])
				{
					$id_video_youtube = @$matches[1];
				}
		}
		if($id_video_youtube)
		{
			print json_encode(array('status'=>true,'url'=>$id_video_youtube));
		}else{ 
			print json_encode(array('status'=>false));
		}
		exit;
	}
	
	function addgallery(){
	global $CONFIG;	
	
	//pr($_FILES); 
	
	$uid=$this->user->id;
	$selectupdatedata = $this->galleryHelper->selectupdatedata($uid);
	$images = $_FILES['photo'];
			
			$dataHalaman=array();
		
			$no=0;
			$jumlahHalaman = count($images['name']);
			//pr($jumlahHalaman);die;
			for($i=0;$i<=$jumlahHalaman-1;$i++)
			{
				$img['name']=@$images['name'][$i];
				$img['type']=@$images['type'][$i];
				$img['tmp_name']=@$images['tmp_name'][$i];
				$img['error']=@$images['error'][$i];
				$img['size']=@$images['size'][$i];
				
				if($img['name'])
				{
						
						
							$imagessize = getimagesize($img['tmp_name']);
							//pr(getimagesize($_FILES['photo']["tmp_name"]));die;
							$path = $CONFIG['LOCAL_ASSET'].'gallery/photo_user/';
							$images['photo'] = $_FILES['photo']; 	 
							$uploadnews = $this->uploadHelper->uploadThisImage($img,$path,1000,false,false);
							$filephoto=$uploadnews['arrImage']['filename'];

				}
				else
				{
					$filephoto='';
				}
				if($filephoto=='')
				{
					if(isset($selectupdatedata['halaman_foto'][$i]['nama']))
					{
						if($selectupdatedata['halaman_foto'][$i]['nama']!='')
						{
							$dataHalaman['halaman_gallery'][$i]=@$selectupdatedata['halaman_foto'][$i]['nama'];
						}
					}
				}
				else
				{
					$dataHalaman['halaman_gallery'][$i]=$filephoto;
					//pr($dataHalaman['halaman_buku'][$i]);
				}
				
			}
	  	//pr('ssss');exit;
			$halaman=serialize($dataHalaman);
		//pr($halaman);exit;
			$uid=$this->user->id;
			$listgallery= $this->galleryHelper->addgalery($halaman,$uid);
			exit;
	
		
	}
	
	function addmore()
	{
		global $CONFIG;
		
		
		$uid=$this->user->id;
		$selectupdatedata = $this->bukuHelper->selectupdatedata($uid);
		
		if($this->_p('submit')==1){
		//echo "ss";exit;
			$pesan_erorr='';
		
			$caption_no='';
			$url_no='';
			$photo_no='';
					
		
			
			$images = $_FILES['photo'];
			
			$dataHalaman=array();
		
			$no=0;
			$jumlahHalaman = count($images['name']);
			
			
			for($i=0;$i<=$jumlahHalaman-1;$i++)
			{
				$img['name']=@$images['name'][$i];
				$img['type']=@$images['type'][$i];
				$img['tmp_name']=@$images['tmp_name'][$i];
				$img['error']=@$images['error'][$i];
				$img['size']=@$images['size'][$i];
				
				
				if($i==0)
				{	
					
					if($filephoto=='')
					{
						
						$dataHalaman['halaman_cover']=@$selectupdatedata['halaman_foto'][$i]['nama'];
					}
					else
					{
						$dataHalaman['halaman_cover']=$filephoto;
					}
					
					//$dataHalaman['halaman_cover']=$filephoto;
				}
				if($i<=1)
				{
				
					if($filephoto=='')
					{
						
						$dataHalaman['halaman_inti'][$i]=@$selectupdatedata['halaman_foto'][$i]['nama'];
					}
					else
					{
						$dataHalaman['halaman_inti'][$i]=$filephoto;
					}
					//$dataHalaman['halaman_inti'][$i]=$filephoto;
					
				}
				if($filephoto=='')
				{
					if(isset($selectupdatedata['halaman_foto'][$i]['nama']))
					{
						if($selectupdatedata['halaman_foto'][$i]['nama']!='')
						{
							$dataHalaman['halaman_buku'][$i]=@$selectupdatedata['halaman_foto'][$i]['nama'];
						}
					}
				}
				else
				{
					$dataHalaman['halaman_buku'][$i]=$filephoto;
					//pr($dataHalaman['halaman_buku'][$i]);
				}
			}
			
			$halaman=serialize($dataHalaman);
			
		
			$listgallery = $this->galleryHelper->addmoregalery($halaman,$uid);
			if($listeducation){
					
					sendRedirect($CONFIG['ADMIN_DOMAIN']."buku");
				}
			
			
		
		
		}
		
		$this->assign('load',$selectupdatedata); 
		}
		
		
	}
?>