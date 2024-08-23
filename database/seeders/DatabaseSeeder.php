<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Farms;

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

        Farms::create([
            'codice' => '1',
            'nome' => '1-Company',
        ]);

        User::create([
            'name' => 'Francesco Merlino',
            'email' => 'francescomerlino01@gmail.com',
            'password' => bcrypt('PasswordTest'),
            'role' => 'Super Admin',
            'farm_id' => 1
        ]);

        User::create([
            'name' => 'Admin Test',
            'email' => 'precisionfarmingmanagement@gmail.com',
            'password' => bcrypt('PasswordTest'),
            'role' => 'Super Admin',
            'farm_id' => 1
        ]);
        
    }
}
