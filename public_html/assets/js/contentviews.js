//<!-- Develope Creasi By Wahyu dan Imam -->
function messageread(idpesan){ 
			 
			
				  
					 $.ajax({
					
							'type': 'POST',
							'url': ''+basedomain+'message/ajaxreadmessage',
							'data': 'idnya='+idpesan,
							'dataType':'json',
							'beforeSend':function(){    
							
														
														$('.inbox').hide();
														$(".loading").show();
															
             										},
							'success': function(result){
							if(result.status==1)
							{
									$(".loading").hide();
									var str="";
									$.each(result.data,function(k,v){  
										
											
											console.log(v.from);
											str+='<div class="hasilinbox">';
											str+=v.from+'<br>';
											str+=v.date+'<br>';
											str+=v.message+'<br>';
											str+='<a href="#" class="backlist">back to inbox</a>';
											str+='</div>';
									});
									$('.boxinbox').html(str);
									$('.backlist').click(function(e){
									
										  e.preventDefault();
										  $link = $(this);
											 $.ajax({
											
													'type': 'POST',
													'url': ''+basedomain+'message/ajaxlist',
													'data': 'mydata',
													'dataType':'json',
													'beforeSend':function(){    
													
																				$(".hasilinbox").hide();
																				$(".loading").show();
																					
																			},
													'success': function(result){
															
															$(".loading").hide();
															var str="";
															str+='<table class="tabpag"><tr><th>Dari</th><th>Date</th><th>Message</th></tr>';
															$.each(result.data,function(k,v){  
															
																	if(v.n_status==1)
																	{
																	str+='<tr>';
																	str+='<td><span><a href="#" style="color:#000;" idpesan="'+v.id+'" class="read">'+v.from+'</span></td> ';
																	str+='<td><span><a href="#" style="color:#000;" idpesan="'+v.id+'" class="read">'+v.date+'</span></td> ';
																	str+='<td><span><a href="#" style="color:#000;" idpesan="'+v.id+'" class="read">'+v.message+'</span></td> ';
																	str+='<tr> ';
																	}else{
																	str+='<tr>';
																	str+='<td><strong><span><a href="#" style="color:#000;" value="'+v.id+'" class="read2">'+v.from+'</span></td> ';
																	str+='<td><strong><span><a href="#" style="color:#000;" value="'+v.id+'" class="read2">'+v.date+'</span></td> ';
																	str+='<td><strong><span><a href="#" style="color:#000;" value="'+v.id+'" class="read2">'+v.message+'</span></td> ';
																	str+='<tr> ';
																	
																	}
																
																
															});
															str+='</table>';
															$('.boxinbox').html(str); 
															$('.read').click(function(e){
																var idpesan = $(this).attr('idpesan');
																$('.tabpag').hide();
																messageread(idpesan);
															});	
															 $('.read2').click(function(e){
																 var idpesan = $(this).attr('value');
																 $('.tabpag').hide();
																 messageinread(idpesan);
																 });
													}
												},"JSON");
											});
							}
							
							
							
							}
						},"JSON");
				}
		

	function messageinread(idpesan){ 	
		$.ajax({
					
							'type': 'POST',
							'url': ''+basedomain+'message/ajaxreadmessage',
							'data': 'idnya='+idpesan+'&incative=ok',
							'dataType':'json',
							'beforeSend':function(){    
							
														
														$('.inbox').hide();
														$(".loading").show();
															
             										},
							'success': function(result){
							if(result.status==1)
							{
									$(".loading").hide();
									var str="";
									$.each(result.data,function(k,v){  
										
											
											
											str+='<div class="hasilinbox">';
											str+=v.from+'<br>';
											str+=v.date+'<br>';
											str+=v.message+'<br>';
											str+='<a href="#" class="backlist">back to inbox</a>';
											str+='</div>';
										
									});
									$('.boxinbox').html(str);
									$('.backlist').click(function(e){
									//console.log('masuk back');
										  e.preventDefault();
										  $link = $(this);
											 $.ajax({
											
													'type': 'POST',
													'url': ''+basedomain+'message/ajaxlist',
													'data': 'mydata',
													'dataType':'json',
													'beforeSend':function(){    
													
																				$(".hasilinbox").hide();
																				$(".loading").show();
																					
																			},
													'success': function(result){
															
															$(".loading").hide();
														
															var str="";
															str+='<table class="tabpag2"><tr><th>Dari</th><th>Date</th><th>Message</th></tr>';
															$.each(result.data,function(k,v){  
															
																	if(v.n_status==1)
																	{
																	str+='<tr>';
																	str+='<td><span><a href="#" style="color:#000;" idpesan="'+v.id+'" class="read">'+v.from+'</span></td> ';
																	str+='<td><span><a href="#" style="color:#000;" idpesan="'+v.id+'" class="read">'+v.date+'</span></td> ';
																	str+='<td><span><a href="#" style="color:#000;" idpesan="'+v.id+'" class="read">'+v.message+'</span></td> ';
																	str+='<tr> ';
																	}else{
																	str+='<tr>';
																	str+='<td><strong><span><a href="#" style="color:#000;" value="'+v.id+'" class="read2">'+v.from+'</span></td> ';
																	str+='<td><strong><span><a href="#" style="color:#000;" value="'+v.id+'" class="read2">'+v.date+'</span></td> ';
																	str+='<td><strong><span><a href="#" style="color:#000;" value="'+v.id+'" class="read2">'+v.message+'</span></td> ';
																	str+='<tr> ';
																	
																	}
																	
															
														
																	
																
															});
															str+='</table><img src="'+basedomain+'assets/img/loading.gif" class="loading" style="display:none;">';
															
															$('.boxinbox').html(str);
															$('.read').click(function(e){
																var idpesan = $(this).attr('idpesan');
																$('.tabpag2').hide();
																messageread(idpesan);
															});	
																 $('.read2').click(function(e){
																 var idpesan = $(this).attr('value');
																 $('.tabpag2').hide();
																 messageinread(idpesan);
																 });
																																
													}
												},"JSON");
											});
							}
							
							
							
							}
						},"JSON");
						}
	
function notificationread(idpesan){ 
			 
			
				  
					 $.ajax({
					
							'type': 'POST',
							'url': ''+basedomain+'notification/ajaxreadmessage',
							'data': 'idnya='+idpesan,
							'dataType':'json',
							'beforeSend':function(){    
							
														
														$('.inbox').hide();
														$(".loading").show();
															
             										},
							'success': function(result){
							if(result.status==1)
							{
									$(".loading").hide();
									var str="";
									$.each(result.data,function(k,v){  
										
											
											console.log(v.from);
											str+='<div class="hasilinbox">';
											str+=v.from+'<br>';
											str+=v.date+'<br>';
											str+=v.message+'<br>';
											str+='<a href="#" class="backlist">back to inbox</a>';
											str+='</div>';
									});
									$('.boxinbox').html(str);
									$('.backlist').click(function(e){
									
										  e.preventDefault();
										  $link = $(this);
											 $.ajax({
											
													'type': 'POST',
													'url': ''+basedomain+'notification/ajaxlist',
													'data': 'mydata',
													'dataType':'json',
													'beforeSend':function(){    
													
																				$(".hasilinbox").hide();
																				$(".loading").show();
																					
																			},
													'success': function(result){
															
															$(".loading").hide();
															var str="";
															str+='<table class="tabpag"><tr><th>Dari</th><th>Date</th><th>Message</th></tr>';
															$.each(result.data,function(k,v){  
															
																	if(v.n_status==1)
																	{
																	str+='<tr>';
																	str+='<td><span><a href="#" style="color:#000;" idpesan="'+v.id+'" class="read">'+v.from+'</span></td> ';
																	str+='<td><span><a href="#" style="color:#000;" idpesan="'+v.id+'" class="read">'+v.date+'</span></td> ';
																	str+='<td><span><a href="#" style="color:#000;" idpesan="'+v.id+'" class="read">'+v.message+'</span></td> ';
																	str+='<tr> ';
																	}else{
																	str+='<tr>';
																	str+='<td><strong><span><a href="#" style="color:#000;" value="'+v.id+'" class="read2">'+v.from+'</span></td> ';
																	str+='<td><strong><span><a href="#" style="color:#000;" value="'+v.id+'" class="read2">'+v.date+'</span></td> ';
																	str+='<td><strong><span><a href="#" style="color:#000;" value="'+v.id+'" class="read2">'+v.message+'</span></td> ';
																	str+='<tr> ';
																	
																	}
																
																
															});
															str+='</table>';
															$('.boxinbox').html(str); 
															$('.read').click(function(e){
																var idpesan = $(this).attr('idpesan');
																$('.tabpag').hide();
																notificationread(idpesan);
															});	
															 $('.read2').click(function(e){
																 var idpesan = $(this).attr('value');
																 $('.tabpag').hide();
																 notificationinread(idpesan);
																 });
													}
												},"JSON");
											});
							}
							
							
							
							}
						},"JSON");
				}
		

	function notificationinread(idpesan){ 	
		$.ajax({
					
							'type': 'POST',
							'url': ''+basedomain+'notification/ajaxreadmessage',
							'data': 'idnya='+idpesan+'&incative=ok',
							'dataType':'json',
							'beforeSend':function(){    
							
														
														$('.inbox').hide();
														$(".loading").show();
															
             										},
							'success': function(result){
							if(result.status==1)
							{
									$(".loading").hide();
									var str="";
									$.each(result.data,function(k,v){  
										
											
											
											str+='<div class="hasilinbox">';
											str+=v.from+'<br>';
											str+=v.date+'<br>';
											str+=v.message+'<br>';
											str+='<a href="#" class="backlist">back to inbox</a>';
											str+='</div>';
										
									});
									$('.boxinbox').html(str);
									$('.backlist').click(function(e){
									//console.log('masuk back');
										  e.preventDefault();
										  $link = $(this);
											 $.ajax({
											
													'type': 'POST',
													'url': ''+basedomain+'notification/ajaxlist',
													'data': 'mydata',
													'dataType':'json',
													'beforeSend':function(){    
													
																				$(".hasilinbox").hide();
																				$(".loading").show();
																					
																			},
													'success': function(result){
															
															$(".loading").hide();
														
															var str="";
															str+='<table class="tabpag2"><tr><th>Dari</th><th>Date</th><th>Message</th></tr>';
															$.each(result.data,function(k,v){  
															
																	if(v.n_status==1)
																	{
																	str+='<tr>';
																	str+='<td><span><a href="#" style="color:#000;" idpesan="'+v.id+'" class="read">'+v.from+'</span></td> ';
																	str+='<td><span><a href="#" style="color:#000;" idpesan="'+v.id+'" class="read">'+v.date+'</span></td> ';
																	str+='<td><span><a href="#" style="color:#000;" idpesan="'+v.id+'" class="read">'+v.message+'</span></td> ';
																	str+='<tr> ';
																	}else{
																	str+='<tr>';
																	str+='<td><strong><span><a href="#" style="color:#000;" value="'+v.id+'" class="read2">'+v.from+'</span></td> ';
																	str+='<td><strong><span><a href="#" style="color:#000;" value="'+v.id+'" class="read2">'+v.date+'</span></td> ';
																	str+='<td><strong><span><a href="#" style="color:#000;" value="'+v.id+'" class="read2">'+v.message+'</span></td> ';
																	str+='<tr> ';
																	
																	}
																	
															
														
																	
																
															});
															str+='</table><img src="'+basedomain+'assets/img/loading.gif" class="loading" style="display:none;">';
															
															$('.boxinbox').html(str);
															$('.read').click(function(e){
																var idpesan = $(this).attr('idpesan');
																$('.tabpag2').hide();
																notificationread(idpesan);
															});	
																 $('.read2').click(function(e){
																 var idpesan = $(this).attr('value');
																 $('.tabpag2').hide();
																 notificationinread(idpesan);
																 });
																																
													}
												},"JSON");
											});
							}
							
							
							
							}
						},"JSON");
						}			
						
						
function paging_ajax_talent(fungsi,start){ 
// console.log('sss');return false;
	var okeh = $("#sortby").val();
	var search = $("#searching").val();
	$.post(basedomain+"talentboard/ajaxPaging",{start:start,ajax:1,okeh:okeh,search:search},function(response){
		if(response){
			  if(response.status==1){
		var no = start+1;
		var str="";
		
		$.each(response.data.result,function(k,v){  
	
                            
                             
			str+='<li>';
			str+='<div class="box">';
			str+='<div class="boximg profilethumb thumb boxpop">';
		
			if(v.img_avatar)
											{
												if(xsa==v.id)
												{
													str+='<a href="'+basedomain+'personal" class="thumbbox"> <img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" width="200px" height="200px"></img> </a> ';
												
												}
												else
												{
													str+='<a href="'+basedomain+'personal/view/'+v.id+'" class="thumbbox"> <img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" width="200px" height="200px"></img> </a> ';
												}
												
											}else{
												if(xsa==v.id)
												{
													str+='<a href="'+basedomain+'personal" class="thumbbox"> <img src="'+basedomain+'public_assets/personal/images.jpg" width="200px" height="200px"></img> </a> ';
													str+='<button type="button" class="editPop edit-avatar btn btn-info">Edit</button>';
												}
												else
												{
													str+='<a href="'+basedomain+'personal/view/'+v.id+'" class="thumbbox"> <img src="'+basedomain+'public_assets/personal/images.jpg" width="200px" height="200px"></img> </a> ';
												}
											
											}
		
			str+='</div>';
			str+='<div class="caption">';
			str+='<div class="author-box">';
			
											if(xsa==v.id)
												{
													nameuser=v.name+' '+v.lastname.substring(0,15);
													nameuser=nameuser.substring(0,20);
													
													str+='<a class="author-name" href="'+basedomain+'personal">'+nameuser+'</a>';
												}
												else
												{
													nameuser=v.name+' '+v.lastname.substring(0,15);
													nameuser=nameuser.substring(0,20);
													str+='<a class="author-name" href="'+basedomain+'personal/view/'+v.id+'">'+nameuser+'</a>';
												}
			
			str+='<span class="author-talent">';
				if(v.catuser)
				{
				
				$.each(v.catuser,function(kk,vv){ 
											if (vv.category_name)
											{
												if(kk==0)
												{
													str+=vv.category_name;
													
												}
												else
												{
													str+=' & '+vv.category_name;
													
												}
											}else{
											str+=' ';
											}
											});
				}
				else
				{
				
					str+='-';
				}
			str+='</span>';
			
			str+='</div>';

			str+='<div class="meta-info">';
			str+='<a href="#" class="newIcon-view-grey"><span>'+v.view_count+'</span></a>';
		
			str+='<a href="#" class="newIcon-like-grey">'+v.love_count+' <span class="count_like likesnya daribtn'+v.id+'"></span></a>';
			if(!v.likenyauser)
			{
			str+='<a href="#" class="btn-like btn-likes" value="'+response.uidlike+'" data-type="0" folow="'+v.id+'">Like</a>';
			}else{
			str+='<a href="#" class="btn-like redbtn btn-likes" value="'+response.uidlike+'" data-type="1"  folow="'+v.id+'"> Like</a>';
			}
			str+='</div>';
			str+='</div>';
			
			if(response.popularlist)
			{
				$.each(response.popularlist,function(kk,vv){ 
							if(vv.id==v.id){
							str+='<div class="ribbon-yellow">&nbsp;</div>';
							}
							});
			}
			str+='</div>';
			str+='</li>';
		
			
			no++;
		});
		$('.pagingtemplates').html(str);
		$(function() {
			// Avatar
			$('.edit-avatar').imgPicker({
				el: '.avatar',
				type: 'avatar',
				//aspectRatio: '1:1', // The aspect ratio is done automatically but you can set it manually
				minWidth: 90,
				minHeight: 90,
				title: 'Change your avatar' 
			});

			// Cover
			$('.edit-cover').imgPicker({
				el: '.cover',
				type: 'cover',
			
				title: 'Change cover',
				webcam: false
			});

			// Background
			$('.edit-bg').imgPicker({
				el: '', // No element	
				type: 'background',
				title: 'Change background',
				webcam: false,
				// Success callback
				complete: function(imageUrl) {
					// Set body background
					$('body').css('background-image', 'url("' + imageUrl + '")');
				}
			});
		});
		
		  $(document).ready(function(){
				$('.c-likes').click(function(e){
									
								var likenya=$(this).attr('value');
								var friendlikes=$(this).attr('folow');
								//console.log(likenya);
								//console.log(friendlikes);
								var thiss=$(this);
								e.preventDefault();
								if(likenya && likenya!='vU9+1KNgzoWf3XejBnbWaqjGC9LKasXq/xNt2d6Ior0=')
								{
									$.ajax({
									
										'type': 'POST',
										'url': basedomain+'talentboard/ajaxlike',
										'data':{uid:likenya,idnya:friendlikes},
										'dataType':'json',
										'success': function(response){
											var str='';
											str+=response.countnya;
											thiss.find('.likesnya').text(str);
											if(thiss.data('type')==1)
											{
												thiss.removeClass('redbtn');
												//console.log(thiss.data('type'));
												thiss.data('type',0);
											}
											else
											{
												thiss.addClass('redbtn');
													thiss.data('type',1);
											}
										}
										
										
										
										});
								}
								});
							});
				  $(document).ready(function(){
				$('.btn-like').click(function(e){
									
								var likenya=$(this).attr('value');
								var friendlikes=$(this).attr('folow');
								//console.log(likenya);
								//console.log(friendlikes);
								var thiss=$(this);
								e.preventDefault();
								if(likenya && likenya!='vU9+1KNgzoWf3XejBnbWaqjGC9LKasXq/xNt2d6Ior0=')
								{
									$.ajax({
									
										'type': 'POST',
										'url': basedomain+'talentboard/ajaxlike',
										'data':{uid:likenya,idnya:friendlikes},
										'dataType':'json',
										'success': function(response){
											var str='';
											str+=response.countnya;
										
											$('.daribtn'+friendlikes).text(str);
											if(thiss.data('type')==1)
											{
												thiss.removeClass('redbtn');
												//console.log(thiss.data('type'));
												thiss.data('type',0);
											}
											else
											{
												thiss.addClass('redbtn');
													thiss.data('type',1);
											}
										}
										
										
										
										});
									}
								});
							});		
				console.log('sss6');			
							
	}else{
	   $('.pagingtemplates').html('<tr><td colspan="5">'+response.msg+'</td></tr>'); 
	 
	}
		}
	},"JSON");
}

					
function paging_ajax_jobboard(fungsi,start){ 
var  category = new Array;
			$.each($('.joincategory:checked'),function(k,v){  
			  category.push($(this).val());
			});
	var okeh = $("#sortby").val();
	var search = $("#searching").val();
	$.post(basedomain+"jobboard/ajaxPaging",{start:start,ajax:1,okeh:okeh,search:search,category:category},function(response){
		if(response){
			  if(response.status==1){
		var no = start+1;
		var str="";
		$.each(response.data.result,function(k,v){  
	
                            
                             
			str+=' <div class="rowjob ">';
			str+='<div class="boximg">';
			if(v.img_avatar)
			{
			str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"> <img width="200px" height="200px" src="'+basedomain+'public_assets/personal/'+v.img_avatar+'"></img> </a> ';
			}else{
			str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"> <img width="200px" height="200px" src="'+basedomain+'public_assets/personal/ts.png"></img> </a> ';
			}
			str+='<div class="caption">';
			str+=' <i>No. of likes: '+v.love_count+'</i>';
			str+='</div>';
			$.each(response.popular,function(kk,vv){ 
							if(vv.id_job==v.id_job)
							{
							str+='<div class="ribbon">Most Popular</div>';
							}
							});
			str+='</div>';
			str+=' <div class="entry">';
            str+='<h3><a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'">'+v.job_title+'</a></h3>';
            str+=' <div class="meta-post">';
             str+='<a href="'+basedomain+'personal/view_profilets/'+v.user_id+'" class="company-name"><i class="icon-suitcase">&nbsp;</i>'+v.nama_perusahaan+'</a>';
			if (v.verified == 1)
			{
                 str+='<a href="#" class="company-status"><i class="icon-check-circle">&nbsp;</i> Verified</a>';
			}
			 str+='<a href="#" class="location-name"/><i class="icon-map-marker">&nbsp;</i>';
			 if(v.provinsi)
						{
							str+=v.provinsi;
						}
						if(v.city)
						{
							str+=','+v.city;
						}
			 
			 str+='</a>';
			// str+='<a href="'+basedomain+'share/twitterShare/jobs/'+v.id+'/jobboard" class="location-name"/><i class="glyphicon icon-log-out">&nbsp;</i> twitter share</a>';
             str+='</div>';
             str+=' <p align="justify">'+v.deskripsi.substring(0,240)+'</p>';
             str+=' </div>';
             str+='  <div class="jobInfo">';
			  if (v.n_status_interview == 0 && v.n_status == 1)
			 {
             str+=' <a class="label bggreen" href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'"> OPEN</a>';
			 }
			  if (v.n_status_interview == 1 && v.n_status == 1)
			 {
			 str+=' <a class="label bgyellow" href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'"> INTERVIEW</a>';
			 }
			
             str+='<div class="countdown-job">';
             str+='<h4><b>'+v.hari+'</b></h4>';
             str+=' <span>DAYS LEFT TO APPLY</span>';
             str+=' </div>';
             str+='<span class="applicantsNo">No. of Applicants:'+v.registrant+'</span>';
             str+=' </div><!-- end .jobInfo -->  ';
		     str+='</div><!-- end .rowjob -->';	
			 
		
			
			no++;
		});
		$('.job-list').html(str);
		
				
		
	}else{
	   $('.job-list').html('<tr><td colspan="5">'+response.msg+'</td></tr>');
	 
	}
		}
	},"JSON");
	
}


function paging_ajax_dashboard(fungsi,start){ 
				var okeh = $(".shortdashboardapp").val();
				var uid = $(".uidnyah").val();
	$.post(basedomain+"dashboard/ajaxmostview",{start:start,ajax:1,uid:uid,sortir:okeh},function(response){
	
		if(response){
			  if(response.status==1){
	
		var str="";
		$.each(response.data.result,function(k,v){  
						
							
                        str+='<div class="rowjob">';
						str+='<div class="boximg">';
                            
                        
						if (response.images !== '' || response.images !=='null' )
						{
						if (response.role == 1)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+response.images+'" height="200px" width="200px"/></a>';
						}
						if(response.role == 2)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+response.images+'" height="200px" width="200px"/></a>';
						}
						
						}else{
						if (response.role == 1)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/ts.png" height="200px" width="200px"/></a>';
						}
						if(response.role == 2)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/ts.png" height="200px" width="200px"/></a>';
						}
						
						
						}
						
						str+='<div class="caption">';
                        str+='<i>No. of likes: '+v.love_count+'</i>';
                        str+='</div>';   
									
									$.each(response.popularlist,function(kk,vv){  
									if (vv.id_job ==v.id_job)
									{
									str+='<div class="ribbon">Most Popular</div>';
									}
								
									});
                                  
                        str+='</div>';
                        str+='<div class="entry">';
					    str+='<h3><a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'">'+v.job_title+'</a></h3>';
					    str+='<div class="meta-post">';
						str+='<a href="#" class="company-name"><i class="icon-suitcase">&nbsp;</i>'+v.nama_perusahaan+'</a>';
											if (v.verified == 1){
											str+='<a href="#" class="company-status"><i class="icon-check-circle">&nbsp;</i> Verified</a>';
											}
											
						str+='<a href="#" class="location-name"/><i class="icon-map-marker">&nbsp;</i>';
						
						if(v.provinsi)
						{
							str+=v.provinsi;
						}
						if(v.city)
						{
							str+=','+v.city;
						}
						
						str+='</a>';
						str+='</div>';
						str+='<p align="justify">'+v.job_description.substring(0,150)+'</p>';
						str+='</div>';
                        str+=' <div class="jobInfo">';
                                   if(role === 2)
								   {
											if (v.n_status==6){
											str+='<h4 class="draft">DRAFT</h4>';
											str+='<p><a href="'+basedomain+'postjobs/editdraft/'+v.id_job+'" class="label bggrey"><span>EDIT JOB</span></a>';
											str+='<a href="'+basedomain+'postjobs/deletejob?id='+v.id_job+'" class="label bggrey"><span>DELETE JOB</span></a>';
											str+='</p>';
											}
											
											if ( v.n_status==1 && v.hari > 0 && v.n_status_interview != 1)
											{
											str+='<a class="label bggreen" href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'"> OPEN</a>';
											str+='<div class="countdown-job">';
											str+='<h4><b>';
													if (v.hari <= 0)
													{
														str+='0';
													}else
													{
													str+=v.hari;
													}
											str+='</b></h4>';
											str+='<span>DAYS LEFT TO APPLY</span>';
											str+='</div>';
											str+='<span class="applicantsNo">No. of Applicants:'+v.registrant+'</span>';
											}
											if ( v.n_status==1 && v.hari <= 0 && v.n_status_interview == 0)
											{if (v.hari <= 0)
											{
											str+='<span class="label bggrey">Closed</span>';
											}else{
											str+='<a class="label bggreen" href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'"> OPEN</a>';
											}
											str+='<div class="countdown-job">';
											str+='<h4><b>';
													if (v.hari <= 0)
													{
													str+='0';
													}else
													{
													str+=v.hari;
													}
											str+='</b></h4>';
											str+='<span>DAYS LEFT TO APPLY</span>';
											str+='</div>';
											str+='<span class="applicantsNo">No. of Applicants:'+v.registrant+'</span>';
											}
											if ( v.n_status==1 && v.hari > 0 && v.n_status_interview == 1)
											{
											if (v.hari <= 0)
											{
											str+='<span class="label bggrey">Closed</span>';
											}else{
											str+='<span class="label bgyellow">INTERVIEW</span>';
											}
											str+='<div class="countdown-job">';
											str+='<h4><b>';
												if (v.hari <= 0)
													{
														str+='0';
													}else
													{
													str+=v.hari;
													}
											str+='</b></h4>';
											str+='<span>DAYS LEFT TO APPLY</span>';
											str+='</div>';
											str+='<span class="applicantsNo">No. of Applicants:'+v.registrant+'</span>';
											}if ( v.n_status==1 && v.hari <= 0 && v.n_status_interview == 1)
											{
												if (v.hari <= 0)
											{
											str+='<span class="label bggrey">Closed</span>';
											}else{
											str+='<span class="label bgyellow">INTERVIEW</span>';
											}
											str+='<div class="countdown-job">';
											str+='<h4><b>';
												if (v.hari <= 0)
													{
													str+='0';
													}else
													{
													str+=v.hari;
													}
											str+='</b></h4>';
											str+='<span>DAYS LEFT TO APPLY</span>';
											str+='</div>';
											str+='<span class="applicantsNo">No. of Applicants:'+v.registrant+'</span>';
											}
											if ( v.n_status==0  && v.n_status_interview == 0)
											{
											if (v.hari <= 0)
											{
											str+='<span class="label bggrey">Closed</span>';
											}else{
											str+='<span class="label bggrey">WAITING</span>';
											}
											str+='<div class="countdown-job">';
											str+='<h4><b>';
												if (v.hari <= 0)
													{
													str+='0';
													}else
													{
													str+=v.hari;
													}
											str+='</b></h4>';
											str+='<span>DAYS LEFT TO APPLY</span>';
											str+='</div>';
											str+='<span class="applicantsNo">No. of Applicants:'+v.registrant+'</span>';
											}
									}
                               str+='</div>  ';  
								if (v.n_status == 2)
								{
								str+='<div class="redbox errorjob">';
								str+='<div class="redbox-entry">';
								str+='<h3>UNSUCCSESSFULL :(</h3>';
								str+='<p>JOB ID : '+v.id_job+'</p>';
								str+='<p>';
								str+='</div>';
								str+='</div>';
								}
								if (v.n_status == 0)
								{
								str+='<div class="redbox errorjob">';
								str+='<div class="redbox-entry">';
								str+='<h3>IN MODERATION ..</h3>';
								str+='<p>JOB ID : '+v.id_job+'</p>';
								str+='<p>';
								str+='</div>';
								str+='</div>';
								}
                           str+='</div>';
						   
						   
						   
						   
							});
	$(".shorting_myapp").html(str);
		
	}
		}
	},"JSON");
}

function paging_ajax_dashboard_ct(fungsi,start){ 
				var okeh = $(".shortdashboardapp").val();
				var uid = $(".uidnyah").val();
	$.post(basedomain+"dashboard/ajaxmostviewuser",{start:start,ajax:1,uid:uid,sortir:okeh},function(response){
	
		if(response){
			  if(response.status==1){
	
		var str="";
		$.each(response.data.result,function(k,v){  
						
							
                        str+='<div class="rowjob">';
						str+='<div class="boximg">';
                            
                        
					if (v.img_avatar !== '' || v.img_avatar !=='null' )
						{
						if (response.role == 1)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" height="200px" width="200px"/></a>';
						}
						if(response.role == 2)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" height="200px" width="200px"/></a>';
						}
						
						}else{
						if (response.role == 1)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/postjob/images.jpg" height="200px" width="200px"/></a>';
						}
						if(response.role == 2)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/postjob/images.jpg" height="200px" width="200px"/></a>';
						}
						
						
						}
						
						str+='<div class="caption">';
                        str+='<i>No. of likes: '+v.love_count+'</i>';
                        str+='</div>';   
									
									$.each(response.popularlist,function(kk,vv){  
									if (vv.id_job ==v.id_job)
									{
									str+='<div class="ribbon">Most Popular</div>';
									}
								
									});
                                  
                        str+='</div>';
                        str+='<div class="entry">';
					    str+='<h3><a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'">'+v.job_title+'</a></h3>';
					    str+='<div class="meta-post">';
						str+='<a href="#" class="company-name"><i class="icon-suitcase">&nbsp;</i>'+v.nama_perusahaan+'</a>';
											if (v.verified == 1){
											str+='<a href="#" class="company-status"><i class="icon-check-circle">&nbsp;</i> Verified</a>';
											}
											
						str+='<a href="#" class="location-name"/><i class="icon-map-marker">&nbsp;</i>';
						if(v.provinsi)
						{
							str+=v.provinsi;
						}
						if(v.city)
						{
							str+=','+v.city;
						}
						str+='</a>';
						str+='</div>';
						str+='<p align="justify">'+v.job_description.substring(0,150)+' </p>';
						str+='</div>';
                        str+=' <div class="jobInfo">';
                                   if(role === 2)
								   {
											if (v.n_status==6){
											str+='<h4 class="draft">DRAFT</h4>';
											str+='<p><a href="'+basedomain+'postjobs/editdraft/'+v.id_job;
											str+='class="button2"><span>EDIT JOB</span></a>';
											str+='<a href="'+basedomain+'postjobs/deletejob?id='+v.id_job+'" class="label bggrey"><span>DELETE JOB</span></a>';
											str+='</p>';
											}
											
											if ( v.n_status==1 && v.hari > 0 && v.n_status_interview != 1)
											{
											if (v.hari <= 0)
											{
											str+='<span class="label bggrey">Closed</span>';
											}else
											{
											str+='<a class="label bggreen" href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'"> OPEN</a>';
											}
											str+='<div class="countdown-job">';
											str+='<h4><b>';
											if (v.hari <= 0)
											{
													0
													}else
													{
													str+=v.hari;
													}
											str+='</b></h4>';
											str+='<span>DAYS LEFT TO APPLY</span>';
											str+='</div>';
											str+='<span class="applicantsNo">No. of Applicants:'+v.registrant+'</span>';
											}
											if ( v.n_status==1 && v.hari <= 0 && v.n_status_interview == 0)
											{
											if (v.hari <= 0)
											{
											str+='<span class="label bggrey">Closed</span>';
											}else
											{
											str+='<a class="label bggreen" href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'"> OPEN</a>';
											}
											str+='<div class="countdown-job">';
											str+='<h4><b>';
											if (v.hari <= 0)
											{
													0
													}else
													{
													str+=v.hari;
													}
											str+='</b></h4>';
											str+='<span>DAYS LEFT TO APPLY</span>';
											str+='</div>';
											str+='<span class="applicantsNo">No. of Applicants:'+v.registrant+'</span>';
											}
											if ( v.n_status==1 && v.hari > 0 && v.n_status_interview == 1)
											{
											if (v.hari <= 0)
											{
											str+='<span class="label bggrey">Closed</span>';
											}else
											{
											str+='<span class="label bgyellow">INTERVIEW</span>';
											}
											str+='<div class="countdown-job">';
											str+='<h4><b>';
												if (v.hari <= 0)
													{
													0
													}else
													{
													str+=v.hari;
													}
											str+='</b></h4>';
											str+='<span>DAYS LEFT TO APPLY</span>';
											str+='</div>';
											str+='<span class="applicantsNo">No. of Applicants:'+v.registrant+'</span>';
											}if ( v.n_status==1 && v.hari <= 0 && v.n_status_interview == 1)
											{
											if (v.hari <= 0)
											{
											str+='<span class="label bggrey">Closed</span>';
											}else
											{
											str+='<span class="label bgyellow">INTERVIEW</span>';
											}
											str+='<div class="countdown-job">';
											str+='<h4><b>';
												if (v.hari <= 0)
													{
													str+='0';
													}else
													{
													str+=v.hari;
													}
											str+='</b></h4>';
											str+='<span>DAYS LEFT TO APPLY</span>';
											str+='</div>';
											str+='<span class="applicantsNo">No. of Applicants:'+v.registrant+'</span>';
											}
									}else{
									if (v.n_status==6){
											str+='<h4 class="draft">DRAFT</h4>';
											str+='<p><a href="'+basedomain+'postjobs/editdraft/'+v.id_job;
											str+='class="button2"><span>EDIT JOB</span></a>';
											str+='<a href="'+basedomain+'postjobs/deletejob?id='+v.id_job+'" class="label bggrey"><span>DELETE JOB</span></a>';
											str+='</p>';
											}
											
											if ( v.n_status==1 && v.hari > 0 && v.n_status_interview != 1)
											{
											str+='<a class="label bggreen" href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'"> OPEN</a>';
											str+='<div class="countdown-job">';
											str+='<h4><b>';
											if (v.hari <= 0)
											{
													0
													}else
													{
													str+=v.hari;
													}
											str+='</b></h4>';
											str+='<span>DAYS LEFT TO APPLY</span>';
											str+='</div>';
											str+='<span class="applicantsNo">No. of Applicants:'+v.registrant+'</span>';
											}
											if ( v.n_status==1 && v.hari > 0 && v.n_status_interview == 1)
											{
											if (v.hari <= 0)
											{
											str+='<span class="label bggrey">Closed</span>';
											}else
											{
											str+='<span class="label bgyellow">INTERVIEW</span>';
											}
											str+='<div class="countdown-job">';
											str+='<h4><b>';
												if (v.hari <= 0)
													{
													0
													}else
													{
													str+=v.hari;
													}
											str+='</b></h4>';
											str+='<span>DAYS LEFT TO APPLY</span>';
											str+='</div>';
											str+='<span class="applicantsNo">No. of Applicants:'+v.registrant+'</span>';
											}if ( v.n_status==1 && v.hari <= 0 && v.n_status_interview == 1)
											{
											if (v.hari <= 0)
											{
											str+='<span class="label bggrey">Closed</span>';
											}else
											{
											str+='<span class="label bgyellow">INTERVIEW</span>';
											}
											str+='<div class="countdown-job">';
											str+='<h4><b>';
												if (v.hari <= 0)
													{
													str+='0';
													}else
													{
													str+=v.hari;
													}
											str+='</b></h4>';
											str+='<span>DAYS LEFT TO APPLY</span>';
											str+='</div>';
											str+='<span class="applicantsNo">No. of Applicants:'+v.registrant+'</span>';
											}
									
									}
                               str+='</div>  ';   
								if (v.n_status == 2)
								{
								str+='<div class="redbox errorjob">';
								str+='<div class="redbox-entry">';
								str+='<h3>UNSUCCSESSFULL :(</h3>';
								str+='<p>JOB ID : '+v.id_job+'</p>';
								str+='<p>';
								str+='</div>';
								str+='</div>';
								}
								if (v.n_status == 0)
								{
								str+='<div class="redbox errorjob">';
								str+='<div class="redbox-entry">';
								str+='<h3>IN MODERATION ..</h3>';
								str+='<p>JOB ID : '+v.id_job+'</p>';
								str+='<p>';
								str+='</div>';
								str+='</div>';
								}
                           str+='</div>';
							}); $(".shorting_myapp").html(str);
		
	
	}
		}
	},"JSON");
}

function paging_ajax_interview(fungsi,start){ 
				var okeh = $(".shortdashboardapp").val();
				var uid = $(".uidnyah").val();
	$.post(basedomain+"dashboard/ajaxmostview",{start:start,ajax:1,uid:uid,sortir:okeh},function(response){
	//console.log('sasadd');
		if(response){
			  if(response.status==1){
	
		var str="";
		if(response.role == 2)
				{
		$.each(response.listts,function(k,v){  
		
		
			str+='<div class="rowjob">';
			str+='<div class="boximg">';
            if (response.images !== '' || response.images !=='null' )
						{
						if (response.role == 1)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+response.images+'" height="200px" width="200px"/></a>';
						}
						if(response.role == 2)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+response.images+'" height="200px" width="200px"/></a>';
						}
						
						}else{
						if (response.role == 1)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/postjob/images.jpg" height="200px" width="200px"/></a>';
						}
						if(response.role == 2)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/postjob/images.jpg" height="200px" width="200px"/></a>';
						}
						
						
						}
						
						str+='<div class="caption">';
                        str+='<i>No. of likes: '+v.love_count+'</i>';
                        str+='</div>';   
									
									$.each(response.popularlist,function(kk,vv){  
									if (vv.id_job ==v.id_job)
									{
									str+='<div class="ribbon ribbonred">Most Popular</div>';
									}
								
									});
                                  
                        str+='</div>';
						
						
						
						
                     /*    str+='<div class="entry">';
					    str+='<h3><a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'">'+v.job_title+'</a></h3>';
					    str+='<div class="meta-post">';
						str+='<a href="#" class="company-name"><i class="icon-suitcase">&nbsp;</i>'+v.nama_perusahaan+'</a>';
											if (v.verified == 1){
											str+='<a href="#" class="company-status"><i class="icon-check-circle">&nbsp;</i> Verified</a>';
											}
											
						str+='<a href="#" class="location-name"/><i class="icon-map-marker">&nbsp;</i>'+v.provinsi+','+v.city+'</a>';
						str+='</div>';

						str+='<p class="interview-detail">';
						if(v.myapp)
							{
						
                        str+='<span class="interview-date"><strong>Date & Times</strong> : '+v.myapp['0'].interview_date+'</span>';
						if(v.myapp['0'].interview_address)
						{
                        str+='<span class="interview-location"><strong>Address</strong> : '+v.myapp['0'].interview_address+'</span>';
						}else{
						 str+='<span class="interview-location"><strong>Address</strong> : -</span>';
						}
						if(v.myapp['0'].interview_contact)
						{
                        str+='<span class="interview-contact"><strong>Contact Person</strong>: '+v.myapp['0'].interview_contact+'</span>';
						}else{
						str+='<span class="interview-contact"><strong>Contact Person</strong>: -</span>';
						}
						if(v.myapp['0'].interview_telp)
						{
                        str+='<span class="interview-phone"> <strong>Telephone</strong>: '+v.myapp['0'].interview_telp+'</span></p>';
						}else{
						str+='<span class="interview-phone"> <strong>Telephone</strong>: -</span></p>';
						}
					
						}
						str+='</div>'; */
						
						str+='<div class="entry">';
					    str+='<h3><a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'">'+v.job_title+'</a></h3>';
					    str+='<div class="meta-post">';
						str+='<a href="#" class="company-name"><i class="icon-suitcase">&nbsp;</i>'+v.nama_perusahaan+'</a>';
											if (v.verified == 1){
											str+='<a href="#" class="company-status"><i class="icon-check-circle">&nbsp;</i> Verified</a>';
											}
											
						str+='<a href="#" class="location-name"/><i class="icon-map-marker">&nbsp;</i>';
						
						if(v.provinsi)
						{
							str+=v.provinsi;
						}
						if(v.city)
						{
							str+=','+v.city;
						}
						str+='</a>';
						str+='</div>';
						str+='<p align="justify">'+v.job_description.substring(0,150)+' </p>';
						str+='</div>';
						
                        str+='<div class="jobInfo">';
						if(v.hari <= '0')
						{
						str+='<span class="label bggrey">Closed</span>';
						}else
						{
                        str+='<span class="label bgyellow">INTERVIEW</span>';
						}
                        str+='<div class="countdown-job">';
                        str+='<h4><b>';
						if(v.hari <= '0')
						{
						  str+='0';
						}else{
						  str+=v.hari;
						}
						str+='</b></h4>';
                        str+='<span>DAYS LEFT TO APPLY</span>';
                        str+='</div>';
                        str+='<span class="applicantsNo">No. of Applicants: '+v.registrant+'</span>';
                        str+='<a href="#'+v.id_job+'" class="openlist icon-chevron-down">OPEN APPLICANT(S)</a>';
                        str+='</div>';
						 
					
						//untuk table dibawahnya
						str+='<div class="interviewlist" id="'+v.id_job+'">';
                        str+='<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table2">';
                        str+='<tr>';
                        str+='<th>Status</th>';
                        str+='<th width="200">Name</th>';
                        str+='<th width="120">Date/Day</th>';
                        str+='<th width="50">Time</th>';
                        str+='<th width="200">Address</th>';
                        str+='<th>Contact Person</th>';
                        str+='</tr>';
						
						
							if(v.myapp)
							{
								$.each(v.myapp,function(c,b){  
										
												str+='<td>';
												str+=' <div class="selectbox">';
												str+='<select name="statusperson" class="statusperson" var="'+b.user_id+'">';
												str+='<option >Select One</option>';
												str+='<option value="noshow" ';
												if(b.marking=='1'){
												str+='selected';
												}else{
												str+='';
												}
												str+='>No Show</option>';
												str+='<option value="hired"';
												if(b.hire=='1'){
												str+='selected';
												}else{
												str+='';
												}
												str+='>Hired</option>';
												str+='</select>';
												str+='</div>';
												str+='</td>';
												str+='<td>';
												if(b.img_avatar)
												{
												str+='<div class="smallthumb"><img src="'+basedomain+'public_assets/personal/'+b.img_avatar+'" width="30" height="40"  /></div>';
												}else{
												str+='<div class="smallthumb"><img src="'+basedomain+'public_assets/personal/images.jpg" width="30" height="40"  /></div>';
												
												}
												if(b.name)
												{
												str+='<h6> <a href="'+basedomain+'personal/view/'+b.user_id+'" target="_blank"> '+b.name+'</a></h6>';
												}else{
												str+='<h6>-</h6>';
												}
												str+='</td>';
												str+=' <td align="center">';
												str+='<span class="date">';
												
												var d = new Date(b.datestring);
												str+=d.toDateString();
												
												str+='</span><br />';
											
												str+='</td>';
												str+='<td align="center"><span class="time">';
												if(b.timestring)
												{
													str+=b.timestring;
												}
												else
												{
													str+='-';
												}
												
												str+='</span></td>';
												if(b.interview_address)
												{
												str+='<td><span class="address">'+b.interview_address+'</span></td>';
												}else{
												str+='<td><span class="address">-</span></td>';
												}
												if(b.interview_contact)
												{
												str+='<td align="center"><span class="cp">'+b.interview_contact+'</span></td>';
												}else{
												str+='<td align="center"><span class="cp">-</span></td>';
												}
												str+='</tr>';
									  });
                                 }
								 
						str+='</table>';
                        str+='</div>';
                        str+='</div>';
						str+='<div id="popup-marking" class="popup mfp-hide" style="width:300px;">';
						str+='<div class="popupfullcontent">';
						str+='<h3 class="title">Marking <span class="red">Users</span></h3>';
						str+='<p>User Berhasil di Marking</p>';
						str+='</div>';
						str+='</div>';
						str+='<div id="popup-hire" class="popup mfp-hide" style="width:300px;">';
						str+='<div class="popupfullcontent">';
						str+='<h3 class="title">Hire <span class="red">Users</span></h3>';
						str+='<p>User Berhasil di Hire</p>';
						str+='</div>';
						str+='</div>';
						str+='</div>'; 
						
						
						});
						
						}
						
					}
				}
			$(".shorting_interview").html(str);	

		$( ".openlist" ).click(function() {
	
			var targetID = $(this).attr('href');
				console.log(targetID);
			   $(this).toggleClass("icon-chevron-up");
			if ($(this).text() == "OPEN APPLICANT(S)")
			   $(this).text("CLOSE")
			else
			   $(this).text("OPEN APPLICANT(S)");
			$(targetID).toggleClass('showthis');
			return false;
		});
		
		
		$(".statusperson").change(function(){
								
					var statusperson = $(this).val();
					var idnya=$(this).attr('var');
					 $.ajax({
                        'type': 'POST',
                        'url': basedomain+'dashboard/ajaxstatusperson',
                        'data': {idnya:idnya,statusperson:statusperson},
						'dataType':'json',
                        'success': function(result){
						if(result.status==1)
						{
						
							setTimeout(function() {
							 if ($('#popup-marking').length) { 
							   $.magnificPopup.open({
								items: {
									src: '#popup-marking' 
								},
								type: 'inline'
								  });
							   }
							 }, 0);
							 
						}
						if(result.status==2){
						setTimeout(function() {
							 if ($('#popup-marking').length) { 
							   $.magnificPopup.open({
								items: {
									src: '#popup-hire' 
								},
								type: 'inline'
								  });
							   }
							 }, 0);
						}
						}
						});
					});

			
	},"JSON");
}

function paging_ajax_interview_ct(fungsi,start){ 
				var okeh = $(".shortdashboardapp").val();
				var uid = $(".uidnyah").val();
	$.post(basedomain+"dashboard/ajaxmostviewuser",{start:start,ajax:1,uid:uid,sortir:okeh},function(response){
	
		if(response){
			  if(response.status==1){
	
		var str="";
	
		$.each(response.list,function(k,v){  
		
			if (v.interview==1)
						{
						str+='<div class="rowjob">';
						str+='<div class="boximg">';
	
            if (v.img_avatar !== '' || v.img_avatar !=='null' )
						{
						
						
						if (response.role == 1)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" height="200px" width="200px"/></a>';
						}
						if(response.role == 2)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" height="200px" width="200px"/></a>';
						}
						
						}else{
						if (response.role == 1)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/postjob/images.jpg" height="200px" width="200px"/></a>';
						}
						if(response.role == 2)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/postjob/images.jpg" height="200px" width="200px"/></a>';
						}
						
						
						}
						
						str+='<div class="caption">';
                        str+='<i>No. of likes: '+v.love_count+'</i>';
                        str+='</div>';   
									
									$.each(response.popularlist,function(kk,vv){  
									if (vv.id_job ==v.id_job && vv.id_job !== 'null' )
									{
									str+='<div class="ribbon ribbonred">Most Popular</div>';
									}
								
									});
                                  
                        str+='</div>';
                        str+='<div class="entry">';
					    str+='<h3><a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'">'+v.job_title+'</a></h3>';
					    str+='<div class="meta-post">';
						str+='<a href="#" class="company-name"><i class="icon-suitcase">&nbsp;</i>'+v.nama_perusahaan+'</a>';
											if (v.verified == 1){
											str+='<a href="#" class="company-status"><i class="icon-check-circle">&nbsp;</i> Verified</a>';
											}
											
						str+='<a href="#" class="location-name"/><i class="icon-map-marker">&nbsp;</i> ';
						if(v.provinsi)
						{
							str+=v.provinsi;
						}
						if(v.city)
						{
							str+=','+v.city;
						}
						str+='</a>';
						str+='</div>';
						str+='<p class="interview-detail">';
                        str+='<span class="interview-date"><strong>Date & Times</strong> : '+v.interview_date+'</span>';
                        str+='<span class="interview-location"><strong>Address</strong> : '+v.interview_address+'</span>';
                        str+='<span class="interview-contact"><strong>Contact Person</strong>: '+v.interview_contact+'</span>';
                        str+='<span class="interview-phone"> <strong>Telephone</strong>: '+v.interview_telp+'</span></p>';
						str+='</div>';
                        str+='<div class="jobInfo">';
						str+='<span class="label bgyellow">INTERVIEW</span>';
						str+='  <p><a  class="button2 acceptint" value="2" attr="'+v.jobboard_id+'" idnya="'+response.uid+'"><span>ACCEPT</span></a></p>';
                        str+='<p>OR</p>';
                        str+='<p><a href="'+basedomain+'jobboard/detail_jobboard/'+v.jobboard_id+'" class="button1 decint " value="3" attr="'+v.jobboard_id+'" idnya="'+response.uid+'"><span>DECLINE</span></a></p>';
                        str+='</div>';
						str+='</div>';  
					}
			if (v.interview==2)
						{
						str+='<div class="rowjob">';
						str+='<div class="boximg">';
	
            if (v.img_avatar !== '' || v.img_avatar !=='null' )
						{
						
						
						if (response.role == 1)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" height="200px" width="200px"/></a>';
						}
						if(response.role == 2)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" height="200px" width="200px"/></a>';
						}
						
						}else{
						if (response.role == 1)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/postjob/images.jpg" height="200px" width="200px"/></a>';
						}
						if(response.role == 2)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/postjob/images.jpg" height="200px" width="200px"/></a>';
						}
						
						
						}
						
						str+='<div class="caption">';
                        str+='<i>No. of likes: '+v.love_count+'</i>';
                        str+='</div>';   
									
									$.each(response.popularlist,function(kk,vv){  
									if (vv.id_job ==v.id_job)
									{
									str+='<div class="ribbon ribbonred">Most Popular</div>';
									}
								
									});
                                  
                        str+='</div>';
                        str+='<div class="entry">';
					    str+='<h3><a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'">'+v.job_title+'</a></h3>';
					    str+='<div class="meta-post">';
						str+='<a href="#" class="company-name"><i class="icon-suitcase">&nbsp;</i>'+v.nama_perusahaan+'</a>';
											if (v.verified == 1){
											str+='<a href="#" class="company-status"><i class="icon-check-circle">&nbsp;</i> Verified</a>';
											}
											
						str+='<a href="#" class="location-name"/><i class="icon-map-marker">&nbsp;</i> ';
						if(v.provinsi)
						{
							str+=v.provinsi;
						}
						if(v.city)
						{
							str+=','+v.city;
						}
						
						str+='</a>';
						str+='</div>';
						str+='<p class="interview-detail">';
                        str+='<span class="interview-date"><strong>Date & Times</strong> : '+v.interview_date+'</span>';
                        str+='<span class="interview-location"><strong>Address</strong> : '+v.interview_address+'</span>';
                        str+='<span class="interview-contact"><strong>Contact Person</strong>: '+v.interview_contact+'</span>';
                        str+='<span class="interview-phone"> <strong>Telephone</strong>: '+v.interview_telp+'</span></p>';
						str+='</div>';
                        str+='<div class="jobInfo">';
						str+='<span class="label bgyellow">INTERVIEW</span>';
                        str+='<p><a class="button2" )"><span>ACCEPT</span></a></p>';
                        str+='</div>';
						str+='</div>';  
					}
					
		if (v.interview==3)
						{
						str+='<div class="rowjob">';
						str+='<div class="boximg">';
	
            if (v.img_avatar !== '' || v.img_avatar !=='null' )
						{
						
						
						if (response.role == 1)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" height="200px" width="200px"/></a>';
						}
						if(response.role == 2)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" height="200px" width="200px"/></a>';
						}
						
						}else{
						if (response.role == 1)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/postjob/images.jpg" height="200px" width="200px"/></a>';
						}
						if(response.role == 2)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/postjob/images.jpg" height="200px" width="200px"/></a>';
						}
						
						
						}
						
						str+='<div class="caption">';
                        str+='<i>No. of likes: '+v.love_count+'</i>';
                        str+='</div>';   
									
									$.each(response.popularlist,function(kk,vv){  
									if (vv.id_job ==v.id_job)
									{
									str+='<div class="ribbon ribbonred">Most Popular</div>';
									}
								
									});
                                  
                        str+='</div>';
                        str+='<div class="entry">';
					    str+='<h3><a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'">'+v.job_title+'</a></h3>';
					    str+='<div class="meta-post">';
						str+='<a href="#" class="company-name"><i class="icon-suitcase">&nbsp;</i>'+v.nama_perusahaan+'</a>';
											if (v.verified == 1){
											str+='<a href="#" class="company-status"><i class="icon-check-circle">&nbsp;</i> Verified</a>';
											}
											
						str+='<a href="#" class="location-name"/><i class="icon-map-marker">&nbsp;</i> ';
						if(v.provinsi)
						{
							str+=v.provinsi;
						}
						if(v.city)
						{
							str+=','+v.city;
						}
						str+='</a>';
						str+='</div>';
						str+='<p class="interview-detail">';
                        str+='<span class="interview-date"><strong>Date & Times</strong> : '+v.interview_date+'</span>';
                        str+='<span class="interview-location"><strong>Address</strong> : '+v.interview_address+'</span>';
                        str+='<span class="interview-contact"><strong>Contact Person</strong>: '+v.interview_contact+'</span>';
                        str+='<span class="interview-phone"> <strong>Telephone</strong>: '+v.interview_telp+'</span></p>';
						str+='</div>';
                        str+='<div class="jobInfo">';
						str+='<span class="label bgyellow">INTERVIEW</span>';
                        str+='<p><a class="button1" ><span>DECLINE</span></a></p>';
                        str+='</div>';
						str+='</div>';  
					}
		if(v.interview==4)
						{
						str+='<div class="rowjob">';
						str+='<div class="boximg">';
	
            if (v.img_avatar !== '' || v.img_avatar !=='null' )
						{
						
						
						if (response.role == 1)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+v.images+'" height="200px" width="200px"/></a>';
						}
						if(response.role == 2)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+v.images+'" height="200px" width="200px"/></a>';
						}
						
						}else{
						if (response.role == 1)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/postjob/images.jpg" height="200px" width="200px"/></a>';
						}
						if(response.role == 2)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/postjob/images.jpg" height="200px" width="200px"/></a>';
						}
						
						
						}
						
						str+='<div class="caption">';
                        str+='<i>No. of likes: '+v.love_count+'</i>';
                        str+='</div>';   
									
									$.each(response.popularlist,function(kk,vv){  
									if (vv.id_job ==v.id_job)
									{
									str+='<div class="ribbon ribbonred">Most Popular</div>';
									}
								
									});
                                  
                        str+='</div>';
                        str+='<div class="entry">';
					    str+='<h3><a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'">'+v.job_title+'</a></h3>';
					    str+='<div class="meta-post">';
						str+='<a href="#" class="company-name"><i class="icon-suitcase">&nbsp;</i>'+v.nama_perusahaan+'</a>';
											if (v.verified == 1){
											str+='<a href="#" class="company-status"><i class="icon-check-circle">&nbsp;</i> Verified</a>';
											}
											
						str+='<a href="#" class="location-name"/><i class="icon-map-marker">&nbsp;</i> ';
						if(v.provinsi)
						{
							str+=v.provinsi;
						}
						if(v.city)
						{
							str+=','+v.city;
						}
						
						str+='</a>';
						str+='</div>';
						str+='<p class="interview-detail">';
                        str+='<span class="interview-date"><strong>Date & Times</strong> : '+v.interview_date+'</span>';
                        str+='<span class="interview-location"><strong>Address</strong> : '+v.interview_address+'</span>';
                        str+='<span class="interview-contact"><strong>Contact Person</strong>: '+v.interview_contact+'</span>';
                        str+='<span class="interview-phone"> <strong>Telephone</strong>: '+v.interview_telp+'</span></p>';
						str+='</div>';
                        str+='<div class="jobInfo">';
						str+='<span class="label bgyellow">INTERVIEW</span>';
                        str+='<p><a href="" class="button1"><span>MARKING</span></a></p>';
                        str+='</div>';
						str+='</div>';  
					}
				else
					{
						str+='<div class="rowjob">';
						str+='<div class="boximg">';
	
            if (v.img_avatar !== '' || v.img_avatar !=='null' )
						{
						
						
						if (response.role == 1)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" height="200px" width="200px"/></a>';
						}
						if(response.role == 2)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" height="200px" width="200px"/></a>';
						}
						
						}else{
						if (response.role == 1)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/postjob/images.jpg" height="200px" width="200px"/></a>';
						}
						if(response.role == 2)
						{
						str+='<a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'" class="thumbbox"><img src="'+basedomain+'public_assets/postjob/images.jpg" height="200px" width="200px"/></a>';
						}
						
						
						}
						
						str+='<div class="caption">';
                        str+='<i>No. of likes: '+v.love_count+'</i>';
                        str+='</div>';   
									
									$.each(response.popularlist,function(kk,vv){  
									if (vv.id_job ==v.id_job && vv.id_job !== 'null' )
									{
									str+='<div class="ribbon ribbonred">Most Popular</div>';
									}
								
									});
                                  
                        str+='</div>';
                        str+='<div class="entry">';
					    str+='<h3><a href="'+basedomain+'jobboard/detail_jobboard/'+v.id_job+'">'+v.job_title+'</a></h3>';
					    str+='<div class="meta-post">';
						str+='<a href="#" class="company-name"><i class="icon-suitcase">&nbsp;</i>'+v.nama_perusahaan+'</a>';
											if (v.verified == 1){
											str+='<a href="#" class="company-status"><i class="icon-check-circle">&nbsp;</i> Verified</a>';
											}
											
						str+='<a href="#" class="location-name"/><i class="icon-map-marker">&nbsp;</i> ';
						if(v.provinsi)
						{
							str+=v.provinsi;
						}
						if(v.city)
						{
							str+=','+v.city;
						}
						
						str+='</a>';
						str+='</div>';
						str+='<p class="interview-detail">';
                        str+='<span class="interview-date"><strong>Date & Times</strong> : '+v.interview_date+'</span>';
                        str+='<span class="interview-location"><strong>Address</strong> : '+v.interview_address+'</span>';
                        str+='<span class="interview-contact"><strong>Contact Person</strong>: '+v.interview_contact+'</span>';
                        str+='<span class="interview-phone"> <strong>Telephone</strong>: '+v.interview_telp+'</span></p>';
						str+='</div>';
                        str+='<div class="jobInfo">';
						str+='<span class="label bgyellow">INTERVIEW</span>';
						str+='  <p><a  class="button2 acceptint" value="2" attr="'+v.jobboard_id+'" idnya="'+response.uid+'"><span>ACCEPT</span></a></p>';
                        str+='<p>OR</p>';
                        str+='<p><a href="'+basedomain+'jobboard/detail_jobboard/'+v.jobboard_id+'" class="button1 decint " value="3" attr="'+v.jobboard_id+'" idnya="'+response.uid+'"><span>DECLINE</span></a></p>';
                        str+='</div>';
						str+='</div>';  
					}				
                        str+='</div>';
						
						});
						
						}
						
					}
			
			$(".shorting_interview_ct").html(str);	

$(document).ready(function(){
                $('.acceptint').click(function(e){
                    e.preventDefault();
					var uid=$(this).attr('idnya');
					var jobid=$(this).attr('attr');
					var thiss=$(this);
					e.preventDefault();
                    $.ajax({
                        'type': 'POST',
                        'url': basedomain+'dashboard/decisionajaxinterview',
                        'data': {uid:uid,jobid:jobid},
						'dataType':'json',
                        'success': function(result){
						//console.log(parent);
						//console.log(thiss.parent().parent());
								if(result.status==1)
								{
								 var str="";
						
                                 str+='<span class="label bgyellow">INTERVIEW</span>';
                                 str+='<p><a class="button2" onclick="'+alert("Status Accept OK !")+'"><span>ACCEPT</span></a></p>';
							
								 
								 }
								 thiss.parent().parent().html(str);
								
						}
						});
						});
						});
						
						
		$(document).ready(function(){
                $('.decint').click(function(e){
                    e.preventDefault();
					var uid=$(this).attr('idnya');
					var jobid=$(this).attr('attr');
					var thiss=$(this);
					e.preventDefault();
                    $.ajax({
                        'type': 'POST',
                        'url': basedomain+'dashboard/decisionajaxinterviewdec',
                        'data': {uid:uid,jobid:jobid},
						'dataType':'json',
                        'success': function(result){
						//console.log(parent);
						//console.log(thiss.parent().parent());
								if(result.status==1)
								{
								 var str="";
						
                                 str+='<span class="label bgyellow">INTERVIEW</span>';
                                 str+='<p><a onclick='+alert("Status Deccept OK !")+' class="button1">DECLINE</span></a></p>';
							
								 
								 }
								 thiss.parent().parent().html(str);
								
						}
						});
						});
						});
				
			
	},"JSON");
}

function paging_of_interview_list_tscms(fungsi,start){ 
				
	$.post(basedomain+"jobboard/ajaxtscms",{start:start,ajax:1,id:jobsid},function(response){
	
		if(response){
			  if(response.status==1){
	
		var str="";
		$.each(response.data.result,function(k,v){
			
		str+='<tr>';
		str+='<td align="center">'+v.no+'<input type="hidden" name="jobid" class="jobsid" value='+v.id_job+'>';
		str+='</td>';
        str+='<td align="center">';
		str+='<input type="checkbox" name="namecheck[]" class="checkjob" id="'+v.user_id+'" value="'+v.user_id+'" attr="">';
	
		 
		str+='</td>';
        str+='<td>';
        str+='<div class="smallthumb">';
		str+='<img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" width="30" height="50"  />';
		str+='</div>';
		str+='<div class="usdetail">';
        str+='<h6><a href="'+basedomain+'personal/view/'+v.user_id+'">'+v.name+'</a></h6>';
		str+='<a href="'+basedomain+'dashboard/download?param='+v.user_id+'" class="button2 downloadsCV">DOWNLOAD CV</a>';
		str+='</div>';
        str+='</td>';
        str+='<td align="center">';
        str+='<span class="date">'+v.enddate+'</span>';
        str+='</td>';
        str+='<td align="center">';
        str+='<span class="age">'+v.birthday+'</span>';
        str+='</td>';
        str+='<td align="center">';
					if (v.agent)
					{
					str+=v.agent;
					}else{
					str+='NO';
					}
					   
        str+='</td>';
        str+=' <td align="center">';
                      if (v.experience)
					  {
						str+=v.experience;
					  }else
					  {
						str+='NO';
					  }
        str+='</td>';
        str+='<td align="center"><span class="address">';
		if(v.provinsi)
						{
							str+=v.provinsi;
						}
						if(v.city)
						{
							str+=','+v.city;
						}
		
		str+='</span></td>';
        str+='<td align="center">';
		if (v.interview==0)
				{
		str+='<span class="usent{$list[j].user_id}">Unsent</span>';
				}
		if (v.interview==1 || v.interview==2 || v.interview==3 )
				{
		str+='Sent';
				}
		 
		str+='<td align="center">';
		if (v.interview==2)
		{
         str+='<span class="green">Accepted</span>';
		}
		if (v.interview==3)
		{
        str+='<span class="red">Decline</span>';
		}
		if (v.interview==0 || v.interview==1)
		{
        str+='<span class="grey">Waiting</span>';
		}
		str+='</td>';
		
							}); $(".shorinterview").html(str);
		
			}
		}
	},"JSON");
}

function paging_of_reviewed_list_tscms(fungsi,start){ 
				
	$.post(basedomain+"jobboard/ajaxreviewed",{start:start,ajax:1,id:jobsid},function(response){
	
		if(response){
			  if(response.status==1){
	
		var str="";
		$.each(response.data.result,function(k,v){
			
		str+='<tr>';
		str+='<td align="center">'+v.no+'<input type="hidden" name="jobid" class="jobsid" value='+v.id_job+'>';
		str+='</td>';
        str+='<td align="center">';
		str+='<input type="checkbox" name="namecheck[]" class="checkjob" id="'+v.user_id+'" value="'+v.user_id+'" attr="">';
	
		 
		str+='</td>';
        str+='<td>';
        str+='<div class="smallthumb">';
		str+='<img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" width="30" height="50"  />';
		str+='</div>';
		str+='<div class="usdetail">';
        str+='<h6><a href="'+basedomain+'personal/view/'+v.user_id+'">'+v.name+'</a></h6>';
		str+='<a href="'+basedomain+'dashboard/download?param='+v.user_id+'" class="button2 downloadsCV">DOWNLOAD CV</a>';
		str+='</div>';
        str+='</td>';
        str+='<td align="center">';
        str+='<span class="date">'+v.enddate+'</span>';
        str+='</td>';
        str+='<td align="center">';
        str+='<span class="age">'+v.birthday+'</span>';
        str+='</td>';
        str+='<td align="center">';
					if (v.agent ==='null' )
					{str+='NO';
					
					}else{
					str+=v.agent;
					}
					   
        str+='</td>';
        str+=' <td align="center">';
                        if (v.experience !=='null' )
					  {
						str+=v.experience;
					  }else
					  {
						str+='NO';
					  }
        str+='</td>';
        str+='<td align="center"><span class="address">';
		if(v.provinsi)
						{
							str+=v.provinsi;
						}
						if(v.city)
						{
							str+=','+v.city;
						}
		str+='</span></td>';
        str+='<td align="center">';
		if (v.interview==0)
				{
		str+='<span class="usent{$list[j].user_id}">Unsent</span>';
				}
		if (v.interview==1 || v.interview==2 || v.interview==3 )
				{
		str+='Sent';
				}
		 
		str+='<td align="center">';
		if (v.interview==2)
		{
         str+='<span class="green">Accepted</span>';
		}
		if (v.interview==3)
		{
        str+='<span class="red">Decline</span>';
		}
		if (v.interview==0 || v.interview==1)
		{
        str+='<span class="grey">Waiting</span>';
		}
		str+='</td>';
		
							}); $(".shorinterview").html(str);
		
			}
		}
	},"JSON");
}

function paging_of_reject_list_tscms(fungsi,start){ 
				
	$.post(basedomain+"jobboard/ajaxreject",{start:start,ajax:1,id:jobsid},function(response){
	
		if(response){
			  if(response.status==1){
	
		var str="";
		$.each(response.data.result,function(k,v){
			
		str+='<tr>';
		str+='<td align="center">'+v.no+'<input type="hidden" name="jobid" class="jobsid" value='+v.id_job+'>';
		str+='</td>';
        str+='<td align="center">';
		str+='<input type="checkbox" name="namecheck[]" class="checkjob" id="'+v.user_id+'" value="'+v.user_id+'" attr="">';
	
		 
		str+='</td>';
        str+='<td>';
        str+='<div class="smallthumb">';
		str+='<img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" width="30" height="50"  />';
		str+='</div>';
		str+='<div class="usdetail">';
        str+='<h6><a href="'+basedomain+'personal/view/'+v.user_id+'">'+v.name+'</a></h6>';
		str+='<a href="'+basedomain+'dashboard/download?param='+v.user_id+'" class="button2 downloadsCV">DOWNLOAD CV</a>';
		str+='</div>';
        str+='</td>';
        str+='<td align="center">';
        str+='<span class="date">'+v.enddate+'</span>';
        str+='</td>';
        str+='<td align="center">';
        str+='<span class="age">'+v.birthday+'</span>';
        str+='</td>';
        str+='<td align="center">';
					if (!v.agent)
					{str+='NO';
					
					}else{
					str+=v.agent;
					}
					   
        str+='</td>';
        str+=' <td align="center">';
                      if (v.experience)
					  {
						str+=v.experience;
					  }else
					  {
						str+='NO';
					  }
        str+='</td>';
        str+='<td align="center"><span class="address">';
		if(v.provinsi)
						{
							str+=v.provinsi;
						}
						if(v.city)
						{
							str+=','+v.city;
						}
		str+='</span></td>';
        str+='<td align="center">';
		if (v.interview==0)
				{
		str+='<span class="usent{$list[j].user_id}">Unsent</span>';
				}
		if (v.interview==1 || v.interview==2 || v.interview==3 )
				{
		str+='Sent';
				}
		 
		str+='<td align="center">';
		if (v.interview==2)
		{
         str+='<span class="green">Accepted</span>';
		}
		if (v.interview==3)
		{
        str+='<span class="red">Decline</span>';
		}
		if (v.interview==0 || v.interview==1)
		{
        str+='<span class="grey">Waiting</span>';
		}
		str+='</td>';
		
							}); $(".shorinterview").html(str);
		
			}
		}
	},"JSON");
}

function paging_of_interview_list_tscms(fungsi,start){ 
				
	$.post(basedomain+"jobboard/ajaxtscms",{start:start,ajax:1,id:jobsid},function(response){
	
		if(response){
			  if(response.status==1){
	
		var str="";
		$.each(response.data.result,function(k,v){
			
		str+='<tr>';
		str+='<td align="center">'+v.no+'<input type="hidden" name="jobid" class="jobsid" value='+v.id_job+'>';
		str+='</td>';
        str+='<td align="center">';
		str+='<input type="checkbox" name="namecheck[]" class="checkjob" id="'+v.user_id+'" value="'+v.user_id+'" attr="">';
	
		 
		str+='</td>';
        str+='<td>';
        str+='<div class="smallthumb">';
		str+='<img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" width="30" height="50"  />';
		str+='</div>';
		str+='<div class="usdetail">';
        str+='<h6><a href="'+basedomain+'personal/view/'+v.user_id+'">'+v.name+'</a></h6>';
		str+='<a href="'+basedomain+'dashboard/download?param='+v.user_id+'" class="button2 downloadsCV">DOWNLOAD CV</a>';
		str+='</div>';
        str+='</td>';
        str+='<td align="center">';
        str+='<span class="date">'+v.enddate+'</span>';
        str+='</td>';
        str+='<td align="center">';
        str+='<span class="age">'+v.birthday+'</span>';
        str+='</td>';
        str+='<td align="center">';
					if (v.agent)
					{
					str+=v.agent;
					}else{
					str+='NO';
					
					}
					   
        str+='</td>';
        str+=' <td align="center">';
                      if (v.experience)
					  {
						str+=v.experience;
					  }else
					  {
						str+='NO';
					  }
        str+='</td>';
        str+='<td align="center"><span class="address">';
		if(v.provinsi)
						{
							str+=v.provinsi;
						}
						if(v.city)
						{
							str+=','+v.city;
						}
		str+='</span></td>';
        str+='<td align="center">';
		if (v.interview==0)
				{
		str+='<span class="usent{$list[j].user_id}">Unsent</span>';
				}
		if (v.interview==1 || v.interview==2 || v.interview==3 )
				{
		str+='Sent';
				}
		 
		str+='<td align="center">';
		if (v.interview==2)
		{
         str+='<span class="green">Accepted</span>';
		}
		if (v.interview==3)
		{
        str+='<span class="red">Decline</span>';
		}
		if (v.interview==0 || v.interview==1)
		{
        str+='<span class="grey">Waiting</span>';
		}
		str+='</td>';
		
							}); $(".shorinterview").html(str);
		
			}
		}
	},"JSON");
}

function paging_of_reviewed_list_tscms(fungsi,start){ 
				
	$.post(basedomain+"jobboard/ajaxreviewed",{start:start,ajax:1,id:jobsid},function(response){
	
		if(response){
			  if(response.status==1){
	
		var str="";
		$.each(response.data.result,function(k,v){
			
		str+='<tr>';
		str+='<td align="center">'+v.no+'<input type="hidden" name="jobid" class="jobsid" value='+v.id_job+'>';
		str+='</td>';
        str+='<td align="center">';
		str+='<input type="checkbox" name="namecheck[]" class="checkjob" id="'+v.user_id+'" value="'+v.user_id+'" attr="">';
	
		 
		str+='</td>';
        str+='<td>';
        str+='<div class="smallthumb">';
		str+='<img src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" width="30" height="50"  />';
		str+='</div>';
		str+='<div class="usdetail">';
        str+='<h6><a href="'+basedomain+'personal/view/'+v.user_id+'">'+v.name+'</a></h6>';
		str+='<a href="'+basedomain+'dashboard/download?param='+v.user_id+'" class="button2 downloadsCV">DOWNLOAD CV</a>';
		str+='</div>';
        str+='</td>';
        str+='<td align="center">';
        str+='<span class="date">'+v.enddate+'</span>';
        str+='</td>';
        str+='<td align="center">';
        str+='<span class="age">'+v.birthday+'</span>';
        str+='</td>';
        str+='<td align="center">';
					if (v.agent)
					{
					str+=v.agent;
					}else{
					str+='NO';
					
					}
					   
        str+='</td>';
        str+=' <td align="center">';
                        if (v.experience)
					  {
						str+=v.experience;
					  }else
					  {
						str+='NO';
					  }
        str+='</td>';
        str+='<td align="center"><span class="address">';
		if(v.provinsi)
						{
							str+=v.provinsi;
						}
						if(v.city)
						{
							str+=','+v.city;
						}
		
		str+='</span></td>';
        str+='<td align="center">';
		if (v.interview==0)
				{
		str+='<span class="usent{$list[j].user_id}">Unsent</span>';
				}
		if (v.interview==1 || v.interview==2 || v.interview==3 )
				{
		str+='Sent';
				}
		 
		str+='<td align="center">';
		if (v.interview==2)
		{
         str+='<span class="green">Accepted</span>';
		}
		if (v.interview==3)
		{
        str+='<span class="red">Decline</span>';
		}
		if (v.interview==0 || v.interview==1)
		{
        str+='<span class="grey">Waiting</span>';
		}
		str+='</td>';
		
							}); $(".shorinterview").html(str);
		
			}
		}
	},"JSON");
}

function paging_ajax_talentseeker(fungsi,start){ 
				
	$.post(basedomain+"talentsekeerboard/ajaxpaging",{start:start,ajax:1,sorting:sorting},function(response){
	
		if(response){
			  if(response.status==true){
				var str="";
				$.each(response.data.result,function(k,v){
				
					str+='<li>';
                    str+='<div class="box">';
                    str+='<div class="boximg">';
                    str+='<a href="'+basedomain+'personal/view_profilets/'+v.id+'" class="thumbbox">';
					if(v.img_avatar)
					{
					str+='<img width="200px" height="200px" src="'+basedomain+'public_assets/personal/'+v.img_avatar+'" />';
					}else{
					str+='<img width="200px" height="200px" src="'+basedomain+'public_assets/personal/ts.png" />';
					}
					str+='</a> ';
                    str+='</div> ';
                    str+='<div class="caption">';
                    str+='<div class="author-box center">';
                    str+='<a class="author-name" href="'+basedomain+'personal/view_profilets/'+v.id+'">'+v.nama_perusahaan.substring(0,45)+'</a>';
                    str+='<span class="author-talent">'+v.city+'</span>';
                    str+='</div> ';
                    str+='</div>';
                    str+='</div>';
                    str+='</li>';
				
				});  $('.tsputhere').html(str);
				
			  	new AnimOnScroll( document.getElementById( 'grid' ), {
						minDuration : 0.4,
						maxDuration : 0.7,
						viewportFactor : 0.2
					} );
							  
		
			}
		}
	},"JSON");
}


					
function paging_ajax_news(fungsi,start){ 

	$.post(basedomain+"news/ajaxPaging",{start:start,ajax:1},function(response){
		if(response){
			  if(response.status==1){
		var no = start+1;
		var str="";
		 str+='<div class="titleboxs">';
         str+='<h2>Our <span class="red">News</span></h2>';
         str+='</div>';
		$.each(response.data.result,function(k,v){
	
								str+='<div class="rowarticle">';
								str+='<div class="newsthumb">';
								str+='<a href="'+basedomain+'news/details/'+v.id+'" class="newsthumbimg">';
								if (v.images=='')
								{
								str+='<img src="'+basedomain+'assets/content/news.jpg" /></a>';
								}else{
								str+='<img src="'+basedomain+'/public_assets/banner/'+v.images+'"  /></a> ';
								}
								str+='</div>';
								str+='<div class="newsentry">';
								str+='<div class="entry-title">';
								str+='<div class="datebox">';
								str+='<span class="day">'+v.date+'</span>';
								str+='<span class="month">'+v.month+'</span>';
								str+=' <span class="year">'+v.year+'</span>';
								str+='</div>';
								str+='<h3><a href="'+basedomain+'news/details/'+v.id+'">'+v.title+'</a></h3>';
								str+='<div class="meta-post">';
								str+='<span class="author"><i>';
								if(v.caption)
								{
									str+='Source : '+v.caption;
								}
								else
								{
										str+='Source : Creasi';
								}
								
								
								str+='</div>';
								str+='</div>';
								str+='<div class="entry-summary">';
								str+='<p>'+v.description.substring(0,120)+'...</p>';
								str+='<a href="'+basedomain+'news/details/'+v.id+'" class="readmore">READ MORE</a>';
								str+='</div>';  
								str+='</div>';
								str+='</div>';
						
				
		});
		$('.news-list').html(str);
		
	}
		}
	},"JSON");
}



					
function paging_ajax_pers(fungsi,start){ 

	$.post(basedomain+"news/ajaxPagingpers",{start:start,ajax:1},function(response){
		if(response){
			  if(response.status==1){
			
		
		var str="";
		str+='<div class="titleboxs">'; 
        str+=' <h2>Press <span class="red">Coverage</span></h2>';
        str+='</div>';
		$.each(response.data.result,function(k,v){
	 
								str+='<div class="rowarticle">';
								str+='<div class="pressthumb">';
								str+='<a ';
								if(v.link)
								{
									var link =v.link;
									link = link.replace("http://",''); 
									link = link.replace("https://",''); 
									str+='href="http://'+link+'"';
								}
								else
								{
									str+='href="#"';
								}
								
								str+=' class="pressthumb">';
								if (v.images=='')
								{
								str+='<img src="'+basedomain+'assets/content/news.jpg" /></a>';
								}else{
								str+='<img src="'+basedomain+'/public_assets/banner/'+v.images+'"  /></a> ';
								}
								str+='</div>';
								str+='<div class="pressentry">';
								str+='<div class="press-title">';
							
								str+='<h3><a ';
								if(v.link)
								{
									var link =v.link;
									link = link.replace("http://",''); 
									link = link.replace("https://",''); 
									str+='href="http://'+link+'"';
								}
								else
								{
									str+='href="#"';
								}
								str+=' >'+v.title+'</a></h3>';
								str+='<div class="meta-post">';
								str+='<span class="date">'+v.fulldate+'</span> I ';
								if(v.caption)
								{
									str+='<a href="#" class="sumber">Source : '+v.caption+'</a>';
								}
								else
								{
										str+='Source : Creasi';
								}
								
								
								str+='</div>';
								str+='</div>';
								str+='<div class="entry-summary">';
								str+='<p>'+v.description.substring(0,120)+'...</p>';
								str+='<a ';
								
								if(v.link)
								{
									 link =v.link;
									link = link.replace("http://",''); 
									link = link.replace("https://",''); 
									str+='href="http://'+link+'"';
								}
								else
								{
									str+='href="#"';
								}
								str+=' class="readmore">READ MORE</a>';
								str+='</div>';  
								str+='</div>';
								str+='</div>';
						
				
		});
		$('.press-list').html(str);
		
	}
		}
	},"JSON");
}

