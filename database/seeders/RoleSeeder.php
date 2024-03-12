<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $rol1 = new Role();
        $rol1->description='Supervisor';
        $rol1->status=1;
        $rol1->save();

        $rol2 = new Role();
        $rol2->description='Inspector';
        $rol2->status=1;
        $rol2->save();

        $rol3 = new Role();
        $rol3->description='Técnico';
        $rol3->status=1;
        $rol3->save();

        $rol4 = new Role();
        $rol4->description='Administrador';
        $rol4->status=1;
        $rol4->save();

        $rol5 = new Role();
        $rol5->description='Líder';
        $rol5->status=1;
        $rol5->save();

        $rol6 = new Role();
        $rol6->description='Auxiliar';
        $rol6->status=1;
        $rol6->save();

        $rol7 = new Role();
        $rol7->description='Cliente';
        $rol7->status=1;
        $rol7->save();

        $rol8 = new Role();
        $rol8->description='Ingeniero';
        $rol8->status=1;
        $rol8->save();

    }
}
