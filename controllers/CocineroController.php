<?php
class CocineroController extends Controller {
    public function __construct() {
        $this->requireLogin();
        if ($_SESSION['user']['role'] !== 'cocinero') {
            $this->redirect('index.php?controller=auth&action=login');
        }
    }

    public function index() {
        $pedidoModel = $this->loadModel('Pedido');
        $pedidos = $pedidoModel->getPedidos($_SESSION['user']['id']);
        $this->loadView('cocinero/pedidos', ['pedidos' => $pedidos]);
    }

    public function cambiarEstado() {
        // Lógica para cambiar estado del pedido
    }
}
?>
