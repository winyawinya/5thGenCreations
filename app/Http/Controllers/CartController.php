<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Gloudemans\Shoppingcart\Facades\Cart;
use function GuzzleHttp\Promise\all;

class CartController extends Controller
{

    public function showCart()
    {
        
        return view('cart', [
            'cart' => Cart::content(),
            'total' => Cart::subtotal()
        ]);
    }

    public function addToCart(Request $request)
    {   
        
        $id = $request->id;
        $name = $request->itemName;
        $quantity = intval($request->itemQuantity);
        $price = ltrim($request->itemPrice, '₱');
        $size = $request->itemSize;
        $flavor = $request->itemFlavor;
        Cart::add($id, $name, $quantity, $price, 0, ['size' => $size, 'flavor' => $flavor]);
        return redirect('cart');
    }

    public function remove(Request $request)
    {
        Cart::remove($request->rowId);
        return redirect('cart');
    }

    public function checkout()
    {
        return view('checkout', [
            'cart' => Cart::content(),
            'total' => Cart::subtotal()
        ]);
    }
}
