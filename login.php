<?php
// For testing purposes
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

require_once("includes/initialize.php");

// Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['submit'])) { // Form has been submitted.
	
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	
	// Check database to see if username/password exist.
	$found_user = User::authenticate($username, $password);
	
	if ($found_user) {
		$session->login($found_user);
		log_action('Login', "{$found_user->username} logged in.");
		
		redirect_to("index.php");
	} else {
		// username/password combo was not found in the database
		$message = "Username/password combination incorrect.";
	}
} else { // Form has not been submitted.
	$username = "";
	$password = "";
}
?>
<?php include_layout_template('header'); ?>
        <div id="container-wide">
        	<h1>Passover 2014 Login</h1>
            <?php echo output_message($message); ?>
			
            <form action="login.php" method="post" id="login-form">
            <fieldset>
            
            <label>Username: </label> 
            <input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>" />
            &nbsp; &nbsp; &nbsp; 
            <label>Password: </label>
            <input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" /><br /><br />
            <input type="submit" name="submit" value="  Login  " />
            
            </fieldset>
            </form>
        </div> <!-- End of #container-wide -->
<?php include_layout_template('footer'); ?>