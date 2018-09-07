<?php

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGuestList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $guestList = [
            [
                'first_name' => 'David',
                'last_name' => 'VanScott',
                'password' => '$2y$10$VwdxhYZ.7SE309WBY8jbaewa/yRp2J8/S1W9W.YxqxVCD5IWf/v62',
            ],
            [
                'first_name' => 'Leah',
                'last_name' => 'George VanScott',
                'password' => '$2y$10$YTyOtMQhrSP4DI50Xs.4SObf6bnhoDn8QuNhaVK0N/5Ba8VcbL0wu',
            ],

            ['first_name' => 'Daryl', 'last_name' => 'Donatelli', 'nicknames' => 'Doctor'],
            ['first_name' => 'Jennifer', 'last_name' => 'Donatelli', 'nicknames' => 'Jen'],
            ['first_name' => 'James', 'last_name' => 'Santimaw', 'nicknames' => 'Senator'],
            ['first_name' => 'Sammi', 'last_name' => 'Santimaw'],
            ['first_name' => 'Andrea', 'last_name' => 'Johns'],
            ['first_name' => 'Ben', 'last_name' => 'Johns'],
            ['first_name' => 'Bryon', 'last_name' => 'George'],
            ['first_name' => 'Jen', 'last_name' => 'George'],
            ['first_name' => 'Jason', 'last_name' => 'George'],
            ['first_name' => 'Angela', 'last_name' => 'George'],
            ['first_name' => 'Brittany', 'last_name' => 'Jones'],
            ['first_name' => 'Mitch', 'last_name' => 'Figlerowicz', 'nicknames' => 'Mitchell,Snitch,Snitchell'],
            ['first_name' => 'Maggie', 'last_name' => 'Carpenter'],
            ['first_name' => 'Peter', 'last_name' => 'Carpenter'],
            ['first_name' => 'Debbie', 'last_name' => 'VanScott'],
            ['first_name' => 'Peter', 'last_name' => 'VanScott'],
            ['first_name' => 'Jean', 'last_name' => 'VanScott'],
            ['first_name' => 'Joe', 'last_name' => 'VanScott'],
            ['first_name' => 'Mike', 'last_name' => 'VanScott', 'nicknames' => 'Michael'],
            ['first_name' => 'Marti', 'last_name' => 'VanScott'],
            ['first_name' => 'Mark', 'last_name' => 'Harnishfeger'],
            ['first_name' => 'MaryAnn', 'last_name' => 'Harnishfeger'],
            ['first_name' => 'Caleb', 'last_name' => 'VanScott'],
            ['first_name' => 'Summer', 'last_name' => 'VanScott'],
            ['first_name' => 'John', 'last_name' => 'VanScott'],
            ['first_name' => 'Cathy', 'last_name' => 'VanScott'],
            ['first_name' => 'Paul', 'last_name' => 'VanScott'],
            ['first_name' => 'Kate', 'last_name' => 'VanScott', 'nicknames' => 'Kathy'],
            ['first_name' => 'Caitlin', 'last_name' => 'VanScott'],
            ['first_name' => 'Ellen', 'last_name' => 'VanScott'],
            ['first_name' => 'Molly', 'last_name' => 'Murray'],
            ['first_name' => 'Bill', 'last_name' => 'Murray'],
            ['first_name' => 'Nancy', 'last_name' => 'Lantier'],
            ['first_name' => 'John', 'last_name' => 'Lantier'],
            ['first_name' => 'Jim', 'last_name' => 'Leninger'],
            ['first_name' => 'Pam', 'last_name' => 'Monaco', 'nicknames' => 'Pamela'],
            ['first_name' => 'Tony', 'last_name' => 'Monaco', 'nicknames' => 'Anthony'],
            ['first_name' => 'Alex', 'last_name' => 'Wang'],
            ['first_name' => 'Electra', 'last_name' => 'Hui'],
            ['first_name' => 'Bret', 'last_name' => 'Gallatin'],
            ['first_name' => 'Ryan', 'last_name' => 'Grevell'],
            ['first_name' => 'Mikel', 'last_name' => 'George'],
            ['first_name' => 'Mary Lou', 'last_name' => 'George', 'nickname' => 'MaryLou'],
            ['first_name' => 'Tita Mary', 'last_name' => 'Malark', 'nickname' => 'Mary,MaryAnn,Marry Ann'],
            ['first_name' => 'Tita Phyllis', 'last_name' => 'George', 'nickname' => 'Phyllis'],
            ['first_name' => 'Holly', 'last_name' => 'Plymale'],
            ['first_name' => 'Todd', 'last_name' => 'Plymale'],
            ['first_name' => 'Adam', 'last_name' => 'Michaels'],
            ['first_name' => 'Chrissy', 'last_name' => 'Michaels'],
            ['first_name' => 'Peter', 'last_name' => 'Turkow'],
            ['first_name' => 'Barb', 'last_name' => 'Gardner', 'nicknames' => 'Barbara'],

            ['first_name' => 'Sarah', 'last_name' => 'Ohl'],
            ['first_name' => 'Nicole', 'last_name' => 'McLean'],
            ['first_name' => 'Alan', 'last_name' => 'Plato'],
            ['first_name' => 'Jenna', 'last_name' => 'Young'],
            ['first_name' => 'Jacqueline', 'last_name' => 'Connor', 'nicknames' => 'Jackie'],
            ['first_name' => 'Ben', 'last_name' => 'Secor'],
            ['first_name' => 'Tommy', 'last_name' => 'Deredita'],
        ];

        collect($guestList)->each(function ($guest) {
            User::create($guest);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        User::delete();
    }
}
