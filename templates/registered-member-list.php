<?php
include("../includes/initialize.php");

// Save variables
$asc_desc = @$_GET['asc_desc'];
$order_by = @$_GET['order_by'];
$offset  = @$_GET['offset'];
$row_count  = @$_GET['row_count'];

// Set to default if necessary
if (!$asc_desc) $asc_desc = "DESC";
if (!$order_by) $order_by = "register_time";
if (!$offset) $offset = "register_time";
if (!$row_count) $row_count = "register_time";

// $registered_members = Member::registered_members($_SESSION['user_id'], $orderby, $asc_desc);
// echo "<pre>";
// print_r($registered_members);
// echo "</pre>";
// exit();
?>
                        <div class="loaded-section">
                            <h2>View Register Members<span id="validationText"></span></h2>
                            <form id="search-form" action="">

                                <fieldset>
                                    <input id="search-member" type="text" value="" name="search-member" class="text" placeholder="Search by birthday first" />
                                </fieldset>
                            </form>

                            <button id="search-button" name="search-button" value="Search">Search</button>
                        </div> <!-- End of .loaded-section -->
                        <div id="search-loaded-section" class="loaded-section">
                            <h2>Search Results (0)</h2>
                            <div class="search-results-wrap">
                                <ol id="search-results">
                                    <li>No search results.</li>
                                </ol> <!-- End of #search-results -->
                            </div> <!-- End of #member-list -->
                        </div> <!-- End of .loaded-section -->
                        <script type="text/javascript" src="js/search.js"></script>
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