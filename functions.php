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

	// Enuque uikit overlay component
	beans_uikit_enqueue_components( array( 'overlay' ) );

	// Add the theme style as a uikit fragment to have access to all the variables
	beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/assets/less/style.less', 'less' );

}


//Setup Theme
beans_add_smart_action( 'init', 'human_droid_init' );

function human_droid_init() {

	// Remove page post type comment support
	remove_post_type_support( 'page', 'comments' );
	// Register additional menus, we already have a Primary menu registered
	register_nav_menu('social-menu', __( 'Social Menu', 'human-droid'));
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

	//Post meta
	beans_add_attribute( 'beans_post_meta_author', 'class', 'uk-text-muted' );
	beans_add_attribute( 'beans_post_meta_date', 'class', 'uk-text-muted' );
	beans_add_attribute( 'beans_post_meta_comments', 'class', 'uk-text-muted' );

	if ( is_user_logged_in() && is_singular()) {
		beans_add_smart_action('beans_post_header_before_markup', 'human_droid_edit_link');
	}

	// Footer
	// Remove floats
	beans_remove_attribute('beans_footer_credit_left', 'class', 'uk-align-medium-left');
	beans_remove_attribute('beans_footer_credit_right', 'class', 'uk-align-medium-right');
	// Put right footer in it's own line
  beans_add_attribute('beans_footer_credit_right', 'class', 'uk-display-block');
	// Center align the whole thing
	beans_add_attribute('beans_footer_credit', 'class', 'uk-text-center');

}

function human_droid_edit_link() {
	if( !is_page_template('page_profile-page.php') ) {
		edit_post_link( __( 'Edit', 'human-droid' ), '<div class="uk-margin-bottom-small uk-text-small uk-align-right"><i class="uk-icon-pencil-square-o"></i> ', '</div>' );
	}
}

function human_droid_add_nav_menu_atts( $atts, $item, $args ) {
	//check if icon class is applied to menu and apply equivalen uk-icon to nav menu link
	if(count($item->classes) >= 1) {
		if(substr($item->classes[0], 0, 5) === "icon-") {
			$atts['class'] = $atts['class'].' uk-'.$item->classes[0];
		}
	}
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'human_droid_add_nav_menu_atts', 10, 4);

// Modify beans post meta items (filter)
beans_add_smart_action( 'beans_post_meta_items', 'human_droid_post_meta_items' );

function human_droid_post_meta_items( $items ) {

	// Move meta positions
	$items['author'] = 1;
  $items['date'] = 2;

	return $items;

}

// Modify the footer credit left text.
add_filter( 'beans_footer_credit_text_output', 'human_droid_footer_left' );

function human_droid_footer_left() {

	return '© <a href="'.get_site_url().'">'.get_bloginfo( 'name' ).'</a>';

}

// Modify the footer credit right text.
beans_add_smart_action( 'beans_footer_credit_right_text_output', 'human_droid_footer_right' );

function human_droid_footer_right() { ?>

  <a href="http://themes.kanishkkunal.in/human-droid/" target="_blank" title="HumanDroid theme for WordPress">HumanDroid</a> theme for <a href="http://wordpress.org" target="_blank">WordPress</a>. Built-with <a href="http://www.getbeans.io/" title="Beans Framework for WordPress" target="_blank">Beans</a>.

<?php }
