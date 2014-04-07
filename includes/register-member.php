<?php
include("initialize.php");

$theMember = new Member;

// echo $_POST['user_id'];
$database->open_connection();
// UPDATE `passover2014`.`members` SET `register_time` = '2014-04-06 05:08:08', `registerer_id` = '3' WHERE `members`.`id` = 1;
$database->close_connection();

// echo $_POST['registerer_id'];
if ($theMember->register($_POST['registerer_id'])) {
    return true;
} else {
    return false;
}