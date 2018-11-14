<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <section id="archive-product-checks">
            
            <div class="row">
                    <div class="section-heading"> <h2> <?php single_cat_title(); ?></h2></div>
                    <p><?php echo category_description(); ?></p>
             </div>
                 
                <ul>
                    <?php
                    if (have_posts()) :
                        while (have_posts()) :
                            the_post();
                            get_template_part('template-parts/content', 'product');
                        endwhile;
                    endif;
                    ?></ul>

            </section><!--/#blog-->
            <section id="product-sticky-stop"></section>
        </div><!--/.col-sm-7-->


    </div><!--/.row-->
</div><!--/.container-->
<?php get_footer(); ?>