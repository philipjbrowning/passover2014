<?php
// For testing purposes
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once("includes/initialize.php");

if(!$session->is_logged_in()) {
	header("Location: login.php");
}
?>
<?php include_layout_template('header'); ?>
		<div id="sidebar" class="alignLeft sidebar">
        	<div id="current-user-wrap">
            	<div id="current-user" class="header-height">
            		<span id="current-user-img"><img id="user-picture" alt="User Picture" class="picture" src="" /><span id="user-name">&nbsp;</span></span>
                </div> <!-- End of #current-user -->
            </div> <!-- End of #current-user-wrap -->
            <div id="menu-wrap">
            	<ul id="menu">
                	<li class="menu-title">Registration</li>
                    <li class="add-member li-link"><a href="#add-member">Add Member</a></li>
                	<li class="register-member li-link"><a href="#registered-member-list">Register Member</a></li>
                    <li class="confirm-attendance li-link"><a href="#registered-member-list">Confirm Attendance</a></li>
                	<li class="menu-title">Reports</li>
                    <li class="registered-member-list li-link"><a href="#registered-member-list">Registered Members</a></li>
                    <li class="confirmed-member-list li-link"><a href="#confirmed-member-list">Confirmed Members</a></li>
                    <li class="visiting-member-list li-link"><a href="#visiting-member-list">Visiting Members</a></li>
                    <li class="member-list li-link"><a href="#member-list">All Members</a></li>
                </ul> <!-- End of #menu -->
            </div> <!-- End of #menu-wrap -->
            <div id="user-list-wrap">
            	<ol id="user-list">
                	<li class="menu-title">User Status</li>
                    <li class="user-online">B. Enrique Bullon</li>
                    <li class="user-online">B. Harvey Feliz</li>
                    <li class="user-online">B. Philip Browning</li>
                    <li class="user-online">B. Moon Seok Kang</li>
                    <li>D. Jimi(Anne) Ahn</li>
                    <li>D. Joo Yeon Han</li>
                	<li>S. Claudia Castillo</li>
                    <li>S. Jessica Milito</li>
                    <li class="user-online">S. Lily Kim</li>
                    <li>S. Okjin Shin</li>
                    <li>S. Rocio Gonzales</li>
                    <li>S. Yun-Jeong Baek</li>
                </ol> <!-- End of #user-list -->
            </div> <!-- End of #user-list-wrap -->
        </div> <!-- End of #sidebar -->
        <div id="container" class="alignLeft">
			<header id="header">
            	<ul id="header-menu" class="header-height">
                	<li><span id="title">Passover 2014</span></li>
                    <li><span id="confirmed-count">&nbsp;</span>&nbsp;</li>
                    <li><a href="logout.php">Logout</a></li>
                </ul> <!-- End of #header-menu -->
            </header> <!-- End of #header -->
			<div id="main" role="main">
				<div id="loaded-page-wrap" class="alignLeft">
                	<div id="loaded-page">
                    	&nbsp; <!-- content loaded via AJAX -->
                    </div> <!-- End of #home-page -->
                </div> <!-- End #loaded-page -->
                <div id="right-wrap" class="alignLeft">
                    <div id="your-count-wrap" class="count-feed">
                        <h2>Your Count</h2>
                        <ul id="your-count">
                            <li id="count-registered"><b>Registered:</b></li>
                            <li id="count-confirmed"><b>Confirmed:</b></li>
                        </ul> <!-- End #count -->
                    </div> <!-- End #your-count-wrap -->
                    <div id="news-feed-wrap" class="count-feed">
                        <h2>Your Activity</h2>
                        <ul id="news-feed-<?php echo $session->user_id; ?>" class="news-feed"></ul>
                    </div> <!-- End #news-feed -->
                </div> <!-- End of #right-wrap -->
            </div> <!-- End of #main -->
			<footer>
				<div id="copyright">
                	<p>Copyright &copy; <?php echo THIS_YEAR; ?> Church of God. All rights reserved.</p>
                </div> <!-- End of #copyright -->
            </footer>
		</div> <!--! end of #container -->
<?php include_layout_template('footer'); ?>