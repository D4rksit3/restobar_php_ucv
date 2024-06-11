<h2>Estado de Pedidos</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['pedidos'] as $pedido): ?>
            <tr>
                <td><?php echo $pedido['id']; ?></td>
                <td><?php echo $pedido['producto']; ?></td>
                <td><?php echo $pedido['cantidad']; ?></td>
                <td><?php echo $pedido['estado']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
