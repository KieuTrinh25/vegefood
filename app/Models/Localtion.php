<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localtion extends Model
{
    use HasFactory;
    protected $fillable = ['country', 'ship'];
}
