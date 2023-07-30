<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Book;
use App\Models\TransactionDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $bookIds = Book::pluck('id'); 
         //Pada kode di atas, kita pertama mengambil seluruh nilai id dari tabel books 
         //menggunakan fungsi Book::pluck('id') dan menyimpannya pada variabel $bookIds. 
         //Selanjutnya, pada pengisian data tabel transaction_details, kita mengambil nilai 
         //acak dari $bookIds menggunakan fungsi $faker->randomElement($bookIds) untuk menghindari kesalahan 
         //pada konstrain kunci asing.
          $faker = Faker::create();
        for ($i=0; $i < 30; $i++){
            $tD = new TransactionDetail;
            
            $tD->transaction_id = rand(1,30);
            $tD->book_id = $faker->randomElement($bookIds);
            $tD->qty = rand(1,5);

            $tD->save();
    }
    }
}
