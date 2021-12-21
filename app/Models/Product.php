<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Product extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'product_category_id',
        'status',
        'online',
        'name',
        'price',
        'image',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function category(){
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }
}
