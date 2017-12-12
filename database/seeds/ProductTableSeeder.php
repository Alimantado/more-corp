<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {

       for($i=0; $i<100; $i++)
       {
         DB::table('products')->insert([
           'name'=>str_random(8),
           'description'=>str_random(20),
           'price'=>rand(0, 1000)
         ]);
       }

     }
}
