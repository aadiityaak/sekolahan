<?php
// load all class
function class_autoload ($ClassName) {
	$path = SWEET_URL . '/class/'.$ClassName.'.php';
	if (file_exists($path)) {
		require_once( $path );
	}
}
spl_autoload_register("class_autoload");