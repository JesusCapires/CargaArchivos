<?php

namespace Database\Seeders;

use App\Models\DetailSelection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailSelectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detail_selection1 = new DetailSelection();
        $detail_selection1->date = '2024-02-13';
        $detail_selection1->serial = '3216636235';
        $detail_selection1->batch = '105051825';
        $detail_selection1->shift = 1;
        $detail_selection1->ok = 200;
        $detail_selection1->n_ok = 0;
        $detail_selection1->total = 200;
        $detail_selection1->selection_id = 1;
        $detail_selection1->observation = '';
        $detail_selection1->save();

        $detail_selection2 = new DetailSelection();
        $detail_selection2->date = '2024-02-14';
        $detail_selection2->serial = '1234567890';
        $detail_selection2->batch = 'ABC123';
        $detail_selection2->shift = 2;
        $detail_selection2->ok = 150;
        $detail_selection2->n_ok = 10;
        $detail_selection2->total = 160;
        $detail_selection2->selection_id = 1;
        $detail_selection2->observation = '';
        $detail_selection2->save();

        $detail_selection3 = new DetailSelection();
        $detail_selection3->date = '2024-02-15';
        $detail_selection3->serial = '9876543210';
        $detail_selection3->batch = 'XYZ789';
        $detail_selection3->shift = 3;
        $detail_selection3->ok = 200;
        $detail_selection3->n_ok = 0;
        $detail_selection3->total = 200;
        $detail_selection3->selection_id = 3;
        $detail_selection3->observation = '';
        $detail_selection3->save();

        $detail_selection3 = new DetailSelection();
        $detail_selection3->date = '2024-02-15';
        $detail_selection3->serial = '9876543210';
        $detail_selection3->batch = 'XYZ789';
        $detail_selection3->shift = 3;
        $detail_selection3->ok = 200;
        $detail_selection3->n_ok = 0;
        $detail_selection3->total = 200;
        $detail_selection3->selection_id = 3;
        $detail_selection3->observation = '';
        $detail_selection3->save();

        $detail_selection4 = new DetailSelection();
        $detail_selection4->date = '2024-02-16';
        $detail_selection4->serial = '4567890123';
        $detail_selection4->batch = 'DEF456';
        $detail_selection4->shift = 1;
        $detail_selection4->ok = 190;
        $detail_selection4->n_ok = 0;
        $detail_selection4->total = 190;
        $detail_selection4->selection_id = 4;
        $detail_selection4->observation = '';
        $detail_selection4->save();

        $detail_selection5 = new DetailSelection();
        $detail_selection5->date = '2024-02-17';
        $detail_selection5->serial = '0987654321';
        $detail_selection5->batch = 'GHI789';
        $detail_selection5->shift = 2;
        $detail_selection5->ok = 210;
        $detail_selection5->n_ok = 0;
        $detail_selection5->total = 210;
        $detail_selection5->selection_id = 5;
        $detail_selection5->observation = '';
        $detail_selection5->save();

    }
}
