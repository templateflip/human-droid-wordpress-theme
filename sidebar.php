<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package HumanDroid
 */
?>
            </div><!--col-->    
        </div><!-- #content -->
        <?php if ( !is_page_template( 'home-page.php' ) ) : ?>
        <div id="sidebar-content" class="col-md-4 col-sm-4">
            <div id="primary-sidebar" class="sidebar widget-area" role="complementary">
                <div class="">
		            <?php do_action( 'before_sidebar' ); ?>
                    <?php dynamic_sidebar( 'primary-sidebar' ) ?>
                </div>
	        </div><!-- #footer -->
        </div>
        <?php endif; ?>
    </div><!--row-->
</div><!--Container-->
<div id="above-footer" class="widget-area">
    <?php dynamic_sidebar( 'above-footer' ) ?>
</div>
