/**
 * Created by philipjbrowning on 4/6/14.
 */

var searchInput = $('#search-member');
var runSearch = null;
// var searchGroup = null;

// SEARCH DETECTION ----------------------------------------------------------------------------------------------------

searchInput.keyup(function(e) {
    if (searchInput.val().length >= 2) {
        searchGroup = 'All';
        handleSearchTimer(e.which, 'All');
    } else {
        console.log("DELAY - length less than 2");
        if (runSearch) {
            clearTimer();
            runSearch = null;
        }
        $("#search-results").html('<li>No members found</li>');
    }
});

$("#search-button").click(function(e) {
    e.preventDefault();
    if (searchInput.val().length >= 2) {
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
            $('.search-loaded-section').html( htmlData );
        }).fail(function() {
            console.log( "AJAX Failure" );
        });
    }
}