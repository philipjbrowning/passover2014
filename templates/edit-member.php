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
                                                    foreach($zions as $zion) {
                                                        ?>
                                                        <input type="radio" class="zion" name="zion" value="<?php echo $zion->id; ?>" /> <?php echo $zion->name; ?><br />
                                                    <?php } ?>
                                                    <input type="radio" class="zion" name="zion" value="other" /> Other Zion
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
                                                    <input type="radio" value="F" name="gender" class="gender" />Female<br />
                                                    <input type="radio" value="M" name="gender" class="gender" />Male
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
                                                    (<input type="text" id="phone_1" name="phone_1" value="" class="ex-short phone validInput" size="3" maxlength="3" placeholder="000" />
                                                    )<input type="text" id="phone_2" name="phone_2" value="" class="ex-short phone validInput" size="3" maxlength="3" placeholder="000" />-
                                                    <input type="text" id="phone_3" name="phone_3" value="" class="ex-short" size="4" maxlength="4" placeholder="0000" />
                                                </td>
                                                <th class="required">Arrival Time</th>
                                                <td>LATE<br /><input type="checkbox" id="late_registration" name="late_registration" value="1" /></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="required">Branch #1</th>
                                                <td colspan="4"><input type="text" id="branch1" name="branch1" value="<?php echo $theMember->branch1; ?>" class="validInput" maxlength="70" placeholder="Full Name" /></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="required">Branch #2</th>
                                                <td colspan="4"><input type="text" id="branch2" name="branch2" value="<?php echo $theMember->branch2; ?>" class="validInput" maxlength="70" placeholder="Full Name" /></td>
                                            </tr>
                                            <tr>
                                                <th class="required">Other Zion:<br />
                                                    <input type="text" id="church" name="church" value="" class="" maxlength="20" style="border-bottom:1px solid #333;" disabled="disabled" />
                                                </th>
                                                <th colspan="2" class="required">Comment</th>
                                                <td colspan="4"><input type="text" id="comment" name="comment" value="<?php echo $theMember->comment; ?>" class="validInput"  maxlength="100" /></td>
                                            </tr>
                                        </table>
                                        <p>* These fields are required.</p>
                                    </div> <!-- End of #card -->
                                </fieldset>
                                <input type="hidden" id="registerer_id" name="registerer_id" value="<?php echo $_SESSION['user_id']; ?>" />
                            </form>
                            <div>
                                <button id="reset" name="reset" value="Reset">Reset</button>
                                <button id="add-member" name="add-member" value="Add">Add</button>
                                <button id="add-register-member" name="add-register-member" value="Add & Register">Add & Register</button>
                            </div>
                            <!-- /add member form-->
                        </div> <!-- End of .loaded-section -->