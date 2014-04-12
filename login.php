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
    <!doctype html>
    <!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
    <!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
    <!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
    <!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
    <!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
    <!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <!-- Use the .htaccess and remove these lines to avoid edge case issues.
           More info: h5bp.com/b/378 -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Passover 2014 Registration</title>
        <meta name="description" content="">
        <meta name="author" content="Church of God">

        <!-- Mobile viewport optimized: j.mp/bplateviewport -->
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

        <!-- CSS: implied media=all -->
        <!-- CSS concatenated and minified via ant build script-->
        <link rel="stylesheet" href="css/style.css">
        <!-- end CSS-->

        <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

        <!-- All JavaScript  -->
        <script src="js/libs/modernizr-2.0.6.min.js"></script>
        <script src="js/libs/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
        <!-- end scripts-->
    </head>

<body class="body-login">
<div id="page">
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