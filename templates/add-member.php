<?php
include("../includes/initialize.php");

$orderby = @$_GET['orderby'];
$asc_desc = @$_GET['asc_desc'];
if (!$orderby) $orderby = "reg_time";
if (!$asc_desc) $asc_desc = "DESC";	

?>
                        <div id="add-register-member-page" class="loaded-section">
                            <h2>Add Member</h2>
                            <div id="validation-wrap">
                                <p><span id="validationText" class="greenText">Ready</span></p>
                            </div>
                            <form id="add-member-form" name="add-member-form" action="" method="post">
                            	<fieldset class="noborder">
                                <div id="card" name="card">
                                    <table>
                                        <tr>
                                            <th>Zion Name*</th>
                                            <th colspan="2">First Name*</th>
                                            <th>Middle Name</th>
                                            <th colspan="3">Last Name*</th>
                                        </tr>
                                        <tr>
                                            <td rowspan="6">
                                                <input id="zion-4" class="zion" type="radio" value="4" name="zion"> BELLEVILLE, NJ<br />
                                                <span class="zion-divider">----------------------------</span><br />
<?php
$zions = ZionList::find_local();
foreach($zions as $zion) {
?>
												<input type="radio" id="zion-<?php echo $zion->id; ?>" class="zion" name="zion" value="<?php echo $zion->id; ?>"<?php if($zion->id == 1) { echo ' checked="checked"'; } ?>/> <?php echo $zion->name; ?><br />
<?php } ?>
												<input type="radio" id="zion-other" class="zion" name="zion" value="other" /> Other Zion
                                            </td>
                                            <td colspan="2"><input type="text" id="first_name" name="first_name" value="" maxlength="30" /></td>
                                            <td><input type="text" id="middle_name" class="validInput" name="middle_name" value="" maxlength="30" /></td>
                                            <td colspan="3"><input type="text" id="last_name" name="last_name" value="" maxlength="30" /></td>
                                        </tr>						
                                        
                                        <tr>
                                            <th colspan="2" class="required">Birthday*</th>
                                            <td> 
                                            <input type="text" id="BIRmm" name="BIRmm" value="" class="BIR-short" size="2" maxlength="2" placeholder="MM" />-
                                            <input type="text" id="BIRdd" name="BIRdd" value="" class="BIR-short" size="2" maxlength="2" placeholder="DD" />-
                                            <input type="text" id="BIRyy" name="BIRyy" value="" class="BIR-short" size="2" maxlength="2" placeholder="YY" />
                                            </td>
                                            <th class="required">Gender*</th>
                                            <td colspan="2">
                                                <input type="radio" value="F" id="female-gender" name="gender" class="gender" />Female<br />
                                                <input type="radio" value="M" id="male-gender" name="gender" class="gender" />Male
                                            </td>
                                        </tr> 
                                        <tr>
                                            <th colspan="2" class="required">Life Number</th>
                                            <td colspan="4">
                                            <input type="text" id="life_no_1" name="life_no_1" value="" class="ex-short validInput" size="2" maxlength="3" placeholder="A00" />-
                                            <input type="text" id="life_no_2" name="life_no_2" value="" class="ex-short validInput" size="6" maxlength="6" placeholder="YYMMDD" />-
                                            <input type="text" id="life_no_3" name="life_no_3" value="" class="ex-short validInput" size="10" maxlength="10" placeholder="00000" /></td>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="required">Phone Number*</th>
                                            <td colspan="2">&nbsp; 
                                             (<input type="text" id="phone_1" name="phone_1" value="" class="ex-short phone" size="3" maxlength="3" placeholder="000" />
                                            )<input type="text" id="phone_2" name="phone_2" value="" class="ex-short phone" size="3" maxlength="3" placeholder="000" />-
                                            <input type="text" id="phone_3" name="phone_3" value="" class="ex-short" size="4" maxlength="4" placeholder="0000" />
                                            </td>
                                            <th class="required">Arrival Time</th>
                                            <td>LATE<br /><input type="checkbox" id="late_registration" name="late_registration" value="1" /></td>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="required">Branch #1</th>
                                            <td colspan="4"><input type="text" id="branch1" name="branch1" value="" class="" maxlength="70" placeholder="Full Name" /></td>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="required">Branch #2</th>
                                            <td colspan="4"><input type="text" id="branch2" name="branch2" value="" class="validInput" maxlength="70" placeholder="Full Name" /></td>
                                        </tr>
                                        <tr>
                                            <th class="required">Other Zion:<br />
                                            <input type="text" id="church" name="church" value="" class="" maxlength="20" style="border-bottom:1px solid #333;" disabled="disabled" />
                                            </th>
                                            <th colspan="2" class="required">Comment</th>
                                            <td colspan="4"><input type="text" id="comment" name="comment" value="" class="validInput"  maxlength="100" /></td>
                                        </tr>
                                    </table>
                                    <p>* These fields are required.</p>
                                </div> <!-- End of #card -->
                            </fieldset>
                            <input type="hidden" id="registerer_id" name="registerer_id" value="<?php echo $_SESSION['user_id']; ?>" />
                            </form>
                            <div>
                                <!-- <button id="reset" name="reset" value="Reset">Reset</button> -->
                                <button id="add-member" name="add-member" value="Add">Add</button>
                                <button id="add-register-member" name="add-register-member" value="Add & Register">Add & Register</button>
                            </div>
                            <!-- /add member form-->
                        </div> <!-- End of .loaded-section -->
                        <script type="text/javascript" src="js/input-validation.js"></script>
                        <script type="text/javascript">
                            $("#zion-1").focus();
                        </script>