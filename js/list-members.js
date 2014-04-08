/**
 * Created by philipjbrowning on 4/8/14.
 */






// DATABASE QUERIES ----------------------------------------------------------------------------------------------------

function listMembers( searchText ) {
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
}

// Get initial list of members
listMembers();