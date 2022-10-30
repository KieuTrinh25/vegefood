<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone', 'email', 'address', 'note'];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    public function locations()
    {
        return $this->belongsTo(Location::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
