<h2>Pedidos a Preparar</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['pedidos'] as $pedido): ?>
            <tr>
                <td><?php echo $pedido['id']; ?></td>
                <td><?php echo $pedido['producto']; ?></td>
                <td><?php echo $pedido['cantidad']; ?></td>
                <td><?php echo $pedido['estado']; ?></td>
                <td>
                    <form action="index.php?controller=cocinero&action=cambiarEstado" method="POST">
                        <input type="hidden" name="pedido_id" value="<?php echo $pedido['id']; ?>">
                        <select name="estado" class="form-control">
                            <option value="pendiente" <?php echo $pedido['estado'] == 'pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                            <option value="en proceso" <?php echo $pedido['estado'] == 'en proceso' ? 'selected' : ''; ?>>En Proceso</option>
                            <option value="realizado" <?php echo $pedido['estado'] == 'realizado' ? 'selected' : ''; ?>>Realizado</option>
                        </select>
                        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
