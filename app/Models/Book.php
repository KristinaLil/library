<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'summary',
        'isbn',
        'img',
        'pages',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function scopefindByName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'like', "%$name%");
        } else {
            return $query;
        }
    }


}
