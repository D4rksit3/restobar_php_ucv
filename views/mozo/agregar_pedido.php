<?php include_once '../views/layouts/header.php'; ?>

<div class="container mt-5">
    <h2>Agregar Pedido</h2>
    <form action="/mozo/agregarPedido" method="post">
        <div class="mb-3">
            <label for="producto_id" class="form-label">Producto</label>
            <input type="text" class="form-control" id="producto_id" name="producto_id" required>
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>

<?php include_once '../views/layouts/footer.php'; ?>
