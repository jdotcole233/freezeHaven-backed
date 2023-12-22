<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $products = Product::with(['employee'])->select('id', 'product_name', 'product_type', 
    'product_category', 'status', 'employee_id')->get();

    info(json_encode($products));

    $formed =  $products->map(function ($product) {
        $product->created_by = $product->employee->first_name . " " . $product->employee->last_name;    
        unset($product->employee_id);
        unset($product->employee);
    });
    info(json_encode($formed));
    return $products;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductsRequest $request)
    {
        $product = Product::create($request->validated() + ['employee_id' => 1]);

        return response()->json([
            'data' => $product,
            'message' => 'Product added successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Product::with('employee')->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductsRequest $request, string $id)
    {
        $product = Product::findOrFail($id)->update($request->validated());

        return response()->json([
            'data' => $product,
            'message' => 'Product updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
