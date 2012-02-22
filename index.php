<?php get_header(); ?>
<div id="wrapper" class="css">
	<div id="content" class="blogposts">
	
		<?php if (have_posts()) : ?>
		
			<?php getBreadcrumbs(); ?>

			<?php while (have_posts()) : the_post(); ?>
				
			<article class="post single" id="post-<?php the_ID(); ?>">
				<header class="entry-header">
					<h1 class="entry-title"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h1>
					<div class="entry-meta">
						By <?php the_author_posts_link(); ?> on <strong><?php the_time('F j, Y') ?></strong> at <?php the_time() ?>. <?php comments_popup_link( 'No Comments', '1 Comment', '% Comments', 'comments-link', ''); ?>
					</div>
				</header>
		
				<div class="entry-content">
					<?php if ( has_post_thumbnail() && !empty($pmprot_options['featured_images']) ) { ?>
						<div class="feat-thumb">
							<?php the_post_thumbnail( 'thumbnail' ); ?>
						</div>
					<?php } ?>
										
					<?php 
						if ( !empty($pmprot_options['index_full_content']) ) 
						{ 
							the_excerpt('<p class="serif">Read the rest of this entry &raquo;</p>'); 
						}
						else
						{
							the_content();
						}
					?>
		
					<?php wp_link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
					<div class="clear"></div>
				</div> <!-- end posttext -->
		
				<footer class="entry-meta">
					<?php
						/* translators: used between list items, there is a space after the comma */
						$tag_list = get_the_tag_list( '', __( ', ') );
						if ( '' != $tag_list ) {
							$utility_text = __( 'Posted in %1$s. Tagged %2$s');
						} else {
							$utility_text = __( 'Posted in %1$s');
						}
						printf(
							$utility_text,
							/* translators: used between list items, there is a space after the comma */
							get_the_category_list( __( ', ') ),
							$tag_list,
							esc_url( get_permalink() ),
							the_title_attribute( 'echo=0' )
						);
						edit_post_link('Edit this entry','. ','.');
					?>							
				</footer>								
			</article> <!-- end article -->	
	
			<?php endwhile; ?>

			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
				<div class="clear"></div>
			</div> <!-- end navigation -->
		
			<?php endif; ?>
		
			<div class="clear"></div>
	
		</div> <!-- end content -->
	
		<?php get_sidebar(); ?>
	
		<div class="clear"></div>
		
	</div> <!-- end wrapper -->
	
<?php get_footer(); ?>