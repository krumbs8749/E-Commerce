<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models;

class ShoppingCartAPIController extends Controller
{
    public function APICreateShoppingCart(Request $rd) {
        $userId = 1;
        if(!Models\AbShoppingCart::where('id', $userId)->exists()){
            $newShoppingCart = new Models\AbShoppingCart;
            $newShoppingCart->ab_creator_id = $userId;
            $newShoppingCart->ab_createdate = date_format(new \DateTime(), 'Y-m-d H:i:s');
            $newShoppingCart->save();
        }

        return Models\AbShoppingCart::where('ab_creator_id', $userId)->pluck('id')[0];

    }

    public function APIAddShoppingCartItem(Request $rd){
        $userId = 1;
        $shoppingCartId = $this->APICreateShoppingCart($rd);

        $postData = $rd->post();

        $newItem = new Models\AbShoppingCartItem();
        $newItem->ab_shoppingcart_id = $shoppingCartId;
        $newItem->ab_article_id = $postData['art_id'];
        $newItem->ab_createdate = date_format(new \DateTime(), 'Y-m-d H:i:s');
        $newItem->save();

        return $shoppingCartId;

    }
    public function APIDeleteShoppingCartItem(Request $rd, string $shoppingcartId, $articleId){
        Models\AbShoppingCartItem::where('ab_shoppingcart_id', $shoppingcartId)
                                    ->where('ab_article_id', $articleId)
                                    ->delete();
    }
}
