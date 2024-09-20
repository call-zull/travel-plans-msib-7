<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content', 'is_published', 'published_date'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_published' => 'boolean',
        'published_date' => 'date',
    ];

    // Start Accessor
    public function publishedDateFormatted(): Attribute
    {
        return Attribute::make(fn() => $this->published_date->format('d M Y'));
    }

    public function contentShort(): Attribute
    {
        return Attribute::make(fn() => substr($this->content, 0, 100));
    }
    // End Accessor

    public function published(): bool
    {
        return $this->is_published === true;
    }

    // Start Scope
    public function scopeFilter($query, $params) {}

    public function scopeMostLikes($query) {}

    public function scopeMostVisitors($query) {}

    public function scopePopular($query)
    {
        $query->mostLikes()->mostVisitors();
    }

    public function scopePublished($query)
    {
        $query->where('is_published', true);
    }
    // End Scope
}
