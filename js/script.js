jQuery(function($) {
    if($(window).width()>990){
        $('.navbar .dropdown').hover(function() {
            $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

        }, function() {
            $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

        });

    }

    // all cases
    
    	$('.navbar .dropdown > a').click(function(){
            location.href = this.href;
            return false;
 	    });
 

    	$('.navbar .dropdown > a').append("<span class='nav-dropdown-arrow'><i class='fa fa-caret-down' aria-hidden='true'></i></span>");


		$('.nav-dropdown-arrow').on('click', function(e){

			$(this).closest('li').find('.dropdown-menu').first().slideToggle();
			return false;

		});


});


jQuery('.home-slider').owlCarousel({
    items:1,
    autoHeight:true,
    loop: true,
    nav:true,
    autoPlay: true,
    pagination: true,
    navText: ['&laquo;','&raquo;'],
});


jQuery(document).ready(function($) {

    $(".our-service-layout-2").find(".card").hover(function() {
        $(this).find(".card-body").slideToggle(200);
    });

     $(".our-service-layout-3").find(".card").hover(function() {
        $(this).find(".card-body").fadeToggle(200);
    });



 $(".recent-posts-layout-2").find("#home-page-recent-posts").owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        nav: true,
        dots: true,
        autoplaySpeed: 1000,
        pagination: true,
        navText: ['&#x2039', '&#x203a'],
        navContainer: ".recent-posts-layout-1 .navi",
        dotsContainer: ".recent-posts-layout-1 .dots",
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1170: {
                items: 3,
            }
        }
    });


 $(".recent-posts-layout-1").find("#home-page-recent-posts").owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        nav: true,
        dots: true,
        autoplaySpeed: 1000,
        pagination: true,
        navText: ['&#x2039', '&#x203a'],
        navContainer: ".recent-posts-layout-1 .navi",
        dotsContainer: ".recent-posts-layout-1 .dots",
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1170: {
                items: 2,
            }
        }
    });


  $(".promotions-layout-1").find("#home-page-promotions").owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        autoplaySpeed: 1000,
        navText: ['&#x2039', '&#x203a'],
        //navContainer: ".offers_and_promotion .navi",
        //dotsContainer: "offers_and_promotion. .dots",
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1170: {
                items: 2,
            }
        }
    });

      $(".promotions-layout-2").find("#home-page-promotions").owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        autoplaySpeed: 1000,
        navText: ['&#x2039', '&#x203a'],
        navContainer: ".offers_and_promotion .navi",
        dotsContainer: ".offers_and_promotion .dots",
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1170: {
                items: 2,
            }
        }
    });


   $(".testimonials-layout-1").find("#home-page-testimonials").owlCarousel({
    loop: true,
    margin: 30,
    autoplay: true,
    nav: true,
    dots: true,
    autoplaySpeed: 1000,
    pagination: true,
    navText: ['&#x2039', '&#x203a'],
    navContainer: ".testimonials-control .navi",
    dotsContainer: ".testimonials-control .dots",
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1170: {
            items: 1,
        }
    }
    });

   $(".testimonials-layout-2").find("#home-page-testimonials").owlCarousel({
    loop: true,
    margin: 30,
    autoplay: true,
    nav: true,
    dots: true,
    autoplaySpeed: 1000,
    pagination: true,
    navText: ['&#x2039', '&#x203a'],
    navContainer: ".testimonials-control .navi",
    dotsContainer: ".testimonials-control .dots",
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1170: {
            items: 2,
        }
    }
    });

   $(".testimonials-layout-3").find("#home-page-testimonials").owlCarousel({
    loop: true,
    margin: 30,
    autoplay: true,
    nav: true,
    dots: true,
    autoplaySpeed: 1000,
    pagination: true,
    navText: ['&#x2039', '&#x203a'],
    navContainer: ".testimonials-control .navi",
    dotsContainer: ".testimonials-control .dots",
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1170: {
            items: 3,
        }
    }
    });







    var wow = new WOW({
        boxClass: 'wow', // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset: 0, // distance to the element when triggering the animation (default is 0)
        mobile: true, // trigger animations on mobile devices (default is true)
        live: true, // act on asynchronously loaded content (default is true)
        callback: function(box) {
            // the callback is fired every time an animation is started
            // the argument that is passed in is the DOM node being animated
        },
        scrollContainer: null // optional scroll container selector, otherwise use window
    });
    wow.init(); 


}); //document.ready ends
 