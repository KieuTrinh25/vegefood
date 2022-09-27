<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
<<<<<<< HEAD
    use HasFactory;
    protected $fillable = ['name', 'price', 'quantity', 'description', 'category_id','view'];
=======
    use HasFactory, InteractsWithMedia;
    protected $fillable = ['name', 'price', 'quantity', 'description', 'category_id'];
>>>>>>> 3ab36a0 (media)
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function orderDetail(){
        return $this->belongsTo(OrderDetail::class);
    }    
}
