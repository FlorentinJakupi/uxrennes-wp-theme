 /*------------------------------------------------------------------------------
	JS Document (https://developer.mozilla.org/en/JavaScript)

	project:    UX Rennes
	created:    2016-01-30
	author:     UX Rennes (http://uxrennes.co/)
	----------------------------------------------------------------------------- */
	;(function($, undefined){


		/*  =CONSTANTES
		----------------------------------------------------------------------------- */
		$.noConflict();

		var d 			= document,
			w 			= window,
			rm 			= {};

			


		/*  =UTILITIES
		----------------------------------------------------------------------------- */
		var log = function(x) {
			if (typeof console != 'undefined') {
				console.log(x);
			}
		};

		/*  =WINDOW.ONLOAD
		----------------------------------------------------------------------------- */
		$(document).ready(function(){


			

		});

		/*  =WINDOW.RESIZE
		----------------------------------------------------------------------------- */
		var debounce;

		$(window).load(function(){

			$(window).on('resize', function() {

				if (!!debounce) { clearTimeout(debounce); }

				debounce = setTimeout(function()
				{
					

				}, 150);

			});
		});


		/*  =SLIDER
		 	@options cf. http://www.woothemes.com/flexslider/
		----------------------------------------------------------------------------- */
		// rm.slider = function(){


		// 	$('.js-flexslider').each(function(){

		// 		var $this 		= $(this),
		// 			total 		= $this.find('.rm-slide').length;

		// 		// behave
		// 		$this.flexslider({
					
		// 			// Dev only
		// 			slideshow: false,
		// 			//

		// 			slideshowSpeed: 3000,
		// 			namespace: 'rm-',
		// 			pauseOnHover: true,
		// 			selector: '.rm-slides > .rm-slide',
		// 			controlNav: false,
		// 			directionNav: false,
		// 			animationLoop: true,
		// 			start: function (slider) {
						
		// 				$('.rm-site-title').addClass('is-hidden');

		// 			},
		// 			after: function (slider) {

		// 				if ( slider.animatingTo != 0 && slider.animatingTo != total-1)
		// 				{
		// 					$('.rm-site-title').removeClass('is-hidden');
		// 				}
		// 				else 
		// 				{
		// 					$('.rm-site-title').addClass('is-hidden');
		// 				}
						
		// 			},
		// 			end: function (slider) {
						
		// 				$('.rm-site-title').addClass('is-hidden');
		// 			}
		// 		});

		// 		$this.find('.rm-nav-prev button').on('click.flexslider', function(e){
		// 			e.preventDefault();
		// 			$this.flexslider('prev');
		// 		});

		// 		$this.find('.rm-nav-next button').on('click.flexslider', function(e){
		// 			e.preventDefault();
		// 			$this.flexslider('next');
		// 		});

		// 		//var $currentSlider = $this.data('flexslider');

		// 		// now you can access all the methods for example flexAnimate
		// 		//$currentSlider.flexAnimate(..);

		// 	});

		// 	$('.js-link-home').on('click.flexslider', function(e){
		// 		e.preventDefault();
		// 		$('.js-flexslider').flexslider(0);
		// 	});

		// };


		

	})(jQuery);