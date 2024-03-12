<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product1 = new Product();
        $product1->sku = '6002.KE0.292';
        $product1->description = 'HARNES';
        $product1->is_active = 1;
        $product1->save();

        $product2 = new Product();
        $product2->sku = '6003.FG2.155';
        $product2->description = 'CABLE';
        $product2->is_active = 1;
        $product2->save();

        $product3 = new Product();
        $product3->sku = '6004.JK9.888';
        $product3->description = 'CONECTOR';
        $product3->is_active = 1;
        $product3->save();

        $product4 = new Product();
        $product4->sku = '6005.LM7.777';
        $product4->description = 'PLUG';
        $product4->is_active = 0;
        $product4->save();

        $product5 = new Product();
        $product5->sku = '6006.NP3.444';
        $product5->description = 'SWITCH';
        $product5->is_active = 1;
        $product5->save();

    }
}
