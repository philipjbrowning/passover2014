/**
 * Created by philipjbrowning on 4/6/14.
 */

var searchInput = $('#search-member');
var runSearch = null;
// var searchGroup = null;

// SEARCH DETECTION ----------------------------------------------------------------------------------------------------

searchInput.keyup(function(e) { // FIX NUMERIC KEYPAD ZERO
    searchGroup = 'All';
    handleSearchTimer(e.which, 'All');
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

// SEARCH SPEED LIMITER ------------------------------------------------------------------------------------------------

function clearTimer() {
    clearTimeout(runSearch);
    runSearch = null;
}

function handleSearchTimer(inputKeyCode, searchGroup) {
    if (inputKeyCode == 13) { // Enter key pressed
        if (runSearch) {
            clearTimer();
        }
        console.log("EXECUTE - searchMember("+searchInput.val()+", "+searchGroup+")");
        searchMember(searchInput.val(), searchGroup);
    } else {
        if (runSearch) {
            clearTimer();
            startTimer(searchInput.val(), searchGroup);
        } else {
            startTimer(searchInput.val(), searchGroup);
        }
    }
}

function startTimer(searchText, searchGroup) {
    console.log("WAIT - searchMember("+searchText+", "+searchGroup+")");
    runSearch = setTimeout(function() {
        console.log("EXECUTE - searchMember("+searchText+", "+searchGroup+")");
        searchMember(searchText, searchGroup);
    }, 300); // 300 millisecond wait until user stops typing
}

// TEXT FORMATTING -----------------------------------------------------------------------------------------------------

function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

// DATABASE QUERIES ----------------------------------------------------------------------------------------------------

function searchMember( searchText, searchGroup ) {
    runSearch = null;
    var task = null;
    if ($('.search-loaded-section').attr('id') == 'confirm-member-section') {
        task = 'confirm';
    } else if ($('.search-loaded-section').attr('id') == 'register-member-section') {
        task = 'register';
    }
    $.ajax({
        type : "POST",
        url  : "includes/search-member.php",
        data: {
            'task'        : task,
            'queryText'   : searchText,
            'searchGroup' : searchGroup
}
    }).done(function( htmlData ) {
        $('.search-loaded-section').html( htmlData );
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
                updateNewsFeed(toTitleCase($('#full-name-'+member_id).html())+' confirmed');
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