<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jackiedo\Cart\Contracts\UseCartable;
use Jackiedo\Cart\Traits\CanUseCart;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Screen\AsSource;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Book extends Model implements UseCartable
{
    use AsSource, HasSlug, Filterable, CanUseCart, SoftDeletes, Attachable;

    protected $cartTitleField = 'title';
    protected $cartPriceField = 'display_price';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

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

    public function pictures()
    {
        return $this->hasOne(Attachment::class, 'id', 'picture_id')->withDefault();
    }

    public function getPictureUrlAttribute()
    {
        $picture = $this->pictures;

        if ($picture->exists) {
            return config('app.url') . "/storage/" . $picture->physicalPath();
        } else {
            return 'https://picsum.photos/700/700';
        }
    }

    public function getRouteAttribute()
    {
        return route('shop.show-book', $this->slug);
    }

    public function getDisplayPriceAttribute(): float
    {
        return $this->in_promotion ? $this->promotional_price : $this->price;
    }

    public function getInPromotionAttribute(): bool
    {
        return $this->promotional_price > 0;
    }

    public function getDiscountPercentageAttribute(): float
    {
        return $this->in_promotion ? round((($this->price - $this->promotional_price) / $this->price) * 100, 2) : 0;
    }
}
