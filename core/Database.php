<?php
class Database {
    public static function connect() {
        $db = new PDO('mysql:host=54.245.199.140;dbname=restobar', 'restobar', 'DyEo3mVn*');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}
?>
