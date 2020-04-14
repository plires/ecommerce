<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        User::create([
        	'name' => 'Pablo Lires',  	
        	'email' => 'pablo@librecomunicacion.net',
            'image' => 'http://via.placeholder.com/160x160',
            'admin' => 'true',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'phone' => '1150497501',
        	'password' => bcrypt('123')
        ]);
        
        factory(User::class, 29)->create();

    }
}