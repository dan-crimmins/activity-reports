<?php
/*
 Plugin Name: Communities Activity Reports
Description: Automated activity report generation.
Version: 1.0
Author: Dan Crimmins
*/

//Plugin paths
define('SHC_ACTIVITY_PATH', WP_PLUGIN_DIR . '/activity-reports/');
define('SHC_ACTIVITY_CLASS', SHC_ACTIVITY_PATH . 'class/');
define('SHC_ACTIVITY_VIEWS', SHC_ACTIVITY_PATH . 'view/');

 
/*
 * The key prefix used to store report data
   There will be shc-activity-report-sears-YYYY.MM.DD
   and shc-activity-report-kmart-YYYY.MM.DD
 */
 
define('SHC_ACTIVITY_REPORT_PREFIX', 'shc-activity-report-');


//Include the utils class - contains autoloader
require_once(SHC_ACTIVITY_CLASS . 'activity_utils.php');


//Register autoload function
spl_autoload_register(array('Activity_Utils', 'autoload'));