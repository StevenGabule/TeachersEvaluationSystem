<?php


ob_start();
date_default_timezone_set('Asia/Manila');
$webroot = 'C:/laragon/www/';
define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT', $webroot.DS.'SaitEvaluationSystem');
define('INCLUDES_PATH',SITE_ROOT.DS.'include');
require_once(INCLUDES_PATH.DS. 'Helper.php');
require_once(INCLUDES_PATH.DS. 'config.php');
require_once(INCLUDES_PATH.DS. 'database.php');
require_once(INCLUDES_PATH.DS. 'db_object.php');
require_once(INCLUDES_PATH.DS. 'Session.php');
require_once(INCLUDES_PATH.DS. 'Users.php');
require_once(INCLUDES_PATH.DS. 'Survey.php');
require_once(INCLUDES_PATH.DS. 'Subjects.php');
require_once(INCLUDES_PATH.DS. 'Teacher.php');
require_once(INCLUDES_PATH.DS. 'Students.php');
