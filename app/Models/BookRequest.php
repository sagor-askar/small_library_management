<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    use HasFactory;
    protected $table = 'book_requests';
    protected $fillable = ['book_info_id', 'student_name', 'requesting_date', 'return_date'];

    public function bookInfo()
    {
        return $this->belongsTo(BookInfo::class, 'book_info_id', 'id');
    }
}
