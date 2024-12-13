<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = [
            [
                'id' => 1,
                'titulo' => 'Detalles del Proyecto',
                'asesor' => 'Luciano Contreras Quintero',
                'publicado' => 'hace 6 meses',
                'etapas' => [
                    ['nombre' => 'Etapa 1', 'activa' => false],
                    ['nombre' => 'Etapa 2', 'activa' => false],
                    ['nombre' => 'Etapa 3', 'activa' => false],
                    ['nombre' => 'Etapa 4', 'activa' => false],
                    ['nombre' => 'Etapa 5', 'activa' => true],
                    ['nombre' => 'Etapa 6', 'activa' => false],
                ],
            ],
            // Agrega más proyectos según sea necesario
        ];

        return view('projects', compact('projects'));
    }

}
