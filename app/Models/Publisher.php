<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone_number', 'address'];

    public function books()
    {
        // hasOne untuk table yang bersifat one to one
        return $this->hasMany('App\Models\Book', 'publisher_id');
    }
}