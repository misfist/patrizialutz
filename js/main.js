(function($) {

  /**
   * Sticky navigation menu
   * @return void
   */
	var stickyNavTop = $('.js-sticky-nav').offset().top;

	var stickyNav = function() {
		var scrollTop = $(window).scrollTop();

		if (scrollTop > stickyNavTop) {
				$('.js-sticky-nav').addClass('sticky');
        $('.js-scroll-to-top').addClass('sticky-bottom');
		} else {
				$('.js-sticky-nav').removeClass('sticky');
        $('.js-scroll-to-top').removeClass('sticky-bottom');
		}
  };

	stickyNav();

  // and run it again every time you scroll
  $(window).scroll(function() {
    stickyNav();
  });



  /**
   * Scrolling navigation
   * @return void
   */
  $('#site-navigation a[href*="#"]:not([href="#"])').click(function(event) {
    event.preventDefault();

    var hash = $(this)[0].hash;
    var navHeight = $(this).closest('nav').outerHeight();

    var offset = $(hash).offset();
    if(offset){
      var scrollto = offset.top - navHeight;
      $('html, body').animate({
        scrollTop:scrollto
      }, 1000);
    }

  });

  $('.js-scroll-to-top').click(function(event){
    $("html, body").animate({
      scrollTop: 0
    }, 1000);
  });

  var ratings = $('.rating');

  function ratingsFill(element) {
    var rating;

    $.each(element, function(index, value) {
      rating = $(value).data('rating');

      if(typeof rating !== 'undefined') {
        var dots = $(this).find('.dot');
        var i = rating;

        for( var i = 0; i < rating; i++) {
          $(dots[i]).addClass('filled');
        }

      }
    });
  }

  ratingsFill(ratings);

	/**
	 * Set MinHeight
	 */
	var jumbotronEl = $( '.jumbotron' );
	var overlayEl = $( '.overlay' );
	var jumboContainer = $( '.jumbotron .container' );
	var jumboContainerHeight = jumboContainer.outerHeight();
	var padding = 16;

	console.log( jumboContainer.offset().top + jumboContainerHeight );

	jumbotronEl.css( 'min-height', (jumboContainer.offset().top + jumboContainerHeight + padding) + 'px' );
	overlayEl.css( 'min-height', (jumboContainer.offset().top + jumboContainerHeight + padding) + 'px' );



})( jQuery );
