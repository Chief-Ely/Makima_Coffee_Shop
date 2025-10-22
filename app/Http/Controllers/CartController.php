<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Coffee;

class CartController extends Controller
{
    // 📦 Get all items in a user's cart
    public function index(Request $request)
    {
        $userId = $request->user_id; // e.g. from query parameter

        if (!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'User ID is required'
            ], 400);
        }

        $cartItems = Cart::where('user_id', $userId)
            ->with('coffee')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $cartItems
        ]);
    }

    // ➕ Add an item to cart
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'coffee_id' => 'required|exists:coffees,id',
            'amount' => 'nullable|integer|min:1'
        ]);

        $amount = $request->amount ?? 1;

        // check if already exists
        $existingCartItem = Cart::where('user_id', $request->user_id)
            ->where('coffee_id', $request->coffee_id)
            ->first();

        if ($existingCartItem) {
            // update the amount instead of adding a duplicate
            $existingCartItem->amount += $amount;
            $existingCartItem->save();

            return response()->json([
                'success' => true,
                'message' => 'Cart updated successfully',
                'data' => $existingCartItem->load('coffee')
            ]);
        }

        $cartItem = Cart::create([
            'user_id' => $request->user_id,
            'coffee_id' => $request->coffee_id,
            'amount' => $amount
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Item added to cart',
            'data' => $cartItem->load('coffee')
        ], 201);
    }

    // Update multiple cart items' amounts
    public function updateAmounts(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.cart_id' => 'required|integer|exists:carts,id',
            'items.*.amount' => 'required|integer|min:1|max:10',
        ]);

        $updatedItems = [];

        foreach ($request->items as $item) {
            $cartItem = Cart::find($item['cart_id']);
            if ($cartItem) {
                $cartItem->amount = $item['amount'];
                $cartItem->save();
                $updatedItems[] = $cartItem->load('coffee');
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Cart items updated successfully',
            'data' => $updatedItems
        ]);

        
    }

    // Checkout cart: clear all cart items for a user
    public function checkout(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        $userId = $request->user_id;

        // Optionally: you can store the order somewhere here

        // Delete all cart items for this user
        Cart::where('user_id', $userId)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Checkout completed and cart cleared.'
        ]);
    }



}
