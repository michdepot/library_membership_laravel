<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Book;
use Illuminate\Http\Request;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'library_id',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class,'author_book', 'author_id', 'book_id')->withPivot('author_id', 'book_id');
    }


}
