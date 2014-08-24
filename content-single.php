<?php
/**
 * @package HumanDroid
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <div class="page-header">
		    <h1 class="entry-title"><?php the_title(); ?></h1>
        </div>
        <div class="entry-meta">
		    
            
            <span class="pull-right"><i class="fa fa-comments-o hidden-xs"></i><a class="hidden-xs" href="<?php comments_link(); ?>"><?php comments_number( 'Leave a Reply', '1 Response', '% Responses' ); ?></a></span>
            <a href="<?php the_permalink(); ?>"><?php developr_posted_on(); ?></a>
            <?php edit_post_link( __( 'Edit', 'human-droid' ), '<span class="edit-link"><i class="fa fa-pencil"></i>', '</span>' ); ?>
	    </div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'human-droid' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
			<?php the_tags('<p class="post-tags"><span>'.__('TAGS:','human-droid').'</span> <span class="label label-default">','</span> <span class="label label-default">','</span></p>'); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
