<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        //faccio vedere tutti i prodotti
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function showCart()
    {
        $productsOnCart = Cart::all();
        return view('cart', compact("productsOnCart"));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        /*verificare se il prodotto gia esistente nel Cart,
         se esiste aggiungere +1 alla quantità, 
         altrimenti crearne uno nuovo 
         */

        $cartItem = Cart::where("id_product", $product->id)->first();

        if ($cartItem) {
            $cartItem->quantity = $cartItem->quantity + 1;
            $cartItem->price = $cartItem->price + $product->price;
        } else {
            $cartItem = new Cart();
            $cartItem->id_product = $product->id;
            $cartItem->name_product = $product->name;
            $cartItem->quantity = 1;
            $cartItem->price = $product->price;
        }

        $cartItem->save();

        $productsOnCart = Cart::all();

        return view('cart', compact("productsOnCart"));
    }
}
