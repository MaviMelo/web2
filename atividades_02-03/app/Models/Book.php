<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author_id', 'category_id', 'published_id', ' published_year'];

    public function author()
    {
        $this-> belongsTo(Author::class);
    }
    public function category()
    {
        $this-> belongsTo(Category::class);
    }

    public function publisher()
    {
        $this-> belongsTo(Publisher::class);
    }

}
