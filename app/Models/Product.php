<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'quantity', 'description', 'category_id','view'];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function orderDetail(){
        return $this->belongsTo(OrderDetail::class);
    }    
}
