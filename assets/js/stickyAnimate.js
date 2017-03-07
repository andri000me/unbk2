
			
				$(document).ready(function(){
				  $(window).scroll(function(){
					var scrollTop = $(window).scrollTop();
					if (scrollTop > 300) {
						$('.header-sticky').addClass('fadeInDown');
						$('.header-sticky').removeClass('fadeOutUp');
						$('.header-sticky').addClass('animated');      
					} else {
						//$('.header-sticky').addClass('.header');
						$('.header-sticky').removeClass('fadeInUp');
						$('.header-sticky').addClass('fadeOutUp');
					
					}
				  });
				});