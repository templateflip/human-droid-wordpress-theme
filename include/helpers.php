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
