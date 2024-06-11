<h2>Agregar Producto</h2>
<form action="index.php?controller=admin&action=agregarProducto" method="POST">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
</form>
