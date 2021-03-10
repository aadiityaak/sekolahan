<?php
require_once( get_stylesheet_directory() . '/class/TableSiswa.php' );

add_action( 'wp_enqueue_scripts', 'sekolahan_enqueue_styles' );
function sekolahan_enqueue_styles() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 

$TableSiswa = new TableSiswa();
$TableSiswa->run();