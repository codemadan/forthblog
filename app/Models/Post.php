<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory;
    use softDeletes;
    use searchable;

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }
}
