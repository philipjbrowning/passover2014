<?php
/**
 * Created by PhpStorm.
 * User: philipjbrowning
 * Date: 4/10/14
 * Time: 4:18 PM
 */
include("../includes/initialize.php");
$sql = '';

if ($_GET['report_name'] == 'belleville') {
    $sql = "SELECT * FROM `member_search` WHERE `zion_id` = 4 ORDER BY `first_name` ASC;";
    $title = "Belleville, NJ";
} else if ($_GET['report_name'] == 'ny') {
    $sql = "SELECT * FROM `member_search` WHERE `zion_id` != 4 AND `local_zion` = 'T' ORDER BY `first_name` ASC;";
    $title = "New York Zion";
} else if ($_GET['report_name'] == 'visiting') {
    $sql = "SELECT * FROM `member_search` WHERE `local_zion` = 'F' ORDER BY `first_name` ASC;";
    $title = "Visiting Zions";
} else {
    $sql = "SELECT * FROM `members` ORDER BY `first_name` ASC;";
    $title = "All Zions";
}

global $database;
$database->open_connection();
$results = $database->query($sql);
$count = 1;
?>
    <!doctype html>
    <!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
    <!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
    <!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
    <!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
    <!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
    <!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Passover 2014 Registration - Belleville, NJ</title>
    <meta name="description" content="">
    <meta name="author" content="Church of God">

    <!-- Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <style type="text/css">
        body { font: Arial, Helvetica, sans-serif }
        li { border-bottom: 1px solid #eee; font-size: 16px; margin: 2px 0; }

        .greenText { color: #008F0A; font-weight: bold; }
        .smallSize { color: #333; font-size: 13px; }
    </style>
    <!-- end scripts-->
</head>

<body>
<h1>Passover 2014 Registration - <?php echo $title; ?> (<?php echo $results->num_rows; ?> members)</h1>
<ol id="belleville-members">
    <?php
    while ($row = mysqli_fetch_object($results)) {
        $full_name = $row->first_name;
        if ($row->middle_name) {
            $full_name .= " ".$row->middle_name;
        }
        $full_name .= " ".$row->last_name;
        $branches = "";
        if ((strlen($row->branch1) == 0) && (strlen($row->branch2) == 0) && (strlen($row->branch3) == 0)) {
            $branches = "<b>Branch:</b> None";
        } elseif ((strlen($row->branch1) > 0) && (strlen($row->branch2) == 0) && (strlen($row->branch3) == 0)) {
            $branches = "<b>Branch:</b> ".$row->branch1;
        } elseif ((strlen($row->branch1) == 0) && (strlen($row->branch2) > 0) && (strlen($row->branch3) == 0)) {
            $branches = "<b>Branch:</b> ".$row->branch2;
        } elseif ((strlen($row->branch1) == 0) && (strlen($row->branch2) == 0) && (strlen($row->branch3) > 0)) {
            $branches = "<b>Branch:</b> ".$row->branch3;
        } elseif ((strlen($row->branch1) > 0) && (strlen($row->branch2) > 0) && (strlen($row->branch3) == 0)) {
            $branches = "<b>Branches:</b> ".$row->branch1.", and ".$row->branch2;
        } elseif ((strlen($row->branch1) > 0) && (strlen($row->branch2) == 0) && (strlen($row->branch3) > 0)) {
            $branches = "<b>Branches:</b> ".$row->branch1.", and ".$row->branch3;
        } elseif ((strlen($row->branch1) == 0) && (strlen($row->branch2) > 0) && (strlen($row->branch3) > 0)) {
            $branches = "<b>Branches:</b> ".$row->branch2.", and ".$row->branch3;
        } elseif ((strlen($row->branch1) > 0) && (strlen($row->branch2) > 0) && (strlen($row->branch3) > 0)) {
            $branches = "<b>Branches:</b> ".$row->branch1.", ".$row->branch2.", and ".$row->branch3;
        }
        ?>
        <li>
            <b><?php echo $full_name; ?></b> (<i><?php if (strlen($row->life_number) > 0) { echo $row->life_number; } else { echo "NO LIFE NUMBER"; } ?></i>)<?php if ($row->register_time != '0000-00-00 00:00:00' ) { ?> - <span class="greenText">REGISTERED</span><?php } ?><br />
            <span class="smallSize"><b>Gender:</b> <?php if($row->gender == 'F') { echo "Female"; } else { echo "Male"; } ?> | <b>Zion:</b> <?php echo $row->zion_name; ?> | <b>Phone:</b> <?php echo $row->cell_phone; ?> | <b>Birthday:</b> <?php echo $row->birth_date; ?> | <b>Baptism:</b> <?php echo $row->baptism_date; ?> | <?php echo $branches ?></span>
        </li>
    <?php } ?>
</ol> <!-- End of #belleville-members -->
</body>
</html>
<?php if(isset($database)) { $database->close_connection(); } ?>