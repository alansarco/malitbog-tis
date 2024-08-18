<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\StatusEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'username' => 'owner1',
            'email' => 'owner1@test.com',
            'first_name' => 'test',
            'last_name' => 'owner',
            'role_id' => Role::where('name', 'owner')->first()?->id,
            'status' => StatusEnum::ACTIVE,
            'password' => bcrypt('1234'),
        ]);

        User::create([
            'username' => 'owner2',
            'email' => 'owner2@test.com',
            'first_name' => 'test2',
            'last_name' => 'owner2',
            'role_id' => Role::where('name', 'owner')->first()?->id,
            'status' => StatusEnum::ACTIVE,
            'password' => bcrypt('1234'),
        ]);
    }
}
