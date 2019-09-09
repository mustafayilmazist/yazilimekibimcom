<?php 

// echo "<p>Site</p>index.php";

ob_start();

require 'system/sabitler.php';
require 'system/functions.php';
require 'system/database.php';

if (get("url")) {

	$file = "app/".get("url").".php";

}else{

	$file = 'app/anasayfa.php';

}

if (file_exists($file)) {
	require $file;
}else{
	echo "Dosya Bulunamadı..";
	exit();		
}

ob_end_flush();