<?php date_default_timezone_set('Asia/Jakarta');  include_once "db.php";class dashboardbot extends db{	function __construct(){		global 	$CONFIG;		$this->config = $CONFIG;  		// $this->datestart = date("Y-m-d", strtotime("-1 days")); 			$datestart = date("Y-m-d",strtotime($_GET['datestart']));		if($datestart) $this->datestart = $datestart;  		else $this->datestart = date("Y-m-d"); 		 $this->dateend   = "2014-05-04";  				 								}	function summary_dst_user(){  				$sql = "			INSERT INTO {$this->config['DATABASE'][1]['DATABASE']}.summary_dst_user ( id,name,area,brand,n_status )			SELECT umr.userid,sm.name,umr.area,umr.brandid,sm.n_status			FROM {$this->config['DATABASE'][0]['DATABASE']}.`tbl_user_modist_references` umr			LEFT JOIN {$this->config['DATABASE'][0]['DATABASE']}.social_member sm ON sm.id = umr.userid			WHERE  sm.id = umr.userid			AND DATE(datetimes) >='{$this->datestart}'			ON DUPLICATE KEY UPDATE			n_status = VALUES(n_status),			name = VALUES(name)		 			"; 		 // print_r( $sql);		$qData['summary_dst_user'] = $this->query($sql); 		print_r($qData);	}		function summary_all(){  				$sql = "			INSERT INTO {$this->config['DATABASE'][1]['DATABASE']}.summary_report_all (register_date, registrantcity, brandid, dstid, total, n_status) 				SELECT DATE(mc.date_time) dd,modist.area,modist.brandid,mc.userid,COUNT(1) total,mc.n_status 				FROM {$this->config['DATABASE'][0]['DATABASE']}.my_circle mc				LEFT JOIN {$this->config['DATABASE'][0]['DATABASE']}.my_entourage me ON me.id = mc.friendid				LEFT JOIN {$this->config['DATABASE'][0]['DATABASE']}.tbl_user_modist_references modist ON modist.userid = mc.userid				WHERE   modist.userid = mc.userid AND me.id = mc.friendid AND DATE(mc.date_time) >='{$this->datestart}'				GROUP BY mc.n_status,dd,modist.area,modist.brandid,mc.userid				ON DUPLICATE KEY UPDATE 				n_status = VALUES(n_status),				total = VALUES(total)		 			"; 		 			 // print_r( $sql);		$qData['summary_all'] = $this->query($sql); 		print_r($qData);	} function summary_registrant(){  				$sql = "			INSERT INTO {$this->config['DATABASE'][1]['DATABASE']}.summary_report_registrant ( dstid,registrantid,registrantname,registrantcity,register_date,dstbrandid,brandname,gender,age,n_status )			SELECT mc.userid,mc.friendid,me.name,modist.area,DATE(mc.date_time) dd,modist.brandid,bfr.subbrandname,UPPER(SUBSTRING(me.sex,1,1)) gender,YEAR(							CURRENT_TIMESTAMP ) - YEAR( birthday ) - ( RIGHT(							CURRENT_TIMESTAMP , 5 ) < RIGHT( birthday, 5 ) ) age , mc.n_status 			FROM {$this->config['DATABASE'][0]['DATABASE']}.my_circle mc			LEFT JOIN {$this->config['DATABASE'][0]['DATABASE']}.my_entourage me ON me.id = mc.friendid			LEFT JOIN {$this->config['DATABASE'][0]['DATABASE']}.tbl_brand_preferences_references bfr ON bfr.preferenceid = me.Brand1_ID			LEFT JOIN {$this->config['DATABASE'][0]['DATABASE']}.tbl_user_modist_references modist ON modist.userid = mc.userid			WHERE   modist.userid = mc.userid AND me.id = mc.friendid AND  bfr.preferenceid = me.Brand1_ID AND DATE(mc.date_time) >='{$this->datestart}'			GROUP BY  dd,modist.area,modist.brandid,mc.userid,mc.friendid		 	ON DUPLICATE KEY UPDATE 				age = VALUES(age),				gender = VALUES(gender),				brandname = VALUES(brandname),				registrantname = VALUES(registrantname),				registrantcity = VALUES(registrantcity),				n_status = VALUES(n_status) 		"; 		 			 // print_r( $sql);		$qData['summary_registrant'] = $this->query($sql); 		print_r($qData);	}  		function summary_report_submission_apps(){  				$sql = "			INSERT INTO {$this->config['DATABASE'][1]['DATABASE']}.summary_report_submission_apps (dstid, event , total,version,latestdate)  				SELECT  subm.userid,subm.eventid,COUNT(1) total,MAX(subm.version) version, MAX(subm.datetimes) latestdate				FROM {$this->config['DATABASE'][0]['DATABASE']}.tbl_user_submission subm   				WHERE  DATE(subm.datetimes) >='{$this->datestart}'				GROUP BY subm.userid,subm.eventid				ON DUPLICATE KEY UPDATE  				latestdate = VALUES(latestdate),				version = VALUES(version),				total = VALUES(total)		"; 		 			 // print_r( $sql);		$qData['summary_report_submission_apps'] = $this->query($sql); 		print_r($qData);	} 		function summary_report_apps(){  				$sql = "			INSERT INTO {$this->config['DATABASE'][1]['DATABASE']}.summary_report_apps (dstid, event , total,n_status)  			SELECT  mc.userid,mc.eventid,COUNT(1) total,mc.n_status			FROM {$this->config['DATABASE'][0]['DATABASE']}.my_circle mc 			WHERE  DATE(mc.date_time) >='{$this->datestart}'						GROUP BY mc.userid,mc.eventid,mc.n_status		 	ON DUPLICATE KEY UPDATE   				n_status = VALUES(n_status),				total = VALUES(total)		"; 		 			 // print_r( $sql);		$qData['summary_report_apps'] = $this->query($sql); 		print_r($qData);	}  	 }$class = new dashboardbot;print "<pre>"; $class->summary_dst_user();sleep(1);$class->summary_all();sleep(1);$class->summary_registrant();sleep(1);$class->summary_report_submission_apps();sleep(1);$class->summary_report_apps();print "</pre>";die();?>