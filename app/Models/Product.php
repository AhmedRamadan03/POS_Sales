<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    // protected $fillable = [
        
    //     'name',
    //     'cat_id',
    //     'image',
    //     'purches_price',
    //     'sale_price',
    //     'stock'
    // ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
