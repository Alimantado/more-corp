<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {

         for($i=0; $i<10; $i++)
         {
           DB::table('users')->insert([
             'name'=>str_random(8),
             'email'=>str_random(12).'gmail.com',
             'password'=>bcrypt('morecorp')
           ]);
         }

     }
}
