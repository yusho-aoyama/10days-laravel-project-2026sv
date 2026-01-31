<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Add an index method
    public function index(Request $request)
    {
        $category = $request->query('category');
        $search = $request->query('search');

        $query = Product::query();

        // Filter by category
        if ($category) {
            $query->where('category', $category);
        }

        // Search by product name
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $products = $query->get();

        // Empty data handling (Day8)
        if ($products->isEmpty()) {
            return response()->json([
                'message' => 'No Products found'
            ], 404);
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
        // Add try-catch statement
        try {
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

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong',
            ], 500);
        }
    }

    // Add a delete method
    public function destroy($id)
    {
        // Add try-catch statement
        try {
            // 1, Find product
            $product = Product::findOrFail($id);

            // 2, Delete product
            $product->delete();

            // 3, Response
            return response()->json([
                'message' => 'Product deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong',
            ], 500);
        }
    }
}
