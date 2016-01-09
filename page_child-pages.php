<?php /* Template Name: Child Page Template */


add_action('beans_primary_before_markup', 'human_droid_display_child_pages_menu');

function human_droid_display_child_pages_menu() {
  $childpages = get_pages( array( 'child_of' => wp_get_post_parent_id( get_the_ID()), 'sort_column' => 'menu_order'  ) );

  if(count($childpages) > 1) {
    echo '<div class="tm-ghost-button-group" style="width:100%;">';
    $width = 100.0 / count($childpages);
    foreach( $childpages as $page ) {
      $page_class = "primary-ghost-button";
      if( $page->ID ==  get_the_ID() ) {
        $page_class = "primary-ghost-button primary-ghost-button-active";
      }
  	?>
  		<a class="uk-button uk-button-large <?php echo $page_class; ?>" style="width:<?php echo $width; ?>%" href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a>
  	<?php
  	}
    echo '</div>';
  }

}

// Load beans document
beans_load_document();
