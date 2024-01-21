<?php

use App\Universite;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        $this->call([ PermissionSeeder::class,administrateurSeeder::class,etudiantsSeeder::class,professeursSeeder::class]);
    }
}
