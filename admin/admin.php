<?php


/**
 * Register siswa menu page.
 */
function siswa_menu_page() {
    add_menu_page(
        __( 'Siswa', 'textdomain' ),
        'Siswa',
        'manage_options',
        'siswa',
        'page_siswa',
        SWEET_URL . '/img/siswa.png',
        6
    );
}
add_action( 'admin_menu', 'siswa_menu_page' );

/**
 * Display siswa
 */
function page_siswa(){
    require_once( SWEET_URL.'/admin/siswa/siswa.php' ); 
}