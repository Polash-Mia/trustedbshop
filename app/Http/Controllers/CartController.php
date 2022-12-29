<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Cart;
use Darryldecode\Cart\Cart;
use App\Models\Product;

class CartController extends Controller
{
    private $product;

    public function index(Request $request, $id)
    {
        $this->product = Product::find($id);
        
        \Cart::add(array (
            'id'        => $this->product->id,
            'name'      => $this->product->name,
            'price'     => $this->product->selling_price,
            'quantity'  => $request->quantity,
            'attributes'=> [
                'image' => $this->product->image
            ],
        ));
        return redirect('/show-cart');
    }

    public function show()
    {
        if(\Cart::isEmpty()){
            return redirect()->route('home');
        }else{
           
            return view('website.cart.show', [
                'products' => \Cart::getContent(),
            ]);
        }
    }

    public function remove($id)
    {
        \Cart::remove($id);
        return redirect()->back()->with('message', 'Cart product info remove successfully.');
    }

    
}
