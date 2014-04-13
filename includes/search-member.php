<?php
include("initialize.php");

if (($_POST['task'] == 'register') || ($_POST['task'] == 'confirm')) {
    $theMembers = new Members;

    $results = $theMembers->searchForMembers($_POST['queryText']);
    $result_set = array();
?>
    <h2>Search Results</h2>
    <div class="search-results-wrap">
        <ol id="search-results">
<?php
    $count = 1;
    while ($row = mysqli_fetch_object($results)) {
        $full_name = $row->first_name;
        if ($row->middle_name) {
            $full_name .= " ".$row->middle_name;
        }
        $full_name .= " ".$row->last_name;
        ?>
            <li id="<?php echo $_POST['task']; ?>-result-<?php echo $row->id; ?>" class="<?php echo $_POST['task']; ?>-result search-result">
                <h3><span id="full-name-<?php echo $row->id; ?>" class="<?php if (($row->register_time != "0000-00-00 00:00:00") && ($row->confirmed == 'F')) { echo "search-registered "; } ?><?php if ($row->confirmed == 'T') { echo "search-confirmed "; } ?>"><?php echo $full_name; ?></span> (<?php if (strlen($row->life_number) > 0) { echo $row->life_number; } else { echo "No Life Number"; } ?>) - <?php if ($row->register_time != "0000-00-00 00:00:00") { ?><span class="greenText">REGISTERED</span><?php } ?></span></h3>
                <ul>
                    <li><b>Gender:</b> <?php if($row->gender == 'F') { echo "Female"; } else if($row->gender == 'M') { echo "Male"; } else { echo "Unknown"; } ?> | <b>Birthday:</b> <?php if($row->birth_date == '0000-00-00') { echo "Unknown"; } else { echo $row->birth_date; } ?> | <b>Baptism:</b> <?php if($row->baptism_date == '0000-00-00') { echo "Unknown"; } else { echo $row->baptism_date; } ?></li>
                    <li><b>Zion:</b> <?php echo $row->zion_name; ?> | <b>Phone:</b> <?php echo $row->cell_phone; // Previously home_phone ?> | <b>Branch:</b> <?php echo $row->branch1; ?></li>
                </ul>

<?php
            if ($_POST['task'] == 'confirm') {
                if ($row->register_time == "0000-00-00 00:00:00") {
?>
                <p><b>NOT REGISTERED YET</b></p>
<?php               } elseif ($row->confirmed == "F") { ?>
                <p><button id="confirm-<?php echo $row->id; ?>" class="confirm" onclick="confirmMember(<?php echo $row->id; ?>, <?php echo @$_SESSION['user_id']; ?>, 'search')">Confirm</button></p>
<?php           }
            } else { // if ($_POST['task'] == 'register') {
                if ($row->register_time == "0000-00-00 00:00:00") {
?>
                <p><button id="edit-member-<?php echo $row->id; ?>" name="edit-member-<?php echo $row->id; ?>" class="edit-member-button" value="<?php echo $row->id; ?>" onclick="editMember(<?php echo $row->id; ?>)">Edit</button> <button id="register-<?php echo $row->id; ?>" class="register" onclick="registerMember(<?php echo $row->id; ?>, <?php echo @$_SESSION['user_id']; ?>, 'search')">Register</button></p>
<?php           }
            }
            ?>
            </li>
        <?php if ($row->confirmed == 'F') { ?>
            <li id="<?php echo $_POST['task']; ?>-un-register-<?php echo $row->id; ?>" class="<?php echo $_POST['task']; ?>-un-register search-un-register<?php if ($row->register_time == "0000-00-00 00:00:00") { echo " hidden"; }?>">
                <button id="register-<?php echo $row->id; ?>" class="register" onclick="unRegisterMember(<?php echo $row->id; ?>, <?php echo $_SESSION['user_id']; ?>, 'search')">Un-Register</button>
            </li>
        <?php }
        if ($count != $results->num_rows) {
        ?>
            <li class="search-result-divider"></li>
<?php
        }
        $count++;
    }
    if ($results->num_rows == 0) {
?>
            <li>No members found</li>
        <?php
    }
}
?>