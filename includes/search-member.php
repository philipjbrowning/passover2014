<?php
include("initialize.php");

if (($_POST['task'] == 'register') || ($_POST['task'] == 'confirm')) {
    $theMembers = new Members;

    $results = $theMembers->searchForMembers($_POST['queryText']);
    $result_set = array();
    while ($row = mysqli_fetch_object($results)) {
        ?>
        <li id="<?php echo $_POST['task']; ?>-result-<?php echo $row->id; ?>" class="<?php echo $_POST['task']; ?>-result search-result">
            <h3><span id="full-name-<?php echo $row->id; ?>" class="<?php if (($row->register_time != "0000-00-00 00:00:00") && ($row->confirmed == 'F')) { echo "search-registered "; } ?><?php if ($row->confirmed == 'T') { echo "search-confirmed "; } ?>"><?php echo $row->first_name; ?> <?php echo $row->last_name; ?></span> (<?php echo $row->life_number; ?>)</h3>
            <ul>
                <li><b>Gender:</b> <?php if($row->gender == 'F') { echo "Female"; } else { echo "Male"; } ?> | <b>Birthday:</b> <?php echo $row->birth_date; ?></li>
                <li><b>Zion:</b> <?php echo $row->zion; ?> | <b>Phone:</b> <?php echo $row->home_phone; ?> | Branch: <?php echo $row->branch1; ?></li>
            </ul>

<?php
            if ($_POST['task'] == 'confirm') {
                if ($row->register_time == "0000-00-00 00:00:00") {
?>
            <p><b>NOT REGISTERED YET</b></p>
<?php               } elseif ($row->confirmed == "F") { ?>
            <p><button id="confirm-<?php echo $row->id; ?>" class="confirm" onclick="confirmMember(<?php echo $row->id; ?>, <?php echo $_SESSION['user_id']; ?>)">Confirm</button></p>
<?php           } else { // if ($row->confirmed == "T") { ?>
            <p><b>CONFIRMED</b></p>
<?php           }
            } else { // if ($_POST['task'] == 'register') {
                if ($row->register_time == "0000-00-00 00:00:00") {
?>
            <p><button id="register-<?php echo $row->id; ?>" class="register" onclick="registerMember(<?php echo $row->id; ?>, <?php echo $_SESSION['user_id']; ?>)">Register</button></p>
<?php           }
            }
            ?>
        </li>
    <?php
    }
    if ($results->num_rows == 0) {
?>
        <li>No members found</li>
<?php
    }
}
?>