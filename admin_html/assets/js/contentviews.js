
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
				