<?php
// For testing purposes
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once("../includes/initialize.php");
?>


<?php
// ---------------------------------------------------------------------------------------------------------------------
// TEST create_member()
// ---------------------------------------------------------------------------------------------------------------------

echo "<h2>create_member()</h2>";
$myMember = new Member;
$myMember->first_name = "Jordan";
$myMember->middle_name = "Micahel";
$myMember->last_name = "Goggins";
$myMember->gender = 'M';
$myMember->birth_date = "1986-02-01";
$myMember->zion_name = "Knoxville, TN";
$myMember->life_number = "Q02-140409-2321";
$myMember->home_phone = "201-343-2312";
$myMember->address = "307 W 36th St";
$myMember->city = "New York";
$myMember->state = "NY";
$myMember->zip_code = "10012";
$myMember->branch1 = "John Doe";
$myMember->branch2 = "Jane Smith";
$myMember->late_registration = "F";
$myMember->confirmed = "F";
$myMember->comments = "None";
$member_id = null;

if ($member_id = $myMember->save()) {
    echo "<p>ID = $member_id</p>";
} else {
    echo "<p>Could not create the member</p>";
}
?>

<?php
// ---------------------------------------------------------------------------------------------------------------------
// TEST update_member()
// ---------------------------------------------------------------------------------------------------------------------
echo "<h2>update_member()</h2>";
$myMember->last_name = "Richardson";
if ($myMember->save()) {
    echo "<p>Member has been updated.</p>";
} else {
    echo "<p>Could not update member.</p>";
}
?>


<?php
// ---------------------------------------------------------------------------------------------------------------------
// TEST register()
// ---------------------------------------------------------------------------------------------------------------------
echo "<h2>register()</h2>";
$user_id = 3;
if ($myMember->register($user_id)) {
    echo "<p>Registered member</p>";
} else {
    echo "<p>Could not register member</p>";
}
?>


<?php
// ---------------------------------------------------------------------------------------------------------------------
// TEST confirm()
// ---------------------------------------------------------------------------------------------------------------------
echo "<h2>confirm()</h2>";
$user_id = 3;
if ($myMember->confirm($user_id)) {
    echo "<p>Confirmed member</p>";
} else {
    echo "<p>Could not confirm member</p>";
}
?>


<?php
// ---------------------------------------------------------------------------------------------------------------------
// TEST get_full_name()
// ---------------------------------------------------------------------------------------------------------------------
echo "<h2>get_full_name()</h2>";
$myMember = new Member;
echo '<p>full name = '.$myMember->get_full_name().'</p>';
$myMember->first_name = "Philip";
echo '<p>full name = '.$myMember->get_full_name().'</p>';
$myMember->last_name = "Browning";
echo '<p>full name = '.$myMember->get_full_name().'</p>';
$myMember->middle_name = "Juan";
echo '<p>full name = '.$myMember->get_full_name().'</p>';
?>

<?php
// ---------------------------------------------------------------------------------------------------------------------
// TEST select_member()
// ---------------------------------------------------------------------------------------------------------------------
echo "<h2>select_member()</h2>";
$myMember = new Member;
$id = 3;
$myMember->select_member($id);
echo '<p>id = '.$myMember->get_id().'</p>';
echo '<p>first_name = '.$myMember->first_name.'</p>';
echo '<p>middle_name = '.$myMember->middle_name.'</p>';
echo '<p>last_name = '.$myMember->last_name.'</p>';
echo '<p>gender = '.$myMember->gender.'</p>';
echo '<p>birth_date = '.$myMember->birth_date.'</p>';
echo '<p>zion_name = '.$myMember->zion_name.'</p>';
echo '<p>life_number = '.$myMember->life_number.'</p>';
echo '<p>address = '.$myMember->address.'</p>';
echo '<p>city = '.$myMember->city.'</p>';
echo '<p>state = '.$myMember->state.'</p>';
echo '<p>zip_code = '.$myMember->zip_code.'</p>';
echo '<p>branch1 = '.$myMember->branch1.'</p>';
echo '<p>branch2 = '.$myMember->branch2.'</p>';
echo '<p>register_time = '.$myMember->get_register_time().'</p>';
echo '<p>late_registration = '.$myMember->late_registration.'</p>';
echo '<p>confirmed = '.$myMember->confirmed.'</p>';
echo '<p>comments = '.$myMember->comments.'</p>';
?>

<?php
// ---------------------------------------------------------------------------------------------------------------------
/*
$myMember->first_name = "ASYSHA";
$result = $myMember->save();
echo '<pre>';
print_r($result);
echo '</pre>';
$myMember->zion_name = "MEMPHIS, TN";
$result = $myMember->save();
echo '<pre>';
print_r($result);
echo '</pre>';
*/
// ------------------------------------------------------
?>