<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
    <head>
        
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'twentyseventeen'); ?></a>
            <header id="masthead" class="site-header" role="banner">
                <section class="top-nav">
                    <div class="container">
                        <div class="row">
                            <div class="top-links visible-xs">

                                <?php
                                if (has_nav_menu('social')) :
                                    ?>
                                    <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e('Footer Social Links Menu', 'twentyseventeen'); ?>">
                                        <?php
                                        wp_nav_menu(
                                                array(
                                                    'theme_location' => 'social',
                                                    'menu_class' => 'top-links-right',
                                                    'depth' => 1,
                                                    'link_before' => '',
                                                    'link_after' => '',
                                                )
                                        );
                                        ?>
                                 </nav><!-- .social-navigation -->
                                <?php endif;
                                ?>
                                <!--</ul>-->
                                
                            </div>
                        </div>
                        <div class="row logo-menu">
                            <div class="col-md-5 top-left">
                                <div class="navbar-header">
                                    <?php the_custom_logo(); ?>
                                </div>
                            </div>
                            <div class="col-md-7 top-right">
                                <div class="top-links hidden-xs">
                                    <?php
                                    if (has_nav_menu('social')) :
                                        ?>
                                        <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e('Footer Social Links Menu', 'twentyseventeen'); ?>">
                                            <?php
                                            wp_nav_menu(
                                                    array(
                                                        'theme_location' => 'social',
                                                        'menu_class' => 'top-links-right',
                                                        'depth' => 1,
                                                        'link_before' => '',
                                                        'link_after' => '',
                                                    )
                                            );
                                            ?>
                                        </nav><!-- .social-navigation -->
                                    <?php endif;
                                    ?>

                                </div>
                                <!--main-nav-->

                                <a class="cart-mobile" href="http://development.dexterousteam.com/checksforme/cart/"><i class="fa fa-shopping-cart"></i></a> 
                                <nav class="navbar navbar-expand-md"  id="navigation">
                                    <button class="navbar-toggler" type="button" style="display:none" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"><span></span><span></span><span></span></span> </button>
                                    <?php if (has_nav_menu('top')) : ?>
                                        <?php get_template_part('template-parts/navigation/navigation', 'top'); ?>
                                    <?php endif; ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>
            </header><!-- #masthead -->
            <?php
            /*
             * If a regular post or page, and not the front page, show the featured image.
             * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
             */
            if (( is_single() || ( is_page() && !twentyseventeen_is_frontpage() ) ) && has_post_thumbnail(get_queried_object_id())) :
                echo '<div class="single-featured-image-header">';
                echo get_the_post_thumbnail(get_queried_object_id(), 'twentyseventeen-featured-image');
                echo '</div><!-- .single-featured-image-header -->';
            endif;
            ?>
            <header id="home">
            </header>
            <?php if (is_front_page()) { ?>
                <div class="slider-home">
                    <?php echo do_shortcode('[rev_slider alias="Home Page Slider"]'); ?>  
                </div>
                <div class="slider-mobile">
                    <div class="bannermob">
                        <h3><?php the_field('b_title'); ?></h3>
                        <h2><?php the_field('b_subtitle'); ?></h2>
                        <p><?php the_field('b_tagline'); ?></p>
                    </div>  
                    <div class="buttonpart">
                        <a href="<?php the_field('order_now_button_link') ?>"><?php the_field('order_now_button_text') ?></a>
                    </div>
                    <div class="sticker"><p><?php the_field('save_tagline'); ?></p></div>
                </div>
                <!--slider-end-->
            <?php }
            ?>
