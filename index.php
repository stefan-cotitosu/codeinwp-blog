<?php
/**
 * The main template file
 *
 * @package CWP
 */
get_header(); ?>
		<main id="content" role="main">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );  ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<div class="metadata">
					<?php cwp_entry_meta_release(); ?>
					<?php comments_number( '- No Comments', '- One Comment', '- % Comments' ); ?>
				</div><!--/metadata-->
				<?php
    				$get_permalink = get_permalink();
					if ($featured_image_url != NULL) : ?>
						<?php echo '<a href="' . $get_permalink . '" class="image"><img src="' . $featured_image_url . '" /></a>'; ?>
					     
				<?php endif; ?>

				<div class="excerpt">
					<?php the_content(); ?>
				</div><!--/excerpt-->
			</div><!--/post-->
			<?php endwhile; ?>

			<?php cwp_kriesi_pagination(); ?>

		<?php else : ?>
		    <?php _e( 'No posts to display', 'cwp' ); ?>
		<?php endif; // end have_posts() check ?>
		</main><!--/content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>