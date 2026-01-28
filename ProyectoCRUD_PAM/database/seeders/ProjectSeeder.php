<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Proyecto CRUD',
                'description' => 'Proyecto base para practicar MVC, migraciones y seeders.',
            ],
            [
                'title' => 'Proyecto Autenticación',
                'description' => 'Registro, login, logout y adaptación de interfaz.',
            ],
            [
                'title' => 'Proyecto Traducciones',
                'description' => 'ES/EN/FR con selector persistente.',
            ],
        ];

        foreach ($projects as $p) {
            Project::create($p);
        }
    }
}
