<?php
include("../includes/initialize.php");

if ($_GET) {
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
?>
<div class="loaded-section">
    <h2>All Members List (<?php echo count($all_members); ?>)</h2>
    <ol>
        <?php if (empty($all_members)) { ?>
            <li>There are no members.</li>
        <?php
        } else {
        $j = 0;
        foreach($all_members as $individual_member) {
            $j++;
            ?>
            <li>
                                    <span id="member-name-<?php echo $j; ?>" class="member-name">
                                        <?php echo $individual_member->full_name(); ?>
                                    </span>
                                    <span id="member-zion-<?php echo $j; ?>" class="member-zion">
                                        <?php echo $individual_member->zion; ?>
                                    </span>
                                    <span id="member-DOBap-<?php echo $j; ?>" class="member-DOBap">
                                        <?php echo $individual_member->DOBap; ?>
                                    </span>
                                    <span id="member-confirmed-<?php echo $j; ?>" class="member-confirmed">
                                        <?php echo $individual_member->confirmed; ?>
                                    </span>
            </li>
        <?php } ?>
    </ol>
    <?php } ?>
</div> <!-- End of .loaded-section -->
<?php
} else {

}