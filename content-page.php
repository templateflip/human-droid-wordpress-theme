<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package HumanDroid
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
     <?php if (the_title('', '', FALSE) != ''): ?>
	    <header class="page-header">
		    <h1 class="entry-title"><?php the_title(); ?></h1>
	    </header><!-- .entry-header -->
    <?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'human-droid' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<!--<?php edit_post_link( __( 'Edit', 'human-droid' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>-->
</article><!-- #post-## -->
