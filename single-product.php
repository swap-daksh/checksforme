<?php get_header(); ?>
	<div class="container">
	<div class="row">
		
		<div class="col-sm-12">
		

				<section id="blog">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content', 'single-product' );
						endwhile;
					endif;
					?>
				</section><!--/#blog-->
				<section id="product-sticky-stop"></section>
			</div><!--/.col-sm-7-->

			
		</div><!--/.row-->
	</div><!--/.container-->
<?php get_footer(); ?>