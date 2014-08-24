<?php
/**
 * The Template for displaying all single posts.
 *
 * @package HumanDroid
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

            <?php if ( ot_get_option( 'post-nav' ) == 'content') { developr_post_nav(); } ?>

            <?php if ( get_the_author_meta( 'description' ) ): ?>
                <div class="author-bio">
				    <div class="bio-avatar pull-right"><?php echo get_avatar(get_the_author_meta('user_email'),'128'); ?></div>
                    <h4><strong>About the author</strong></h4>
				    <p class="bio-desc"><?php the_author_meta('description'); ?></p>
				    <div class="clear"></div>
                </div>
		    <?php endif; ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>