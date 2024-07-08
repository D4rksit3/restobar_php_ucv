<div class="container">
<h2>Gráficas de Ventas</h2>
<form action="index.php?controller=admin&action=graficas" method="POST">
    <div class="form-group">
        <label for="inicio">Fecha Inicio</label>
        <input type="date" name="inicio" id="inicio" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="fin">Fecha Fin</label>
        <input type="date" name="fin" id="fin" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Generar Gráficas</button>
</form>
<?php if (!empty($data['labels']) && !empty($data['data'])): ?>
<div id="grafica"></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafica').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?= json_encode($data['labels']); ?>,
            datasets: [{
                label: 'Ventas',
                data: <?= json_encode($data['data']); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?php endif; ?>
