<?php

namespace Database\Seeders;

use App\Models\Selection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SelectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $selection1 = new Selection();
        $selection1->quantity = 7300;
        $selection1->total_ok = 350;
        $selection1->total_nok = 10;
        $selection1->rate = 250;
        $selection1->hours = 29.20;
        $selection1->price = 139;
        $selection1->cost = 4058.80;
        $selection1->observation = 'Terminado a tiempo';
        $selection1->status = '2';
        $selection1->product_id = 1;
        $selection1->customer_id = 1;
        $selection1->user_id = 1;
        $selection1->save();

        $selection2 = new Selection();
        $selection2->quantity = 8000;
        $selection2->total_ok = 7950;
        $selection2->total_nok = 0;
        $selection2->rate = 250;
        $selection2->hours = 29.20;
        $selection2->price = 139;
        $selection2->cost = 4058.80;
        $selection2->observation = 'Alta calidad';
        $selection2->status = '0';
        $selection2->product_id = 2;
        $selection2->customer_id = 2;
        $selection2->user_id = 2;
        $selection2->save();

        $selection3 = new Selection();
        $selection3->quantity = 6000;
        $selection3->total_ok = 400;
        $selection3->total_nok = 0;
        $selection3->rate = 250;
        $selection3->hours = 29.20;
        $selection3->price = 139;
        $selection3->cost = 4058.80;
        $selection3->observation = '';
        $selection3->status = '2';
        $selection3->product_id = 3;
        $selection3->customer_id = 3;
        $selection3->user_id = 3;
        $selection3->save();

        $selection4 = new Selection();
        $selection4->quantity = 5000;
        $selection4->total_ok = 190;
        $selection4->total_nok = 0;
        $selection4->rate = 250;
        $selection4->hours = 29.20;
        $selection4->price = 139;
        $selection4->cost = 4058.80;
        $selection4->observation = 'Proceso eficiente';
        $selection4->status = '2';
        $selection4->product_id = 4;
        $selection4->customer_id = 4;
        $selection4->user_id = 4;
        $selection4->save();

        $selection5 = new Selection();
        $selection5->quantity = 9000;
        $selection5->total_ok = 210;
        $selection5->total_nok = 0;
        $selection5->rate = 250;
        $selection5->hours = 29.20;
        $selection5->price = 139;
        $selection5->cost = 4058.80;
        $selection5->observation = 'Problemas de logística';
        $selection5->status = '2';
        $selection5->product_id = 5;
        $selection5->customer_id = 5;
        $selection5->user_id = 5;
        $selection5->save();


    }
}
