/* Author: 

*/

var allSort = 'ASC';
var registerSort = 'ASC';
var confirmedSort = 'ASC';
var currentSort = 'ASC';
var currentPageTemplate;
var pageNumber = 0;
var resultsPerPage = 25;
var visitingSort = 'ASC';

$( document ).ready(function() {
	loadPageTemplate( "register-member" );
    loadNewsFeed();
	updateCounter();

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
        currentSort = registerSort;
		loadPageTemplate('registered-member-list');
		e.preventDefault();
	});
	$(".confirmed-member-list").click(function(e) {
        currentSort = confirmedSort;
		loadPageTemplate('confirmed-member-list');
		e.preventDefault();
	});
	$(".visiting-member-list").click(function(e) {
        currentSort = visitingSort;
		loadPageTemplate('visiting-member-list');
		e.preventDefault();
	});
	$(".member-list").click(function(e) {
        currentSort = allSort;
		loadPageTemplate('member-list');
		e.preventDefault();
	});
});


function loadPageTemplate( pageTemplate ) {
	if ( pageTemplate != currentPageTemplate) {
		$("."+currentPageTemplate).removeClass("menu-selected");
		$.ajax({
			type: "GET",
			url: "templates/" + pageTemplate + ".php",
            data : {
                'offset'    : pageNumber,
                'row_count' : resultsPerPage,
                'order_by'   : 'first_name',
                'asc_desc'  : currentSort
            }
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

function loadNewsFeed() {
    console.log('loadNewsFeed()');
    var registerer_id = $('.news-feed').attr('id').split('news-feed-')[1];
    $.ajax({
        type : "GET",
        url  : "includes/news-feed.php",
        data : {
            'registerer_id'    : registerer_id,
            'update_news_feed' : 'true'
        }
    }).done(function( htmlData ) {
        if (htmlData != 'false') {
            $('.news-feed').html(htmlData);
        } else {
            console.log("Failed to retrieve updates.");
        }
    }).fail(function() {
        console.log('fail');
        $("#your-count").html("<li>Updates will come shortly.</li>");
    });
}
function updateNewsFeed(message) {
    $("<li>"+message+"</li>").hide().css('opacity', 0.0).prependTo('.news-feed').slideDown('slow').animate({opacity: 1.0});
    // $('#news-feed').prepend("<li>"+message+"</li>").slideDown('slow');
    if ($('.news-feed li').size() > 15) {
        $('.news-feed').last().slideUp.animate({opacity: 0.0}).hide();
    }
    console.log(message);
}

function updateCounter() {
    $.ajax({
        type: "GET",
        url: "includes/update-count.php",
        data: {
            'update-count' : true
        }
    }).done(function( htmlData ) {
        $("#your-count").html( htmlData );
    }).fail(function() {
        console.log('fail');
        $("#your-count").html(
            "<li>Updates will come shortly.</li>"
        );
    });
}




