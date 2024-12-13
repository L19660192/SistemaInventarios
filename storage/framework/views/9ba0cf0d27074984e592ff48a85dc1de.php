<?php $__env->startSection('content'); ?>
<div class="container mt-5">

    <!-- Tarjetas Resumen -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Categorías</h5>
                    <p class="card-text display-4"><?php echo e($totalCategorias); ?></p>
                    <a href="<?php echo e(route('categorias.index')); ?>" class="btn btn-primary">Ver categorías</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <p class="card-text display-4"><?php echo e($totalProductos); ?></p>
                    <a href="<?php echo e(route('productos.index')); ?>" class="btn btn-primary">Ver productos</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Stock Total</h5>
                    <p class="card-text display-4"><?php echo e($stockTotal); ?></p>
                    <a href="<?php echo e(route('productos.index')); ?>" class="btn btn-primary">Administrar inventario</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de Gráficas -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Productos por Categoría</div>
                <div class="card-body">
                    <canvas id="productosPorCategoria"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Stock por Categoría</div>
                <div class="card-body">
                    <canvas id="stockPorCategoria"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts para las gráficas -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Datos para Productos por Categoría
    const productosPorCategoriaCtx = document.getElementById('productosPorCategoria').getContext('2d');
    new Chart(productosPorCategoriaCtx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($categorias->pluck('nombre')); ?>, // Nombres de las categorías
            datasets: [{
                data: <?php echo json_encode($categorias->pluck('productos_count')); ?>, // Cantidad de productos por categoría
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'] // Colores de las categorías
            }]
        }
    });

    // Datos para Stock por Categoría
    const stockPorCategoriaCtx = document.getElementById('stockPorCategoria').getContext('2d');
    new Chart(stockPorCategoriaCtx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($categorias->pluck('nombre')); ?>, // Nombres de las categorías
            datasets: [{
                label: 'Stock Total',
                data: <?php echo json_encode($categorias->pluck('stock_total')); ?>, // Total de stock por categoría
                backgroundColor: '#36A2EB',
                borderColor: '#007BFF',
                borderWidth: 1
            }]
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\franm\Herd\prub\resources\views/home.blade.php ENDPATH**/ ?>