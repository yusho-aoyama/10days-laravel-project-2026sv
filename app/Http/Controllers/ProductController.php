<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        dd($request->all());
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
}
