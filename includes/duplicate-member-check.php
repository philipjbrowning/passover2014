<?php
/**
 * Created by PhpStorm.
 * User: philipjbrowning
 * Date: 4/12/14
 * Time: 12:18 PM
 */

include("initialize.php");

// Add data
$birth_date = "";
if (($_POST['BIRyy'] >= 0) && ($_POST['BIRyy'] <= 14)) { // From year 2000 - 2014
    $birth_date = "20".$_POST['BIRyy'].'-'.$_POST['BIRmm'].'-'.$_POST['BIRdd'];
} elseif (($_POST['BIRyy'] >= 15) && ($_POST['BIRyy'] <= 99)) { // From year 1915 - 1999
    $birth_date = "19".$_POST['BIRyy'].'-'.$_POST['BIRmm'].'-'.$_POST['BIRdd'];
}
$cell_phone = $_POST['phone1'].'-'.$_POST['phone2'].'-'.$_POST['phone3']; // Previously home_phone
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$middle_name = $_POST['middle_name'];

// Query
$sql = "SELECT `id` ".
       "FROM `member_search` ".
       "WHERE ((`first_name` LIKE '%".$first_name."%' ".
       "    AND `middle_name` LIKE '%".$middle_name."%' ".
       "    AND `last_name` LIKE '%".$last_name."%') ".
       "    OR (`first_name` LIKE '%".$first_name."%' ".
       "    AND `last_name` LIKE '%".$last_name."%')) ".
       "   AND (`cell_phone` LIKE '".$cell_phone."' ".
       "     OR `birth_date`  = '".$birth_date."');";

// Add update to database
global $database;
$database->open_connection();

$results = $database->query($sql);
if (!$results) {
    echo $database->error;
} else {
    if ($results->num_rows > 0) {
        $count = 1;
        while ($row = mysqli_fetch_object($results)) {
            echo $row->id;
            if ($count < $results->num_rows) {
                echo ", ";
            }
        }
    } else {
        echo "false";
    }
}
$database->close_connection();