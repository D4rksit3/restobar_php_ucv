<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restobar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #343a40; /* Fondo oscuro */
        }
        .navbar-brand, .nav-link {
            color: #fff !important; /* Texto blanco */
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #ddd !important; /* Texto más claro al pasar el mouse */
        }
        .navbar .nav-link {
            margin-right: 15px;
        }
        .boleta {
    border: 1px solid #000;
    padding: 20px;
    max-width: 600px;
    margin: auto;
}

.boleta h3 {
    text-align: center;
}

.boleta table {
    width: 100%;
    border-collapse: collapse;
}

.boleta table th, .boleta table td {
    border: 1px solid #000;
    padding: 8px;
    text-align: right;
}

.boleta table th {
    background-color: #f2f2f2;
}

.boleta table td:nth-child(1), .boleta table th:nth-child(1) {
    text-align: left;
}

.boleta .btn {
    margin-top: 20px;
}

    </style>
</head>
<body>
<?php if (isset($_SESSION['user'])): ?>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Restobar</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'mozo'): ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=mozo&action=index">Pedidos</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=mozo&action=enviarpedido">Agregar Pedido</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=mozo&action=generarBoleta">Generar Boleta</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'cocinero'): ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=cocinero&action=index">Pedidos</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'administrador'): ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=admin&action=agregarproducto">Agregar Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=admin&action=graficas">Graficas</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=admin&action=ventas">Ventas</a></li>
                <?php endif; ?>
                <li class="nav-item"><a class="nav-link" href="index.php?controller=auth&action=logout">Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>
<?php endif; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
// Archivo de configuración global para la zona horaria
date_default_timezone_set('America/Lima');
?>