<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "price",
        "category_id",
        "imported"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, "id_category");
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, "id_product");
    }
}
