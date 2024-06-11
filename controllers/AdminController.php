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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ventas = $ventaModel->getVentas($_POST['inicio'], $_POST['fin']);
        } else {
            $ventas = $ventaModel->getVentas(date('Y-m-01'), date('Y-m-d'));
        }
        $this->loadView('admin/ventas', ['ventas' => $ventas]);
    }

    public function agregarProducto() {
        $productoModel = $this->loadModel('Producto');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productoModel->addProducto($_POST['nombre'], $_POST['precio']);
        }
        $this->loadView('admin/agregar_producto');
    }

    public function graficas() {
        $ventaModel = $this->loadModel('Venta');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ventas = $ventaModel->getVentas($_POST['inicio'], $_POST['fin']);
            $labels = [];
            $data = [];
            foreach ($ventas as $venta) {
                $labels[] = $venta['created_at'];
                $data[] = $venta['total'];
            }
            $this->loadView('admin/graficas', ['labels' => $labels, 'data' => $data]);
        } else {
            $this->loadView('admin/graficas');
        }
    }
}
?>
