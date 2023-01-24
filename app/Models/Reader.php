<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name', 'email', 'phone'
    ];
    protected $primaryKey = "id";
    protected $table = 'readers';
}
