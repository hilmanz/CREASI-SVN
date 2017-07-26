
function mainboardsearch()
{
$(document).ready(function(){
                $('#formadvsearchcat').submit(function(e){
                    e.preventDefault();
                    $.ajax({
                        'type': 'POST',
                        'url': basedomain+'jobboard',
                        'data': $(this).serialize(),
						'dataType':'json',
                        'success': function(result){
							if(result.status==false)	
							{
							var str="";
							str+='';
							str+='<div class="red">';
							str+='no result... ';
							str+='</div>';
							str+='';
							$('.searchingstatus').html(str);
							getpaging(0,0,"paging_of_jobboard_list","paging_ajax_jobboard",10);
							return false;
							}
							
							if (result.status==true)
							{							
							var str="";
							$.each(result.data.result,function(k,v){  
							if (v.hari > 0)
							{
							str+='<div class="rowjob">';
							str+='<div class="boximg">';
							if (v.img_avatar)
							{
								str+=' <a href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" height="200px" width="200px"/></a>';
							}else {
								str+=' <a href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/ts.png" height="200px" width="200px"/></a>';
							
							}
							str+='<div class="caption">';
                        	/*str+=' <i>No. of shares :';
							if(v.share_count){
							str+=v.share_count;
							}
							str+='</i>';*/
							str+=' <i>No. of likes:';
							if(v.love_count)
							{
							str+=v.love_count;
							}
							str+='</i>';
                            str+='</div>';  
							$.each(result.popular,function(kk,vv){ 
							if(vv.id_job==v.id_job)
							{
							str+='<div class="ribbon">Most Popular</div>';
							}
							});
							str+='</div>';
							str+='<div class="entry">';
                            str+='<h3><a href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'">'+v.job_title+'</a></h3>';
                            str+='<div class="meta-post">';	
							str+=' <a href="#" class="company-name"><i class="icon-suitcase">&nbsp;</i>'+v.nama_perusahaan+'</a>';
							if (v.verified == 1)
							{
                             str+='<a href="#" class="company-status"><i class="icon-check-circle"></i> Verified</a>';
							}
							str+='<a href="#" class="location-name"><i class="icon-map-marker">&nbsp;</i>'+v.provinsi+', '+v.city+'</a>';
						/* 	str+='<a href="{$basedomain}share/twitterShare/jobs/'+v.id+'/jobboard" class="location-name"><i class="glyphicon icon-log-out">&nbsp;</i> twitter share</a>'; */
                            str+='</div>';
                            str+='<p align="justify">'+v.deskripsi.substring(0, 240)+'</p>';
							str+='</div>';
							str+='<div class="jobInfo">';
							if (v.n_status_interview == 0 && v.n_status == 1)
							 {
							 str+=' <a class="label bggreen" href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'"> OPEN</a>';
							 }
							  if (v.n_status_interview == 1 && v.n_status == 1)
							 {
							 str+=' <a class="label bgyellow" href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'"> INTERVIEW</a>';
							 }
			
                            str+='<div class="countdown-job">';
                            str+='<h4><b>'+v.hari+'</b></h4>';
                            str+='<span>DAYS LEFT TO APPLY</span>';
							str+='</div>';
							str+='<span class="applicantsNo">No. of Applicants:'+v.registrant+'</span>';
							str+='</div>';
							str+='</div>';
							}
							
						});
					
						$('.searchingstatus').html(str);
						getpaging(0,result.data.total,"paging_of_jobboard_list","paging_ajax_jobboard",10);
						
						}
						if (result.status==false)
							{	
							str+=' ( No data )';
							$('.searchingstatus').html(str);
							getpaging(0,result.total,"paging_of_jobboard_list","paging_ajax_jobboard",10);
							}
									
													}
												});
										});
							});


$(document).ready(function(){
//apabila terjadi event onchange terhadap object <select id=propinsi>

$("#advsearchcat").change(function(){
			
					var okeh = $(this).val();
				
					$.ajax({
							'type': 'POST',
							'url': basedomain+'jobboard',
							'data': {advsearch:okeh},
							'cache': false,
							'dataType':'json',
							'success': function(response){
								//	console.log('ss');
								if(response.status==1)
								{
									$("#stairs option").remove();
									var str="";
									str +='<option value="">Any Sub Category</option>';
									$.each(response.data,function(kal,val){
									//console.log(val.id);
									
										str +='<option value="'+val.id+'">'+val.name_subcategory+'</option>';
										
									});
									
									$('#stairs').html(str);
									$('.stairs').selectpicker("refresh");
								}
							}
							
							
							});
						});
					});
							

    $(document).ready(function(){
              
$("#sortby").change(function(){

					var  category = new Array;
			$.each($('.joincategory:checked'),function(k,v){  
			  category.push($(this).val());
			});
			
					var okeh = $("#sortby").val();
					var search = $("#searching").val();
					
					
                    $.ajax({
                        'type': 'POST',
                        'url': basedomain+'jobboard/ajaxmostview',
                        'data': {category:category,okeh:okeh},
						'dataType':'json',
                        'success': function(result){
						var str="";
						if(result.status==false)	
							{
							str+='';
							str+='<div class="red">';
							str+='no result...';
							str+='</div>';
							str+='';
							$('.searchingstatus').html(str);
							getpaging(0,0,"paging_of_jobboard_list","paging_ajax_jobboard",10);
							return false;
							}
							
							$.each(result.data,function(k,v){  
						if (v.hari > 0)
							{
							str+='<div class="rowjob">';
							str+='<div class="boximg">';
							if (v.img_avatar)
							{
								str+=' <a href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" height="200px" width="200px"/></a>';
							}else {
								str+=' <a href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/ts.png" height="200px" width="200px"/></a>';
							
							}
							str+='<div class="caption">';
							/*str+=' <i>No. of shares :';
							if(v.share_count){
							str+=v.share_count;
							}
							str+='</i>';*/
							str+=' <i>No. of likes:';
							if(v.love_count)
							{
							str+=v.love_count;
							}
							str+='</i>';
                            str+='</div>';  
							$.each(result.popular,function(kk,vv){ 
							if(vv.id_job==v.id_job)
							{
							str+='<div class="ribbon">Most Popular</div>';
							}
							});	
							str+='</div>';
							str+='<div class="entry">';
                            str+='<h3><a href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'">'+v.job_title+'</a></h3>';
                            str+='<div class="meta-post">';	
							str+=' <a href="#" class="company-name"><i class="icon-suitcase">&nbsp;</i>'+v.nama_perusahaan+'</a>';
							if (v.verified == 1)
							{
                             str+='<a href="#" class="company-status"><i class="icon-check-circle"></i> Verified</a>';
							}
							str+='<a href="#" class="location-name"><i class="icon-map-marker">&nbsp;</i> '+v.provinsi+', '+v.city+'</a>';
							/* str+='<a href="{$basedomain}share/twitterShare/jobs/'+v.id+'/jobboard" class="location-name"><i class="glyphicon icon-log-out">&nbsp;</i> twitter share</a>'; */
                            str+='</div>';
                            str+='<p align="justify">'+v.deskripsi.substring(0, 240)+'</p>';
							str+='</div>';
							str+='<div class="jobInfo">';
                              if (v.n_status_interview == 0 && v.n_status == 1)
								 {
								 str+=' <a class="label bggreen" href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'"> OPEN</a>';
								 }
								  if (v.n_status_interview == 1 && v.n_status == 1)
								 {
								 str+=' <a class="label bgyellow" href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'"> INTERVIEW</a>';
								 }
			
                            str+='<div class="countdown-job">';
                            str+='  <h4><b>'+v.hari+'</b></h4>';
                            str+='  <span>DAYS LEFT TO APPLY</span>';
							str+=' </div>';
							str+=' <span class="applicantsNo">No. of Applicants:'+v.registrant+'</span>';
							str+='</div>';
							str+='</div>';
							}
							
						});
					
						$('.searchingstatus').html(str);
						//console.log(result.total);
						getpaging(0,result.total,"paging_of_jobboard_list","paging_ajax_jobboard",10);
							}
						});
						});
						});
						
 $(document).ready(function(){
              
$("#sortbys").change(function(){
			$(".joincategory").prop("checked", false);
					var  category = new Array;
			$.each($('.joincategory:checked'),function(k,v){  
			  category.push($(this).val());
			});
			
					var okeh = $("#sortby").val();
					var search = $("#searching").val();
					
					
                    $.ajax({
                        'type': 'POST',
                        'url': basedomain+'jobboard/ajaxmostview',
                        'data': {category:category,okeh:okeh},
						'dataType':'json',
                        'success': function(result){
						var str="";
						if(result.status==false)	
							{
							str+='';
							str+='<div class="red">';
							str+='no result...';
							str+='</div>';
							str+='';
							$('.searchingstatus').html(str);
							getpaging(0,0,"paging_of_jobboard_list","paging_ajax_jobboard",10);
							return false;
							}
							
							$.each(result.data,function(k,v){  
						if (v.hari > 0)
							{
							str+='<div class="rowjob">';
							str+='<div class="boximg">';
							if (v.img_avatar)
							{
								str+=' <a href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" height="200px" width="200px"/></a>';
							}else {
								str+=' <a href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/ts.png" height="200px" width="200px"/></a>';
							
							}
							str+='<div class="caption">';
							/*str+=' <i>No. of shares :';
							if(v.share_count){
							str+=v.share_count;
							}
							str+='</i>';*/
							str+=' <i>No. of likes:';
							if(v.love_count)
							{
							str+=v.love_count;
							}
							str+='</i>';
                            str+='</div>';  
							$.each(result.popular,function(kk,vv){ 
							if(vv.id_job==v.id_job)
							{
							str+='<div class="ribbon">Most Popular</div>';
							}
							});	
							str+='</div>';
							str+='<div class="entry">';
                            str+='<h3><a href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'">'+v.job_title+'</a></h3>';
                            str+='<div class="meta-post">';	
							str+=' <a href="#" class="company-name"><i class="icon-suitcase">&nbsp;</i>'+v.nama_perusahaan+'</a>';
							if (v.verified == 1)
							{
                             str+='<a href="#" class="company-status"><i class="icon-check-circle"></i> Verified</a>';
							}
							str+='<a href="#" class="location-name"><i class="icon-map-marker">&nbsp;</i> '+v.provinsi+', '+v.city+'</a>';
							/* str+='<a href="{$basedomain}share/twitterShare/jobs/'+v.id+'/jobboard" class="location-name"><i class="glyphicon icon-log-out">&nbsp;</i> twitter share</a>'; */
                            str+='</div>';
                            str+='<p align="justify">'+v.deskripsi.substring(0, 240)+'</p>';
							str+='</div>';
							str+='<div class="jobInfo">';
                              if (v.n_status_interview == 0 && v.n_status == 1)
								 {
								 str+=' <a class="label bggreen" href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'"> OPEN</a>';
								 }
								  if (v.n_status_interview == 1 && v.n_status == 1)
								 {
								 str+=' <a class="label bgyellow" href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'"> INTERVIEW</a>';
								 }
			
                            str+='<div class="countdown-job">';
                            str+='  <h4><b>'+v.hari+'</b></h4>';
                            str+='  <span>DAYS LEFT TO APPLY</span>';
							str+=' </div>';
							str+=' <span class="applicantsNo">No. of Applicants:'+v.registrant+'</span>';
							str+='</div>';
							str+='</div>';
							}
							
						});
					
						$('.searchingstatus').html(str);
						getpaging(0,result.total,"paging_of_jobboard_list","paging_ajax_jobboard",10);
							}
						});
						});
						});
						
$(document).ready(function(){
			$(".joincategory").on("click", function(){
			$("#sortbys").prop("checked", false);
			var  category = new Array;
			$.each($('.joincategory:checked'),function(k,v){  
			  category.push($(this).val());
			});
		
			var okeh = $("#sortby").val();
			$.ajax({
							'type': 'POST',
							'url': basedomain+'jobboard/ajaxmostview',
							'data': {category:category,okeh:okeh},
							'dataType':'json',
							'success': function(result){
								
							var str="";
							if(result.status==false)	
							{
							str+='';
							str+='<div class="red">';
							str+='no result...';
							str+='</div>';
							str+='';
							$('.searchingstatus').html(str);
							getpaging(0,0,"paging_of_jobboard_list","paging_ajax_jobboard",10);
							return false;
							}
							
							$.each(result.data,function(k,v){ 
							if (v.hari > 0)
							{
							str+='<div class="rowjob">';							
							str+='<div class="boximg">';
							if (v.img_avatar)
							{
								str+=' <a href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" height="200px" width="200px"/></a>';
							}else {
								str+=' <a href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/ts.png" height="200px" width="200px"/></a>';
							
							}
							str+='<div class="caption">';
							/*str+=' <i>No. of shares :';
							if(v.share_count){
							str+=v.share_count;
							}
							str+='</i>';*/
							str+=' <i>No. of likes:';
							if(v.love_count)
							{
							str+=v.love_count;
							}
							str+='</i>';
                            str+='</div>';   
							$.each(result.popular,function(kk,vv){ 
							if(vv.id_job==v.id_job)
							{
							str+='<div class="ribbon">Most Popular</div>';
							}
							});		
							str+='</div>';
							str+='<div class="entry">';
                            str+='<h3><a href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'">'+v.job_title+'</a></h3>';
                            str+='<div class="meta-post">';	
							str+=' <a href="#" class="company-name"><i class="icon-suitcase">&nbsp;</i>'+v.nama_perusahaan+'</a>';
							if (v.verified == 1)
							{
                             str+='<a href="#" class="company-status"><i class="icon-check-circle"></i> Verified</a>';
							}
							str+='<a href="#" class="location-name"><i class="icon-map-marker">&nbsp;</i> '+v.provinsi+', '+v.city+'</a>';
							/* str+='<a href="{$basedomain}share/twitterShare/jobs/'+v.id+'/jobboard" class="location-name"><i class="glyphicon icon-log-out">&nbsp;</i> twitter share</a>'; */
                            str+='</div>';
                            str+='<p align="justify">'+v.deskripsi.substring(0, 240)+'</p>';
							str+='</div>';
							str+='<div class="jobInfo">';
							if (v.n_status_interview == 0 && v.n_status == 1)
							 {
							 str+=' <a class="label bggreen" href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'"> OPEN</a>';
							 }
							  if (v.n_status_interview == 1 && v.n_status == 1)
							 {
							 str+=' <a class="label bgyellow" href="'+basedomain+'jobboard/detail_jobboard?id='+v.id_job+'"> INTERVIEW</a>';
							 }
							
                            str+='<div class="countdown-job">';
                            str+='<h4><b>'+v.hari+'</b></h4>';
                            str+='<span>DAYS LEFT TO APPLY</span>';
							str+='</div>';
							str+=' <span class="applicantsNo">No. of Applicants:'+v.registrant+'</span>';
							str+='</div>';
							str+='</div>';
							}
						});
					
						$('.searchingstatus').html(str);
						getpaging(0,result.data.total,"paging_of_jobboard_list","paging_ajax_jobboard",10);
											
						}
					});
				});
			});
			

			}

function tscmsshort()
{
			
$(document).ready(function(){
   
     $('.sname').click(function(e){
	 var nomor=$(this).data('sort');
	 $('.icon-chevron-up').replaceWith('<i class="icon-chevron-up">&nbsp;</i>');
	 if(nomor=='')
	 {
		nomor=0;
		typesort=2;
		$(this).find('.icon-chevron-down').replaceWith('<i class="icon-chevron-up">&nbsp;</i>');
	 }
	 else
	 {
		typesort=0;
		$(this).find('.icon-chevron-up').replaceWith('<i class="icon-chevron-down">&nbsp;</i>');
	 }
	 thisss=$(this);
	   $.ajax({
						'type': 'POST',
                        'url': basedomain+'jobboard/tscms',
                        'data': {nomor:nomor,idjob:idjob,ajaxsort:1},
						'dataType':'json',
						'success': function(result){
						
						var str='';
						var no='';
									$.each(result.data,function(k,v){ 
									
									no=no+1;
									str+='<tr>';
									str+='<td align="center">'+v.no+' <input type="hidden" name="jobid" class="jobsid" value="'+v.id_job+'">';
									str+='</td>';
									str+='<td align="center">';
									str+='<input type="checkbox" name="namecheck[]" class="checkjob" id="'+v.user_id+'" value="'+v.user_id+'" attr="'+no+'">';
									str+='</td>';
									
									
									str+='<td>';
									str+='<div class="smallthumb"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" width="30" height="50" /></div>';
									str+='<div class="usdetail">';
									str+='<h6><a href="'+basedomain+'personal/view?id='+v.user_id+'">'+v.name+'</a></h6>';
									str+='<a target="blank_" href="'+basedomain+'dashboard/download?param='+v.user_id+'" class="button2 downloadsCV">DOWNLOAD CV</a>';
									str+='</div>';
									str+='</td>';
									
									
									str+='<td align="center">';
									str+='<span class="date">'+v.dateapply+'</span>';
									str+='</td>';
									
									
									str+='<td align="center">';
									str+='<span class="age">'+v.birthday+'</span>';
									str+='</td>';
									
									
									str+='<td align="center">';
									if (v.agent)
									{
									
											str+='Yes';	
											}else{
											str+='No';
											}
								
									str+='</td>';
									
									
									str+='<td align="center">';
									if(v.experience)
									
											{
											str+='Yes';	
											}else{
											str+='No';
											}
								
									str+='</td>';
									
									
									str+='<td align="center"><span class="address">'+v.provincy+','+v.city+'</span></td>';
									
									str+='<td align="center">';
										if(v.interview==0)
										{
										str+='<span class="usent{$list[j].user_id}">Unsent</span>';
										}
										if(v.interview==1 || v.interview==2 || v.interview==3 )
										{
										str+='Sent';
										}else{
										str+='Unsent';
										}
									str+='</td>';
									
									str+='<td align="center">';
									if(v.interview==2)
									{
									str+='<span class="green">Accepted</span>';
									}
									if (v.interview==3)
									{
									str+='<span class="red">Decline</span>';
									}
									if(v.interview==0 || v.interview==1)
									{
									str+='<span class="grey">Waiting</span>';
									}
									str+='</td>';
									
									str+='</tr>';
									
									
									});
									
									thisss.data('sort',typesort);
									$('.shorinterview').html(str);
						   
						   }
						   });
						   
	 
	 });
	 });
	 			
$(document).ready(function(){
   
     $('.sdate').click(function(e){
	  var nomor=$(this).data('sort');
	   $('.icon-chevron-up').replaceWith('<i class="icon-chevron-up">&nbsp;</i>');
	 if(nomor=='')
	 {
		nomor=3;
		typesort=0;
		$(this).find('.icon-chevron-down').replaceWith('<i class="icon-chevron-up">&nbsp;</i>');
	 }
	 else
	 {
		typesort=3;
		nomor=0;
		$(this).find('.icon-chevron-up').replaceWith('<i class="icon-chevron-down">&nbsp;</i>');
	 }
	 thisss=$(this);
	   $.ajax({
						'type': 'POST',
                        'url': basedomain+'jobboard/tscms',
                        'data': {nomor:nomor,idjob:idjob,ajaxsort:1},
						'dataType':'json',
						'success': function(result){
						
						var str='';
						var no='';
									$.each(result.data,function(k,v){ 
									
									no=no+1;
									str+='<tr>';
									str+='<td align="center">'+v.no+' <input type="hidden" name="jobid" class="jobsid" value="'+v.id_job+'">';
									str+='</td>';
									str+='<td align="center">';
									str+='<input type="checkbox" name="namecheck[]" class="checkjob" id="'+v.user_id+'" value="'+v.user_id+'" attr="'+no+'">';
									str+='</td>';
									
									
									str+='<td>';
									str+='<div class="smallthumb"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" width="30" height="50" /></div>';
									str+='<div class="usdetail">';
									str+='<h6><a href="'+basedomain+'personal/view?id='+v.user_id+'">'+v.name+'</a></h6>';
									str+='<a target="blank_" href="'+basedomain+'dashboard/download?param='+v.user_id+'" class="button2 downloadsCV">DOWNLOAD CV</a>';
									str+='</div>';
									str+='</td>';
									
									
									str+='<td align="center">';
									str+='<span class="date">'+v.dateapply+'</span>';
									str+='</td>';
									
									
									str+='<td align="center">';
									str+='<span class="age">'+v.birthday+'</span>';
									str+='</td>';
									
									
									str+='<td align="center">';
									if (v.agent)
									{
									
											str+='Yes';	
											}else{
											str+='No';
											}
								
									str+='</td>';
									
									
									str+='<td align="center">';
									if(v.experience)
									
											{
											str+='Yes';	
											}else{
											str+='No';
											}
								
									str+='</td>';
									
									
									str+='<td align="center"><span class="address">'+v.provincy+','+v.city+'</span></td>';
									
									str+='<td align="center">';
										if(v.interview==0)
										{
										str+='<span class="usent{$list[j].user_id}">Unsent</span>';
										}
										if(v.interview==1 || v.interview==2 || v.interview==3 )
										{
										str+='Sent';
										}else{
										str+='Unsent';
										}
									str+='</td>';
									
									str+='<td align="center">';
									if(v.interview==2)
									{
									str+='<span class="green">Accepted</span>';
									}
									if (v.interview==3)
									{
									str+='<span class="red">Decline</span>';
									}
									if(v.interview==0 || v.interview==1)
									{
									str+='<span class="grey">Waiting</span>';
									}
									str+='</td>';
									
									str+='</tr>';
									
									
									});
									$('.shorinterview').html(str);
									thisss.data('sort',typesort);
						   
						   }
						   });
						   
	 
	 });
	 });
	 
	 	 			
$(document).ready(function(){
   
     $('.sage').click(function(e){
	   var nomor=$(this).data('sort');
		 if(nomor=='')
		 {
			nomor=0;
			typesort=4;
		 }
		 else
		 {
			typesort=0;
		 }
		 thisss=$(this);
	   $.ajax({
						'type': 'POST',
                        'url': basedomain+'jobboard/tscms',
                        'data': {nomor:nomor,idjob:idjob,ajaxsort:1},
						'dataType':'json',
						'success': function(result){
						
						var str='';
						var no='';
									$.each(result.data,function(k,v){ 
									
									no=no+1;
									str+='<tr>';
									str+='<td align="center">'+v.no+' <input type="hidden" name="jobid" class="jobsid" value="'+v.id_job+'">';
									str+='</td>';
									str+='<td align="center">';
									str+='<input type="checkbox" name="namecheck[]" class="checkjob" id="'+v.user_id+'" value="'+v.user_id+'" attr="'+no+'">';
									str+='</td>';
									
									
									str+='<td>';
									str+='<div class="smallthumb"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" width="30" height="50" /></div>';
									str+='<div class="usdetail">';
									str+='<h6><a href="'+basedomain+'personal/view?id='+v.user_id+'">'+v.name+'</a></h6>';
									str+='<a target="blank_" href="'+basedomain+'dashboard/download?param='+v.user_id+'" class="button2 downloadsCV">DOWNLOAD CV</a>';
									str+='</div>';
									str+='</td>';
									
									
									str+='<td align="center">';
									str+='<span class="date">'+v.dateapply+'</span>';
									str+='</td>';
									
									
									str+='<td align="center">';
									str+='<span class="age">'+v.birthday+'</span>';
									str+='</td>';
									
									
									str+='<td align="center">';
									if (v.agent)
									{
									
											str+='Yes';	
											}else{
											str+='No';
											}
								
									str+='</td>';
									
									
									str+='<td align="center">';
									if(v.experience)
									
											{
											str+='Yes';	
											}else{
											str+='No';
											}
								
									str+='</td>';
									
									
									str+='<td align="center"><span class="address">'+v.provincy+','+v.city+'</span></td>';
									
									str+='<td align="center">';
										if(v.interview==0)
										{
										str+='<span class="usent{$list[j].user_id}">Unsent</span>';
										}
										if(v.interview==1 || v.interview==2 || v.interview==3 )
										{
										str+='Sent';
										}else{
										str+='Unsent';
										}
									str+='</td>';
									
									str+='<td align="center">';
									if(v.interview==2)
									{
									str+='<span class="green">Accepted</span>';
									}
									if (v.interview==3)
									{
									str+='<span class="red">Decline</span>';
									}
									if(v.interview==0 || v.interview==1)
									{
									str+='<span class="grey">Waiting</span>';
									}
									str+='</td>';
									
									str+='</tr>';
									
									
									});
									$('.shorinterview').html(str);
										thisss.data('sort',typesort);
						   }
						   });
						   
	 
	 });
	 });
	 
	 
	 	 			
$(document).ready(function(){
   
     $('.sagent').click(function(e){
	   var nomor=$(this).data('sort');
		 if(nomor=='')
		 {
			nomor=0;
			typesort=5;
		 }
		 else
		 {
			typesort=0;
		 }
		 thisss=$(this);
	   $.ajax({
						'type': 'POST',
                        'url': basedomain+'jobboard/tscms',
                        'data': {nomor:nomor,idjob:idjob,ajaxsort:1},
						'dataType':'json',
						'success': function(result){
						
						var str='';
						var no='';
									$.each(result.data,function(k,v){ 
									
									no=no+1;
									str+='<tr>';
									str+='<td align="center">'+v.no+' <input type="hidden" name="jobid" class="jobsid" value="'+v.id_job+'">';
									str+='</td>';
									str+='<td align="center">';
									str+='<input type="checkbox" name="namecheck[]" class="checkjob" id="'+v.user_id+'" value="'+v.user_id+'" attr="'+no+'">';
									str+='</td>';
									
									
									str+='<td>';
									str+='<div class="smallthumb"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" width="30" height="50" /></div>';
									str+='<div class="usdetail">';
									str+='<h6><a href="'+basedomain+'personal/view?id='+v.user_id+'">'+v.name+'</a></h6>';
									str+='<a target="blank_" href="'+basedomain+'dashboard/download?param='+v.user_id+'" class="button2 downloadsCV">DOWNLOAD CV</a>';
									str+='</div>';
									str+='</td>';
									
									
									str+='<td align="center">';
									str+='<span class="date">'+v.dateapply+'</span>';
									str+='</td>';
									
									
									str+='<td align="center">';
									str+='<span class="age">'+v.birthday+'</span>';
									str+='</td>';
									
									
									str+='<td align="center">';
									if (v.agent)
									{
									
											str+='Yes';	
											}else{
											str+='No';
											}
								
									str+='</td>';
									
									
									str+='<td align="center">';
									if(v.experience)
									
											{
											str+='Yes';	
											}else{
											str+='No';
											}
								
									str+='</td>';
									
									
									str+='<td align="center"><span class="address">'+v.provincy+','+v.city+'</span></td>';
									
									str+='<td align="center">';
										if(v.interview==0)
										{
										str+='<span class="usent{$list[j].user_id}">Unsent</span>';
										}
										if(v.interview==1 || v.interview==2 || v.interview==3 )
										{
										str+='Sent';
										}else{
										str+='Unsent';
										}
									str+='</td>';
									
									str+='<td align="center">';
									if(v.interview==2)
									{
									str+='<span class="green">Accepted</span>';
									}
									if (v.interview==3)
									{
									str+='<span class="red">Decline</span>';
									}
									if(v.interview==0 || v.interview==1)
									{
									str+='<span class="grey">Waiting</span>';
									}
									str+='</td>';
									
									str+='</tr>';
									
									
									});
									$('.shorinterview').html(str);
										thisss.data('sort',typesort);
						   }
						   });
						   
	 
	 });
	 });
	  	 			
$(document).ready(function(){
   
     $('.sexp').click(function(e){
	 var nomor=$(this).data('sort');
		 if(nomor=='')
		 {
			nomor=0;
			typesort=6;
		 }
		 else
		 {
			typesort=0;
		 }
		 thisss=$(this);
	   $.ajax({
						'type': 'POST',
                        'url': basedomain+'jobboard/tscms',
                        'data': {nomor:nomor,idjob:idjob,ajaxsort:1},
						'dataType':'json',
						'success': function(result){
						
						var str='';
						var no='';
									$.each(result.data,function(k,v){ 
									
									no=no+1;
									str+='<tr>';
									str+='<td align="center">'+v.no+' <input type="hidden" name="jobid" class="jobsid" value="'+v.id_job+'">';
									str+='</td>';
									str+='<td align="center">';
									str+='<input type="checkbox" name="namecheck[]" class="checkjob" id="'+v.user_id+'" value="'+v.user_id+'" attr="'+no+'">';
									str+='</td>';
									
									
									str+='<td>';
									str+='<div class="smallthumb"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" width="30" height="50" /></div>';
									str+='<div class="usdetail">';
									str+='<h6><a href="'+basedomain+'personal/view?id='+v.user_id+'">'+v.name+'</a></h6>';
									str+='<a target="blank_" href="'+basedomain+'dashboard/download?param='+v.user_id+'" class="button2 downloadsCV">DOWNLOAD CV</a>';
									str+='</div>';
									str+='</td>';
									
									
									str+='<td align="center">';
									str+='<span class="date">'+v.dateapply+'</span>';
									str+='</td>';
									
									
									str+='<td align="center">';
									str+='<span class="age">'+v.birthday+'</span>';
									str+='</td>';
									
									
									str+='<td align="center">';
									if (v.agent)
									{
									
											str+='Yes';	
											}else{
											str+='No';
											}
								
									str+='</td>';
									
									
									str+='<td align="center">';
									if(v.experience)
									
											{
											str+='Yes';	
											}else{
											str+='No';
											}
								
									str+='</td>';
									
									
									str+='<td align="center"><span class="address">'+v.provincy+','+v.city+'</span></td>';
									
									str+='<td align="center">';
										if(v.interview==0)
										{
										str+='<span class="usent{$list[j].user_id}">Unsent</span>';
										}
										if(v.interview==1 || v.interview==2 || v.interview==3 )
										{
										str+='Sent';
										}else{
										str+='Unsent';
										}
									str+='</td>';
									
									str+='<td align="center">';
									if(v.interview==2)
									{
									str+='<span class="green">Accepted</span>';
									}
									if (v.interview==3)
									{
									str+='<span class="red">Decline</span>';
									}
									if(v.interview==0 || v.interview==1)
									{
									str+='<span class="grey">Waiting</span>';
									}
									str+='</td>';
									
									str+='</tr>';
									
									
									});
									$('.shorinterview').html(str);
										thisss.data('sort',typesort);
						   }
						   });
						   
	 
	 });
	 });
	 
	 			
$(document).ready(function(){
   
     $('.slocation').click(function(e){
	  var nomor=$(this).data('sort');
		 if(nomor=='')
		 {
			nomor=0;
			typesort=7;
		 }
		 else
		 {
			typesort=0;
		 }
		 thisss=$(this);
	   $.ajax({
						'type': 'POST',
                        'url': basedomain+'jobboard/tscms',
                        'data': {nomor:nomor,idjob:idjob,ajaxsort:1},
						'dataType':'json',
						'success': function(result){
						
						var str='';
						var no='';
									$.each(result.data,function(k,v){ 
									
									no=no+1;
									str+='<tr>';
									str+='<td align="center">'+v.no+' <input type="hidden" name="jobid" class="jobsid" value="'+v.id_job+'">';
									str+='</td>';
									str+='<td align="center">';
									str+='<input type="checkbox" name="namecheck[]" class="checkjob" id="'+v.user_id+'" value="'+v.user_id+'" attr="'+no+'">';
									str+='</td>';
									
									
									str+='<td>';
									str+='<div class="smallthumb"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" width="30" height="50" /></div>';
									str+='<div class="usdetail">';
									str+='<h6><a href="'+basedomain+'personal/view?id='+v.user_id+'">'+v.name+'</a></h6>';
									str+='<a target="blank_" href="'+basedomain+'dashboard/download?param='+v.user_id+'" class="button2 downloadsCV">DOWNLOAD CV</a>';
									str+='</div>';
									str+='</td>';
									
									
									str+='<td align="center">';
									str+='<span class="date">'+v.dateapply+'</span>';
									str+='</td>';
									
									
									str+='<td align="center">';
									str+='<span class="age">'+v.birthday+'</span>';
									str+='</td>';
									
									
									str+='<td align="center">';
									if (v.agent)
									{
									
											str+='Yes';	
											}else{
											str+='No';
											}
								
									str+='</td>';
									
									
									str+='<td align="center">';
									if(v.experience)
									
											{
											str+='Yes';	
											}else{
											str+='No';
											}
								
									str+='</td>';
									
									
									str+='<td align="center"><span class="address">'+v.provincy+','+v.city+'</span></td>';
									
									str+='<td align="center">';
										if(v.interview==0)
										{
										str+='<span class="usent{$list[j].user_id}">Unsent</span>';
										}
										if(v.interview==1 || v.interview==2 || v.interview==3 )
										{
										str+='Sent';
										}else{
										str+='Unsent';
										}
									str+='</td>';
									
									str+='<td align="center">';
									if(v.interview==2)
									{
									str+='<span class="green">Accepted</span>';
									}
									if (v.interview==3)
									{
									str+='<span class="red">Decline</span>';
									}
									if(v.interview==0 || v.interview==1)
									{
									str+='<span class="grey">Waiting</span>';
									}
									str+='</td>';
									
									str+='</tr>';
									
									
									});
									$('.shorinterview').html(str);
									thisss.data('sort',typesort);
						   }
						   });
						   
	 
	 });
	 });
	  			
$(document).ready(function(){
   
     $('.sinvitation').click(function(e){
	 var nomor=$(this).data('sort');
		 if(nomor=='')
		 {
			nomor=0;
			typesort=8;
		 }
		 else
		 {
			typesort=0;
		 }
		 thisss=$(this);
	   $.ajax({
						'type': 'POST',
                        'url': basedomain+'jobboard/tscms',
                        'data': {nomor:nomor,idjob:idjob,ajaxsort:1},
						'dataType':'json',
						'success': function(result){
						
						var str='';
						var no='';
									$.each(result.data,function(k,v){ 
									
									no=no+1;
									str+='<tr>';
									str+='<td align="center">'+v.no+' <input type="hidden" name="jobid" class="jobsid" value="'+v.id_job+'">';
									str+='</td>';
									str+='<td align="center">';
									str+='<input type="checkbox" name="namecheck[]" class="checkjob" id="'+v.user_id+'" value="'+v.user_id+'" attr="'+no+'">';
									str+='</td>';
									
									
									str+='<td>';
									str+='<div class="smallthumb"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" width="30" height="50" /></div>';
									str+='<div class="usdetail">';
									str+='<h6><a href="'+basedomain+'personal/view?id='+v.user_id+'">'+v.name+'</a></h6>';
									str+='<a target="blank_" href="'+basedomain+'dashboard/download?param='+v.user_id+'" class="button2 downloadsCV">DOWNLOAD CV</a>';
									str+='</div>';
									str+='</td>';
									
									
									str+='<td align="center">';
									str+='<span class="date">'+v.dateapply+'</span>';
									str+='</td>';
									
									
									str+='<td align="center">';
									str+='<span class="age">'+v.birthday+'</span>';
									str+='</td>';
									
									
									str+='<td align="center">';
									if (v.agent)
									{
									
											str+='Yes';	
											}else{
											str+='No';
											}
								
									str+='</td>';
									
									
									str+='<td align="center">';
									if(v.experience)
									
											{
											str+='Yes';	
											}else{
											str+='No';
											}
								
									str+='</td>';
									
									
									str+='<td align="center"><span class="address">'+v.provincy+','+v.city+'</span></td>';
									
									str+='<td align="center">';
										if(v.interview==0)
										{
										str+='<span class="usent{$list[j].user_id}">Unsent</span>';
										}
										if(v.interview==1 || v.interview==2 || v.interview==3 )
										{
										str+='Sent';
										}else{
										str+='Unsent';
										}
									str+='</td>';
									
									str+='<td align="center">';
									if(v.interview==2)
									{
									str+='<span class="green">Accepted</span>';
									}
									if (v.interview==3)
									{
									str+='<span class="red">Decline</span>';
									}
									if(v.interview==0 || v.interview==1)
									{
									str+='<span class="grey">Waiting</span>';
									}
									str+='</td>';
									
									str+='</tr>';
									
									
									});
									$('.shorinterview').html(str);
									thisss.data('sort',typesort);
						   }
						   });
						   
	 
	 });
	 });
	   			
$(document).ready(function(){
   
     $('.srespond').click(function(e){
	  var nomor=$(this).data('sort');
		 if(nomor=='')
		 {
			nomor=0;
			typesort=9;
		 }
		 else
		 {
			typesort=0;
		 }
		 thisss=$(this);
	   $.ajax({
						'type': 'POST',
                        'url': basedomain+'jobboard/tscms',
                        'data': {nomor:nomor,idjob:idjob,ajaxsort:1},
						'dataType':'json',
						'success': function(result){
						
						var str='';
						var no='';
									$.each(result.data,function(k,v){ 
									
									no=no+1;
									str+='<tr>';
									str+='<td align="center">'+v.no+' <input type="hidden" name="jobid" class="jobsid" value="'+v.id_job+'">';
									str+='</td>';
									str+='<td align="center">';
									str+='<input type="checkbox" name="namecheck[]" class="checkjob" id="'+v.user_id+'" value="'+v.user_id+'" attr="'+no+'">';
									str+='</td>';
									
									
									str+='<td>';
									str+='<div class="smallthumb"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" width="30" height="50" /></div>';
									str+='<div class="usdetail">';
									str+='<h6><a href="'+basedomain+'personal/view?id='+v.user_id+'">'+v.name+'</a></h6>';
									str+='<a target="blank_" href="'+basedomain+'dashboard/download?param='+v.user_id+'" class="button2 downloadsCV">DOWNLOAD CV</a>';
									str+='</div>';
									str+='</td>';
									
									
									str+='<td align="center">';
									str+='<span class="date">'+v.dateapply+'</span>';
									str+='</td>';
									
									
									str+='<td align="center">';
									str+='<span class="age">'+v.birthday+'</span>';
									str+='</td>';
									
									
									str+='<td align="center">';
									if (v.agent)
									{
									
											str+='Yes';	
											}else{
											str+='No';
											}
								
									str+='</td>';
									
									
									str+='<td align="center">';
									if(v.experience)
									
											{
											str+='Yes';	
											}else{
											str+='No';
											}
								
									str+='</td>';
									
									
									str+='<td align="center"><span class="address">'+v.provincy+','+v.city+'</span></td>';
									
									str+='<td align="center">';
										if(v.interview==0)
										{
										str+='<span class="usent{$list[j].user_id}">Unsent</span>';
										}
										if(v.interview==1 || v.interview==2 || v.interview==3 )
										{
										str+='Sent';
										}else{
										str+='Unsent';
										}
									str+='</td>';
									
									str+='<td align="center">';
									if(v.interview==2)
									{
									str+='<span class="green">Accepted</span>';
									}
									if (v.interview==3)
									{
									str+='<span class="red">Decline</span>';
									}
									if(v.interview==0 || v.interview==1)
									{
									str+='<span class="grey">Waiting</span>';
									}
									str+='</td>';
									
									str+='</tr>';
									
									
									});
									$('.shorinterview').html(str);
									thisss.data('sort',typesort);
						   }
						   });
						   
	 
	 });
	 });
	 
			}