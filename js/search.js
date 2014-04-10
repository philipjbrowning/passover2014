/**
 * Created by philipjbrowning on 4/6/14.
 */

var searchInput = $('#search-member');
var runSearch = null;
var clearSearch = null;
// var searchGroup = null;

// SEARCH DETECTION ----------------------------------------------------------------------------------------------------

searchInput.keyup(function(e) {
    clearSearch = null;
    if (searchInput.val().length > 2) {
        searchGroup = 'All';
        handleSearchTimer(e.which, 'All');
    } else {
        if (runSearch) {
            clearTimer();
        }
        $("#search-results").html('<li>No members found</li>');
    }
});

$("#search-button").click(function(e) {
    e.preventDefault();
    if (searchInput.val().length > 2) {
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
    console.log('clearTimer()');
    clearTimeout(runSearch);
    console.log('clearTimeout(runSearch)');
    runSearch = null;
    console.log('runSearch = null');
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
    }, 200); // 200 millisecond wait until user stops typing
}

// TEXT FORMATTING -----------------------------------------------------------------------------------------------------

function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

// DATABASE QUERIES ----------------------------------------------------------------------------------------------------

function searchMember( searchText, searchGroup ) {
    if (searchText.length > 0) {
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
                'queryText'   : searchText
            }
        }).done(function( htmlData ) {
            $('.search-loaded-section').html( htmlData ); // CHECK HERE
        }).fail(function() {
            console.log( "searchMember( searchText, searchGroup ) - AJAX Failure" );
        });
    }
}