<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'content'
    ];

    protected $table = 'posts';
    public function reader()
    {
        return $this->belongsTo(Reader::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
