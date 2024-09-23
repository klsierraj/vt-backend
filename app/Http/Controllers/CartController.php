<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cartId = $request->header('Cart-Id');
        return CartItem::where('cart_id', $cartId)->with('product')->get();
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartId = $request->header('Cart-Id');
        $product = Product::findOrFail($request->product_id);
        $totalPrice = $product->price * $request->quantity;

        $cartItem = CartItem::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'cart_id' => $cartId,
        ]);

        return response()->json($cartItem, 201);
    }

    public function updateCartItem(Request $request, $id)
    {
        $cartId = $request->header('Cart-Id');
        $cartItem = CartItem::where('cart_id', $cartId)->findOrFail($id);

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($cartItem->product_id);
        $cartItem->quantity = $request->quantity;
        $cartItem->total_price = $cartItem->quantity * $product->price;
        $cartItem->save();

        return response()->json($cartItem);
    }

    public function removeCartItem($id)
    {
        $cartId = request()->header('Cart-Id');
        $cartItem = CartItem::where('cart_id', $cartId)->findOrFail($id);
        $cartItem->delete();
        return response()->noContent();
    }
}
