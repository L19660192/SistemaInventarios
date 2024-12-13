<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ejemplo de datos dinámicos
        $residenciasActivas = 50;
        $estudiantes = 200;
        $supervisores = 20;
        $reportesRecientes = 5;

        // Datos para los gráficos
        $residenciasPorMes = [10, 15, 12, 20, 18, 25];
        $estudiantesPorCarrera = [
            'Ingeniería' => 50,
            'Ciencias' => 40,
            'Artes' => 30,
            'Negocios' => 80,
        ];

        return view('dashboard', compact(
            'residenciasActivas',
            'estudiantes',
            'supervisores',
            'reportesRecientes',
            'residenciasPorMes',
            'estudiantesPorCarrera'
        ));
    }
}
