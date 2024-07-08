<?php
class AdminController extends Controller {
    public function __construct() {
        $this->requireLogin();
        if ($_SESSION['user']['role'] !== 'administrador') {
            $this->redirect('index.php?controller=auth&action=login');
        }
    }

    public function ventas() {
        $ventaModel = $this->loadModel('Venta');
        $totalVentas = 0;
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inicio = $_POST['inicio'];
            $fin = $_POST['fin'];
        } else {
            $inicio = date('Y-m-01');
            $fin = date('Y-m-d');
        }
    
        $ventas = $ventaModel->getVentas($inicio, $fin);
    
        // Calcular el total de ventas
        foreach ($ventas as $venta) {
            $totalVentas += $venta['total'];
        }
    
        $this->loadView('admin/ventas', ['ventas' => $ventas, 'totalVentas' => $totalVentas]);
    }
    

    public function agregarProducto() {
        $productoModel = $this->loadModel('Producto');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productoModel->addProducto($_POST['nombre'], $_POST['precio']);
        }
        $this->loadView('admin/agregar_producto');
    }

    public function graficas() {
        // Cargar el modelo Venta
        $ventaModel = $this->loadModel('Venta');
    
        // Lógica para obtener datos para las gráficas
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inicio = $_POST['inicio'];
            $fin = $_POST['fin'];
    
            // Obtener datos para las gráficas desde el modelo Venta
            $ventasPorFecha = $ventaModel->getVentasPorFecha($inicio, $fin);
            $ventasPorHora = $ventaModel->getVentasPorHora($inicio, $fin);
            $productosMasVendidosFecha = $ventaModel->getProductosMasVendidosPorFecha($inicio, $fin);
            $productosMasVendidosHora = $ventaModel->getProductosMasVendidosPorHora($inicio, $fin);
    
            // Cargar la vista de gráficas con los datos
            $this->loadView('admin/graficas', [
                'ventasPorFecha' => $ventasPorFecha,
                'ventasPorHora' => $ventasPorHora,
                'productosMasVendidosFecha' => $productosMasVendidosFecha,
                'productosMasVendidosHora' => $productosMasVendidosHora,
            ]);
        } else {
            // Cargar la vista de gráficas sin datos (primera carga)
            $this->loadView('admin/graficas');
        }
    }


}
?>
