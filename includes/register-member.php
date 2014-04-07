<?php
include("initialize.php");

// Save variables
$member_id     = $_POST['member_id'];
$register_time = date("Y-m-d H:i:s");
$registerer_id = $_POST['registerer_id'];
$late_registration = 'F'; // Add to our functionality

// Query
$sql = "UPDATE `passover2014`.`members`
        SET `register_time` = '".$register_time."',
            `late_registration` = '".$late_registration."',
            `registerer_id` = '".$registerer_id."'
        WHERE `members`.`id` = ".$member_id.";";

// Add update to database
global $database;
$database->open_connection();
if (!$database->query($sql)) {
    echo $database->error;
} else {
    echo "true";
}
$database->close_connection();
?>