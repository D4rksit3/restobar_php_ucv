<?php include_once '../views/layouts/header.php'; ?>

<div class="container mt-5">
    <h2>Mis Pedidos</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Estado</th>
                <th>Creado En</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['pedidos'] as $pedido): ?>
                <tr>
                    <td><?= $pedido['id']; ?></td>
                    <td><?= $pedido['producto_id']; ?></td>
                    <td><?= $pedido['cantidad']; ?></td>
                    <td><?= $pedido['estado']; ?></td>
                    <td><?= $pedido['creado_en']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include_once '../views/layouts/footer.php'; ?>
