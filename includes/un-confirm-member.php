<?php
/**
 * Created by PhpStorm.
 * User: philipjbrowning
 * Date: 4/9/14
 * Time: 7:21 PM
 */

require_once("initialize.php");

// Save variables
$member_id = $_POST['member_id'];
$user_id   = $_POST['user_id'];

// Query
$sql = "UPDATE `passover2014`.`members`
        SET `confirmed` = 'F',
            `confirmed_id` = '0'
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