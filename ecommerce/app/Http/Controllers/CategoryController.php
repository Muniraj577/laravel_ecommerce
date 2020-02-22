<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'))->with('id');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg|max:10000'
        ]);
        $image = $request->file('image');
        if (isset($image)) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('images/category')) {
                mkdir('images/category', 0777, true);
            }
            $image->move('images/category', $imageName);
        }

        $category = new Category();
        $category->name = $request->name;
        $category->image = $imageName;
        $category->save();
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg|max:10000'
        ]);
        $category = Category::find($id);
        $image = $request->file('image');
        if (isset($image)) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('images/category')) {
                mkdir('images/category', 0777, true);
            }
            unlink('images/category/' . $category->image);
            $image->move('images/category', $imageName);
        }
        $category->name = $request->name;
        $category->image = $imageName;
        $category->save();
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        if (file_exists('images/category/' . $category->image)) {
            unlink('images/category/' . $category->image);
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
