<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Cart::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $cart = Cart::query()->create([
            'user_id' => request('user_id'),
            'product_id' => $request->get('product_id'),
            'count' => $request->get('count')
        ]);

        return response()->json($cart);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return response()->json(Cart::query()->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $cart = Cart::query()->find($id);

        $cart->update([
            'user_id' => request()->user()->id,
            'product_id' => $request->get('product_id'),
            'count' => $request->get('count')
        ]);

        return response()->json('Cart successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        Cart::query()->find($id)->delete();
        return response()->json('Cart successfully deleted');
    }
}
