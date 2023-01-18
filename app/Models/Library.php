<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Book;
use App\Models\Author;

class Library extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "membership",
        "address",
        "postal_code",
        "user_id"
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function authors()
    {
        return $this->hasMany(Author::class);
    }

    public function author_book()
    {
        $books = Book::all();

        $authors = Author::all();

        return $books->attach($authors);
    }
}
