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

// Force one column layout.
add_filter( 'beans_layout', 'beans_child_force_layout' );

function beans_child_force_layout() {

    return 'c';

}

// Setup document fragements, markups and attributes
beans_add_smart_action( 'wp', 'human_droid_setup_document' );

function human_droid_setup_document() {

}

// Add footer content (filter)
beans_add_smart_action( 'beans_footer_credit_right_text_output', 'human_droid_footer' );

function human_droid_footer() { ?>

  <a href="http://themes.kanishkkunal.in/human-droid/" target="_blank" title="HumanDroid theme for WordPress">HumanDroid</a> theme for <a href="http://wordpress.org" target="_blank">WordPress</a>. Built-with <a href="http://www.getbeans.io/" title="Beans Framework for WordPress" target="_blank">Beans</a>.

<?php }
