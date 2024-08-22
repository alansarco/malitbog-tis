<?php

namespace Database\Seeders;

use App\Models\Establishment;
use App\Models\Image;
use App\Models\User;
use App\StatusEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstablishmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('username', 'owner1')->first();

        $establishment = Establishment::create([
            'name' => 'Establishment1',
            'owner_id' => $user->id,
            'address' => 'Malitbog, Southern Leyte',
            'description' => 'Most Respected Establishment',
            'mode_of_transportation' => 'walking,motorcycle,car',
            'geolocation_longitude' => '124.9617',
            'geolocation_latitude' => '10.1792',
            'date_of_site_visit' => now()->format('y-m-d'),
            'status' => StatusEnum::ACTIVE,
        ]);

        Image::create([
            'establishment_id' => $establishment->id,
            'name' => 'Cover Page',
            'path' => 'https://upload.wikimedia.org/wikipedia/commons/b/b5/Santo_Ni%C3%B1o_Catholic_Church_in_Malitbog%2C_Southern_Leyte.jpg',
            'is_cover' => true,
        ]);

        Establishment::create([
            'name' => 'Prestigious 2',
            'owner_id' => $user->id,
            'address' => 'Malitbog, Southern Leyte',
            'description' => 'Most Respected Establishment 2',
            'mode_of_transportation' => 'walking,motorcycle,car',
            'geolocation_longitude' => '124.9617',
            'geolocation_latitude' => '10.1792',
            'date_of_site_visit' => now()->format('y-m-d'),
            'status' => StatusEnum::ACTIVE,
        ]);


        // Owner2
        $user2 = User::where('username', 'owner2')->first();

        Establishment::create([
            'name' => 'Most Visited',
            'owner_id' => $user2->id,
            'address' => 'Malitbog, Southern Leyte',
            'description' => 'Most Respected Establishment 3',
            'mode_of_transportation' => 'walking,motorcycle,car',
            'geolocation_longitude' => '124.9617',
            'geolocation_latitude' => '10.1792',
            'date_of_site_visit' => now()->format('y-m-d'),
            'status' => StatusEnum::ACTIVE,
        ]);
    }
}
