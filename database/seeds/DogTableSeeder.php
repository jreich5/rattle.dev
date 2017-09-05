<?php

use Illuminate\Database\Seeder;

class DogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dog1 = new App\Models\Dog();
        $dog1->name = "Roxy";
        $dog1->breed = "Lab";
        $dog1->age = 3;
        $dog1->save();
    }
}
