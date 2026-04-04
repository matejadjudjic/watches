<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductController extends Controller
{
    private function checkAdmin()
    {
        if (Auth::user()->role_id !== 1) {
            abort(403);
        }
    }

    public function index()
    {
        $this->checkAdmin();
        $products = Product::with(['brand', 'category'])->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $this->checkAdmin();
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $this->checkAdmin();
        $request->validate([
            'name'             => 'required|string|max:255',
            'short_description'=> 'nullable|string',
            'description'      => 'nullable|string',
            'price'            => 'required|numeric',
            'discount'         => 'nullable|numeric',
            'reference_number' => 'nullable|string',
            'brand_id'         => 'required',
            'category_id'      => 'required',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = Product::create($request->except('image'));

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');

            \App\Models\ProductImage::create([
                'product_id' => $product->id,
                'image_path' => 'storage/' . $imagePath,
                'is_primary'  => true,
            ]);
        }

        return redirect('/admin/products')->with('success', 'Product successfully added!');
    }

    public function edit($id)
    {
        $this->checkAdmin();
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'brands', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->checkAdmin();
        $request->validate([
            'name'             => 'required|string|max:255',
            'short_description'=> 'nullable|string',
            'description'      => 'nullable|string',
            'price'            => 'required|numeric',
            'discount'         => 'nullable|numeric',
            'reference_number' => 'nullable|string',
            'brand_id'         => 'required',
            'category_id'      => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect('/admin/products')->with('success', 'Product successfully updated!');
    }

    public function destroy($id)
    {
        $this->checkAdmin();
        Product::findOrFail($id)->delete();
        return redirect('/admin/products')->with('success', 'Product successfully deleted!');
    }
}
