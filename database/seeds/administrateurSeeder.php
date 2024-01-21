<?php

use App\Administrateur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class administrateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO users (id, lastname, firstname, email,password, created_at, updated_at) VALUES
('1','ES-SAYID','Anouar','anouaressayid@gmail.com',"."'".Hash::make('123456789')."'".",NULL,NULL);

");
DB::insert("INSERT INTO administrateurs (id, user_id, created_at, updated_at) VALUES
        ('1','1',NULL,NULL);
");

$administrateur =  Administrateur::all();
foreach ($administrateur as $admin){

 $admin->user->assignRole('Super Admin');
 
}
    }
}
