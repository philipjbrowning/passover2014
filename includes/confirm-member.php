<?php
include("initialize.php");

// Save variables
$member_id    = $_POST['member_id'];
$confirmed_id = $_POST['confirmed_id'];

// Query
$sql = "UPDATE `passover2014`.`members`
        SET `confirmed` = 'T',
            `confirmed_id` = '".$confirmed_id."'
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