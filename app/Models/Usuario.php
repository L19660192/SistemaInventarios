<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';

    // Campos asignables
    protected $fillable = [
        'n_documento',
        'nombre',
        'apellidos',
        'correo',
        'clave',
        'estado',
    ];

    // Opcional: agregar timestamp si no se utiliza el formato por defecto
    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = null;
}
