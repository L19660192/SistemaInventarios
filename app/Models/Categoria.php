<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    use HasFactory;


    protected $table = 'categoria';  // Nombre de la tabla
    protected $primaryKey = 'categoria_id';  // Clave primaria



    protected $fillable = [
        'nombre',
        'descripcion',
        'estado'
    ];

    public $timestamps = false;  // Usar timestamps (created_at y updated_at)

    public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class, 'categoria_id', 'categoria_id');
    }
    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id', 'categoria_id'); // Relación uno a muchos
    }

}
