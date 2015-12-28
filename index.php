<?php
// Setup human-droid
beans_add_smart_action( 'beans_before_load_document', 'human_droid_index_setup_document' );

function human_droid_index_setup_document() {

	// Posts grid
	beans_add_attribute( 'beans_content', 'class', 'tm-posts-grid' );
	beans_wrap_inner_markup( 'beans_post', 'human_droid_post_panel', 'div', array(
	  'class' => 'uk-panel uk-panel-box'
	) );

	// Post content
	beans_remove_attribute( 'beans_content', 'class', 'tm-centered-content' );

	// Post article
	beans_remove_attribute( 'beans_post', 'class', 'uk-article' );

	// Post meta
	beans_remove_action( 'beans_post_meta_tags' );

	// Post image
	beans_modify_action( 'beans_post_image', 'beans_post_header_before_markup', 'beans_post_image' );

	// Post title
	beans_add_attribute( 'beans_post_title', 'class', 'uk-margin-small-top uk-h2' );

	// Post more link
	beans_add_attribute( 'beans_post_more_link', 'class', 'uk-button uk-button-primary uk-button-small' );

	// Posts pagination
	beans_modify_action_hook( 'beans_posts_pagination', 'beans_content_after_markup' );

}


/* Helpers and utility functions */
require_once 'include/helpers.php';

// Auto generate summary of Post content and read more button
beans_add_smart_action( 'the_content', 'human_droid_post_content' );

function human_droid_post_content( $content ) {

    $output = beans_open_markup( 'human_droid_post_content', 'p' );

    	$output .= beans_output( 'human_droid_post_content_summary', human_droid_get_excerpt( $content ) );

   	$output .= beans_close_markup( 'human_droid_post_content', 'p' );

		$output .= '<p>'.beans_post_more_link().'</p>';

   	return $output;

}

// Resize post image (filter)
beans_add_smart_action( 'beans_edit_post_image_args', 'human_droid_index_post_image_args' );

function human_droid_index_post_image_args( $args ) {

	$args['resize'] = array( 756, 320, true );

	return $args;

}
// Load beans document
beans_load_document();
