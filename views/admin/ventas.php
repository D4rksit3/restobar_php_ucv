<h2>Ventas</h2>
<form action="index.php?controller=admin&action=ventas" method="POST">
    <div class="form-group">
        <label for="inicio">Fecha Inicio</label>
        <input type="date" name="inicio" id="inicio" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="fin">Fecha Fin</label>
        <input type="date" name="fin" id="fin" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Filtrar</button>
</form>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['ventas'] as $venta): ?>
            <tr>
                <td><?php echo $venta['id']; ?></td>
                <td><?php echo $venta['producto']; ?></td>
                <td><?php echo $venta['cantidad']; ?></td>
                <td><?php echo $venta['total']; ?></td>
                <td><?php echo $venta['created_at']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
