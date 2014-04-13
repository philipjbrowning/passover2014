/**
 * Created by philipjbrowning on 4/8/14.
 */

var searchListInput = $('#search-member-list');
var runListSearch = null;

// SEARCH DETECTION ----------------------------------------------------------------------------------------------------

searchListInput.keyup(function(e) {
    handleSearchListTimer(e.which);
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

function handleSearchListTimer(inputKeyCode) {
    if (inputKeyCode == 13) { // Enter key pressed
        if (runSearch) {
            clearListTimer();
        }
        listMembers(searchListInput.val());
    } else {
        if (runSearch) {
            clearListTimer();
            startListTimer(searchListInput.val());
        } else {
            startListTimer(searchListInput.val());
        }
    }
}

function startListTimer(searchText) {
    runSearch = setTimeout(function() {
        listMembers(searchText);
    }, 300); // 300 millisecond wait until user stops typing
}

// DATABASE QUERIES ----------------------------------------------------------------------------------------------------

function listMembers( searchText ) {
    if (searchText.length > 0) {
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
    }
}

// UPDATE, CONFIRM, UN-CONFIRM, REGISTER, UN-REGISTER ------------------------------------------------------------------

// Get initial list of members
listMembers("");