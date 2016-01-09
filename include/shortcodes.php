<?php

/* ------------------------------------------------------------------------- */
/*  Behance Feed
/* ------------------------------------ */
	function human_droid_behance_feed_shortcode( $atts ) {
    $behance_key = get_theme_mod( 'human_droid_behance_api_key', '' );

    if(empty($behance_key)) {
      return "Please set Behance API key in Appearance->Customize->Custom Code.";
    }

    $a = shortcode_atts( array(
        'id' => ''
    ), $atts );

    if(empty($a['id'])) {
      return "Please enter Behance id in shortcode parameter.";
    }

    ob_start();
	?>
  <div id="portfolio" class="portfolio-area clearfix">
    <script id="portfolio-template" type="text/x-handlebars-template">
    		<ul class="portfolio-list clearfix">
    			{{#each projects}}
    			<li class="portfolio-item">
    				<div class="portfolio-content">
    					<figure class="portfolio-cover" title="{{this.name}}" data-project-id="{{this.id}}">
                            <a href="{{this.url}}" target="blank">
    						{{#if this.covers.[404]}}
    						<img class="portfolio-image" src="{{this.covers.[404]}}" alt="">
    						{{else}}
    							{{#if this.covers.[230]}}
    							<img class="portfolio-image" src="{{this.covers.[230]}}" alt="">
    							{{else}}
    							<img class="portfolio-image" src="{{this.covers.[202]}}" alt="">
    							{{/if}}
    						{{/if}}
                            </a>
    					</figure>
    					<h2 class="portfolio-title"><a href="{{this.url}}" target="blank">{{this.name}}</a></h2>
    					<div class="portfolio-fields">
    						<ul class="field-list">
    						{{#each this.fields}}
    							<li class="field-item">{{this}}</li>
    						{{/each}}
    						</ul>
    					</div>
    				</div>
    			</li>
    			{{/each}}
    		</ul>
  		</script>
    </div>
    <?php

    $output = ob_get_clean();

    $output .= "<script>
        var apiKey = '{$behance_key}';
        var userID = '{$a['id']}';
    </script>";
		return $output;
	}

  add_shortcode('behance-feed','human_droid_behance_feed_shortcode');
