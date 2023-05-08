<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbShoppingCart extends Model
{
    use HasFactory;
    protected $table = 'ab_shopping_cart';

    public $timestamps = false;

    protected $fillable = ['id','ab_creator_id','ab_createdate'];
}
