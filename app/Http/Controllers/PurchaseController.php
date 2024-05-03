<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (auth()->check() && (auth()->user()->role === 'Inventory' || auth()->user()->role === 'Admin')) {

            $products = Product::all();
            $categories = Category::all();

            return view('purchases_products.index', [
                'products' => $products,
                'categories' => $categories
            ]);
        } else {
            return redirect('/noAcces')->with('error', 'Je hebt geen toegang tot deze pagina.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (auth()->check() && (auth()->user()->role === 'Inventory' || auth()->user()->role === 'Admin')) {
            $products = Product::all();
            $categories = Category::all();
            return view('purchases_products.create', [
                'products' => $products,
                'categories' => $categories
            ]);
        } else {
            return redirect('/noAcces')->with('error', 'Je hebt geen toegang tot deze pagina.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (auth()->check() && (auth()->user()->role === 'Inventory' || auth()->user()->role === 'Admin')) {

            $products = Product::where('id', $id)->first();
            $categories = Category::all();
            return view('purchases_products.edit', [
                'product' => $products,
                'categories' => $categories
            ]);
        } else {
            return redirect('/noAcces')->with('error', 'Je hebt geen toegang tot deze pagina.');
        }
    }
}
