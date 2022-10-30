<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = ['name','slug', 'description'];
    
    public function products(){
        return $this->hasMany(Product::class);
    }
    public static function booted(){
        static::created(function ($category){
            $category->slug = Str::slug($category->name) . '-' . $category->id;
            $category->save();
        });
        
    }
}
