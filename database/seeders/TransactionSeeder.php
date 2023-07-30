<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $faker = Faker::create();
        for ($i=0; $i < 30; $i++){
            $transaction = new Transaction;
            
            $transaction->member_id = rand(1,20);
            $transaction->date_start = date('Y-m-d', strtotime("-".rand(1,365)." days"));
            $transaction->date_end = date('Y-m-d', strtotime("+".rand(1,365)." days"));

            $transaction->save();
    }
}
}
