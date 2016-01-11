<?php /* Template Name: Profile Page Template */

beans_add_smart_action( 'beans_before_load_document', 'human_droid_profile_setup_document' );

function human_droid_profile_setup_document() {
  beans_remove_attribute('beans_main_grid', 'class', 'uk-panel uk-panel-box uk-panel-space');

  beans_add_attribute('beans_post', 'class', 'tm-profile-main uk-overlay');

  beans_add_attribute('beans_post_header', 'class', 'uk-overlay-panel');

  //Add an overlay panel only if image is larger than full width
  $tn_id = get_post_thumbnail_id( get_the_ID() );
  $img = wp_get_attachment_image_src( $tn_id, 'full' );
  $width = $img[1];
  if($width >= 830) {
    beans_add_attribute('beans_post_header', 'class', 'uk-overlay-background');
  }
  else {
    beans_add_attribute('beans_post_header', 'class', 'tm-light-background');
    beans_add_attribute('beans_post_image', 'class', 'tm-light-background');
  }
}

beans_add_smart_action('beans_post_header_prepend_markup', 'human_droid_profile_header');

function human_droid_profile_header() {
  echo '<div class="tm-profile-name">';
    echo '<h1>'.get_bloginfo( 'name' ).'</h1>';
    echo '<h2>'.get_bloginfo( 'description' ).'</h2>';
  echo '</div>';
  wp_nav_menu( array( 'theme_location' => 'social-menu',
											'container' => 'div',
	 										'container_class' => 'tm-social-menu',
											'menu_class' => '',
                      'fallback_cb' => 'false'
										));
}

// Resize featured image (filter)
beans_add_smart_action( 'beans_edit_post_image_args', 'human_droid_profile_image_args' );

function human_droid_profile_image_args( $args ) {

	$args['resize'] = array( 830, 430, true ); //430, 250

	return $args;
}


// Load beans document
beans_load_document();
