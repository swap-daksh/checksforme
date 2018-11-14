<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */
?>
<!--</div>-->
<!-- #content -->
<!--process-section-->
<?php $front_page = 7; ?>
<section class="services"> 
    <div class="container">
        <div class="row">
            <?php
            $i = 0;
            if (have_rows('all_services', $front_page)) {
                while (have_rows('all_services', $front_page)) {
                    the_row();
                    $i++;
                    ?>
                    <div class="col-sm-3 <?php if ($i == 1) { ?> col-xs-offset-1 <?php } ?> service-col"> 
                        <img class="service-icon" src="<?php the_sub_field('services_image', $front_page); ?>" alt="Easey to Order"> 
                        <h4><?php the_sub_field('services_name', $front_page); ?></h4>
                    </div> 
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<section class="process"> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 recoder-check">
                <h2> <?php the_field('title_record_check', $front_page); ?> </h2>
                <?php the_field('tag_line_record_check', $front_page); ?>
                <a  class="btn check" href="<?php the_field('order_now_button_link', $front_page); ?>"><?php the_field('order_button', $front_page); ?></a>
            </div>
            <div class="col-sm-6 process-work"> <h2><?php the_field('title_fast_easy_process', $front_page); ?></h2>  
                <div class="steps"> 
                    <?php
                    $f = 0;
                    if (have_rows('fast_&_easy_process', $front_page)) {
                        while (have_rows('fast_&_easy_process', $front_page)) {
                            the_row();
                            $f++;
                            ?>
                            <div class="step-box"> 
                                <div class="step-content">
                                    <span><?php echo $f; ?></span> 
                                    <img src="<?php the_sub_field('image_fast_easy_process', $front_page); ?>">
                                </div> 
                                <h4> <?php the_sub_field('tag_line_fast_easy_process', $front_page); ?> </h4> 
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--calltoaction-->
<section class="calltoaction">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 call-left">
                <p><?php the_field('fast_&_easy_process_content', $front_page); ?></p>
            </div>
            <div class="col-sm-3 call-btn">
                <a class="btn call-contact" href="<?php the_field('contact_us_link', $front_page); ?>"><?php the_field('contact_us', $front_page); ?></a>
            </div>
        </div>
    </div>
</section>
<!--Testimonials-->
<?php if (!is_product()) { ?>
    <section class="testimonials">
        <div class="container">
            <div class="row">
                <div class="testimonial-heading"> <h2><?php the_field('testimonial_title', $front_page); ?></h2>
                    <p> <?php the_field('testimonial_sub_title', $front_page); ?></p>
                </div>
                <div id="myCarousel" class="carousel">
                    <div class="row">
                        <div class="testimonial-wrapper owl-carousel owl-theme testimonial-slider">
                            <?php
                            $args = array('post_type' => 'testimonials', 'posts_per_page' => -1, 'order' => 'asc');
                            $loop = new WP_Query($args);
                            while ($loop->have_posts()) : $loop->the_post();
                                ?>
                                <div class="col-sm-6 item">
                                    <div class="testimonial"><?php the_content(); ?>
                                        <div class="star-rating">
                                            <ul class="list-inline">
                                                <?php
                                                $star = get_field('rating');
                                                for ($i = 0; $i < $star; $i++) {
                                                    ?>              	
                                                    <li class="list-inline-item"><i class="fa fa-star"></i>
                                                    <?php } ?>
                                            </ul>
                                        </div> 
                                    </div>
                                    <div class="media">
                                        <div class="media-left d-flex mr-3">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                        <div class="media-body">
                                            <div class="overview">
                                                <div class="name"><h3><?php the_title(); ?></h3></div>
                                                <div class="details"><p><?php the_field('tag_line'); ?></p></div>
                                            </div>										
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <!--                        </div>								
                                            </div>-->
                    </div>			
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>
<?php } ?>
<!--footer-->
<div id="footer" class="hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="footer-logo">        <?php the_custom_logo(); ?></div>
                <p class="phone"><a href="tel:<?php echo get_theme_mod('displayphoneno'); ?>" ><?php echo get_theme_mod('phoneno'); ?></a></p>
                <p class="email"><a href="mailto:<?php echo get_theme_mod('email'); ?>"><?php echo get_theme_mod('email'); ?></a></p>
            </div>
            <div class="col-sm-3 footer-col">
                <ul>
                    <li><?php dynamic_sidebar('sidebar-2'); ?></li>
                </ul>
            </div>
            <div class="col-sm-3 footer-col">
                <ul>
                    <li><?php dynamic_sidebar('sidebar-3'); ?></li>
                </ul>
            </div>
            <div class="col-sm-3 footer-col">
                <ul>
                    <li><?php dynamic_sidebar('serviceinfo'); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="mobile-footer" class="visible-xs">
    <div class="mobile-site-info">
        <div class="footer-logo">        <?php the_custom_logo(); ?></div>
        <p class="phone"><a href="tel:<?php echo get_theme_mod('displayphoneno'); ?>" ><?php echo get_theme_mod('phoneno'); ?></a></p>
        <p class="email"><a href="mailto:<?php echo get_theme_mod('email'); ?>"><?php echo get_theme_mod('email'); ?></a></p>  
    </div>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading collapsed animateit" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h4 class="panel-title ">
                    Checks
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading collapsed animateit" role="tab" id="headingTwo"  data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h4 class="panel-title">
                    Help & Services
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <?php dynamic_sidebar('sidebar-3'); ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading collapsed animateit" role="tab" id="headingThree" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <h4 class="panel-title">
                    Service Links
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <?php dynamic_sidebar('serviceinfo'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--bottom footer-->
<div id="bottom-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p><?php echo get_theme_mod('copyright'); ?></p>
            </div>
            <div class='scrolltop'>
                <div class='scroll icon'><i class="fa fa-angle-double-up" aria-hidden="true"></i></div>
            </div>
        </div>
    </div>
</div>
</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>
<script>
    (function ($) {
        $(".colorbox-iframe").hide();
        $('.tm-element-ul-radio.element_49.cse-top-right.accordion-cse-tr-ul').each(function () {
            var me = $(this);
            me.html(me.html().replace(/^(\w+)/, '<span>$1</span>'));
        });
        if ($(window).width() <= 768) {
            $(document).ready(function () {
                //             $(".radio_image").removeClass("tm-tooltip");
//                $(".choose-color ul li.tmhexcolorimage-li-nowh label").attr("data-toggle", "popover").attr("title", "Popover Header");
//                $('[data-toggle="tooltip"]').tooltip({
//                    trigger: 'hover'
//                });
            });
        }
//        $('.product-slider').owlCarousel({
//            loop: true,
//            margin: 10,
//            nav: false,
//            responsive: {
//                0: {
//                    items: 1
//                },
//                600: {
//                    items: 2
//                },
//                1000: {
//                    items: 5
//                }
//            }
//        });
        $('.product-slider').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
        if (isMobile()) {
            $(".choose-color-radio-div").find('li').click(function () {
                $(".choose-color-radio-div").find('li').removeClass("tc-active");
                $(".choose-color-radio-div").find('li').children("label").removeClass("cfm-active-tab");
                $(".choose-color-radio-div").find('input.choose-color-radio').prop('checked', false);
                $('.cfm-custom-background').val('');
                $('.cfm-custom-background-div').find('.tm-filename').hide();
                $(this).addClass("tc-active");
                $(this).children("label").addClass("cfm-active-tab");
                $(this).find('input.choose-color-radio').prop('checked', true);       
            });
        }
    }(jQuery));
</script>
<?php if(is_product()){
        if(get_field('rush_service_enabled') == 'no'){


?>
<script>
 /**
  *  Service Delivery method
  **/
    jQuery('.service-delivery-radio-ul li:nth(1)').prepend('<span id="service-warning">Rush Service is currently unavailable</span>');
    jQuery('.service-delivery-radio-ul li').not('.service-delivery-radio-ul li:nth(0)').addClass('disabled-radio');
</script>
<?php 
        }else{
?>
<script>
 /**
  *  Service Delivery method
  **/
    jQuery('.service-delivery-radio-ul li:nth(1)').prepend('<span id="service-warning">Rush Service</span>');
</script>

<?php 
        }
}
?>
<!--Modal Rush Service-->
<!-- Modal -->
<div class="modal fade cfm-bs-modal" id="ratesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-default btn-cfm-modal close" data-dismiss="modal" aria-label="Close"> Close <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ratesModalLabel">Shipping Rates</h4>
            </div>
            <div class="modal-body">
                <?php show_post('popup/shipping-rates') ?>
            </div>
        </div>
    </div>
</div>
<!--End Modal Service-->
<!--Modal Rush Service-->
<!-- Modal -->
<div class="modal fade cfm-bs-modal" id="rushServiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-default btn-cfm-modal close" data-dismiss="modal" aria-label="Close"> Close <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="rushServiceModalLabel">Rush Service</h4>
            </div>
            <div class="modal-body">
                <?php show_post('popup/extra-rush-services') ?>
            </div>
        </div>
    </div>
</div>

<?php if (isset($_GET['reorder']) && $_GET['reorder'] == 1) { ?>
    <script>
        jQuery('document').ready(function () {
            jQuery('#button-reorder').trigger('click');
        });

    </script>

<?php } ?>
<!--End Modal Service-->


<script>
var imageApiUrl = '<?php echo get_permalink(get_theme_mod('api_page')); ?>';
</script>
</body>
</html>
