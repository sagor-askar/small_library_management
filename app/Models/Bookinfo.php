<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookinfo extends Model
{
    use HasFactory;
    protected $fillable = ['book_name', 'author', 'status'];

    public function bookRequests()
    {
        return $this->hasMany(bookRequest::class, 'book_info_id', 'id');
    }
}
