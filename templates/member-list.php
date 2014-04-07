<?php
include("../includes/initialize.php");

// $orderby = @$_GET['orderby'];
// $asc_desc = @$_GET['asc_desc'];
// if (!$orderby) $orderby = "reg_time";
// if (!$asc_desc) $asc_desc = "DESC";

// $all_members = Member::all_members($orderby, $asc_desc);
?>
						<div class="loaded-section">
                        	<h2>All Members List (<?php echo count($all_members); ?>)</h2>
                        		<ol>
<?php if (empty($all_members)) { ?>
                    			<li>There are no members.</li>
<?php
} else {
	$j = 0;
	foreach($all_members as $individual_member) {		
		$j++;
?>				
                                <li>
                                    <span id="member-name-<?php echo $j; ?>" class="member-name">
                                        <?php echo $individual_member->full_name(); ?>
                                    </span>
                                    <span id="member-zion-<?php echo $j; ?>" class="member-zion">
                                        <?php echo $individual_member->zion; ?>
                                    </span>
                                    <span id="member-DOBap-<?php echo $j; ?>" class="member-DOBap">
                                        <?php echo $individual_member->DOBap; ?>
                                    </span>
                                    <span id="member-confirmed-<?php echo $j; ?>" class="member-confirmed">
                                        <?php echo $individual_member->confirmed; ?>
                                    </span>
                                </li>               
<?php } ?>
							</ol>
<?php } ?>
						</div> <!-- End of .loaded-section -->