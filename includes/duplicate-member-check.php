<?php
/**
 * Created by PhpStorm.
 * User: philipjbrowning
 * Date: 4/12/14
 * Time: 12:18 PM
 */

include("initialize.php");

// Add data
if (($_POST['BIRyy'] >= 0) && ($_POST['BIRyy'] <= 14)) { // From year 2000 - 2014
    $newMember->birth_date = "20".$_POST['BIRyy'].'-'.$_POST['BIRmm'].'-'.$_POST['BIRdd'];
} elseif (($_POST['BIRyy'] >= 15) && ($_POST['BIRyy'] <= 99)) { // From year 1915 - 1999
    $newMember->birth_date = "19".$_POST['BIRyy'].'-'.$_POST['BIRmm'].'-'.$_POST['BIRdd'];
}
$newMember->cell_phone = $_POST['phone1'].'-'.$_POST['phone2'].'-'.$_POST['phone3']; // Previously home_phone
$newMember->first_name = $_POST['first_name'];
$newMember->last_name = $_POST['last_name'];
$newMember->middle_name = $_POST['middle_name'];