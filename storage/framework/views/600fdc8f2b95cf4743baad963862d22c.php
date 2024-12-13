<?php $__env->startSection('title', 'Lista de Productos'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Lista de Productos</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Agregar Producto</button>
    </div>
    <div class="card-body">
        <table id="categoriasTable1" class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Código de Barras</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Subcategoría</th>

                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($producto->codigo_barras); ?></td>
                        <td><?php echo e($producto->nombre); ?></td>
                        <td><?php echo e($producto->categoria->nombre); ?></td>º
                        <td><?php echo e($producto->subcategoria->nombre); ?></td>

                        <td><?php echo e(number_format($producto->precio_compra, 2)); ?></td>
                        <td><?php echo e(number_format($producto->precio_venta, 2)); ?></td>
                        <td><?php echo e($producto->stock); ?></td>
                        <td><?php echo e($producto->estado ? 'Activo' : 'Inactivo'); ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?php echo e($producto->producto_id); ?>">Editar</button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?php echo e($producto->producto_id); ?>">Eliminar</button>
                        </td>
                    </tr>

                    <!-- Modal Editar -->
                    <div class="modal fade" id="editModal<?php echo e($producto->producto_id); ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="<?php echo e(route('productos.update', $producto->producto_id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Editar Producto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="codigo_barras">Código de Barras</label>
                                            <input type="text" name="codigo_barras" class="form-control" value="<?php echo e($producto->codigo_barras); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" value="<?php echo e($producto->nombre); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="categoria_id">Categoría</label>
                                            <select name="categoria_id" class="form-control" required>
                                                <option value="<?php echo e($producto->categoria_id); ?>"><?php echo e($producto->categoria->nombre); ?></option>
                                                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($categoria->categoria_id); ?>"><?php echo e($categoria->nombre); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="subcategoria_id">Subcategoría</label>
                                            <select name="subcategoria_id" class="form-control" required>
                                                <option value="<?php echo e($producto->subcategoria_id); ?>"><?php echo e($producto->subcategoria->nombre); ?></option>
                                                <?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($subcategoria->subcategoria_id); ?>"><?php echo e($subcategoria->nombre); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="unidad_id">Unidad de Medida</label>
                                            <select name="unidad_id" id="unidad_id" class="form-control" required>
                                                <option value="">Seleccione una unidad de medida</option>
                                                <?php $__currentLoopData = $unidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($unidad->unidad_id); ?>"><?php echo e($unidad->nombre); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="precio_compra">Precio de Compra</label>
                                            <input type="number" name="precio_compra" class="form-control" value="<?php echo e($producto->precio_compra); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="precio_venta">Precio de Venta</label>
                                            <input type="number" name="precio_venta" class="form-control" value="<?php echo e($producto->precio_venta); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="number" name="stock" class="form-control" value="<?php echo e($producto->stock); ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Eliminar -->
                    <div class="modal fade" id="deleteModal<?php echo e($producto->producto_id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="<?php echo e(route('productos.destroy', $producto->producto_id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Eliminar Producto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estás seguro de eliminar el producto <strong><?php echo e($producto->nombre); ?></strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Crear Producto -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo e(route('productos.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Crear Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="codigo_barras">Código de Barras</label>
                        <input type="text" name="codigo_barras" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria_id">Categoría</label>
                        <select name="categoria_id" class="form-control" required>
                            <option value="">Selecciona una categoría</option>
                            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($categoria->categoria_id); ?>"><?php echo e($categoria->nombre); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategoria_id">Subcategoría</label>
                        <select name="subcategoria_id" class="form-control" required>
                            <option value="">Selecciona una subcategoría</option>
                            <?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subcategoria->subcategoria_id); ?>"><?php echo e($subcategoria->nombre); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="unidad_id">Unidad de Medida</label>
                        <select name="unidad_id" id="unidad_id" class="form-control" required>
                            <option value="">Seleccione una unidad de medida</option>
                            <?php $__currentLoopData = $unidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($unidad->unidad_id); ?>"><?php echo e($unidad->nombre); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="precio_compra">Precio de Compra</label>
                        <input type="number" name="precio_compra" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="precio_venta">Precio de Venta</label>
                        <input type="number" name="precio_venta" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <!-- JavaScript para inicializar DataTables -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#categoriasTable1').DataTable(); // Inicializa DataTables en la tabla de usuarios
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\franm\Herd\prub\resources\views/productos/index.blade.php ENDPATH**/ ?>