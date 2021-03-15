<?php

define( 'SWEET_URL', get_stylesheet_directory() );
define( 'SWEET_PATH', get_stylesheet_directory_uri() );

// Autoload class
include  SWEET_URL.'/int/autoload.php';
include  SWEET_URL.'/admin/admin.php';

// Frontend enqueue
add_action( 'wp_enqueue_scripts', 'sekolahan_enqueue_styles' );
function sekolahan_enqueue_styles() {
		wp_enqueue_style( 'parent-style', SWEET_URL . '/style.css' ); 
}

// Admin Enqueue
function justg_admin_script()
{
    // $pagenow, is a global variable referring to the filename of the current page, 
    // such as ‘admin.php’, ‘post-new.php’
    global $pagenow;
 
    // if ($pagenow != 'admin.php') {
    //     return;
    // }
     
    // loading css
    wp_enqueue_style( 'dataTables-css', '//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css', false, '1.0.0' );
    wp_enqueue_style( 'dataTables-css' );
     
    // loading js
    wp_enqueue_script( 'jquery-js', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'dataTables-js', '//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'admin-js', SWEET_PATH . '/src/js/admin.min.js', array('jquery'), false, true );
} 
add_action( 'admin_enqueue_scripts', 'justg_admin_script' );

// List table siswa
$siswaargs = [
    'nama' => 'VARCHAR(50) NOT NULL',
    'phone' => 'int(15) NOT NULL',
	'kelas' => 'VARCHAR(114) NOT NULL',
    'email' => 'VARCHAR(114) NOT NULL',
    'alamat' => 'text(225) NOT NULL',
    'jenis_kelamin' => 'text(225) NOT NULL',
    'tempat_lahir' => 'text(225) NOT NULL',
    'tanggal_lahir' => 'DATETIME NOT NULL',
    'nama_ayah' => 'VARCHAR(50) NOT NULL',
    'nama_ibu' => 'VARCHAR(50) NOT NULL',
    'nama_wali' => 'VARCHAR(50) NOT NULL',
	'saudara' => 'VARCHAR(50) NOT NULL',
    'pendapatan_ortu' => 'VARCHAR(50) NOT NULL',
    'spp' => 'INT(15) NOT NULL',
    'created' => 'DATETIME NOT NULL',
];

// Contoh data siswa
$baru = [ 
	'Andin', 
	'082147650800',
	'8a',
	'wandi@gmail.com', 
	'Tunggul, jarum, Bayat, Klaten', 
	'Perempuan', 
	'Klaten', 
	'1990-05-3', 
	'Dadang', 
	'Yiyin',
	1231,
	5000000,
	100000,
	date('Y-m-d H:i:s')];

// Create table siswa

$data_siswa = new ManageTable('data_siswa', $siswaargs);
$data_siswa->run();
// $data_siswa->insert($baru);
// $data_siswa->delete(1);
// $data_siswa->update(2,$update);


add_action( 'rest_api_init', function () {
    register_rest_route( 'siswa/v1', '/id/(?P<id>\d+)', array(
      'methods' => 'GET',
      'callback' => 'get_all_data_siswa',
    ) );
  } );

function get_all_data_siswa($id) {
    global $data_siswa;
    $json['data'] = $data_siswa->get();
    return $json;
    // return array(1,2,3,4,5);
}
