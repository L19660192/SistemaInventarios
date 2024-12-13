<?php $__env->startSection('title', 'Categorías'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Categorías</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <!-- Botón de Crear Categoría -->
        <div class="card-header">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalCrear">Crear Categoría</button>
        </div>

        <!-- Tabla de Categorías -->
        <div class="card-body">
            <table id="categoriasTable" class="table table-striped table-hover table-bordered table-sm mt-4">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($categoria->categoria_id); ?></td>
                            <td><?php echo e($categoria->nombre); ?></td>
                            <td><?php echo e($categoria->descripcion); ?></td>
                            <td><?php echo e($categoria->estado ? 'Activo' : 'Inactivo'); ?></td>
                            <td>
                                <!-- Botón Editar -->
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditar"
                                    data-id="<?php echo e($categoria->categoria_id); ?>" data-nombre="<?php echo e($categoria->nombre); ?>"
                                    data-descripcion="<?php echo e($categoria->descripcion); ?>"
                                    data-estado="<?php echo e($categoria->estado); ?>">Editar</button>
                                <!-- Botón Eliminar -->
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar"
                                    data-id="<?php echo e($categoria->categoria_id); ?>">Eliminar</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Crear Categoría -->
    <div class="modal fade" id="modalCrear" tabindex="-1" role="dialog" aria-labelledby="modalCrearLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearLabel">Crear Categoría</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo e(route('categorias.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select name="estado" class="form-control">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
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

    <!-- Modal Editar Categoría -->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarLabel">Editar Categoría</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEditar" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" class="form-control" id="descripcion" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select name="estado" class="form-control" id="estado">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Confirmar Eliminación -->
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEliminarLabel">Confirmar Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEliminar" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <div class="modal-body">
                        ¿Estás seguro de que deseas eliminar esta categoría?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
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
            $('#categoriasTable').DataTable();

            // Llenar los campos del modal de edición al abrirlo
            $('#modalEditar').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var categoriaId = button.data('id');
                var nombre = button.data('nombre');
                var descripcion = button.data('descripcion');
                var estado = button.data('estado');

                var modal = $(this);
                modal.find('#nombre').val(nombre);
                modal.find('#descripcion').val(descripcion);
                modal.find('#estado').val(estado);
                $('#formEditar').attr('action', '/categorias/' + categoriaId);
            });

            // Configurar el formulario de eliminación
            $('#modalEliminar').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var categoriaId = button.data('id');
                $('#formEliminar').attr('action', '/categorias/' + categoriaId);
            });
        });
    </script>

    <script>
        function dismissNotification() {
            const alertBox = document.querySelector('.position-fixed');
            if (alertBox) {
                alertBox.remove();
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<!-- alerta -->
<?php if(session('success')): ?>
    <div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1050;">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="dismissNotification()"
                aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1050;">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Por el momento esta categoría está en uso y no se puede eliminar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="dismissNotification()"
                aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>




<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\franm\Herd\prub\resources\views/categorias/index.blade.php ENDPATH**/ ?>