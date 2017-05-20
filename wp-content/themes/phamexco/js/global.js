jQuery(document).ready(function($) {
    if ($(window).width() > 700) {
        $("#list-of-products").owlCarousel({
            nav: true,
            slideSpeed: 1000,
            paginationSpeed: 3800,
            items: 4,
            margin: 9,
            lazyLoad: true,
            autoPlay: false,
            transitionStyle: "fade",
            loop: true,
            responsive: {
                0: {
                    items: 1,
                },
                375: {
                    items: 1,
                },
                480: {
                    items: 2,
                },
                768: {
                    items: 4,
                },
                1000: {
                    items: 4,
                }
            }
        });
    }
    $("#list-news").owlCarousel({
        nav: true,
        slideSpeed: 1000,
        paginationSpeed: 3800,
        items: 1,
        lazyLoad: true,
        autoPlay: false,
        transitionStyle: "fade",
        loop: true
    });
    $('#susername').keyup(function() {
        $('#billing_last_name').val($(this).val());
    })
    $('#phone_number').keyup(function() {
        $('#billing_phone').val($(this).val());
    })
    $('#address').keyup(function() {
        $('#billing_address_2').val($(this).val());
    })
    $('#more-info').keyup(function() {
        $('#order_comments').val($(this).val());
    })
    $(window).bind('scroll', function() {
        if ($(this).width() > 700) {
            if ($('#home-header').length) {
                if ($(this).scrollTop() > $('#home-header').offset().top + $('#home-header').height()) {
                    $('#home-header').addClass('fixed');
                    $(".contactOrthers").removeClass('hide');
                    $(".menu-header .menu>li:nth-child(4)").css({
                      'border-right' : '1px solid #000'
                    });
                }
                if ($(this).scrollTop() < $('#top-header').offset().top + $('#home-header').height()) {
                    $('#home-header').removeClass('fixed');
                    $(".contactOrthers").addClass('hide');
                    $('.menu-trang-chu-container').show();
                    $(".menu-header .menu>li:nth-child(4)").css({
                      'border-right' : 'none'
                    });
                }
            }
        }
    })
    $('.all-category').click(function() {
        $('.menu-trang-chu-container').toggle();
    });
    jQuery(window).load(function() {
        if ($(window).width() > 1023) {
            setTimeout(function() {
                $('.loadding').hide();
            }, 0);
        }
    });
    $('.btn-subtraction').click(function() {
        var qty = $('.qty').val();
        if (qty > 1) {
            $('.qty').val(parseInt(qty) - 1);
        }
    })

    $('.btn-sum').click(function() {
        var qty = $('.qty').val();
        $('.qty').val(parseInt(qty) + 1);
    })

    $('.btn_order').click(function() {
        $('.focus').html('');
        var susername = $('#susername').val();
        var phone = $('#phone_number').val();
        var flag = true;
        var words = $.trim($('#susername').val()).split(' ');

        var matches = susername.match(/\d+/g);
        if (matches != null) {
            $('#susername').next('span').text('Nhập họ tên không được chứa số');
            $('#susername').next('span').css('display', 'inline').fadeIn(1200);
            flag = false;
        }

        // if (susername == "" || words.length < 2) {
        //     $('#susername').next('span').text('Vui lòng nhập đầy đủ họ và tên');
        //     $('#susername').next('span').css('display', 'inline').fadeIn(1200);
        //     flag = false;
        // }
        if (phone == "") {
            $('#phone_number').next('span').text('Vui lòng nhập số điện thoại');
            $('#phone_number').next('span').css('display', 'inline').fadeIn(1200);
            flag = false;
        }
        if (phone.length < 10 || phone.length > 11) {
            $('#phone_number').next('span').text('Số điện thoại nhập không đúng');
            $('#phone_number').next('span').css('display', 'inline').fadeIn(1200);
            flag = false;
        }
        if (flag) {
            $('#checkout-order').submit();
        }
    })

    // jQuery(window).bind('scroll', function() {
    //     if (jQuery('body').width() > 1200) {
    //         if (jQuery('.sidebar-left').length > 0) {
    //             if (jQuery('.slider-product1').length > 0) {
    //                 var elemBottom = jQuery('.slider-product1');
    //             } else {
    //                 var elemBottom = jQuery('footer');
    //             }
    //             if (jQuery(this).scrollTop() > jQuery('.sidebar-container').offset().top + jQuery('.sidebar-left').height() ||
    //                 jQuery(this).scrollTop() + jQuery('.sidebar-left').height() + 54 < elemBottom.offset().top) {
    //                 jQuery('.sidebar-left').addClass('fixed').removeClass('absolute');
    //                 jQuery('.sidebar-left.fixed').width(jQuery('.sidebar-container').width());
    //             }
    //             if (jQuery(this).scrollTop() < jQuery('.sidebar-container').offset().top) {
    //                 jQuery('.sidebar-left').removeClass('fixed absolute');
    //             }
    //             if (jQuery(this).scrollTop() + jQuery('.sidebar-left').height() + 54 > elemBottom.offset().top) {
    //                 jQuery('.sidebar-left').removeClass('fixed').addClass('absolute');
    //             }
    //         }
    //     }
    // })

    if ($(window).width() < 768) {
        $('.logo').appendTo('#wprmenu_bar');
        $('#cart-info').appendTo('#wprmenu_bar');
        $('.wprmenu_icon, .logo').addClass('col-xs-4');
    };
    // if ($(window).width() > 1024) {
    //   var event_scroll = $(".event_scroll").offset().top;
    //   var footer = $("#footer-home").offset().top;
    //   $(window).scroll(function(){
    //       var scroll = $(this).scrollTop();
    //       if(scroll >= (event_scroll - 100)){
    //         $(".event_scroll").css({
    //           'position' : 'fixed',
    //           'top' : '70px',
    //           'right' : '85px',
    //           'padding' : '0px 75px',
    //           'height' : '100vh',
    //         });
    //         $(".sidebar-title").css({
    //           'margin-top' : '0px',
    //         });
    //       }else{
    //         $(".event_scroll").css({
    //           'position' : 'relative',
    //           'right' : '0px',
    //           'top' : '0px',
    //           'padding' : '0px',
    //         });
    //         $(".sidebar-title").css({
    //           'margin-top' : '-10px',
    //         })
    //       }
    //       if(scroll >= (footer - 1000)){
    //         $(".event_scroll").css({
    //           'position' : 'relative',
    //         })
    //       }
    //   });
    // };

    var urlImage =url()+"/images/icon.png";
    $(".sidebar-menu .sidebarSP li").prepend('<img src='+urlImage+' alt="icon images">');
    $("#input_1_1").attr('required' , true);
    $("#input_1_2").attr('required' , true);
    // facebookshare
    $('.share_button').click(function(e){
      e.preventDefault();
        var name = $(this).closest(".facebook_single").find(".name_fb").val();
        var link = $(this).closest(".facebook_single").find(".link_fb").val();
        var picture = $(this).closest(".facebook_single").find(".img_fb").val();
        var description = $(this).closest(".facebook_single").find(".description_fb").text();
                FB.ui(
                {
                    method: 'feed',
                    name: name,
                    link: link,
                    picture: picture,
                    caption: 'Công ty TNHH Phamexco',
                    description: description,
                });
        });
});
