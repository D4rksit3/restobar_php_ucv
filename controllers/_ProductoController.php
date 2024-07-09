<?php
class ProductoController extends Controller {
    public function index() {
        $productoModel = $this->loadModel('Producto');
        $productos = $productoModel->getAllProductos();
        $this->loadView('admin/productos', ['productos' => $productos]);
    }
}
?>
