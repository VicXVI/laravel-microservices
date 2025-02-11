<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    protected Product $model;

    public function __construct(Product $model){
        $this->model = $model;
    }

    public function store(Request $request){

        $product = $this->model->create($request->all());

        return response()->json([
            'data' => $product,
            'message' => 'Product is added successfully'
        ]);
    }

    public function index()
    {
        return response()->json([
            'data' => $this->model->all(),
        ]);
    }

    public function show(Product $product){
        return response()->json([
            'data' => $product,
        ]);
    }

    public function destroy(Product $product){
        $product->delete();

        return response()->json([
            'message'=>'Product has been deleted successfully',
        ]);
    }
}
