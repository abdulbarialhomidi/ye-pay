<?php

namespace Modules\Cart\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = $request->only(['id', 'title', 'price', 'image']);

        // جلب السلة من الجلسة أو إنشاء جديدة
        $cart = session()->get('cart', []);

        // إذا المنتج موجود بالفعل زد الكمية
        if (isset($cart[$product['id']])) {
            $cart[$product['id']]['quantity']++;
        } else {
            $cart[$product['id']] = [
                'title' => $product['title'],
                'price' => $product['price'],
                'image' => $product['image'],
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }
    public function checkout()
    {
        $cart = session()->get('cart', []);
         
        return view('frontend::cart.checkout', compact('cart'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cart::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cart::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('cart::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('cart::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
