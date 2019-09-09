<?php 

if ( !defined("ADMIN") ) { die("Kullanıcı Girişi Yapın.."); }

if ( !get("id") ) {
	header("location:index.php");exit();
}

$id = (int)get("id");

$db->sql = "select * from yorum where yorum_id=?";
$db->veri = array( $id );

$yorum = $db->select(1);

if ( $yorum == false ) {
	header("location:index.php");exit();
}

$db->sql = "update yorum set yorum_onay=? where yorum_id=?";
$db->veri = array( 1, $id);
$db->update();

header("location:index.php?url=yorumlar");exit();