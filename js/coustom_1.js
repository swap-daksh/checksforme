//Coustom JS
(function ($) {

    $('.flexslider').flexslider({
        animation: "fade",
        directionNav: false,
        pauseOnAction: false,
    });
    $('.testimonial-slider').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });
    // move to top
    // back to top
    var offset = 300,
            //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
            offset_opacity = 1200,
            //duration of the top scrolling animation (in ms)
            scroll_top_duration = 700,
            //grab the "back to top" link
            $back_to_top = $('.back-to-top');
    //hide or show the "back to top" link
    $(window).scroll(function () {
        ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if ($(this).scrollTop() > offset_opacity) {
            $back_to_top.addClass('cd-fade-out');
        }
    });




    // Code for product detail page 
    $(".right_cbi-div").wrapAll("<div class='right_cbi_parent col-md-6'></div>");
    $(".left_cbi-div").wrapAll("<div class='left_cbi_parent col-md-6'></div>");
    $(".oayo-left-radio-div").wrapAll("<div class='oayo-left-fields-div'></div>");
    $(".oayo-radio-group-div").wrapAll("<div class='oayo-right-fields-div'></div>");
    $(".oayo-left-fields-div").wrapAll("<div class='left-oayo-parents col-md-6'></div>");
    $(".oayo-right-fields-div").wrapAll("<div class='right-oayo-parents col-md-6'></div>");
    $(".cse-top-right-div").wrapAll("<div class='cse-top-right-parent col-md-6'></div>");
    $(".cse-top-left-div").wrapAll("<div class='cse-top-left-parent col-md-6'></div>");
    $(".cse-bottom-right-div").wrapAll("<div class='cse-bottom-right-parent col-md-6'></div>");
    $(".cse-bottom-left-div").wrapAll("<div class='cse-bottom-left-parent col-md-6'></div>");
    $(".match-stamp-rights-div").wrapAll("<div class='match-stamp-rights-parent'></div>");
    $(".match-stamp-left-div").wrapAll("<div class='match-stamp-left-parent match-stamp-div'></div>");
    $(".match-stamp-center-div").wrapAll("<div class='match-stamp-center-parent match-stamp-div'></div>");
    /**
     * Disable scroll wheel on input number
     **/
    $('input[type=number]').on('focus', function (e) {
        $(this).on('wheel', function (e) {
            return false;
        });
    });
    $('input[type=number]').on('keydown', function (e) {
        if (e.which === 38 || e.which === 40) {
            e.preventDefault();
        }
    });




    /**
     *  Select Check Style functionality
     **/
    var $selectTemplateTag = $(".select-template-tag");
    var $selectSoftware = $("select.sel-software");
    var $selectLabel = $("select.sel-label");
    if ($(".select-template-tag")[0]) {
        var temp_image = $selectTemplateTag.find('option:selected').data('image-variations').imagep.image_link;
        $(".cfm-template-img").html("<img src='" + temp_image + "' id='cfm-template-img-image'>");
    }
    $selectSoftware.prepend('<option value="">Select Software</option>');
    $selectLabel.prepend('<option value="">Select Label</option>');


    $selectLabel.val('');



    $selectSoftware.change(function () {
        $selectLabel.val('');
    });
    $selectLabel.change(function () {
        $selectSoftware.val('');
    });
    /**
     *  Change Color Radio
     **/
    $(".choose-color").find('.choose-color-radio').change(function () {
        $(".choose-color").find('.choose-color-radio').not(this).prop('checked', false);
        $(".choose-color-radio-ul").not(this).removeClass('tc-active');
        $(".choose-color-radio-div").removeClass('tc-active');
        $("#cfm-bg-img-image").attr("src", $(this).data('image-variations').imagep.image_link);
        $("#cfm-bg-img-modal").attr("src", $(this).data('image-variations').imagep.image_link);

        $('.cfm-custom-background').val('');
        $('.cfm-custom-background-div').find('.tm-filename').hide();
    });
    $(".choose-color").find('.choose-color-radio').click(function () {
        $(".choose-color").find('.choose-color-radio').not(this).prop('checked', false);
        $(".cfm-active-tab").removeClass('cfm-active-tab');
        $(this).parent().addClass('cfm-active-tab');
    });
    $('.left-oayo-parents').find('input[type=radio]').click(function () {
        $('.left-oayo-parents').find('input[type=radio]').not(this).prop('checked', false);
    });
    /**
     * Colorbox init
     **/

    if ($('.tm-section-label').siblings().hasClass('open')) {
        $('.tm-section-label').parent().addClass('cfm-accordion-open');
    } else {
        $('.tm-section-label').parent().removeClass('cfm-accordion-open');
    }
    /**
     *  Tabbination for Optional Features on Product Page
     **/
    setTimeout(function () {
        $('.trigger-accordion-oayo-lr-div').trigger('click');
        $('.trigger-accordion-oayo-rr-div').trigger('click');
        $('.trigger-accordion-cse-tl-div').trigger('click');
        $('.trigger-accordion-cse-tr-div').trigger('click');
        $('.trigger-accordion-cse-bl-div').trigger('click');
        $('.trigger-accordion-cse-br-div').trigger('click');
        $('.trigger-accordion-msa-div').trigger('click');
        $('.trigger-accordion-mse-div').trigger('click');
        $('.trigger-accordion-mss-div').trigger('click');
    }, 1000);
    // Accordion 1
    $('.accordion-oayo-lr-div').wrapAll('<div class="accordion-oayo-lr-parent"></div>');
    $('.trigger-accordion-oayo-lr-div').click(function () {
        $(this).toggleClass('cfm-inner-heading-open');
        $('.accordion-oayo-lr-parent').toggleClass('cfm-inner-accordion-open');
        $('.accordion-oayo-lr-parent').slideToggle();
    });
    //Accordion 2
    $('.accordion-oayo-rr-div').wrapAll('<div class="accordion-oayo-rr-parent"></div>');
    $('.trigger-accordion-oayo-rr-div').click(function () {
        $(this).toggleClass('cfm-inner-heading-open');
        $('.accordion-oayo-rr-parent').toggleClass('cfm-inner-accordion-open');
        $('.accordion-oayo-rr-parent').slideToggle();
    });
    //Accordion 3
    $('.accordion-cse-tl-div').wrapAll('<div class="accordion-cse-tl-parent"></div>');
    $('.trigger-accordion-cse-tl-div').click(function () {
        $(this).toggleClass('cfm-inner-heading-open');
        $('.accordion-cse-tl-parent').toggleClass('cfm-inner-accordion-open');
        $('.accordion-cse-tl-parent').slideToggle();
    });
    //Accordion 4
    $('.accordion-cse-tr-div').wrapAll('<div class="accordion-cse-tr-parent"></div>');
    $('.trigger-accordion-cse-tr-div').click(function () {
        $(this).toggleClass('cfm-inner-heading-open');
        $('.accordion-cse-tr-parent').toggleClass('cfm-inner-accordion-open');
        $('.accordion-cse-tr-parent').slideToggle();
    });
    //Accordion 5
    $('.accordion-cse-bl-div').wrapAll('<div class="accordion-cse-bl-parent"></div>');
    $('.trigger-accordion-cse-bl-div').click(function () {
        $(this).toggleClass('cfm-inner-heading-open');
        $('.accordion-cse-bl-parent').toggleClass('cfm-inner-accordion-open');
        $('.accordion-cse-bl-parent').slideToggle();
    });
    //Accordion 6
    $('.accordion-cse-br-div').wrapAll('<div class="accordion-cse-br-parent"></div>');
    $('.trigger-accordion-cse-br-div').click(function () {
        $(this).toggleClass('cfm-inner-heading-open');
        // $('.match-stamp-addon').toggle();
        $('.accordion-cse-br-parent').toggleClass('cfm-inner-accordion-open');
        $('.accordion-cse-br-parent').slideToggle();
    });
    $('.accordion-mse-div').wrapAll('<div class="accordion-mse-parent"></div>');
    $('.trigger-accordion-mse-div').click(function () {
        $(this).toggleClass('cfm-inner-heading-open');
        $('.match-stamp-addon').toggle();
        $('.accordion-mse-parent').toggleClass('cfm-inner-accordion-open');
        $('.accordion-mse-parent').slideToggle();
    });
    $('.accordion-msa-div').wrapAll('<div class="accordion-msa-parent"></div>');
    $('.trigger-accordion-msa-div').click(function () {
        $(this).toggleClass('cfm-inner-heading-open');
        $('.match-stamp-addon').toggle();
        $('.accordion-msa-parent').toggleClass('cfm-inner-accordion-open');
        $('.accordion-msa-parent').slideToggle();
    });
    $('.accordion-mss-div').wrapAll('<div class="accordion-mss-parent"></div>');
    $('.trigger-accordion-mss-div').click(function () {
        $(this).toggleClass('cfm-inner-heading-open');
        $('.match-stamp-addon').toggle();
        $('.accordion-mss-parent').toggleClass('cfm-inner-accordion-open');
        $('.accordion-mss-parent').slideToggle();
    });

    /**
     *  Add cfm-accordion-open to open group
     **/
    /** $('.tm-collapse').find('.tm-section-label').click(function(){
     if(!$(this).siblings().hasClass('open')){
     
     $(this).parent().addClass('cfm-accordion-open');
     
     } else {
     
     $(this).parent().removeClass('cfm-accordion-open');    
     
     }
     
     }); **/

    $(document).ready(function () {
        if (isMobile()) {
            $('#cfm-bs-modal').addClass('mobile-popup');
            $('#cfm-bs-modal').removeClass('desktop-popup');
        } else {
            $('#cfm-bs-modal').addClass('desktop-popup');
            $('#cfm-bs-modal').removeClass('mobile-popup');
        }

    });



    $wrap = $(".tm-collapse-wrap");
    $header = $(".tm-toggle");
    $header.on("openwrap.tmtoggle", function (e) {
        console.log("trigger");

        if (!isMobile()) {
            /*-- Desktop Toggle--*/
            $('.cfm-accordion-open').removeClass('cfm-accordion-open');
        }
        $(this).parent().addClass('cfm-accordion-open');
        $currentEL = $(this);
        var accordionTrigDif = 100;



        if (isMobile()) {


            if ($(window).width() < 768) {
                accordionTrigDif = 200;
            }
            $('body').css("touch-action", "none");
            $("html, body").animate({scrollTop: $currentEL.offset().top - accordionTrigDif}, 300, function () {
                $('body').css("touch-action", "auto");
            });


        } else {

            setTimeout(function () {
                if ($(window).width() < 768) {
                    accordionTrigDif = 200;
                }
                $('body').css("touch-action", "none");
                $("html, body").animate({scrollTop: $currentEL.offset().top - accordionTrigDif}, 300, function () {
                    $('body').css("touch-action", "auto");
                    //                alert('Scroll triggered');

                });
            }, 500);
        }

        //setTimeout(function () {
        if ($(window).width() < 768) {
            accordionTrigDif = 200;
        }
        $('body').css("touch-action", "none");
        $("html, body").animate({scrollTop: $currentEL.offset().top - accordionTrigDif}, 300, function () {
            $('body').css("touch-action", "auto");
//                alert('Scroll triggered');

        });
        //  }, 500);



        if (!isMobile()) {
            /*-- Desktop Toggle--*/
            $header.not(this).trigger("closewrap.tmtoggle");
        }


    });
    $header.on("closewrap.tmtoggle", function (e) {

        if (!isMobile()) {
            /*-- Desktop Toggle--*/  $(this).parent().removeClass('cfm-accordion-open');
        }
    });


    /**
     * Reorder Javascript functionality
     **/

    if ($('input.reorder-checkbox').is(':checked')) {
        $reorderButton.addClass('reordered');
        $('.cfm-title-main-wrap').find('.product_title').append("<span> - Reorder</span>");
        $reorderButton.text('Create New Order');
        $('.order-text').text('Reorders');
    }


    var $reorderButton = $('#button-reorder,.reorder-button');
    $reorderButton.click(function () {
        if ($('input.reorder-checkbox').is(':checked')) {
            $('.reorder-checkbox').trigger('click');
            $reorderButton.removeClass('reordered');
            $('.cfm-title-main-wrap').find('.product_title').find('span').remove();
            $reorderButton.text('Reorder Checks');
            $('.order-text').text('New Orders');
        } else {
            $('.reorder-checkbox').trigger('click');
            $reorderButton.addClass('reordered');
            $('.cfm-title-main-wrap').find('.product_title').append("<span> - Reorder</span>");
            $reorderButton.text('Create New Order');
            $('.order-text').text('Reorders');
        }
    });

    /**
     *  Stamp hide functionality
     **/
    setTimeout(function () {
        $('#signature-stamp-addon').addClass('tc-hidden');
    }, 1000);
    $('#signature-stamp-val').find('input[type="radio"]').change(function () {
        if ($('#signature-stamp-val').find('input[type="radio"]:checked').val() == "None Selected_0") {
            $('#signature-stamp-addon').addClass('tc-hidden');
        } else {
            $('#signature-stamp-addon').removeClass('tc-hidden');
        }
    });

    /**
     * Change image functionality
     **/
    $(".select-template").find('.select-template-tag').change(function () {
        var temp_image = $(".select-template-tag").find('option:selected').data('image-variations').imagep.image_link;
        $(".cfm-template-img").html("<img src='" + temp_image + "' id='cfm-template-img-image'>");
    });
    $(".select-template").find('.sel-label').change(function () {
        var temp_image = $(".sel-label").find('option:selected').data('image-variations').imagep.image_link;
        $(".cfm-template-img").html("<img src='" + temp_image + "' id='cfm-template-img-image'>");
    });

    /**
     *  On hover Image functionality
     **/
    //var $tooltip =  $('#tm-tooltip');
    //$tooltip.wrapAll('<div class="tooltip-parent"></div>');
    //$tooltip.parent().hide();
    var cfmDefaultImage = $('#cfm-bg-img-image').attr('src');
    $(".choose-color-radio-div").find('li').hover(function () {
        //$tooltip.parent().show();
        $("#cfm-bg-img-image").attr("src", $(this).find('.choose-color-radio').data('image-variations').imagep.image_link);
        $("#cfm-bg-img-image-mobile").attr("src", $(this).find('.choose-color-radio').data('image-variations').imagep.image_link);
        //console.log($(this).find('.choose-color-radio').data('image-variations').imagep.image_link);
    }, function () {
        $("#tm-tooltip").remove();

        if (jQuery('input.cfm-custom-background').attr("data-file").length > 0) {

            setTimeout(function () {
                $('.cfm-bg-img img').attr('src', $('input.cfm-custom-background').data('file'));
                console.log('image-updates');
            }, 500);
        } else if ($('.cfm-custom-background').val().split('\\').pop().length) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cfm-bg-img-image')
                        .attr('src', e.target.result);
                $("#cfm-bg-img-image-mobile")
                        .attr('src', e.target.result);
            };
            reader.readAsDataURL($('.cfm-custom-background')[0].files[0]);

        } else if ($('.choose-color-radio:checked').length != 0) {
            $("#cfm-bg-img-image").attr("src", $('.choose-color-radio:checked').data('image-variations').imagep.image_link);
            $("#cfm-bg-img-image-mobile").attr("src", $('.choose-color-radio:checked').data('image-variations').imagep.image_link);
        } else {
            $("#cfm-bg-img-image").attr("src", cfmDefaultImage);
            $("#cfm-bg-img-image-mobile").attr("src", cfmDefaultImage);
        }
        // $tooltip.parent().hide();
    });

    /**
     *  Functionality to select individual radio  from Optional Accessories Left
     **/
    $oyoLeftFields = $('.accordion-oayo-lr-div');
    $oyoLeftFields.find('input[type="radio"]').not('input[type="radio"].reg-depo-slip-radio').change(function () {
        $oyoLeftFields.find('input[type="radio"]').not(this).not('input[type="radio"].reg-depo-slip-radio').prop('checked', false);
        $oyoLeftFields.find('.tc-active').not('.reg-depo-slip-radio').removeClass('tc-active');
    });

    /**
     * Disable Click events accordions
     **/
    $(".tm-toggle").find('a').not('.skip_to_add_cart').click(function (e) {
        e.stopPropagation();
    });
    $('.popup-window').click(function () {
//        alert('hello');
        var target = $(this).data('target');
        $(target).modal();
    });
    $(".colorbox-iframe").click(function (e) {
        e.preventDefault();
        var colorboxHref = $(this).attr('href');
        $.colorbox({iframe: true, href: colorboxHref, width: "80%", height: "80%"});
    });

    /**
     *  Functionality to select individual radio  from Optional Accessories Right
     **/
    $oyoRightFields = $('.accordion-oayo-rr-div');
    $oyoRightRadio = $('.oayo-lr');
    $oyoRightFields.find('input[type="radio"]').change(function () {
        $oyoRightFields.find('input[type="radio"]').not(this).prop('checked', false);
        $oyoRightFields.find('.tc-active').removeClass('tc-active');
    });

    /**
     * Functionality to disable / enable 
     **/

    $('input.suggestion-box').parents('ul').attr('data-tm-validation', '{"required":true}');
    $('input.suggestion-box-check').change(function () {

        var $suggestionBox = $('input.suggestion-box');






        setTimeout(function () {

            if ($('input.suggestion-box-check').is(":checked")) {
                $suggestionBox.prop("disabled", true);
                $suggestionBox.addClass('disabled');
                $suggestionBox.addClass('disabled');
                $suggestionBox.parents('ul').attr('data-tm-validation', '{"required":false}');
                $suggestionBox.removeClass('tm-error');
            } else {
                $suggestionBox.prop("disabled", false);
                $suggestionBox.removeClass('disabled');
                $suggestionBox.parents('ul').attr('data-tm-validation', '{"required":true}');
            }
        }, 500);
    });

    /**
     *  Functionality to select individual Radio from Check Sized Envelope section
     **/
    $cseTL = $('.accordion-cse-tl-div');
    $cseTR = $('.accordion-cse-tr-div');
    $cseBL = $('.accordion-cse-bl-div');
    $cseTL.find('.cse-top-left').change(function () {
        $cseTR.find('.cse-top-right').prop('checked', false);
        $cseTR.find('.tc-active').removeClass('tc-active');
        $cseBL.find('.cse-bottom-left').prop('checked', false);
        $cseBL.find('.tc-active').removeClass('tc-active');
    });
    $cseTR.find('.cse-top-right').change(function () {
        $cseTL.find('.cse-top-left').prop('checked', false);
        $cseTL.find('.tc-active').removeClass('tc-active');
        $cseBL.find('.cse-bottom-left').prop('checked', false);
        $cseBL.find('.tc-active').removeClass('tc-active');
    });
    $cseBL.find('.cse-bottom-left').change(function () {
        $cseTR.find('.cse-top-right').prop('checked', false);
        $cseTR.find('.tc-active').removeClass('tc-active');
        $cseTL.find('.cse-top-left').prop('checked', false);
        $cseTL.find('.tc-active').removeClass('tc-active');
    });

    /**
     *  Scroll to top 
     **/
    $(".scroll_to_bottom").click(function () {
        $("html, body").animate({scrollTop: $(document).height()}, 2000);
        return false;
    });
    $(".scrolltop").click(function () {
        $("html, body").animate({scrollTop: 0}, 2000);
        return false;
    });
    $(".skip_to_add_cart").click(function () {
        $("html, body").animate({scrollTop: $('.single_add_to_cart_button').offset().top - 200}, 2000);
        return false;
    });

    /**
     *  Sticky check image, scroll the image till footer
     **/
    function addTranslateX(top_scroll) {
        if ($(window).width() > 768) {
            $('.woocommerce-product-gallery').css('transform', 'translateY(' + (top_scroll - 200) + 'px)');
        } else {
            //$('.woocommerce-product-gallery').css('transform', 'translateY(0px)');
        }
    }
//    function addSectionMargin(margin, window_scroll) {
//
//
//        // console.log(margin);
//        if ($(window).width() < 768) {
//
//            if (window_scroll) {
//                $('#blog').css("margin-top", margin);
//            } else {
//                $('#blog').css("margin-top", 0);
//            }
//        }
//
//    }
    if ($('.woocommerce-product-gallery').length) {
        var gallery_height = $(".woocommerce-product-gallery").height();
        var div_top = $('.woocommerce-product-gallery').offset().top;
        $(window).on('load', function () {
            gallery_height = $(".woocommerce-product-gallery").height();
            div_top = $('.woocommerce-product-gallery').offset().top;
        });
        $(window).scroll(function () {
            var footer_top = $("#product-sticky-stop").offset().top;
            var window_top = $(window).scrollTop() + 100;
            var top_scroll = 0;
            var div_height = $(".woocommerce-product-gallery").height();
            /*
             * -------------------------------------------------------------------------
             * Adding condition on the basis of screen size
             * -------------------------------------------------------------------------
             * Assuming 676 or less as mobile
             */
            if (screen.width <= 676) {
                if (window_top - 150 > div_top) {
                    $('.woocommerce-product-gallery-mobile').addClass('sticky-product-image');
//                    addSectionMargin(gallery_height, true);
//                    if ((".woocommerce-product-gallery.sticky-product-image").length != 1) {
//                        $('.tm-toggle:eq(0)').trigger("click");
//                        alert("ASdasd");
//                    }
                } else {
                    $('.woocommerce-product-gallery-mobile').removeClass('sticky-product-image');
//                    addSectionMargin(gallery_height, false);
                }
            } else {
                if (window_top + div_height > footer_top) {
                    $('.woocommerce-product-gallery').removeClass('sticky-product-image');
//                    addSectionMargin(gallery_height, false);
                } else if (window_top > div_top) {
                    $('.woocommerce-product-gallery').addClass('sticky-product-image');
//                    addSectionMargin(gallery_height, true);
                    top_scroll = window_top;
                } else {
                    $('.woocommerce-product-gallery').removeClass('sticky-product-image');
//                    addSectionMargin(gallery_height, false);
                }
            }
            if ((window_top > div_top) && ((window_top + div_height + 300) < footer_top)) {
                addTranslateX(top_scroll);
            }
            if ((window_top + div_height + 300) > footer_top) {
                $('.woocommerce-product-gallery').addClass('footer-reached');
            } else {
                $('.woocommerce-product-gallery').removeClass('footer-reached');
            }
            if (window_top < div_top) {
                $('.woocommerce-product-gallery').css('transform', 'translateY(0px)');
            }
        });
    }

    /**
     * Scroll to top functionality 
     **/
    $(window).scroll(function () {
//var stickyBottom = $('.scroll_to_bottom');
        var stickyTop = $('.scrolltop');
        scroll = $(window).scrollTop();
        if (scroll > ($(document).height() / 4)) {
            stickyTop.fadeIn();
        } else {
            stickyTop.fadeOut();
        }
    });

    /**
     *  Change background image for the Check Image on file upload
     **/
    $('.cfm-custom-background').change(function () {
        if ($('.cfm-custom-background').val().split('\\').pop().length) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cfm-bg-img-image')
                        .attr('src', e.target.result);

                $('#cfm-bg-img-modal').attr('src', e.target.result);
                $("#cfm-bg-img-image-mobile")
                        .attr('src', e.target.result);
                $(".choose-color").find('.choose-color-radio').prop('checked', false);
                $(".cfm-active-tab").removeClass('cfm-active-tab');

            };
            reader.readAsDataURL(this.files[0]);
        }
    });
    /**    if ($('.cfm-custom-background').data('file')) {
     
     $('#cfm-bg-img-image').attr('src', $('.cfm-custom-background').data('file'));
     $('#cfm-bg-img-modal').attr('src', $('.cfm-custom-background').data('file'));
     $("#cfm-bg-img-image-mobile").attr('src', $('.cfm-custom-background').data('file'));
     } **/
    /**
     * Trigger next accordion on click
     * 
     * Currently on these steps:
     * 3.) Choose Quantity
     
     $('.choose-quantity-section').find('input[type=radio]').click(function () { 
     $('.tm-toggle:eq(3)').trigger("click");
     });
     $('.service-delivery-method').find('input[type=radio]').click(function () {
     $('.tm-toggle:eq(6)').trigger("click");
     });
     
     
     **/

    /**
     *  Service Delivery method
     **/
    $('.service-delivery-radio-ul li:nth(1)').prepend('<span id="service-warning">Rush Service is currently unavailable</span>');
    $('.service-delivery-radio-ul li').not('.service-delivery-radio-ul li:nth(0)').addClass('disabled-radio');

    /**
     * Verify Account number 
     **/
    var $accountNumb = $('input.account-num');
    var $verAccountNumb = $('input.ver-account-num');
    var verAccountId = $verAccountNumb.attr('id');
    var $verAccountError = $('#custom-' + verAccountId + '-error');
    $accountNumb.change(function () {
        matchAccount();
    });
    $verAccountNumb.change(function () {
        matchAccount();
    });
    $accountNumb.keyup(function () {
        matchAccount();
    });
    $verAccountNumb.keyup(function () {
        matchAccount();
    });
    function matchAccount() {
        setTimeout(function () {
            if ($verAccountNumb.val().length > 0) {
                if ($accountNumb.val() != $verAccountNumb.val()) {
                    $verAccountNumb.removeClass('tm-valid');
                    $verAccountNumb.addClass('tm-error');
                    if ($verAccountError.length > 0) {
                        console.log();
                        $verAccountError.show();
                    } else {
                        // $verAccountNumb.parent().append('<label id="custom-' + verAccountId + '-error" class="tm-error">Account Number does not match.</label>');
                    }
                } else {
                    $verAccountNumb.addClass('tm-valid');
                    $verAccountNumb.removeClass('tm-error');
                    $verAccountError.show();
                }
            }
        }, 200);
    }

    /**
     * Check if there is custom background
     **/

    if (jQuery('input.cfm-custom-background').attr("data-file").length > 0) {

        setTimeout(function () {
            $('.cfm-bg-img img').attr('src', $('input.cfm-custom-background').data('file'));
            console.log('image-updates');
        }, 500);
    }



    /**
     *  Functionality for next previous buttons
     **/
    $('.cfm-next-button').click(function () {
        var parentCollapse = $(this).closest('#blog').find('.cfm-next-button').index(this);
        var nextCollapse = parentCollapse + 1;

        if (isMobile()) {
            $('.tm-toggle:eq(' + nextCollapse + ')').trigger("openwrap.tmtoggle");
        } else {
            $('.tm-toggle:eq(' + nextCollapse + ')').trigger("click");
        }

    });
    $('.cfm-previous-button').click(function () {
        var parentCollapse = $(this).closest('#blog').find('.cfm-previous-button').index(this);
        var previousCollapse = parentCollapse - 1;


        if (isMobile()) {
            $('.tm-toggle:eq(' + previousCollapse + ')').trigger("openwrap.tmtoggle");
        } else {
            $('.tm-toggle:eq(' + previousCollapse + ')').trigger("click");
        }



        //$('.tm-toggle:eq('+nextCollapse+')').trigger("openwrap.tmtoggle");
    });
    /**
     *  Add class to header on scroll
     **/
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        var headerHeight = jQuery('.top-nav').height();
//        console.log(scroll);
        if (scroll >= 58) {
            $("body").css("margin-top", headerHeight);
            $(".top-nav").addClass("sticky-header");
        } else {
            $("body").css("margin-top", 0);
            $(".top-nav").removeClass("sticky-header");
        }
    });
    /*
     * ----------------------------------------
     *  Footer collapes animate
     * ---------------------------------------
     */
    $(".animateit").on("click", function () {
        $currentEL = $(this);
        setTimeout(function () {
            $("html, body").animate({
                scrollTop: $currentEL.offset().top - 100
            }, 500);
        }, 200);
    });
    /*
     * -------------------------------------------------------------------------
     * Adding condition on the basis of screen size
     * -------------------------------------------------------------------------
     * Assuming 676 or less as mobile
     */
    if (screen.width <= 676) {
        $(".choose-color-radio-div").find('li').hover(function () {
//            $(this).trigger("dblclick");
            $(".choose-color-radio-div").find('li').removeClass("tc-active");
            $(".choose-color-radio-div").find('li').children("label").removeClass("cfm-active-tab");
            $(this).addClass("tc-active");
            $(this).children("label").addClass("cfm-active-tab");
        });
    }
}(jQuery));


function isMobile() {
    if (jQuery(window).width() < 768) {
        return true;
    } else {
        return false;
    }

}


var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
