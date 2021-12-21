<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;


class ProductCategory extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'status',
        'online',
        'name',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function products(){
        return $this->hasMany(Product::class, 'product_category_id', 'id');
    }
}
