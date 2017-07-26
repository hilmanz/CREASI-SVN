<?php
class registerHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		
		$this->config = $CONFIG;
		
	
	}
	
	function save($type=1){
		$nama = $this->apps->_p('name');
		$username = $this->apps->_p('username');
		$nickname =$this->apps->_p('nickname');
		$gender=$this->apps->_p('gender');
		$dob=$this->apps->_p('Date_Year').'-'.$this->apps->_p('Date_Month').'-'.$this->apps->_p('Date_Day');
		$email=$this->apps->_p('email');
		//$jadwal=$this->apps->_p('name');
		$phone = $this->apps->_p('phone');
		$province =$this->apps->_p('province');
		$city=$this->apps->_p('city');
		$passwordc=$this->apps->_p('passwordc');
		$password=$this->apps->_p('password');
		
		$password = $this->encrypt($password);
		$passwordc= $this->encrypt($passwordc);
		
		//parent
		$relation=$this->apps->_p('relation');
		$namaparent=$this->apps->_p('namaparent');
		$phoneparent=$this->apps->_p('phoneparent');
		$identiasparent=$this->apps->_p('identiasparent');
		$alamatparent=$this->apps->_p('alamatparent');
		$emailparent=$this->apps->_p('emailparent');
		
		$parentmonth=$this->apps->_p('parentmonth');
		$parentdate=$this->apps->_p('parentdate');
		$parentyear=$this->apps->_p('parentyear');
		$relation_parent=$this->apps->_p('relation_parent');
		$dateparent=$parentyear.'-'.$parentmonth.'-'.$parentyear;
		
		$age=$this->apps->_p('ages');
		
		
		$result['status']=0;
		$result['msg']='proses gagal coba lagi';
			// pr($query);exit;
		if($password!=$passwordc)
		{
			$result['status']=0;
			$result['msg']='proses gagal coba lagi';
			return $result;
		}
		
		$query="insert into social_member set
				`name`='{$nama}',
				`nickname`='{$nickname}',
				`last_name`='{$nickname}',
				`email`='{$email}',
				`username`='{$email}',
				`city`='{$city}',
					`provincy`='{$province}',
				`sex`='{$gender}',
				`birthday`='{$dob}',
				`phone_number`='{$phone}',
				`role`='1',
				`salt`='12345678',
				`password`='$password'";
		 // pr($query);
			$qdata = $this->apps->query($query);
		if($qdata)
		{
			$result['status']=1;
			$result['id']=$this->apps->getLastInsertId();
			if($result['id'])
			{
				
				$id=$result['id'];
				$query="insert into tbl_talent set
					`user_id`='{$id}',
					
					`alamat`='',
					`no_tlp`='{$phone}',
					`no_ktp`='',
					`n_status`=1
					";
			// pr($query);
				$qdata = $this->apps->query($query);
				
				
				// pr($age);
				if($age < '18')
				{
					$query="insert into my_guardian set
								`user_id`='{$id}',
								
								`name_parent`='{$namaparent}',
								`relation_parent`='{$relation_parent}',
								`birth`='{$dateparent}',
								`phone`='{$phoneparent}',
								`identitas`='{$identiasparent}',
								`address`='{$alamatparent}',
								`email`='{$emailparent}',
								`date`=NOW(),
								`n_status`=1
								";
					// pr($query);
					$qdata = $this->apps->query($query);
				
				}
				
				
				$result['msg']='proses berhasil';
			}
			// die;
			return $result;
		}
		return $result;
	}
	function savenotification($fromid=0,$to=0){
		$result['status']=0;
		$result['msg']='proses gagal coba lagi';
		$query="insert into tbl_notification set
					`from`='{$fromid}',
					
					`to`='',
					`subject`='Selamat Datang',
					`detail`='Selamat datang di creasi.com',
					`created_date`=NOW(),
					`n_status`=1
					";
		
				$qdata = $this->apps->query($query);
				if($qdata)
				{
					$result['status']=1;
					$result['msg']='proses berhasil';
				}
		return $result;
	}
	function saveTS($type=1){
	//pr($_POST);exit;
	
	
		$nama = $this->apps->_p('name');
		$lastname = $this->apps->_p('lastname');
		$username = $this->apps->_p('email');
		$phone = $this->apps->_p('phone');
		$password=$this->apps->_p('password');
		$passwordc=$this->apps->_p('repassword');
		$password = $this->encrypt($password);
		$passwordc= $this->encrypt($passwordc);
		$result['status']=0;
		$result['msg']='proses gagal coba lagi';
		
		if($password!=$passwordc)
		{
			$result['status']=0;
			$result['msg']='proses gagal coba lagi';
			return $result;
		}
		$name_ts = $this->apps->_p('name_ts');
		$telp = $this->apps->_p('telp');
		$addreas=$this->apps->_p('address');
		$province =$this->apps->_p('provincy');
		$city=$this->apps->_p('city');
		
	
		
		$query="insert into social_member set
				`name`='{$nama}',`last_name`='{$lastname}',
				`email`='{$username}',
				`username`='{$username}',
				`city`='{$city}',
				`phone_number`='{$phone}',
				`role`='2',
				`salt`='12345678',
				`password`='{$password}'
		";
	
			$qdata = $this->apps->query($query);
			
			
		if($qdata)
		{
			$result['status']=1;
			$result['id']=$this->apps->getLastInsertId();
			if($result['id'])
			{
				$id=$result['id'];
				$query="insert into tbl_talent_seeker set
					`user_id`='{$id}',`nama_perusahaan`='{$name_ts}',
					`alamat_perusahaan`='{$addreas}',`provinsi`='{$province}',`city`='{$city}',
					`no_tlp`='{$telp}',
					`n_status`=1
					";
		
				$qdata = $this->apps->query($query);
				
				$result['msg']='proses berhasil';
			}
			return $result;
		}
		return $result;
	}
	function test(){
	
	
		$sql = "SELECT atc.*,tcat.*,tsubcat.*
		FROM my_subcategory   atc
			LEFT JOIN tbl_category    tcat ON atc.category_id=tcat.id
			LEFT JOIN tbl_subcategory   tsubcat ON atc.subcategory_id =tsubcat.id
			where 1 and atc.user_id=31 and atc.category_id=9
		";
		$total = $this->apps->fetch($sql,1);	
		$data=array();
		$i='0';
		
		$temsubcategory='';
		foreach ($total as $key=>$rows)
		{
			
				$data['categoryid']=$rows['category_id'];
				$data['category_name']	=$rows['category_name'];
				$data['subcategory'][$i]['subcategoryid']	=$rows['subcategory_id'];
				$data['subcategory'][$i]['subcategory_name']	=$rows['name_subcategory'];
				
				$checkattr="SELECT experience,agent,name_agent,tlp_agent,skill,software,sallary
								 FROM my_attribut_category
									where 1 and user_id=31 and category_id={$rows['category_id']} and subcategory_id={$rows['subcategory_id']}
								";
				
				$data['subcategory'][$i]['attr']= @$this->apps->fetch($checkattr);
				
				
				
				$checkethnicity="SELECT ethnicity_id,ethnicity
								 FROM my_ethnicity
									where 1 and user_id=31 and category_id={$rows['category_id']} and subcategory_id={$rows['subcategory_id']}
								";
				
				$data['subcategory'][$i]['ethnicity']= @$this->apps->fetch($checkethnicity,1);
				
				if($data['subcategory'][$i]['ethnicity'])
				{
					
					$data['subcategory'][$i]['ethnicity']['string']='';
					foreach($data['subcategory'][$i]['ethnicity'] as $row)
					{
						if(@$row['ethnicity'])
						{
							$data['subcategory'][$i]['ethnicity']['string'] .=$row['ethnicity'].',';
						}
					}
				}
				$checkopenfor="SELECT oppen_for_id,oppen_for
								 FROM my_open_for
									where 1 and user_id=31 and category_id={$rows['category_id']} and subcategory_id={$rows['subcategory_id']}
								";
				
				$data['subcategory'][$i]['openfor']= @$this->apps->fetch($checkopenfor,1);	
				if($data['subcategory'][$i]['openfor'])
				{
					
					$data['subcategory'][$i]['openfor']['string']='';
					foreach($data['subcategory'][$i]['openfor'] as $row)
					{
						if(@$row['oppen_for'])
						{
							$data['subcategory'][$i]['openfor']['string'] .=$row['oppen_for'].',';
						}
					}
				}
				
				
				$checklokingfor="SELECT loking_for_id,loking_for
								 FROM my_loking_for
									where 1 and user_id=31 and category_id={$rows['category_id']} and subcategory_id={$rows['subcategory_id']}
								";
				
				$data['subcategory'][$i]['lokingfor']= @$this->apps->fetch($checklokingfor,1);
				if($data['subcategory'][$i]['lokingfor'])
				{
					
					$data['subcategory'][$i]['lokingfor']['string']='';
					foreach($data['subcategory'][$i]['lokingfor'] as $row)
					{
						if(@$row['loking_for'])
						{
							$data['subcategory'][$i]['lokingfor']['string'] .= @$row['loking_for'].',';
						}
					}
				}
				$checkaccent="SELECT accent_id,accent
								 FROM my_accent
									where 1 and user_id=31 and category_id={$rows['category_id']} and subcategory_id={$rows['subcategory_id']}
								";
				
				$data['subcategory'][$i]['accent']= @$this->apps->fetch($checkaccent,1);
				if($data['subcategory'][$i]['accent'])
				{
					
					$data['subcategory'][$i]['accent']['string']='';
					foreach($data['subcategory'][$i]['accent'] as $row)
					{
						if(@$row['accent'])
						{
							$data['subcategory'][$i]['accent']['string'] .= @$row['accent'].',';
						}
					}
				}
				
				$checkdancer="SELECT fromation_id,fromation
								 FROM my_dancer_formation
									where 1 and user_id=31 and category_id={$rows['category_id']} and subcategory_id={$rows['subcategory_id']}
								";
				
				$data['subcategory'][$i]['dancer']= @$this->apps->fetch($checkdancer,1);
				if($data['subcategory'][$i]['dancer'])
				{
					
					$data['subcategory'][$i]['dancer']['string']='';
					foreach($data['subcategory'][$i]['dancer'] as $row)
					{
						if(@$row['fromation'])
						{
							$data['subcategory'][$i]['dancer']['string'] .= @$row['fromation'].',';
						}
					}
				}
				
				
				$checkmusic="SELECT genre_id,genre
								 FROM my_music_genre
									where 1 and user_id=31 and category_id={$rows['category_id']} and subcategory_id={$rows['subcategory_id']}
								";
				
				$data['subcategory'][$i]['music']= @$this->apps->fetch($checkmusic,1);
				if($data['subcategory'][$i]['music'])
				{
					
					$data['subcategory'][$i]['music']['string']='';
					foreach($data['subcategory'][$i]['music'] as $row)
					{
						if(@$row['genre'])
						{
							$data['subcategory'][$i]['music']['string'] .= @$row['genre'].',';
						}
					}
				}
				
				
				$checklanguage="SELECT language_id,language
								 FROM my_language
									where 1 and user_id=31 and category_id={$rows['category_id']} and subcategory_id={$rows['subcategory_id']}
								"; 
				
				$data['subcategory'][$i]['language']= @$this->apps->fetch($checklanguage,1);
				if($data['subcategory'][$i]['language'])
				{
					
					$data['subcategory'][$i]['language']['string']='';
					foreach($data['subcategory'][$i]['language'] as $row)
					{
						if(@$row['language'])
						{
							$data['subcategory'][$i]['language']['string'] .= @$row['language'].',';
						}
					}
				}
				
				
				
				$checkcamera="SELECT camera_equipment_id,camera_equipment
								 FROM my_camera_equipment
									where 1 and user_id=31 and category_id={$rows['category_id']} and subcategory_id={$rows['subcategory_id']}
								";
				
				$data['subcategory'][$i]['camera']= @$this->apps->fetch($checkcamera,1);
				if($data['subcategory'][$i]['camera'])
				{
					
					$data['subcategory'][$i]['camera']['string']='';
					foreach($data['subcategory'][$i]['camera'] as $row)
					{
						if(@$row['camera_equipment'])
						{
							$data['subcategory'][$i]['camera']['string'] .= @$row['camera_equipment'].',';
						}
					}
				}
				$i++;
				
		}
		return $data;
	}
	function addcategory($id){
	
		$category=@$_POST['category'];
		$subcat=@$_POST['subcat'];
		$experience=@$_POST['experience'];
		$skill=@$_POST['skill'];
		$software=@$_POST['software'];
		
		foreach ($category as $x=>$valcategory)
		{
			$query="insert into my_category set
					`category_id`='{$valcategory}',
					`user_id`='{$id}',
					`date`=NOW(),
					`status`=1";
				
				
				$qdata = $this->apps->query($query);
			
		}
		foreach ($subcat as $key=>$val)
			{
				
				foreach($subcat[$key] as $valsubcat)
				{
					$query="insert into my_subcategory set
							`category_id`='{$key}',
							`subcategory_id`='{$valsubcat}',
							`user_id`='{$id}',
							`n_status`=1
					";
						
						$qdata = $this->apps->query($query);
					// pr($query);	
					//experience attrbut category
					$experiencein =@$experience[$key][$valsubcat];
					$agentin=@$agent[$key][$valsubcat];
					$skillin=@$skill[$key][$valsubcat];
					$software=@$software[$key][$valsubcat];
					
					$queryattrbut="insert into my_attribut_category set
							`user_id`='{$id}',
							`category_id`='{$key}',
							`subcategory_id`='{$valsubcat}',
							`experience`='{$experiencein}',
							`agent`='{$agentin}',
							`name_agent`='',
							`tlp_agent`='',
							`skill`='{$skillin}',
							`software`='{$software}',
							`sallary`='',
							`date`=NOW(),
							`n_status`=1";
						//pr($queryattrbut);exit;
						$qdataattrbut = $this->apps->query($queryattrbut);
						$resultattrbut =$this->apps->getLastInsertId();
						
						
						$looking_for=@$_POST['looking_for'][$key][$valsubcat];
						$open_for=@$_POST['open_for'][$key][$valsubcat];
						
						$agent=@$_POST['agent'][$key][$valsubcat];
						$language=@$_POST['language'][$key][$valsubcat];
						$accent=@$_POST['accent'][$key][$valsubcat];
						$group=@$_POST['group'][$key][$valsubcat];
						$Genre=@$_POST['Genre'][$key][$valsubcat];
						$camera=@$_POST['camera'][$key][$valsubcat];
						// pr($looking_for);
						if($looking_for)
						{
							
							foreach($looking_for as $keylooking_for => $looking_for)
							{
								$explodelooking_for= explode('_',$looking_for);
								$idlooking_for=@$explodelooking_for[0];
								$looking_for=@$explodelooking_for[1];
								
								
								$querylooking_for="insert into my_loking_for set
												`user_id`='{$id}',
												`category_id`='{$key}',
												`subcategory_id`='{$valsubcat}',
												`arrtibut_category_id`='{$resultattrbut}',
												`loking_for_id`='{$idlooking_for}',
												`loking_for`='{$looking_for}',
												`date`=NOW(),
												`n_status`=1";
								pr($querylooking_for);exit;
								$qdatalooking_for = $this->apps->query($querylooking_for);
							}
						}
						if($open_for)
						{
							
							// $open_forin=@$open_for[$key][$valsubcat];
							foreach($open_for as $keyopen_for => $open_for)
							{
								$explodeopen_for= explode('_',$open_for);
								$idopen_for=@$explodeopen_for[0];
								$open_for=@$explodeopen_for[1];
								
								
								$queryopen_for="insert into my_open_for set
												`user_id`='{$id}',
												`category_id`='{$key}',
												`subcategory_id`='{$valsubcat}',
												`attribut_category_id`='{$resultattrbut}',
												`oppen_for_id`='{$idopen_for}',
												`oppen_for`='{$open_for}',
												`date`=NOW(),
												`n_status`=1";
								// pr($queryopen_for);
								$qdataopen_for = $this->apps->query($queryopen_for);
							}
						}
						
						if($language)
						{
							foreach($language as $keylanguage => $language)
							{
								// $languagein=@$language[$key][$valsubcat];
								$explodelanguage= explode('_',$language);
								$idLanguage=@$explodelanguage[0];
								$language=@$explodelanguage[1];
								
								
								$querylanguage="insert into my_language set
												`user_id`='{$id}',
												`category_id`='{$key}',
												`subcategory_id`='{$valsubcat}',
												`attribut_category_id`='{$resultattrbut}',
												`language_id`='{$idLanguage}',
												`language`='{$language}',
												`date`=NOW(),
												`n_status`=1";
									// pr($querylanguage);
								$qdatalanguage = $this->apps->query($querylanguage);
							}
						}
						if($accent)
						{
							foreach($accent as $keyaccent => $accent)
							{
								// $accentin=@$accent[$key][$valsubcat];
								$explodeaccent= explode('_',$accent);
								$idaccent=@$explodeaccent[0];
								$accent=@$explodeaccent[1];
								
								$queryaccent="insert into my_accent set
												`user_id`='{$id}',
												`category_id`='{$key}',
												`subcategory_id`='{$valsubcat}',
												`attribut_category_id`='{$resultattrbut}',
												`accent_id`='{$idaccent}',
												`accent`='{$accent}',
												`date`=NOW(),
												`n_status`=1";
												// pr($queryaccent);
								$qdataaccent = $this->apps->query($queryaccent);
							}
						}
						if($group)
						{
							
							foreach($group as $keygroup => $group)
							{
							
								// $groupin=@$group[$key][$valsubcat];
								$explodegroup= explode('_',$group);
								$idgroup=@$explodegroup[0];
								$group=@$explodegroup[1];
								
								$querygroup="insert into my_dancer_formation set
												`user_id`='{$id}',
												`category_id`='{$key}',
												`subcategory_id`='{$valsubcat}',
												`attribut_category_id`='{$resultattrbut}',
												`fromation_id`='{$idgroup}',
												`fromation`='{$group}',
												`date`=NOW(),
												`n_status`=1";
								// pr($querygroup);
								$qdatagroup = $this->apps->query($querygroup);					
							}
						}
						if($Genre)
						{
							
							foreach($Genre as $keyGenre => $Genre)
							{
							
								// $Genrein=@$Genre[$key][$valsubcat];
								$explodeGenre= explode('_',$Genre);
								$idGenre=@$explodeGenre[0];
								$Genre=@$explodeGenre[1];
								
								$queryGenre = "insert into my_music_genre  set
												`user_id`='{$id}',
												`category_id`='{$key}',
												`subcategory_id`='{$valsubcat}',
												`attribut_category_id`='{$resultattrbut}',
												`genre_id`='{$idGenre}',
												`genre`='{$Genre}',
												`date`=NOW(),
												`n_status`=1";
								// pr($queryGenre);
								$qdataGenre = $this->apps->query($queryGenre);	
							}
							
						}
						if($camera)
						{
							
							
							foreach($camera as $keycamera => $camera)
							{
							
								// $camerain=@$camera[$key][$valsubcat];
								$explodecamera= explode('_',$camera);
								$idcamera=@$explodecamera[0];
								$camera=@$explodecamera[1];
								
								$querycamera="insert into my_camera_equipment   set
												`user_id`='{$id}',
												`category_id`='{$key}',
												`subcategory_id`='{$valsubcat}',
												`attribut_category_id`='{$resultattrbut}',
												`camera_equipment_id`='{$idcamera}',
												`camera_equipment`='{$camera}',
												`date`=NOW(),
												`n_status`=1";
									// pr($querycamera);
								$qdatacamera = $this->apps->query($querycamera);			
							}
						}
						//$qdataattrbut = $this->apps->query($queryattrbut);
					
				}
			}
	}
	function province(){
		global $CONFIG;
		$sqlcheck ="SELECT *
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.province_reference";
						// pr($sqlcheck);die;q
		$rqData = $this->apps->fetch($sqlcheck,1);
		return $rqData;
	}
	function activation(){
		global $CONFIG;
		$base64 = urldecode64($this->apps->_request('code'));
		 $content = unserialize($base64);
		// pr($base64);die;
		$sqlcheck ="UPDATE  social_member set n_status='1' where id='{$content['userid']}'";
						// pr($sqlcheck);die;
		$rqData = $this->apps->query($sqlcheck);
		return $rqData;
	}
	function city(){
		global $CONFIG;
		$id=$this->apps->_p('id');
		$sqlcheck ="SELECT *
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.city_reference where provinceName='{$id}'";
						// pr($sqlcheck);
		$rqData = $this->apps->fetch($sqlcheck,1);
		return $rqData;
	}
	protected function encrypt($string)
	{	
		$ENC_KEY='youknowwho2014';
		return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($ENC_KEY), $string, MCRYPT_MODE_CBC, md5(md5($ENC_KEY))));
	}
	protected function decrypt($encrypted)
	{
		$ENC_KEY='youknowwho2014';
		return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($ENC_KEY), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($ENC_KEY))), "\0");
	}
}
