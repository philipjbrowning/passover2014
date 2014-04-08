/**
 * Created by philipjbrowning on 4/6/14.
 */

var searchInput = $('#search-member');
var runSearch = null;

searchInput.keydown(function(e) { // FIX NUMERIC KEYPAD ZERO
    if (e.which == 13) { // Enter key pressed
        if (runSearch) {
            clearTimer();
        }
        searchMember(searchInput.val());
    } else {
        if (runSearch) {
            clearTimer();
            startTimer();
        } else {
            startTimer();
        }
    }
});

$("#search-button").click(function(e) {
    e.preventDefault();
    if (searchInput.val().length > 0) {
        if (runSearch) {
            clearTimer();
        }
        searchMember(searchInput.val());
    }
});

$('#search-form').submit(function(e) {
    e.preventDefault();
})

function startTimer() {
    runSearch = setTimeout(function() {
        searchMember(searchInput.val());
    }, 200);
}

function clearTimer() {
    clearTimeout(runSearch);
    runSearch = null;
}

function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

function searchMember( searchInput ) {
    runSearch = null;
    var task = null;
    if ($('#search-results').parent().attr('id') == 'confirm-list-wrap') {
        task = 'confirm';
    } else if ($('#search-results').parent().attr('id') == 'register-list-wrap') {
        task = 'register';
    }
    // console.log($('#search-results').parent().attr('id'));
    // console.log( task );
    $.ajax({
        type : "POST",
        url  : "includes/search-member.php",
        data: {
            'task'      : task,
            'queryText' : searchInput
        }
    }).done(function( htmlData ) {
        $('#search-results').html( htmlData );
    }).fail(function() {
        console.log( "AJAX Failure" );
    });
}

function registerMember(member_id, user_id) {
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
                $('#full-name-'+member_id).addClass("search-registered");
                $('#register-result-'+member_id+' p').slideUp('slow');
                console.log("Register Success");
                updateNewsFeed(toTitleCase($('#full-name-'+member_id).html())+' registered');
                updateCounter();
            } else {
                console.log("Register Result Failure");
                console.log(result);
            }
        }).fail(function() {
            console.log("AJAX Register Failure");
        });
    }
}

function confirmMember(member_id, user_id) {
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
            if (result == 'true') {
                $('#full-name-'+member_id).addClass("search-confirmed");
                $('#full-name-'+member_id).removeClass("search-registered");
                $('#confirm-result-'+member_id+' p').slideUp('slow');
                console.log("Confirm Success");
                updateNewsFeed('Confirmed [name]');
                updateCounter();
            } else {
                console.log("Confirm Result Failure");
                console.log( result );
            }
        }).fail(function() {
            console.log("AJAX Confirm Failure");
        });
    }
}

function unregisterMember(member_id) {
    if(confirm('Are you sure you want to UNREGISTER this member?')) {
        console.log("user #"+user_id+" is unregistering member #"+member_id);
        /*
        console.log($('#full-name-'+member_id).val());
        $.ajax({
            type : "POST",
            url  : "includes/register-member.php",
            data: {
                'member_id'     : member_id,
                'registerer_id' : 0
            }
        }).done(function( result ) {
            if (result == 'true') {
                $('#register-result-'+member_id).addClass("search-registered");
                console.log("Register Success");
                updateNewsFeed('Registered [name]');
            } else {
                console.log("Register Result Failure");
                console.log(result);
            }
        }).fail(function() {
            console.log("AJAX Register Failure");
        });
        */
    }
}