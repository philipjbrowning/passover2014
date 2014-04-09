<?php
/**
 * Created by PhpStorm.
 * User: philipjbrowning
 * Date: 4/8/14
 * Time: 2:19 PM
 */
include("initialize.php");

if ($_POST) {
    // Save variables
    $asc_desc     = @$_POST['asc_desc'];
    $offset       = @$_POST['offset'];
    $order_by     = @$_POST['order_by'];
    $row_count    = @$_POST['row_count'];
    $search_group = @$_POST['search_group'];
    $search_text  = @$_POST['search_text'];

    // Set defaults if necessary
    if (!$asc_desc) $asc_desc = "ASC";
    if (!$offset) $offset = 0;
    if (!$order_by) $order_by = "first_name";
    if (!$row_count) $row_count = 25;
    if (!$search_group) $search_group = "All";
    if (!$search_text) $search_text = "";

    $theMembers = new Members;

    $results = $theMembers->listMembers($session->user_id, $search_text, $search_group, $order_by, $asc_desc, $offset, $row_count);
    $result_set = array();
?>
    <h2>Search Results</h2>
    <div class="search-results-wrap">
        <ol id="search-results">
            <?php
            while ($row = mysqli_fetch_object($results)) {
                $full_name = $row->first_name;
                if ($row->middle_name) {
                    $full_name .= " ".$row->middle_name;
                }
                $full_name .= " ".$row->last_name;
                ?>
                <li id="<?php echo $_POST['task']; ?>-result-<?php echo $row->id; ?>" class="<?php echo $_POST['task']; ?>-result search-result">
                    <h3><span id="full-name-<?php echo $row->id; ?>" class="<?php if (($row->register_time != "0000-00-00 00:00:00") && ($row->confirmed == 'F')) { echo "search-registered "; } ?><?php if ($row->confirmed == 'T') { echo "search-confirmed "; } ?>"><?php echo $full_name; ?></span> (<?php echo $row->life_number; ?>)</h3>
                    <ul>
                        <li><b>Gender:</b> <?php if($row->gender == 'F') { echo "Female"; } else { echo "Male"; } ?> | <b>Birthday:</b> <?php echo $row->birth_date; ?> | <b>Baptism:</b> <?php echo $row->baptism_date; ?></li>
                        <li><b>Zion:</b> <?php echo $row->zion_name; ?> | <b>Phone:</b> <?php echo $row->cell_phone; // Previously home_phone ?> | <b>Branch:</b> <?php echo $row->branch1; ?></li>
                    </ul>
                    <p>
                        <button id="edit-member-<?php echo $row->id; ?>" name="edit-member-<?php echo $row->id; ?>" class="edit-member-button" value="<?php echo $row->id; ?>" onclick="editMember(<?php echo $row->id; ?>)">Edit</button>
                    </p>
                </li>
            <?php
            }
            if ($results->num_rows == 0) { ?>
                <li>No members found</li>
            <?php } ?>
        </ol> <!-- End of .search-results-wrap -->
    </div> <!-- End of #member-list -->
    <?php
} else {
?>
                            <h2>Search Results (0)</h2>
                            <div class="search-results-wrap">
                                <ol id="search-results">
                                    <li>No search results YET.</li>
                                </ol> <!-- End of #search-results -->
                            </div> <!-- End of #member-list -->
<?php
}