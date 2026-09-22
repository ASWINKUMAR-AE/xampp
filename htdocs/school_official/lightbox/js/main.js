jQuery(function($) {'use strict',
		
		    //Window Loaded Handler
  $(window).load(function() {

      $("#loader").delay(800).fadeOut();
      $("#mask").delay(1200).fadeOut("slow");
  });
				
//Check to see if the window is top if not then display button
	  var offset =650;
	  var duration = 300;
	  $(window).scroll(function() {
		  if ($(this).scrollTop() > offset) {
			  $('.back-to-top').fadeIn(200);
		  } else {
			  $('.back-to-top').fadeOut(200);
		  }
	  });
	  $('.back-to-top').on("click",function(event) {
		  event.preventDefault();
		  $('html, body').animate({scrollTop: 0}, 500);
		  return false;
	  });



	//#main-slider
	$(function(){
		$('#main-slider').carousel({
			interval:5000
		});
	});


	//For Services Section on Home page
	  $("#services-slider").owlCarousel({ 
		  autoPlay: 4000,
		  items : 3,
		  pagination: false,
		  navigation : true,
		  navigationText: [
			"<i class='fa fa-long-arrow-left'></i>",
			"<i class='fa fa-long-arrow-right'></i>"],
		  itemsDesktop : [1199,3],
		  itemsDesktopSmall : [979,3]	  
	 
    });
  
  	
	//For experts and partners on Home page
  	 $("#expert-slider , #logo-slider").owlCarousel({
		  autoPlay: true, 
		  items : 4,
		  pagination: false,
		  navigation : true,
		  navigationText: [
			"<i class='fa fa-long-arrow-left'></i>",
			"<i class='fa fa-long-arrow-right'></i>"],
		  itemsDesktop : [1199,3],
		  itemsDesktopSmall : [979,3]
 
       });
	   //For Blog Slider on Blogs page
  	 $("#blog-slider").owlCarousel({
		  autoPlay: true, 
		  items : 3,
		  pagination: false,
		  navigation : true,
		  navigationText: [
			"<i class='fa fa-long-arrow-left'></i>",
			"<i class='fa fa-long-arrow-right'></i>"],
		  itemsDesktop : [1199,3],
		  itemsDesktopSmall : [979,3]
 
       });
	   
	   
	   
	  // For Testinomials
	     $("#testimonial-slider").owlCarousel({
		    autoPlay: true, 
		    slideSpeed : 300,
		    paginationSpeed : 400,
		    singleItem:true,
			pagination:true,
			paginationNumbers:false,
			transitionStyle:"backSlide",
 
       });
	   
	   
	   
	   // accordian
	$('.accordion-toggle').on('click', function(){
		$(this).closest('.panel-group').children().each(function(){
		$(this).find('>.panel-heading').removeClass('active');
		 });

	 	$(this).closest('.panel-heading').toggleClass('active');
	});
	
	
	

	//Initiat WOW JS
	new WOW().init();

	// portfolio filter
	$(window).load(function(){'use strict';
		var $portfolio_selectors = $('.portfolio-filter >li>a');
		var $portfolio = $('.portfolio-items');
		$portfolio.isotope({
			itemSelector : '.portfolio-item',
			layoutMode : 'fitRows'
		});
		
		$portfolio_selectors.on('click', function(){
			$portfolio_selectors.removeClass('active');
			$(this).addClass('active');
			var selector = $(this).attr('data-filter');
			$portfolio.isotope({ filter: selector });
			return false;
		});
	});

	
	// Contact form on Contact Page
	var form = $('#main-contact-form');
	form.submit(function(event){
		event.preventDefault();
		var form_status = $('<div class="form_status"></div>');
		$.ajax({
			url: $(this).attr('action'),

			beforeSend: function(){
				form.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn() );
			}
		}).done(function(data){
			form_status.html('<p class="text-success">' + data.message + '</p>').delay(3000).fadeOut();
		});
	});
	$('.fancybox').fancybox();

	
	   		
	   
  	
});