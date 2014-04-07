<?php
include("initialize.php");

if (($_POST['task'] == 'register') || ($_POST['task'] == 'confirm')) {
    $theMembers = new Members;

    $results = $theMembers->searchForMembers($_POST['queryText']);
    $result_set = array();
    while ($row = mysqli_fetch_object($results)) {
        ?>
        <li>
            <h3><?php echo $row->first_name; ?> <?php echo $row->last_name; ?> (<?php echo $row->life_number; ?>)</h3>
            <p><b>Gender:</b> <?php echo $row->gender; ?>, <b>Birthday:</b> <?php echo $row->birth_date; ?></p>
            <p><?php echo $row->address; ?>, <?php echo $row->city; ?>, <?php echo $row->state; ?> <?php echo $row->zip_code; ?></p>
            <p><b>Zion:</b> <?php echo $row->zion; ?>, <b>Phone:</b> <?php echo $row->home_phone; ?>, Branch: <?php echo $row->branch1; ?></p>

            <?php
            if ($_POST['task'] == 'confirm') {
                ?>
                <p><button id="confirm-<?php echo $row->id; ?>" class="confirm" onclick="confirmMember(<?php echo $row->id; ?>, <?php echo $_SESSION['user_id']; ?>)">Confirm</button></p>
            <?php
            } else {
                ?>
                <p><button id="register-<?php echo $row->id; ?>" class="register" onclick="registerMember(<?php echo $row->id; ?>, <?php echo $_SESSION['user_id']; ?>)">Register</button></p>
            <?php
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