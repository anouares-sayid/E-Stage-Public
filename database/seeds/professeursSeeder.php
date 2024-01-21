<?php

use App\Professeur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class professeursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


       DB::insert("INSERT INTO users (id, lastname, firstname, email,password, created_at, updated_at) VALUES
    ('374','BENNANI','Walid','walid.bennani@uit.ac.ma',"."'".Hash::make('AZERTY')."'".",NULL,NULL),

");
        DB::insert("INSERT INTO professeurs (id, user_id, created_at, updated_at) VALUES
        ('2','374',NULL,NULL),

        
        ");


        $professeur =  Professeur::all();
       foreach ($professeur as $prof){

        $prof->user->assignRole('Professeur');
        
       }
    }
}
