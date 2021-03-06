<?php

class TableSiswa {

    private
        $wpdb,
        $table_prefix,
        $charset_collate;
    
    
    public function __construct() {
        global $wpdb;
    
        $this->wpdb = $wpdb;
        $this->table_prefix = $this->wpdb->prefix . 'data_buku';
        $charset_collate = $this->wpdb->get_charset_collate();
    
    }
    
    public function run() {
    
        $table_name = $this->table_prefix;
        
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        $sql = "CREATE TABLE IF NOT EXISTS $table_name ( 
        id int(11) NOT NULL AUTO_INCREMENT,
        nama VARCHAR(50) NOT NULL,
        harga int(15) NOT NULL,
        sampul VARCHAR(50) NOT NULL,
        created DATETIME NOT NULL,
        PRIMARY KEY  (id)
        ) $this->charset_collate;";
    
        dbDelta($sql);
    
    }
    
}