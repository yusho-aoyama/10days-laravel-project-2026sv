<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Add an index method
    public function index(Request $request)
    {
//        $category = $request->query('category');
//
//        if ($category) {
//            $products = Product::where('category', $category)->get();
//        } else {
//            $products = Product::all();
//        }
//        return response()->json($products);

        $search = $request->query('search');
//        dd($search);
        if ($search) {
            $products = Product::where('name', 'like', '%' . $search . '%')->get();
        } else {
            $products = Product::all();
        }

        return response()->json($products);
    }

    public function store(Request $request)
    {
//        dd($request->all());
            //1, Validation
            $validated = $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
                'category' => 'required|string'
            ]);
            //2, Save to DB
            $product = Product::create($validated);
            //3, Response
            return response()->json([
                'message' => 'Product created successfully',
                'product' => $product
            ]);
    }

    // Add an Update method
    public function update(Request $request, $id)
    {
        // 1, Find product
        $product = Product::findOrFail($id);

        // 2, Validation
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category' => 'required|string'
        ]);

        // 3, Update
        $product->update($validated);

        //4 Response
        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product
        ]);

    }

    // Add a delete method
    public function destroy($id)
    {
        // 1, Find product
        $product = Product::findOrFail($id);

        // 2, Delete product
        $product->delete();

        // 3, Response
        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}
