@extends('adminlte::page')

@section('title', 'Lista de Productos')

@section('content_header')
    <h1>Lista de Productos</h1>
@endsection

@section('content')
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
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $producto->codigo_barras }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->categoria->nombre }}</td>º
                        <td>{{ $producto->subcategoria->nombre }}</td>

                        <td>{{ number_format($producto->precio_compra, 2) }}</td>
                        <td>{{ number_format($producto->precio_venta, 2) }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->estado ? 'Activo' : 'Inactivo' }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $producto->producto_id }}">Editar</button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $producto->producto_id }}">Eliminar</button>
                        </td>
                    </tr>

                    <!-- Modal Editar -->
                    <div class="modal fade" id="editModal{{ $producto->producto_id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('productos.update', $producto->producto_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Editar Producto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="codigo_barras">Código de Barras</label>
                                            <input type="text" name="codigo_barras" class="form-control" value="{{ $producto->codigo_barras }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="categoria_id">Categoría</label>
                                            <select name="categoria_id" class="form-control" required>
                                                <option value="{{ $producto->categoria_id }}">{{ $producto->categoria->nombre }}</option>
                                                @foreach($categorias as $categoria)
                                                    <option value="{{ $categoria->categoria_id }}">{{ $categoria->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="subcategoria_id">Subcategoría</label>
                                            <select name="subcategoria_id" class="form-control" required>
                                                <option value="{{ $producto->subcategoria_id }}">{{ $producto->subcategoria->nombre }}</option>
                                                @foreach($subcategorias as $subcategoria)
                                                    <option value="{{ $subcategoria->subcategoria_id }}">{{ $subcategoria->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="unidad_id">Unidad de Medida</label>
                                            <select name="unidad_id" id="unidad_id" class="form-control" required>
                                                <option value="">Seleccione una unidad de medida</option>
                                                @foreach ($unidades as $unidad)
                                                    <option value="{{ $unidad->unidad_id }}">{{ $unidad->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="precio_compra">Precio de Compra</label>
                                            <input type="number" name="precio_compra" class="form-control" value="{{ $producto->precio_compra }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="precio_venta">Precio de Venta</label>
                                            <input type="number" name="precio_venta" class="form-control" value="{{ $producto->precio_venta }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="number" name="stock" class="form-control" value="{{ $producto->stock }}" required>
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
                    <div class="modal fade" id="deleteModal{{ $producto->producto_id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('productos.destroy', $producto->producto_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Eliminar Producto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estás seguro de eliminar el producto <strong>{{ $producto->nombre }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Crear Producto -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('productos.store') }}" method="POST">
                @csrf
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
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->categoria_id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategoria_id">Subcategoría</label>
                        <select name="subcategoria_id" class="form-control" required>
                            <option value="">Selecciona una subcategoría</option>
                            @foreach($subcategorias as $subcategoria)
                                <option value="{{ $subcategoria->subcategoria_id }}">{{ $subcategoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="unidad_id">Unidad de Medida</label>
                        <select name="unidad_id" id="unidad_id" class="form-control" required>
                            <option value="">Seleccione una unidad de medida</option>
                            @foreach ($unidades as $unidad)
                                <option value="{{ $unidad->unidad_id }}">{{ $unidad->nombre }}</option>
                            @endforeach
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
@endsection
@section('js')
    <!-- JavaScript para inicializar DataTables -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#categoriasTable1').DataTable(); // Inicializa DataTables en la tabla de usuarios
        });
    </script>
@stop
