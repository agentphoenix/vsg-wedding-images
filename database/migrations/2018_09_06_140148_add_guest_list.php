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
            ['first_name' => 'Carol', 'last_name' => 'Batterby'],
            ['first_name' => 'Geoff', 'last_name' => 'Batterby'],
            ['first_name' => 'Emily', 'last_name' => 'Batterby'],
            ['first_name' => 'Jennifer', 'last_name' => 'Caton'],
            ['first_name' => 'Kevin', 'last_name' => 'Caton'],
            ['first_name' => 'Alan', 'last_name' => 'Cohen'],
            ['first_name' => 'Lindsay', 'last_name' => 'D\'Andrea'],
            ['first_name' => 'Nicholas', 'last_name' => 'Brennick', 'nicknames' => 'Nick'],
            ['first_name' => 'George', 'last_name' => 'Dailey'],
            ['first_name' => 'Heather', 'last_name' => 'Caward'],
            ['first_name' => 'Cristina', 'last_name' => 'Domingues Umbrino'],
            ['first_name' => 'Frank', 'last_name' => 'Umbrino'],
            ['first_name' => 'Carrie Ashley', 'last_name' => 'Doran', 'nicknames' => 'Carrie'],
            ['first_name' => 'Tim', 'last_name' => 'Doran'],
            ['first_name' => 'Jennifer', 'last_name' => 'Ernst-George', 'nicknames' => 'Jen'],
            ['first_name' => 'Matthew', 'last_name' => 'George', 'nicknames' => 'Matt'],
            ['first_name' => 'Debbie', 'last_name' => 'Ford'],
            ['first_name' => 'David', 'last_name' => 'Ford'],
            ['first_name' => 'David', 'last_name' => 'Frasca'],
            ['first_name' => 'Jean', 'last_name' => 'Frasca'],
            ['first_name' => 'Lynda', 'last_name' => 'Frasca'],
            ['first_name' => 'Joe', 'last_name' => 'Frasca'],
            ['first_name' => 'Tyler', 'last_name' => 'Gardner'],
            ['first_name' => 'Alexis', 'last_name' => 'Gardner', 'nicknames' => 'Lexi'],
            ['first_name' => 'Tod', 'last_name' => 'Gardner'],
            ['first_name' => 'Carrie', 'last_name' => 'Gardner'],
            ['first_name' => 'Michelle', 'last_name' => 'George-Mason'],
            ['first_name' => 'Jim', 'last_name' => 'Mason', 'nicknames' => 'James'],
            ['first_name' => 'Alex', 'last_name' => 'George'],
            ['first_name' => 'Sarah', 'last_name' => 'Gigliotti'],
            ['first_name' => 'David', 'last_name' => 'George', 'nicknames' => 'Pecos'],
            ['first_name' => 'Margaret', 'last_name' => 'George'],
            ['first_name' => 'Stephen', 'last_name' => 'George', 'nicknames' => 'Buster'],
            ['first_name' => 'Janet', 'last_name' => 'George-Felix'],
            ['first_name' => 'Joseph', 'last_name' => 'Felix', 'nicknames' => 'Joe'],
            ['first_name' => 'Liz', 'last_name' => 'Gombert'],
            ['first_name' => 'Jamie', 'last_name' => 'White'],
            ['first_name' => 'Sam', 'last_name' => 'Gonzalez', 'nicknames' => 'Samantha'],
            ['first_name' => 'Olivia', 'last_name' => 'Fisher'],
            ['first_name' => 'Dana', 'last_name' => 'Gorman'],
            ['first_name' => 'Vickie', 'last_name' => 'Hamling'],
            ['first_name' => 'Rich', 'last_name' => 'Hamling'],
            ['first_name' => 'Amy', 'last_name' => 'Heinze'],
            ['first_name' => 'Andy', 'last_name' => 'Heinze', 'nicknames' => 'Andrew'],
            ['first_name' => 'Staci', 'last_name' => 'Henning'],
            ['first_name' => 'Eric', 'last_name' => 'Knaak'],
            ['first_name' => 'Joseph', 'last_name' => 'Hessney Jr', 'nicknames' => 'Joe'],
            ['first_name' => 'Roberta', 'last_name' => 'Hessney'],
            ['first_name' => 'Joseph', 'last_name' => 'Hessney', 'nicknames' => 'Joe'],
            ['first_name' => 'Matthew', 'last_name' => 'Hurlbutt', 'nicknames' => 'Matt'],
            ['first_name' => 'Kristen', 'last_name' => 'Hurlbutt'],
            ['first_name' => 'Jacquie', 'last_name' => 'Jantzen'],
            ['first_name' => 'Billy', 'last_name' => 'Clyde', 'nicknames' => 'Bill'],
            ['first_name' => 'Patrice', 'last_name' => 'Jones'],
            ['first_name' => 'Hardice', 'last_name' => 'Jones'],
            ['first_name' => 'Kim', 'last_name' => 'Kozlowski'],
            ['first_name' => 'Johnny', 'last_name' => 'Kozlowski'],
            ['first_name' => 'Al', 'last_name' => 'Liberio'],
            ['first_name' => 'Elaine', 'last_name' => 'Liberio'],
            ['first_name' => 'Jessica', 'last_name' => 'Shaver'],
            ['first_name' => 'Erik', 'last_name' => 'Mason'],
            ['first_name' => 'Jeff', 'last_name' => 'Melito'],
            ['first_name' => 'Cathy', 'last_name' => 'Melito'],
            ['first_name' => 'Jennifer', 'last_name' => 'Meyers', 'nicknames' => 'Jen'],
            ['first_name' => 'Craig', 'last_name' => 'Meyers'],
            ['first_name' => 'Carter', 'last_name' => 'Middleton'],
            ['first_name' => 'Katie', 'last_name' => 'Vaughan'],
            ['first_name' => 'Will', 'last_name' => 'Middleton'],
            ['first_name' => 'Diana', 'last_name' => 'Palotas Sherwood'],
            ['first_name' => 'Jonathan', 'last_name' => 'Sherwood'],
            ['first_name' => 'Gloria', 'last_name' => 'Paris'],
            ['first_name' => 'John', 'last_name' => 'Paris'],
            ['first_name' => 'Ethel', 'last_name' => 'Peters'],
            ['first_name' => 'Pete', 'last_name' => 'Peters', 'nicknames' => 'Peter'],
            ['first_name' => 'Tony', 'last_name' => 'Polce'],
            ['first_name' => 'Nancy', 'last_name' => 'Polce'],
            ['first_name' => 'Sarah', 'last_name' => 'Stefanovic'],
            ['first_name' => 'Thomas', 'last_name' => 'Stefanovic', 'nicknames' => 'Tom'],
            ['first_name' => 'Catherine', 'last_name' => 'Utter', 'nicknames' => 'Cathy'],
            ['first_name' => 'Liz', 'last_name' => 'VanDermallie'],
            ['first_name' => 'Eric', 'last_name' => 'VanDermallie'],
            ['first_name' => 'Erin', 'last_name' => 'Wedemeyer-Swain'],
            ['first_name' => 'David', 'last_name' => 'Swain', 'nicknames' => 'Dave'],
            ['first_name' => 'Rama', 'last_name' => 'Yelkur'],
            ['first_name' => 'Mo', 'last_name' => 'Yelkur'],

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
