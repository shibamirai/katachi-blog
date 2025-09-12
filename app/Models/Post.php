<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category'];

    public function scopeFilter($query, ?String $search)
    {
        $query->when($search ?? false, fn($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
