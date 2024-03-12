<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = new User();
        $user1->name = 'Adrian';
        $user1->email = 'adrian@example.com';
        $user1->password = bcrypt('123456');
        $user1->is_active = 1;
        $user1->role_id = 1;
        $user1->save();

        $user2 = new User();
        $user2->name = 'Daniel';
        $user2->email = 'daniel@example.com';
        $user2->password = bcrypt('123456');
        $user2->is_active = 1;
        $user2->role_id = 2;
        $user2->save();

        $user3 = new User();
        $user3->name = 'Dafne';
        $user3->email = 'dafne@example.com';
        $user3->password = bcrypt('123456');
        $user3->is_active = 1;
        $user3->role_id = 3;
        $user3->save();

        $user4 = new User();
        $user4->name = 'Carol';
        $user4->email = 'carol@example.com';
        $user4->password = '123456';
        $user4->is_active = 1;
        $user4->role_id = 4;
        $user4->save();

        $user5 = new User();
        $user5->name = 'Hugo';
        $user5->email = 'hugo@example.com';
        $user5->password = '123456';
        $user5->is_active = 1;
        $user5->role_id = 5;
        $user5->save();

        $user6 = new User();
        $user6->name = 'Jorge';
        $user6->email = 'jorge@example.com';
        $user6->password = '123456';
        $user6->is_active = 1;
        $user6->role_id = 6;
        $user6->save();

        $user7 = new User();
        $user7->name = 'Laura';
        $user7->email = 'laura@example.com';
        $user7->password = '123456';
        $user7->is_active = 1;
        $user7->role_id = 7;
        $user7->save();

        // Ejemplo 8: Maria
        $user8 = new User();
        $user8->name = 'Maria';
        $user8->email = 'maria@example.com';
        $user8->password = '123456';
        $user8->is_active = 1;
        $user8->role_id = 8;
        $user8->save();

    }
}
