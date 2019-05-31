jQuery(document).ready(function() {
    jQuery("#owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        margin: 0,
        stagePadding: 0,
        smartSpeed: 450,
        autoplay: true,
        autoplayTimeout: 8000,
        autoplayHoverPause: true,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        navContainer: '.main-content .custom-nav',
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            500: {
                items: 3,
                nav: false
            },

            800: {
                items: 4,
                nav: false
            },
            1000: {
                items: 6,
                loop: false
            }
        }
    });
    
});