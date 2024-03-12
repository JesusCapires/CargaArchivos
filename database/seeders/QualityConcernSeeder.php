<?php

namespace Database\Seeders;

use App\Models\QualityConcern;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QualityConcernSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quality_concern1 = new  QualityConcern();
        $quality_concern1->work_id = 1;
        $quality_concern1->selection_id = 1;
        $quality_concern1->save();

        $quality_concern1 = new  QualityConcern();
        $quality_concern1->work_id = 2;
        $quality_concern1->selection_id = 1;
        $quality_concern1->save();

        $quality_concern1 = new  QualityConcern();
        $quality_concern1->work_id = 3;
        $quality_concern1->selection_id = 3;
        $quality_concern1->save();

        $quality_concern1 = new  QualityConcern();
        $quality_concern1->work_id = 4;
        $quality_concern1->selection_id = 4;
        $quality_concern1->save();

        $quality_concern1 = new  QualityConcern();
        $quality_concern1->work_id = 5;
        $quality_concern1->selection_id = 5;
        $quality_concern1->save();
    }
}
