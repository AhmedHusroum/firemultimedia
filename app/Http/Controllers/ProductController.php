<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('products.index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image_path' => 'nullable',
            'stock' => 'nullable',
            'product_category_id' => 'nullable',

        ]);


        $filename = $request->file('image_path')->getClientOriginalName();
        $request->file('image_path')->storeAs('public', $filename);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->product_category_id = $request->input('product_category_id');
        $product->image_path = $filename;
        $product->save();
        return Redirect::route('purchases_products.index')->with('success', 'Product is succesvol toegevoegd.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image_path' => 'nullable',
            'stock' => 'nullable',
            'product_category_id' => 'nullable',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->stock = $validatedData['stock'];
        $product->product_category_id = $validatedData['product_category_id'];
        $product->save();


        if ($request->has('delete_old_image') && $request->input('delete_old_image')) {
            // Verwijder de oude afbeelding uit opslag of bestandssysteem
            Storage::disk('public')->delete('' . $product->image_path);

            // Update de kolom in de database om aan te geven dat er geen afbeelding meer is
            $product->update(['image' => null]);
        }

        // Verwerk de nieuwe afbeeldingen
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $image_path) {
                $imageName = $image_path->getClientOriginalName();
                $image_path->storeAs('', $imageName, 'public');
                $newImages[] = $imageName;
            }

            $product->update(['image_path' => implode(',', $newImages)]);
        }

        return redirect()->route('purchases_products.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Verwijder de afbeelding als die bestaat
        if ($product->image_path) {
            Storage::disk('public')->delete('' . $product->image_path);
        }

        // Verwijder de post
        $product->delete();

        return redirect()->route('purchases_products.index')->with('success', 'Project deleted successfully');
    }

}
