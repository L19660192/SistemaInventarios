<?php
namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use App\Models\UnidadDeMedida;


class ProductoController extends Controller
{
    public function index()
    {
        // Obtener productos con sus categorías y subcategorías
        $productos = Producto::with(['categoria', 'subcategoria', 'unidadDeMedida'])->get();
        $categorias = Categoria::all(); // Obtener todas las categorías
        $subcategorias = Subcategoria::all(); // Obtener todas las subcategorías
        $unidades = UnidadDeMedida::all();
        return view('productos.index', compact('productos', 'categorias', 'subcategorias', 'unidades'));
    }

    public function store(Request $request)
    {
        // Validación y creación del producto
        $request->validate([
            'codigo_barras' => 'required',
            'nombre' => 'required',
            'categoria_id' => 'required|exists:categoria,categoria_id',
            'subcategoria_id' => 'required|exists:subcategoria,subcategoria_id',
            'unidad_id' => 'required|exists:unidad_de_medida,unidad_id',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        Producto::create([
            'codigo_barras' => $request->codigo_barras,
            'nombre' => $request->nombre,
            'categoria_id' => $request->categoria_id,
            'subcategoria_id' => $request->subcategoria_id,
            'unidad_id' => $request->unidad_id,
            'precio_compra' => $request->precio_compra,
            'precio_venta' => $request->precio_venta,
            'stock' => $request->stock,
            'estado' => $request->estado,
        ]);

        return redirect()->route('productos.index');
    }

    public function update(Request $request, $id)
    {
        // Validación y actualización del producto
        $request->validate([
            'codigo_barras' => 'required',
            'nombre' => 'required',
            'categoria_id' => 'required|exists:categoria,categoria_id',
            'subcategoria_id' => 'required|exists:subcategoria,subcategoria_id',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update([
            'codigo_barras' => $request->codigo_barras,
            'nombre' => $request->nombre,
            'categoria_id' => $request->categoria_id,
            'subcategoria_id' => $request->subcategoria_id,
            'precio_compra' => $request->precio_compra,
            'precio_venta' => $request->precio_venta,
            'stock' => $request->stock,
            'estado' => $request->estado,
        ]);

        return redirect()->route('productos.index');
    }

    public function destroy($id)
    {
        // Eliminar producto
        Producto::destroy($id);
        return redirect()->route('productos.index');
    }
}
