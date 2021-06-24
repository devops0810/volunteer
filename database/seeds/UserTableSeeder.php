<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'=>'Admin',
            'email'=>'admin@email.com',
            'password'=>bcrypt('password'),
            'role_id'=>1,
        ]);
    }
}
