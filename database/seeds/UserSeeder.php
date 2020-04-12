<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Pablo Lires',  	
        	'email' => 'pablo@librecomunicacion.net',
        	'password' => bcrypt('123')
        ]);
    }
}