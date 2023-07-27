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
        User::create([
            'name' => 'Team4',
            'email' => 'team4@email.com',
            'password' => bcrypt('team4')
        ]);
    }
}
