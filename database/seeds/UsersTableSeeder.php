<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app('db')
            ->table('users')
            ->insert([
                'name' => 'Everton Cézar',
                'nick' => '3v1nh0',
                'userLogin' => 'eviinho',
                'password' => '123456',
                'number' => '81996448784'
            ]);

        app('db')
            ->table('users')
            ->insert([
                'name' => 'Isabelle Lira',
                'nick' => 'belle98',
                'userLogin' => 'belle.lira',
                'password' => '123456',
                'number' => '81998705291'
            ]);
    }
}
