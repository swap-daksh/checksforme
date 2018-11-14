<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header();
?>
<!--slider-->
<section class="selling-checks"> 
    <div class="container">
        <div class="row">
            <div class="section-heading"> <h2> <?php the_field('best_selling_heading'); ?></h2></div>
            <p> <?php the_field('best_selling_sub_heading'); ?></p>
        </div>
        <div class="row product-slider owl-carousel owl-theme" > 
            <?php
            $args = array('post_type' => 'product', 'posts_per_page' => 5, 'product_cat' => 'order-checks', 'orderby' => 'id','order'=>'asc');
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
                global $product;
                ?>
                <div class="check-boxs"> 
                    <a title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>" href="<?php echo get_permalink($loop->post->ID) ?>"> <?php
                        if (has_post_thumbnail($loop->post->ID))
                            echo get_the_post_thumbnail($loop->post->ID, 'medium');
                        else
                            echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="' . esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID) . '" />';
                        ?></a> 
                    <h4> <?php the_title(); ?> </h4>
                    <p> Starts at <span><?php echo $product->get_price_html(); ?> </span> </p>
                    <div class="mobile-viewmore"> <a class="btn view" href="<?php echo get_permalink($loop->post->ID); ?>">View More</a></div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        </div>
    </div>
</section>
<section class="our-featured-services">
  <div class="container">
      <div class="row">
       <div class="ofs-heading"><?php the_field('ofs_heading'); ?></div>
       <div class="section-heading"> <h2> <?php the_field('ofs_sub_title'); ?></h2></div>
         <span><?php the_field('ofs_description',false,false); ?></span>
       </div>
  </div>
</section>
<?php
get_footer();
