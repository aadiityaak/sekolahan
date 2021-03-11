<?php

define( 'SWEET_URL', get_stylesheet_directory() );

require_once( SWEET_URL.'/admin/admin.php' );

// load all class
function class_autoload ($ClassName) {
	$path = SWEET_URL . '/class/'.$ClassName.'.php';
	if (file_exists($path)) {
		require_once( $path );
	}
}
spl_autoload_register("class_autoload");

add_action( 'wp_enqueue_scripts', 'sekolahan_enqueue_styles' );
function sekolahan_enqueue_styles() {
		wp_enqueue_style( 'parent-style', SWEET_URL . '/style.css' ); 
} 

$TableSiswa = new TableSiswa();
$TableSiswa->run();