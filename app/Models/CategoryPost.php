<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title'
    ];
    protected $table = 'category_posts';
    public function post()
    {
        return $this->hasMany(Post::class, 'cate_id');
    }
}
