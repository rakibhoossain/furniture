(function ($) {
	"use strict";

    jQuery(document).ready(function($){
        $(".homepage-slides").owlCarousel({
            items: 1,
            nav: true,
            dots: true,
            autoplay: true,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            mouseDrag: false,
            touchDrag: false,
        });
        $(".partner-slider").owlCarousel({
            items: 3,
            nav: false,
            dots: false,
            // autoplay: true,
            loop: true,
            mouseDrag: true,
            touchDrag: true,
            margin: 10
        });
        $(".product-slider").owlCarousel({
            items: 4,
            nav: false,
            dots: false,
            autoplay: false,
            loop: true,
            mouseDrag: true,
            touchDrag: true,
            margin:20,
            // center: true,
            responsive: { 0: {items: 1}, 600: {items: 3}, 1000: {items: 4} }
        });
        // $(".category_products").owlCarousel({
        //     items: 4,
        //     nav: false,
        //     dots: false,
        //     autoplay: false,
        //     loop: true,
        //     mouseDrag: true,
        //     touchDrag: true,
        //     margin:10,
        //     center: true,
        //     responsive: { 0: {items: 1}, 600: {items: 3}, 1000: {items: 4} }
        // });
        $(".testimonial-slide").owlCarousel({
            items: 1,
            nav: false,
            dots: false,
            autoplay: true,
            loop: true,
            mouseDrag: true,
            touchDrag: true,
        });
        $("#testimonials").owlCarousel({
            items: 1,
            nav: false,
            dots: true,
            autoplay: false,
            center: true,
            loop: true,
            mouseDrag: true,
            touchDrag: true,
        });
            //-------Related Post carosul--------//
    $('#related_posts').owlCarousel({
        items: 3,
        loop: true,
        margin: 10,
        autoplayHoverPause: true,
        smartSpeed:650,
        nav: true,
        navText: ["<span class='lnr lnr-arrow-left'></span>", "<span class='lnr lnr-arrow-right'></span>"],       
        autoplay:true, 
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2,
            },
            768: {
                items: 3,
            }
        }
    });
        //------- Superfist nav menu  js --------//
        $('.nav-menu').superfish({
            animation: {
                opacity: 'show'
            },
            speed: 400
        });

        //------- Mobile Nav  js --------//
//------- Mobile Nav  js --------//
    if ($('#nav-menu-container').length) {
        var mobile_menu_active = false;
        var $mobile_nav = $('#nav-menu-container').clone().prop({
            id: 'mobile-nav'
        });
        $mobile_nav.find('> ul').attr({
            'class': '',
            'id': ''
        });

        $('body .main-menu').append($mobile_nav);
        $('body .main-menu').prepend('<button type="button" id="mobile-nav-toggle"><i class="lnr lnr-menu"></i><span class="menu-title">Menu</span> </button>');
        $('body .main-menu').append('<div id="mobile-body-overly"></div>');
        $('#mobile-nav').find('.menu-item-has-children').prepend('<i class="lnr lnr-chevron-down"></i>');

        $( ".menu-item-has-children i" ).click(function(e) {

            $(this).next().toggleClass('menu-item-active');
            $(this).nextAll('ul').eq(0).slideToggle();
            $(this).toggleClass("lnr-chevron-up lnr-chevron-down");
             e.stopPropagation()

        });

        $( "#mobile-nav-toggle" ).click(function(e) {

            $('body').toggleClass('mobile-nav-active');
            $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
            $('#mobile-body-overly').toggle();

            if (!mobile_menu_active) {
                mobile_menu_active = true;
            }else{
                mobile_menu_active == true;
            }
            e.stopPropagation()
        });       

        $('body').on("click",(function(e){
            if (mobile_menu_active) {
                 $('body').removeClass('mobile-nav-active');
                $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
                $('#mobile-body-overly').fadeOut();
            }
            e.stopPropagation()
        }));

    } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
        $("#mobile-nav, #mobile-nav-toggle").hide();
    }

        

        // $(".homepage-slides").on("translate.owl.carousel", function(){
        //     $(".single-slide-item h2, .single-slide-item p").removeClass("animated fadeInUp").css("opacity", "0");
        //     $(".single-slide-item .slide-btn").removeClass("animated fadeInDown").css("opacity", "0");
        // });
        
        // $(".homepage-slides").on("translated.owl.carousel", function(){
        //     $(".single-slide-item h2, .single-slide-item p").addClass("animated fadeInUp").css("opacity", "1");
        //     $(".single-slide-item .slide-btn").addClass("animated fadeInDown").css("opacity", "1");
        // });
        
        
        // $(".gallery-lightbox").magnificPopup({
        //     type: 'image',
        //     gallery: {
        //         enabled: true
        //     }
        // });
        
        // $("ul#navigation").slicknav({
        //     prependTo: ".responsive-menu-wrap"
        // });
        
        
        // new WOW().init();

    });


    jQuery(window).load(function(){
        // jQuery(".factorian-slide-preloader-wrap, .factorian-site-preloader-wrap").fadeOut(500);
    });


}(jQuery));	