 $(function() {
$( ".datepicker" ).datepicker({
	showAnim: 'slideDown',
	 changeMonth: true,
	changeYear: true
	});
	
});
 
$(document).ready(function() { 
	// popup
	$("a.showPopup").click(function(){
		$("html, body").animate({ scrollTop: 0 }, 600);
		$(".popup").fadeOut();
		var targetID = jQuery(this).attr('href');
		$("#bg-popup").fadeIn();
		$(targetID).fadeIn();
		$(targetID).addClass('visible');
 	    return false;
	});
	$("a.backtop").click(function(){
		$("html, body").animate({ scrollTop: 0 }, 3000);
	});
	$("a.showPopup2").click(function(){
		$(".artist-box").fadeOut();
		$(".popup2").fadeOut();
		var targetID = jQuery(this).attr('href');
		$(targetID).fadeIn();
		$(targetID).addClass('visible');
 	    return false;
	});
	$("a.closePopup,#bg-popup").click(function(){
		$("#bg-popup").fadeOut();
		$(".popup,.popup2").fadeOut();
		$(".artist-box").fadeIn();
   	    return false;
	});
});