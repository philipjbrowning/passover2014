<?php
/**
 * Created by PhpStorm.
 * User: philipjbrowning
 * Date: 4/8/14
 * Time: 5:09 PM
 */
include("../includes/initialize.php");

$theMember = new Member();
$theMember->select_member($_GET['member_id']);

list ($birth_year, $birth_month, $birth_day) = explode('-', $theMember->birth_date);
list ($life_no_1, $life_no_2, $life_no_3) = explode('-', $theMember->life_number);
list ($phone_1, $phone_2, $phone_3) = explode('-', $theMember->cell_phone);

$birth_year = substr($birth_year, 2, 2);
?>
                        <div id="add-register-member-page" class="loaded-section">
                            <h2>Edit Member<span id="validationText"></span></h2>
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
                                                    <?php
                                                    $zions = ZionList::find_local();
                                                    $zion_selected = false;
                                                    foreach($zions as $zion) {
                                                        ?>
                                                        <input type="radio" class="zion" name="zion" value="<?php echo $zion->id; ?>"<?php if($zion->name == $theMember->zion_name) { $zion_selected = true; echo ' checked="checked"'; } ?> /> <?php echo $zion->name; ?><br />
                                                    <?php } ?>
                                                    <input type="radio" class="zion" name="zion" value="other"<?php if(!$zion_selected) { echo ' checked="checked"'; } ?> /> Other Zion
                                                </td>
                                                <td colspan="2"><input type="text" id="first_name" class="validInput" name="first_name" value="<?php echo $theMember->first_name; ?>" maxlength="30" /></td>
                                                <td><input type="text" id="middle_name" class="validInput" name="middle_name" value="<?php echo $theMember->middle_name; ?>" maxlength="30" /></td>
                                                <td colspan="3"><input type="text" id="last_name" class="validInput" name="last_name" value="<?php echo $theMember->last_name; ?>" maxlength="30" /></td>
                                            </tr>

                                            <tr>
                                                <th colspan="2" class="required">Birthday*</th>
                                                <td>
                                                    <input type="text" id="BIRmm" name="BIRmm" value="<?php echo $birth_month; ?>" class="BIR-short validInput" size="2" maxlength="2" placeholder="MM" />-
                                                    <input type="text" id="BIRdd" name="BIRdd" value="<?php echo $birth_day; ?>" class="BIR-short validInput" size="2" maxlength="2" placeholder="DD" />-
                                                    <input type="text" id="BIRyy" name="BIRyy" value="<?php echo $birth_year; ?>" class="BIR-short validInput" size="2" maxlength="2" placeholder="YY" />
                                                </td>
                                                <th class="required">Gender*</th>
                                                <td colspan="2">
                                                    <input type="radio" value="F" name="gender" class="gender"<?php if($theMember->gender == "F") { echo ' checked="checked"'; } ?> />Female<br />
                                                    <input type="radio" value="M" name="gender" class="gender"<?php if($theMember->gender == "M") { echo ' checked="checked"'; } ?> />Male
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="required">Life Number</th>
                                                <td colspan="4">
                                                    <input type="text" id="life_no_1" name="life_no_1" value="<?php echo $life_no_1; ?>" class="ex-short validInput" size="2" maxlength="3" placeholder="A00" />-
                                                    <input type="text" id="life_no_2" name="life_no_2" value="<?php echo $life_no_2; ?>" class="ex-short validInput" size="6" maxlength="6" placeholder="YYMMDD" />-
                                                    <input type="text" id="life_no_3" name="life_no_3" value="<?php echo $life_no_3; ?>" class="ex-short validInput" size="10" maxlength="10" placeholder="00000" /></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="required">Phone Number*</th>
                                                <td colspan="2">&nbsp;
                                                    (<input type="text" id="phone_1" name="phone_1" value="<?php echo $phone_1; ?>" class="ex-short phone validInput" size="3" maxlength="3" placeholder="000" />
                                                    )<input type="text" id="phone_2" name="phone_2" value="<?php echo $phone_2; ?>" class="ex-short phone validInput" size="3" maxlength="3" placeholder="000" />-
                                                    <input type="text" id="phone_3" name="phone_3" value="<?php echo $phone_3; ?>" class="ex-short validInput" size="4" maxlength="4" placeholder="0000" />
                                                </td>
                                                <th class="required">Arrival Time</th>
                                                <td><label for="late_registration">LATE</label><br /><input type="checkbox" id="late_registration" name="late_registration" value="1"<?php if($theMember->late_registration == "T") { echo ' checked="checked"'; } ?> /></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="required"><label for="branch1">Branch #1</label></th>
                                                <td colspan="4"><input type="text" id="branch1" name="branch1" value="<?php echo $theMember->branch1; ?>" class="validInput" maxlength="70" placeholder="Full Name" /></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="required"><label for="branch2">Branch #2</label></th>
                                                <td colspan="4"><input type="text" id="branch2" name="branch2" value="<?php echo $theMember->branch2; ?>" class="validInput" maxlength="70" placeholder="Full Name" /></td>
                                            </tr>
                                            <tr>
                                                <th class="required"><label for="church">Other Zion:</label><br />
                                                    <input type="text" id="church" name="church" value="<?php if(!$zion_selected) { echo $theMember->zion_name; } ?>" class="validInput" maxlength="20" style="border-bottom:1px solid #333;" disabled="disabled" />
                                                </th>
                                                <th colspan="2" class="required"><label for="comments">Comment</label></th>
                                                <td colspan="4"><input type="text" id="comments" name="comments" value="<?php echo $theMember->comments; ?>" class="validInput"  maxlength="100" /></td>
                                            </tr>
                                        </table>
                                        <p>* These fields are required.</p>
                                    </div> <!-- End of #card -->
                                    <input type="hidden" id="member_id" name="member_id" value="<?php echo $theMember->id; ?>" />
                                </fieldset>
                                <input type="hidden" id="registerer_id" name="registerer_id" value="<?php echo $_SESSION['user_id']; ?>" />
                            </form>
                            <div id="actions-" class="action-buttons">
                                <p><b><span id="member-not-registered"<?php if($theMember->is_registered()) { echo ' class="hidden"'; } ?>>NOT </span>REGISTERED<span id="member-confirmed"<?php if(!$theMember->is_confirmed()) { echo ' class="hidden"'; } ?>> AND CONFIRMED</span>!</b></p>
                                <p><button id="register-member-<?php echo $theMember->id; ?>" class="register-member-btn" name="register-member-<?php echo $theMember->id; ?>" value="Register" onclick="registerMember(<?php echo $theMember->id; ?>, <?php echo $session->user_id; ?>, 'edit')"<?php if($theMember->is_registered()) { echo ' disabled="disabled"'; } ?>><span class="btn-text">Register</span></button>
                                <button id="un-register-member-<?php echo $theMember->id; ?>" class="un-register-member-btn" name="un-register-member-<?php echo $theMember->id; ?>" value="un-register-<?php echo $theMember->id; ?>" onclick="unRegisterMember(<?php echo $theMember->id; ?>, <?php echo $session->user_id; ?>, 'edit')"<?php if(!$theMember->is_registered() || $theMember->is_confirmed()) { echo ' disabled="disabled"'; } ?>>Un-Register</button>
                                <button id="confirm-member-<?php echo $theMember->id; ?>" class="confirm-member-btn" name="confirm-member-<?php echo $theMember->id; ?>" value="confirm-<?php echo $theMember->id; ?>" onclick="confirmMember(<?php echo $theMember->id; ?>, <?php echo $session->user_id; ?>, 'edit')"<?php if(!$theMember->is_registered() || $theMember->is_confirmed()) { echo ' disabled="disabled"'; } ?>>Confirm</button>
                                <button id="un-confirm-member-<?php echo $theMember->id; ?>" class="un-confirm-member-btn" name="un-confirm-member-<?php echo $theMember->id; ?>" value="un-confirm-<?php echo $theMember->id; ?>" onclick="unConfirmMember(<?php echo $theMember->id; ?>, <?php echo $session->user_id; ?>, 'edit')"<?php if(!$theMember->is_registered() || !$theMember->is_confirmed()) { echo ' disabled="disabled"'; } ?>>Un-Confirm</button>
                                <button id="update-member-<?php echo $theMember->id; ?>" class="update-member-btn" name="update-member-<?php echo $theMember->id; ?>" value="update-<?php echo $theMember->id; ?>" onclick="updateMember(<?php echo $theMember->id; ?>, <?php echo $session->user_id; ?>)">Update</button></p>
                            </div> <!-- End of .action-buttons -->
                            <!-- /add member form-->
                        </div> <!-- End of .loaded-section -->