<?php

define( 'SWEET_URL', get_stylesheet_directory() );

include  SWEET_URL.'/int/autoload.php';

add_action( 'wp_enqueue_scripts', 'sekolahan_enqueue_styles' );
function sekolahan_enqueue_styles() {
		wp_enqueue_style( 'parent-style', SWEET_URL . '/style.css' ); 
}


$args = [
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
	'saudara' => 'VARCHAR(50) NOT NULL',
    'pendapatan_ortu' => 'VARCHAR(50) NOT NULL',
    'spp' => 'INT(15) NOT NULL',
    'created' => 'DATETIME NOT NULL',
];

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

$data_siswa = new ManageTable('data_siswa', $args);
$data_siswa->run();
// $data_siswa->insert($baru);
// $data_siswa->delete(1);
// $data_siswa->update(2,$update);