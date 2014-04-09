<?php
/**
 * Created by PhpStorm.
 * User: philipjbrowning
 * Date: 4/9/14
 * Time: 5:17 PM
 */
require_once("initialize.php");

$newMember = new Member;

// Add data
$newMember->id = $_POST['id'];
if (($_POST['BIRyy'] >= 0) && ($_POST['BIRyy'] <= 14)) { // From year 2000 - 2014
    $newMember->birth_date = "20".$_POST['BIRyy'].'-'.$_POST['BIRmm'].'-'.$_POST['BIRdd'];
} elseif (($_POST['BIRyy'] >= 15) && ($_POST['BIRyy'] <= 99)) { // From year 1915 - 1999
    $newMember->birth_date = "19".$_POST['BIRyy'].'-'.$_POST['BIRmm'].'-'.$_POST['BIRdd'];
}
$newMember->branch1 = $_POST['branch1'];
$newMember->branch2 = $_POST['branch2'];
$newMember->comments = $_POST['comments'];
$newMember->gender = $_POST['gender'];
$newMember->cell_phone = $_POST['phone1'].'-'.$_POST['phone2'].'-'.$_POST['phone3']; // Previously home_phone
$newMember->first_name = $_POST['first_name'];
$newMember->last_name = $_POST['last_name'];
if ($_POST['late_registration']) {
    $newMember->late_registration = 'T';
} else {
    $newMember->late_registration = 'F';
}
$newMember->life_number = $_POST['life_no_1'].'-'.$_POST['life_no_2'].'-'.$_POST['life_no_3'];
if ($newMember->life_number == '--') {
    $newMember->life_number = 'A00-000000-0'; // Default in database for unknown life number
}
$newMember->middle_name = $_POST['middle_name'];
if ($_POST['task'] == 'add-register-member') {
    $newMember->registerer_id = $_POST['registerer_id'];
    $newMember->set_register_time();
}
if ($_POST['zion_id'] == 'other') {
    $newMember->zion_name = $_POST['zion_name'];
} else {
    $newMember->zion_id = $_POST['zion_id'];
}

// Save data
if ($newMember->save()) {
    echo "true";
} else {
    echo "false";
}