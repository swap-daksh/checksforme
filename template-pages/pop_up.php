<?php
/*
  Template Name: CFM Popup
 */
?><?php if (@$_GET['popup']) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Bootstrap Example</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </head>
        <body>
        <?php } else { ?>
            <?php get_header(); ?>
        <?php } ?>
        <div class="container">
            <main id="main" class="site-main" role="main">

                <?php
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/page/content', 'page');

                endwhile; // End of the loop.
                ?>

            </main><!-- #main -->
        </div>
        <?php if (@$_GET['popup']) { ?>
        </body>
    </html>  <?php } else { ?>
    <?php get_footer(); ?>
<?php } ?>