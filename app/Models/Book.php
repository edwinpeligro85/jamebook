<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Screen\AsSource;

class Book extends Model
{
    use AsSource;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'isbn',
        'price',
        'title',
        'stock',
        'author_id',
        'picture_id',
    ];

    /**
     * Get the author that owns the book.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Get the category that owns the book.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the editorial that owns the book.
     */
    public function editorial()
    {
        return $this->belongsTo(Editorial::class);
    }

    /**
     * Get the language that owns the book.
     */
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function picture()
    {
        return $this->hasOne(Attachment::class, 'id', 'picture_id')->withDefault();
    }
}
