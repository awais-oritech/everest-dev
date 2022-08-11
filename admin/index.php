<?php
		
	// Display Errors
	ini_set('display_errors', '1');

	// Configurations
	define("DEFAULT_LANGUAGE",1);
	
	// Set Turkish Time Zone
	date_default_timezone_set('Asia/Karachi');
	
	/*****************************************/
	/**********		DON'T EDIT		**********/
	/*****************************************/
	define("BASE_URL",dirname(__FILE__));
	// function __autoload ($class_name) {
	// 	$class_name = 'classes/' . $class_name . '.class.php';
	// 	include_once ($class_name);
	// }
	function my_autoloader($class) {
	    include 'classes/' . $class . '.class.php';
	  //  include 'admin/vendor/autoload.php';
	}
	spl_autoload_register('my_autoloader');
	
	// Database
  include("database/database.local.php");
  //include("includes/functions.php");
  
	//Start Session
	Session::Create();
	// Connect Database
	$DB = new DB();
	global $DB;
	Gateway::Process(Request::Parameters());
	//Process Request
	// $params=Request::Parameters();
	// if(isset($params) && !empty($params[0]) && $params[0]=='api' ){
	// 	unset($params[0]);
	// 	$params=array_values($params);
	// 	Api::Process($params);	
	// }else{
	// 	Gateway::Process(Request::Parameters());
	// }
?>
