<?php

class TableSiswa {

    private
        $wpdb,
        $table_prefix,
        $charset_collate;
    
    
    public function __construct() {
        global $wpdb;
    
        $this->wpdb = $wpdb;
        $this->table_prefix = $this->wpdb->prefix . 'data_siswa';
        $charset_collate = $this->wpdb->get_charset_collate();
    
    }
    
    public function run() {
    
        $table_name = $this->table_prefix;
        
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        $sql = "CREATE TABLE IF NOT EXISTS $table_name ( 
        id int(11) NOT NULL AUTO_INCREMENT,
        nama VARCHAR(50) NOT NULL,
        hp int(15) NOT NULL,
        alamat text(225) NOT NULL,
        nama_ayah VARCHAR(50) NOT NULL,
        nama_ibu VARCHAR(50) NOT NULL,
        pendapatan_ortu VARCHAR(50) NOT NULL,
        saudara VARCHAR(50) NOT NULL,
        PRIMARY KEY  (id)
        ) $this->charset_collate;";
    
        dbDelta($sql);
    
    }
    
}