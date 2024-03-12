<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer1 = new Customer();
        $customer1->name = 'Robert Bosch GmbH';
        $customer1->rfc = 'ROBG123456ASD';
        $customer1->cp = 50255;
        $customer1->email = 'rober@gmail.com';
        $customer1->is_active = 1;
        $customer1->save();

        $customer2 = new Customer();
        $customer2->name = 'Tesla, Inc.';
        $customer2->rfc = 'TESL654321QWE';
        $customer2->cp = 90001;
        $customer2->email = 'tesla@example.com';
        $customer2->is_active = 1;
        $customer2->save();

        $customer3 = new Customer();
        $customer3->name = 'Apple Inc.';
        $customer3->rfc = 'APPL987654ZXC';
        $customer3->cp = 94025;
        $customer3->email = 'contact@apple.com';
        $customer3->is_active = 1;
        $customer3->save();

        $customer4 = new Customer();
        $customer4->name = 'Microsoft Corporation';
        $customer4->rfc = 'MSFT456789POI';
        $customer4->cp = 98052;
        $customer4->email = 'info@microsoft.com';
        $customer4->is_active = 1;
        $customer4->save();

        $customer5 = new Customer();
        $customer5->name = 'Amazon.com, Inc.';
        $customer5->rfc = 'AMZN123456789';
        $customer5->cp = 98109;
        $customer5->email = 'contact@amazon.com';
        $customer5->is_active = 1;
        $customer5->save();

    }
}
