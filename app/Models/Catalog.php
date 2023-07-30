<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $fillable = ['name']; //auto insert kolom apa saja yang akan auto create, ini merupakan cara kedua yang ada di controller

    public function books()
    {
        // hasOne untuk table yang bersifat one to one
        return $this->hasMany('App\Models\Book', 'catalog_id');
    }

}