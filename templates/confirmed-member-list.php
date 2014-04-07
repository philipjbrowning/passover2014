<?php
include("../includes/initialize.php");

$orderby = @$_GET['orderby'];
$asc_desc = @$_GET['asc_desc'];
if (!$orderby) $orderby = "reg_time";
if (!$asc_desc) $asc_desc = "DESC";	

$confirmed_members = Member::confirmed_members($_SESSION['user_id'], $orderby, $asc_desc);
?>
						<div class="loaded-section">
                        	<h2>Confirmed Member List (<?php echo count($confirmed_members); ?>)</h2>
                        	<ol>
<?php if (empty($confirmed_members)) { ?>
                    			<li>You have not confirmed any members.</li>
<?php 
} else {
	$j = 0;
	foreach($confirmed_members as $confirmed_member) {		
		$j++;
?>				
                				<li>
                                    <span id="member-name-<?php echo $j; ?>" class="member-name">
                                        <?php echo $confirmed_member->full_name(); ?>
                                    </span>
                                    <span id="member-zion-<?php echo $j; ?>" class="member-zion">
                                        <?php echo $confirmed_member->zion; ?>
                                    </span>
                                    <span id="member-DOBap-<?php echo $j; ?>" class="member-DOBap">
                                        <?php echo $confirmed_member->DOBap; ?>
                                    </span>
                                    <span id="member-confirmed-<?php echo $j; ?>" class="member-confirmed">
                                        <?php echo $confirmed_member->confirmed; ?>
                                    </span>
                            	</li>               
<?php } ?>
							</ol>
<?php } ?>
						</div> <!-- End of .loaded-section -->