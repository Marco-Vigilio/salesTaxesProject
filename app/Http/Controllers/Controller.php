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
        $totalPrice = 0;

        foreach ($productsOnCart as $prod) {
            $totalPrice = $totalPrice + $prod->price;
        }
        return view('cart', compact("productsOnCart", "totalPrice"));
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
        } else {
            $cartItem = new Cart();
            $cartItem->id_product = $product->id;
            $cartItem->name_product = $product->name;
            $cartItem->quantity = 1;
            $cartItem->price = $product->price;
        }

        // calcola il prezzo finale tassato
        $cartItem->price = $this->calculateTaxedPrice($cartItem);

        $cartItem->save();

        return redirect()->route('cart');
    }

    public function updateCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $fixProduct = Cart::where("id_product", $product->id)->first();

        $request->validate([
            "quantity" => "required|integer|min:1"
        ]);

        /*prende la quantità dal form e l'aggiorna nella quantità attuale
        cambia il prezzo in base alla quantità inserita per il prezzo singolo del prodotto
        */

        $fixProduct->quantity = $request->quantity;
        $fixProduct->price = $product->price * $fixProduct->quantity;

        $taxRate = $this->calculateTax($fixProduct);
        $fixProduct->price = $fixProduct->price + ($fixProduct->price * $taxRate / 100); // Applica la tassa

        $fixProduct->save();
        return redirect()->route('cart');
    }

    private function calculateTaxedPrice($fixProduct)
    {
        $basePrice = $fixProduct->price;
        $taxRate = $this->calculateTax($fixProduct);

        // calcolo del prezzo finale includendo la tassa
        $taxedPrice = $basePrice + ($basePrice * $taxRate / 100);

        return $taxedPrice;
    }

    private function calculateTax($fixProduct)
    {
        $categoryName = $fixProduct->product->category->name;
        $imported = $fixProduct->product->imported;

        // array di categorie dove sono esenti dalla tassazione di vendita
        $exemptCategories = ["Food", "Medical products", "Books"];

        // controlla se la categoria ha la tassazione d'importo
        if (in_array($categoryName, $exemptCategories) && $imported) {
            return 5;
        }

        // controlla se il prodotto ha la tassazione di vendita
        if (!in_array($categoryName, $exemptCategories) && !$imported) {
            return 10;
        }

        // controlla se il prodotto ha sia la tassazione di vendita che d'importo
        if (!in_array($categoryName, $exemptCategories) && $imported) {
            return 15;
        }

        // nessuna tassa per categorie esenti se non importati
        if (in_array($categoryName, $exemptCategories) && !$imported) {
            return 0;
        }

        // in teoria, non dovrebbe mai arrivare qui
        return 0;
    }

    public function deleteProductOnCart($id)
    {
        $product = Product::findOrFail($id);
        $deleteProduct = Cart::where("id_product", $product->id);
        $deleteProduct->delete();
        return redirect()->route('cart');
    }
}
