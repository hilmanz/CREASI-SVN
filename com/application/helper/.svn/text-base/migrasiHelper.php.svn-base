<?php
class migrasiHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
		// echo"sss";die;
	}
	function singcategory()
	{
		$sqlCreasi = "SELECT * FROM  creasi_live.member_talent_category ";
		$rqDataCreasi = $this->apps->fetch($sqlCreasi,1);
		foreach ($rqDataCreasi as $rowCreasi)
		{
			$sqlmember="SELECT * FROM creasi_web_2015.social_member where id='{$rowCreasi['member_id']}'";
			$rqDatamember=$this->apps->fetch($sqlmember);
			if($rqDatamember)
			{
				$insetData="INSERT INTO creasi_web_2015.my_category set 
							category_id='{$rowCreasi['cat_id']}',
							user_id='{$rqDatamember['id']}',
							`date`=NOW(),
							status='1'";
				$rqDataCreasi = $this->apps->query($insetData);
			}
		}
	}
	function singcategory2()
	{
		$sqlAcuan = "SELECT * FROM  creasi_web_2015.tbl_acuan  ";
		$rqDataAcuan = $this->apps->fetch($sqlAcuan,1);
		foreach ($rqDataAcuan as $rowAcuan)
		{
				$sqlcheckmember = "SELECT * FROM creasi_web_2015.my_category where category_id = '{$rowAcuan['category']}'  and user_id={$rowAcuan['user_id']}";
					pr($sqlcheckmember);
					$rqcheckmember  = $this->apps->fetch($sqlcheckmember);
					pr($rqcheckmember);
					if($rqcheckmember)
					{
							echo"ada ".$rowAcuan['category'].'  '.$rowAcuan['user_id'];
					}
					else
					{
						$insetData="INSERT INTO creasi_web_2015.my_category set 
									category_id='{$rowAcuan['category']}',
									user_id='{$rowAcuan['user_id']}',
									`date`=NOW(),
									status='1'";
									pr($insetData);
						$rqDataCreasi = $this->apps->query($insetData);
					}
		}
	}
	function singsubcategory()
	{
		$sqlAcuan = "SELECT * FROM  creasi_web_2015.tbl_acuan";
		$rqDataAcuan = $this->apps->fetch($sqlAcuan,1);
		pr($rqDataAcuan);
		foreach ($rqDataAcuan as $rowAcuan)
		{
			$sqlcheckmember = "SELECT * FROM creasi_web_2015.my_subcategory where user_id='{$rowAcuan['user_id']}' and  category_id = '{$rowAcuan['category']}'  and subcategory_id='{$rowAcuan['subcategory']}'";
					pr($sqlcheckmember);
					$rqcheckmember  = $this->apps->fetch($sqlcheckmember);
					pr($rqcheckmember);
					if($rqcheckmember)
					{
						echo "ada". $rowAcuan['subcategory'].' '.$rowAcuan['user_id'];
					}
					else
					{
						$insetData="INSERT INTO creasi_web_2015.my_subcategory set 
									category_id='{$rowAcuan['category']}',
									subcategory_id='{$rowAcuan['subcategory']}',
									user_id='{$rowAcuan['user_id']}',
									n_status='1'";
									pr($insetData);
						$rqDataCreasi = $this->apps->query($insetData);
					}
		}
	}
	function singeducation()
	{
		$sqlAcuan = "SELECT * FROM  creasi_live.member_education";
		$rqDataAcuan = $this->apps->fetch($sqlAcuan,1);
		pr($rqDataAcuan);
		foreach ($rqDataAcuan as $rowAcuan)
		{
						
					$sqlcheckmember = "SELECT * FROM creasi_web_2015.my_education where user_id='{$rowAcuan['member_id']}' and  institusi = '{$rowAcuan['description']}'";
					pr($sqlcheckmember);
					$rqcheckmember  = $this->apps->fetch($sqlcheckmember);
					pr($rqcheckmember);
					if($rqcheckmember)
					{
						echo "ada". $rowAcuan['member_id'].' '.$rowAcuan['description'];
					}
					else
					{	
						
						if (preg_match("/SMA/i",$rowAcuan['description'])||preg_match("/Senior High School/i",$rowAcuan['description']))
						{
							$degree='SMA';
							
						}
						else if(preg_match("/S1/i",$rowAcuan['description'])||preg_match("/Universitas/i",$rowAcuan['description'])||preg_match("/Sarjana/i",$rowAcuan['description']))
						{
							$degree='S1';
						}
						else if(preg_match("/S2/i",$rowAcuan['description']))
						{
							$degree='S2';
						}
						else
						{
							$degree='';
						}
						$insetData="INSERT INTO creasi_web_2015.my_education set 
									user_id='{$rowAcuan['member_id']}',
									institusi='{$rowAcuan['description']}',
									degree='{$degree}',
									tahunmasuk='{$rowAcuan['year']}',
									tahunlulus='{$rowAcuan['year']}',
									n_status='1'";
									pr($insetData);
						$rqDataCreasi = $this->apps->query($insetData);
					}
		}
	}
	function singattributcategory()
	{
		
		$sqlAcuan = "SELECT *,mbcs.id as ids,mbse.year as year,mbse.id as idexp FROM  creasi_live.member_talent_category_sub  mbcs
		LEFT JOIN  creasi_live.member_talent_category_sub_experience mbse ON mbcs.id=mbse.member_talent_category_sub_id
		";
		$rqDataAcuan = $this->apps->fetch($sqlAcuan,1);
		
		foreach ($rqDataAcuan as $rowAcuan)
		{
					$sqlcheckmember = "SELECT * FROM creasi_web_2015.my_attribut_category where id='{$rowAcuan['ids']}'";
					
					$rqcheckmember  = $this->apps->fetch($sqlcheckmember);
					
					if($rqcheckmember)
					{
						echo "ada". $rowAcuan['member_id'].' '.$rowAcuan['description'];
					}
					else
					{	
						
							$sqlcheckcatnew= "SELECT * FROM creasi_web_2015.`tbl_mapingcat` tm
							
							LEFT JOIN creasi_web_2015.tbl_acuan ta ON tm.tbl_baru=ta.category  where tm.tbl_lama = '{$rowAcuan['cat_id']}'  and ta.user_id='{$rowAcuan['member_id']}' ";
							pr($sqlcheckcatnew);
							$rqcheckcatnew  = $this->apps->fetch($sqlcheckcatnew);
							if($rqcheckcatnew)
							{
								if($rowAcuan['attr_agent']=='no')
								{
									$rowAcuan['attr_agent']='No';
									
								}
								elseif($rowAcuan['attr_agent']=='yes')
								{
									$rowAcuan['attr_agent']='Yes';
								}
								$insetData="INSERT INTO creasi_web_2015.my_attribut_category set 
											id='{$rowAcuan['ids']}',
											user_id='{$rowAcuan['member_id']}',
											short_description='',
											 category_id='{$rqcheckcatnew['category']}',
											subcategory_id='{$rqcheckcatnew['subcategory']}',
											agent='{$rowAcuan['attr_agent']}',
											name_agent='{$rowAcuan['attr_agent_name']}',
											tlp_agent='{$rowAcuan['attr_agent_contact']}',
											date=NOW(),
											n_status='1'";
											pr($insetData);
								$rqDataCreasi = $this->apps->query($insetData);
							if($rowAcuan['idexp'])
							{
								
								
								$insetData="INSERT INTO creasi_web_2015.my_experience set 
											id='{$rowAcuan['ids']}',
											user_id='{$rowAcuan['member_id']}',
											periode_start='{$rowAcuan['year']}-01-01',
											 periode_end='{$rowAcuan['year']}-12-01',
											detail_exp='{$rowAcuan['description']}',
											n_status='1',
											 category_id='{$rqcheckcatnew['category']}',
											subcategory_id='{$rqcheckcatnew['subcategory']}'
											";
											pr($insetData);
								$rqDataCreasi = $this->apps->query($insetData);
							}
								if($rowAcuan['attr_lookingfor_id'])
								{
									$loking=explode(',',$rowAcuan['attr_lookingfor_id']);
									if(isset($loking[1]))
									{
										foreach($loking as $rlooking)
										{
											$insetData="INSERT INTO creasi_web_2015.my_loking_for set 
														user_id='{$rowAcuan['member_id']}',
														category_id='{$rqcheckcatnew['category']}',
														subcategory_id='{$rqcheckcatnew['subcategory']}',
														 arrtibut_category_id='{$rowAcuan['ids']}',
														loking_for_id='{$rlooking}',
														loking_for='',
														 date=NOW(),
														n_status='1'
														";
														pr($insetData);
											$rqDataCreasi = $this->apps->query($insetData);
										}
									}
									else
									{
										$insetData="INSERT INTO creasi_web_2015.my_loking_for set 
														user_id='{$rowAcuan['member_id']}',
														category_id='{$rqcheckcatnew['category']}',
														subcategory_id='{$rqcheckcatnew['subcategory']}',
														 arrtibut_category_id='{$rowAcuan['ids']}',
														loking_for_id='{$rowAcuan['attr_lookingfor_id']}',
														loking_for='',
														 date=NOW(),
														n_status='1'
														";
														pr($insetData);
										$rqDataCreasi = $this->apps->query($insetData);
									}
									
								}
									if($rowAcuan['attr_openfor_id'])
								{
									$oppen=explode(',',$rowAcuan['attr_openfor_id']);
									if(isset($oppen[1]))
									{
										
										
										
										foreach($oppen as $roppen)
										{
											if($roppen)
											{
											
												if($roppen==1)
												{
													$oppen='Unpaid';
												}
												elseif($roppen==2)
												{
													$oppen='Expenses';
												}
												elseif($roppen==3)
												{
													$oppen='Paid';
												}
												$insetData="INSERT INTO creasi_web_2015.my_open_for set 
															user_id='{$rowAcuan['member_id']}',
															category_id='{$rqcheckcatnew['category']}',
															subcategory_id='{$rqcheckcatnew['subcategory']}',
															 attribut_category_id='{$rowAcuan['ids']}',
															oppen_for_id='{$roppen}',
															oppen_for='{$oppen}',
															 date=NOW(),
															n_status='1'
															";
															pr($insetData);
												$rqDataCreasi = $this->apps->query($insetData);
											}
										}
									}
									else
									{
										if($rowAcuan['attr_openfor_id']==1)
											{
												$oppen='Unpaid';
											}
											elseif($rowAcuan['attr_openfor_id']==2)
											{
												$oppen='Expenses';
											}
											elseif($rowAcuan['attr_openfor_id']==3)
											{
												$oppen='Paid';
											}
										
										$insetData="INSERT INTO creasi_web_2015.my_open_for set 
														user_id='{$rowAcuan['member_id']}',
														category_id='{$rqcheckcatnew['category']}',
														subcategory_id='{$rqcheckcatnew['subcategory']}',
														 attribut_category_id='{$rowAcuan['ids']}',
														oppen_for_id='{$roppen}',
														oppen_for='{$oppen}',
														 date=NOW(),
														n_status='1'
														";
														pr($insetData);
										$rqDataCreasi = $this->apps->query($insetData);
									}
								
								}
						}
					}	
		}
	}
	function singprotfoliophoto()
	{
		$sqlCreasi = "SELECT * FROM  creasi_live.member_talent_portfolio_photo ";
		$rqDataCreasi = $this->apps->fetch($sqlCreasi,1);
		foreach ($rqDataCreasi as $rowCreasi)
		{
			$sqlmember="SELECT * FROM creasi_web_2015.social_member where id='{$rowCreasi['member_id']}'";
			$rqDatamember=$this->apps->fetch($sqlmember);
			if($rqDatamember)
			{
					$sqlcheckmember = "SELECT * FROM creasi_web_2015.my_portofolio where user_id = '{$rowCreasi['member_id']}'  and `id`='{$rowCreasi['id']}'";
					pr($sqlcheckmember);
					$rqcheckmember  = $this->apps->fetch($sqlcheckmember);
					if($rqcheckmember)
					{
					
						echo "ada". $rowCreasi['id'].' '.$rowCreasi['member_id'];
					}
					else
					{
					
						$sqlcount="SELECT count(*) as total FROM  creasi_live.member_talent_portfolio_like where portfolio_id='{$rowCreasi['id']}'";
						pr($sqlcount);
						$rqDatacount = $this->apps->fetch($sqlcount);
						
						$sqlcountview="SELECT count(*) as total FROM  creasi_live.member_talent_portfolio_visitor where portfolio_id='{$rowCreasi['id']}'";
						pr($sqlcount);
						$rqDatacountview = $this->apps->fetch($sqlcountview);
						
						$insetData="INSERT INTO creasi_web_2015.my_portofolio set 
									id='{$rowCreasi['id']}',
									user_id='{$rowCreasi['member_id']}',
									category_id='999',
									type='1',
									title='{$rowCreasi['title']}',
									description='{$rowCreasi['description']}',
									love_count='{$rqDatacount['total']}',
									view_count='{$rqDatacountview['total']}',
									images='{$rowCreasi['filename']}',
									`date`='{$rowCreasi['created']}',
									n_status='{$rowCreasi['is_approved']}'";
						pr($insetData);
						$rqDataCreasi = $this->apps->query($insetData);
					}
			}
		}
	}
	function singprotfoliovideo()
	{
		$sqlCreasi = "SELECT * FROM  creasi_live.member_talent_portfolio_video";
		$rqDataCreasi = $this->apps->fetch($sqlCreasi,1);
		// pr($sqlCreasi);die;
		foreach ($rqDataCreasi as $rowCreasi)
		{
			$sqlmember="SELECT * FROM creasi_web_2015.social_member where id='{$rowCreasi['member_id']}'";
			$rqDatamember=$this->apps->fetch($sqlmember);
			if($rqDatamember)
			{
				
				$sqlcheckmember = "SELECT * FROM creasi_web_2015.my_portofolio where user_id = '{$rowCreasi['member_id']}'  and `id`='{$rowCreasi['id']}'";
					pr($sqlcheckmember);
					$rqcheckmember  = $this->apps->fetch($sqlcheckmember);
					if($rqcheckmember)
					{
					
						echo "ada". $rowCreasi['id'].' '.$rowCreasi['member_id'];
					}
					else
					{
				
				
				
				
				
						$sqlcount="SELECT count(*) as total FROM  creasi_live.member_talent_portfolio_like where portfolio_id='{$rowCreasi['id']}'";
						pr($sqlcount);
						$rqDatacount = $this->apps->fetch($sqlcount);
						
						$sqlcountview="SELECT count(*) as total FROM  creasi_live.member_talent_portfolio_visitor where portfolio_id='{$rowCreasi['id']}'";
						pr($sqlcount);
						$rqDatacountview = $this->apps->fetch($sqlcountview);
						
						
						
						$video_url = $rowCreasi['video_url'];
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
						
						if($id_video_youtube)
						{
						
						
								$insetData="INSERT INTO creasi_web_2015.my_portofolio set 
											id='{$rowCreasi['id']}',
											user_id='{$rowCreasi['member_id']}',
											category_id='999',
											type='2',
											title='{$rowCreasi['title']}',
											description='{$rowCreasi['description']}',
											love_count='{$rqDatacount['total']}',
											view_count='{$rqDatacountview['total']}',
											images='{$rowCreasi['cover']}',
											video_url='{$id_video_youtube}',
											refrance='{$refrence}',
											`date`='{$rowCreasi['created']}',
											n_status='{$rowCreasi['is_approved']}'";
								pr($insetData);
								$rqDataCreasi = $this->apps->query($insetData);
						}
					}
			}
		}
	}
	function singprotfolioaudio()
	{
		$sqlCreasi = "SELECT * FROM  creasi_live.member_talent_portfolio_audio";
		$rqDataCreasi = $this->apps->fetch($sqlCreasi,1);
		// pr($sqlCreasi);die;
		foreach ($rqDataCreasi as $rowCreasi)
		{
			$sqlmember="SELECT * FROM creasi_web_2015.social_member where id='{$rowCreasi['member_id']}'";
			$rqDatamember=$this->apps->fetch($sqlmember);
			if($rqDatamember)
			{
				
				$sqlcheckmember = "SELECT * FROM creasi_web_2015.my_portofolio where user_id = '{$rowCreasi['member_id']}'  and `id`='{$rowCreasi['id']}'";
					pr($sqlcheckmember);
					$rqcheckmember  = $this->apps->fetch($sqlcheckmember);
					if($rqcheckmember)
					{
					
						echo "ada". $rowCreasi['id'].' '.$rowCreasi['member_id'];
					}
					else
					{
				
				
						$sqlcount="SELECT count(*) as total FROM  creasi_live.member_talent_portfolio_like where portfolio_id='{$rowCreasi['id']}'";
						pr($sqlcount);
						$rqDatacount = $this->apps->fetch($sqlcount);
						
						$sqlcountview="SELECT count(*) as total FROM  creasi_live.member_talent_portfolio_visitor where portfolio_id='{$rowCreasi['id']}'";
						pr($sqlcount);
						$rqDatacountview = $this->apps->fetch($sqlcountview);
						
						
						
						
								$insetData="INSERT INTO creasi_web_2015.my_portofolio set 
											id='{$rowCreasi['id']}',
											user_id='{$rowCreasi['member_id']}',
											category_id='999',
											type='3',
											title='{$rowCreasi['title']}',
											description='{$rowCreasi['description']}',
											love_count='{$rqDatacount['total']}',
											view_count='{$rqDatacountview['total']}',
											audio='{$rqDatacount['audio_url']}',
											`date`='{$rowCreasi['created']}',
											n_status='{$rowCreasi['is_approved']}'";
								pr($insetData);
								$rqDataCreasi = $this->apps->query($insetData);
					}
			}
		}
	}
	function singguardian()
	{
		$sqlCreasi = "SELECT * FROM  creasi_live.member_talent_guardian ";
		$rqDataCreasi = $this->apps->fetch($sqlCreasi,1);
		
		foreach ($rqDataCreasi as $rowCreasi)
		{
			$sqlmember="SELECT * FROM creasi_web_2015.social_member where id='{$rowCreasi['member_id']}'";
			$rqDatamember=$this->apps->fetch($sqlmember);
			
			if($rqDatamember)
			{
				$sqlcheckmember = "SELECT * FROM creasi_web_2015.my_guardian where user_id = {$rowCreasi['id']} ";
				pr($sqlcheckmember);
				$rqcheckmember  = $this->apps->fetch($sqlcheckmember);
				if($rqcheckmember=='')
				{
				
				
					if($rowCreasi['is_hidden']==0)
					{
						$status=1;
						
					}
					else
					{
						$status=0;
					}
					
					$insetData="INSERT INTO creasi_web_2015.my_guardian set 
								user_id='{$rqDatamember['id']}',
								name_parent='{$rowCreasi['parent_name']}',
								relation_parent='{$rowCreasi['relation']}',
								birth='{$rowCreasi['dob']}',
								phone='{$rowCreasi['phone']}',
								identitas='{$rowCreasi['idcard_num']}',
								address='{$rowCreasi['address']}',
								 email='{$rowCreasi['email']}',
								`date`=NOW(),
								n_status='{$rowCreasi['is_hidden']}'";
					pr($insetData);
					$rqDataCreasi = $this->apps->query($insetData);
				}
			}
		}
	}
	function singmember()
	{
	global $CONFIG;
		
		$sqlCreasi = "SELECT * FROM  creasi_live.member  LEFT JOIN  creasi_live.member_talent  ON  creasi_live.member.id= creasi_live.member_talent.member_id ";
		
		$rqDataCreasi = $this->apps->fetch($sqlCreasi,1);
		
		foreach ($rqDataCreasi as $rowCreasi)
		{
			$sqlCreasi = "SELECT * FROM creasi_web_2015.tbl_acuan where user_id = {$rowCreasi['id']} ";
			pr($sqlCreasi);
			$rqDataCreasi = $this->apps->fetch($sqlCreasi);
			if($rqDataCreasi)
			{
				
				$sqlcheckmember = "SELECT * FROM creasi_web_2015.social_member where user_id = {$rowCreasi['id']} ";
				pr($sqlcheckmember);
				$rqcheckmember  = $this->apps->fetch($sqlcheckmember);
				if($rqcheckmember=='')
				{
					$lastname = explode(' ',$rqDataCreasi['full_name']);
					if($lastname[1])
					{
						$lastnameok= $lastname[1];
						$nameok= $lastname[0];
					}
					else
					{
						$lastnameok='';
						$nameok= $rqDataCreasi['full_name'];
					}
					$sqlcity="SELECT * FROM creasi_web_2015.city_reference where id='{$rowCreasi['city_id']}'";
					$rqDataCity=$this->apps->fetch($sqlcity);
					pr($sqlcity);
					$insetData="INSERT INTO creasi_web_2015.social_member set 
								id='{$rowCreasi['id']}',
								name='{$nameok}',
								nickname='{$rqDataCreasi['nickname']}',
								lastname='{$lastnameok}',
								email='{$rqDataCreasi['email']}',
								register_date='{$rowCreasi['created']}',
								img='{$rowCreasi['avatar']}',
								img_cover='{$rowCreasi['cover']}',
								img_avatar='{$rowCreasi['avatar']}',
								provincy='{$rqDataCity['provinceName']}',
								city='{$rqDataCity['city']}',
								sex='{$rowCreasi['gender']}',
								birthday='{$rowCreasi['dob']}',
								last_name='{$lastnameok}',
								testimoni='{$rowCreasi['snapshot']}',
								phone_number='{$rowCreasi['phone']}',
								fb_link='{$rowCreasi['AlodiaGosiengfiao']}',
								twitter_link='{$rowCreasi['url_facebook']}',
								instagram_link='{$rowCreasi['url_instagram']}',
								website_link='{$rowCreasi['url_web']}',
								role='1',
								login_count='',
								view_count='{$rowCreasi['is_show_profile_page']}',
								salt='12345678',
								password='',
									n_status='1'";
						pr($insetData);
					$rqDataCreasi = $this->apps->query($insetData);
					$insetData="INSERT INTO creasi_web_2015.tbl_talent set 
								user_id='{$rowCreasi['id']}',
								no_tlp='{$rqDataCreasi['phone']}',
								provinsi='{$rqDataCreasi['email']}',
								city='{$rqDataCity['city']}',
								images_profile='{$rowCreasi['cover']}',
								privacy='{$rowCreasi['is_hidden']}',
								n_status='1'";
					pr($insetData);
					$rqDataCreasi = $this->apps->query($insetData);
				}
			}
			
		}
		
		
		return $rqData;
		//pr($rqData);exit;
	}
	
		
}
	
