<?php

namespace App\Http\Controllers;
use App\Models\Sub_categories;
use App\Models\Categories;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $all_category = Categories::all();
    $sub_category = Sub_categories::all();

    return view('Admin/Categories.create', compact('all_category', 'sub_category'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sub_cat_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,category_id'
        ]);

        Sub_categories::create([
            'sub_category_name' => $request->sub_cat_name,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('subcategories.create')->with('success', 'Subcategory created successfully.');
        
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
        $sub_category = Sub_categories::find($id);

        $request->validate([
            'sub_category_name' => 'required|string|max:255'
        ]);

        $sub_category->update([
            'sub_category_name' => $request->sub_category_name
        ]);

        return redirect()->route('subcategories.create')->with('success', 'Subcategory updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $sub_category_id)
    {
        $subcategory = Sub_categories::find($sub_category_id);
        $subcategory->delete();

        return redirect()->route('subcategories.create')->with('success', 'Subcategory deleted successfully.');
    }
}
