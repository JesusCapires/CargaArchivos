<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DetailRequest;
use App\Models\QualityConcern;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(WorkSeeder::class);
        $this->call(SelectionSeeder::class);
        $this->call(UserSelectionSeeder::class);
        $this->call(DetailSelectionSeeder::class);
        $this->call(QualityConcernSeeder::class);
        $this->call(LoadDetailSelectionSeeder::class);
        $this->call(LoadSelectionSeeder::class);
        $this->call(LogSeeder::class);
    }
}
