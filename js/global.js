jQuery(function($) {
    $.datepicker.regional["vi-VN"] =
    {
        closeText         : "Đóng",
        prevText          : "Trước",
        nextText          : "Sau",
        currentText       : "Hôm nay",
        monthNames        : ["Tháng 1 -", "Tháng 2 -", "Tháng 3 -", "Tháng 4 -", "Tháng 5 -", "Tháng 6 -", "Tháng 7 -", "Tháng 8 -", "Tháng 9 -", "Tháng 10 -", "Tháng 11 -", "Tháng 12 -"],
        monthNamesShort   : ["Một", "Hai", "Ba", "Bốn", "Năm", "Sáu", "Bảy", "Tám", "Chín", "Mười", "Mười một", "Mười hai"],
        dayNames          : ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ Sáu", "Thứ bảy"],
        dayNamesShort     : ["CN", "Hai", "Ba", "Tư", "Năm", "Sáu", "Bảy"],
        dayNamesMin       : ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
        weekHeader        : "Tuần",
        dateFormat        : "dd/mm/yy",
        firstDay          : 1,
        isRTL             : false,
        showMonthAfterYear: false,
        yearSuffix        : ""
    };
    $.datepicker.setDefaults($.datepicker.regional["vi-VN"]);
    $( "#date-depart" ).datepicker({
        dateFormat: 'dd-mm-yy',
        minDate: 0
    });
});

jQuery(document).ready(function($) {
    $('.search-base .button-search').on('click',function(e) {
        e.preventDefault();
        $('.search-base .search-form').addClass('open');
        $('#searchform #s').focus();
    });
    $('.search-form').on('click',function(e) {
        if ( $(e.target).attr('class') == 'search-input' || $(e.target).attr('class') == 'search-submit') {
            return;
        } else {
            $('.search-base .search-form').removeClass('open');
        }
    });

    // Animated Scroll To Top
    $('.scrolltotop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

    //Sticky Menu
    var nav = $('.top-page');
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            nav.addClass("fixed");
            $('.scrollto').addClass('show');
            $('.scrolltotop').fadeIn('300');
        } else {
            nav.removeClass("fixed");
            $('.scrollto').removeClass('show');
            $('.scrolltotop').fadeOut('300');
        }
    });

    //Slide Menu
    $( ".tour-menu .block-content > ul > li:first-child").addClass('active').find('ul').show();
    $( ".tour-menu .block-content > ul > li > a").click(function(e){
        e.preventDefault();
        if(!$(this).parent().hasClass('active')) {
            $('.tour-menu .block-content > ul > li > .sub-menu').slideUp();
            $(this).next('.sub-menu').slideDown();
        }
        $('.tour-menu .block-content > ul > li').removeClass('active');
        $(this).parent().addClass('active');
    });

    //Slide Itinerary
    $( ".itinerary-list > li:first-child").addClass('active').find('.content').show();
    $( ".itinerary-list > li .title").click(function(e){
        e.preventDefault();
        $(this).parent().toggleClass('active');
        $(this).next('.content').slideToggle();
        //if(!$(this).parent().hasClass('active')) {
        //    $('.tour-menu .block-content > ul > li > .sub-menu').slideUp();
        //    $(this).next('.sub-menu').slideDown();
        //}
        //$('.tour-menu .block-content > ul > li').removeClass('active');
        //$(this).parent().addClass('active');
    });

});

jQuery(document).ready(function($) {

    var owl = $("#owlCarouselWithArrows");

    owl.owlCarousel({
        items: 3
    });

    // Custom Navigation Events
    $(".owl-carousel-arrows .next").click(function() {
        owl.trigger('owl.next');
    });

    $(".owl-carousel-arrows .prev").click(function() {
        owl.trigger('owl.prev');
    });

});

jQuery(document).ready(function(e) {jQuery('ul').each(function(){ jQuery(this).find('li:last').addClass('last'); });jQuery('ul').each(function(){ jQuery(this).find('li:first').addClass('first'); });
    var owl_slider;
    owl_slider = jQuery("#owl-slider");
    owl_slider.owlCarousel({
        autoplay : true,
        loop: true,
        mouseDrag: true,
        items: 1,
        lazyLoad: true,
        animateOut: 'zoomOut',
        //animateIn: 'zoomOut',
        autoplayHoverPause: true,
        dots: true,
        nav: false
    });
    var banner_slider;
    banner_slider = jQuery("#banner-slider");
    banner_slider.owlCarousel({
        autoplay : true,
        loop: true,
        mouseDrag: true,
        items: 1,
        lazyLoad: true,
        //animateIn: 'zoomOut',
        autoplayHoverPause: true,
        dots: false,
        nav: false
    });
    var tour_slider;
    tour_slider = jQuery(".tour-slider");
    tour_slider.owlCarousel({
        autoplay : true,
        loop: true,
        mouseDrag: true,
        items: 1,
        lazyLoad: true,
        //animateIn: 'zoomOut',
        autoplayHoverPause: true,
        dots: false,
        nav: true,
        navText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"]
    });

    var owl_selling;
    owl_selling = jQuery("#owl-selling");
    owl_selling.owlCarousel({
        loop:true,
        margin:15,
        nav:true,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
        responsive:{
            320:{
                items:1,
            },
            390:{
                items:2,
            },
            480:{
                items:2,
            },
            600:{
                items:3,
            },
            1000:{
                items:4,
            }
        }
    });
    jQuery('#mega').dcVerticalMegaMenu({
        rowItems: '3',
        speed: 'fast',
        effect: 'slide',
        direction: 'right'
    });
    new WOW().init();
    jQuery(".screen .frame img").mouseover(function() {
        var distance = this.height - jQuery(this).parent().height();
        jQuery(this).stop().animate({marginTop: - distance}, 3000, 'linear');
    }).mouseout(function() {
        jQuery(this).stop().animate({marginTop: '0'}, 300);
    });
    jQuery('.scrollTo').on('click', scrollToTop);
    function scrollToTop() {verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;element = jQuery('body');offset = element.offset();offsetTop = offset.top;jQuery('html, body').animate({scrollTop: offsetTop}, 500, 'linear');}
    jQuery(".navbar-toggle").click(function(){jQuery('body').addClass('mnopen');})
    jQuery(".close-menu").click(function(){jQuery('body').removeClass('mnopen');})
});