<?php
/*   
 Template Name:Contact Us 
*/
?>
<?php get_header(); ?>
<div class="container">
<br/><br/>
<div class="row">
 <div class="col-md-6 contact-left">
 <h2><?php the_title();?></h2><br/>
 <?php echo do_shortcode( '[contact-form-7 id="119" title="Contact Us"]' ); ?>
 <br/><br/>
 </div>
 
 <div class="col-md-6 contact-right">
   
  <h2> <?php the_field('reach_us_title'); ?></h2>
   <ul> <li>
  <span class="a-heading"> <i class="fa fa-map-marker"></i>
   <strong> <?php the_field('address_title'); ?> </strong> </span>
   <span class="address-a"><?php the_field('address_content'); ?></span>
   </li>
   
   <li>
   <span class="a-heading">
   <i class="fa fa-phone"></i>
    <strong> <?php the_field('call_us_title'); ?></strong> </span>
   <span class="phone-a"><a href="tel:+ <?php the_field('call_us_content'); ?>"><?php the_field('call_us_content'); ?>/</a><a href="tel:+ <?php the_field('call_us_content_copy'); ?>"><?php the_field('call_us_content_copy'); ?></a></span>
   </li>
   
  <li> 
 <span class="a-heading">
 <i class="fa fa-envelope"></i>
  <strong> <?php the_field('email_title'); ?></strong></span>
   <span class="email-a"><a href="mailto:<?php the_field('email_content'); ?>"><?php the_field('email_content'); ?></a></span>
</li>
</ul>
 </div>
 
</div>
</div>

<?php get_footer(); ?>