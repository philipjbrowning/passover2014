<?php
include("../includes/initialize.php");

// $orderby = @$_GET['orderby'];
// $asc_desc = @$_GET['asc_desc'];
// if (!$orderby) $orderby = "register_time";
// if (!$asc_desc) $asc_desc = "DESC";

// $registered_members = Member::registered_members($_SESSION['user_id'], $orderby, $asc_desc);
// echo "<pre>";
// print_r($registered_members);
// echo "</pre>";
// exit();
?>
						<div class="loaded-section">
                        	<h2>Registered Member List (<?php echo count($registered_members); ?>)</h2>
                        	<ol>
<?php if (empty($registered_members)) { ?>
                    			<li>You have not registered any members.</li>
<?php 
} else {
	$j = 0;
	foreach($registered_members as $registered_member) {		
		$j++;
?>				
                				<li>
                                    <span id="member-full-name-<?php echo $j; ?>" class="member-full-name">
                                        <?php echo $registered_member->full_name(); ?>
                                    </span>
                                    <span id="member-life-number-<?php echo $j; ?>" class="member-life-number">
                                        <?php echo $registered_member->life_number; ?>
                                    </span>
                                    <span id="member-gender-<?php echo $j; ?>" class="member-gender">
                                        <b>Gender:</b> <?php echo $registered_member->gender; ?>
                                    </span>
                                    <span id="member-zion-<?php echo $j; ?>" class="member-zion">
                                        <b>Zion:</b> <?php echo $registered_member->zion; ?>
                                    </span>
                                    <span id="member-birth-date-<?php echo $j; ?>" class="member-birth-date">
                                        <b>Birthdate:</b> <?php echo $registered_member->birth_date; ?>
                                    </span>
                                    <span id="member-baptism-date-<?php echo $j; ?>" class="member-birth-date">
                                        <b>Baptism:</b> <?php echo $registered_member->baptism_date; ?>
                                    </span>
                                    <span id="member-home-phone-<?php echo $j; ?>" class="member-home-phone">
                                        <b>Phone:</b> <?php echo $registered_member->home_phone; ?>
                                    </span>
                                    <span id="member-branch1-<?php echo $j; ?>" class="member-branch1">
                                        <b>Branch:</b> <?php echo $registered_member->branch1; ?>
                                    </span>
                            	</li>               
<?php } ?>
							</ol>
<?php } ?>
						</div> <!-- End of .loaded-section -->