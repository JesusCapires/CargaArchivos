<?php

namespace Database\Seeders;

use App\Models\LoadSelection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoadSelectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $load_selection = new LoadSelection() ;
        $load_selection->selection_id = 1;
        $load_selection->name = 'Ok';
        $load_selection->status = 1;
        $load_selection->save();

        $load_selection2 = new LoadSelection() ;
        $load_selection2->selection_id = 2;
        $load_selection2->name = 'NOK';
        $load_selection2->status = 1;
        $load_selection2->save();

        $load_selection3 = new LoadSelection() ;
        $load_selection3->selection_id = 3;
        $load_selection3->name = 'QConcern';
        $load_selection3->status = 1;
        $load_selection3->save();

        $load_selection4 = new LoadSelection() ;
        $load_selection4->selection_id = 4;
        $load_selection4->name = 'Prueba';
        $load_selection4->status = 1;
        $load_selection4->save();

        $load_selection5 = new LoadSelection() ;
        $load_selection5->selection_id = 5;
        $load_selection5->name = 'Lista';
        $load_selection5->status = 1;
        $load_selection5->save();
    }
}
