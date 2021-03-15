<?php

class ManageTable {

    private
        $wpdb,
        $table_prefix,
        $charset_collate;
    
    public function __construct($name, array $args) {
        global $wpdb;
    
        $this->wpdb = $wpdb;
        $this->datas = $args;
        $this->table_prefix = $this->wpdb->prefix . $name;
        $charset_collate = $this->wpdb->get_charset_collate();
    
    }
    
    public function run() {
    
        $table_name = $this->table_prefix;
        
        $datas = $this->datas;
        $data = '';
        foreach($datas as $key => $val){
            $data .= $key.' '.$val.',';
        }
        $sql = "CREATE TABLE IF NOT EXISTS $table_name ( 
        id int(11) NOT NULL AUTO_INCREMENT,
        $data
        PRIMARY KEY  (id)
        ) $this->charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    
    }
    
    
    public function insert($args) {
        global $wpdb;
        
        $table_name = $this->table_prefix;
        $datas = $this->datas;
        $data = [];
        $i = 0;
        foreach($datas as $key => $val){
            $data[$key] = $args[$i++];
        }
        $wpdb->insert($table_name, $data);
    }
    
    public function delete($id=null) {
        global $wpdb;
        
        $table_name = $this->table_prefix;
        $wpdb->delete($table_name, array( 'id' => $id ));
    }
    
    public function update($id=null, array $args) {
        global $wpdb;
        
        $table_name = $this->table_prefix;
        $datas = $this->datas;
        $data = [];
        $i = 0;
        foreach($datas as $key => $val){
            $data[$key] = $args[$i++];
        }
        $wpdb->update($table_name, $data , array( 'id' => $id ));
    }

    public function get() {
        global $wpdb;
        
        $table_name = $this->table_prefix;
        $result = $wpdb->get_results ( "
            SELECT * 
            FROM  $table_name
        " );
        return $result;
    }
    
}
