<?php 

if ( !defined("ADMIN") ) { die("Kullanıcı Girişi Yapın.."); }

session_destroy();
header("location:index.php?url=login");