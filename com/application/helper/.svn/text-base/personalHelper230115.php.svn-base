<?php
class personalHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	function addportoimages(){
		global $CONFIG;
		$title=$this->apps->_p('title_galery');
		$desc_galery=$this->apps->_p('desc_galery');
		$idimage=$this->apps->_p('id_image');
		
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio set `title`='{$title}',`description`='{$desc_galery}' where `id`='{$idimage}'";
		$resi = $this->apps->query($sql,1);
	
		$sql = "select * from {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio where `id`='{$idimage}'";
		$res = $this->apps->fetch($sql,1);
		
		return $res;
		
	}
	function editexperience(){
		global $CONFIG;
		// pr($_POST);exit;
		
		$category=$this->apps->_p('category');
		$editexperience=$this->apps->_p('editexperience');
		$sql = "delete  from {$CONFIG['DATABASE'][0]['DATABASE']}.my_experience where `user_id`='{$editexperience}' and category_id='{$category}' ";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
		
		$loopinsertexp=count($_POST['yearstart']);
		
		if($loopinsertexp != '')
		{
			
			for($i=0;$i<$loopinsertexp;$i++)
				{
				
				$yearstart=@$_POST['yearstart'][$i];
				$monthstart=@$_POST['monthstart'][$i];
				$startdate=date($yearstart.'-'.$monthstart.'-'.'d');
		
				$yearend=@$_POST['yearend'][$i];
				$monthend=@$_POST['monthend'][$i];
				$enddate=date($yearend.'-'.$monthend.'-'.'d');
		
				$detail_exp=@$_POST['detail_exp'][$i];
				$editexperience=@$_POST['editexperience'];
				
				$sql = "insert into {$CONFIG['DATABASE'][0]['DATABASE']}.my_experience set `periode_start`='{$startdate}',`category_id`='{$category}',`periode_end`='{$enddate}',`detail_exp`='{$detail_exp}',`user_id`='{$editexperience}',`n_status`='1'";
				$resi = $this->apps->query($sql,1);
				}
		}
		
		
		return true;
		
		
		
	}
	function checkprotocountphoto(){
		global $CONFIG;
		$this->user=$this->apps->session->getSession($this->config['SESSION_NAME'],"WEB");
		$sql = "select count(*) as total from {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio where `user_id`='{$this->user->id}' and type='1' and n_status='1' ";
		$res = $this->apps->fetch($sql);
		
		return $res;
	}
	function checkprotocountvideo(){
		global $CONFIG;
		$this->user=$this->apps->session->getSession($this->config['SESSION_NAME'],"WEB");
		$sql = "select count(*) as total from {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio where `user_id`='{$this->user->id}' and type='2' and n_status='1' ";
		$res = $this->apps->fetch($sql); 
		
		return $res;
	}
	function checkprotocountaudio(){
		global $CONFIG;
		$this->user=$this->apps->session->getSession($this->config['SESSION_NAME'],"WEB");
		$sql = "select count(*) as total from {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio where `user_id`='{$this->user->id}' and type='3' and n_status='1'";
		$res = $this->apps->fetch($sql);
		
		return $res;
	}
	function addportophoto(){
		global $CONFIG;
		
		$title=$this->apps->_p('title_galery');
		$desc_galery=$this->apps->_p('desc_galery');
		$userid=$this->apps->_p('userid'); 
		$photo=@$this->apps->_p('photo');
		$video=@$this->apps->_p('video');
		$audio=@$this->apps->_p('audio');
			$category=@$this->apps->_p('category');
		$type=$this->apps->_p('type');
		$refrance=@$this->apps->_p('refrance');
		
		$sql = "insert {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio set 
					`user_id`='".@$userid."',
					`category_id`='".$category."',
					`type`='".$type."',
					`title`='".@$title."',
					`description`='".$desc_galery."',
					`images`='".$photo."',
					`video_url`='".$video."',
					`audio`='".$audio."',
					`refrance`='".$refrance."',
					`date`=NOW(),
					`n_status`='1'
					";
		// pr($sql);die;
		$resi = $this->apps->query($sql);
	
		
		
		return $resi;
		
	}
	
	function updatepersonalfoto($id,$filenamenya){
		global $CONFIG;
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.social_member set img_avatar='{$filenamenya}'  where `id`='{$id}'";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
		if($res)
		{
			return true;
		}else
			{
			return false;
		}
		
		
		}
	function updatecoverfoto($id,$filenamenya){
		global $CONFIG;
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.social_member set img_cover='{$filenamenya}'  where `id`='{$id}'";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
		if($res)
		{
			return true;
		}else
			{
			return false;
		}
		
		
		}
	function editpersonal($id,$uploadnews){
		global $CONFIG;
		//pr('ssdssd');exit;
		//pr($uploadnews);pr($id);pr($_POST);exit;
		if ($uploadnews =='')
		{//echo "ss";exit;
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.social_member set `name`='$_POST[name]',`StreetName`='{$_POST['alamat']}',`phone_number`='{$_POST['telp']}' where `id`='{$id}'";
		
		
		}else{
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.social_member set `name`='$_POST[name]',`StreetName`='$_POST[alamat]',`phone_number`='$_POST[telp]',`img`='{$uploadnews}',img_avatar='{$uploadnews}' where id='{$id}'";
		//pr($sql);exit;
		}
		
		
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
	
		return true;
		}	
		
	function editbiopersonal(){
		global $CONFIG;
		//pr($_POST);exit;
		$bioid = $this->apps->_p('bioid');
		$testimoni = $this->apps->_p('testimoni');
		$nickname=$this->apps->_p('nickname');
		$telp=$this->apps->_p('telp');
		$email=$this->apps->_p('email');
		$namecp=$this->apps->_p('namecp');
		$phonecp=$this->apps->_p('phonecp');
		
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.social_member set `nickname`='{$nickname}',`phone_number`='{$telp}',`email`='{$email}',`testimoni`='{$testimoni}' where id='{$bioid}'";
		
	//	pr($sql);exit;
		$res = $this->apps->query($sql,1);
	
		return true;
		}	
	function province(){
		global $CONFIG;
		$sqlcheck ="SELECT *
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.province_reference";
		$rqData = $this->apps->fetch($sqlcheck,1);
		return $rqData;
	}	
	function city(){
		global $CONFIG;
		$id=$this->apps->_p('id');
		$sqlcheck ="SELECT *
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.city_reference where provinceName='{$id}'";
						//pr($sqlcheck);
		$rqData = $this->apps->fetch($sqlcheck,1);
		return $rqData;
	}
	function selectmyeducation($id){
		global $CONFIG;
	
		$sqlcheck ="SELECT *
						FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_education where user_id='{$id}'";
						//pr($sqlcheck);
		$rqData = $this->apps->fetch($sqlcheck,1);
		return $rqData;
	}
	function selectcategory($id){
		global $CONFIG;
	
					$sqlcheck ="select *,mc.id as idnya from {$CONFIG['DATABASE'][0]['DATABASE']}.my_attribut_category mc
			left join tbl_category tc on mc.category_id=tc.id
			 left join tbl_subcategory ts on mc.subcategory_id=ts.id
			where mc.user_id='{$id}' group by mc.category_id";
		//pr($sqlcheck);
		$rqData = $this->apps->fetch($sqlcheck,1);
		//pr($rqData);exit;
		
		if($rqData) {
			$no = 1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				//My Looking For sama Open For nya 
				$arrayfetchr= array();
				$sql="select * from my_portofolio where category_id='{$val['category_id']}' and user_id={$val['user_id']}";
				//pr($sql);exit;
				$fetch = $this->apps->fetch($sql,1);
				//pr($sql);exit;
			 	$val['related']=$fetch;
				$sql="select mlf.loking_for_id from my_loking_for mlf where arrtibut_category_id='{$val['idnya']}' and user_id={$val['user_id']}";
				//pr($sql);exit;
				$rqDataa = $this->apps->fetch($sql,1);
				
				//pr($rqDataa);exit;
				$arrayfor= array();
				if($rqDataa)
				{
					foreach ($rqDataa as $vals)
					{
						if($vals)
						{
							$arrayfor['loking_for_id'][]=$vals['loking_for_id'];
						}
					}
				
				}
				
				
				
				$val['mlfor']=$arrayfor;
				$sql="select oppen_for from my_open_for mof where attribut_category_id='{$val['idnya']}' and user_id={$val['user_id']}";
				//pr($sql);exit;
				$rqDataf = $this->apps->fetch($sql,1);
				//pr($rqDataf);exit;
				$arrayopen = array();
				//foreach($rqDataf as $val2)
				if($rqDataf)
				{
					foreach ($rqDataf as $val2)
					{
						if($val2)
						{
							$arrayopen['oppen_for'][]=$val2['oppen_for'];
						}
					}
				
				}
				$val['moffor']=$arrayopen;
				
				
				$sql="select * from my_experience where category_id='{$val['category_id']}' and user_id={$val['user_id']}";
				//pr($sql);exit;
				$rqDatamc = $this->apps->fetch($sql,1);
				$arrayexp = array();
				if($rqDatamc)
				{
					foreach ($rqDatamc as $val3)
					{
						if($val3)
						{
							$arrayexp[]=$val3;
						}
					}
				
				}
				
				$val['arrayexp']=$arrayexp;
				
				
				$sql="select * from  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_subcategory where category_id='{$val['category_id']}'";
				$rqDatasubcat = $this->apps->fetch($sql,1);
				$arraysubcat = array();
				if($rqDatasubcat)
				{
					foreach ($rqDatasubcat as $val4)
					{
						if($val4)
						{
							$arraysubcat[]=$val4;
						}
					}
				
				}
				
				$val['arraysubcat']=$arraysubcat;
				
				$sqlcheck ="select *,mc.id as idnya from {$CONFIG['DATABASE'][0]['DATABASE']}.my_attribut_category mc
								left join tbl_category tc on mc.category_id=tc.id
								 left join tbl_subcategory ts on mc.subcategory_id=ts.id
								where mc.user_id='{$id}' and mc.category_id='{$val['category_id']}'";
							//pr($sqlcheck);
				$rqDatacategorydetail = $this->apps->fetch($sqlcheck,1);
				//pr($rqDatacategorydetail);exit;
			if($rqDatacategorydetail) {
			$no = 1;
			foreach($rqDatacategorydetail as $keyx => $valx){
				$valx['no'] = $no++;
				//My Looking For sama Open For nya 
				$sql="select mlf.loking_for_id from my_loking_for mlf where arrtibut_category_id='{$valx['idnya']}' and user_id={$val['user_id']}";
				//pr($sql);exit;
				$rqDatacategorydetaila = $this->apps->fetch($sql,1);
				//pr($rqDatacategorydetaila);exit;
				$arrayfor= array();
				if($rqDatacategorydetaila)
				{
					foreach ($rqDatacategorydetaila as $valc)
					{
						if($valc)
						{
							$arrayfor['loking_for_id'][]=$valc['loking_for_id'];
						}
					}
				
				}
				
				
				
				$valx['mlfor']=$arrayfor;
				$sql="select oppen_for from my_open_for mof where attribut_category_id='{$valx['idnya']}' and user_id={$val['user_id']}";
				//pr($sql);exit;
				$rqDatacategorydetailf = $this->apps->fetch($sql,1);
				
				$arrayopen = array();
				//foreach($rqDatacategorydetailf as $val2)
				if($rqDatacategorydetailf)
				{
					foreach ($rqDatacategorydetailf as $valv)
					{
						if($valv)
						{
							$arrayopen['oppen_for'][]=$valv['oppen_for'];
						}
					}
				
				}
				$valx['moffor']=$arrayopen;
				
				
				$rqDatacategorydetail[$keyx] = $valx;
				
				
			}
			//pr($rqDatacategorydetail);exit;
			if($rqDatacategorydetail) $qData2=	$rqDatacategorydetail;
			else $qData2 = false;
		} else $qData2 = false;
		
		$val['categorydetail']=$qData2;
				//pr($rqDatacategorydetail);exit;
				$rqData[$key] = $val;
				
				
			}
			//pr($rqData);exit;
			if($rqData) $qData=	$rqData;
			else $qData = false;
		} else $qData = false;
		
		$result['result'] = $qData;
	
		//pr($result);exit;
		return $result;
	}
	function selectcategorydetail($id){
		global $CONFIG;
	
		$sqlcheck ="select *,mc.id as idnya from {$CONFIG['DATABASE'][0]['DATABASE']}.my_attribut_category mc
			left join tbl_category tc on mc.category_id=tc.id
			 left join tbl_subcategory ts on mc.subcategory_id=ts.id
			where mc.user_id='{$id}'";
		//pr($sqlcheck);
		$rqData = $this->apps->fetch($sqlcheck,1);
		//pr($rqData);exit;
		if($rqData) {
			$no = 1;
			foreach($rqData as $key => $val){
				$val['no'] = $no++;
				//My Looking For sama Open For nya 
				$sql="select mlf.loking_for_id from my_loking_for mlf where arrtibut_category_id='{$val['idnya']}' and user_id={$val['user_id']}";
				//pr($sql);exit;
				$rqDataa = $this->apps->fetch($sql,1);
				//pr($rqDataa);exit;
				$arrayfor= array();
				if($rqDataa)
				{
					foreach ($rqDataa as $vals)
					{
						if($vals)
						{
							$arrayfor['loking_for_id'][]=$vals['loking_for_id'];
						}
					}
				
				}
				
				
				
				$val['mlfor']=$arrayfor;
				$sql="select oppen_for from my_open_for mof where attribut_category_id='{$val['idnya']}' and user_id={$val['user_id']}";
				//pr($sql);exit;
				$rqDataf = $this->apps->fetch($sql,1);
				
				$arrayopen = array();
				//foreach($rqDataf as $val2)
				if($rqDataf)
				{
					foreach ($rqDataf as $val2)
					{
						if($val2)
						{
							$arrayopen['oppen_for'][]=$val2['oppen_for'];
						}
					}
				
				}
				$val['moffor']=$arrayopen;
				
				
				$rqData[$key] = $val;
				
				
			}
			//pr($rqData);exit;
			if($rqData) $qData=	$rqData;
			else $qData = false;
		} else $qData = false;
		
		$result['result'] = $qData;
	
		//pr($result);exit;
		return $result;
		
		

		
	}
	function selectexperience($id){
		global $CONFIG;
	
					$sqlcheck ="select * from {$CONFIG['DATABASE'][0]['DATABASE']}.my_experience me where me.user_id='{$id}'";
		//pr($sqlcheck);
		$rqData = $this->apps->fetch($sqlcheck,1);
		return $rqData;
	}
	function selectlike($id){
		global $CONFIG;
		$sqlcheck ="select * from {$CONFIG['DATABASE'][0]['DATABASE']}.my_love me where me.user_id='{$id}' and me.friend_id='{$id}'";
		//pr($sqlcheck);
		$rqData = $this->apps->fetch($sqlcheck,1);
		return $rqData;
	}
	function selectlikefriend($id,$uid){
		global $CONFIG;
		$sqlcheck ="select * from {$CONFIG['DATABASE'][0]['DATABASE']}.my_love me where me.user_id='{$uid}' and me.friend_id='{$id}'";
		//pr($sqlcheck);
		$rqData = $this->apps->fetch($sqlcheck,1);
		return $rqData;
	}
	function selectlikes_img($id_img,$id_friend,$id_user){
		global $CONFIG;
		$sqlcheck ="select * from {$CONFIG['DATABASE'][0]['DATABASE']}.my_love_portofolio me where me.user_id='{$id_user}' and me.friend_id='{$id_friend}' and me.id_portfolio	='{$id_img}'";
		//pr($sqlcheck);
		$rqData = $this->apps->fetch($sqlcheck,1);
		return $rqData;
	}
	function selectlikes_video($id_video,$id_friend,$id_user){
		global $CONFIG;
		$sqlcheck ="select * from {$CONFIG['DATABASE'][0]['DATABASE']}.my_love_portofolio me where me.user_id='{$id_user}' and me.friend_id='{$id_friend}' and me.id_portfolio	='{$id_video}'";
		//pr($sqlcheck);
		$rqData = $this->apps->fetch($sqlcheck,1);
		return $rqData;
	}
	function editguardian(){
		global $CONFIG;
		
		
		$nparent = $this->apps->_p('nparent');
		$r_talent = $this->apps->_p('r_talent');
		$datenya="".$this->apps->_p('parentyear')."-".$this->apps->_p('parentmonth')."-".$this->apps->_p('parentdate')."";
		$phone_parent = $this->apps->_p('phone_parent');
		$id_parent = $this->apps->_p('id_parent');
		$parent_address = $this->apps->_p('parent_address');
		$parent_email = $this->apps->_p('parent_email');
		$bioid = $this->apps->_p('guardian');
		//pr($datenya);exit;
		
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.my_guardian set `name_parent`='{$nparent}',relation_parent='{$r_talent}',`birth`='{$datenya}',`phone`='{$phone_parent}',`identitas`='{$id_parent}' ,`address`='{$parent_address}',`email`='{$parent_email}' where user_id='{$bioid}'";
		
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
		
		$iduser=$bioid;
		$sql="SELECT * FROM  social_member where id={$iduser}";
		$fetch = $this->apps->fetch($sql);
		if($fetch)
		{
			$message='<a href="'.$CONFIG['ADMIN_DOMAIN'].'personalmanagement/detail?id='.$iduser.' "> '.@$fetch['name'].' </a> has update guardian information'; 
				
			$query="insert into gm_notifikasi set
							`user_id`='{$iduser}',
							`title`='Update Guardian',
							`detail`='{$message}',
							`date`=NOW(),
							`n_status`=1
							";
				$qdata = $this->apps->query($query);
		}
		return true;
		}		
	function editbioinput(){
		global $CONFIG;
	
		$name = $this->apps->_p('name');
		$lastname = $this->apps->_p('lastname');
		$provincy = $this->apps->_p('provincy');
		$city = $this->apps->_p('city');
		$fb = $this->apps->_p('fb');
		if($fb)
		{
			$fb=str_replace('https://www.facebook.com/','',$fb);
			$fb=str_replace('http://www.facebook.com/','',$fb);
			$fb=str_replace('www.facebook.com/','',$fb);
			$fb=str_replace('www.facebook.com','',$fb);
		}
		$twitter = $this->apps->_p('twitter');
		if($twitter)
		{
			$twitter=str_replace('https://twitter.com/','',$twitter);
			$twitter=str_replace('http://twitter.com/','',$twitter);
			$twitter=str_replace('twitter.com/','',$twitter);
			$twitter=str_replace('twitter.com','',$twitter);
		
		}
		$youtube = $this->apps->_p('youtube');
		if($youtube)
		{
				$youtube=str_replace('https://www.youtube.com/user/','',$youtube);
			$youtube=str_replace('http://www.youtube.com/user/','',$youtube);
			$youtube=str_replace('www.youtube.com/user/','',$youtube);
			$youtube=str_replace('www.youtube.com/','',$youtube);
			$youtube=str_replace('www.youtube.com','',$youtube);
		
		}
		$instagram = $this->apps->_p('instagram');
		if($instagram)
		{
				$instagram=str_replace('http://instagram.com/','',$instagram);
			$instagram=str_replace('https://instagram.com/','',$instagram);
			$instagram=str_replace('instagram.com/','',$instagram);
			$instagram=str_replace('instagram.com','',$instagram);
		
		}
		$bioinput = $this->apps->_p('bioinput');
		//pr($datenya);exit;
		
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.social_member set `name`='{$name}',lastname='{$lastname}',`provincy`='{$provincy}',`city`='{$city}',`fb_link`='{$fb}' ,`twitter_link`='{$twitter}',`instagram_link`='{$instagram}',`youtube_link`='{$youtube}' where id='{$bioinput}'";
		
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
		
		return true;
		}	
	function editbiopersonalts(){
		global $CONFIG;
	
		$brand = $this->apps->_p('brand');
	
		$provincy = $this->apps->_p('provincy');
		$city = $this->apps->_p('city');
		$fb = $this->apps->_p('fb');
		$website= $this->apps->_p('website');
		if($fb)
		{
			$fb=str_replace('https://www.facebook.com/','',$fb);
			$fb=str_replace('http://www.facebook.com/','',$fb);
			$fb=str_replace('www.facebook.com/','',$fb);
			$fb=str_replace('www.facebook.com','',$fb);
		}
		$twitter = $this->apps->_p('twitter');
		if($twitter)
		{
			$twitter=str_replace('https://twitter.com/','',$twitter);
			$twitter=str_replace('http://twitter.com/','',$twitter);
			$twitter=str_replace('twitter.com/','',$twitter);
			$twitter=str_replace('twitter.com','',$twitter);
		
		}
		$youtube = $this->apps->_p('youtube');
		if($youtube)
		{
				$youtube=str_replace('https://www.youtube.com/user/','',$youtube);
			$youtube=str_replace('http://www.youtube.com/user/','',$youtube);
			$youtube=str_replace('www.youtube.com/user/','',$youtube);
			$youtube=str_replace('www.youtube.com/','',$youtube);
			$youtube=str_replace('www.youtube.com','',$youtube);
		
		}
		$instagram = $this->apps->_p('instagram');
		if($instagram)
		{
				$instagram=str_replace('http://instagram.com/','',$instagram);
			$instagram=str_replace('https://instagram.com/','',$instagram);
			$instagram=str_replace('instagram.com/','',$instagram);
			$instagram=str_replace('instagram.com','',$instagram);
		
		}
		$bioinput = $this->apps->_p('bioinput');
		//pr($datenya);exit;
		
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent_seeker set `provinsi`='{$provincy}',`city`='{$city}' where user_id='{$bioinput}'";
		
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.social_member set `nama_perusahaan`='{$brand}',`provincy`='{$provincy}',`city`='{$city}',`fb_link`='{$fb}' ,`twitter_link`='{$twitter}',`instagram_link`='{$instagram}',`youtube_link`='{$youtube}',`website_link`='{$website}' where id='{$bioinput}'";
		
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
		return true;
		}	
	function companyinfo(){
		global $CONFIG;

		$brand = $this->apps->_p('brand');
		$name = $this->apps->_p('namecp');
		$lastname = $this->apps->_p('lastname');
		$email = $this->apps->_p('email');
		$phone = $this->apps->_p('phone');
		$address = $this->apps->_p('address');
		$testimoni = $this->apps->_p('testimoni');
		$companyinf = $this->apps->_p('companyinf');
		//pr($datenya);exit;
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.social_member set `name`='{$name}',`lastname`='{$lastname}',`email`='{$email}',`testimoni`='{$testimoni}' where id='{$companyinf}'";
		
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
		
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent_seeker set `nama_perusahaan`='{$brand}',`alamat_perusahaan`='{$address}',`no_tlp`='{$phone}' where user_id='{$companyinf}'";
		
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
	
		return true;
		}	
	function whyjoinuss(){
		global $CONFIG;
	//pr($_POST);exit;
		$whyjoinuss = $this->apps->_p('whyjoinuss');
		$whyjoin = $this->apps->_p('whyjoin');
	
		
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent_seeker set `whyjoinus`='{$whyjoinuss}' where user_id='{$whyjoin}'";
		
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
	
		return true;
		}		
	function editeducations(){
		global $CONFIG;
		
		$sql = "delete from my_education where `user_id`=".@$_POST['educations']."";
		//pr($sql);
		$res = $this->apps->query($sql);
		// pr($_POST);exit;
		$fordari=@$_POST;
		$jumlah = count($_POST['study']);
		$ipnya=$_SERVER['REMOTE_ADDR'];
		//pr($jumlah);
		if($fordari != '')
		{
			
			for($i=0;$i<$jumlah;$i++)
				{
				
					//echo $val;
					$sql = "insert {$CONFIG['DATABASE'][0]['DATABASE']}.my_education set `tahunmasuk`='".@$fordari['dari'][$i]."',
					`tahunlulus`='".@$fordari['sampai'][$i]."',
					`degree`='".@$fordari['degree'][$i]."',
					`institusi`='".@$fordari['school'][$i]."',
					`bidang_studi`='".@$fordari['study'][$i]."',`IP`='".$ipnya."',`user_id`='".@$fordari['educations']."',`n_status`='1'
					";
					//pr($sql);
					$res = $this->apps->query($sql,1);
					
				}
		}
		return true;
		
		
		}			
	function listpersonal($uid){
		global $CONFIG;
		
		//pr($uid);exit;
		
		//$sql = "SELECT *,mp.id as idportofolio,tt.id as id_talent, sm.view_count,sm.love_count FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent tt left join social_member as sm on tt.user_id=sm.id left join my_portofolio as mp on sm.id=mp.user_id where sm.id='{$uid}' limit 1 ";
		$sql = "SELECT sm.*,tt.user_id,mp.id as idportofolio,tt.id as id_talent, sm.view_count,sm.love_count FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent tt left join social_member as sm on tt.user_id=sm.id left join my_portofolio as mp on sm.id=mp.user_id where sm.id='{$uid}' limit 1 ";
		// pr($sql);exit;
		$res['datadiri'] = $this->apps->fetch($sql,1);
		//pr($res);exit;
		$ultah=birthday($res['datadiri'][0]['birthday']);
		//pr($ultah);
		$res['ultah']=$ultah;
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member as sm left join my_guardian as mg on sm.id=mg.user_id where sm.id='{$uid}' limit 1 ";
		//pr($sql);exit;
		$res['guardian'] = $this->apps->fetch($sql,1);
	//pr($res['guardian']);exit;
		return $res;
		}
		
	function listpersonalts($uid){
		global $CONFIG;
		
		//pr($uid);exit;
		
		//$sql = "SELECT *,mp.id as idportofolio,tt.id as id_talent, sm.view_count,sm.love_count FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent tt left join social_member as sm on tt.user_id=sm.id left join my_portofolio as mp on sm.id=mp.user_id where sm.id='{$uid}' limit 1 ";
		$sql = "SELECT sm.*,tt.*,tt.user_id,mp.id as idportofolio,tt.provinsi as provinsi,tt.city as city,tt.id as id_talent, sm.view_count,sm.love_count FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent_seeker tt left join social_member as sm on tt.user_id=sm.id left join my_portofolio as mp on sm.id=mp.user_id where sm.id='{$uid}' limit 1 ";
		//pr($sql);exit;
		$res['datadiri'] = $this->apps->fetch($sql,1);
		//pr($res);exit;
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.social_member as sm left join my_guardian as mg on sm.id=mg.user_id where sm.id='{$uid}' limit 1 ";
		//pr($sql);exit;
		$res['guardian'] = $this->apps->fetch($sql,1);
	//pr($res['guardian']);exit;
		return $res;
		}
		
	function addcomment(){
		global $CONFIG;
	
		$comment=strip_tags($this->apps->_p('comment'));
		$id_portofolio=$this->apps->_p('id_portofolio');
		$id_user=strip_tags($this->apps->_p('id_user'));
		//pr($uid);exit;
		
		$sql = "insert into  {$CONFIG['DATABASE'][0]['DATABASE']}.my_comment set `portofolio_id`='{$id_portofolio}',
				user_id='{$id_user}',comment='{$comment}',date=NOW(),n_status=1";
		$res = $this->apps->query($sql);
		// pr($sql);exit;
		return true;
		}
	function delcomment(){
		global $CONFIG;
		
			$comment=$this->apps->_p('idcomment');
			
			
			$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.my_comment set n_status=0 where id_comment='{$comment}'";
			$res = $this->apps->query($sql);
			$data['status']=1;
			$data['msg']='';
			return $data;
		}	
	function delportfolio(){
		global $CONFIG;
		
			$idport=$this->apps->_request('idport');
			$iduser=$this->apps->_request('iduser');
			
			$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio set n_status=2 where id='{$idport}' and user_id='{$iduser}' ";
			// pr($sql);die;
			$res = $this->apps->query($sql);
			$data['status']=1;
			$data['msg']='';
			return $data;
		}	
	function subcategory($paramcat){
		global $CONFIG;
	
	
		
		$sql = "select * from  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_subcategory where category_id='{$paramcat}'";
		$res = $this->apps->fetch($sql,1);
		//pr($sql);exit;
		return $res;
		}
			
	function editcategory(){
		global $CONFIG;
	
		//pr($_POST);exit;
		
		$id_user=strip_tags($this->apps->_p('categorynya'));
		$id_category=strip_tags($this->apps->_p('idcategory'));
		$sql = "delete from  {$CONFIG['DATABASE'][0]['DATABASE']}.my_attribut_category where
		user_id='{$id_user}' and category_id='{$id_category}'";
		$res = $this->apps->query($sql,1);
		$sql = "delete from  {$CONFIG['DATABASE'][0]['DATABASE']}.my_open_for where
		user_id='{$id_user}' and category_id='{$id_category}'";
		$res = $this->apps->query($sql,1);
		$sql = "delete from  {$CONFIG['DATABASE'][0]['DATABASE']}.my_loking_for where
		user_id='{$id_user}' and category_id='{$id_category}'";
		$res = $this->apps->query($sql,1);
		
		$arraycounting=count($_POST['agenthave']);
		//pr($arraycounting);exit;
				
		for ($i = 0; $i < $arraycounting; $i++) {
		//pr($_POST);exit;
	
				$sql = "insert into  {$CONFIG['DATABASE'][0]['DATABASE']}.my_attribut_category set 
				`short_description`='{$_POST['shortdesc'][$i]}',`user_id`='{$id_user}',category_id='{$_POST['idcategory']}'
				,`subcategory_id`='{$_POST['subcategory'][$i]}',`agent`='{$_POST['agenthave'][$i]}',`name_agent`='{$_POST['agentname'][$i]}',`date`=NOW(),`n_status`='1'";
				
				$res = $this->apps->query($sql,1);
				$getlast=$this->apps->getLastInsertId($res);
				//pr($_POST['openfor'][$i]);exit;
				if(@$_POST['openfor'][$i])
				{
					$arr=count($_POST['openfor'][$i]);
					if ($arr != '')
					{
						for ($j = 0; $j < $arr; $j++) 
						{
					
						$sql = "insert into  {$CONFIG['DATABASE'][0]['DATABASE']}.my_open_for set 
						`user_id`='{$id_user}',`category_id`='{$_POST['idcategory']}',subcategory_id='{$_POST['subcategory'][$i]}'
						,`attribut_category_id`='{$getlast}',`oppen_for`='{$_POST['openfor'][$i][$j]}',`date`=NOW(),`n_status`='1' ";
						//pr($sql);exit;
						$res = $this->apps->query($sql,1);
					
						}
					}
				}
				if(@$_POST['lookingfor'][$i])
				{
					$arr2=count($_POST['lookingfor'][$i]);
					if ($arr2 != '')
					{
						for ($k = 0; $k < $arr2; $k++) 
						{
					
						$sql = "insert into  {$CONFIG['DATABASE'][0]['DATABASE']}.my_loking_for set 
						`user_id`='{$id_user}',`category_id`='{$_POST['idcategory']}',subcategory_id='{$_POST['subcategory'][$i]}'
						,`arrtibut_category_id`='{$getlast}',`loking_for_id`='{$_POST['lookingfor'][$i][$k]}',`date`=NOW(),`n_status`='1'";
					//pr($sql);
						$res = $this->apps->query($sql,1);
						
						}
					}
				}
				//pr($getlast);
				
				
		}
		
		//pr($sql);exit;
		return true;
		}

		
	function getportoimages($id,$uid){
		global $CONFIG;
		
		//pr($uid);exit;
		
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio mp where mp.id='{$id}' and mp.user_id='{$uid}' and type='1'";
		$res = $this->apps->fetch($sql);
		// pr($sql);
		return $res;
		}	
	function getAllportoimages($uid){
		global $CONFIG;
		
		//pr($uid);exit;
		$id=$this->apps->_request('images');
		
		
		
		
		$data['status']=0;
		$data['result']=false;
		
		$sqlminmax = "SELECT MAX(id) AS first ,MIN(id) AS Last ,
		(select id from my_portofolio where id > '{$id}' and user_id='{$uid}' and n_status!=2   and type='1' LIMIT 1) as nexts,
		(select id from my_portofolio where id < '{$id}' and user_id='{$uid}' and n_status!=2    and type='1' ORDER BY id LIMIT 1) as prevs
		FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio mp where  mp.user_id='{$uid}' and mp.n_status!=2 type='1'";
		// pr($sqlminmax);die;
		$resminmax = $this->apps->fetch($sqlminmax);
		// pr($resminmax);die;
		$data['first']=$resminmax['first'];
		$data['Last']=$resminmax['Last'];
		$data['next']=$resminmax['nexts'];
		$data['prev']=$resminmax['prevs'];
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio mp where  mp.user_id='{$uid}' and mp.n_status!=2 and type='1'";
		$res = $this->apps->fetch($sql,1);
		
		// pr($res);
		$i=0;
		$h=0;
		foreach ($res as $key=>$row)
		{
			


			if($h==4)
			{
				$h=0;
				$i++;
				if($row['id']==$id)
				{
					$data['slide']=$i;
					
				}

				$data['result'][$i][$h]=$res[$key];
				$data['status']=1;
			}
			else
			{
				if($row['id']==$id)
				{
					$data['slide']=$i;
					
				}
				
				$data['result'][$i][$h]=$res[$key];
				$data['status']=1;
				$h++;
				
			}
		}
		// pr($data);die;
		return $data;
		}	
		
	function getportovideo($id,$uid){
		global $CONFIG;
		
		//pr($uid);exit;
		
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio mp where mp.id='{$id}' and mp.user_id='{$uid}' and mp.n_status!=2 and type='2'";
		$res = $this->apps->fetch($sql);
		// pr($sql);
		return $res;
		}	
	function getAllportovideo($uid){
		global $CONFIG;
		
		//pr($uid);exit;
		$id=$this->apps->_request('video');
		
		
		
		
		$data['status']=0;
		$data['result']=false;
		
		$sqlminmax = "SELECT MAX(id) AS first ,MIN(id) AS Last ,
		(select id from my_portofolio where id > '{$id}' and user_id='{$uid}' and n_status!='2'   and type='2' LIMIT 1) as nexts,
		(select id from my_portofolio where id < '{$id}' and user_id='{$uid}' and n_status!='2'   and type='2' ORDER BY id DESC LIMIT 1) as prevs
		FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio mp where  mp.user_id='{$uid}' and mp.n_status!=2 and type='2'";
		// pr($sqlminmax);die;
		$resminmax = $this->apps->fetch($sqlminmax);
		// pr($resminmax);die;
		$data['first']=$resminmax['first'];
		$data['Last']=$resminmax['Last'];
		$data['next']=$resminmax['nexts'];
		$data['prev']=$resminmax['prevs'];
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio mp where  mp.user_id='{$uid}' and mp.n_status!=2 and type='2'";
		$res = $this->apps->fetch($sql,1);
		
		// pr($res);
		$i=0;
		$h=0;
		foreach ($res as $key=>$row)
		{
			


			if($h==4)
			{
				$h=0;
				$i++;
				if($row['id']==$id)
				{
					$data['slide']=$i;
					
				}

				$data['result'][$i][$h]=$res[$key];
				$data['status']=1;
			}
			else
			{
				if($row['id']==$id)
				{
					$data['slide']=$i;
					
				}
				
				$data['result'][$i][$h]=$res[$key];
				$data['status']=1;
				$h++;
				
			}
		}
		// pr($data);die;
		return $data;
		}	
	function getportoaudio($id,$uid){
		global $CONFIG;
		
		//pr($uid);exit;
		
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio mp where mp.id='{$id}' and mp.user_id='{$uid}' and mp.n_status!=2 and type='3'";
		$res = $this->apps->fetch($sql);
		// pr($sql);
		return $res;
		}	
	function getAllportoaudio($uid){
		global $CONFIG;
		
		//pr($uid);exit;
		$id=$this->apps->_request('audio');
		
		
		
		
		$data['status']=0;
		$data['result']=false;
		
		$sqlminmax = "SELECT MAX(id) AS first ,MIN(id) AS Last ,
		(select id from my_portofolio where id > '{$id}' and user_id='{$uid}' and n_status!=2  and type='3' LIMIT 1) as nexts,
		(select id from my_portofolio where id < '{$id}' and user_id='{$uid}' and n_status!=2   and type='3' ORDER BY id DESC LIMIT 1) as prevs
		FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio mp where  mp.user_id='{$uid}' and mp.n_status!=2 and type='3'";
		// pr($sqlminmax);die;
		$resminmax = $this->apps->fetch($sqlminmax);
		// pr($resminmax);die;
		$data['first']=$resminmax['first'];
		$data['Last']=$resminmax['Last'];
		$data['next']=$resminmax['nexts'];
		$data['prev']=$resminmax['prevs'];
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio mp where  mp.user_id='{$uid}' and mp.n_status!=2 and type='3'";
		$res = $this->apps->fetch($sql,1);
		
		// pr($res);
		$i=0;
		$h=0;
		foreach ($res as $key=>$row)
		{
			


			if($h==4)
			{
				$h=0;
				$i++;
				if($row['id']==$id)
				{
					$data['slide']=$i;
					
				}

				$data['result'][$i][$h]=$res[$key];
				$data['status']=1;
			}
			else
			{
				if($row['id']==$id)
				{
					$data['slide']=$i;
					
				}
				
				$data['result'][$i][$h]=$res[$key];
				$data['status']=1;
				$h++;
				
			}
		}
		// pr($data);die;
		return $data;
		}
	function editsportofolio($uid){
			global $CONFIG;
		
		
			if($uid=='')
			{
				return false;
			
			}
			$id = $this->apps->_p('id');
			$title = $this->apps->_p('title');
			$description = $this->apps->_p('description');
			$category = $this->apps->_p('category');
			
			$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio
			set `category_id`={$category},`title`='{$title}',
			`description`='{$description}'
			where id='{$id}' and user_id={$uid}";
			
			// pr($sql);exit;
			$res = $this->apps->query($sql);
		
			return true;
		}		
	function selectcomment($id_port){
		global $CONFIG;
		
		//pr($uid);exit;
		
		$sql = "SELECT *,mc.user_id FROM {$CONFIG['DATABASE'][0]['DATABASE']}.my_comment mc  left join my_portofolio mp on mc.portofolio_id=mp.id left join social_member sm on mc.user_id=sm.id where mc.portofolio_id='{$id_port}' and mc.n_status=1";
		$res = $this->apps->fetch($sql,1);
		//pr($sql);exit;
		return $res;
		}	
	function countview($id){
		global $CONFIG;
		
		//pr($uid);exit;
		
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.social_member set view_count=view_count+1 where id='{$id}'";
		$res = $this->apps->query($sql,1);
	//pr($sql);exit;
		return $res;
		}
	function listfriend($id,$uid){
		global $CONFIG;
		
		//pr($uid);exit;
		// $sqlz = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent tt left join social_member
				// as sm on tt.user_id=sm.id left join my_follow as mf on mf.friend_id=sm.id where mf.friend_id='{$id}' and mf.user_id='{$uid}'  limit 1 ";
		// $res['count_follow']=	$this->apps->fetch($sqlz,1);	
		$res['count_follow']=0;
		$sqlz = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent tt left join social_member
				as sm on tt.user_id=sm.id left join my_love as mf on mf.friend_id=sm.id where mf.friend_id='{$id}' and mf.user_id='{$uid}'  limit 1 ";
		$res['count_love']=	$this->apps->fetch($sqlz,1);			
		// $sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent tt left join social_member
				// as sm on tt.user_id=sm.id left join my_follow as mf on mf.friend_id=sm.id where sm.id='{$id}'  limit 1 
					// ";
					
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent tt left join social_member
				as sm on tt.user_id=sm.id  where sm.id='{$id}'  limit 1 
					";
		// pr($sql);exit;
		$res['datanya'] = $this->apps->fetch($sql,1);
	//	pr($res);exit;
		return $res;
		}
	function listpersonaladmin(){
		global $CONFIG;
	
		
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_company tc left join social_member
				as sm on tc.user_id=sm.id limit 1 
					";
		$res = $this->apps->fetch($sql,1);
	
		return $res;
		}	
	function selectupdatedata($idnya){
		global $CONFIG;
	
		
		$sql = "SELECT * FROM {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_talent tt left join social_member
				as sm on tt.user_id=sm.id where tt.user_id={$idnya}
					";
		//pr($sql);exit;
		$res = $this->apps->fetch($sql,1);
	
		return $res;
		}
	function ajaxfollow($id,$friend){
		global $CONFIG;
		//pr('ssdssd');exit;
		$sql = "select * from my_follow where user_id='{$id}' and friend_id='{$friend}' ";
		$res = $this->apps->fetch($sql,1);
	//	pr($res);exit;
		if($res=='')
		{//echo "ss";exit;
		$sql = "insert my_follow set user_id='{$id}', date=NOW(),friend_id='{$friend}' ";
		$res = $this->apps->query($sql,1);
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.social_member set follow_count=follow_count+1 where id='{$friend}'";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
			$sql = "select follow_count from {$CONFIG['DATABASE'][0]['DATABASE']}.social_member  where id='{$friend}'";
		//pr($sql);exit;
		$res= $this->apps->fetch($sql,1);
		}else{
		
		$sql = "delete from my_follow where user_id='{$id}' and friend_id='{$friend}' ";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.social_member set follow_count=follow_count-1 where id='{$friend}'";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
	
		$sql = "select follow_count from {$CONFIG['DATABASE'][0]['DATABASE']}.social_member  where id='{$friend}'";
		//pr($sql);exit;
		$res= $this->apps->fetch($sql,1);
		}
		//pr($res);exit;
		
		return $res;
		}
	function ajaxunfollow($id){
		global $CONFIG;
		//pr('ssdssd');exit;
		
		$sql = "delete from my_follow where user_id='{$id}' and friend_id='2' ";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.social_member set follow_count=follow_count-1 where id='{$id}'";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
		return true;
		}		
	function ajaxlike($id,$friend){
		global $CONFIG;
		
		$sql = "select * from my_love where user_id='{$id}' and friend_id='{$friend}' ";
		$res = $this->apps->fetch($sql,1);
	//	pr($res);exit;
		if($res=='')
		{//echo "ss";exit;
		$sql = "insert my_love set user_id='{$id}', date=NOW(),friend_id='{$friend}' ";
		$res = $this->apps->query($sql,1);
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.social_member set love_count=love_count+1 where id='{$friend}'";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
			$sql = "select love_count from {$CONFIG['DATABASE'][0]['DATABASE']}.social_member  where id='{$friend}'";
		//pr($sql);exit;
		$res= $this->apps->fetch($sql,1);
		
		

		$sqlfriend = "select * from {$CONFIG['DATABASE'][0]['DATABASE']}.social_member  where id='{$id}'";
		//pr($sql);exit;
		$resfriend= $this->apps->fetch($sqlfriend);
		$links='<a href="'.$CONFIG['BASE_DOMAIN'].'personal/view?id='.$resfriend['id'].'" >'.$resfriend['name'].'</a>';
		if($resfriend['name'])
		{
			
			$sqlchecknotif = "select count(*) as total from {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_notification  where user_id='{$friend}' and subject='{$resfriend['name']} has liked'";
			
			$reschecknotif= $this->apps->fetch($sqlchecknotif);
			if($reschecknotif['total']==0)
			{
			
				$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_notification
				
				(`user_id`,`subject`,`detail`,`created_date`,`n_status`) 
				VALUES ('{$friend}','{$resfriend['name']} has liked','".$links." has liked your profile.',NOW(),1)";
				//pr($sql);
				$res = $this->apps->query($sql);
			}
			$sql = "select love_count from {$CONFIG['DATABASE'][0]['DATABASE']}.social_member  where id='{$friend}'";
			//pr($sql);exit;
			$res= $this->apps->fetch($sql,1);
		}
		
		}else{
		
		$sql = "delete from my_love where user_id='{$id}' and friend_id='{$friend}' ";
		// pr($sql);exit;
		$res = $this->apps->query($sql,1);
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.social_member set love_count=love_count-1 where id='{$friend}'";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
	
		$sql = "select love_count from {$CONFIG['DATABASE'][0]['DATABASE']}.social_member  where id='{$friend}'";
		//pr($sql);exit;
		$res= $this->apps->fetch($sql,1);
		}
		//pr($res);exit;
		
		return $res;
		
		}
	function ajaxlikeportofolio($id_images,$id_friend,$user_id){
		global $CONFIG;
		 	 	
		$sql = "select * from my_love_portofolio where user_id='{$user_id}' and friend_id='{$id_friend}' and  id_portfolio='{$id_images}' ";
		$res = $this->apps->fetch($sql,1);
		// pr($res);exit;
		if($res=='')
		{
			$sql = "insert into my_love_portofolio set user_id='{$user_id}',friend_id='{$id_friend}',id_portfolio='{$id_images}',date=NOW(),n_status=1 ";
			//pr($sql);exit;
			$res = $this->apps->query($sql,1);
			$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio set love_count=love_count+1 where id='{$id_images}'";
			//pr($sql);exit;
			$res = $this->apps->query($sql,1);
				$sql = "select love_count from {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio  where id='{$id_images}'";
			// pr($sql);exit;
			$res= $this->apps->fetch($sql,1);
		}else{
			$sql = "delete from my_love_portofolio where user_id='{$user_id}' and friend_id='{$id_friend}' and  id_portfolio='{$id_images}'";
			
			$res = $this->apps->query($sql,1);
			$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio set love_count=love_count-1 where id='{$id_images}'";
			//pr($sql);exit;
			$res = $this->apps->query($sql,1);
				$sql = "select love_count from {$CONFIG['DATABASE'][0]['DATABASE']}.my_portofolio  where id='{$id_images}'";
			// pr($sql);exit;
			$res= $this->apps->fetch($sql,1);
		}
		
		return $res;
		
		}
	function ajaxunlike($id){
		global $CONFIG;
		//pr('ssdssd');exit;
		
		$sql = "delete from my_love where user_id='{$id}' and friend_id='2' ";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
		$sql = "update {$CONFIG['DATABASE'][0]['DATABASE']}.social_member set love_count=love_count-1 where id='{$id}'";
		//pr($sql);exit;
		$res = $this->apps->query($sql,1);
		return true;
		}							
	
		
}
	