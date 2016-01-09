(function($) {
$(document).ready(function () {
    //credit: http://creatiface.github.io/personal-portfolio/
    (function () {
        var perPage = 9;
        var behanceProjectAPI = 'http://www.behance.net/v2/users/' + userID + '/projects?callback=?&api_key=' + apiKey + '&per_page=' + perPage;

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
