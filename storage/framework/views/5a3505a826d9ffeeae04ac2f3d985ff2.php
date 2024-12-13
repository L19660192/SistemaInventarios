<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <div class="row">
            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header"
                            style="background-image: url('ruta_a_tu_imagen_o_patron'); background-size: cover;">
                            <h4 class="text-white"><?php echo e($project['titulo']); ?></h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Asesor:</strong> <?php echo e($project['asesor']); ?></p>
                            <p><strong>Publicado:</strong> <?php echo e($project['publicado']); ?></p>
                            <div class="steps-container">
                                <?php $__currentLoopData = $project['etapas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etapa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge <?php echo e($etapa['activa'] ? 'bg-success' : 'bg-secondary'); ?> m-1">
                                        <?php echo e($etapa['nombre']); ?>

                                    </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            
                            <?php if (isset($component)) { $__componentOriginal84b78d66d5203b43b9d8c22236838526 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal84b78d66d5203b43b9d8c22236838526 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Button::resolve(['label' => 'Detalles del proyecto'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('adminlte-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\JeroenNoten\LaravelAdminLte\View\Components\Form\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-toggle' => 'modal','data-target' => '#modalCustom','class' => 'bg-teal']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal84b78d66d5203b43b9d8c22236838526)): ?>
<?php $attributes = $__attributesOriginal84b78d66d5203b43b9d8c22236838526; ?>
<?php unset($__attributesOriginal84b78d66d5203b43b9d8c22236838526); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal84b78d66d5203b43b9d8c22236838526)): ?>
<?php $component = $__componentOriginal84b78d66d5203b43b9d8c22236838526; ?>
<?php unset($__componentOriginal84b78d66d5203b43b9d8c22236838526); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>

                
                <?php if (isset($component)) { $__componentOriginale2dfb698641700bc6575e0f9f2d3d632 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale2dfb698641700bc6575e0f9f2d3d632 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Tool\Modal::resolve(['id' => 'modalCustom','title' => 'Detalles del Proyecto','size' => 'lg','theme' => 'teal','icon' => 'fas fa-bell','vCentered' => true,'staticBackdrop' => true,'scrollable' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('adminlte-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\JeroenNoten\LaravelAdminLte\View\Components\Tool\Modal::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    
                    <div class="d-flex justify-content-around mb-3">
                        <button class="btn btn-light w-100 border btn-tab" id="btnDetalles" onclick="mostrarSeccion('detalles', this)">Detalles del Proyecto</button>
                        <button class="btn btn-light w-100 border btn-tab" id="btnObjetivos" onclick="mostrarSeccion('objetivos', this)">Objetivos y Actividades</button>
                        <button class="btn btn-light w-100 border btn-tab" id="btnComentarios" onclick="mostrarSeccion('comentarios', this)">Comentarios</button>
                    </div>

                    
                    <div id="contenidoModal">
                        
                        <div class="seccion-modal" id="detalles" style="display: block;">
                            <h4>Detalles del Proyecto</h4>
                            <p>Aquí puedes agregar información detallada sobre el proyecto, como su descripción, fecha de inicio, responsables, etc.</p>
                        </div>

                        
                        <div class="seccion-modal" id="objetivos" style="display: none;">
                            <h4>Objetivos y Actividades</h4>
                            <p>Aquí puedes agregar información sobre los objetivos del proyecto y las actividades relacionadas.</p>
                        </div>

                        
                        <div class="seccion-modal" id="comentarios" style="display: none;">
                            <h4>Comentarios</h4>
                            <p>Aquí puedes agregar un área para que los usuarios escriban comentarios sobre el proyecto.</p>
                        </div>
                    </div>

                    
                     <?php $__env->slot('footerSlot', null, []); ?> 
                        <?php if (isset($component)) { $__componentOriginal84b78d66d5203b43b9d8c22236838526 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal84b78d66d5203b43b9d8c22236838526 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Button::resolve(['theme' => 'success','label' => 'Guardar'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('adminlte-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\JeroenNoten\LaravelAdminLte\View\Components\Form\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-auto']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal84b78d66d5203b43b9d8c22236838526)): ?>
<?php $attributes = $__attributesOriginal84b78d66d5203b43b9d8c22236838526; ?>
<?php unset($__attributesOriginal84b78d66d5203b43b9d8c22236838526); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal84b78d66d5203b43b9d8c22236838526)): ?>
<?php $component = $__componentOriginal84b78d66d5203b43b9d8c22236838526; ?>
<?php unset($__componentOriginal84b78d66d5203b43b9d8c22236838526); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal84b78d66d5203b43b9d8c22236838526 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal84b78d66d5203b43b9d8c22236838526 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Button::resolve(['theme' => 'danger','label' => 'Cerrar'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('adminlte-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\JeroenNoten\LaravelAdminLte\View\Components\Form\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-dismiss' => 'modal']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal84b78d66d5203b43b9d8c22236838526)): ?>
<?php $attributes = $__attributesOriginal84b78d66d5203b43b9d8c22236838526; ?>
<?php unset($__attributesOriginal84b78d66d5203b43b9d8c22236838526); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal84b78d66d5203b43b9d8c22236838526)): ?>
<?php $component = $__componentOriginal84b78d66d5203b43b9d8c22236838526; ?>
<?php unset($__componentOriginal84b78d66d5203b43b9d8c22236838526); ?>
<?php endif; ?>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale2dfb698641700bc6575e0f9f2d3d632)): ?>
<?php $attributes = $__attributesOriginale2dfb698641700bc6575e0f9f2d3d632; ?>
<?php unset($__attributesOriginale2dfb698641700bc6575e0f9f2d3d632); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale2dfb698641700bc6575e0f9f2d3d632)): ?>
<?php $component = $__componentOriginale2dfb698641700bc6575e0f9f2d3d632; ?>
<?php unset($__componentOriginale2dfb698641700bc6575e0f9f2d3d632); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php $__env->startPush('css'); ?>
        
       
<script>
    function mostrarSeccion(seccionId, boton) {
        // Ocultar todas las secciones
        document.querySelectorAll('.seccion-modal').forEach((seccion) => {
            seccion.style.display = 'none';
        });

        // Mostrar la sección seleccionada
        document.getElementById(seccionId).style.display = 'block';

        // Quitar estilo activo de todos los botones
        document.querySelectorAll('.btn-tab').forEach((btn) => {
            btn.classList.remove('btn-primary');
            btn.classList.add('btn-light');
        });

        // Aplicar estilo activo al botón seleccionado
        boton.classList.remove('btn-light');
        boton.classList.add('btn-primary');
    }

    // Establecer el primer botón como activo al cargar el modal
    document.addEventListener('DOMContentLoaded', () => {
        mostrarSeccion('detalles', document.getElementById('btnDetalles'));
    });
</script>


<style>
    .btn-tab {
        border-radius: 0; /* Botones cuadrados y unidos */
    }
    .btn-tab:not(:last-child) {
        margin-right: -1px; /* Quitar separación entre botones */
    }
</style>
Ex
        <style>
            .card-header {
                background-color: #4016b4;
                /* Fondo oscuro */
                color: white;
                text-align: center;
            }

            .card-footer {
                display: flex;
                justify-content: space-between;
                padding: 10px;
            }

            .steps-container {
                margin-top: 10px;
            }
        </style>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\franm\Herd\prub\resources\views/projects.blade.php ENDPATH**/ ?>