<?php

namespace App\Models;

use App\Models\Book;
use App\Models\TransactionDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id',
        // Tambahkan 'member_id' ke dalam $fillable
        'date_start',
        'date_end',
        'status',

    ];




    public function transactionDetails()
    {
        // hasOne untuk table yang bersifat one to one
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }
    public function books()
    {
        return $this->belongsToMany(Book::class, 'transaction_details', 'transaction_id', 'book_id')
            ->withTimestamps();

        //Metode withTimestamps() digunakan untuk memberi tahu Laravel bahwa tabel perantara (transaction_details) memiliki kolom created_at dan updated_at. Dengan menggunakan metode ini, Laravel akan secara otomatis memperbarui nilai kolom timestamp saat Anda menyimpan atau memperbarui relasi antara model Book dan Transaction.
    }

}