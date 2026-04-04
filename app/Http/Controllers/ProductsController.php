<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.products');
    }
    public function list()
    {
        $products = Product::with(['images', 'brand', 'category'])->paginate(4);
        $categories = \App\Models\Category::all();
        return view('pages.products', compact('products', 'categories'));
    }

    public function filter(Request $request)
    {
        $query = Product::with(['images', 'brand', 'category']);

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->min_price !== null && $request->max_price !== null) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        if ($request->sort == 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort == 'price_desc') {
            $query->orderBy('price', 'desc');
        } elseif ($request->sort == 'name') {
            $query->orderBy('name', 'asc');
        } elseif ($request->sort == 'name_desc') {
            $query->orderBy('name', 'desc');
        }


        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->get();

        return response()->json($products);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with(['images', 'brand', 'category'])->findOrFail($id);
        return view('pages.single', compact('product'));
    }
    public function getImages(string $id)
    {
        $product = Product::with('images')->findOrFail($id);
        return response()->json($product->images);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
