<?php

namespace Database\Seeders;

use App\Models\Work;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $work1 = new Work();
        $work1->description = 'Trabajo de reacondicionamiento';
        $work1->is_active = 1;
        $work1->save();

        $work2 = new Work();
        $work2->description = 'Revisión de calidad';
        $work2->is_active = 1;
        $work2->save();

        $work3 = new Work();
        $work3->description = 'Mantenimiento preventivo';
        $work3->is_active = 1;
        $work3->save();

        $work4 = new Work();
        $work4->description = 'Ensamblaje de componentes';
        $work4->is_active = 1;
        $work4->save();

        $work5 = new Work();
        $work5->description = 'Prueba de rendimiento';
        $work5->is_active = 1;
        $work5->save();


    }
}
