<?php
/**
 * Created by PhpStorm.
 * User: philipjbrowning
 * Date: 4/7/14
 * Time: 9:23 PM
 */
include("../includes/initialize.php");


if ($_GET['update_news_feed'] == 'true') {
    // echo "<li>true</li>";

    // Query
    $sql = "SELECT `first_name`, `middle_name`, `last_name` ".
           "FROM `members` WHERE `register_time` != '0000-00-00 00:00:00' AND `registerer_id` = ".$_GET['registerer_id']." ".
           "ORDER BY `register_time` DESC ".
           "LIMIT 0, 10";

    global $database;
    $database->open_connection();
    if ($result_set = $database->query($sql)) {
        while ($row = mysqli_fetch_object($result_set)) {
            $full_name = ucwords(strtolower($row->first_name))." ";
            if($row->middle_name) {
                $full_name .= ucwords(strtolower($row->middle_name));
            }
            $full_name .= " ".ucwords(strtolower($row->last_name));
            echo "<li>".$full_name." is registered</li>\n";
        }
    } else {
        echo '<li>Loading information soon</li>';
    }
    $database->close_connection();
} else {
    echo "false";
}