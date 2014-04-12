                        <div class="loaded-section">
                            <h2>View and Edit Register Members<span id="validationText"></span></h2>
                            <form id="search-form" action="">

                                <fieldset>
                                    <input id="search-member-list" type="text" value="" name="search-member" class="text" placeholder="Search by birthday first" />
                                </fieldset>
                            </form>

                            <button id="search-button" name="search-button" value="Search">Search</button>
                        </div> <!-- End of .loaded-section -->
                        <div id="registered-list-section" class="search-loaded-section loaded-section">
<?php
include("../includes/initialize.php");

// Save variables
$asc_desc     = @$_POST['asc_desc'];
$offset       = @$_POST['offset'];
$order_by     = @$_POST['order_by'];
$row_count    = @$_POST['row_count'];
$search_group = @$_POST['search_group'];
$search_text  = @$_POST['search_text'];

// Set defaults if necessary
$asc_desc = "DESC";
$offset = 0;
$order_by = "register_time";
$row_count = 100;
$search_group = "registered";
$search_text = "";

$theMembers = new Members;

$results = $theMembers->listMembers(@$_SESSION['user_id'], $search_text, $search_group, $order_by, $asc_desc, $offset, $row_count);
$count = $results->num_rows;
$result_set = array();
?>

                            <h2>Search Results</h2>
                            <div class="search-results-wrap">
                                <ol id="search-results">
                                    <?php
                                    while ($row = mysqli_fetch_object($results)) {
                                        $full_name = $row->first_name;
                                        if ($row->middle_name) {
                                            $full_name .= " ".$row->middle_name;
                                        }
                                        $full_name .= " ".$row->last_name;
                                        $time = date("g:i a", strtotime($row->register_time)); // Get time format 7:00pm from register_time
                                        ?>
                                        <li id="<?php echo $_POST['task']; ?>-result-<?php echo $row->id; ?>" class="<?php echo $_POST['task']; ?>-result search-result">
                                            <h3><?php echo $count; ?>. <span id="full-name-<?php echo $row->id; ?>" class="<?php if (($row->register_time != "0000-00-00 00:00:00") && ($row->confirmed == 'F')) { echo "search-registered "; } ?><?php if ($row->confirmed == 'T') { echo "search-confirmed "; } ?>"><?php echo $full_name; ?></span> (<?php echo $row->life_number; ?>) - Registered at <?php echo $time; ?></h3>
                                            <ul>
                                                <li><b>Gender:</b> <?php if($row->gender == 'F') { echo "Female"; } else if($row->gender == 'M') { echo "Male"; } else { echo "Unknown"; } ?> | <b>Birthday:</b> <?php if($row->birth_date == '0000-00-00') { echo "Unknown"; } else { echo $row->birth_date; } ?> | <b>Baptism:</b> <?php if($row->baptism_date == '0000-00-00') { echo "Unknown"; } else { echo $row->baptism_date; } ?></li>
                                                <li><b>Zion:</b> <?php echo $row->zion_name; ?> | <b>Phone:</b> <?php echo $row->cell_phone; // Previously home_phone ?> | <b>Branch:</b> <?php echo $row->branch1; ?></li>
                                            </ul>
                                            <p>
                                                <button id="edit-member-<?php echo $row->id; ?>" name="edit-member-<?php echo $row->id; ?>" class="edit-member-button" value="<?php echo $row->id; ?>" onclick="editMember(<?php echo $row->id; ?>)">Edit</button>
                                            </p>
                                        </li>
                                    <?php
                                        $count--;
                                    }
                                    if ($results->num_rows == 0) { ?>
                                        <li>No members found</li>
                                    <?php } ?>
                                </ol> <!-- End of #search-results -->
                            </div> <!-- End of #member-list -->
                        </div> <!-- End of .loaded-section -->
                        <script type="text/javascript" src="js/list-members.js"></script>