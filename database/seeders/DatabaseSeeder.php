<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\dataAdmin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        dataAdmin::create([
            'nama' => 'risang',
            'mentor' => 'edy',
            'waktu' => '08.00 - 16.00',
            'training' => 'Laravel Dasar'
        ]);

    }
}
