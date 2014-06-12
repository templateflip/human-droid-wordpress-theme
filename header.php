<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Publishr
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
            <nav class="navbar navbar-default navbar-top" role="navigation">
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
                            <h1 class="brand-text-h1">
                            <?php if(ot_get_option('custom-image')) { ?>
                                    <img src="<?php echo ot_get_option('custom-image'); ?>" width="42px" height="42px" alt="<?php bloginfo('name') ?>" title="<?php bloginfo('name') ?>"/>
                            <?php      
                                  }
                            ?>
				                <span class="hidden-xs"><?php bloginfo('name') ?></span>
                            </h1>
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
     <?php if ( is_page_template( 'home-page.php' ) ) : ?>
        <header id="masthead" class="jumbotron site-header text-center" role="banner">
            <div class="container">
                <?php
			    $header_image = ot_get_option('custom-image') ? ot_get_option('custom-image') : developr_admin_gravatar();
                $header_class = ot_get_option('clip-image') ? '' : 'img-circle' ;
			    if ( ! empty( $header_image ) ) :
		        ?>
			        <a class="site-logo"  href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				        <img src="<?php echo $header_image; ?>" alt="Gravatar" class="<?php echo $header_class; ?>" width="120" height="120" />
			        </a>
		        <?php endif; ?>
		        <div class="site-branding text-center">
                
			            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php if ( !ot_get_option('site-description') ): ?><h2 class="site-description"><?php bloginfo( 'description' ); ?></h2><?php endif; ?>
		        </div>
            </div>
	    </header><!-- #masthead -->
    <?php endif; ?>
	<div class="container">
        <div class="row">
            <div id="content" class="<?php echo ( is_page_template( 'home-page.php' ) ) ? 'col-md-12' : 'col-md-8 col-sm-8' ;?>">                    
	            <div class="site-content">
