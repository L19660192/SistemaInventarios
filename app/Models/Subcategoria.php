<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;

    protected $table = 'subcategoria'; // Nombre de la tabla
    protected $primaryKey = 'subcategoria_id'; // Clave primaria

    public $timestamps = false; // Si la tabla no usa `created_at` y `updated_at`

    protected $fillable = [
        'nombre',
        'categoria_id',
        'estado'
    ];

    // Relación con categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'categoria_id');
    }
}
