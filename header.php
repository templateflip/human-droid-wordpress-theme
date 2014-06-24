<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package HumanDroid
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<a id="top" href="#content" class="sr-only">Skip to main content</a>
<div id="page" class="hfeed site">
    
    <?php do_action( 'before' ); ?>
      <div id="topbar">
        <?php if (has_nav_menu('primary')): ?>
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand" href="<?php echo home_url(); ?>" rel="home">
                            <h1 class="brand-text-h1"><?php bloginfo('name') ?></h1>
                        </a>
                    </div>
                    
                    <div class="navbar-collapse collapse">
                        
                        <?php
                            wp_nav_menu( array(
                                'menu'              => 'primary',
                                'theme_location'    => 'primary',
                                'depth'             => 2,
                                'container'         => 'div',
                                'container_class'   => '',
                                'menu_class'        => 'nav navbar-nav navbar-right',
                                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                'walker'            => new wp_bootstrap_navwalker())
                            );
                        ?>
                    </div>
                </div>
            </nav>
		<?php endif; ?>
    </div>
	<div class="<?php echo ( is_page_template( 'home-page.php' ) ) ? '' : 'container' ;?>">
        <div class="<?php echo ( is_page_template( 'home-page.php' ) ) ? '' : 'row' ;?>">
            <div id="content" class="<?php echo ( is_page_template( 'home-page.php' ) ) ? '' : 'col-md-8' ;?>">                    
	            <div class="site-content">
