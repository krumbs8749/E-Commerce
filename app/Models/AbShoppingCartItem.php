<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbShoppingCartItem extends Model
{
    use HasFactory;

    protected $table = 'ab_shoppingcart_item';

    public $timestamps = false;

    protected $fillable = ['id','ab_shoppingcart_id', 'ab_article_id','ab_createdate'];
}
