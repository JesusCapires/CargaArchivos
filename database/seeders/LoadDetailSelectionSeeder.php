<?php

namespace Database\Seeders;

use App\Models\LoadDetailSelection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class LoadDetailSelectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $load_selection = new LoadDetailSelection() ;
        $load_selection->detail_selection_id = 1;
        $load_selection->name = 'Check';
        $load_selection->status = 1;
        $load_selection->save();

        $load_selection2 = new LoadDetailSelection() ;
        $load_selection2->detail_selection_id = 2;
        $load_selection2->name = 'Firmas';
        $load_selection2->status = 1;
        $load_selection2->save();

        $load_selection3 = new LoadDetailSelection() ;
        $load_selection3->detail_selection_id = 3;
        $load_selection3->name = 'Fotos';
        $load_selection3->status = 1;
        $load_selection3->save();

        $load_selection4 = new LoadDetailSelection() ;
        $load_selection4->detail_selection_id = 4;
        $load_selection4->name = 'Rate';
        $load_selection4->status = 1;
        $load_selection4->save();

        $load_selection5 = new LoadDetailSelection() ;
        $load_selection5->detail_selection_id = 5;
        $load_selection5->name = 'Revisión';
        $load_selection5->status = 1;
        $load_selection5->save();
    }
}
