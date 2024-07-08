<div class="container">
    <h2>Pedidos a Preparar</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nro Orden</th>
                <th>Cliente</th>
                <th>Mesa</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="pedidos-tbody">
            <?php foreach ($data['pedidos'] as $pedido): ?>
                <tr>
                    <td><?= $pedido['nro_orden']; ?></td>
                    <td><?= $pedido['cliente']; ?></td>
                    <td><?= $pedido['mesa']; ?></td>
                    <td><?= $pedido['nombre']; ?></td>
                    <td><?= $pedido['cantidad']; ?></td>
                    <td class="estado-pedido">
                        <?php if ($pedido['estado'] === 'pendiente'): ?>
                            <span class="text-danger">Pendiente</span>
                        <?php elseif ($pedido['estado'] === 'en proceso'): ?>
                            <span class="text-warning">En Proceso</span>
                        <?php elseif ($pedido['estado'] === 'realizado'): ?>
                            <span class="text-success">Realizado</span>
                        <?php else: ?>
                            <span class="text-muted">Desconocido</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <form class="form-estado" action="index.php?controller=cocinero&action=cambiarEstado" method="POST">
                            <input type="hidden" name="pedido_id" value="<?= $pedido['id']; ?>">
                            <select name="estado" class="form-control">
                                <option value="pendiente" <?= $pedido['estado'] === 'pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                                <option value="en proceso" <?= $pedido['estado'] === 'en proceso' ? 'selected' : ''; ?>>En Proceso</option>
                                <option value="realizado" <?= $pedido['estado'] === 'realizado' ? 'selected' : ''; ?>>Realizado</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        // Función para enviar el formulario de actualización de estado
        $('.form-estado').submit(function(event) {
            event.preventDefault(); // Prevenir el envío estándar del formulario

            var form = $(this);
            var formData = form.serialize(); // Serializar los datos del formulario

            $.ajax({
                url: form.attr('action'), // URL del controlador PHP que procesa el formulario
                method: 'POST',
                dataType: 'json',
                data: formData, // Datos serializados del formulario
                success: function(response) {
                    if (response.success) {
                        // Actualizar solo el estado en la tabla de pedidos
                        var estado = form.find('select[name="estado"]').val();
                        var estadoTd = form.closest('tr').find('.estado-pedido');
                        estadoTd.html(generarEstadoHTML(estado));
                    } else {
                        console.error('Error al actualizar el estado del pedido:', response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error en la solicitud AJAX:', error);
                }
            });
        });

        // Función para generar el HTML del estado basado en el estado seleccionado
        function generarEstadoHTML(estado) {
            if (estado === 'pendiente') {
                return '<span class="text-danger">Pendiente</span>';
            } else if (estado === 'en proceso') {
                return '<span class="text-warning">En Proceso</span>';
            } else if (estado === 'realizado') {
                return '<span class="text-success">Realizado</span>';
            } else {
                return '<span class="text-muted">Desconocido</span>';
            }
        }
    });
</script>
