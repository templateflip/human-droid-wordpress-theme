<?php
/*-----------------------------------------------------------------------------------*/
/*	Helpers and utils functions for theme use
/*-----------------------------------------------------------------------------------*/

/* Custom function to limit post content words */
if (!function_exists('human_droid_get_excerpt')):
    function human_droid_get_excerpt($content)
    {
        $excerpt = '';
        if (has_excerpt()) {
            $excerpt = get_the_excerpt();
        } else {
            $excerpt = strip_tags($content);
            if (!empty($excerpt)) {
                $excerpt = strtok($excerpt, "\n"); //first para

								if(strlen($excerpt) > 255) {
									  $excerpt = preg_replace('/\s+?(\S+)?$/', '', substr($excerpt, 0, 256)) . '…';
								}
            }
        }
        return $excerpt;
    }
endif;

/* Placeholder div */
if (!function_exists('human_droid_placeholder_img')):
    function human_droid_placeholder_img()
    {
        return '<span class="tm-placeholder-img uk-float-left uk-margin-right"><i class="uk-icon-circle-thin uk-icon-large"></i></span>';
    }
endif;

/* Custom function to get meta data for specific layout */
if (!function_exists('human_droid_get_meta_data')):
    function human_droid_get_meta_data($force_meta = false)
    {
        $output = '';
        //Check for sticky
        if (is_sticky()) {
            $output = $output .= '<div class="meta-item"><i class="fa fa-thumb-tack"></i>' . __('Sticky', 'human-droid') . '</div>';
        }
        //Check meta options
        if (!$force_meta) {
            if (is_single()) {
                $metas = human_droid_get_option('single_meta');
            } else {
                $metas = human_droid_get_option('meta');
            }
        } else {
            $metas = array(
                $force_meta
            );
        }
        if (!empty($metas)) {
            foreach ($metas as $meta_id) {
                $meta = '';
                switch ($meta_id) {
                    case 'date':
                        $meta = '<i class="fa fa-calendar"></i><span class="updated">' . get_the_date() . '</span>';
                        break;
                    case 'author':
                        $author_id = get_post_field('post_author', get_the_ID());
                        $meta      = '<i class="fa fa-user"></i><span class="vcard author"><span class="fn">' . __('by', 'human-droid') . ' <a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID', $author_id))) . '">' . get_the_author_meta('display_name', $author_id) . '</a></span></span>';
                        break;
                    case 'rtime':
                        $meta = human_droid_read_time(get_post_field('post_content', get_the_ID()));
                        if (!empty($meta)) {
                            $meta = '<i class="fa fa-clock-o"></i>' . $meta . ' ' . __('min read', 'human-droid');
                        }
                        break;
                    case 'comments':
                        if (comments_open() || get_comments_number()) {
                            ob_start();
                            comments_popup_link(__('Add Comment', 'human-droid'), __('1 Comment', 'human-droid'), __('% Comments', 'human-droid'));
                            $meta = '<i class="fa fa-comments-o"></i>' . ob_get_contents();
                            ob_end_clean();
                        } else {
                            $meta = '';
                        }
                        break;
                    default:
                        break;
                }
                if (!empty($meta)) {
                    $output .= '<div class="meta-item">' . $meta . '</div>';
                }
            }
        }
        return $output;
    }
endif;


/* 	Calculate reading time by content length */
if ( !function_exists( 'human_droid_read_time' ) ):
	function human_droid_read_time( $text ) {
		$words = str_word_count( strip_tags( $text ) );
		if ( !empty( $words ) ) {
			$time_in_minutes = ceil( $words / 200 );
			return $time_in_minutes;
		}
		return false;
	}
endif;
