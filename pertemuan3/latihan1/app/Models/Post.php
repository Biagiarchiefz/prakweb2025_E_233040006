<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = ['author','category'];

    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function scopeFilter($query, array $filters): void {
        $query->when($filters['search'] ?? false,
            fn ($query, $search) => $query->where('title', 'like', '%', $search )
        );

        $query->when($filters['category'] ?? false,
        fn ($query, $category) => $query->whereHas('category', fn($query) =>
        $query->where('slug', $category)
            )
        );


        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) => $query->whereHas(
                'author',
                fn($query) => $query->where('username', $author)
        )
        );


    }


}
