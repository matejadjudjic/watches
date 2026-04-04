<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CategoryController extends Controller
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
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $this->checkAdmin();
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->checkAdmin();
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create($request->all());
        return redirect('/admin/categories')->with('success', 'Category successfully added!');
    }

    public function edit($id)
    {
        $this->checkAdmin();
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->checkAdmin();
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect('/admin/categories')->with('success', 'Category successfully updated!');
    }

    public function destroy($id)
    {
        $this->checkAdmin();
        Category::findOrFail($id)->delete();
        return redirect('/admin/categories')->with('success', 'Category successfully deleted!');
    }
}
