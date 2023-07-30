<?php

namespace Database\Seeders;

use App\Models\Member;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

         $faker = Faker::create();
         for ($i=0; $i < 20; $i++){
            $member = new Member;
            $name = $faker->name;
            $email = strtolower(str_replace(' ', '', $name)) . '@gmail.com';
            
            $member->name = $name;
            $member->gender = $faker->randomElement(['L', 'P']);; //
            $member->phone_number = '0816'.$faker->randomNumber(8); // harus sama dengan banyak jumlah id 
            $member->address = $faker->address;
            $member->email = $email;

            $member->save();
    }
    }
}


