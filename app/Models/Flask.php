<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flask extends Model
{
    use HasFactory;
    protected $table = 'flasks';
    protected $fillable = [
        'name',
        'oz',
        'price',
        'image',
    ];
}
