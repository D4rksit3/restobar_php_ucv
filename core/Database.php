<?php
class Database {
    public static function connect() {
        try {
        $db = new PDO('mysql:host=54.245.199.140;dbname=restobar', 'restobar', 'DyEo3mVn*');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die("Error al conectar a la base de datos: " . $e->getMessage());
    }
    }
}
?>
    