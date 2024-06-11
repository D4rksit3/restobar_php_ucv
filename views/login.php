<div class="row justify-content-center">
    <div class="col-md-6">
        <h2>Iniciar Sesión</h2>
        <?php if (!empty($data['error'])): ?>
            <div class="alert alert-danger"><?php echo $data['error']; ?></div>
        <?php endif; ?>
        <form action="index.php?controller=auth&action=login" method="POST">
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
    </div>
</div>
