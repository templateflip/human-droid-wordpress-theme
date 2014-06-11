<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Publishr
 */
?>
            </div><!--col-->    
        </div><!-- #content -->
        <div id="sidebar-content" class="col-md-4 col-sm-4">
            <div id="primary-sidebar" class="sidebar widget-area" role="complementary">
                <div class="">
		            <?php do_action( 'before_sidebar' ); ?>
                    <?php dynamic_sidebar( 'primary-sidebar' ) ?>
                </div>
	        </div><!-- #footer -->
        </div>
    </div><!--row-->
</div><!--Container-->
<div id="above-footer" class="widget-area">
    <?php dynamic_sidebar( 'above-footer' ) ?>
</div>
<div id="secondary" class="widget-area" role="complementary">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <?php dynamic_sidebar( 'footer-1' ) ?>
            </div>
            <div class="col-sm-4">
                <?php dynamic_sidebar( 'footer-2' ) ?>
            </div>
            <div class="col-sm-4">
                <?php dynamic_sidebar( 'footer-3' ) ?>
            </div>
        </div>
    </div>
</div><!-- #secondary -->
