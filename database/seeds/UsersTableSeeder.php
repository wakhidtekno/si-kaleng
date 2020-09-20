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
            'username' => 'admin',
            'nama'     => 'admin',
            'level'    => '0',
            'password' => bcrypt('admin'),
        ]);
    }
}
