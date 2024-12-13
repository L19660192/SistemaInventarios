@extends('adminlte::page')

@section('content')
    <div class="container py-5">
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header"
                            style="background-image: url('ruta_a_tu_imagen_o_patron'); background-size: cover;">
                            <h4 class="text-white">{{ $project['titulo'] }}</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Asesor:</strong> {{ $project['asesor'] }}</p>
                            <p><strong>Publicado:</strong> {{ $project['publicado'] }}</p>
                            <div class="steps-container">
                                @foreach ($project['etapas'] as $etapa)
                                    <span class="badge {{ $etapa['activa'] ? 'bg-success' : 'bg-secondary' }} m-1">
                                        {{ $etapa['nombre'] }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            {{-- Botón para abrir el modal --}}
                            <x-adminlte-button label="Detalles del proyecto" data-toggle="modal" data-target="#modalCustom"
                                class="bg-teal" />
                        </div>
                    </div>
                </div>

                {{-- Modal para el proyecto --}}
                <x-adminlte-modal id="modalCustom" title="Detalles del Proyecto" size="lg" theme="teal" icon="fas fa-bell" v-centered static-backdrop scrollable>
                    {{-- Botones para cambiar entre ventanas --}}
                    <div class="d-flex justify-content-around mb-3">
                        <button class="btn btn-light w-100 border btn-tab" id="btnDetalles" onclick="mostrarSeccion('detalles', this)">Detalles del Proyecto</button>
                        <button class="btn btn-light w-100 border btn-tab" id="btnObjetivos" onclick="mostrarSeccion('objetivos', this)">Objetivos y Actividades</button>
                        <button class="btn btn-light w-100 border btn-tab" id="btnComentarios" onclick="mostrarSeccion('comentarios', this)">Comentarios</button>
                    </div>

                    {{-- Contenido de cada ventana --}}
                    <div id="contenidoModal">
                        {{-- Detalles del Proyecto --}}
                        <div class="seccion-modal" id="detalles" style="display: block;">
                            <h4>Detalles del Proyecto</h4>
                            <p>Aquí puedes agregar información detallada sobre el proyecto, como su descripción, fecha de inicio, responsables, etc.</p>
                        </div>

                        {{-- Objetivos y Actividades --}}
                        <div class="seccion-modal" id="objetivos" style="display: none;">
                            <h4>Objetivos y Actividades</h4>
                            <p>Aquí puedes agregar información sobre los objetivos del proyecto y las actividades relacionadas.</p>
                        </div>

                        {{-- Comentarios --}}
                        <div class="seccion-modal" id="comentarios" style="display: none;">
                            <h4>Comentarios</h4>
                            <p>Aquí puedes agregar un área para que los usuarios escriban comentarios sobre el proyecto.</p>
                        </div>
                    </div>

                    {{-- Footer del Modal --}}
                    <x-slot name="footerSlot">
                        <x-adminlte-button class="mr-auto" theme="success" label="Guardar" />
                        <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal" />
                    </x-slot>
                </x-adminlte-modal>
            @endforeach
        </div>
    </div>
    @push('css')
        {{-- Script para cambiar entre ventanas --}}
       {{-- Script para cambiar entre ventanas y aplicar estilo activo --}}
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

{{-- CSS opcional para estilizar los botones --}}
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
    @endpush
@endsection
