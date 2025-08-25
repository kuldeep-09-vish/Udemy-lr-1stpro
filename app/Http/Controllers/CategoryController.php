<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categorys = Category::all();
        return view('admin.category.index', compact('categorys'));
    }

 
    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
    // Validation
    $validated = $request->validate([
        'name'        => 'required|string',
        'discription' => 'required',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp',
        'sku'         => 'required|unique:categories,sku',
        'price'       => 'required|numeric',
    ]);

    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/categories'), $imageName);

        // database ke liye path store karna
        $validated['image'] = 'uploads/categories/' . $imageName;
    }

    $category = Category::create($validated);

    if ($category) {
        return redirect()->route('category')
                         ->with('success', 'Category created successfully.');
    } else {
        return redirect()->route('category.create')
                         ->with('error', 'Failed to create category.');
    }
    }



    public function edit(Category $category)
    {   
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, Category $category)
    {
    // Step 1: Validate input
    $validatedData = $request->validate([
        'name'        => ['required', 'string', 'max:255'],
        'discription' => ['required', 'string'],
        'image'       => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        'sku'         => ['required', 'unique:categories,sku,' . $category->id],
        'price'       => ['required', 'numeric', 'min:0'],
    ]);

    // Step 2: Handle image upload if exists
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image->move(public_path('uploads/categories'), $imageName);

        // Store relative path for DB
        $validatedData['image'] = 'uploads/categories/' . $imageName;
    }

    // Step 3: Update category
    $updated = $category->update($validatedData);

    // Step 4: Return response
    if ($updated) {
        return redirect()->route('category')->with('success', 'Category updated successfully.');
    } else {
        return back()->with('error', 'Failed to update category.');
    }
    }


 
    public function show(category $category)
    {
        return view('admin.category.singleshow', compact('category'));
    }

    public function destroy(Category $category)
    {

        if($category->delete()){
            return redirect()->route('category')
                         ->with('success', 'Category deleted successfully.');
        }
        else{
            return redirect()->route('category')
                         ->with('error', 'Failed to delete category.');
        }

    }

}   