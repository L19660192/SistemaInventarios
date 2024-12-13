<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        /*  Consultas relacionadas
        $categorias = Categoria::withCount('productos') // Relación con productos
            ->withSum('productos as stock_total', 'stock') // Suma del stock
            ->get();

        // Totales para las tarjetas
        $totales = [
            'categorias' => Categoria::count(),
            'productos' => Producto::count(),
            'stockTotal' => Producto::sum('stock'),
        ];

        Gráficos: Cantidad de productos por categoría
        $productosPorCategoria = $categorias->map(function ($categoria) {
            return [
                'nombre' => $categoria->nombre,
                'cantidad' => $categoria->productos_count,
            ];
        });
        $productosPorCategoria = Producto::with('categoria')
        ->select('categoria_id', DB::raw('count(*) as productos_count'), DB::raw('sum(stock) as stock_total'))
        ->groupBy('categoria_id')
        ->get();
        */
        // return view('home', compact('categorias', 'totales', 'productosPorCategoria'));

        //-----------------------------------------
        $categorias = Categoria::withCount('productos')->get(); // Obtener categorías con el conteo de productos
        $totalCategorias = Categoria::count();
        $totalProductos = Producto::count();
        $stockTotal = Producto::sum('stock'); // Sumar todo el stock
        return view('home', compact('categorias', 'totalCategorias', 'totalProductos', 'stockTotal'));
    }
}
