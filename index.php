<?php
// Setup index layout
beans_add_smart_action( 'beans_before_load_document', 'human_droid_index_setup_document' );

function human_droid_index_setup_document() {

	// Post meta
	beans_remove_action( 'beans_post_meta_tags' );
	beans_remove_action( 'beans_post_meta_categories' );

	// Post more link
	beans_add_attribute( 'beans_post_more_link', 'class', 'uk-button uk-button-primary uk-button-small uk-margin-bottom' );

}

// Modify the read more text.
add_filter( 'beans_post_more_link_text_output', 'huamn_droid_modify_read_more' );

function huamn_droid_modify_read_more() {

   return 'Read More';

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

// Load beans document
beans_load_document();
