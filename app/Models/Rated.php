<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rated extends Model
{ 
    protected $table = "rateds";
    use HasFactory;
    protected $fillable = ['rated', 'content', 'product_id', 'user_id'];
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
}
