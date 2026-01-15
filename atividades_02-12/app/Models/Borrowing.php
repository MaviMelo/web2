<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    /** @use HasFactory<\Database\Factories\BorrowingFactory> */
    use HasFactory;

    /** @var Campos que podem ser preenchidos */
    protected $fillable =[
        'user_id',
        'book_id',
        'borrowed_at',
        'returned_at'
    ];

    /** @public relacionamento com o Model User */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** @public relacionamento com o Model Book */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

}
