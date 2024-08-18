<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = collect([
            'admin',
            'owner',
            'client'
        ])->map(fn($item) => ['name' => $item, 'created_at' => now(), 'updated_at' => now()])->toArray();

        Role::insert($roles);
    }
}
