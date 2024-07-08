<?php
class Venta extends Model {
    public function getVentas($inicio, $fin) {
        $stmt = $this->db->prepare("
            SELECT ventas.*, productos.nombre AS producto, pedidos.mesa, pedidos.cliente
            FROM ventas 
            LEFT JOIN productos ON ventas.producto_id = productos.id
            LEFT JOIN pedidos ON ventas.nro_orden = pedidos.nro_orden
            WHERE ventas.created_at BETWEEN :inicio AND :fin
        ");
        $stmt->execute(['inicio' => $inicio, 'fin' => $fin]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVentasPorFecha($inicio, $fin) {
        $stmt = $this->db->prepare("
            SELECT DATE(created_at) AS fecha, SUM(total) AS total_ventas
            FROM ventas
            WHERE created_at BETWEEN :inicio AND :fin
            GROUP BY DATE(created_at)
            ORDER BY fecha
        ");
        $stmt->execute(['inicio' => $inicio, 'fin' => $fin]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVentasPorHora($inicio, $fin) {
        $stmt = $this->db->prepare("
            SELECT HOUR(created_at) AS hora, SUM(total) AS total_ventas
            FROM ventas
            WHERE created_at BETWEEN :inicio AND :fin
            GROUP BY HOUR(created_at)
            ORDER BY hora
        ");
        $stmt->execute(['inicio' => $inicio, 'fin' => $fin]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductosMasVendidosPorFecha($inicio, $fin) {
        $stmt = $this->db->prepare("
            SELECT productos.nombre AS producto, SUM(pedidos.cantidad) AS cantidad_vendida
            FROM pedidos
            LEFT JOIN productos ON pedidos.producto_id = productos.id
            WHERE pedidos.created_at BETWEEN :inicio AND :fin
            GROUP BY productos.nombre
            ORDER BY cantidad_vendida DESC
            LIMIT 5
        ");
        $stmt->execute(['inicio' => $inicio, 'fin' => $fin]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    
    public function getProductosMasVendidosPorHora($inicio, $fin) {
        $stmt = $this->db->prepare("
            SELECT HOUR(pedidos.created_at) AS hora, productos.nombre AS producto, SUM(pedidos.cantidad) AS cantidad_vendida
            FROM pedidos
            LEFT JOIN productos ON pedidos.producto_id = productos.id
            WHERE pedidos.created_at BETWEEN :inicio AND :fin
            GROUP BY HOUR(pedidos.created_at), productos.nombre
            ORDER BY hora, cantidad_vendida DESC
        ");
        $stmt->execute(['inicio' => $inicio, 'fin' => $fin]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}
?>
