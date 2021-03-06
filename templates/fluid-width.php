<?php
/**
Template Name: Fluid Width
**/
get_header(); ?>
	<div id="primary" class="content-area">
		<?php do_action('before_main'); ?>
		<main id="main" class="site-main" role="main">
			<?php do_action('before_loop'); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>				
			<?php endwhile; // end of the loop. ?>
			<?php do_action('after_loop'); ?>
		</main><!-- #main -->
		<?php do_action('after_main'); ?>
	</div><!-- #primary -->
<?php get_footer(); ?>
