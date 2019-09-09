<?php 

// echo "<p>Admin</p>index.php";

ob_start();
session_start();

require_once '../system/sabitler.php';
require_once '../system/functions.php'; 
require_once '../system/database.php';

if ( !isset($_SESSION["admin"]) ) {
	require_once 'app/login.php';
	exit();
}

define("ADMIN","true");

// echo "oturum başlamış";

if ( !get("url")) {
	$file = "app/dashboard.php";
}else{
	$file = "app/". get("url") .".php";
}

// echo $file;

if (file_exists($file)) {
	require_once $file;
}else{
	echo "Dosya Bulunamadı..";
	exit();
}

// require 'app/dashboard.php';
// require 'app/login.php';

ob_end_flush();