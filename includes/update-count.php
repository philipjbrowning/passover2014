<?php
/**
 * Created by PhpStorm.
 * User: philipjbrowning
 * Date: 4/7/14
 * Time: 2:15 PM
 */
include("initialize.php");

$user_id = $_GET['user_id'];

if (!isset($user_id)) {
    echo "false";
    exit();
}

if ($_GET['update-count'] == 'true') {
    $sql = "SELECT SUM(CASE WHEN (`confirmed` = 'T' AND `confirmed_id` = ".$user_id.") THEN 1 ELSE 0 END) `your_confirmed`, ".
           "       SUM(CASE WHEN `confirmed` = 'T' THEN 1 ELSE 0 END) `total_confirmed`, ".
           "       SUM(CASE WHEN (`register_time` != '0000-00-00 00:00:00' AND `registerer_id` = ".$user_id.") THEN 1 ELSE 0 END) `your_registered`,".
           "       SUM(CASE WHEN `register_time` != '0000-00-00 00:00:00' THEN 1 ELSE 0 END) `total_registered`, ".
           "       COUNT(*) AS `total`".
           "FROM `members`";

    global $database;
    $database->open_connection();
    if ($result_set = $database->query($sql)) {
        $result = mysqli_fetch_object($result_set);
        echo '<h2>Your Count ('.$result->total.')</h2>'.
             '<ul id="your-count">'.
             '<li id="count-registered"><b>Registered:</b> <span class="your-number">'.$result->your_registered.
             '</span> / <span class="total-number">'.$result->total_registered.'</span></li>'.
             '<li id="count-confirmed"><b>Confirmed:</b> <span class="your-number">'.$result->your_confirmed.
             '</span> / <span class="total-number">'.$result->total_confirmed.'</span></li>'.
             '</ul> <!-- End #count -->';
    } else {
        echo '<li>false</li>';
    }
    $database->close_connection();
} else {
    echo "<p>false</p>";
}
