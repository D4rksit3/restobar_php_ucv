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
        $this->loadView('mozo/pedidos', ['pedidos' => $pedidos]);
    }

    public function enviarPedido() {
        // Lógica para enviar pedido
    }

    public function estadoPedido() {
        // Lógica para cambiar estado del pedido
    }
}
?>
