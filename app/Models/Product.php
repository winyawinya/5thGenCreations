<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'menu';
    protected $fillable = [
        'id',
        'name',
        'category',
        'variant',
        'size',
        'flavors',
        'price',
        'allegens',
        'description',
        'stocks'
    ];
}
