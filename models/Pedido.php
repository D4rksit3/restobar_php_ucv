<?php
class Pedido extends Model {
    public function getPedidos($mozo_id) {
        $stmt = $this->db->prepare("SELECT * FROM pedidos WHERE mozo_id = :mozo_id AND created_at >= NOW() - INTERVAL 8 HOUR");
        $stmt->execute(['mozo_id' => $mozo_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateEstado($pedido_id, $estado) {
        $stmt = $this->db->prepare("UPDATE pedidos SET estado = :estado WHERE id = :pedido_id");
        return $stmt->execute(['estado' => $estado, 'pedido_id' => $pedido_id]);
    }
}
?>
