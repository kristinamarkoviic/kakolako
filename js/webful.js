// JavaScript Document
(function($) {
    "use strict";
	
	//calling foundation js
	

	//scroll effect
	$("#top").on("click",function () {
		$("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});        
	
	//Starting Scroll on click.
	$("#top").on("click",function (event) {
		event.stopPropagation();                
		var idTo = $(this).attr("data-atr");                
		var Position = $("[id='" + idTo + "']").offset().top;
		$("html, body").animate({ scrollTop: Position }, "slow");
		return false;
	});
	
	//Activate Scroll top button
	$(window).on("scroll",function() { 
		if($(this).scrollTop() > 1000) { 
			$("#top").fadeIn();
		} else { 
			$("#top").fadeOut();
		}
	});

	//Revealing product options.
	$(".product").on("mouseenter", function(){ 
		var animationEnd = "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
		$(this).children(".product-image").children(".pro-buttons").addClass("animated zoomIn").on(animationEnd, function() {
			$(this).removeClass("animated zoomIn");
		});
		$(this).children(".product-image").children("a").children("img:last-child").addClass("animated pulse").on(animationEnd, function() {
			$(this).removeClass("animated pulse");
		});
	});

	//Featured Products Coursel
	$(".featured-wrap").owlCarousel({
		loop:true,
		margin:0,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			},
			600:{
				items:1,
				nav:false,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			},
			1000:{
				items:3,
				nav:true,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
				loop:true
			}
		}
	});

	//Featured Products Coursel
	$(".wishlist-wrap").owlCarousel({
		loop:true,
		margin:0,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			},
			600:{
				items:1,
				nav:false,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			},
			1000:{
				items:4,
				nav:true,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
				loop:true
			}
		}
	});

	//Featured Products Coursel
	$(".store-related").owlCarousel({
		loop:true,
		margin:0,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			},
			600:{
				items:1,
				nav:false,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			},
			1000:{
				items:5,
				nav:true,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
				loop:true
			}
		}
	});


	//Running Timer. 
	$(".countdown").startTimer();

	//Saying page loaded
	$(window).on("load",function(){
        $("body").addClass("loaded");
		$(".preloader").html("");
		$(".preloader").css("display", "none");
     });
	
	//Home Page Slider
	// var revapi34;
	// revapi34 = $("#homepageslider").show().revolution({
	// 	sliderType:"standard",
	// 	jsFileLocation:"js/",
	// 	sliderLayout:"auto",
	// 	dottedOverlay:"none",
	// 	delay:9000,
	// 	navigation: {
	// 		keyboardNavigation:"on",
	// 		keyboard_direction: "horizontal",
	// 		mouseScrollNavigation:"off",
	// 		onHoverStop:"on",
	// 		touch:{
	// 			touchenabled:"on",
	// 			swipe_threshold: 75,
	// 			swipe_min_touches: 1,
	// 			swipe_direction: "horizontal",
	// 			drag_block_vertical: false
	// 		},
			
	// 	},
	// 	viewPort: {
	// 		enable:true,
	// 		outof:"pause",
	// 		visible_area:"80%"
	// 	},
	// 	responsiveLevels:[1240,1024,778,480],
	// 	gridwidth:[1240,1024,778,480],
	// 	gridheight:[680,1000,1000,350],
	// 	lazyType:"none",
	// 	parallax: {
	// 		type:"scroll",
	// 		origo:"enterpoint",
	// 		speed:400,
	// 		levels:[5,10,15,20,25,30,35,40,45,50],
	// 	},
	// 	shadow:0,
	// 	spinner:"off",
	// 	stopLoop:"off",
	// 	stopAfterLoops:-1,
	// 	stopAtSlide:-1,
	// 	shuffle:"off",
	// 	autoHeight:"off",
	// 	hideThumbsOnMobile:"off",
	// 	hideSliderAtLimit:0,
	// 	hideCaptionAtLimit:0,
	// 	hideAllCaptionAtLilmit:0,
	// 	debugMode:false,
	// 	fallbacks: {
	// 		simplifyAll:"off",
	// 		nextSlideOnWindowFocus:"off",
	// 		disableFocusListener:false,
	// 	}
	// });
	
	// //Single Store Slider
	// revapi34 = $("#rev_slider_34_1").show().revolution({
	// 	sliderType:"standard",
	// 	jsFileLocation:"js/",
	// 	sliderLayout:"auto",
	// 	dottedOverlay:"none",
	// 	delay:9000,
	// 	navigation: {
	// 		keyboardNavigation:"on",
	// 		keyboard_direction: "horizontal",
	// 		mouseScrollNavigation:"off",
	// 		onHoverStop:"off",
	// 		touch:{
	// 			touchenabled:"on",
	// 			swipe_threshold: 75,
	// 			swipe_min_touches: 1,
	// 			swipe_direction: "horizontal",
	// 			drag_block_vertical: false
	// 		},
	// 		arrows: {
				
	// 			enable:true,
	// 			hide_onmobile:false,
	// 			hide_onleave:true,
	// 			tmp:'',
	// 		}
	// 	},
	// 	viewPort: {
	// 		enable:true,
	// 		outof:"pause",
	// 		visible_area:"80%"
	// 	},
	// 	responsiveLevels:[1240,1024,778,480],
	// 	lazyType:"none",
	// 	parallax: {
	// 		type:"scroll",
	// 		origo:"enterpoint",
	// 		speed:400,
	// 		levels:[5,10,15,20,25,30,35,40,45,50],
	// 	},
	// 	shadow:0,
	// 	spinner:"off",
	// 	stopLoop:"off",
	// 	stopAfterLoops:-1,
	// 	stopAtSlide:-1,
	// 	shuffle:"off",
	// 	autoHeight:"off",
	// 	hideThumbsOnMobile:"off",
	// 	hideSliderAtLimit:0,
	// 	hideCaptionAtLimit:0,
	// 	hideAllCaptionAtLilmit:0,
	// 	debugMode:false,
	// 	fallbacks: {
	// 		simplifyAll:"off",
	// 		nextSlideOnWindowFocus:"off",
	// 		disableFocusListener:false,
	// 	}
	// });
	
})(jQuery); //jQuery main function ends strict Mode on 

var isNS = (navigator.appName == "Netscape") ? 1 : 0;

if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);

function mischandler(){
return false;
}

function mousehandler(e){
var myevent = (isNS) ? e : event;
var eventbutton = (isNS) ? myevent.which : myevent.button;
if((eventbutton==2)||(eventbutton==3)) return false;
}
document.oncontextmenu = mischandler;
document.onmousedown = mousehandler;
document.onmouseup = mousehandler;


document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 67 || 
             e.keyCode === 86 || 
             e.keyCode === 85 || 
             e.keyCode === 117)) {
            alert('not allowed');
            return false;
        } else {
            return true;
        }
};