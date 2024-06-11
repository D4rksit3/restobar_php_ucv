<?php
class Venta extends Model {
    public function getVentas($inicio, $fin) {
        $stmt = $this->db->prepare("SELECT * FROM ventas WHERE created_at BETWEEN :inicio AND :fin");
        $stmt->execute(['inicio' => $inicio, 'fin' => $fin]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
