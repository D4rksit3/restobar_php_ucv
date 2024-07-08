<?php include_once '../views/layouts/header.php'; ?>

<div class="container mt-5">
    <h2>Mis Pedidos</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Orden</th>
                <th>Producto</th>
                <th>Mesa</th>
                <th>Cantidad</th>
                <th>Estado</th>
                <th>Creado En</th>
                <th>Cliente</th>
            </tr>
        </thead>
        <tbody id="pedidos-body">
            <?php foreach ($data['pedidos'] as $pedido): ?>
                <tr>
                    <td><?= $pedido['nro_orden']; ?></td>
                    <td><?= $pedido['nombre']; ?></td>
                    <td><?= $pedido['mesa']; ?></td>
                    <td><?= $pedido['cantidad']; ?></td>
                    <td style="color: <?php
                        if ($pedido['estado'] == 'pendiente') {
                            echo 'red'; // Color rojo para pendiente
                        } elseif ($pedido['estado'] == 'en proceso') {
                            echo 'orange'; // Color amarillo para en proceso
                        } elseif ($pedido['estado'] == 'realizado') {
                            echo 'green'; // Color verde para realizado
                        } else {
                            echo 'black'; // Color negro por defecto o manejar otro caso si es necesario
                        }
                    ?>;">
                        <?= $pedido['estado']; ?>
                    </td>
                    <td><?= $pedido['created_at']; ?></td>
                    <td><?= $pedido['cliente']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function fetchPedidos() {
        fetch('index.php?controller=mozo&action=fetchPedidos')
            .then(response => response.json())
            .then(data => {
                let tbody = document.getElementById('pedidos-body');
                tbody.innerHTML = '';
                data.pedidos.forEach(pedido => {
                    let color;
                    if (pedido.estado === 'pendiente') {
                        color = 'red';
                    } else if (pedido.estado === 'en proceso') {
                        color = 'orange';
                    } else if (pedido.estado === 'realizado') {
                        color = 'green';
                    } else {
                        color = 'black';
                    }
                    tbody.innerHTML += `
                        <tr>
                            <td>${pedido.nro_orden}</td>
                            <td>${pedido.nombre}</td>
                            <td>${pedido.mesa}</td>
                            <td>${pedido.cantidad}</td>
                            <td style="color: ${color};">${pedido.estado}</td>
                            <td>${pedido.created_at}</td>
                            <td>${pedido.cliente}</td>
                        </tr>
                    `;
                });
            });
    }

    setInterval(fetchPedidos, 5000); // Actualiza cada 5 segundos
</script>

<?php include_once '../views/layouts/footer.php'; ?>
