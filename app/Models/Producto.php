<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
 // Nombre de la tabla asociada
 protected $table = 'productos';

 // Nombre de la clave primaria
 protected $primaryKey = 'producto_id';
    protected $fillable = [
        'codigo_barras',
        'nombre',
        'categoria_id',
        'subcategoria_id',
        'unidad_id',
        'precio_compra',
        'precio_venta',
        'stock',
        'estado'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id','categoria_id');//,'categoria_id'
    }

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class, 'subcategoria_id','subcategoria_id');
    }

    public function unidadDeMedida()
    {
        return $this->belongsTo(UnidadDeMedida::class, 'unidad_id','unidad_id');
    }
    public $timestamps = false;
}
