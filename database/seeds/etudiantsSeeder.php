<?php

use App\Etudiant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class etudiantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO users (id, lastname, firstname,  email,password, created_at, updated_at) VALUES
        ('6','ETTAZI','ANAS','anas.ettazi@uit.ac.ma',"."'".Hash::make('AZERTY')."'".",NULL,NULL),");
DB::insert("INSERT INTO etudiants (id, apogee, diplome, user_id, created_at, updated_at) VALUES
        ('2','17229143','NDIGEDU','6',NULL,NULL),
        ");

       $etudiants =  Etudiant::all();
       foreach ($etudiants as $etud){

        $etud->user->assignRole('User');

       }


    }
}