<?php
class MozoController extends Controller {
    public function __construct() {
        $this->requireLogin();
        if ($_SESSION['user']['role'] !== 'mozo') {
            $this->redirect('index.php?controller=auth&action=login');
        }
    }

    public function index() {
        $pedidoModel = $this->loadModel('Pedido');
        $pedidos = $pedidoModel->getPedidos($_SESSION['user']['id']);
        $ordenes = $pedidoModel->getAllOrdenes();
        $productos = $pedidoModel->getProductos();
        $this->loadView('mozo/pedidos', [
            'pedidos' => $pedidos,
            'ordenes' => $ordenes,
            'productos' => $productos
        ]);
    }

    public function fetchPedidos() {
        $pedidoModel = $this->loadModel('Pedido');
        $pedidos = $pedidoModel->getPedidos($_SESSION['user']['id']);
        echo json_encode(['pedidos' => $pedidos]);
    }

    public function enviarPedido() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pedidoModel = $this->loadModel('Pedido');
            $productos = $_POST['detalle'];

            $nro_orden = $_POST['nro_orden'];
            if (empty($nro_orden)) {
                $max_nro_orden = $pedidoModel->getMaxNroOrden();
                $nro_orden = $max_nro_orden + 1;
            }

            foreach ($productos as $producto_id) {
                $data = [
                    'producto_id' => $producto_id,
                    'mozo_id' => $_SESSION['user']['id'],
                    'cliente' => $_POST['cliente'],
                    'mesa' => $_POST['mesa'],
                    'cantidad' => 1,
                    'estado' => 'pendiente',
                    'created_at' => date('Y-m-d H:i:s'),
                    'nro_orden' => $nro_orden
                ];
                $pedidoModel->createPedido($data);
            }
            $this->redirect('index.php?controller=mozo&action=index');
        } else {
            $pedidoModel = $this->loadModel('Pedido');
            $categorias = $pedidoModel->getCategorias();
            $productos = $pedidoModel->getProductos();
            $ordenes = $pedidoModel->getAllOrdenes();

            $view = new View();
            $view->loadView('mozo/enviarPedido', [
                'categorias' => $categorias,
                'productos' => $productos,
                'ordenes' => $ordenes
            ]);
        }
    }

    public function agregarProducto() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pedidoModel = $this->loadModel('Pedido');
            $data = [
                'producto_id' => $_POST['producto_id'],
                'mozo_id' => $_SESSION['user']['id'],
                'cliente' => '', // Puedes ajustar esto según sea necesario
                'mesa' => '', // Puedes ajustar esto según sea necesario
                'cantidad' => $_POST['cantidad'],
                'estado' => 'pendiente',
                'created_at' => date('Y-m-d H:i:s'),
                'nro_orden' => $_POST['nro_orden']
            ];
            $pedidoModel->createPedido($data);
            $this->redirect('index.php?controller=mozo&action=index');
        }
    }

    public function estadoPedido() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pedido_id = $_POST['pedido_id'];
            $estado = $_POST['estado'];
            $pedidoModel = $this->loadModel('Pedido');
            $pedidoModel->updateEstado($pedido_id, $estado);
            $this->redirect('index.php?controller=mozo&action=index');
        }
    }
}
?>
