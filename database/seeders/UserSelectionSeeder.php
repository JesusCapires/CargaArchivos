<?php

namespace Database\Seeders;

use App\Models\UserSelection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSelectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_selection1 = new  UserSelection();
        $user_selection1->selection_id = 1;
        $user_selection1->user_id = 1;
        $user_selection1->status = 1;
        $user_selection1->save();

        $user_selection2 = new  UserSelection();
        $user_selection2->selection_id = 2;
        $user_selection2->user_id = 2;
        $user_selection2->status = 1;
        $user_selection2->save();

        $user_selection3 = new  UserSelection();
        $user_selection3->selection_id = 3;
        $user_selection3->user_id = 3;
        $user_selection3->status = 1;
        $user_selection3->save();

        $user_selection4 = new  UserSelection();
        $user_selection4->selection_id = 4;
        $user_selection4->user_id = 4;
        $user_selection4->status = 1;
        $user_selection4->save();

        $user_selection5 = new  UserSelection();
        $user_selection5->selection_id = 5;
        $user_selection5->user_id = 5;
        $user_selection5->status = 1;
        $user_selection5->save();
    }
}
