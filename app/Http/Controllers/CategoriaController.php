<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:150',
            'descripcion' => 'required',
        ]);

        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
        ]);

        return redirect()->route('categorias.index');
    }

    public function edit($id)
    {
        $categorias = Categoria::findOrFail($id);
        return response()->json($categoria);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:150',
            'descripcion' => 'required',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
        ]);

        return redirect()->route('categorias.index');
    }

    public function destroy($id)
    {
        try {
            $categoria = Categoria::findOrFail($id);

            // Intentar eliminar la categoría
            $categoria->delete();

            return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Verificar si el error es de restricción de clave foránea
            if ($e->getCode() == 23000) { // Código de error SQL para violaciones de integridad referencial
                return redirect()->route('categorias.index')->with('error', 'Por el momento esta categoría está en uso y no se puede eliminar.');
            }

            // Manejar otros errores (opcional)
            return redirect()->route('categorias.index')->with('error', 'Ocurrió un error al intentar eliminar la categoría.');
        }
    }

}
