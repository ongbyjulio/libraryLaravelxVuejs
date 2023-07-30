<?php

namespace Database\Seeders;

use App\Models\Author;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for ($i=0; $i < 20; $i++){
            $author = new Author;
            $name = $faker->name;
            $email = strtolower(str_replace(' ', '', $name)) . '@gmail.com';
            
            $author->name = $name;
            $author->email = $email;
            $author->phone_number = '0821'.$faker->randomNumber(8);
            $author->address = $faker->address;

            $author->save();
        }
    }
}
