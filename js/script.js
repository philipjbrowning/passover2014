/* Author: 

*/

var allOrderBy = 'first_name';
var allSort = 'ASC';
var confirmedOrderBy = 'first_name';
var confirmedSort = 'ASC';
var currentOrderBy = 'first_name';
var currentSort = 'ASC';
var currentPageTemplate;
var pageNumber = 0;
var registerOrderBy = 'first_name';
var registerSort = 'ASC';
var resultsPerPage = 10;
var visitingOrderBy = 'first_name';
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
	$(".confirm-attendance").click(function(e) { // TEMPORARILY DISABLED
		// loadPageTemplate('confirm-attendance');
		// e.preventDefault();
	});
	$(".register-member").click(function(e) {
		loadPageTemplate('register-member');
		e.preventDefault();
	});
	$(".registered-member-list").click(function(e) {
        currentSort = registerSort;
        currentOrderBy = registerOrderBy;
		loadPageTemplate('registered-member-list');
		e.preventDefault();
	});
	$(".confirmed-member-list").click(function(e) { // TEMPORARILY DISABLED
        // currentSort = confirmedSort;
        // currentOrderBy = confirmedOrderBy;
		// loadPageTemplate('confirmed-member-list');
		e.preventDefault();
	});
	$(".visiting-member-list").click(function(e) {
        currentSort = visitingSort;
        currentOrderBy = visitingOrderBy;
		loadPageTemplate('visiting-member-list');
		e.preventDefault();
	});
	$(".member-list").click(function(e) {
        currentSort = allSort;
        currentOrderBy = allOrderBy;
		loadPageTemplate('member-list');
		e.preventDefault();
	});
});

function editMember(member_id) {
    // e.preventDefault();
    pageTemplate = 'edit-member';
    if ( pageTemplate != currentPageTemplate) {
        $("."+currentPageTemplate).removeClass("menu-selected");
        $.ajax({
            type: "GET",
            url: "templates/" + pageTemplate + ".php",
            data : {
                'member_id' : member_id
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
        // $("."+currentPageTemplate).addClass("menu-selected");
    }
}

function loadPageTemplate( pageTemplate ) {
	if ( pageTemplate != currentPageTemplate) {
        if (currentPageTemplate != 'edit-member') {
            $("."+currentPageTemplate).removeClass("menu-selected");
        }
		$.ajax({
			type: "GET",
			url: "templates/" + pageTemplate + ".php",
            data : {
                'offset'    : pageNumber,
                'row_count' : resultsPerPage,
                'order_by'  : currentOrderBy,
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
    var registerer_id = $('.news-feed').attr('id').split('-')[2];
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
        $('.news-feed').last().slideUp('slow').animate({opacity: 0.0}).hide();
    }
}

function updateCounter() {
    console.log($('.user-name').attr('id'));
    console.log($('.user-name').attr('id').split('user-name-')[1]);
    $.ajax({
        type: "GET",
        url: "includes/update-count.php",
        data: {
            'update-count' : true,
            'user_id'      : parseInt($('.user-name').attr('id').split('user-name-')[1])
        }
    }).done(function( htmlData ) {
        if (htmlData != 'false') {
            $("#your-count-wrap").html( htmlData );
        } else {
            $("#your-count").html( "<li>Updates will come shortly.</li>" );
        }
    }).fail(function() {
        console.log('fail');
        $("#your-count").html(
            "<li>Updates will come shortly.</li>"
        );
    });
}

// MYSQL DATABASE ------------------------------------------------------------------------------------------------------

function confirmMember(member_id, user_id, page_name) {
    if(confirm('Are you sure you want to CONFIRM this member?')) {
        console.log("user #"+user_id+" is confirming member #"+member_id);
        $.ajax({
            type : "POST",
            url  : "includes/confirm-member.php",
            data: {
                'member_id'     : member_id,
                'confirmed_id'  : user_id
            }
        }).done(function( result ) {
            console.log('AJAX done');
            ajax_result = result;
            if (result == 'true') {
                updateCounter();
                if (page_name == 'search') {
                    $('#full-name-'+member_id).addClass("search-confirmed");
                    $('#full-name-'+member_id).removeClass("search-registered");
                    $('#confirm-result-'+member_id+' p').slideUp('slow');
                    updateNewsFeed(toTitleCase($('#full-name-'+member_id).html())+' confirmed');
                } else if (page_name == 'edit') {
                    console.log('confirmMember() page_name = edit');
                    // Handle buttons
                    $('.un-register-member-btn').prop( "disabled", "disabled");
                    $('.confirm-member-btn').prop( "disabled", "disabled" );
                    $('.un-confirm-member-btn').prop( "disabled", null );

                    // News Feed Message
                    console.log($('#first_name').val());
                    console.log($('#middle_name').val());
                    console.log($('#last_name').val());
                    var full_name = toTitleCase($('#last_name').val());
                    if ($("#middle_name").val().length > 0) {
                        full_name += " " + toTitleCase($('#middle_name').val());
                    }
                    full_name += " " + toTitleCase($('#last_name').val());
                    updateNewsFeed(full_name+' confirmed');
                } else if (page_name == 'confirm') {
                    console.log('confirmMember() page_name = confirm');
                } else {
                    console.log('confirmMember() page_name out of scope');
                }
            } else {
                console.log('confirmMember() - failure')
            }
        }).fail(function() {
            console.log('confirmMember() - AJAX fail');
        });
    }
}

function registerMember(member_id, user_id, page_name) {
    if(confirm('Are you sure you want to REGISTER this member?')) {
        console.log("user #"+user_id+" is registering member #"+member_id);
        console.log($('#full-name-'+member_id).val());
        $.ajax({
            type : "POST",
            url  : "includes/register-member.php",
            data: {
                'member_id'     : member_id,
                'registerer_id' : user_id
            }
        }).done(function( result ) {
            if (result == 'true') {
                updateCounter();
                if (page_name == 'search') {
                    var new_registered_member = $('#full-name-'+member_id);
                    new_registered_member.addClass("search-registered");
                    $('#register-result-'+member_id+' p').slideUp('slow');
                    console.log("#register-un-register-'+member_id).removeClass('hidden').slideDown('slow')");
                    $('#register-un-register-'+member_id).removeClass("hidden");
                    updateNewsFeed(toTitleCase(new_registered_member.html())+' registered');

                    // Move mouse back to search field
                    clearSearch = setTimeout(function() {
                        $('html, body').animate({scrollTop:0}, 'slow', function() {
                            $("#search-member").focus().val('');
                            $('#search-results').html('<li>No members found</li>');
                        });
                    }, 1000);
                } else if (page_name == 'edit') {
                    // Handle buttons
                    $('.register-member-btn').prop( "disabled", "disabled");
                    $('.un-register-member-btn').prop( "disabled", null );
                    $('.confirm-member-btn').prop( "disabled", null );

                    // News Feed Message
                    var full_name = toTitleCase($('#first_name').val());
                    if ($("#middle_name").val().length > 0) {
                        full_name += " " + toTitleCase($('#middle_name').val());
                    }
                    full_name += " " + toTitleCase($('#last_name').val());
                    updateNewsFeed(full_name+' registered');
                } else if (page_name == 'confirm') {
                    console.log('registerMember() page_name = confirm');
                } else {
                    console.log('registerMember() page_name out of scope');
                }
            } else {
                console.log("Register Result Failure");
                console.log(result);
            }
        }).fail(function() {
            console.log("AJAX Register Failure");
        });
    }
}

function unConfirmMember(member_id, user_id, page_name) {
    if(confirm('Are you sure you want to UN-CONFIRM this member?')) {
        console.log("user #"+user_id+" is un-confirming member #"+member_id);
        $.ajax({
            type : "POST",
            url  : "includes/un-confirm-member.php",
            data: {
                'member_id'     : member_id,
                'confirmed_id'  : user_id
            }
        }).done(function( result ) {
            if (result == 'true') {
                updateCounter();
                console.log('unConfirmMember() page_name = edit');
                // Handle buttons
                 $('.un-register-member-btn').prop( "disabled", null);
                 $('.confirm-member-btn').prop( "disabled", null );
                 $('.un-confirm-member-btn').prop( "disabled", "disabled" );

                // News Feed Message
                console.log($('#first_name').val());
                console.log($('#middle_name').val());
                console.log($('#last_name').val());
                var full_name = toTitleCase($('#last_name').val());
                if ($("#middle_name").val().length > 0) {
                    full_name += " " + toTitleCase($('#middle_name').val());
                }
                full_name += " " + toTitleCase($('#last_name').val());
                updateNewsFeed(full_name+' unconfirmed');
            } else {
                console.log("Un-Confirm Result Failure");
                console.log(result);
            }
        }).fail(function() {
            console.log("AJAX Un-Confirm Failure");
        });
    }
}

function unRegisterMember(member_id, user_id, page_name) {
    if(confirm('Are you sure you want to UN-REGISTER this member?')) {
        console.log("user #"+user_id+" is un-registering member #"+member_id);
        $.ajax({
            type : "POST",
            url  : "includes/un-register-member.php",
            data: {
                'member_id'     : member_id,
                'registerer_id' : user_id
            }
        }).done(function( result ) {
            if (result == 'true') {

                updateCounter();
                console.log('unRegisterMember() page_name = edit');

                if (page_name == 'search') {
                    var new_registered_member = $('#full-name-'+member_id);
                    new_registered_member.removeClass("search-registered");
                    $('#register-result-'+member_id+' p').slideDown('slow');
                    // console.log("#register-un-register-'+member_id).removeClass('hidden').slideDown('slow')");
                    $('#register-un-register-'+member_id).addClass("hidden");
                    // console.log("Un-Register Success");
                    updateNewsFeed(toTitleCase(new_registered_member.html())+' un-registered');
                } else if (page_name == 'edit') {
                    // Handle buttons
                    $('.register-member-btn').prop( "disabled", null);
                    $('.un-register-member-btn').prop( "disabled", "disabled" );
                    $('.confirm-member-btn').prop( "disabled", "disabled" );

                    // News Feed Message
                    console.log($('#first_name').val());
                    console.log($('#middle_name').val());
                    console.log($('#last_name').val());
                    var full_name = toTitleCase($('#last_name').val());
                    if ($("#middle_name").val().length > 0) {
                        full_name += " " + toTitleCase($('#middle_name').val());
                    }
                    full_name += " " + toTitleCase($('#last_name').val());
                    updateNewsFeed(full_name+' un-registered');
                } else {
                    console.log('unRegisterMember() - SUCCESS from page '+page_name);
                }
            } else {
                console.log("Un-Register Result Failure");
                console.log(result);
            }
        }).fail(function() {
            console.log("AJAX Un-Register Failure");
        });
    }
}

function updateMember(member_id, user_id) {
    if(confirm('Are you sure you want to UPDATE this member?')) {
        console.log("user #"+user_id+" is updating member #"+member_id);
        $.ajax({
            type : "POST",
            url  : "includes/update-member.php",
            data: {
                "BIRmm"             : $('#BIRmm').val(),
                "BIRdd"             : $('#BIRdd').val(),
                "BIRyy"             : $('#BIRyy').val(),
                "branch1"           : $('#branch1').val(),
                "branch2"           : $('#branch2').val(),
                "comments"          : $('#comments').val(),
                "first_name"        : $('#first_name').val(),
                "gender"            : $('.gender:checked').val(),
                "id"                : member_id,
                "middle_name"       : $('#middle_name').val(),
                "last_name"         : $('#last_name').val(),
                "late_registration" : $('#late_registration').is(':checked'),
                "life_no_1"         : $('#life_no_1').val(),
                "life_no_2"         : $('#life_no_2').val(),
                "life_no_3"         : $('#life_no_3').val(),
                "phone1"            : $('#phone_1').val(),
                "phone2"            : $('#phone_2').val(),
                "phone3"            : $('#phone_3').val(),
                "registerer_id"     : $('#registerer_id').val(),
                "user_id"           : user_id,
                "zion_id"           : $('.zion:checked').val(),
                "zion_name"         : $('#church').val()
            }
        }).done(function( result ) {
            console.log(result);
            if (result == 'true') {
                console.log("Update Success");
                // CHANGE TITLE BACKGROUND TO GREEN FOR 3 SECONDS
            } else {
                console.log("Update Result Failure");
                console.log(result);
            }
        }).fail(function() {
            console.log("AJAX Update Failure");
        });
    }
}

// Add 3 php pages with functions