<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadDeMedida extends Model
{
    use HasFactory;

    protected $table = 'unidad_de_medida';  // Nombre de la tabla
    protected $primaryKey = 'unidad_id';   // Clave primaria

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public $timestamps = false; // Si no usas created_at y updated_at
}


