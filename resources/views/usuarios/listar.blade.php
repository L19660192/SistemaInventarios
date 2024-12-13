@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@endsection

@section('content')
    <div class="card">
        <!-- Botón de Crear Usuario -->
        <div class="card-header">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalCrear">Crear Usuario</button>
        </div>
        <!-- Tabla de Usuarios -->
        <div class="card-body">
        <table id="usuariosTable" class="table table-striped table-hover table-bordered table-sm mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->usuario_id }}</td>
                        <td>{{ $usuario->n_documento }}</td>
                        <td>{{ $usuario->nombre }} {{ $usuario->apellidos }}</td>
                        <td>{{ $usuario->correo }}</td>
                        <td>{{ $usuario->estado ? 'Activo' : 'Inactivo' }}</td>
                        <td>
                            <!-- Botón Editar -->
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditar"
                                data-id="{{ $usuario->usuario_id }}">Editar</button>
                            <!-- Botón Eliminar -->
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar"
                                data-id="{{ $usuario->usuario_id }}">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    </div>

    <!-- Modal Crear Usuario -->
    <div class="modal fade" id="modalCrear" tabindex="-1" role="dialog" aria-labelledby="modalCrearLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearLabel">Crear Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('usuarios.guardar') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="n_documento">Número de Documento</label>
                            <input type="text" name="n_documento" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" name="correo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="clave">Contraseña</label>
                            <input type="password" name="clave" class="form-control" required>
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

    <!-- Modal Editar Usuario -->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarLabel">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEditar" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="n_documento">Número de Documento</label>
                            <input type="text" name="n_documento" class="form-control" id="n_documento" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" id="apellidos" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" name="correo" class="form-control" id="correo" required>
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

    <!-- Modal de Notificación -->
    <div class="modal fade" id="modalNotificacion" tabindex="-1" role="dialog"
        aria-labelledby="modalNotificacionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNotificacionLabel">Notificación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalMensaje">
                    <!-- Aquí se colocará el mensaje -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
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
                <form action="{{ route('usuarios.eliminar', ':id') }}" method="POST" id="formEliminar">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        ¿Estás seguro de que deseas eliminar este usuario?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
@section('js')
    <!-- JavaScript para inicializar DataTables -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usuariosTable').DataTable(); // Inicializa DataTables en la tabla de usuarios
        });
    </script>
@stop
@section('js')
    <script>
        // Llenar los campos del modal al abrirlo
        $('#modalEditar').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Botón que activó el modal
            var usuarioId = button.data('id'); // ID del usuario obtenido del botón

            // Verificar si hay datos en los atributos del botón
            if (button.data('n_documento') && button.data('nombre')) {
                // Usar datos del DOM (atributos data-*)
                $('#n_documento').val(button.data('n_documento'));
                $('#nombre').val(button.data('nombre'));
                $('#apellidos').val(button.data('apellidos'));
                $('#correo').val(button.data('correo'));
                $('#estado').val(button.data('estado'));
            } else {
                // Si los datos no están en el DOM, realizar una solicitud AJAX
                $.ajax({
                    url: '/usuarios/' + usuarioId + '/editar',
                    method: 'GET',
                    success: function(data) {
                        // Rellenar los campos con los datos obtenidos del servidor
                        $('#n_documento').val(data.n_documento);
                        $('#nombre').val(data.nombre);
                        $('#apellidos').val(data.apellidos);
                        $('#correo').val(data.correo);
                        $('#estado').val(data.estado);
                    },
                    error: function() {
                        alert('Ocurrió un error al cargar los datos del usuario.');
                    }
                });
            }

            // Configurar la acción del formulario
            $('#formEditar').attr('action', '/usuarios/' + usuarioId);
        });

        // Manejar el envío del formulario de edición
        $('#formEditar').on('submit', function(e) {
            e.preventDefault(); // Previene el envío del formulario

            var form = $(this);
            var actionUrl = form.attr('action'); // Obtiene la URL del formulario
            var formData = form.serialize(); // Serializa los datos del formulario

            $.ajax({
                url: actionUrl,
                type: 'PUT',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        // Muestra el modal de éxito
                        $('#modalEditar').modal('hide'); // Cierra el modal de edición
                        $('#modalMensaje').text(response.message); // Configura el mensaje
                        $('#modalNotificacion').modal('show'); // Muestra el modal de notificación
                        // Opcional: recarga la tabla o la lista de usuarios
                        setTimeout(() => {
                            location.reload();
                        }, 2000); // Refresca la página para reflejar los cambios
                    }
                },
                error: function(xhr) {
                    // Manejo de errores
                    var errorMessage = xhr.responseJSON ?
                        xhr.responseJSON.message :
                        'Ocurrió un error inesperado.';

                    $('#modalMensaje').text(errorMessage); // Configura el mensaje de error
                    $('#modalNotificacion').modal('show'); // Muestra el modal de notificación
                },
            });
        });



        // Para establecer la URL en el formulario de eliminación
        $('#modalEliminar').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var userId = button.data('id');
            var url = '/usuarios/' + userId;

            $('#formEliminar').attr('action', url);
        });
    </script>

@stop

