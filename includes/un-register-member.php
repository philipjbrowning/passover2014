<?php
include("initialize.php");

// Save variables
$member_id     = $_POST['member_id'];

// Query
$sql = "UPDATE `passover2014`.`members`
        SET `register_time` = '0000-00-00 00:00:00',
            `late_registration` = 'F',
            `registerer_id` = '0'
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