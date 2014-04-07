/* Author: 

*/

var currentPageTemplate;

$( document ).ready(function() {
	loadPageTemplate( "register-member" );
	
	
	// Sidebar menu navigation
	$(".add-member").click(function(e) {
		loadPageTemplate('add-member');
		e.preventDefault();
	});
	$(".confirm-attendance").click(function(e) {
		loadPageTemplate('confirm-attendance');
		e.preventDefault();
	});
	$(".register-member").click(function(e) {
		loadPageTemplate('register-member');
		e.preventDefault();
	});
	$(".registered-member-list").click(function(e) {
		loadPageTemplate('registered-member-list');
		e.preventDefault();
	});
	$(".confirmed-member-list").click(function(e) {
		loadPageTemplate('confirmed-member-list');
		e.preventDefault();
	});
	$(".visiting-member-list").click(function(e) {
		loadPageTemplate('visiting-member-list');
		e.preventDefault();
	});
	$(".member-list").click(function(e) {
		loadPageTemplate('member-list');
		e.preventDefault();
	});
});


function loadPageTemplate( pageTemplate ) {
	if ( pageTemplate != currentPageTemplate) {
		$("."+currentPageTemplate).removeClass("menu-selected");
		var response = $.ajax({
			type: "GET",
			url: "templates/" + pageTemplate + ".php"
		})
		.done(function( htmlData ) {
			$("#loaded-page").html( htmlData );
		})
		.fail(function() {
			$("#loaded-page").html(
				"<div id=\"error-page\">\n" +
				"<p>There was an error loading the current page</p>\n" +
				"</div> <!-- error-page -->\n"
			);
		});
		currentPageTemplate = pageTemplate;
		$("."+currentPageTemplate).addClass("menu-selected");
	}
}

function updateNewsFeed(message) {
    $("<li>"+message+"</li>").hide().css('opacity', 0.0).prependTo('#news-feed').slideDown('slow').animate({opacity: 1.0});
    // $('#news-feed').prepend("<li>"+message+"</li>").slideDown('slow');
    if ($('#news-feed li').size() > 15) {
        $('#news-feed').last().slideUp.animate({opacity: 0.0}).hide();
    }
    console.log(message);
}







