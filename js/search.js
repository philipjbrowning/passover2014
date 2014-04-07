/**
 * Created by philipjbrowning on 4/6/14.
 */

var searchInput = $('#search-member');
var runSearch = null;

searchInput.keydown(function(e) { // FIX NUMERIC KEYPAD ZERO
    var myRe = /[a-z,A-Z,0-9]$/g;
    if (myRe.test(String.fromCharCode(e.which)) || (e.which == 189)) {
        if (runSearch) {
            clearTimer();
            startTimer();
        } else {
            startTimer();
        }
    } else if ((e.which == 8) || (e.which == 32)) {
        // Allow backspace = 8 and spacebar = 32
    } else if (e.which == 13) {
        clearTimer();
        searchMember(searchInput.val());
    } else {
        e.preventDefault();
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

function searchMember( searchInput ) {
    runSearch = null;
    var task = null;
    if ($('#search-results').parent().attr('id') == 'confirm-list-wrap') {
        task = 'confirm';
    } else if ($('#search-results').parent().attr('id') == 'register-list-wrap') {
        task = 'register';
    }
    console.log($('#search-results').parent().attr('id'));
    console.log( task );
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
        console.log( "Fail" );
    });
}

function registerMember(member_id, user_id) {
    if(confirm('Are you sure you want to register this member?')) {
        console.log("register");
        $.ajax({
            type : "POST",
            url  : "includes/register-member.php",
            data: {
                'member_id'     : member_id,
                'registerer_id' : user_id
            }
        }).done(function( result ) {
            if (result) {
                console.log("Success");
                updateNewsFeed('Registered [name]');
            } else {
                console.log("Failure");
            }
        }).fail(function() {
            console.log("Register Fail");
        });
    }
}

function confirmMember(member_id, user_id) {
    if(confirm('Are you sure you want to confirm this member?')) {
        $.ajax({
                type : "POST",
                url  : "includes/register-member.php",
                data: {
                    'member_id'     : member_id,
                    'registerer_id' : user_id
                }
        }).done(function( result ) {
            if (result) {
                console.log("Success");
                updateNewsFeed('Confirmed [name]');
            } else {
                console.log("Failure");
            }
        }).fail(function() {
            console.log("Confirm Fail");
        });
    }
}