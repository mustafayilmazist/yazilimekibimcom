<?php 

function pr($param)
{
	echo "<pre>"; print_r($param); echo "</pre>";
}

/**
 * [pisset $_POST dizisinin varlığını kontrol eder]
 * @return [true/false] [var ise true yok ise false döndürür.]
 */
function pisset()
{
	if( $_POST ){ return true; }else{ return false; }
}
/**
 * [pisset $_GET dizisinin varlığını kontrol eder]
 * @return [true/false] [var ise true yok ise false döndürür.]
 */		
function gisset()
{
	if( $_GET ){ return true; }else{ return false; }
}
/**
 * [post $_POST[$param] var ise kendisini geri döndürür. boşlukları siler.]
 * @param  [string] $param [post içindeki değişkenin ismi]
 * @return [string/false]        [var ise / yok ise]
 */
function post($param)
{
	if (isset($_POST[$param])) {
		return trim($_POST[$param]);
	}else{
		return false;
	}
}
/**
 * [post $_GET[$param] var ise kendisini geri döndürür. boşlukları siler.]
 * @param  [string] $param [get içindeki değişkenin ismi]
 * @return [string/false]        [var ise / yok ise]
 */		
function get($param)
{
	if (isset($_GET[$param])) {
		return trim($_GET[$param]);
	}else{
		return false;
	}
}