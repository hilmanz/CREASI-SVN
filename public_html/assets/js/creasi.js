$(document).ready(function() { 
	// Drop Down Menu
	jQuery('#main-menu').superfish({
			delay:       10,                            // one second delay on mouseout
			animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
			speed:       'fast',                          // faster animation speed
			autoArrows:  false                            // disable generation of arrow mark-up
		});
	 $(function() {
		$( ".euTab" ).tabs();
	  });
	 
	 $(function() {
		$( ".tabInside" ).tabs();
	  });
	  $(function() {
		$( ".accordion" ).accordion({
		  heightStyle: "content",
		  collapsible: true ,
		  active: false 
		});
	  });
	 //TOOLTIP
	$('.tooltip').tooltipster({
		contentAsHTML:true
	});
	
	$('.tooltip2').tooltipster({
		contentAsHTML:true,
		position:'right'
	});
	///// NOTIFICATION CLOSE BUTTON /////
	
	jQuery('.notibar .close').click(function(){
		jQuery(this).parent().fadeOut(function(){
			jQuery(this).remove();
		});
	});
	//TIME PICKER
	 $('.timepicker').timepicker({
		hourGrid: 4,
		minuteGrid: 10,
		timeFormat: 'hh:mm tt'
	});
	$(function() {
		$( ".datepicker" ).datepicker({
			inline: true,
			showOtherMonths: true
		})
		.datepicker('widget').wrap('<div class="ll-skin-melon"/>');
	});
	//MOBILE MENU
	$('#mobnav-btn').click(
		function () {
			$('.sf-menu').toggleClass("xactive");
		});
		$('.mobnav-subarrow').click(
		function () {
			$(this).parent().toggleClass("xpopdrop");
		});
	//TOGLE SEARCH		
		$( "a.toggleSearch" ).click(function() {
		  $( "#searchform" ).toggle("fade");
		});
	//TOGLE PROFILE MENU		
		$( "a#toggleuser" ).click(function() {
		  $( "#usermenubox" ).toggle("fade");
		});
	//TOGLE INTERVIEW LIST
		$( ".openlist" ).click(function() {
			var targetID = $(this).attr('href');
			   $(this).toggleClass("icon-chevron-up");
			if ($(this).text() == "OPEN APPLICANT(S)")
			   $(this).text("CLOSE")
			else
			   $(this).text("OPEN APPLICANT(S)");
			$(targetID).toggleClass('showthis');
			return false;
		});
	//VIDEO TAB
		$( ".videobtn" ).click(function() {
			$('.videobox').hide();
			$(".listcircle a").removeClass("active");
			var targetID = $(this).attr('href');
			$(targetID).show();
			$(this).addClass("active");
			return false;
		});
    // SLIDER
      $('.flexslider').flexslider({
        animation: "slide",             
		slideshowSpeed: 3000,        
		animationSpeed: 600,  
      });
	  
	  $('.carousel1').flexslider({
		animation: "slide",
		slideshowSpeed: 3000,        
		animationSpeed: 600,  
		itemWidth: 195,
		itemMargin: 3,
		minItems: 2,
    	maxItems: 5,
		move:1,
	  });
	  $('.carousel2').flexslider({
		animation: "slide",
		slideshowSpeed: 3000,        
		animationSpeed: 600,
		slideshow: false
		
	  });
	
      $('.testislide').flexslider({
        animation: "fade",
		directionNav: false,             
		slideshowSpeed: 3000,        
		animationSpeed: 600,  
      });
      $('.logoslide').flexslider({
        animation: "fade",
		directionNav: false,             
		slideshowSpeed: 3000,        
		animationSpeed: 600,  
      });
	$('.showpopup').magnificPopup({
	//POPUP
	  type:'inline',
	  midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
	});
	$('.closepopup').click(function () {
		$.magnificPopup.close();
	});
	$('.cancelpops').click(function () {
		$.magnificPopup.close();
	});
	
	/*<!--  //SCROLL EFFECT
		$(window).fadeThis({
			speed: 1000,
		});
		$(window).scroll( function(){
			$('.effect').each( function(i){
				var bottom_of_object = $(this).position().top + $(this).outerHeight();
				var bottom_of_window = $(window).scrollTop() + $(window).height();
				if( bottom_of_window > bottom_of_object ){
					$(this).animate({'opacity':'1'},800);
				}
			}); 
		});
	  -->*/
});

$(document).ready(function() { 
	// popup
	$("a.showPopup2").click(function(){
		$("html, body").animate({ scrollTop: 0 }, 600);
		$(".popup2").fadeOut();
		var targetID = jQuery(this).attr('href');
		$("#bg-popup2").fadeIn();
		$(targetID).fadeIn();
		$(targetID).addClass('visible');
 	    return false;
	});
	$("a.closePopup,#bg-popup2").click(function(){
		$("#bg-popup2").fadeOut();
		$(".popup2").fadeOut();
		$(".artist-box").fadeIn();
   	    return false;
	});
});
$(document).ready(function() { 
//addclasBorderField
	$('.regisForm input').blur(function()
	{
		if( !$(this).val() ) {
			  $(this).removeClass('bor-black');
		}
		else{
			$(this).addClass('bor-black');
		}
	});
	$('.regisForm textarea').blur(function()
	{
		if( !$(this).val() ) {
			  $(this).removeClass('bor-black');
		}
		else{
			$(this).addClass('bor-black');
		}
	});
});
/*
$(document).ready(function(){
$(".selectpicker ").on("change", function(){

$(this).selectpicker('setStyle', 'active');


});
});*/ 