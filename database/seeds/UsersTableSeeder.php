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
        factory(User::class)->states('with-password')->create([
            'first_name' => 'David',
            'last_name' => 'VanScott',
            'email' => 'david.vanscott@gmail.com'
        ]);

        factory(User::class)->create([
            'first_name' => 'Leah',
            'last_name' => 'George',
            'email' => 'leahmariegeorge@gmail.com'
        ]);

        factory(User::class)->create([
            'first_name' => 'Jen',
            'last_name' => 'George',
            'nicknames' => 'Jennifer',
        ]);
    }
}
