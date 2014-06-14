<?php
/**
 * The template for displaying search forms in HumanDroid
 *
 * @package HumanDroid
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'human-droid' ); ?></span>
        <input type="text" class="search form-control" name="s" onblur="if(this.value=='')this.value='<?php _e('Search','human-droid'); ?>';" onfocus="if(this.value=='<?php _e('Search','human-droid'); ?>')this.value='';" value="<?php _e('Search','human-droid'); ?>" />
	</div>
</form>
