<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['code', 'discount', 'quantity'];
    
    public function order_detail(){
        return $this->hasMany(User::class);
    }

}
