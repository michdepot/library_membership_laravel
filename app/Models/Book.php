<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year_published',
        'price',
        'publisher',
        'library_id',
        'author_id'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class,'author_book', 'author_id', 'book_id')->withPivot('author_id', 'book_id');
    }

    // $author->books()->attach($book) //ingani add ug item sa author_book nga table
    // $author->books()->attach([2,3,4]) //ingani kung daghan iadd na item
}
