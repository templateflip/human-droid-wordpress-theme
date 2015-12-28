<?php
/*
	HumanDroid Social Profile Widget

	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html

	Copyright: (c) 2013 Kanishk Kunal - http://kanishkkunal.in

		@package human-droid
		@version 1.0
*/

class HumanDroid_SocialWidget extends WP_Widget {
	var $defaults;

/*  Constructor
/* ------------------------------------ */
	function __construct() {
		parent::__construct( false, 'HumanDroid Social Profile', array('description' => __('Displays your Social profile', 'human-droid'), 'classname' => 'widget_human_droid_social') );;

		$this->defaults = array(
			'name' => '',
			'tagline' => '',
			'localtion' => ''
		);
	}

/*  Widget
/* ------------------------------------ */
	public function widget($args, $instance) {
		extract( $args );
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $before_widget;

		$title = apply_filters( 'widget_title', $instance['title'] );

		if ( !empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
		?>
		<div class="tm-social-profile uk-panel uk-panel-box uk-text-center">
        <img class="uk-border-circle" width="120" height="120" src="http://2.gravatar.com/avatar/bb9bf20fb6f55b4af10b0f98c540075f?s=192&d=mm&r=g" alt="">
        <h3 class="tm-profile-name">Kanishk Kunal</h3>
        <p class="tm-profile-desc uk-text-muted">Developer - Blogger - Techie</p>
        <p class="tm-profile-loc uk-text-muted uk-text-small"><i class="uk-icon-map-marker"></i>Delhi, India</p>
				<hr>
				<a href="" class="uk-icon-hover uk-icon-small uk-icon-github"></a>
				<a href="" class="uk-icon-hover uk-icon-small uk-icon-twitter"></a>
				<a href="" class="uk-icon-hover uk-icon-small uk-icon-linkedin"></a>
				<a href="" class="uk-icon-hover uk-icon-small uk-icon-rss"></a>
    </div>


		<?php
		echo $after_widget;
	}

/*  Widget update
/* ------------------------------------ */
	public function update($new,$old) {
		$instance = $old;
		$instance['title'] = esc_attr($new['title']);
		return $instance;
	}

/*  Widget form
/* ------------------------------------ */
	public function form($instance) {
		// Default widget settings
		$defaults = array(
			'title' 			=> '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
?>

	<div class="human-droid-options-social">
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance["title"]); ?>" />
		</p>
	</div>
<?php

}

}
