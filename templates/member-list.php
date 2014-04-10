<?php
include("../includes/initialize.php");

if ($_GET) {
    /*
    // Variables
    $asc_desc = @$_GET['asc_desc'];
    $offset   = @$_GET['offset'];
    $order_by = @$_GET['order_by'];
    $row_count = @$_GET['row_count'];

    // Empty variable overrides
    if (!$asc_desc) $asc_desc = "ASC";
    if (!$offset) $offset = 0;
    if (!$order_by) $order_by = "register_time";
    if (!$row_count) $row_count = 25;

    // Query
    $theMembers = new Members;

    $theMembers->list_all_members();
    $sql = "SELECT `first_name`, `middle_name`, `last_name` ".
        "FROM `members` WHERE `register_time` != '0000-00-00 00:00:00' AND `registerer_id` = ".$_GET['registerer_id']." ".
        "ORDER BY `register_time` DESC ".
        "LIMIT 0, 10";

    // $all_members = Member::all_members($orderby, $asc_desc);
    */
}
?>
                        <div class="loaded-section">
                            <h2>View and Edit Members<span id="validationText"></span></h2>
                            <form id="search-form" action="">

                                <fieldset>
                                    <input id="search-member-list" type="text" value="" name="search-member" class="text" placeholder="Search by birthday first" />
                                </fieldset>
                            </form>

                            <button id="search-list-button" name="search-list-button" value="Search">Search</button>
                        </div> <!-- End of .loaded-section -->
                        <div id="all-list-section" class="search-loaded-section loaded-section">
                            <h2>Search Results</h2>
                            <div class="search-results-wrap">
                                <ol id="search-results">
                                    <li>No search results.</li>
                                </ol> <!-- End of #search-results -->
                            </div> <!-- End of #member-list -->
                        </div> <!-- End of .loaded-section -->
                        <script type="text/javascript" src="js/list-members.js"></script>