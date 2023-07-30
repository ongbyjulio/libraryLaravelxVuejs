<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id',
        // Tambahkan 'member_id' ke dalam $fillable
        'book_id',
        'qty',
    ];

    public function transaction()
    {
        // hasOne untuk table yang bersifat one to one
        return $this->hasMany('App\Models\Transaction', 'transaction_id');
    }


    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

}