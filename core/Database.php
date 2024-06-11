<?php
class Database {
    public static function connect() {
        $db = new PDO('mysql:host=localhost;dbname=restobar', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}
?>
