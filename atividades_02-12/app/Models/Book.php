<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author_id', 'category_id', 'cover_image', 'publisher_id', ' published_year'];

    public function author()
    {
        return $this-> belongsTo(Author::class);
    }
    public function category()
    {
        return $this-> belongsTo(Category::class);
    }

    public function publisher()
    {
        return $this-> belongsTo(Publisher::class);
    }

    /** @public relacionamento com model da tabela users através da tabela pivô/intermediária borrowings */
    public function users()
    {
        return $this->belongsToMany(User::class, 'borrowings')->withPivot('id','borrowed_at', 'returned_at')->withTimestamps();
    }

    /** @public relacionamento com o Model Borrowing (tabela pivô). É possível fazer a consulta de empréstimos sem esse método, mas ele encapsula e simplifica essa função no Controller e outros possíveis lugares.*/   
    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
    
    /** @public metodo para obter a URL da imagem */
    public function getCoverImageUrlAttribute()
    {
        if($this->cover_image){
            return Storage::url($this->cover_image);
        } 
        else {
            return asset('images/default-book-cover.jpg');
        };
    } 

      /** @public Método para deletar a imagem do storage. Encapsula e Simplifica essa função no Controller e outros possíveis lugares. */
    public function deleteCoverImage()
    {
        if ($this->cover_image && Storage::disk('public')->exists($this->cover_image)) {
            Storage::disk('public')->delete($this->cover_image);
        }
    }

}
    
