<?php
/**
 * Created by PhpStorm.
 * User: philipjbrowning
 * Date: 4/7/14
 * Time: 2:15 PM
 */
include("initialize.php");

if ($_GET['update-count'] == 'true') {
    $sql = "SELECT SUM(CASE WHEN confirmed = 'T' THEN 1 ELSE 0 END) `confirmed`, ".
            "       SUM(CASE WHEN register_time != '0000-00-00 00:00:00' THEN 1 ELSE 0 END) `registered`, ".
            "COUNT(*) AS `total` ".
            "FROM members;";

    global $database;
    $database->open_connection();
    if ($result_set = $database->query($sql)) {
        $result = mysqli_fetch_object($result_set);
        echo '<li id="count-registered"><b>Registered:</b> <span class="your-number">'.$result->registered.
             '</span> / <span class="total-number">'.$result->total.'</span></li>'.
             '<li id="count-confirmed"><b>Confirmed:</b> <span class="your-number">'.$result->confirmed.
             '</span> / <span class="total-number">'.$result->total.'</span></li>';
    } else {
        echo '<li>false</li>';
    }
    $database->close_connection();
} else {
    echo "<li>false</li>";
}