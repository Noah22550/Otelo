<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categories;
use App\Models\Chambre;
use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $lire = fn (string $fichier) => 
        json_decode(file_get_contents(database_path("data/$fichier")), true);
       
        Categories::insert($lire('categories.json'));
        Chambre::insert($lire('chambres.json'));
        Reservation::insert($lire('reservations.json'));

        User::create([
            'name' => 'Finder',
            'email' => 'finder@partenaires.example',
            'password' => 'Finder-Partenaire-2026!',
        ]);
    }
}