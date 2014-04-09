/**
 * Created by philipjbrowning on 4/8/14.
 */

var searchListInput = $('#search-member-list');
var runListSearch = null;

// SEARCH DETECTION ----------------------------------------------------------------------------------------------------

searchListInput.keyup(function(e) { // FIX NUMERIC KEYPAD ZERO
    handleSearchListTimer(e.which, searchGroup);
});

$("#search-list-button").click(function(e) {
    e.preventDefault();
    if (searchListInput.val().length > 0) {
        if (runSearch) {
            clearListTimer();
        }
        listMembers(searchListInput.val());
    }
});

$('#search-form').submit(function(e) {
    e.preventDefault();
})

// SEARCH SPEED LIMITER ------------------------------------------------------------------------------------------------

function clearListTimer() {
    clearTimeout(runSearch);
    runSearch = null;
}

function handleSearchListTimer(inputKeyCode, searchGroup) {
    if (inputKeyCode == 13) { // Enter key pressed
        if (runSearch) {
            clearListTimer();
        }
        console.log("EXECUTE - searchMember("+searchInput.val()+", "+searchGroup+")");
        listMembers(searchListInput.val(), searchGroup);
    } else {
        if (runSearch) {
            clearListTimer();
            startListTimer(searchListInput.val(), searchGroup);
        } else {
            startListTimer(searchListInput.val(), searchGroup);
        }
    }
}

function startListTimer(searchText, searchGroup) {
    console.log("WAIT - searchMember("+searchText+", "+searchGroup+")");
    runSearch = setTimeout(function() {
        console.log("EXECUTE - searchMember("+searchText+", "+searchGroup+")");
        listMembers(searchText, searchGroup);
    }, 300); // 300 millisecond wait until user stops typing
}

// DATABASE QUERIES ----------------------------------------------------------------------------------------------------

function listMembers( searchText ) {
    if (searchText.length > 0) {
        console.log('listMembers()');
        runSearch = null;
        var ascDescSort = null,
            searchGroup = null;
        if ($('.search-loaded-section').attr('id') == 'confirmed-list-section') {
            searchGroup = 'confirmed';
        } else if ($('.search-loaded-section').attr('id') == 'registered-list-section') {
            searchGroup = 'registered';
        } else if ($('.search-loaded-section').attr('id') == 'visiting-list-section') {
            searchGroup = 'visiting';
        } else {
            searchGroup = 'All';
        }
        console.log('searchGroup = '+searchGroup);
        $.ajax({
            type : "POST",
            url  : "includes/list-members.php",
            data: {
                'asc_desc'     : currentSort,
                'offset'       : pageNumber,
                'order_by'     : currentOrderBy,
                'row_count'    : resultsPerPage,
                'search_group' : searchGroup,
                'search_text'  : searchText
            }
        }).done(function( htmlData ) {
            $('.search-loaded-section').html( htmlData );
        }).fail(function() {
            console.log( "AJAX Failure" );
        });
    } else {
        console.log("Search text empty");
    }
}

// Get initial list of members
listMembers("");