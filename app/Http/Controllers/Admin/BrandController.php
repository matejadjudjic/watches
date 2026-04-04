<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;

class BrandController extends Controller
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
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        $this->checkAdmin();
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $this->checkAdmin();
        $request->validate([
            'name'         => 'required|string|max:255|unique:brands',
            'country'      => 'nullable|string|max:255',
            'founded_year' => 'nullable|integer',
        ]);

        Brand::create($request->all());
        return redirect('/admin/brands')->with('success', 'Brand successfully added!');
    }

    public function edit($id)
    {
        $this->checkAdmin();
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $this->checkAdmin();
        $request->validate([
            'name'         => 'required|string|max:255|unique:brands,name,' . $id,
            'country'      => 'nullable|string|max:255',
            'founded_year' => 'nullable|integer',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->update($request->all());
        return redirect('/admin/brands')->with('success', 'Brand successfully updated!');
    }

    public function destroy($id)
    {
        $this->checkAdmin();
        Brand::findOrFail($id)->delete();
        return redirect('/admin/brands')->with('success', 'Brand successfully deleted!');
    }
}
