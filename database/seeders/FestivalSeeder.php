<?php

namespace Database\Seeders;

use App\Models\Festival;
use Illuminate\Database\Seeder;

class FestivalSeeder extends Seeder
{
    public function run()
    {
        Festival::create([
            'name' => 'Tomorrowland',
            'date' => '2024-07-15',
            'location' => 'Boom, België',
            'available_tickets' => 5000
        ]);

        Festival::create([
            'name' => 'Sziget Festival',
            'date' => '2024-08-10',
            'location' => 'Boedapest, Hongarije',
            'available_tickets' => 3000
        ]);

        Festival::create([
            'name' => 'Tomorrowland',
            'date' => '2024-07-20',
            'location' => 'Boom, België',
            'available_tickets' => 5000
        ]);

        Festival::create([
            'name' => 'Glastonbury Festival',
            'date' => '2024-06-26',
            'location' => 'Pilton, Verenigd Koninkrijk',
            'available_tickets' => 2000
        ]);

        Festival::create([
            'name' => 'Rock am Ring',
            'date' => '2024-06-07',
            'location' => 'Nürburgring, Duitsland',
            'available_tickets' => 4000
        ]);

        Festival::create([
            'name' => 'Coachella',
            'date' => '2024-04-12',
            'location' => 'Indio, Verenigde Staten',
            'available_tickets' => 6000
        ]);

        Festival::create([
            'name' => 'Pinkpop',
            'date' => '2024-06-14',
            'location' => 'Landgraaf, Nederland',
            'available_tickets' => 3000
        ]);

        Festival::create([
            'name' => 'Ultra Music Festival',
            'date' => '2024-03-22',
            'location' => 'Miami, Verenigde Staten',
            'available_tickets' => 2500
        ]);

    }
}
