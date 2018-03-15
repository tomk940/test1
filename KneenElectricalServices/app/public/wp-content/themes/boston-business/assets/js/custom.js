 jQuery(document).ready(function($) {

/*------------------------------------------------
                MAIN NAVIGATION
------------------------------------------------*/

    $(".navbar-nav li").click(function () {
        $(".navbar-nav li").removeClass("current-menu-item");
        $(this).addClass('current-menu-item');	
    });

    $(".navbar-nav li.menu-item-has-children > a").after('<button class="dropdown-toggle"><i class="fa fa-angle-down"></i></button>')
    $(".navbar-nav button.dropdown-toggle").click(function() {
        $(this).parent().find('ul.dropdown-menu').first().slideToggle();
    });

    if($('.main-navigation ul').hasClass('nav')) {
        $('.main-navigation ul.nav').addClass('primary-menu-set');
    }
    else {
        $('.main-navigation .collapse.navbar-collapse > ul').addClass('nav navbar-nav navbar-right nav-menu');
    }

/*------------------------------------------------
                BACK TO TOP
------------------------------------------------*/
    $(window).scroll(function(){
        if ($(this).scrollTop() > 1) {
            $('.backtotop').css({bottom:"25px"});
        } 
        else {
            $('.backtotop').css({bottom:"-100px"});
        }
    });

    $('.backtotop').click(function(){
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
                SLICK SLIDER
------------------------------------------------*/
    $('#main-slider .regular').slick();
    $('#client-testimonial .regular').slick();
    $('.widget_gallery_slider .regular').slick();
    $('#our-team .regular').slick({
        responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 550,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});