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
        'id' => '',
				'items' => '9'
    ), $atts );

    if(empty($a['id'])) {
      return "Please enter Behance id in shortcode parameter.";
    }

    ob_start();
	?>
  <div id="portfolio">
    <script id="portfolio-template" type="text/x-handlebars-template">
    		<div class="portfolio-list uk-grid">
    			{{#each projects}}
    			<div class="portfolio-item uk-width-medium-1-3 uk-width-small-1-2">
    				<div class="portfolio-content">
    					<figure class="uk-thumbnail" title="{{this.name}}" data-project-id="{{this.id}}">
                            <a href="{{this.url}}" target="blank">
    						{{#if this.covers.[404]}}
    						<img class="portfolio-image" src="{{this.covers.[404]}}" alt="{{this.name}}">
    						{{else}}
    							{{#if this.covers.[230]}}
    							<img class="portfolio-image" src="{{this.covers.[230]}}" alt="{{this.name}}">
    							{{else}}
    							<img class="portfolio-image" src="{{this.covers.[202]}}" alt="{{this.name}}">
    							{{/if}}
    						{{/if}}
                            </a>
                  <figcaption class="uk-thumbnail-caption">
                    <a href="{{this.url}}" target="blank">{{this.name}}</a>
                  </figcaption>
    					</figure>
    				</div>
    			</div>
    			{{/each}}
    		</div>
  		</script>
    </div>
    <?php

    $output = ob_get_clean();

    $output .= "<script>
        var apiKey = '{$behance_key}';
        var userID = '{$a['id']}';
		    var perPage = '{$a['items']}';
    </script>";

		ob_start();
		?>
		<script>
		(function($) {
		$(document).ready(function () {
		    //credit: http://creatiface.github.io/personal-portfolio/
		    (function () {
		        var behanceProjectAPI = 'https://www.behance.net/v2/users/' + userID + '/projects?callback=?&api_key=' + apiKey + '&per_page=' + perPage;

		        function setPortfolioTemplate() {
		            var projectData = JSON.parse(sessionStorage.getItem('behanceProject')),
						getTemplate = $('#portfolio-template').html(),
						template = Handlebars.compile(getTemplate),
						result = template(projectData);
		            $('#portfolio').html(result);
		        };

		        if (sessionStorage.getItem('behanceProject')) {
		            setPortfolioTemplate();
		        } else {
		            $.getJSON(behanceProjectAPI, function (project) {
		                var data = JSON.stringify(project);
		                console.log(data);
		                sessionStorage.setItem('behanceProject', data);
		                setPortfolioTemplate();
		            });
		        };
		    })();
		});
		})( jQuery );
		</script>
    <?php

    $output .= ob_get_clean();
		return $output;
	}

  add_shortcode('behance-feed','human_droid_behance_feed_shortcode');
