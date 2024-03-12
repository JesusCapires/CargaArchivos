<?php

namespace Database\Seeders;

use App\Models\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $log1 = new Log();
        $log1->quantity_nok = 5;
        $log1->is_active = 1;
        $log1->id_quality_concerns = 1;
        $log1->id_details_select = 2;
        $log1->save();

        $log2 = new Log();
        $log2->quantity_nok = 5;
        $log2->is_active = 1;
        $log2->id_quality_concerns = 2;
        $log2->id_details_select = 2;
        $log2->save();

        $log4 = new Log();
        $log4->quantity_nok = 1;
        $log4->is_active = 1;
        $log4->id_quality_concerns = 3;
        $log4->id_details_select = 3;
        $log4->save();

        $log5 = new Log();
        $log5->quantity_nok = 10;
        $log5->is_active = 1;
        $log5->id_quality_concerns = 3;
        $log5->id_details_select = 4;
        $log5->save();
    }
}
