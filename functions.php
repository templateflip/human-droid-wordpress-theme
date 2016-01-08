<?php

// Include Beans
require_once( get_template_directory() . '/lib/init.php' );

/* Helpers and utility functions */
require_once 'include/helpers.php';

// Remove Beans Default Styling
remove_theme_support( 'beans-default-styling' );


// Enqueue uikit assets
beans_add_smart_action( 'beans_uikit_enqueue_scripts', 'human_droid_enqueue_uikit_assets', 5 );

function human_droid_enqueue_uikit_assets() {

	// Enqueue uikit overwrite theme folder
	beans_uikit_enqueue_theme( 'human-droid', get_stylesheet_directory_uri() . '/assets/less/uikit' );

	// Add the theme style as a uikit fragment to have access to all the variables
	beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/assets/less/style.less', 'less' );

}


//Setup Theme
beans_add_smart_action( 'init', 'human_droid_init' );

function human_droid_init() {

	// Remove page post type comment support
	remove_post_type_support( 'page', 'comments' );
}


// Default one column layout.
add_filter( 'beans_default_layout', 'human_droid_default_layout' );

function human_droid_default_layout() {

    return 'c';

}

// Setup document fragements, markups and attributes
beans_add_smart_action( 'wp', 'human_droid_setup_document' );

function human_droid_setup_document() {
	// Remove the site title and site title tag.
	beans_remove_action( 'beans_site_branding' );

	// Navigation menu
	// Remove default styling and uk-navbar properties
  beans_remove_attribute( 'beans_primary_menu', 'class', 'uk-navbar' );
	beans_remove_attribute( 'beans_primary_menu', 'class', 'uk-float-right' );
  beans_remove_attribute('beans_menu[_navbar][_primary]', 'class', 'uk-navbar-nav');
	beans_remove_attribute('beans_menu[_navbar][_primary]', 'class', 'uk-visible-large ');
	//Remove offcanvas menu
	beans_remove_action('beans_primary_menu_offcanvas_button');

	// Remove Breadcrumb
	beans_remove_action( 'beans_breadcrumb' );

	//Enclose main content in panel
	beans_remove_attribute('beans_main_grid', 'class', 'uk-grid');
	beans_add_attribute('beans_main_grid', 'class', 'uk-panel uk-panel-box uk-panel-space');

	// Footer
	// Remove floats
	beans_remove_attribute('beans_footer_credit_left', 'class', 'uk-align-medium-left');
	beans_remove_attribute('beans_footer_credit_right', 'class', 'uk-align-medium-right');
	// Put right footer in it's own line
  beans_add_attribute('beans_footer_credit_right', 'class', 'uk-display-block');
	// Center align the whole thing
	beans_add_attribute('beans_footer_credit', 'class', 'uk-text-center');

}

// Add footer content (filter)
beans_add_smart_action( 'beans_footer_credit_right_text_output', 'human_droid_footer' );

function human_droid_footer() { ?>

  <a href="http://themes.kanishkkunal.in/human-droid/" target="_blank" title="HumanDroid theme for WordPress">HumanDroid</a> theme for <a href="http://wordpress.org" target="_blank">WordPress</a>. Built-with <a href="http://www.getbeans.io/" title="Beans Framework for WordPress" target="_blank">Beans</a>.

<?php }
