<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'product_id', 'quantity','voucher_id'];
    public function products(){
        return $this->belongsTo(Product::class);
    }
    public function order(){
        return $this->belongsTo(OrderDetail::class);
    }
    public function vouchers(){
        return $this->belongsTo(Voucher::class);
    }
}
