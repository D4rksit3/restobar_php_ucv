<?php
class Producto extends Model {
    public function getAllProductos() {
        $stmt = $this->db->prepare("SELECT * FROM productos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProducto($nombre, $precio) {
        $stmt = $this->db->prepare("INSERT INTO productos (nombre, precio) VALUES (:nombre, :precio)");
        return $stmt->execute(['nombre' => $nombre, 'precio' => $precio]);
    }
}
?>
