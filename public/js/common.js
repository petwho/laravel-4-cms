$(document).ready(function(){
	
$(function(){
			$("#Nav li img").hover(function(){
				$(this).stop().fadeTo("fast",0);
			},
			function(){
				$(this).stop().fadeTo("fast",1.0);
			});
		});
		
		
		$("#Navigation ul#Sub-nav").hide();
		$("#Navigation li").hover(function(){
			$("ul:not(:animated)",this).slideDown("fast");
		},
		function(){
			$("ul",this).slideUp("slow");
		});	
	
	$(function(){
		$("#Sub-nav li a").hover(function(){
			$(this).stop().fadeTo("fast",0.5);
		},
		function(){
			$(this).stop().fadeTo("fast",1.0);
		});
	});
	// hide #back-top first
	$("#Pagetop").hide();
	
	// fade in #back-top
	
		$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 150) {
				$('#Pagetop').fadeIn();
			} else {
				$('#Pagetop').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#Pagetop a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});


});


