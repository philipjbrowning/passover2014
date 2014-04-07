<?php
// For testing purposes
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

//defined('SITE_ROOT') ? null : 
//	define('SITE_ROOT', 'C:'.DS.'wamp'.DS.'www'.DS.'2014');
	
//defined('SITE_ROOT') ? null : 
//	define('SITE_ROOT', DS.'Users'.DS.'eunjungkim'.DS.'Sites'.DS.'2014');

defined('SITE_ROOT') ? null :
	define('SITE_ROOT', DS.'Users'.DS.'philipjbrowning'.DS.'Websites'.DS.'passover2014_new');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

// load config file first
require_once(LIB_PATH.DS.'config.php');

// load basic functions next so that everything after can use them
require_once(LIB_PATH.DS.'functions.php');

// load core objects
require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.DS.'database.php');

// load database-related classes
require_once(LIB_PATH.DS.'user.php');
require_once(LIB_PATH.DS.'member.php'); 
require_once(LIB_PATH.DS.'zion.php');
require_once(LIB_PATH.DS.'zion-list.php');

// Add this due to time zone error:EJK
date_default_timezone_set('America/New_York');

define('THIS_YEAR', date("Y"));
?>