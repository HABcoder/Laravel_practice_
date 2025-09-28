<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Sub_categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_category = Categories::with('sub_categroy')->get();
        return view('Admin/Categories.create', compact('all_category'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
  {
    $all_category = Categories::with('sub_categroy')->get();
    return view('Admin/Categories.create', compact('all_category'));
  }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cat_name' => 'required|string|max:255'
        ]);

        Categories::create([
            'category_name' => $request->cat_name
        ]);

        return redirect()->route('categories.create')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $category  = Categories::find($id);

        $request->validate([
            'category_name' => 'required|string|max:255'
        ]);

        $category->update([
            'category_name' => $request->category_name
        ]);

        return redirect()->route('categories.create')->with('success', 'Category updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = Categories::find($id);
        $cat->delete();
        return redirect()->route('categories.create')->with('success', 'Category deleted successfully.');
    }
}
