<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    public $timestamps = false;
      public function index()
    {
        $ventas = Venta::all();
        return view('ventas.index', compact('ventas'));
    }
}
