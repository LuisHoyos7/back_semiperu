<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\SolicitudCompra;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(RoleSeeder::class);
        User::factory()->create([
            'email' => 'test@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        SolicitudCompra::factory(20)->create();

    }
}
