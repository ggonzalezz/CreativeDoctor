<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        User::create([
            'name' => 'Gerson Bernardo',
        'email' => 'gersonbreakgonzalez@gmail.com',
        'password' => bcrypt('12345678'), // secret
        'dni'=>'12345678',
        'address' =>'',
        'phone' => '',
        'role' => 'admin'
        ]);

        User::create([
            'name' => 'Avenson Natanael',
        'email' => 'gersonbreakgonzalez1@gmail.com',
        'password' => bcrypt('12345678'), // secret
        'dni'=>'12345678',
        'address' =>'',
        'phone' => '',
        'role' => 'doctor'
        ]);
        User::create([
        'name' => 'Minche Benjamin',
        'email' => 'gersonbreakgonzalez2@gmail.com',
        'password' => bcrypt('12345678'), // secret
        'dni'=>'12345678',
        'address' =>'',
        'phone' => '',
        'role' => 'patient'
        ]);
        factory(User::class, 50)->states('patient')->create();
        
    }
}
