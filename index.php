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
            		<span id="user-name-<?php echo @$_SESSION['user_id']; ?>" class="user-name"><?php echo @$_SESSION['user_name'];?></span>
                </div> <!-- End of #current-user -->
            </div> <!-- End of #current-user-wrap -->
            <div id="menu-wrap">
            	<ul id="menu">
                	<li class="menu-title">Registration</li>
                    <li class="add-member li-link"><a href="#add-member">Add Member</a></li>
                	<li class="register-member li-link"><a href="#registered-member-list">Register Member</a></li>
                    <!-- <li class="confirm-attendance li-link"><a href="#registered-member-list">Confirm Attendance</a></li> -->
                	<li class="menu-title">Member Lists</li>
                    <li class="registered-member-list li-link"><a href="#registered-member-list">Registered Members</a></li>
                    <!-- <li class="confirmed-member-list li-link"><a href="#confirmed-member-list">Confirmed Members</a></li>
                    <li class="visiting-member-list li-link"><a href="#visiting-member-list">Visiting Members</a></li> -->
                    <li class="member-list li-link"><a href="#member-list">All Members</a></li>
                    <!-- <li class="menu-title">Reports</li>
                    <li class="li-link"><a href="reports/index.php" target="_blank">All Zions</a></li>
                    <li class="li-link"><a href="reports/index.php?report_name=belleville" target="_blank">Belleville, NJ</a></li>
                    <li class="li-link"><a href="reports/index.php?report_name=ny" target="_blank">New York Zion</a></li>
                    <li class="li-link"><a href="reports/index.php?report_name=visiting" target="_blank">Visiting Zions</a></li> -->
                </ul> <!-- End of #menu -->
            </div> <!-- End of #menu-wrap -->
            <!--
            <div id="user-list-wrap">
            	<ol id="user-list">
                	<li class="menu-title">User Status</li>
                    <li class="user-online">Alex Betancur</li>
                    <li>Alexa Bolanos</li>
                    <li class="user-online">Angle Pagan</li>
                    <li class="user-online">B. Alex Betancur</li>
                    <li>S. Claudia Castillo</li>
                    <li class="user-online">B. Enrique Bullon</li>
                    <li>Eun-Jin Cho</li>
                    <li>D. Eunjung Kim</li>
                    <li class="user-online">Geward Henriquez</li>
                    <li class="user-online">B. Harvey Feliz</li>
                    <li>D. Jimi(Anne) Ahn</li>
                    <li>D. Joo Yeon Han</li>
                    <li>S. Jessica Milito</li>
                    <li>S. Lily Kim</li>
                    <li class="user-online">B. Moon Seok Kang</li>
                    <li>S. Okjin Shin</li>
                    <li class="user-online">B. Philip Browning</li>
                    <li>S. Rocio Gonzales</li>
                    <li>S. Yun-Jeong Baek</li>
                </ol> <!-- End of #user-list
            </div> <!-- End of #user-list-wrap
            -->
        </div> <!-- End of #sidebar -->
        <div id="container" class="alignLeft">
			<header id="header">
            	<ul id="header-menu" class="header-height">
                	<li><span id="title">Passover 2014</span></li>
                    <li><span id="confirmed-count">&nbsp;</span>&nbsp;</li>
                    <li><a href="logout.php">Logout</a></li>
                </ul> <!-- End of #header-menu -->
            </header> <!-- End of #header -->
			<div id="main">
				<div id="loaded-page-wrap" class="alignLeft">
                	<div id="loaded-page">
                    	&nbsp; <!-- content loaded via AJAX -->
                    </div> <!-- End of #home-page -->
                </div> <!-- End #loaded-page -->
                <div id="right-wrap" class="alignLeft">
                    <div id="your-count-wrap" class="count-feed">
                        <h2>Count</h2>
                        <ul id="your-count">
                            <li id="count-registered"><b>Registered (You/All):</b></li>
                            <li id="count-confirmed"><b>Confirmed (You/All):</b></li>
                        </ul> <!-- End #count -->
                    </div> <!-- End #your-count-wrap -->
                    <div id="news-feed-wrap" class="count-feed">
                        <h2>Your Activity</h2>
                        <ul id="news-feed-<?php echo @$_SESSION['user_id']; ?>" class="news-feed"></ul>
                    </div> <!-- End #news-feed -->
                </div> <!-- End of #right-wrap -->
            </div> <!-- End of #main -->
			<footer id="footer" class="alignLeft">
				<div id="copyright">
                	<p>Copyright &copy; <?php echo THIS_YEAR; ?> Church of God. All rights reserved.</p>
                </div> <!-- End of #copyright -->
            </footer>
		</div> <!--! end of #container -->
<?php include_layout_template('footer'); ?>