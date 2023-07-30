<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Book extends Model
{
    use HasFactory, HasRoles;
    protected $fillable = ['isbn', 'title', 'year', 'publisher_id', 'author_id', 'catalog_id', 'qty', 'price'];
    public function publisher()
    {
        // hasOne untuk table yang bersifat one to one
        return $this->belongsTo('App\Models\Publisher', 'publisher_id');
    }
    public function catalog()
    {
        // hasOne untuk table yang bersifat one to one
        return $this->belongsTo('App\Models\Catalog', 'catalog_id');
    }

    public function author()
    {
        // hasOne untuk table yang bersifat one to one
        return $this->belongsTo('App\Models\Author', 'author_id');
    }

    public function details()
    {
        return $this->belongsTo('App\Models\Publisher', 'publisher_id')
            ->belongsTo('App\Models\Catalog', 'catalog_id')
            ->belongsTo('App\Models\Author', 'author_id');
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class, 'book_id');
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class, 'transaction_details', 'book_id', 'transaction_id')
            ->withTimestamps();
    }



}