<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone_number', 'address'];

    public function books()
    {
        // hasOne untuk table yang bersifat one to one
        return $this->hasMany('App\Models\Book', 'author_id');
    }

}